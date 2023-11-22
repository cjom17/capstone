<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class ParentController extends Controller
{
    
    function showParentLogin(){
        return view('parentLogin');
    }

    function showParentRegistration(){
        return view('parentRegistration');
    }

    function showParentLanding(){
        $user = Auth::user();
        if (!$user || $user->role !== 'parent') {
            return redirect()->route('parent.login'); // Redirect to the login page or handle authentication as needed
        }
        return view('parent_landing');
    }


    function parentLoginPost(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required'
    ]);

    $credentials = $request->only('parent_lrn', 'password');

    if (Auth::guard('parent')->attempt($credentials)) {
        return redirect()->route('parent.landing');
    }

    return redirect(route('parent.login'))->with("error", "Login details are not valid");
}


    public function addParent(Request $request)
    {
        $user = Auth::user();

        if (!$user || $user->role !== 'parent') {
            return redirect()->route('parent.login'); // Redirect to the login page or handle authentication as needed
        }

        // Validate the incoming request data
        $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'f_name' => 'required|string',
            'l_name' => 'required|string',
            'm_name' => 'nullable|string',
            'x_name' => 'nullable|string',
            'gender' => 'required|in:male,female,others',
            'civil_status' => 'required|in:single,married,widowed,divorced',
            'nationality' => 'required|string',
            'religion' => 'required|string',
            'address' => 'required|string',
            'phone_number' => 'required|string',
            'age' => 'required|integer',
            'student_lrn' => 'required|string|unique:parent_models', // Assuming student_lrn needs to be unique for parents
            'username' => 'required|unique:parent_models|string',
            'email' => 'required|email|unique:parent_models',
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

        // Create an instance of the ParentModel and populate it with the request data
        $parentData = [
            'profile_picture' => $profilePicturePath,
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'm_name' => $request->m_name,
            'x_name' => $request->x_name,
            'gender' => $request->gender,
            'civil_status' => $request->civil_status,
            'nationality' => $request->nationality,
            'religion' => $request->religion,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'age' => $request->age,
            'student_lrn' => $request->student_lrn,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role ?? 'parent', // Default value if not provided
        ];

        // Save the parent data to the database
        $parent = ParentModel::create($parentData);

        // Check if the parent was successfully created
        if (!$parent) {
            return redirect()->route('parent.registration')->with("error", "Failed to add new parent");
        }

        // Redirect with a success message
        return redirect()->route('parent.login')->with("success", "Registration Successful");
    }

function parentLogout(){
    Session::flush();
    Auth::logout();
    return redirect()->route('parent.login');
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
