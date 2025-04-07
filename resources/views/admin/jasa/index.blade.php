@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Daftar Jasa</h3>
            <a href="{{ route('admin.jasa.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Jasa
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Jasa</th>
                        <th>List Layanan</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['jasa'] as $index => $jasa)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $jasa->nama_jasa }}</td>
                            <td>
                                <ul class="mb-0 pl-3">
                                    @foreach (explode('|', $jasa->list_services) as $service)
                                        <li>{{ trim($service) }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>Rp {{ number_format($jasa->price, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
