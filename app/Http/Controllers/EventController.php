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
         // upload banner
        $bannerName = null;

        if ($request->hasFile('banner')){
            $banner = $request->file('banner');
            $bannerName = time() . '.' . $banner->extension();
            $banner->move(public_path('img'), $bannerName);
        }

        Event::create([

            'nama_event' => $request->nama_event,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'banner' => $bannerName,
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
