<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Session;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function showAdminDashboard(){
        return view('adminDashboard');
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
            // Session::flush();
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
