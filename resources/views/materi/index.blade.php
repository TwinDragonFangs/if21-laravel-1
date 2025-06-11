@extends('main')
@section('title', 'Daftar Materi')

@section('content')
<div class="container mt-3">
    <h3>Daftar Materi</h3>
    <a href="{{ route('materi.create') }}" class="btn btn-primary mb-3">+ Tambah Materi</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mata Kuliah</th>
                <th>Pertemuan</th>
                <th>Pokok Bahasan</th>
                <th>File</th>
                <th>Dosen</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($materis as $materi)
            <tr>
                <td>{{ $materi->mataKuliah->nama }}</td>
                <td>{{ $materi->pertemuan }}</td>
                <td>{{ $materi->pokok_bahasan }}</td>
                <td>
                    <a href="{{ asset('storage/' . $materi->file_materi) }}" target="_blank">Download</a>
                </td>
                <td>{{ $materi->dosen->name }}</td>
                <td>
                    <a href="{{ route('materi.edit', $materi->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('materi.destroy', $materi->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Hapus materi ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
