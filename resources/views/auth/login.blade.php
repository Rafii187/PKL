@extends('layouts.layout_auth')
@section('title', 'Sistem Rekapitulasi Kekurangan Dan Kelebihan Data Guru ASN Per Mata Pelajaran || UIN STS Jambi')
@section('content')
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <img style="width: 50%;" src="{{ url('pendidikan.png') }}" alt=""><br>
                <a href="" class="h1" style="font-size: 22px"><b>Sistem </b>
                    <p style="font-size: 22px">Rekapitulasi Kekurangan Dan Kelebihan Data Guru ASN Per Mata Pelajaran</p>
                </a>
            </div>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    {!! implode('', $errors->all('<li>:message</li>')) !!}
                </div>
            @endif
            <div class="card-body">
                {{-- <p class="login-box-msg">SISTEM PAKAR DIAGNOSA GANGGUAN KESEHATAN MENTAL MENGGUNAKAN METODE ALGORITMA BAYES
                </p> --}}

                <form method="post" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Enter email"
                            value="{{ old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mb-1">
                    <a href="#">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="{{ url('auth/register') }}" class="text-center">Register</a>
                </p>
                <hr>
                <p align="center">CopyRight &copy; {{ date('Y') }} <br> SupportBy || Rekapitulasi Kekurangan Dan
                    Kelebihan Data Guru ASN Per Mata Pelajaran</p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
@endsection
