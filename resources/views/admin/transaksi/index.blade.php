@extends('layouts.admin')
@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Tutup">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Daftar Order</h3>
            <a href="{{ route('admin.transaksi.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Order
            </a>
        </div>
        <div class="card-body">
            @if(count($data['order']) > 0)
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Order</th>
                            <th>Customer</th>
                            <th>List Layanan</th>
                            <th>Harga</th>
                            <th>Harga DP</th>
                            <th>Waktu Acara</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['order'] as $index => $order)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $order->jasa->nama_jasa }}</td>
                                <td>{{ $order->customer->nama ?? '-' }}</td>
                                <td>
                                    <ul class="mb-0 pl-3">
                                        @foreach(explode('|', $order->jasa->list_services) as $service)
                                            <li>{{ trim($service) }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>Rp {{ number_format($order->jasa->price, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($order->jasa->dp_price, 0, ',', '.') }}</td>
                                <td>{{ $order->start_date }} s/d {{ $order->end_date }}</td>
                                <td>{{ $order->payment_status }}</td>
                                <td class="d-flex gap-1">
                                    <a href="{{ route('admin.transaksi.edit', $order->order_id) }}"
                                        class="btn btn-sm btn-warning mr-1">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.transaksi.destroy', $order->order_id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus order ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-info mb-0">
                    Tidak ada data order.
                </div>
            @endif
        </div>
    </div>
@endsection
