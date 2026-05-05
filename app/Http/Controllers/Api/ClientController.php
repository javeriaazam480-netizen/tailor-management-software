<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller; // 🔴 THIS WAS MISSING
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // CREATE CLIENT
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required'
        ]);

        $client = Client::create($request->all());

        return response()->json([
            'message' => 'Client created successfully',
            'client' => $client
        ]);
    }

    // GET ALL CLIENTS
    public function index()
    {
        return response()->json(Client::all());
    }
}