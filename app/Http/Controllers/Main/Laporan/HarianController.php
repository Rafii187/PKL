<?php

namespace App\Http\Controllers\Main\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\NilaiHarian;
use App\Models\Semester;
use App\Models\TahunAkademik;
use Illuminate\Http\Request;

class HarianController extends Controller
{
    function index()
    {
        $data['title'] = "Laporan Nilai harian";
        $data['tahun'] = TahunAkademik::all();
        $data['semester'] = Semester::all();
        $data['kelas'] = Kelas::all();
        $data['result'] = NilaiHarian::all();
        return view("main.laporan.harian.index", $data);
    }

    public function cetakPerTahunAkademik(Request $request)
    {
        $data['title'] = "Cetak Laporan Nilai harian";
        $TahunAkademik = $request->input('tahun_akademik');
        $semesterId = $request->input('semester');
        $kelasId = $request->input('kelas');
        $data['kelas'] = Kelas::all();

        $data['nilaiHarian'] = NilaiHarian::with('mapel', 'siswa', 'user', 'tahun_akademik', 'semester')
            ->whereHas('siswa', function ($query) use ($kelasId) {
                $query->where('kelas_id', $kelasId);
            })
            ->whereHas('tahun_akademik', function ($query) use ($TahunAkademik) {
                $query->where('nama_tahun', $TahunAkademik);
            })
            ->where('semester_id', $semesterId)
            ->get();

        return view("main.laporan.harian.cetak", $data, compact('TahunAkademik', 'semesterId', 'kelasId'));
    }
}