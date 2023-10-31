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
                        <form action="{{ route('sekolah.update', $result->sekolah_id) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama sekolah</label>
                                    <input type="text" name="nama_sekolah" class="form-control"
                                        placeholder="Nama sekolah" value="{{ $result->nama_sekolah }}" required>
                                </div>
                                <div class="form-group">
                                    <label>alamat sekolah</label>
                                    <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control" placeholder="Alamat Sekolah">{{ $result->alamat }}</textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <a href="{{ url('main/sekolah') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
