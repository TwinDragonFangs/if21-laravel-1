@extends('main')
@section('title', 'Tambah Materi')

@section('content')
<div class="container mt-3">
    <h3>Tambah Materi</h3>

    <form action="{{ route('materi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="mata_kuliah_id">Mata Kuliah</label>
            <select name="mata_kuliah_id" class="form-control" required>
                <option value="">-- Pilih --</option>
                @foreach($mataKuliahs as $mk)
                    <option value="{{ $mk->id }}">{{ $mk->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="pertemuan">Pertemuan</label>
            <input type="number" name="pertemuan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="pokok_bahasan">Pokok Bahasan</label>
            <input type="text" name="pokok_bahasan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="file_materi">File Materi (PDF, max 2MB)</label>
            <input type="file" name="file_materi" class="form-control" accept="application/pdf" required>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('materi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
