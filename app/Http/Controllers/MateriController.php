<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materis = Materi::with('mataKuliah', 'dosen')->get();
        return view('materi.index', compact('materis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mataKuliahs = MataKuliah::all();
        return view('materi.create', compact('mataKuliahs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mata_kuliah_id' => 'required',
            'pertemuan'      => 'required|integer',
            'pokok_bahasan'  => 'required|string',
            'file_materi'    => 'required|mimes:pdf|max:2048',
        ]);

        $fileName = time() . '-' . $request->file('file_materi')->getClientOriginalName();
        $path = $request->file('file_materi')->storeAs('materi', $fileName, 'public');

        Materi::create([
            'mata_kuliah_id' => $request->mata_kuliah_id,
            'dosen_id'       => Auth::id(),
            'pertemuan'      => $request->pertemuan,
            'pokok_bahasan'  => $request->pokok_bahasan,
            'file_materi'    => $path,
        ]);

        return redirect()->route('materi.index')->with('success', 'Materi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materi $materi)
    {
        $mataKuliahs = MataKuliah::all();
        return view('materi.edit', compact('materi', 'mataKuliahs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materi $materi)
    {
        $request->validate([
            'mata_kuliah_id' => 'required',
            'pertemuan'      => 'required|integer',
            'pokok_bahasan'  => 'required|string',
            'file_materi'    => 'nullable|mimes:pdf|max:2048',
        ]);

        $data = $request->only(['mata_kuliah_id', 'pertemuan', 'pokok_bahasan']);

        if ($request->hasFile('file_materi')) {
            $fileName = time() . '-' . $request->file('file_materi')->getClientOriginalName();
            $path = $request->file('file_materi')->storeAs('materi', $fileName, 'public');
            $data['file_materi'] = $path;
        }

        $materi->update($data);

        return redirect()->route('materi.index')->with('success', 'Materi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materi $materi)
    {
        $materi->delete();
        return redirect()->route('materi.index')->with('success', 'Materi berhasil dihapus.');
    }
}
