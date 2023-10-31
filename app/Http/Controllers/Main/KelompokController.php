<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Kelompok;
use Illuminate\Http\Request;

class KelompokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = "Kelompok";
        $data['result'] =  Kelompok::orderBy('kelompok_id', 'DESC')->get();
        return view("main.kelompok.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = "Create Kelompok";
        return view("main.kelompok.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $this->validate(
            $request,
            [
                'nama_kelompok' => 'required'
            ],
            [
                'nama_kelompok.required' => 'Nama Kosong !'
            ],
        );
        $objek = Kelompok::create([
            'nama_kelompok' => $request->nama_kelompok,
        ]);
        return redirect('main/kelompok')->with('success', 'Data berhasil disimpan!');
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
        $data['title'] = "Edit Kelompok";
        $data['result'] = Kelompok::findOrFail($id);
        return view("main.kelompok.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Kelompok::find($id);
        $post->nama_kelompok = $request->nama_kelompok;
        $post->save();

        return redirect('main/kelompok')->with('success', 'Data berhasil diubah!');
        // return 'ok';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kelompok = Kelompok::findOrFail($id);
        $kelompok->delete();
        return back()->with('success', 'Data sudah di Hapus!');
    }
}
