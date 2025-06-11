@extends('main')

@section('title', 'Tambah Dosen')

@section('content')
<div class="container">
    <h1>Tambah Dosen</h1>

    <form action="{{ route('dosen.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <input type="hidden" name="role" value="dosen">

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
