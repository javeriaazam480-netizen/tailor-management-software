<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // GET ALL BOOKINGS
    public function index()
    {
        return response()->json(Booking::all());
    }

    // CREATE BOOKING
    public function store(Request $request)
    {
        $booking = Booking::create([
            'ref_no' => $request->ref_no,
            'inv_book_no' => $request->inv_book_no,
            'customer_id' => $request->customer_id,
            'customer_name' => $request->customer_name,
            'phone' => $request->phone,
            'booking_date' => $request->booking_date,
            'delivery_date' => $request->delivery_date,
            'first_trial' => $request->first_trial,
            'final_trial' => $request->final_trial,
            'urgent' => $request->urgent ?? 0,
            'after_eid' => $request->after_eid ?? 0,
            'home_delivery' => $request->home_delivery ?? 0,
            'cancelled' => $request->cancelled ?? 0,
            'delivered' => $request->delivered ?? 0,
            'damage' => $request->damage ?? 0,
            'break_item' => $request->break_item ?? 0,
            'remarks' => $request->remarks,
            'total' => $request->total,
            'discount' => $request->discount,
            'net_total' => $request->net_total,
            'paid_amount' => $request->paid_amount,
            'balance' => $request->balance,
            'payment_method' => $request->payment_method,
            'user' => $request->user,
            'status' => $request->status ?? 'pending',
            'advance_payment' => $request->advance_payment,
            'delivery_address' => $request->delivery_address,
            'assigned_worker_id' => $request->assigned_worker_id,
        ]);

        return response()->json($booking, 201);
    }

    // GET SINGLE BOOKING
    public function show($id)
    {
        $booking = Booking::find($id);

        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        return response()->json($booking);
    }

    // UPDATE BOOKING
    public function update(Request $request, $id)
    {
        $booking = Booking::find($id);

        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        $booking->update($request->all());

        return response()->json($booking);
    }

    // DELETE BOOKING
    public function destroy($id)
    {
        $booking = Booking::find($id);

        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        $booking->delete();

        return response()->json(['message' => 'Booking deleted']);
    }
}