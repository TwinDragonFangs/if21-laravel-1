@extends('main')

@section('title', 'Sesi')

@section('content')
<div class="container">
    <h1>Data Sesi</h1>
    <a href="{{ route('sesi.create') }}" class="btn btn-primary mb-3">Tambah Sesi</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Sesi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sesis as $sesi)
                <tr>
                    <td>{{ $sesi->nama }}</td>
                    <td>
                        <a href="{{ route('sesi.edit', $sesi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('sesi.destroy', $sesi->id) }}" method="POST" class="d-inline">
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
