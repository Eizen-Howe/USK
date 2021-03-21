@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h1>Detail Laporan</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" value="{{ $pengaduan->nik }}">
                    </div>
                    <div class="col">
                        <label for="tgl">Tanggal Pengaduan</label>
                        <input type="text" class="form-control" id="tgl" name="tgl" value="{{ $pengaduan->tanggal_pengaduan }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="status">Status</label>
                        <input type="text" class="form-control" id="status" name="status" value="{{ $pengaduan->status }}">
                    </div>
                    <div class="col">
                        <label for="tipe">Tipe</label>
                        <input type="text" class="form-control" id="tipe" name="tipe" value="{{$pengaduan->kategori}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="isi">Isi Laporan</label>
                            <textarea class="form-control" name="isi" id="isi" cols="30" rows="5">{{$pengaduan->isi_laporan}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="tanggapan">Tanggapan</label>
                            <textarea class="form-control" name="tanggapan" id="tanggapan" cols="" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="tanggapan">Nama Petugas</label>
                            <input type="text" class="form-control bg-transparent" readonly value="Heinrich Himmler">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <img src="{{ asset('uploads/'.$pengaduan->foto) }}" id="foto" alt="foto" style="max-width: 500px; width:100%; height: auto;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a href="/pengaduan" class="btn btn-dark mt-4"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
@endsection