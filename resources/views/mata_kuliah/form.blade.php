<div class="mb-3">
    <label for="kode_mk" class="form-label">Kode Mata Kuliah</label>
    <input type="text" name="kode_mk" class="form-control" value="{{ old('kode_mk', $mataKuliah->kode_mk ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="nama" class="form-label">Nama Mata Kuliah</label>
    <input type="text" name="nama" class="form-control" value="{{ old('nama', $mataKuliah->nama ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="prodi_id" class="form-label">Program Studi</label>
    <select name="prodi_id" class="form-control">
        <option value="">-- Pilih Prodi --</option>
        @foreach ($prodis as $prodi)
            <option value="{{ $prodi->id }}" @selected(old('prodi_id', $mataKuliah->prodi_id ?? '') == $prodi->id)>
                {{ $prodi->nama }}
            </option>
        @endforeach
    </select>
</div>
