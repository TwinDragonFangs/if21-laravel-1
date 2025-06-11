@extends('main')

@section('title', 'Edit Mata Kuliah')

@section('content')
<div class="container">
    <h1>Edit Mata Kuliah</h1>
    <form action="{{ route('mata_kuliah.update', $mataKuliah->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('mata_kuliah.form')
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
