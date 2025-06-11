@extends('main')

@section('title', 'Edit Sesi')

@section('content')
<div class="container">
    <h1>Edit Sesi</h1>

    <form action="{{ route('sesi.update', $sesi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Sesi</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $sesi->nama) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('sesi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
