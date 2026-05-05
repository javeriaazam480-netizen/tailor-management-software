<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class ReportController extends Controller
{
    public function dashboard()
    {
        // Total bookings
        $totalBookings = Booking::count();

        // Total sales (net total)
        $totalSales = Booking::sum('net_total');

        // Total paid amount
        $totalPaid = Booking::sum('paid_amount');

        // Pending balance
        $pendingBalance = Booking::sum('balance');

        // Delivered bookings
        $delivered = Booking::where('status', 'delivered')->count();

        // Pending bookings
        $pending = Booking::where('status', 'pending')->count();

        // Cancelled bookings
        $cancelled = Booking::where('status', 'cancelled')->count();

        return response()->json([
            'total_bookings' => $totalBookings,
            'total_sales' => $totalSales,
            'total_paid' => $totalPaid,
            'pending_balance' => $pendingBalance,
            'delivered_orders' => $delivered,
            'pending_orders' => $pending,
            'cancelled_orders' => $cancelled,
        ]);
    }
}