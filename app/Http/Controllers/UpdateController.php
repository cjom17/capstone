<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;
use App\Models\Update;

use Illuminate\Support\Facades\DB;
class UpdateController extends Controller
{

    public function showAddUpdate()
    {
        return view ('/add_updates');
    }

    public function showManageUpdate()
    {
        return view ('/manage_updates');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function showLatestUpdates()
    {
        $latestUpdates = Update::orderBy('date_uploaded', 'desc')->take(3)->get();

        return view('index', ['latestUpdates' => $latestUpdates]);
    }


    public function getUpdates()
    {
        $updates = Update::all();
        return view('manage_updates', compact('updates'));
    }

    public function addUpdate(Request $request)
    {
        $request->validate([
            'update_title' => 'required|string',
            'update_desc' => 'required|string',
            'update_date' => 'required|date',
            'update_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules for the image
        ]);
    
        $adminId = Auth::id(); // Get the ID of the currently authenticated user
    
        $data = [
            'admin_id' => $adminId,
            'update_title' => $request->update_title,
            'update_desc' => $request->update_desc,
            'update_date' => $request->update_date,
            'update_image' => $request->updateImage,
            'date_uploaded' => now(),
        ];
    
        // Handle image upload
        if ($request->hasFile('update_image')) {
            $image = $request->file('update_image');
            if ($image->isValid()) {
                $destinationPath = 'images'; // Change this to your desired directory
                $updateImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
                $image->move($destinationPath, $updateImage);
                $data['update_image'] = $updateImage;
            } else {
                return back()->with('error', 'File upload error: ' . $image->getClientOriginalName());
            }
        }
        
        
    
       $update = Update::create($data);

        
        if (!$update) {
            return redirect(route('updates.index'))->with("error", "Try again");
        }

        return redirect()->route('updates.index')->with("success", "New update added successfully");
    
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
