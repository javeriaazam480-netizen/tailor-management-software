<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = [
        'order_id',
        'client_id',
        'delivery_type',
        'status',
        'delivery_date',
        'received_by',
        'notes',
    ];
}