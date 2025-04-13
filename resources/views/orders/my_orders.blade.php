@extends('layouts.main')

@section('content')
    @include('templates.header')
    @include('page.navbar')
    <div class="container">
        <h2>Daftar Order Saya</h2>

        @if($orders->isEmpty())
            <p>Belum ada order untuk customer ID: {{ $customer_id }}</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID Order</th>
                        <th>Jasa</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Status</th>
                        <th>Dibuat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->order_id }}</td>
                        <td>{{ $order->jasa->nama_jasa ?? '-' }}</td>
                        <td>{{ $order->start_date }}</td>
                        <td>{{ $order->end_date }}</td>
                        <td>
                            {{ ucfirst($order->status ?? 'pending') }}
                            
                            @if(($order->status ?? 'pending') === 'pending')
                                <form action="{{ route('pay.start', ['order_id' => $order->order_id]) }}" method="POST" style="margin-top: 0.5rem;">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-warning">Pay</button>
                                </form>
                            @endif
                        </td>
                        <td>{{ $order->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
