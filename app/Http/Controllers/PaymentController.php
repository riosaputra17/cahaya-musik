<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment.midtrans.payment');
    }

    public function pay($order_id)
    {
        $order = Order::findOrFail($order_id);

        // Sudah punya token? Gunakan ulang
        if ($order->snap_token) {
            $snapToken = $order->snap_token;
        } else {
            $params = [
                'transaction_details' => [
                    'order_id' => $order->order_id,
                    'gross_amount' => $order->dp_harga ?? 300000,
                ],
                'customer_details' => [
                    'first_name' => $order->customer->nama,
                    'email' => $order->customer->email,
                    'phone' => $order->customer->phone,
                ],
            ];

            try {
                $snapToken = Snap::getSnapToken($params);
                $order->snap_token = $snapToken;
                $order->save();
            } catch (\Exception $e) {
                return back()->withErrors([
                    'midtrans' => 'Gagal mendapatkan token Midtrans: ' . $e->getMessage()
                ]);
            }
        }

        return view('payment.midtrans.payment', compact('snapToken', 'order'));
    }

    public function callback(Request $request)
    {
        $notif = new \Midtrans\Notification();
        $status = $notif->transaction_status;

        // Update status transaksi di database sesuai $notif->order_id

        return response()->json(['message' => 'Callback processed']);
    }
}
