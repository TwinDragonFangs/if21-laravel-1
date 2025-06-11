@extends('main')

@section('title', 'Edit Jadwal')

@section('content')
<div class="container">
    <h1>Edit Jadwal</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Ada kesalahan input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jadwals.update', $jadwal->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('jadwal.form') <!-- Menggunakan form partial untuk efisiensi -->

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('jadwals.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
