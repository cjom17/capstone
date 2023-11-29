<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\QueryException; 

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\EnrolledSubject;
use Illuminate\Validation\Rule;

use App\Models\Teacher;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{

    public function getStudents()
    {
        $students = Student::all();
        return view('manage_students', compact('students'));
    }
    public function getStudentsForAdmin()
    {
        $students = Student::all();
        return view('admin_manage_students', compact('students'));
    }

    public function deleteStudent($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return redirect()->route('manage.student')->with('error', 'Student not found.');
        }
        $student->delete();
        return redirect()->route('manage.student')->with('success', 'Student deleted successfully.');
    }

    public function getEnrolledSubs()
    {
        $enrolledSubs = EnrolledSubject::all();
        return view('enrolled_subjects', compact('enrolledSubs'));
    }
    // function showManageStudents(){
    //     return view('manage_students');
    // }
    function showStudentLogin(){
        return view('student_login');
    }

    public function specStudent($id)
    {
        $student = Student::find($id);
        return view('view_student_data', compact('student'));
    }

    public function updateStudentShow($id)
    {
        $student = Student::find($id);
        return view('update_student_data', compact('student'));
    }

    public function specStudentForAdmin($id)
    {
        $student = Student::find($id);
        return view('admin_view_student_data', compact('student'));
    }
    
    public function enrolledSub($id)
    {
        // Fetch the student details from the database based on the provided ID
        $student = Student::find($id);

        // Pass the student details to the view
        return view('enrolled_subjects', compact('student'));
    }

    function showStudentLanding(){
        $user = Auth::user();
        if (!$user || $user->role !== 'student') {
            return redirect()->route('student.login'); // Redirect to the login page or handle authentication as needed
        }
        return view('student_landing');
    }

    function showAddStudent(){
      
        return view('add_student');
    }

    function studentLoginPost(Request $request)
{
    $request->validate([
        'student_lrn' => 'required',
        'password' => 'required'
    ]);

    $credentials = $request->only('student_lrn', 'password');

    if (Auth::guard('student')->attempt($credentials)) {
        return redirect()->route('student.landing');
    }

    return redirect(route('student.login'))->with("error", "Login details are not valid");
}

public function addStudent(Request $request)
{
    $user = Auth::user();
    if (!$user || $user->role !== 'teacher') {
        return redirect()->route('teacher.login'); // Redirect to the login page or handle authentication as needed
    }
    
    $request->validate([
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'f_name' => 'required|string',
        'l_name' => 'required|string',
        'm_name' => 'nullable|string',
        'x_name' => 'nullable|string',
        'gender' => 'required|in:male,female,others',
        'date_of_birth' => 'required|date',
        'civil_status' => 'required|in:single,married,widowed,divorced',
        'age' => 'required|integer',
        'religion' => 'required|string',
        'nationality' => 'required|string',
        'address' => 'required|string',
        'phone_number' => 'required|string',
        'mother_name' => 'nullable|string',
        'father_name' => 'nullable|string',
        'username' => 'required|unique:students|string',
        'email' => 'required|email|unique:students',
        'password' => 'required|string',
        'role' => 'string', // You can adjust this validation based on your needs
        'student_lrn' => [
            'required',
            'string',
            Rule::unique('students', 'student_lrn'), // Unique LRN in the 'students' table
        ],
    ]);

    // Handle file upload for profile picture if provided
    $profilePicturePath = null;
    if ($request->hasFile('profile_picture')) {
        $profilePicture = $request->file('profile_picture');
        if ($profilePicture->isValid()) {
            $destinationPath = 'images'; // Change this to your desired directory
            $profileImage = date('YmdHis') . '.' . $profilePicture->getClientOriginalExtension();
            $profilePicture->move($destinationPath, $profileImage);
            $profilePicturePath = $destinationPath . '/' . $profileImage;
        } else {
            return back()->with('error', 'File upload error: ' . $profilePicture->getErrorMessage());
        }
    }

    $teacher = Teacher::find($user->id);

    $studentData = [
        'teacher_id' => $teacher->id,
        'section_name' => $teacher->section_name,
        'student_lrn' => $request->student_lrn,
        'year_lvl' => $teacher->advisory_lvl,
        'profile_picture' => $profilePicturePath,
        'f_name' => $request->f_name,
        'l_name' => $request->l_name,
        'm_name' => $request->m_name,
        'x_name' => $request->x_name,
        'gender' => $request->gender,
        'date_of_birth' => $request->date_of_birth,
        'civil_status' => $request->civil_status,
        'age' => $request->age,
        'religion' => $request->religion,
        'nationality' => $request->nationality,
        'address' => $request->address,
        'phone_number' => $request->phone_number,
        'mother_name' => $request->mother_name,
        'father_name' => $request->father_name,
        'username' => $request->username,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => $request->role ?? 'student', // Default value if not provided
    ];

    try {
        // ... (existing code)

        $student = Student::create($studentData);

        if (!$student) {
            return redirect()->route('addStudent.show')->with("error", "Failed to add new student");
        }

        return redirect()->route('addStudent.show')->with("success", "New student added successfully");
    } catch (QueryException $e) {
        // If the exception is caused by a unique constraint violation
        if ($e->errorInfo[1] == 1062) {
            return redirect()->route('addStudent.show')->with("error", "Student LRN already exists. Please use a different LRN.");
        }

        // Handle other database-related exceptions if needed
        return redirect()->route('addStudent.show')->with("error", "Database error: " . $e->getMessage());
    }
}

    public function updateStudent(Request $request, $id)
{
        $user = Auth::user();
        // Ensure the user is a teacher
        if (!$user || $user->role !== 'teacher') {
            return redirect()->route('teacher.login'); // Redirect to the login page or handle authentication as needed
        }

        $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'student_lrn' => 'required|integer',
            'f_name' => 'required|string',
            'l_name' => 'required|string',
            'm_name' => 'nullable|string',
            'x_name' => 'nullable|string',
            'gender' => 'required|',
            'date_of_birth' => 'required|date',
            'civil_status' => 'required|',
            'age' => 'required|integer',
            'religion' => 'required|string',
            'nationality' => 'required|string',
            'address' => 'required|string',
            'phone_number' => 'required|string',
            'mother_name' => 'nullable|string',
            'father_name' => 'nullable|string',
            'username' => 'required|string|unique:students,username,' . $id,
            'email' => 'required|email|unique:students,email,' . $id,
            'password' => 'nullable|string', // You may adjust this based on your requirements
            'role' => 'string', // You can adjust this validation based on your needs
        ]);

        $student = Student::find($id);

        // Ensure the student exists
        if (!$student) {
            return redirect()->route('addStudent.show')->with("error", "Student not found");
        }

        // Handle file upload for profile picture if provided
        $profilePicturePath = $student->profile_picture;
        if ($request->hasFile('profile_picture')) {
            $profilePicture = $request->file('profile_picture');
            if ($profilePicture->isValid()) {
                $destinationPath = 'images'; // Change this to your desired directory
                $profileImage = date('YmdHis') . '.' . $profilePicture->getClientOriginalExtension();
                $profilePicture->move($destinationPath, $profileImage);
                $profilePicturePath = $destinationPath . '/' . $profileImage;

                // Delete old profile picture if it exists
                if ($student->profile_picture) {
                    File::delete($student->profile_picture);
                }
            } else {
                return back()->with('error', 'File upload error: ' . $profilePicture->getErrorMessage());
            }
        }
     
        $password = $student->password; // Default to the existing password

        if ($request->filled('new_password')) {
            // If new_password field is filled, check old password and update if correct
            if (!Hash::check($request->password, $student->password)) {
                // Old password is incorrect, return with an error message
                return back()->with("error", "Old password is incorrect. Password not updated.");
            }

        // New password is provided, update the password
        $password = bcrypt($request->new_password);
    }
                
        $student->update([
            'profile_picture' => $profilePicturePath,
            'student_lrn' => $request->student_lrn,

            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'm_name' => $request->m_name,
            'x_name' => $request->x_name,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'civil_status' => $request->civil_status,
            'age' => $request->age,
            'religion' => $request->religion,
            'nationality' => $request->nationality,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'mother_name' => $request->mother_name,
            'father_name' => $request->father_name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $password,
            'role' => $request->role ?? 'student', // Default value if not provided
        ]);

        if (!$student) {
         
            return back()->with("error", "Failed to update student");
        }
        return back()->with("success", "Student updated successfully");
}


    function studentLogout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('student.login');
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
