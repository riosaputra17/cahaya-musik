@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard Admin</h1>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        {{-- Info boxes --}}
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Pengguna</span>
                        <span class="info-box-number">
                            {{ app\Models\User::count() }}
                        </span>
                    </div>
                </div>
            </div>
            <!-- Tambahkan info box lainnya jika perlu -->
        </div>

        {{-- Card --}}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Selamat Datang Admin</h3>
            </div>
            <div class="card-body">
                <p>Ini adalah halaman dashboard untuk admin. Anda dapat mengelola data pengguna, jasa, dan transaksi dari
                    sini.</p>
            </div>
        </div>
    </div>
@endsection
