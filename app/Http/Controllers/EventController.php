<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;


class EventController extends Controller
{
    public function create()
    {
        return view('admin.create-event');
    }

        
    public function store(Request $request)
    {
        Event::create([

            'nama_event' => $request->nama_event,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'banner' => $request->banner,
            'status' => $request->status,

        ]);

        return redirect('/admin/dashboard');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);

        return view(
            'admin.edit-event',
            compact('event')
        );
    }


    public function update(Request $request, $id)
        {

            $event = Event::findOrFail($id);

            $event->update([

                'nama_event' => $request->nama_event,

                'deskripsi' => $request->deskripsi,

                'tanggal' => $request->tanggal,

                'jam' => $request->jam,

                'status' => $request->status,

            ]);

            return redirect('/admin/dashboard');
        }

    public function destroy($id)
            {

                $event = Event::findOrFail($id);

                $event->delete();

                return redirect('/admin/dashboard');

            }
    
};
