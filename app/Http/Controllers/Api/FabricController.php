<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Fabric;
use Illuminate\Http\Request;

class FabricController extends Controller
{
    // Get all fabrics
    public function index()
    {
        $fabrics = Fabric::all();
        return response()->json($fabrics);
    }

    // Store new fabric
    public function store(Request $request)
    {
        $fabric = Fabric::create($request->all());
        return response()->json($fabric, 201);
    }

    // Show single fabric
    public function show($id)
    {
        $fabric = Fabric::find($id);
        if (!$fabric) {
            return response()->json(['message' => 'Fabric not found'], 404);
        }
        return response()->json($fabric);
    }

    // Update fabric
    public function update(Request $request, $id)
    {
        $fabric = Fabric::find($id);
        if (!$fabric) {
            return response()->json(['message' => 'Fabric not found'], 404);
        }

        $fabric->update($request->all());
        return response()->json($fabric);
    }

    // Delete fabric
    public function destroy($id)
    {
        $fabric = Fabric::find($id);
        if (!$fabric) {
            return response()->json(['message' => 'Fabric not found'], 404);
        }

        $fabric->delete();
        return response()->json(['message' => 'Fabric deleted']);
    }
}