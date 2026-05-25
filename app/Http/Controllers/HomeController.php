<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil event terbaru
        $events = Event::latest()->take(3)->get();

        return view('user.Home', compact('events'));
    }
}