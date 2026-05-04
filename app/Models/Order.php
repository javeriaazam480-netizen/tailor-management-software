<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'created_by',
        'order_number',
        'garment_type',
        'order_date',
        'delivery_date',
        'status',
        'status_updated_at',
        'total_amount',
        'advance_paid',
        'remaining_amount',
        'payment_status',
        'notes'
    ];

    // 🔗 Client relation
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // 🔗 Payments relation
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}