@extends('layouts.layout_main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ $title }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('penilaian.update', $result->penilaian_id) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Guru</label>
                                    <input type="text" class="form-control" value="{{ $result->guru->nama }}" required
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nama Sekolah</label>
                                    <input type="text" class="form-control"
                                        value="{{ $result->guru->sekolah->nama_sekolah }}" required readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nama Mapel</label>
                                    <input type="text" class="form-control"
                                        value="{{ $result->guru->mapel->nama_mapel }}" required readonly>
                                </div>
                                <div class="form-group">
                                    <label>Kekurangan</label>
                                    <input type="text" class="form-control" value="{{ $result->kekurangan }}" required
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label>Kelebihan</label>
                                    <input type="text" class="form-control" value="{{ $result->kelebihan }}" required
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="Diterima">Diterima</option>
                                        <option value="Ditolak">Ditolak</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <a href="{{ url('main/penilaian') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
