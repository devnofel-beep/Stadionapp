<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Ticket;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // 🔹 HALAMAN HOME USER (LIST EVENT)
    public function home()
    {
          $events = Event::latest()->get();
    //$event = Event::findOrFail($id);

        //return view('event.detail', compact('events'));
        // sementara pakai dummy (kalau belum ada tabel)
        //$events = [
//(object)[
//'id' => 1,
             //   'nama_event' => 'Persipura vs Persija',
              //  'tanggal' => '2026-05-10',
             //   'banner' => null
          //  ],
           // (object)[
              //  'id' => 2,
               // 'nama_event' => 'Persipura vs Arema',
               // 'tanggal' => '2026-05-15',
               // 'banner' => null
           // ]
      //  ];(ini user contrtoll)

        return view('user.home', compact('events'));
    }

    // 🔹 DETAIL EVENT
    public function detail($id)
    {
        $event = Event::with('tickets')
                        ->findOrFail($id);

            return view(
                'event.detail',
                compact('event')
            );
         //$event = Event::findOrFail($id);

        //return view('event.detail', compact('event'));

        // dummy dulu
        //$event = (object)[
            //'id' => $id,
           // 'nama_event' => 'Persipura vs Persija',
           // 'tanggal' => '2026-05-10',
          //  'banner' => null
//];

        //$tickets = [
//(object)[
//'id' => 1,
              //  'harga' => 50000,
               // 'kuota' => 100,
               // 'terjual' => 20,
               // 'category' => (object)['nama' => 'Umum']
            //],
//(object)[
              //  'id' => 2,
//'harga' => 100000,
               // 'kuota' => 50,
//'terjual' => 10,
               // 'category' => (object)['nama' => 'VIP']
           // ]
       // ];

        //return view('event.detail', compact('event', 'tickets'));
    }

    // public function halamanTribun($id)
    // {
    //     $event = Event::findOrFail($id);

    //     return view(
    //         'event.pilih-tribun',
    //         compact('event')
    //     );
    // }

        public function halamanTribun($id)
        {
            $event = Event::with('tickets')
                            ->findOrFail($id);
    
            return view(
                'event.pilih-tribun',
                compact('event')
            );
        }

    public function pilihBlok($id, $zona)
    {
        $event = Event::findOrFail($id);

        $dataTribun = [

            'timur' => [
                'kategori' => 'UMUM',
                'gate' => 'Gate B8'
            ],

            'utara' => [
                'kategori' => 'UMUM',
                'gate' => 'Gate A14'
            ],

            'selatan' => [
                'kategori' => 'UMUM',
                'gate' => 'Gate A1'
            ],

            'kategori1utara' => [
                'kategori' => 'KATEGORI 1',
                'gate' => 'Gate A11'
            ],

            'kategori1selatan' => [
                'kategori' => 'KATEGORI 1',
                'gate' => 'Gate A5'
            ],

            'vipbarat' => [
                'kategori' => 'VIP',
                'gate' => 'Gate A8'
            ],

            'vvipbarat' => [
                'kategori' => 'VVIP',
                'gate' => 'Gate A8'
            ]

        ];

        return view(
            'event.pilih-blok',
            compact('event', 'zona', 'dataTribun')
        );
    }

    public function pilihKursi($id, $zona, $blok)
    {
        $event = Event::findOrFail($id);

        return view(
            'event.pilih-kursi',
            compact(
                'event',
                'zona',
                'blok'
            )
        );
    }

    public function checkout($event,$zona,$blok)
    {
        $event = Event::findOrFail($event);
        
        $kursi = request('kursi');
        $jumlah=request('jumlah');


        if(
            $zona == 'utara' ||
            $zona == 'selatan' ||
            $zona == 'timur'
        ){
            $hargaPerTiket = 500000;
        }
        elseif($zona == 'vipbarat')
        {
            $hargaPerTiket = 1000000;
        }
        elseif($zona == 'vvipbarat')
        {
            $hargaPerTiket = 2000000;
        }
        else
        {
            $hargaPerTiket = 0;
        }

        $totalHarga = $jumlah * $hargaPerTiket;


        // $hargaPerTiket = request('harga_per_tiket');
        // $totalHarga = $jumlah * $hargaPerTiket;
        return view('event.checkout',
        compact('event','zona','blok','kursi','jumlah','hargaPerTiket','totalHarga'));
    }

    public function confirmCheckout(
            Request $request,
            $id
        )
        {
            Order::create([

                'id_user' =>
                    Auth::user()->id_user,

                'id_event' =>
                    $id,

                'tribun' =>
                    $request->zona,

                'blok' =>
                    $request->blok,

                'kursi' =>
                    $request->kursi,

                'jumlah' =>
                    $request->jumlah,

                'total_harga' =>
                    $request->total_harga,

                'status' =>
                    'pending'
            ]);

            return redirect('/')
                    ->with(
                        'success',
                        'Pesanan berhasil dibuat'
                    );
        }

    // LANGKAH 3: HALAMAN PILIH KURSI / SEAT MAP
    // public function pilihKursi($id, $id_tiket)
    // {
    //     $event = Event::findOrFail($id);
    //     $ticket = Ticket::findOrFail($id_tiket); // Berisi data harga & nama tribun spesifik

    //     $seats = DB::table('seats')
    //             ->where('id_ticket', $id_tiket)
    //             ->get();

    //     // Halaman ini yang nanti menampilkan blok dan kursi
    //     return view('event.select-seat', compact('event', 'ticket', 'seats'));
    // }

    // public function pilihKursiLangsung($id, $kategori)
    // {
    //     $event = \App\Models\Event::findOrFail($id);
        
    //     // Cari tribun (ticket) pertama yang cocok dengan kategori ini
    //     $tribun = \App\Models\Ticket::where('id_event', $id)
    //                                 ->where('kategori', $kategori)
    //                                 ->firstOrFail();
        
    //     // Ambil kursi berdasarkan ID Tribun tersebut
    //     $seats = \Illuminate\Support\Facades\DB::table('seats')
    //                 ->where('id_ticket', $tribun->id_ticket)
    //                 ->get();

    //     return view('event.pilih-kursi', compact('event', 'tribun', 'seats'));
    // }

    // public function pilihKursi($id, $id_ticket)
    // {
    //     // Cari data event dan tiket tribun
    //     $event = \App\Models\Event::findOrFail($id);
    //     $tribun = \App\Models\Ticket::findOrFail($id_ticket);
        
    //     // Panggil 20 kursi dari database berdasarkan ID tribun tersebut
    //     $seats = DB::table('seats')->where('id_ticket', $id_ticket)->get();

    //     return view('event.pilih-kursi', compact('event', 'tribun', 'seats'));
    // }
    // public function tickets($id)
    // {
    //     $event = Event::with('tickets')
    //                     ->findOrFail($id);

    //     // return view(
    //         'event.tickets',
    //         compact('event')
    //     );
    // }

    // public function pilihTribun($id)
    // {
    //     $event = Event::with('tickets')
    //                     ->findOrFail($id);

    //     return view(
    //         'seats.select-seat',
    //         compact('event')
    //     );
    // }

    // public function pilihKursiSpesifik($id, $ticket_id)
    // {
    //     // Mengambil data event dan tiket tanpa meload 40.000 data kursi sekaligus
    //     $event = \App\Models\Event::findOrFail($id);
    //     $ticket = \App\Models\Ticket::findOrFail($ticket_id);

    //     return view('seats.select-seat', compact('event', 'ticket'));
    // }
}