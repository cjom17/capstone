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
        $latestUpdates = Update::orderBy('date_uploaded', 'desc')->take(3)->get();
        $latestEvents = Event::orderBy('date_uploaded', 'desc')->take(3)->get();

        return view('index', ['latestUpdates' => $latestUpdates, 'latestEvents' => $latestEvents]);
    }
}
