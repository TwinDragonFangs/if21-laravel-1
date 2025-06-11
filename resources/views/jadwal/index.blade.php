@extends('main')

@section('title', 'Daftar Jadwal')

@section('content')
<div class="container">
    <h1>Jadwal Perkuliahan</h1>
    <a href="{{ route('jadwals.create') }}" class="btn btn-primary mb-3">Tambah Jadwal</a>
    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
    <table class="table">
        <thead>
            <tr>
                <th>Tahun Akademik</th>
                <th>Semester</th>
                <th>Kelas</th>
                <th>Mata Kuliah</th>
                <th>Dosen</th>
                <th>Sesi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jadwals as $jadwal)
            <tr>
                <td>{{ $jadwal->tahun_akademik }}</td>
                <td>{{ $jadwal->kode_smt }}</td>
                <td>{{ $jadwal->kelas }}</td>
                <td>{{ $jadwal->mataKuliah->nama }}</td>
                <td>{{ $jadwal->dosen->name }}</td>
                <td>{{ $jadwal->sesi->nama }}</td>
                <td>
                    <a href="{{ route('jadwals.edit', $jadwal) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('jadwals.destroy', $jadwal) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
