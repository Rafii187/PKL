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

                        <form action="{{ route('guru.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="user_jab_id">Jabatan</label>
                                    <select name="user_jab_id" id="user_jab_id" class="form-control" required>
                                        <option value="">-</option>
                                        @foreach ($jabatan as $item)
                                            <option value="{{ $item->jab_id }}">{{ $item->jab_nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="mapel_id">Mapel</label>
                                    <select name="mapel_id" id="mapel_id" class="form-control" required>
                                        <option value="">-</option>
                                        @foreach ($mapel as $item)
                                            <option value="{{ $item->mapel_id }}">{{ $item->nama_mapel }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sekolah_id">Sekolah</label>
                                    <select name="sekolah_id" id="sekolah_id" class="form-control" required>
                                        <option value="">-</option>
                                        @foreach ($sekolah as $item)
                                            <option value="{{ $item->sekolah_id }}">{{ $item->nama_sekolah }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama guru</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Nama guru"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                </div>

                                <div class="form-group">
                                    <label>NIP</label>
                                    <input type="text" name="nip" class="form-control" placeholder="NIP" required>
                                </div>

                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="Aktif">Aktif</option>
                                        <option value="Non Aktif">Non Aktif</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>No. Telepon</label>
                                    <input type="text" name="no_telpon" class="form-control" placeholder="No. Telepon"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" required>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ url('main/guru') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
