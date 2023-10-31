<?php

namespace App\Http\Controllers\Main\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\NilaiTugas;
use App\Models\Semester;
use App\Models\TahunAkademik;
use Illuminate\Http\Request;

class LaporanTugas extends Controller
{
    function index()
    {
        $data['title'] = "Laporan Nilai tugas";
        $data['tahun'] = TahunAkademik::all();
        $data['semester'] = Semester::all();
        $data['kelas'] = Kelas::all();
        $data['result'] = NilaiTugas::all();
        return view("main.laporan.tugas.index", $data);
    }

    public function cetakPerTahunAkademik(Request $request)
    {
        $data['title'] = "Cetak Laporan Nilai Tugas";
        $TahunAkademik = $request->input('tahun_akademik');
        $semesterId = $request->input('semester');
        $kelasId = $request->input('kelas');
        $data['kelas'] = Kelas::all();

        $data['nilaiTugas'] = NilaiTugas::with('mapel', 'siswa', 'user', 'tahun_akademik', 'semester')
            ->whereHas('siswa', function ($query) use ($kelasId) {
                $query->where('kelas_id', $kelasId);
            })
            ->whereHas('tahun_akademik', function ($query) use ($TahunAkademik) {
                $query->where('nama_tahun', $TahunAkademik);
            })
            ->where('semester_id', $semesterId)
            ->get();

        return view("main.laporan.tugas.cetak", $data, compact('TahunAkademik', 'semesterId', 'kelasId'));
    }
}