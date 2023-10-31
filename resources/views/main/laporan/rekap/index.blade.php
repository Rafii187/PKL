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
                            <h3 class="card-title"> {{ $title }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <form action="{{ route('laporan.rekap.cetak') }}" method="GET">
                                <label for="status">Status:</label>
                                <select name="status" class="form-control" required>
                                    <option value="Diterima">Diterima</option>
                                    <option value="Ditolak">Ditolak</option>
                                </select>
                                <br>
                                <label for="from_date">Dari Tanggal:</label>
                                <input type="date" name="from_date" class="form-control" required>
                                <br>
                                <label for="to_date">Sampai Tanggal:</label>
                                <input type="date" name="to_date" class="form-control" required>
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
