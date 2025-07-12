@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Order: {{ $data['order']->order_id }}</h3>
        </div>
        <form action="{{ route('admin.transaksi.update', $data['order']->order_id) }}" method="POST">
            @csrf
            @method('PUT') {{-- Method override untuk PUT --}}
            <div class="card-body">
                {{-- Customer --}}
                <div class="form-group">
                    <label for="customer_id">Customer</label>
                    <select name="customer_id" id="customer_id" class="form-control @error('customer_id') is-invalid @enderror">
                        @foreach ($data['customers'] as $customer)
                            <option value="{{ $customer->customer_id }}" 
                                {{ old('customer_id', $data['order']->customer_id) == $customer->customer_id ? 'selected' : '' }}>
                                {{ $customer->nama }}
                            </option>
                        @endforeach

                    </select>
                    @error('customer_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Jasa --}}
                <div class="form-group">
                    <label for="jasa_id">Jasa</label>
                    <select name="jasa_id" id="jasa_id" class="form-control @error('jasa_id') is-invalid @enderror">
                        @foreach ($data['jasas'] as $jasa)
                            <option value="{{ $jasa->jasa_id }}" {{ old('jasa_id', $data['order']->jasa_id) == $jasa->jasa_id ? 'selected' : '' }}>
                                {{ $jasa->nama_jasa }}
                            </option>
                        @endforeach
                    </select>
                    @error('jasa_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Tanggal Mulai --}}
                <div class="form-group">
                    <label for="start_date">Tanggal Mulai</label>
                    @php
                        $startDate = old('start_date', $data['order']->start_date ?? '');
                        $startDate = substr($startDate, 0, 10); // ambil hanya YYYY-MM-DD
                    @endphp

                    <input type="date" name="start_date" id="start_date"
                        class="form-control @error('start_date') is-invalid @enderror"
                        value="{{ $startDate }}">

                    @error('start_date')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Tanggal Selesai --}}
                <div class="form-group">
                    <label for="end_date">Tanggal Selesai</label>
                    @php
                        $endDate = old('end_date', $data['order']->end_date ?? '');
                        $endDate = substr($endDate, 0, 10); // Ambil hanya tanggal (tanpa jam)
                    @endphp

                    <input type="date" name="end_date" id="end_date"
                        class="form-control @error('end_date') is-invalid @enderror"
                        value="{{ $endDate }}">

                    @error('end_date')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Total Harga --}}
                <div class="form-group">
                    <label for="total_harga">Total Harga (Rp)</label>
                    <input type="number" name="total_harga" id="total_harga"
                        class="form-control @error('total_harga') is-invalid @enderror"
                        value="{{ old('total_harga', $data['order']->total_harga) }}">
                    @error('total_harga')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                {{-- DP Harga --}}
                <div class="form-group">
                    <label for="dp_harga">DP Harga (Rp)</label>
                    <input type="number" name="dp_harga" id="dp_harga"
                        class="form-control @error('dp_harga') is-invalid @enderror"
                        value="{{ old('dp_harga', $data['order']->dp_harga) }}">
                    @error('dp_harga')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Status Pembayaran --}}
                <div class="form-group">
                    <label for="payment_status">Status Pembayaran</label>
                    <select name="payment_status" id="payment_status" class="form-control @error('payment_status') is-invalid @enderror">
                        <option value="pending" {{ old('payment_status', $data['order']->payment_status) == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="success" {{ old('payment_status', $data['order']->payment_status) == 'success' ? 'selected' : '' }}>Success</option>
                    </select>
                    @error('payment_status')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('admin.transaksi.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection
