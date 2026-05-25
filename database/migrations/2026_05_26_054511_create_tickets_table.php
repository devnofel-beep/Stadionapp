<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {

            $table->id('id_ticket');

            $table->unsignedBigInteger('id_event');

            $table->string('nama_zona');

            $table->enum('kategori', [
                'umum',
                'vip',
                'vvip'
            ]);

            $table->integer('harga');

            $table->integer('kuota');

            $table->timestamps();

            $table->foreign('id_event')
                  ->references('id_event')
                  ->on('events')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};