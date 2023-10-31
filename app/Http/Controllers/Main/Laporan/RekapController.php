<?php

namespace App\Http\Controllers\Main\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class RekapController extends Controller
{
    function index()
    {
        $data['title'] = "Filter Sebelum Cetak ";
        $data['guru'] = Guru::all();
        $data['penilaian'] = Penilaian::all();
        return view("main.laporan.rekap.index", $data);
    }
    public function cetakRekap(Request $request)
    {
        $data['title'] = "Cetak Rekap";
        $status = $request->input('status');
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');

        $data['guru'] = Guru::all();  // Sesuaikan dengan kriteria Anda
        $data['penilaian'] = Penilaian::where('status', $status)
            ->whereBetween('created_at', [$fromDate, $toDate])
            ->get();

        return view("main.laporan.rekap.cetak", $data, compact('fromDate', 'toDate'));
    }
}
