<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    // ➕ CREATE ORDER
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'total_amount' => 'required|numeric',
        ]);

        $order = Order::create([
            'client_id' => $request->client_id,
            'created_by' => $request->created_by,
            'order_number' => 'ORD-' . time(),
            'garment_type' => $request->garment_type,
            'order_date' => $request->order_date ?? date('Y-m-d'),
            'delivery_date' => $request->delivery_date,
            'status' => 'pending',
            'status_updated_at' => now(),
            'total_amount' => $request->total_amount,
            'advance_paid' => $request->advance_paid ?? 0,
            'remaining_amount' => $request->total_amount - ($request->advance_paid ?? 0),
            'payment_status' => ($request->advance_paid > 0) ? 'partial' : 'pending',
            'notes' => $request->notes
        ]);

        return response()->json([
            'message' => 'Order created successfully',
            'order' => $order
        ]);
    }

    // 📄 GET ALL ORDERS
    public function index()
    {
        return Order::with('client', 'payments')->get();
    }

    // 👁 SINGLE ORDER
    public function show($id)
    {
        return Order::with('client', 'payments')->find($id);
    }

    // ✏️ UPDATE ORDER
    public function update(Request $request, $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $order->update($request->all());

        return response()->json([
            'message' => 'Order updated successfully',
            'order' => $order
        ]);
    }

    // ❌ DELETE ORDER
    public function destroy($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $order->delete();

        return response()->json([
            'message' => 'Order deleted successfully'
        ]);
    }
}
