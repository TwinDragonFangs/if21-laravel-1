<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index()
    {
        $mataKuliahs = MataKuliah::with('prodi')->get();
        return view('mata_kuliah.index', compact('mataKuliahs'));
    }

    public function create()
    {
        $prodis = Prodi::all();
        return view('mata_kuliah.create', compact('prodis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_mk'  => 'required|string|max:10|unique:mata_kuliahs,kode_mk',
            'nama'     => 'required|string|max:100',
            'prodi_id' => 'required|exists:prodi,id',
        ]);

        MataKuliah::create($request->all());

        return redirect()->route('mata_kuliah.index')->with('success', 'Mata kuliah berhasil ditambahkan.');
    }

    public function edit(MataKuliah $mataKuliah)
    {
        $prodis = Prodi::all();
        return view('mata_kuliah.edit', compact('mataKuliah', 'prodis'));
    }

    public function update(Request $request, MataKuliah $mataKuliah)
    {
        $request->validate([
            'kode_mk'  => 'required|string|max:10|unique:mata_kuliahs,kode_mk,' . $mataKuliah->id,
            'nama'     => 'required|string|max:100',
            'prodi_id' => 'required|exists:prodi,id',
        ]);

        $mataKuliah->update($request->all());

        return redirect()->route('mata_kuliah.index')->with('success', 'Mata kuliah berhasil diperbarui.');
    }

    public function destroy(MataKuliah $mataKuliah)
    {
        $mataKuliah->delete();
        return redirect()->route('mata_kuliah.index')->with('success', 'Mata kuliah berhasil dihapus.');
    }
}
