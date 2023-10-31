@extends('layouts.layout_main')
@section('content')
    <br>

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
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Guru</th>
                                        <th>Nama Sekolah</th>
                                        <th>Mapel</th>
                                        <th>Kekurangan</th>
                                        <th>Kelebihan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $urutan = 1;
                                    @endphp
                                    @foreach ($result as $row)
                                        <tr>
                                            <td>{{ $urutan++ }}</td>
                                            <td>{{ $row->guru->nama }}</td>
                                            <td>{{ $row->guru->sekolah->nama_sekolah }}</td>
                                            <td>{{ $row->guru->mapel->nama_mapel }}</td>
                                            <td>{{ $row->kekurangan }}</td>
                                            <td>{{ $row->kelebihan }}</td>
                                            <td
                                                style="color:
    @if ($row->status == 'Menunggu') yellow;
    @elseif($row->status == 'Diterima')
        green;
    @elseif($row->status == 'Ditolak')
        red; @endif">
                                                {{ $row->status }}
                                            </td>

                                        </tr>
                                    @endforeach
                            </table>
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
