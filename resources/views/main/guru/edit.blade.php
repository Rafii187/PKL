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
                        <form action="{{ route('guru.update', $result->guru_id) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="card-body">
                                <input type="hidden" value="2" name="user_jab_id">
                                <div class="form-group">
                                    <label for="sekolah_id">Sekolah</label>
                                    <select name="sekolah_id" id="sekolah_id" class="form-control">
                                        <option value="">-</option>
                                        @foreach ($sekolah as $row)
                                            <option value="{{ $row->sekolah_id }}"
                                                {{ old('sekolah_id', $result->sekolah_id) == $row->sekolah_id ? 'selected' : '' }}>
                                                {{ $row->nama_sekolah }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label>Mapel</label>
                                    <select name="mapel_id" id="mapel_id" class="form-control">
                                        <option value="">-</option>
                                        @foreach ($mapel as $row)
                                            <option value="{{ $row->mapel_id }}"
                                                {{ old('mapel_id', $result->mapel_id) == $row->mapel_id ? 'selected' : '' }}>
                                                {{ $row->nama_mapel }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama guru</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Nama guru"
                                        value="{{ $result->nama }}" required>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email"
                                        value="{{ $result->email }}" required>
                                </div>

                                <div class="form-group">
                                    <label>NIP</label>
                                    <input type="text" name="nip" class="form-control" placeholder="NIP"
                                        value="{{ $result->nip }}" required>
                                </div>

                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat" class="form-control" placeholder="Alamat"
                                        value="{{ $result->alamat }}" required>
                                </div>
                                <div class="form-group">
                                    <label>No. Telepon</label>
                                    <input type="text" name="no_telpon" class="form-control"
                                        value="{{ $result->no_telpon }}" placeholder="No. Telepon" required>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="Aktif" {{ $result->status == 'Aktif' ? 'selected' : '' }}>
                                            Aktif</option>
                                        <option value="Nonaktif" {{ $result->status == 'Nonaktif' ? 'selected' : '' }}>
                                            Nonaktif</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                        <option value="Laki-laki"
                                            {{ $result->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                            Laki-laki</option>
                                        <option value="Perempuan"
                                            {{ $result->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                            Perempuan</option>
                                    </select>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <a href="{{ url('main/guru') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
