<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    public function up(): void
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->id('id_seat'); // Saya ubah jadi id_seat agar konsisten dengan id_ticket & id_event
            
            // PERBAIKAN TYPO (id_ticket, bukan id_tickets)
            $table->foreignId('id_ticket')->constrained('tickets', 'id_ticket')->onDelete('cascade');
            
            $table->string('nama_tribun'); // misal: Tribun Utara
            $table->string('nama_blok');   // misal: Blok A
            $table->string('baris');       // misal: Baris 1
            $table->string('nomor_kursi'); // misal: A1, A2
            $table->enum('status', ['tersedia', 'dipesan', 'terjual'])->default('tersedia');
            $table->timestamps();
        });
    }
    // public function up(): void
    // {
    //     Schema::create('seats', function (Blueprint $table) {
    //         $table->id();
    //         $table->foreignId('id_ticket')->constrained('tickets','id_tickets')->onDelete('cascade');
    //         $table->string('tribune_name');  
    //         $table->string('block_name');
    //         $table->string('row_name');
    //         $table->string('seat_number');
    //         $table->enum('status',['available','reserved','sold'])->default('available');
    //         $table->timestamps();
    //     });
    // }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seats');
    }
};
