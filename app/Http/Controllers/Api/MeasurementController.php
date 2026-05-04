<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Measurement; // ❗ YE LINE MISSING THI

class MeasurementController extends Controller
{
    public function store(Request $request)
    {
        $measurement = Measurement::create($request->all());

        return response()->json([
            'message' => 'Measurement added',
            'data' => $measurement
        ]);
    }

    public function index()
    {
        return Measurement::all();
    }

    public function show($id)
    {
        return Measurement::find($id);
    }

    public function update(Request $request, $id)
    {
        $measurement = Measurement::find($id);

        if (!$measurement) {
            return response()->json(['message' => 'Not found'], 404);
        }

        $measurement->update($request->all());

        return response()->json([
            'message' => 'Measurement updated',
            'data' => $measurement
        ]);
    }

    public function destroy($id)
    {
        $measurement = Measurement::find($id);

        if (!$measurement) {
            return response()->json(['message' => 'Not found'], 404);
        }

        $measurement->delete();

        return response()->json(['message' => 'Measurement deleted']);
    }
}