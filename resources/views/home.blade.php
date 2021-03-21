@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Selamat Datang, di Aplikasi Pelaporan Pengaduan Masyarakat</h1>
    {{-- <h1>Selamat Datang {{ Auth::user()->name }}, di Aplikasi Pelaporan Pengaduan Masyarakat</h1> --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Lapor') }}</div>

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="tgl">Tanggal Pengaduan</label>
                            <input class="form-control" type="text" name="tgl" id="tgl">
                        </div>
                        <div class="form-group">
                            <label for="isi">Tulis Laporan</label>
                            <textarea class="form-control" name="isi" id="isi" cols="30" rows="10" style="resize: none"></textarea>
                        </div>
                        <div class="custom-file">
                            <label class="custom-file-label" for="foto">Foto</label>
                            <input class="custom-file-input" type="file" name="foto" id="foto">
                        </div>

                    </div>

                    <div class="card-footer border-0 bg-transparent text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>  
@endsection