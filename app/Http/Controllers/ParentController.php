<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\ParentModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;

class ParentController extends Controller
{
    
    function showParentLogin(){
        return view('parentLogin');
    }

    public function getAllParent()
    {
        $parents = ParentModel::all();
        return view('manage_parents', compact('parents'));
    }

    public function deleteParent($id)
    {
        // Fetch the teacher details from the database based on the provided ID
        $parent = ParentModel::find($id);

        // Check if the teacher exists
        if (!$parent) {
            return redirect()->route('manage.parent')->with('error', 'Parent not found.');
        }

        $parent->delete();

        // Redirect to a page (e.g., a list of teachers) after deletion
        return redirect()->route('manage.parent')->with('success', 'Parent deleted successfully.');
    }
    function showParentRegistration(){
        return view('parentRegistration');
    }

    public function specParent($id)
    {
        // Fetch the student details from the database based on the provided ID
        $parent = ParentModel::find($id);
    
        // Pass the student details to the view
        return view('view_parent_data', compact('parent'));
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

    $credentials = $request->only('username', 'password');

    if (Auth::guard('parent')->attempt($credentials)) {
        return redirect()->route('parent.landing');
    }

    return redirect(route('parent.login'))->with("error", "Login details are not valid");
}



public function parentRegistration(Request $request)
{
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
        'student_lrn' => [
            'required',
            'string',
            'unique:parent_models',
            Rule::exists('students', 'student_lrn'),
        ],
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

    // Verify if the student LRN exists in the students table
    $studentExists = Student::where('student_lrn', $request->student_lrn)->exists();

    // If the student does not exist, return an error
    if (!$studentExists) {
        return redirect()->route('parent.registration')->with("error", "Invalid student LRN. Please check and try again.");
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
