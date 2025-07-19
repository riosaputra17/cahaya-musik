<?php

namespace App\Http\Controllers;

use App\Mail\PaymentSuccessMail;
use App\Models\Customer;
use App\Models\Jasa;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    // Menampilkan daftar order dengan relasi customer dan jasa
    public function index()
    {
        $judul = "Order";
        $data['order'] = Order::with(['customer', 'jasa'])
            ->orderBy('payment_status', 'asc')
            ->get();

        return view('admin.transaksi.index', compact('data', 'judul'));
    }

    // Menampilkan form tambah jasa
    public function create()
    {
        $judul = "Tambah Transaksi";
        $data['jasas'] = Jasa::all();
        $data['customers'] = Customer::with('user')->get();
        return view('admin.transaksi.create', compact('data', 'judul'));
    }

    public function edit($id)
    {
        $data['order'] = Order::with(['customer', 'jasa'])->findOrFail($id);
        $data['jasas'] = Jasa::all();
        $data['customers'] = Customer::all();
        $judul = "Edit Order";

        return view('admin.transaksi.edit', compact('data', 'judul'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'customer_id' => 'required|exists:customers,customer_id',
            'jasa_id' => 'required|exists:jasa,jasa_id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'total_harga' => 'required|numeric|min:0',
            'dp_harga' => 'required|numeric|min:0',
            'payment_status' => 'required|in:pending,success',
        ]);

        // Ambil data order
        $order = Order::findOrFail($id);

        // Update data
        $order->update([
            'customer_id' => $request->customer_id,
            'jasa_id' => $request->jasa_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_harga' => $request->total_harga,
            'dp_harga' => $request->dp_harga,
            'payment_status' => $request->payment_status,
            'updated_by' => auth()->id(), // Jika kolom ini tersedia
        ]);

        return redirect()->route('admin.transaksi.index')
            ->with('success', 'Data order berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.transaksi.index')->with('success', 'Data order berhasil dihapus.');
    }

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

        if ($request->from_expired === "1") {
            $orders = Order::where('customer_id', $request->customer_id)
                ->orderBy('created_at', 'desc')
                ->get();
            return view('orders.my_orders', compact('orders'));
        }

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
        $customerName = $order->customer->nama ?? 'Pelanggan';

        $jasa = $order->jasa;
        $jasaNama = $jasa->nama_jasa ?? '-';
        $jasaHarga = $jasa->price ?? 0;
        $jasaDp = $jasa->dp_price ?? 0;
        $jasaLayanan = $jasa->list_services ?? '-';

        // Kirim email ke customer
        Mail::to($customerEmail)->send(new PaymentSuccessMail($customerName, $jasaNama, $jasaHarga, $jasaDp, $jasaLayanan));

        // Kirim email ke admin
        Mail::to('riobadrun1721@gmail.com')->send(new PaymentSuccessMail($customerName, $jasaNama, $jasaHarga, $jasaDp, $jasaLayanan));

        $orders = Order::where('customer_id', $order->customer_id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('orders.my_orders', compact('orders'));
    }

    public function paymentPending(Order $o)
    {
        $order = Order::where('order_id', $o->order_id)->firstOrFail();
        $orders = Order::where('customer_id', $order->customer_id)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('payment.pending', compact('order', 'orders',));
    }

    public function paymentExpired(Order $order)
    {
        $order->update(['payment_status' => 'expired']);

        return view('payment.expired', compact('order'));
    }

    public function events()
    {

        $orders = Order::with('jasa')
            ->where('payment_status', '!=', 'expired')
            ->get(['start_date', 'end_date', 'order_id', 'payment_status', 'jasa_id']);

        $events = $orders->map(function ($order) {
            $color = $order->payment_status === 'pending' ? '#ffc107' : '#28a745';
            $title = $order->payment_status === 'pending'
                ? 'Pending'
                : 'Booked';
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
