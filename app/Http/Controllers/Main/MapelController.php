<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = "Mapel";
        $mapel = Mapel::all();
        $data['result'] = $mapel->sortDesc();
        return view("main.mapel.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = "Create mapel";
        return view("main.mapel.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $this->validate(
            $request,
            [
                'nama_mapel' => 'required',
            ],
            [
                'nama_mapel.required' => 'Nama Kosong !',
            ]
        );

        $mapel = Mapel::create([
            'nama_mapel' => $request->nama_mapel,
        ]);

        return redirect('main/mapel')->with('success', 'Data berhasil disimpan!');
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
        $data['title'] = "Edit Mapel";
        $data['result'] = Mapel::findOrFail($id);
        return view("main.mapel.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Mapel::find($id);
        $post->nama_mapel = $request->nama_mapel;
        $post->save();

        return redirect('main/mapel')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mapel = Mapel::findOrFail($id);
        $mapel->delete();
        return back()->with('success', 'Data sudah di Hapus!');
    }
}
