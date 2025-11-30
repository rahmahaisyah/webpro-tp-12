@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Daftar Pegawai</h1>

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-primary text-center">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Posisi</th>
                        <th>Gaji</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pegawais as $pegawai)
                    <tr>
                        <td class="text-center">{{ $pegawai->id }}</td>
                        <td>{{ $pegawai->name }}</td>
                        <td>{{ $pegawai->posisi }}</td>
                        <td class="text-end">Rp {{ number_format($pegawai->gaji, 0, ',', '.') }}</td>
                        <td class="text-center">
                            <a href="{{ route('pegawai.edit', $pegawai->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pegawai ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-end">
                <a href="{{ route('pegawai.create') }}" class="btn btn-success mt-3">Tambah Pegawai Baru</a>
            </div>
        </div>
    </div>
</div>
@endsection
