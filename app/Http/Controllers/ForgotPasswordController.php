<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;
use App\Models\ParentModel;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;


class ForgotPasswordController extends Controller
{    


    public function showForgotPassword()
    {
        return view('forgot_password');
    }

    // Send a password reset link to the given user
    protected function sendResetLinkEmail(Request $request)
{
    // Validate the email format and check if it exists in the users table
    $validator = Validator::make($request->all(), [
        'email' => [
            'required',
            'email',
            Rule::exists('users')->where(function ($query) use ($request) {
                $query->where('email', $request->email);
            }),
        ],
    ]);

    if ($validator->fails()) {
        // Set a custom session variable to indicate invalid email
        session()->flash('invalidEmail', 'Invalid email address.');
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Generate a random token
    $token = Str::random(64);

    // Set the expiration time to, for example, 1 hour from now
    $expirationTime = now()->addHour();

    // Insert the token into the password_resets table with the expires_at field
    DB::table('password_resets')->insert([
        'email' => $request->email,
        'token' => $token,
        'created_at' => now(),
        'expires_at' => $expirationTime, // Set the expiration time
    ]);

    // Send the reset link email
    Mail::send('emails.forgetPassword', ['token' => $token], function ($message) use ($request) {
        $message->to($request->email);
        $message->subject('Reset Password');
    });

    return redirect()->back()->with('success', 'We have e-mailed your password reset link!');
}


    public function showResetPasswordForm($token) { 
        return view('reset_password', ['token' => $token]);
     }



public function showResetForm(Request $request, $token = null)
{
    return view('reset_password')->with('token', $token);
}

public function submitResetPasswordForm(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users',
        'password' => 'required|string|min:6|confirmed',
    ]);

    $resetPasswordEntry = DB::table('password_resets')
        ->where('email', $request->email)
        ->where('token', $request->token)
        ->whereNull('used_at') // Check if the token is not used
        ->where('expires_at', '>', now()) // Check if the token is still valid
        ->first();

        // dd($request->token, $resetPasswordEntry->used_at, $resetPasswordEntry->expires_at);


    if (!$resetPasswordEntry) {
        // dd('Invalid or expired token!');

        return redirect()->back()->withInput()->with('error', 'Invalid or expired token!');
    }

    // Update the user's password
    $user = User::where('email', $request->email)
        ->update(['password' => Hash::make($request->password)]);

    // Mark the token as used
    DB::table('password_resets')
        ->where('email', $request->email)
        ->where('token', $request->token)
        ->update(['used_at' => now()]);

    // Redirect to the login page with a success message
    return redirect('/adminLogin')->with('success', 'Your password has been changed. You can now login');
} 
/// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> Teacher <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<




 


 
}
