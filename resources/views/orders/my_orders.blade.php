@extends('layouts.main')

@section('content')
    @include('templates.header')
    @include('page.navbar')
    <div class="container">
        @if ($errors->has('midtrans'))
            <div class="alert-error">
                {{ $errors->first('midtrans') }}
            </div>
        @endif
        <h2>Daftar Order Saya</h2>

        @if ($orders->isEmpty())
            <div class="empty-state">
                <p>Belum ada order untuk customer ID: {{ $customer_id }}</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID Order</th>
                            <th>Jasa</th>
                            <th>Total DP</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Status</th>
                            <th>Dibuat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td data-label="ID Order">{{ $order->order_id }}</td>
                                <td data-label="Jasa">{{ $order->jasa->nama_jasa ?? '-' }}</td>
                                <td data-label="Total DP">
                                    {{ $order->dp_harga ? 'Rp' . number_format($order->dp_harga, 0, ',', '.') : '-' }}</td>
                                <td data-label="Tanggal Mulai">{{ $order->start_date }}</td>
                                <td data-label="Tanggal Selesai">{{ $order->end_date }}</td>
                                <td data-label="Status">
                                    <div class="status-container">
                                        <span
                                            class="status-badge status-{{ strtolower($order->payment_status ?? 'pending') }}">
                                            {{ ucfirst($order->payment_status ?? 'pending') }}
                                        </span>
                                        @if (($order->payment_status ?? 'pending') === 'pending')
                                            <form action="{{ route('pay.start', ['order_id' => $order->order_id]) }}"
                                                method="POST" class="pay-form">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-warning">Bayar</button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                                <td data-label="Dibuat">{{ $order->created_at->format('d-m-Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
