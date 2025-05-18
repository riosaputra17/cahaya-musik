<?php

namespace App\Http\Controllers;

use App\Mail\PaymentSuccessMail;
use App\Models\Jasa;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        $dpHarga = $jasa->dp_price;

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

    public function paymentSuccess(Order $o)
    {
        $order = Order::where('order_id', $o->order_id)->firstOrFail();
        $order->payment_status = 'success';
        $order->save();

        // Ambil email dan nama user
        $customerEmail = $order->customer->email ?? $order->email; // Sesuaikan dengan struktur relasi Anda
        $customerName = $order->customer->name ?? 'Pelanggan';

        // Kirim email ke user
        Mail::to($customerEmail)->send(new PaymentSuccessMail($customerName));

        // Kirim email ke admin (Gmail Anda)
        Mail::to('riobadrun1721@gmail.com')->send(new PaymentSuccessMail($customerName));

        $orders = Order::where('customer_id', $order->customer_id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('orders.my_orders', compact('orders'));
    }

    public function events()
    {

        $orders = Order::all(['start_date', 'end_date', 'order_id', 'payment_status']);

        $events = $orders->map(function ($order) {
            $color = $order->payment_status === 'pending' ? '#ffc107' : '#28a745';
            $title = $order->payment_status === 'pending' ? 'Booking Pending #' . substr($order->order_id, 0, 6) : 'Booking #' . substr($order->order_id, 0, 6);
            return [
                'title' => $title,
                'start' => $order->start_date,
                'end' => date('Y-m-d', strtotime($order->end_date . ' +1 day')), // FullCalendar needs end-exclusive
                'color' => $color,
            ];
        });

        return response()->json($events);
    }

    public function myOrders($customer_id)
    {
        $orders = Order::where('customer_id', $customer_id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('orders.my_orders', compact('orders', 'customer_id'));
    }
}
