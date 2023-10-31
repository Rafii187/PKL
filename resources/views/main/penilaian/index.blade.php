@extends('layouts.layout_main')
@section('content')
    <div class="container-fluid" style="padding-left: 1%;">
        <a href="{{ url('main/penilaian/create') }}" class="btn btn-primary">Create</a>
    </div>
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
                                        @if (auth()->user()->user_jab_id == 1)
                                            <th>Aksi</th>
                                        @endif
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
                                            @if (auth()->user()->user_jab_id == 1)
                                                <td>
                                                    <a href="/main/penilaian/{{ $row->penilaian_id }}/edit"
                                                        class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                    <a href="/main/penilaian/{{ $row->penilaian_id }}"
                                                        class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                                    <form action="{{ route('penilaian.destroy', $row->penilaian_id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger border-0"
                                                            onclick="return confirm('Are you sure?'); return false;"><i
                                                                class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            @endif
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
