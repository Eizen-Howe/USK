@extends('layouts.apppetugas')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center">Selamat Datang {{ Auth::user()->name }}, di Aplikasi Pelaporan Pengaduan Masyarakat</h2>
        <div class="row px-5 justify-content-center">
            <div class="col-lg-3">
                <a href="" class="text-decoration-none text-reset">
                    <div class="card text-white bg-danger">
                        <div class="card-body text-center">
                            <span><i class="fas fa-times fa-7x color-white"></i></span>
                            <h3>ditolak</h3>
                            <h3>0</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="" class="text-decoration-none text-reset">
                    <div class="card text-white"  style="background-color: #ff8552">
                        <div class="card-body text-center">
                            <span><i class="fas fa-spinner fa-7x color-white"></i></span>
                            <h3>Proses</h3>
                            <h3>0</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="" class="text-decoration-none text-reset">
                    <div class="card text-white bg-success">
                        <div class="card-body text-center">
                            <span><i class="fas fa-check fa-7x color-white"></i></span>
                            <h3>Selesai</h3>
                            <h3>0</h3>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection