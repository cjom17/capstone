<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;

use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showAddEvent()
    {
        return view ('/add_events');
    }

    public function showManageEvent()
    {
        return view ('/manage_events');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function showLatestEvents()
    {
        $latestEvents = Event::orderBy('date_uploaded', 'desc')->take(3)->get();

        return view('index', ['latestEvents' => $latestEvents]);
    }


    public function getEvents()
    {
        $events = Event::all();
        return view('manage_events', compact('events'));
    }

    public function addEvent(Request $request)
    {
        $request->validate([
            'event_title' => 'required|string',
            'event_desc' => 'required|string',
            'event_date' => 'required|date',
            'event_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules for the image
        ]);
    
        $adminId = Auth::id(); // Get the ID of the currently authenticated user
    
        $data = [
            'admin_id' => $adminId,
            'event_title' => $request->event_title,
            'event_desc' => $request->event_desc,
            'event_date' => $request->event_date,
            'event_image' => $request->eventImage,
            'date_uploaded' => now(),
        ];
    
        // Handle image upload
        if ($request->hasFile('event_image')) {
            $image = $request->file('event_image');
            if ($image->isValid()) {
                $destinationPath = 'images'; // Change this to your desired directory
                $eventImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
                $image->move($destinationPath, $eventImage);
                $data['event_image'] = $eventImage;
            } else {
                return back()->with('error', 'File upload error: ' . $image->getClientOriginalName());
            }
        }
        
        
    
       $event = Event::create($data);

        
        if (!$event) {
            return redirect(route('event.index'))->with("error", "Try again");
        }

        return redirect()->route('events.index')->with("success", "New event added successfully");
    
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
