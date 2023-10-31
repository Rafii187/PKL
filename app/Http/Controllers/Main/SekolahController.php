<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = "Sekolah";
        $sekolah = Sekolah::all();
        $data['result'] = $sekolah->sortDesc();
        return view("main.sekolah.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = "Create Sekolah";
        return view("main.sekolah.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $this->validate(
            $request,
            [
                'nama_sekolah' => 'required',
                'alamat' => 'required',
            ],
            [
                'nama_sekolah.required' => 'Nama Kosong !',
                'alamat.required' => 'Alamat Kosong !',
            ]
        );

        $sekolah = Sekolah::create([
            'nama_sekolah' => $request->nama_sekolah,
            'alamat' => $request->alamat,
        ]);

        return redirect('main/sekolah')->with('success', 'Data berhasil disimpan!');
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
    public function edit(string $id)
    {
        $data['title'] = "Edit Sekolah";
        $data['result'] = Sekolah::findOrFail($id);
        return view("main.sekolah.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Sekolah::find($id);
        $post->nama_sekolah = $request->nama_sekolah;
        $post->alamat = $request->alamat;
        $post->save();

        return redirect('main/sekolah')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sekolah = Sekolah::findOrFail($id);
        $sekolah->delete();
        return back()->with('success', 'Data sudah di Hapus!');
    }
}