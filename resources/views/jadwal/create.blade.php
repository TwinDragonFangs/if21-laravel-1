@extends('main')

@section('title', 'Tambah Jadwal')

@section('content')
<div class="container">
    <h1>Tambah Jadwal</h1>
    <form method="POST" action="{{ route('jadwals.store') }}">
        @csrf
        @include('jadwal.form')
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
