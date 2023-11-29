<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use App\Models\GradeLevel;
use App\Models\Section;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class TeacherController extends Controller
{
    public function getAllTeacher()
    {
        $teachers = Teacher::all();
        return view('manage_teachers', compact('teachers'));
    }

    public function specTeacher($id)
    {
        // Fetch the student details from the database based on the provided ID
        $teacher = Teacher::find($id);
    
        // Pass the student details to the view
        return view('view_teacher_data', compact('teacher'));
    }
    public function deleteTeacher($id)
    {
        // Fetch the teacher details from the database based on the provided ID
        $teacher = Teacher::find($id);

        // Check if the teacher exists
        if (!$teacher) {
            // Handle the case where the teacher is not found (e.g., show an error message)
            return redirect()->route('manage.teacher')->with('error', 'Teacher not found.');
        }

        // Delete the teacher from the database
        $teacher->delete();

        // Redirect to a page (e.g., a list of teachers) after deletion
        return redirect()->route('manage.teacher')->with('success', 'Teacher deleted successfully.');
    }

    function showManageTeacher(){
        return view('manage_teachers');
    }
    function showTeacherLogin(){
        return view('teacherLogin');
    }

    function showTeacherDashboard(){
       
        return view('teacher_dashboard');
    }

    function showAddTeacher(){
      
        return view('add_teacher');
    }

    function teacherLoginPost(Request $request)
{
    $request->validate([
        'id_number' => 'required',
        'password' => 'required'
    ]);

    $credentials = $request->only('id_number', 'password');

    if (Auth::guard('teacher')->attempt($credentials)) {
        return redirect()->route('teacher.dashboard');
    }

    return redirect(route('teacher.login'))->with("error", "Login details are not valid");
}

    public function addTeacher(Request $request)
    {
        $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'fullname' => 'required|string',
            'position' => 'string',
            'admin_id' => 'nullable|integer',
            'id_number' => 'required|integer',
            'advisory_lvl' => 'required|string',
            'section_name' => 'required|string',
            'gender' => 'required|in:male,female,others',
            'date_of_birth' => 'required|date',
            'address' => 'required|string',
            'phone_number' => 'required|string',
            'civil_status' => 'required|in:single,married,widowed,divorced',
            'username' => 'required|unique:teachers|string',
            'email' => 'required|email|unique:teachers',
            'password' => 'required|string',
            'status' => 'string',
        ]);

        $adminId = Auth::id();

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



        $teacherData = [
            'admin_id' => $adminId,
            'profile_picture' => $profilePicturePath,
            'fullname' => $request->fullname,
            'position' => 'Teacher',
            'id_number' => $request->id_number,
            'advisory_lvl' => $request->advisory_lvl,
            'section_name' => $request->section_name,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'civil_status' => $request->civil_status,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role ?? 'teacher', // Default value if not provided
        ];

        $teacher = Teacher::create($teacherData);

        if (!$teacher) {
            return redirect()->route('addTeacher.show')->with("error", "Failed to add new teacher");
        }

        return redirect()->route('addTeacher.show')->with("success", "New teacher added successfully");
    }

    function teacherLogout(){
            Session::flush();
            Auth::logout();
            return redirect()->route('teacher.login');
    }


    public function updateTeacherShow($id)
    {
        $teacher = Teacher::find($id);
        $gradelvls = GradeLevel::all();
        $sections = Section::all();
        return view('update_teacher_data', compact('teacher', 'gradelvls', 'sections'));
    }


public function updateTeacher(Request $request, $id)
    {
        $user = Auth::user();

        // Ensure the user is a teacher
        if (!$user || $user->role !== 'admin') {
            return redirect()->route('login');
        }

        $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'fullname' => 'required|string',
            'position' => 'required|string',
            'id_number' => 'required|integer',
            'advisory_lvl' => 'required|string',
            'section_name' => 'required|string',
            'gender' => 'required|in:male,female,others',
            'date_of_birth' => 'required|date',
            'address' => 'required|string',
            'phone_number' => 'required|string',
            'civil_status' => 'required|in:single,married,widowed,divorced',
            'username' => 'required|string|unique:teachers,username,' . $id,
            'email' => 'required|email|unique:teachers,email,' . $id,
            'password' => 'nullable|string',
        ]);

        $teacher = Teacher::find($id);
     

        // Ensure the student exists
        if (!$teacher) {
            return back()->with("error", "Teacher not found.");
        }



        // Handle file upload for profile picture if provided
        $profilePicturePath = $teacher->profile_picture;
        if ($request->hasFile('profile_picture')) {
            $profilePicture = $request->file('profile_picture');
            if ($profilePicture->isValid()) {
                $destinationPath = 'images'; // Change this to your desired directory
                $profileImage = date('YmdHis') . '.' . $profilePicture->getClientOriginalExtension();
                $profilePicture->move($destinationPath, $profileImage);
                $profilePicturePath = $destinationPath . '/' . $profileImage;

                // Delete old profile picture if it exists
                if ($teacher->profile_picture) {
                    File::delete($teacher->profile_picture);
                }
            } else {
                return back()->with('error', 'File upload error: ' . $profilePicture->getErrorMessage());
            }
        }

        // Password logic
        $password = $teacher->password; // Default to the existing password

        if ($request->filled('new_password')) {
            // If new_password field is filled, check old password and update if correct
            if (!Hash::check($request->password, $teacher->password)) {
                // Old password is incorrect, return with an error message
                return back()->with("error", "Old password is incorrect. Password not updated.");
            }

            // New password is provided, update the password
            $password = bcrypt($request->new_password);
        }

        // Update teacher information without modifying profile_picture if not provided
        $teacher->update([
            'profile_picture' => $profilePicturePath,
            'fullname' => $request->fullname,
            'position' => $request->position,
            'id_number' => $request->id_number,
            'advisory_lvl' => $request->advisory_lvl,
            'section_name' => $request->section_name,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'civil_status' => $request->civil_status,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $password,
        ]);

        return back()->with("success", "Teacher Information updated successfully");
    }

}
