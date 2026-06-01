<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seat;
use Illuminate\Support\Facades\DB;

class SeatController extends Controller
{
    // 1. API untuk mengambil kursi berdasarkan blok (dipanggil via fetch/AJAX)
    public function getSeatsByBlock($ticket_id, $block_name)
    {
        $seats = Seat::where('id_ticket', $ticket_id)
                     ->where('nama_block', $block_name)
                     ->get();
                     
        return response()->json($seats);
    }

    // 2. Fungsi untuk mengunci kursi saat diklik (Seat Locking)
    public function lockSeat(Request $request)
    {
        $request->validate([
            'id_seat' => 'required|exists:seats,id'
        ]);

        // Gunakan DB Transaction agar aman
        return DB::transaction(function () use ($request) {
            
            // lockForUpdate() mengunci baris data ini di database 
            // sampai proses transaksi selesai
            $seat = Seat::where('id', $request->id_seat)->lockForUpdate()->first();

            if ($seat->status !== 'available') {
                return response()->json(['message' => 'Maaf, kursi sudah direbut orang lain!'], 409);
            }

            // Ubah status menjadi reserved (dikunci sementara)
            $seat->update(['status' => 'reserved']);

            return response()->json([
                'message' => 'Kursi berhasil diamankan! Silakan lanjut bayar.', 
                'seat' => $seat
            ]);
        });
    }
}