<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $primaryKey = 'id_event';

    protected $fillable = [

        'nama_event',

        'deskripsi',

        'tanggal',

        'jam',

        'banner',

        'status'

    ];

    public function tickets()
    {
        return $this->hasMany(
            Ticket::class,
            'id_event',
            'id_event'
        );
    }
}