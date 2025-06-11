@extends('main')
@section('title', 'Edit Materi')

@section('content')
<div class="container mt-3">
    <h3>Edit Materi</h3>

    <form action="{{ route('materi.update', $materi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-3">
            <label for="mata_kuliah_id">Mata Kuliah</label>
            <select name="mata_kuliah_id" class="form-control" required>
                @foreach($mataKuliahs as $mk)
                    <option value="{{ $mk->id }}" {{ $materi->mata_kuliah_id == $mk->id ? 'selected' : '' }}>
                        {{ $mk->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="pertemuan">Pertemuan</label>
            <input type="number" name="pertemuan" class="form-control" value="{{ $materi->pertemuan }}" required>
        </div>

        <div class="mb-3">
            <label for="pokok_bahasan">Pokok Bahasan</label>
            <input type="text" name="pokok_bahasan" class="form-control" value="{{ $materi->pokok_bahasan }}" required>
        </div>

        <div class="mb-3">
            <label for="file_materi">File Materi (Kosongkan jika tidak diubah)</label>
            <input type="file" name="file_materi" class="form-control" accept="application/pdf">
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('materi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
