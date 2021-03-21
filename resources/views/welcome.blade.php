@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center">Selamat Datang, di Aplikasi Pelaporan Pengaduan Masyarakat</h1>
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Lapor') }}</div>

                <form action="/lapor" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group input-daterange">
                            <label for="tgl">Tanggal Pengaduan</label>
                            <input class="form-control text-left bg-transparent" type="text" name="tgl" id="tgl" placeholder="yyyy-mm-dd" readonly>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="hidden" name="nik" id="nik" @if (!empty(Auth::user()->nik))
                                value="{{ Auth::user()->nik }}"
                            @else
                                value=""
                            @endif readonly>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="form-control" name="kategori" id="kategori">
                                <option value="Aduan">Aduan</option>
                                <option value="Aspirasi">Aspirasi</option>
                            </select>
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
<script>
    $(document).ready(function(){
        $('.input-daterange').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
        });
    });
</script>
@endsection


