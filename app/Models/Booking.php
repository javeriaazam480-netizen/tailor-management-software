<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'ref_no',
        'inv_book_no',
        'customer_id',
        'customer_name',
        'phone',
        'booking_date',
        'delivery_date',
        'first_trial',
        'final_trial',
        'urgent',
        'after_eid',
        'home_delivery',
        'cancelled',
        'delivered',
        'damage',
        'break_item',
        'remarks',
        'total',
        'discount',
        'net_total',
        'paid_amount',
        'balance',
        'payment_method',
        'user',
        'status',
        'advance_payment',
        'delivery_address',
        'assigned_worker_id'
    ];
}