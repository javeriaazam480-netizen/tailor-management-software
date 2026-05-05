<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    // GET all deliveries
    public function index()
    {
        return response()->json(Delivery::all());
    }

    // CREATE delivery
    public function store(Request $request)
    {
        $delivery = Delivery::create([
            'order_id' => $request->order_id,
            'client_id' => $request->client_id,
            'delivery_type' => $request->delivery_type,
            'status' => $request->status,
            'delivery_date' => $request->delivery_date,
            'received_by' => $request->received_by,
            'notes' => $request->notes,
        ]);

        return response()->json($delivery, 201);
    }

    // GET single delivery
    public function show($id)
    {
        $delivery = Delivery::find($id);

        if (!$delivery) {
            return response()->json(['message' => 'Delivery not found'], 404);
        }

        return response()->json($delivery);
    }

    // UPDATE delivery
    public function update(Request $request, $id)
    {
        $delivery = Delivery::find($id);

        if (!$delivery) {
            return response()->json(['message' => 'Delivery not found'], 404);
        }

        $delivery->update($request->only([
            'order_id',
            'client_id',
            'delivery_type',
            'status',
            'delivery_date',
            'received_by',
            'notes'
        ]));

        return response()->json($delivery);
    }

    // DELETE delivery
    public function destroy($id)
    {
        $delivery = Delivery::find($id);

        if (!$delivery) {
            return response()->json(['message' => 'Delivery not found'], 404);
        }

        $delivery->delete();

        return response()->json(['message' => 'Delivery deleted successfully']);
    }
}