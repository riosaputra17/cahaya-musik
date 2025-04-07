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
                        <th>Aksi</th>
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
                            <td class="d-flex gap-1">
                                <a href="{{ route('admin.jasa.edit', $jasa->jasa_id) }}"
                                    class="btn btn-sm btn-warning mr-1">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.jasa.destroy', $jasa->jasa_id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus jasa ini?')">
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
        </div>
    </div>
@endsection
