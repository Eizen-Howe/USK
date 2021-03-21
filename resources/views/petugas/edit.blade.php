@extends('layouts.apppetugas')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <h3 class="text-center">Pengaduan</h3>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nik">Tanggal Pengaduan</label>
                            <input type="text" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nik">Kategori</label>
                            <input type="text" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="isi">Isi Laporan</label>
                            <textarea name="isi" id="isi" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <img src="{{ asset('img/Kevin.jfif') }}" alt="" style="max-width: 500px;">
                        </div>
                    </div>
                </div>
                <a href="" class="btn btn-dark mt-4"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="col">
                <h3 class="text-center">Tanggapan</h3>
                <div class="card">
                    <form action="" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nik">Tanggal Tanggapan</label>
                            <input type="text" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="isi">Isi Tanggapan</label>
                            <textarea name="isi" id="isi" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" readonly>
                        </div>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection