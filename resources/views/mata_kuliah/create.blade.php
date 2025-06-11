@extends('main')

@section('title', 'Tambah Mata Kuliah')

@section('content')
<div class="container">
    <h1>Tambah Mata Kuliah</h1>
    <form action="{{ route('mata_kuliah.store') }}" method="POST">
        @csrf
        @include('mata_kuliah.form')
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
