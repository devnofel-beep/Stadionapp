<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $events = Event::latest()->get();

        return view('admin.dashboard', [

            'totalEvent' => Event::count(),

            'totalTiket' => 0,

            'totalPendapatan' => 0,

            'totalUser' => User::count(),

            'events' => $events

        ]);
    }
}