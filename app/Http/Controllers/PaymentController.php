<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;

class PaymentController extends Controller
{
    // ➕ Add Payment
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'amount' => 'required|numeric',
            'payment_method' => 'required',
        ]);

        $order = Order::find($request->order_id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        // total paid till now
        $totalPaid = Payment::where('order_id', $request->order_id)->sum('amount');
        $newTotalPaid = $totalPaid + $request->amount;

        $remaining = $order->total_amount - $newTotalPaid;

        // status logic
        if ($remaining <= 0) {
            $status = 'paid';
            $remaining = 0;
        } elseif ($newTotalPaid > 0) {
            $status = 'partial';
        } else {
            $status = 'pending';
        }

        $payment = Payment::create([
            'order_id' => $request->order_id,
            'client_id' => $order->client_id,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'payment_type' => $request->payment_type ?? 'partial',
            'transaction_id' => $request->transaction_id,
            'payment_date' => $request->payment_date ?? date('Y-m-d'),
            'remaining_balance' => $remaining,
            'received_by' => $request->received_by,
            'status' => $status,
            'notes' => $request->notes
        ]);

        return response()->json([
            'message' => 'Payment added successfully',
            'payment' => $payment
        ]);
    }

    // 📄 Get all payments
    public function index()
    {
        return Payment::with('order')->get();
    }

    // 👤 Payments by Order
    public function byOrder($order_id)
    {
        return Payment::where('order_id', $order_id)->get();
    }

    // 💰 Remaining Balance
    public function balance($order_id)
    {
        $order = Order::find($order_id);

        $paid = Payment::where('order_id', $order_id)->sum('amount');
        $remaining = $order->total_amount - $paid;

        return response()->json([
            'total' => $order->total_amount,
            'paid' => $paid,
            'remaining' => $remaining
        ]);
    }
}
