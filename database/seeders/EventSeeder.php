<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('events')->insert([

            [
                'nama_event' => 'Persipura vs Persija',
                'deskripsi' => 'Pertandingan Liga Indonesia',
                'tanggal' => '2026-05-20',
                'jam' => '19:00:00',
                'banner' => 'persipura.jpg',
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama_event' => 'Persipura vs Arema',
                'deskripsi' => 'Big Match Stadion Lukas Enembe',
                'tanggal' => '2026-05-25',
                'jam' => '20:00:00',
                'banner' => 'arema.jpg',
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}