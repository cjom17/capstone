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


    function login(){
        if(Auth::check()){
            return redirect()->route('adminDashboard');
        }
        return view('adminLogin');
    }

    function show_add_admin(){
        if(Auth::check()){
            return redirect()->route('adminDashboard');
        }
        
        return view('addAdmin');
    }

    function loginPost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'

        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with("error", "Login details are not valid");
    }

    public function addAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed', // Add 'confirmed' to ensure password confirmation matches
            'position' => 'required',
            'gender' => 'required|in:male,female,others',
            'date_of_birth' => 'required|date',
            'address' => 'required',
            'phone_number' => 'required',
            'civil_status' => 'required|in:single,married,widowed,divorced',
            'role' => 'Admin',
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'username' => 'required|unique:users',
        ]);
    
        $data = $request->except('_token', 'password', 'password_confirmation', 'profile_picture');
        $data['password'] = Hash::make($request->password);
    
        // Handle profile picture upload if provided
        if ($request->hasFile('profile_picture')) {
            $imagePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $data['profile_picture'] = $imagePath;
        }
    
        $user = User::create($data);
    
        if (!$user) {
            return redirect(route('registration'))->with("error", "Try again");
        }
    
        return redirect()->route('login')->with("success", "Registration successful");
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
