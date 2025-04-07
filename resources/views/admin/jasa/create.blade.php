@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Jasa</h3>
        </div>
        <form action="{{ route('admin.jasa.store') }}" method="POST">
            @csrf
            <div class="card-body">
                {{-- Nama Jasa --}}
                <div class="form-group">
                    <label for="nama_jasa">Nama Jasa</label>
                    <input type="text" name="nama_jasa" id="nama_jasa"
                        class="form-control @error('nama_jasa') is-invalid @enderror" value="{{ old('nama_jasa') }}"
                        placeholder="Masukkan nama jasa">
                    @error('nama_jasa')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Harga --}}
                <div class="form-group">
                    <label for="price">Harga (Rp)</label>
                    <input type="number" name="price" id="price"
                        class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}"
                        placeholder="Contoh: 15000000">
                    @error('price')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                {{-- List Layanan --}}
                <div class="form-group">
                    <label for="list_services">List Layanan</label>
                    <textarea name="list_services" id="list_services" class="form-control @error('list_services') is-invalid @enderror"
                        rows="5" placeholder="Pisahkan setiap layanan dengan simbol |">{{ old('list_services') }}</textarea>
                    <small class="form-text text-muted">Contoh: Layanan A | Layanan B | Layanan C</small>
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
                    <i class="fas fa-save"></i> Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
