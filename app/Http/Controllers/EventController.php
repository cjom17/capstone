<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;

use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class EventController extends Controller
{
    public function deleteEvent($id)
    {
        $event = Event::find($id);
        if (!$event) {
            return back()->with("error", "Event not found.");
        }
        $event->delete();
        return back()->with("success", "Event deleted successfully.");
    }

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
            'event_place' => 'required|string',
            'event_people' => 'string',
            'event_date' => 'required|date',
            'event_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules for the image
        ]);
    
        $adminId = Auth::id(); // Get the ID of the currently authenticated user
    
        $data = [
            'admin_id' => $adminId,
            'event_title' => $request->event_title,
            'event_desc' => $request->event_desc,
            'event_place' => $request->event_place,
            'event_people' => $request->event_people,

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
            return back()->with("error", "Error, try again ");
        }

        return back()->with("success", "New event added successfully. ");
    
    }
    public function updateEventShow($id)
    {
        $event = Event::find($id);
        return view('update_event', compact('event'));
    }

    public function updateEvent(Request $request, $eventId)
{
    $request->validate([
        'event_title' => 'required|string',
        'event_desc' => 'required|string',
        'event_place' => 'required|string',
        'event_people' => 'string',

        'event_date' => 'required|date',
        'event_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules for the image
    ]);

    // Retrieve the event by its ID
    $event = Event::find($eventId);

    if (!$event) {
        return back()->with("error", "Event not found.");
    }

    $user = Auth::user();

    $data = [
        'admin_id' => $user->id,
        'event_title' => $request->event_title,
        'event_place' => $request->event_place,
        'event_people' => $request->event_people,

        'event_desc' => $request->event_desc,
        'event_date' => $request->event_date,
    ];

    // Handle image update
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

    // Update the event
    $event->update($data);

    return back()->with("success", "Event updated successfully.");
}



}
