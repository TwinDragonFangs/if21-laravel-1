<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $mahasiswaprodi = DB::select('
            SELECT prodi.nama, COUNT(*) as jumlah
            FROM mahasiswas JOIN prodi ON mahasiswas.prodi_id = prodi.id
            GROUP BY prodi.nama
        ');

        $mahasiswaasalsma = DB::select('
            SELECT asal_sma, COUNT(*) as jumlah
            FROM mahasiswas
            GROUP BY asal_sma
        ');

        $mahasiswapertahun = DB::select('
            SELECT LEFT(npm, 2) as tahun, COUNT(*) as jumlah
            FROM mahasiswas
            GROUP BY LEFT(npm, 2)
        ');

        $jadwalPerProdiTahun = DB::select('
            SELECT prodi.nama AS prodi, jadwals.tahun_akademik, COUNT(DISTINCT jadwals.kelas) AS jumlah_kelas
            FROM jadwals
            JOIN mata_kuliahs ON jadwals.mata_kuliah_id = mata_kuliahs.id
            JOIN prodi ON mata_kuliahs.prodi_id = prodi.id
            GROUP BY prodi.nama, jadwals.tahun_akademik
        ');

        return view('dashboard.index', compact('mahasiswaprodi', 'mahasiswaasalsma', 'mahasiswapertahun', 'jadwalPerProdiTahun'));
    }
}
