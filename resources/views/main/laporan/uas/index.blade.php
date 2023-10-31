@extends('layouts.layout_main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {!! implode('', $errors->all('<li>:message</li>')) !!}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable {{ $title }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <form action="{{ route('laporan.uas.cetak') }}" method="GET">
                                <label for="tahun_akademik">Tahun Akademik:</label>
                                <select name="tahun_akademik" id="tahun_akademik" class="form-control" required>
                                    <option value="">Pilih Tahun Akademik</option>
                                    @foreach ($tahun as $tahun)
                                        <option value="{{ $tahun->nama_tahun }}">{{ $tahun->nama_tahun }}</option>
                                    @endforeach
                                </select>
                                <br>

                                <label for="semester">Semester:</label>
                                <select name="semester" id="semester" class="form-control" required>
                                    <option value="">Pilih Semester</option>
                                    @foreach ($semester as $s)
                                        <option value="{{ $s->nama_semester }}">{{ $s->nama_semester }}</option>
                                    @endforeach
                                </select>
                                <br>

                                <label for="kelas">Kelas:</label>
                                <select name="kelas" id="kelas" class="form-control" required>
                                    <option value="">Pilih Kelas</option>
                                    @foreach ($kelas as $k)
                                        <option value="{{ $k->kelas_id }}">{{ $k->nama_kelas }}</option>
                                    @endforeach
                                </select>
                                <br>

                                <button type="submit" class="btn btn-primary">Cetak</button>
                            </form>


                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
