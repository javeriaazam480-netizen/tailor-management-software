<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'client_id',
        'amount',
        'payment_method',
        'payment_type',
        'transaction_id',
        'payment_date',
        'remaining_balance',
        'received_by',
        'status',
        'notes'
    ];

    // 🔗 Relationship: Payment belongs to Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // 🔗 Relationship: Payment belongs to Client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}