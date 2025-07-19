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

        // Cek status
        if (in_array($order->status, ['paid', 'success', 'expired'])) {
            return redirect()->route('home')->with('warning', 'Pesanan ini sudah tidak dapat dibayar.');
        }

        $amount = $order->dp_harga ?? 300000;

        if ($amount <= 0) {
            return back()->withErrors(['harga' => 'Harga pembayaran tidak valid.']);
        }

        // Sudah punya token? Gunakan ulang
        if ($order->snap_token) {
            $snapToken = $order->snap_token;
        } else {
            $params = [
                'transaction_details' => [
                    'order_id' => $order->order_id,
                    'gross_amount' => $amount,
                ],
                'customer_details' => [
                    'first_name' => $order->customer->nama,
                    'email' => $order->customer->email,
                    'phone' => $order->customer->phone,
                ],
                'expiry' => [
                    'start_time' => now()->format('Y-m-d H:i:s O'),
                    'unit' => 'minutes',
                    // 'unit' => 'seconds',
                    'duration' => 60 // expired dalam 1 jam
                    // 'duration' => 25
                ],
            ];

            try {
                $snapToken = Snap::getSnapToken($params);
                $order->snap_token = $snapToken;
                $order->expired_at = now()->addMinutes(60);
                // $order->expired_at = now()->addSeconds(25);
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
