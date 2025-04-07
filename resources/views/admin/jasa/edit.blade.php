@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Jasa: {{ $jasa->nama_jasa }}</h3>
        </div>
        <form action="{{ route('admin.jasa.update', $jasa->jasa_id) }}" method="POST">
            @csrf
            @method('PUT') {{-- Method override untuk PUT --}}
            <div class="card-body">
                {{-- Nama Jasa --}}
                <div class="form-group">
                    <label for="nama_jasa">Nama Jasa</label>
                    <input type="text" name="nama_jasa" id="nama_jasa"
                        class="form-control @error('nama_jasa') is-invalid @enderror"
                        value="{{ old('nama_jasa', $jasa->nama_jasa) }}">
                    @error('nama_jasa')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Harga --}}
                <div class="form-group">
                    <label for="price">Harga (Rp)</label>
                    <input type="number" name="price" id="price"
                        class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $jasa->price) }}">
                    @error('price')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                {{-- List Layanan --}}
                <div class="form-group">
                    <label for="list_services">List Layanan</label>
                    <textarea name="list_services" id="list_services" class="form-control @error('list_services') is-invalid @enderror"
                        rows="5">{{ old('list_services', $jasa->list_services) }}</textarea>
                    <small class="form-text text-muted">Pisahkan layanan dengan tanda "|"</small>
                    @error('list_services')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('jasa.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection
