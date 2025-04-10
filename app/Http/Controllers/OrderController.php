<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data yang dikirim
        $request->validate([
            'jasa_id' => 'required|uuid',
            'customer_id' => 'required|uuid',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $jasa = Jasa::where('jasa_id', $request->jasa_id)->firstOrFail();
        $totalHarga = $jasa->price;
        $dpHarga = $totalHarga * 0.3; // contoh: 30% dari total sebagai DP

        // Buat order
        $order = Order::create([
            'customer_id' => $request->customer_id,
            'jasa_id' => $request->jasa_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_harga' => $totalHarga,
            'dp_harga' => $dpHarga,
            'payment_status' => 'pending',
            'created_by' => Auth::check() ? Auth::user()->user_id : null,
        ]);

        return response()->json([
            'success' => true,
            'order_id' => $order->order_id,
        ]);
    }

    public function events(Request $request)
    {
        $request->validate([
            'jasa_id' => 'required|uuid',
            'customer_id' => 'required|uuid',
        ]);

        $orders = Order::where('jasa_id', $request->jasa_id)
            ->where('customer_id', $request->customer_id)
            ->get(['start_date', 'end_date', 'order_id']);

        $events = $orders->map(function ($order) {
            return [
                'title' => 'Booking #' . substr($order->order_id, 0, 6),
                'start' => $order->start_date,
                'end' => date('Y-m-d', strtotime($order->end_date . ' +1 day')), // FullCalendar needs end-exclusive
                'color' => '#28a745',
            ];
        });

        return response()->json($events);
    }
}
