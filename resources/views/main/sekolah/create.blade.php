@extends('layouts.layout_main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> {{ $title }}</h3>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                {!! implode('', $errors->all('<li>:message</li>')) !!}
                            </div>
                        @endif
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form action="{{ route('sekolah.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama sekolah</label>
                                    <input type="text" name="nama_sekolah" class="form-control"
                                        placeholder="Nama sekolah" required>
                                </div>
                                <div class="form-group">
                                    <label>Alamat sekolah</label>
                                    <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control" placeholder="Alamat Sekolah"></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ url('main/sekolah') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
