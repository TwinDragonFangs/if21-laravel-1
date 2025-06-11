@extends('main')

@section('title', 'Tambah/Edit Sesi')

@section('content')
<div class="container">
    <h1>{{ isset($sesi) ? 'Edit' : 'Tambah' }} Sesi</h1>
    <form action="{{ isset($sesi) ? route('sesi.update', $sesi->id) : route('sesi.store') }}" method="POST">
        @csrf
        @if(isset($sesi)) @method('PUT') @endif

        <div class="mb-3">
            <label for="nama">Nama Sesi</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $sesi->nama ?? '') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
