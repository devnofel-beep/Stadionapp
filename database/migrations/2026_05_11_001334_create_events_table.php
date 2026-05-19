<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
    * run the Migration.
    */

    public function up(): void
    {
        Schema::create('events', function (Blueprint $table){
            $table->id('id_event');
            $table->string('nama_event');
            $table->text('deskripsi')->nullable();
            $table->date('tanggal');
            $table->time('jam');
            $table->string('banner')->nullable();
            $table->enum('status', ['aktif','selesai'])
                  ->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void 
    {
        Schema::dropIfExists('events');
    }
};