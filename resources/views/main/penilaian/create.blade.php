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

                        <form action="{{ route('penilaian.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Guru (NIP - Nama)</label>
                                    <select name="guru_id" id="guru_id" class="form-control">
                                        @foreach ($guru as $guru)
                                            <option value="{{ $guru->guru_id }}">{{ $guru->nip }} - {{ $guru->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kekurangan</label>
                                    <textarea name="kekurangan" id="kekurangan" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Kelebihan</label>
                                    <textarea name="kelebihan" id="kelebihan" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <input type="hidden" name="status" value="Menunggu">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ url('main/penilaian') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
