@extends('layouts.layout_main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <!-- Detail Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ $title }}</h3>
                        </div>
                        <div class="card-body">

                            <table style="width: 60%" border="0">
                                <tr>
                                    <td>NIP</td>
                                    <td>:</td>
                                    <td>{{ $penilaian->guru->nip }}</td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>{{ $penilaian->guru->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Sekolah</td>
                                    <td>:</td>
                                    <td>{{ $penilaian->guru->sekolah->nama_sekolah }}</td>
                                </tr>
                                <tr>
                                    <td>Jabatan</td>
                                    <td>:</td>
                                    <td>{{ $penilaian->guru->jabatan->jab_nama }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td>{{ $penilaian->guru->jenis_kelamin }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{ $penilaian->guru->email }}</td>
                                </tr>
                                <tr>
                                    <td>No Telpon</td>
                                    <td>:</td>
                                    <td>{{ $penilaian->guru->no_telpon }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td>{{ $penilaian->guru->status }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>{{ $penilaian->guru->alamat }}</td>
                                </tr>
                            </table>

                        </div>
                        <hr>
                        <a href="{{ url('main/penilaian') }}" class="btn btn-danger">Kembali</a>
                    </div>
                    <!-- Detail Box -->
                </div>
            </div>
        </div>
    </section>
@endsection
