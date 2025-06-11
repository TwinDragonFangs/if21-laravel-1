@extends('main')

@section('title', 'Mata Kuliah')

@section('content')
<div class="container">
    <h1>Data Mata Kuliah</h1>
    <a href="{{ route('mata_kuliah.create') }}" class="btn btn-primary mb-3">Tambah Mata Kuliah</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode MK</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mataKuliahs as $mk)
                <tr>
                    <td>{{ $mk->kode_mk }}</td>
                    <td>{{ $mk->nama }}</td>
                    <td>{{ $mk->prodi->nama ?? '-' }}</td>
                    <td>
                        <a href="{{ route('mata_kuliah.edit', $mk->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('mata_kuliah.destroy', $mk->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
