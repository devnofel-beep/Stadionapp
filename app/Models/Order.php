<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $table = 'orders';

    protected $primaryKey = 'id_order';

    protected $fillable = [
        'id_user',
        'id_event',
        'id_ticket',
        'tribun',
        'blok',
        'kursi',
        'jumlah',
        'total_harga',
        'status'
    ];
}
