<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Jabatan;
use App\Models\Mapel;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = "Guru";
        $guru = Guru::with('jabatan', 'mapel', 'sekolah')->get();
        $data['result'] = $guru->sortDesc();
        return view("main.guru.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['mapel'] = Mapel::all();
        $data['sekolah'] = Sekolah::all();
        $data['jabatan'] = Jabatan::all();
        $data['title'] = "Create Guru";
        return view("main.guru.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $this->validate(
            $request,
            [
                'nama' => 'required',
                'mapel_id' => 'required',
                'sekolah_id' => 'required',
                'user_jab_id' => 'required',
                'email' => 'required|email',
                'nip' => 'required',
                'alamat' => 'required',
                'status' => 'required|in:Aktif,Non Aktif',
                'no_telpon' => 'required',
                'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            ],
            [
                'nama.required' => 'Nama guru tidak boleh kosong',
                'mapel_id.required' => 'Pilih mata pelajaran',
                'sekolah_id.required' => 'Pilih sekolah',
                'user_jab_id.required' => 'Pilih jabatan',
                'email.required' => 'Email tidak boleh kosong',
                'email.email' => 'Format email tidak valid',
                'nip.required' => 'NIP tidak boleh kosong',
                'alamat.required' => 'Alamat tidak boleh kosong',
                'status.required' => 'Status tidak boleh kosong',
                'status.in' => 'Status harus Aktif atau Non Aktif',
                'no_telpon.required' => 'Nomor telepon tidak boleh kosong',
                'jenis_kelamin.required' => 'Pilih jenis kelamin',
                'jenis_kelamin.in' => 'Jenis kelamin harus Laki-laki atau Perempuan',
            ]
        );

        $guru = Guru::create([
            'nama' => $request->nama,
            'mapel_id' => $request->mapel_id,
            'sekolah_id' => $request->sekolah_id,
            'user_jab_id' => $request->user_jab_id,
            'email' => $request->email,
            'nip' => $request->nip,
            'alamat' => $request->alamat,
            'status' => $request->status,
            'no_telpon' => $request->no_telpon,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect('main/guru')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(guru $guru)
    {
        $guru['guru'] = Guru::with('jabatan', 'mapel', 'sekolah')->get();
        // dd($guru);
        return view('main.guru.show', [
            'title' => 'Detail',
            'guru' => $guru
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(guru $guru)
    {
        $jabatan = Jabatan::all();
        $mapel = Mapel::all();
        $sekolah = Sekolah::all();
        if (auth()->check() && auth()->user()->user_jab_id == 1) {
            return view('main.guru.edit', [
                'title' => 'Edit guru',
                'jabatan' => $jabatan,
                'mapel' => $mapel,
                'sekolah' => $sekolah,
                'result' => $guru
            ]);
        } else {
            return redirect('main/guru')->with('success', 'Maaf Anda tidak Punya AKses Kesitu!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Guru::find($id);
        $post->nama = $request->nama;
        $post->mapel_id = $request->mapel_id;
        $post->sekolah_id = $request->sekolah_id;
        $post->user_jab_id = $request->user_jab_id;
        $post->email = $request->email;
        $post->nip = $request->nip;
        $post->alamat = $request->alamat;
        $post->status = $request->status;
        $post->no_telpon = $request->no_telpon;
        $post->jenis_kelamin = $request->jenis_kelamin;
        $post->save();

        return redirect('main/guru')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();
        return back()->with('success', 'Data sudah di Hapus!');
    }
}
