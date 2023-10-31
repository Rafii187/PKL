<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = "Penilaian";
        // status nya = Menunggu , Diterima , Ditolak
        $penilaian = Penilaian::with('guru')->where('status', 'Menunggu')->get();
        $data['result'] = $penilaian->sortDesc();
        return view("main.penilaian.index", $data);
    }
    public function diterima()
    {
        $data['title'] = "Penilaian";
        // status nya = Menunggu , Diterima , Ditolak
        $penilaian = Penilaian::with('guru')->where('status', 'Diterima')->get();
        $data['result'] = $penilaian->sortDesc();
        return view("main.penilaian.diterima", $data);
    }
    public function ditolak()
    {
        $data['title'] = "Penilaian";
        // status nya = Menunggu , Diterima , Ditolak
        $penilaian = Penilaian::with('guru')->where('status', 'Ditolak')->get();
        $data['result'] = $penilaian->sortDesc();
        return view("main.penilaian.ditolak", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['guru'] = Guru::all();
        $data['title'] = "Create Penilaian";
        return view("main.penilaian.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $this->validate(
            $request,
            [
                'guru_id' => 'required',
                'kekurangan' => 'required',
                'kelebihan' => 'required',
                'status' => 'required',
            ],
            [
                'guru_id.required' => 'Pilih mata pelajaran',
                'kekurangan.required' => 'Pilih sekolah',
                'kelebihan.required' => 'Pilih jabatan',
                'status.required' => 'status tidak boleh kosong',
            ]
        );

        $penilaian = Penilaian::create([
            'guru_id' => $request->guru_id,
            'kekurangan' => $request->kekurangan,
            'kelebihan' => $request->kelebihan,
            'status' => $request->status,
        ]);

        return redirect('main/penilaian')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(penilaian $penilaian)
    {
        $penilaian['penilaian'] = Penilaian::with('guru')->get();
        // dd($penilaian);
        return view('main.penilaian.show', [
            'title' => 'Detail',
            'penilaian' => $penilaian
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(penilaian $penilaian)
    {
        $penilaian['penilaian'] = Penilaian::with('guru')->get();
        if (auth()->check() && auth()->user()->user_jab_id == 1) {
            return view('main.penilaian.edit', [
                'title' => 'Edit penilaian',
                // 'guru' => $guru,
                'result' => $penilaian
            ]);
        } else {
            return redirect('main/penilaian')->with('success', 'Maaf Anda tidak Punya AKses Kesitu!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Penilaian::find($id);
        $post->status = $request->status;
        $post->save();

        return redirect('main/penilaian')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->check() && auth()->user()->user_jab_id == 1) {
            $penilaian = Penilaian::findOrFail($id);
            $penilaian->delete();
            return back()->with('success', 'Data sudah di Hapus!');
        } else {
            return redirect('main/penilaian')->with('success', 'Maaf Anda tidak Punya AKses Kesitu!');
        }
    }
}