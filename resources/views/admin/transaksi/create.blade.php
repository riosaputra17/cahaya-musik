@extends('layouts.admin')

@section('content')
    @if(session('success'))
        <script>
            alert('Order berhasil! ID: {{ session('order_id') }}');
        </script>
    @endif
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Order</h3>
        </div>
        <form action="{{ route('admin.transaksi.store') }}" method="POST">
            @csrf
            <div class="card-body">
                {{-- Pilih Customer --}}
                <div class="form-group">
                    <label for="customer_id">Customer</label>
                    <select name="customer_id" id="customer_id" class="form-control @error('customer_id') is-invalid @enderror">
                        <option value="">-- Pilih Customer --</option>
                        @foreach($data['customers'] as $customer)
                            <option value="{{ $customer->customer_id }}" {{ old('customer_id') == $customer->customer_id ? 'selected' : '' }}>
                                {{ $customer->nama }} ({{ $customer->phone }})
                            </option>
                        @endforeach
                    </select>
                    @error('customer_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Pilih Jasa --}}
                <div class="form-group">
                    <label for="jasa_id">Jasa</label>
                    <select name="jasa_id" id="jasa_id" class="form-control @error('jasa_id') is-invalid @enderror">
                        <option value="">-- Pilih Jasa --</option>
                        @foreach($data['jasas'] as $jasa)
                            <option value="{{ $jasa->jasa_id }}" {{ old('jasa_id') == $jasa->jasa_id ? 'selected' : '' }}>
                                {{ $jasa->nama_jasa }} (Rp{{ number_format($jasa->price,0,',','.') }})
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
                    <input type="date" name="start_date" id="start_date"
                        class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date') }}">
                    @error('start_date')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Tanggal Selesai --}}
                <div class="form-group">
                    <label for="end_date">Tanggal Selesai</label>
                    <input type="date" name="end_date" id="end_date"
                        class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date') }}">
                    @error('end_date')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('admin.transaksi.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
