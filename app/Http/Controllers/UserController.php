<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class UserController extends Controller
{
    // 🔹 HALAMAN HOME USER (LIST EVENT)
    public function home()
    {
        // sementara pakai dummy (kalau belum ada tabel)
        $events = [
            (object)[
                'id' => 1,
                'nama_event' => 'Persipura vs Persija',
                'tanggal' => '2026-05-10',
                'banner' => null
            ],
            (object)[
                'id' => 2,
                'nama_event' => 'Persipura vs Arema',
                'tanggal' => '2026-05-15',
                'banner' => null
            ]
        ];

        return view('user.home', compact('events'));
    }

    // 🔹 DETAIL EVENT
    public function detail($id)
    {
        // dummy dulu
        $event = (object)[
            'id' => $id,
            'nama_event' => 'Persipura vs Persija',
            'tanggal' => '2026-05-10',
            'banner' => null
        ];

        $tickets = [
            (object)[
                'id' => 1,
                'harga' => 50000,
                'kuota' => 100,
                'terjual' => 20,
                'category' => (object)['nama' => 'Umum']
            ],
            (object)[
                'id' => 2,
                'harga' => 100000,
                'kuota' => 50,
                'terjual' => 10,
                'category' => (object)['nama' => 'VIP']
            ]
        ];

        return view('user.event.detail', compact('event', 'tickets'));
    }
}