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
                            <input type="text" class="form-control" readonly value="{{$pengaduan->nik}}">
                        </div>
                        <div class="form-group">
                            <label for="nik">Tanggal Pengaduan</label>
                            <input type="text" class="form-control" readonly value="{{ $pengaduan->tanggal_pengaduan }}">
                        </div>
                        <div class="form-group">
                            <label for="nik">Kategori</label>
                            <input type="text" class="form-control" readonly value="{{ $pengaduan->kategori }}">
                        </div>
                        <div class="form-group">
                            <label for="isi">Isi Laporan</label>
                            <textarea name="isi" id="isi" cols="30" rows="10" class="form-control">{{ $pengaduan->isi_laporan }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <form action="/editpengaduan/{{$pengaduan->id}}" method="post">
                                @csrf
                                @method('put')
                            <select name="status" id="status" class="form-control" onchange="this.form.submit()">
                                <option value="Belum" {{ ($pengaduan->status == 'Belum')? 'selected' : '' }}>Belum</option>
                                <option value="Ditolak" {{ ($pengaduan->status == 'Ditolak')? 'selected' : '' }}>Ditolak</option>
                                <option value="Proses" {{ ($pengaduan->status == 'Proses')? 'selected' : '' }}>Proses</option>
                                <option value="Selesai" {{ ($pengaduan->status == 'Selesai')? 'selected' : '' }}>Selesai</option>
                            </select>
                            </form>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <img src="{{ asset('img/Kevin.jfif') }}" alt="" style="max-width: 500px;">
                        </div>
                    </div>
                </div>
                <a href="/pengaduanpetugas" class="btn btn-dark mt-4"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="col">
                <h3 class="text-center">Tanggapan</h3>
                <div class="card">
                    <form action="/tambahtanggapan" method="post">
                        @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id" name="id" value="{{ $pengaduan->id }}">
                            <input type="hidden" class="form-control" id="id_p" name="id_p" value="{{ Auth::user()->id_petugas }}">
                        </div>
                        <div class="form-group input-daterange">
                            <label for="tgl">Tanggal Tanggapan</label>
                            <input class="form-control text-left bg-transparent" type="text" name="tgl" id="tgl"value="{{ !empty($tanggapan->tgl_tanggapan) ? $tanggapan->tgl_tanggapan : '' }}" readonly>
                        </div>
                        @error('tgl')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="form-group">
                            <label for="isi">Isi Tanggapan</label>
                            <textarea name="isi" id="isi" cols="30" rows="10" class="form-control @error ('isi') is-invalid @enderror" style="text-align: left">@if (!empty($tanggapan->tanggapan)){{$tanggapan->tanggapan}}@endif</textarea>
                        </div>
                        @error('isi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <button class="btn btn-primary" type="submit">Simpan</button>
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