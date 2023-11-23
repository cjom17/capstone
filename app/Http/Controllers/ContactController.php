<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function sendEmail(Request $request)
    {
        try {
            // Retrieve form data
            $name = $request->input('name');
            $email = $request->input('email');
            $message = $request->input('message');
            // Log form data
            Log::info('Controller - Form Data:', [
                'name' => $name,
                'email' => $email,
                'message' => $message,
            ]);
        
            // Set recipient email address
            $to = 'nztechnophile.1@gmail.com'; // Replace with your actual email address
    
            // Send the email using Laravel Mail class
            Mail::to($to)->send(new ContactFormMail([
                'name' => $name,
                'email' => $email,
                'message' => $message,
            ]));
                
            Log::info('Email sent successfully.');
            return 'Email sent successfully.';
        } catch (\Exception $e) {
            // Log any exceptions
            Log::error($e);
            return 'Error sending email: ' . $e->getMessage();
        }
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
