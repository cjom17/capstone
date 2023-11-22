<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Update;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    //
    public function showLandingPage()
    {
        $latestUpdates = Update::orderBy('created_at', 'desc')->take(3)->get();
        $latestEvents = Event::orderBy('created_at', 'desc')->take(3)->get();

        return view('index', ['latestUpdates' => $latestUpdates, 'latestEvents' => $latestEvents]);
    }

    public function displayEvents()
    {
        $events = DB::table('events')->get(); // Replace with your actual model and database table
        $updates = DB::table('updates')->get(); // Replace with your actual model and database table
    
        // Merge data from both tables
        $mergedData = [
            'events' => $events,
            'updates' => $updates,
        ];
    
        return view('events_updates', $mergedData);
    }
    



}
