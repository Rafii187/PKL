<?php

namespace App\Http\Controllers\Main\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\NilaiUts;
use App\Models\Semester;
use App\Models\TahunAkademik;
use Illuminate\Http\Request;

class LaporanUts extends Controller
{
    function index()
    {
        $data['title'] = "Laporan Nilai uts";
        $data['tahun'] = TahunAkademik::all();
        $data['semester'] = Semester::all();
        $data['kelas'] = Kelas::all();
        $data['result'] = NilaiUts::all();
        return view("main.laporan.uts.index", $data);
    }

    public function cetakPerTahunAkademik(Request $request)
    {
        $data['title'] = "Cetak Laporan Nilai UTS";
        $TahunAkademik = $request->input('tahun_akademik');
        $semesterId = $request->input('semester');
        $kelasId = $request->input('kelas');
        $data['kelas'] = Kelas::all();

        $data['NilaiUts'] = NilaiUts::with('mapel', 'siswa', 'user', 'tahun_akademik', 'semester')
            ->whereHas('siswa', function ($query) use ($kelasId) {
                $query->where('kelas_id', $kelasId);
            })
            ->whereHas('tahun_akademik', function ($query) use ($TahunAkademik) {
                $query->where('nama_tahun', $TahunAkademik);
            })
            ->where('semester_id', $semesterId)
            ->get();

        return view("main.laporan.uts.cetak", $data, compact('TahunAkademik', 'semesterId', 'kelasId'));
    }
}