<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\Session;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{ 
   public function createDefaultAdmin()
{
    $existingUserCount = User::count();

    // Check if there are no existing users
    if ($existingUserCount === 0) {
        $defaultAdmin = new User([
            'name' => 'Default Admin',
            'position' => 'Administrator',
            'gender' => 'Male', // Assuming a default gender
            'date_of_birth' => now()->subYears(30)->toDateString(), // Example: 30 years old
            'address' => 'Default Address',
            'phone_number' => '1234567890',
            'civil_status' => 'Single', // Assuming a default civil status
            'role' => 'admin',
            'profile_picture' => 'admin.png', // Assuming a default profile picture
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('defaultpassword'),
        ]);

        $defaultAdmin->save();

        return 'Default admin created successfully.';
    }

    return 'Users already exist. No action taken.';
}
    public function updateAdminShow($id)
    {
        $admin = User::find($id);
        return view('update_admin_data', compact('admin'));
    }

    function showAdminDashboard(){
        return view('adminDashboard');
    }
    public function specAdmin($id)
    {
        // Fetch the student details from the database based on the provided ID
        $admin = User::find($id);
    
        // Pass the student details to the view
        return view('view_admin_data', compact('admin'));
    }
public function updateAdmin(Request $request, $id)
    {
        $user = Auth::user();

        // Ensure the user is an admin
        if (!$user || $user->role !== 'admin') {
            return redirect()->route('login'); // Redirect to the admin login page or handle authentication as needed
        }

        $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string',
            'position' => 'required|string',
            'gender' => 'required|in:male,female,others',
            'date_of_birth' => 'required|date',
            'address' => 'required|string',
            'phone_number' => 'required|string',
            'civil_status' => 'required|in:single,married,widowed,divorced',
            'username' => 'required|string|unique:users,username,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string',
        ]);

        $admin = User::find($id);

        // Ensure the student exists
        if (!$user) {
            return back()->with("error", "Admin not found.");
        }


     
        $profilePicturePath = $admin->profile_picture;
        // Check if a new profile picture is provided
        $profilePicturePath = $admin->profile_picture;
        if ($request->hasFile('profile_picture')) {
            $profilePicture = $request->file('profile_picture');
            if ($profilePicture->isValid()) {
                $destinationPath = 'images'; // Change this to your desired directory
                $profileImage = date('YmdHis') . '.' . $profilePicture->getClientOriginalExtension();
                $profilePicture->move($destinationPath, $profileImage);
                $profilePicturePath = $profileImage;

                // Delete old profile picture if it exists
                if ($admin->profile_picture) {
                    File::delete($admin->profile_picture);
                }
            } else {
                return back()->with('error', 'File upload error: ' . $profilePicture->getErrorMessage());
            }
        }

        $password = $admin->password; // Default to the existing password

        if ($request->filled('new_password')) {
            // If new_password field is filled, check old password and update if correct
            if (!Hash::check($request->password, $admin->password)) {
                // Old password is incorrect, return with an error message
                return back()->with("error", "Old password is incorrect. Password not updated.");
            }

        // New password is provided, update the password
        $password = bcrypt($request->new_password);
        }

        // Update admin information without modifying profile_picture if not provided
        $admin->update([
            'profile_picture' => $profilePicturePath,

            'name' => $request->name,
            'position' => $request->position,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'civil_status' => $request->civil_status,
            'role' => $request->role ?? 'admin',
            'username' => $request->username,
            'email' => $request->email,
            'password' => $password,
        ]);

        // Update profile_picture only if a new file is provided
        // if (isset($profilePicture) && $profilePicture->isValid()) {
        //     $admin->update(['profile_picture' => $profilePicturePath]);
        // }

        return back()->with("success", "Admin information updated successfully");
    }



    

    public function deleteAdmin($id)
    {
        // Fetch the teacher details from the database based on the provided ID
        $admin = User::find($id);

        // Check if the teacher exists
        if (!$admin) {
            return redirect()->route('manage.admin')->with('error', 'Admin not found.');
        }

        $admin->delete();

        // Redirect to a page (e.g., a list of teachers) after deletion
        return redirect()->route('manage.admin')->with('success', 'Admin deleted successfully.');
    }
    
    public function getAllAdmin()
    {
        $admins = User::all();
        return view('manageAdmin', compact('admins'));
    }

    function login(){
        if(Auth::check()){
            return redirect()->route('admin.dashboard');
        }
        return view('adminLogin');
    }

    function show_add_admin(){
      
        return view('addAdmin');
    }

    function loginPost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'

        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::guard('web')->attempt($credentials)){
            return redirect()->intended(route('admin.dashboard'));
        }
        return redirect(route('login'))->with("error", "Login details are not valid");
    }

    public function addAdmin(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8|confirmed',
        'position' => 'required',
        'gender' => 'required|in:male,female,others',
        'date_of_birth' => 'required|date',
        'address' => 'required',
        'phone_number' => 'required',
        'civil_status' => 'required|in:single,married,widowed,divorced',
        'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'username' => 'required|unique:users',
    ]);

    $data = $request->except('_token', 'password', 'password_confirmation');
    $data['password'] = Hash::make($request->password);

    // Handle profile picture upload if provided
    if ($request->hasFile('profile_picture')) {
        $image = $request->file('profile_picture');
        if ($image->isValid()) {
            $destinationPath = 'images'; // Change this to your desired directory
            $profileImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['profile_picture'] = $profileImage;
        } else {
            return back()->with('error', 'File upload error: ' . $image->getErrorMessage());
        }
    }

    $user = User::create($data);

    if (!$user) {
        return redirect(route('addAdmin.show'))->with("error", "Try again");
    }

    return redirect()->route('addAdmin.show')->with("success", "New admin added successfully");
}

    function logout(){
            Session::flush();
            Auth::logout();
            return redirect()->route('login');
    }





    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
