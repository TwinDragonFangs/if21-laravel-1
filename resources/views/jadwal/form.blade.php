<div class="mb-3">
    <label>Tahun Akademik</label>
    <input type="text" name="tahun_akademik" class="form-control" value="{{ old('tahun_akademik', $jadwal->tahun_akademik ?? '') }}">
</div>
<div class="mb-3">
    <label>Kode Semester</label>
    <input type="text" name="kode_smt" class="form-control" value="{{ old('kode_smt', $jadwal->kode_smt ?? '') }}">
</div>
<div class="mb-3">
    <label>Kelas</label>
    <input type="text" name="kelas" class="form-control" value="{{ old('kelas', $jadwal->kelas ?? '') }}">
</div>
<div class="mb-3">
    <label>Mata Kuliah</label>
    <select name="mata_kuliah_id" class="form-control">
        @foreach($mataKuliahs as $mk)
        <option value="{{ $mk->id }}" @selected(old('mata_kuliah_id', $jadwal->mata_kuliah_id ?? '') == $mk->id)>
            {{ $mk->nama }}
        </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label>Dosen</label>
    <select name="dosen_id" class="form-control">
        @foreach($dosens as $dosen)
        <option value="{{ $dosen->id }}" @selected(old('dosen_id', $jadwal->dosen_id ?? '') == $dosen->id)>
            {{ $dosen->name }}
        </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label>Sesi</label>
    <select name="sesi_id" class="form-control">
        @foreach($sesis as $sesi)
        <option value="{{ $sesi->id }}" @selected(old('sesi_id', $jadwal->sesi_id ?? '') == $sesi->id)>
            {{ $sesi->nama }}
        </option>
        @endforeach
    </select>
</div>
