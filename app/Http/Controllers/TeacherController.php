<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
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
        return redirect()->intended(route('teacher.dashboard'));
    }

    return redirect(route('teacher.login'))->with("error", "Login details are not valid");
}

    public function addTeacher(Request $request)
    {
        $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_id' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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

        // Handle file upload for image_id if provided
        $imageIdPath = null;
        if ($request->hasFile('image_id')) {
            $imageId = $request->file('image_id');
            if ($imageId->isValid()) {
                $destinationPath = 'images'; // Change this to your desired directory
                $imageIdFile = date('YmdHis') . '.' . $imageId->getClientOriginalExtension();
                $imageId->move($destinationPath, $imageIdFile);
                $imageIdPath = $destinationPath . '/' . $imageIdFile;
            } else {
                return back()->with('error', 'File upload error: ' . $imageId->getErrorMessage());
            }
        }

        $teacherData = [
            'admin_id' => $adminId,
            'profile_picture' => $profilePicturePath,
            'image_id' => $imageIdPath,
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
            'status' => $request->status ?? 'Approved', // Default value if not provided
        ];

        $teacher = Teacher::create($teacherData);

        if (!$teacher) {
            return redirect()->route('addTeacher.show')->with("error", "Failed to add new teacher");
        }

        return redirect()->route('addTeacher.show')->with("success", "New teacher added successfully");
    }

    function logout(){
            // Session::flush();
            Auth::logout();
            return redirect()->route('login');
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
