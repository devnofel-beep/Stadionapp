<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $primaryKey = 'id_ticket';

    protected $fillable = [

        'id_event',
        'nama_zona',
        'kategori',
        'harga',
        'kuota'

    ];
}