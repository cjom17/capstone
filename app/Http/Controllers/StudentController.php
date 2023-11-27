<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\EnrolledSubject;

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
    // Fetch the student details from the database based on the provided ID
    $student = Student::find($id);

    // Pass the student details to the view
    return view('view_student_data', compact('student'));
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

        $student = Student::create($studentData);

        if (!$student) {
            return redirect()->route('addStudent.show')->with("error", "Failed to add new student");
        }

        return redirect()->route('addStudent.show')->with("success", "New student added successfully");
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

    $student->update([
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
        'password' => $request->password ? bcrypt($request->password) : $student->password,
        'role' => $request->role ?? 'student', // Default value if not provided
    ]);

    if (!$student) {
        return redirect()->route('addStudent.show')->with("error", "Failed to update student");
    }

    return redirect()->route('addStudent.show')->with("success", "Student updated successfully");
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
