<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment.midtrans.payment');
    }

    public function pay(Request $request)
    {
        $params = [
            'transaction_details' => [
                'order_id' => rand(),
                'gross_amount' => 10000,
            ],
            'customer_details' => [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john.doe@example.com',
                'phone' => '08123456789',
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        return view('payment.midtrans.payment', compact('snapToken'));
    }

    public function callback(Request $request)
    {
        $notif = new \Midtrans\Notification();
        $status = $notif->transaction_status;

        // Update status transaksi di database sesuai $notif->order_id

        return response()->json(['message' => 'Callback processed']);
    }
}
