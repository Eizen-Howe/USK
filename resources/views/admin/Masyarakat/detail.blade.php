@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Data Pengguna</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" id="nik" name="nik" class="form-control bg-transparent" value="{{ $masyarakat->nik }}" readonly>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control bg-transparent" value="{{ $masyarakat->nama }}" readonly>
                </div>
                <div class="form-group">
                    <label for="telp">No. Telp</label>
                    <input type="text" id="telp" name="telp" class="form-control bg-transparent" value="{{ $masyarakat->telp }}" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" class="form-control bg-transparent" value="{{ $masyarakat->email }}" readonly>
                </div>
            </div>
        </div>
        <a href="/masyarakat" class="btn btn-dark mt-4"><i class="fas fa-arrow-left"> Kembali</i></a>
    </div>
@endsection