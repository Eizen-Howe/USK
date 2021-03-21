@extends('layouts.app')

@section('content')
@if (Auth::user()->role == 'admin')
    <div class="container mt-4 text-center">
        <h1>Selamat Datang {{ Auth::user()->name }}, di Aplikasi Pelaporan Pengaduan Masyarakat</h1>

        <div class="row px-5 justify-content-center">
            <div class="col-lg-3">
                <a href="/masyarakat" class="text-decoration-none text-reset">
                    <div class="card text-white" style="background-color: #ff8552">
                        <div class="card-body text-center">
                            <span><i class="fas fa-users fa-7x color-white"></i></span>
                            <h3>Pengguna</h3>
                            <h3>{{ $user }}</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="/pengaduan" class="text-decoration-none text-reset">
                    <div class="card text-white bg-success">
                        <div class="card-body text-center">
                            <span><i class="fas fa-check fa-7x color-white"></i></span>
                            <h3>Cek Laporan</h3>
                            <h3>{{ $pengaduan }}</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="/petugas" class="text-decoration-none text-reset">
                    <div class="card text-white" style="background-color: #ff8552">
                        <div class="card-body text-center">
                            <span><i class="fas fa-users fa-7x color-white"></i></span>
                            <h3>Petugas</h3>
                            <h3>{{$petugas}}</h3>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <table class="table table-striped table-bordered" id="TLog" style="width: 100%">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th>Keterangan</th>
                            <th>Tabel</th>
                            <th>Data Lama 1</th>
                            <th>Data Lama 2</th>
                            <th>Data Baru 1</th>
                            <th>Data Baru 2</th>
                            <th>User</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($log as $l)
                        <tr>
                            <td>{{ $l->aksi }}</td>
                            <td>{{ $l->tabel }}</td>
                            <td>{{ $l->data_lama1 }}</td>
                            <td>{{ $l->data_lama2 }}</td>
                            <td>{{ $l->data_baru1 }}</td>
                            <td>{{ $l->data_baru2 }}</td>
                            <td>{{ $l->user }}</td>
                            <td>{{ $l->waktu }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#TLog').DataTable({
                responsive: true,
                "autoWidth": true,
                scrollX: true,
            });
        });
    </script>
@elseif(Auth::user()->role == 'user')
    <div class="container mt-4">
        <h1 class="text-center">Selamat Datang {{ Auth::user()->name }}, di Aplikasi Pelaporan Pengaduan Masyarakat</h1>
        
        @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('status')}}
                <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
            </div>
        @endif

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
                                <input class="form-control" type="hidden" name="nik" id="nik" 
                                @if (!empty(Auth::user()->nik))
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
@elseif(Auth::user()->role == 'petugas')
    <div class="container mt-4">
        <h2 class="text-center">Selamat Datang {{ Auth::user()->name }}, di Aplikasi Pelaporan Pengaduan Masyarakat</h2>
        <div class="row px-5 justify-content-center">
            <div class="col-lg-3">
                <a href="" class="text-decoration-none text-reset">
                    <div class="card text-white bg-danger">
                        <div class="card-body text-center">
                            <span><i class="fas fa-times fa-7x color-white"></i></span>
                            <h3>ditolak</h3>
                            @if (empty($belum))
                                <h3>0</h3>
                            @else
                                <h3>{{ $belum }}</h3>
                            @endif
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
                            @if (empty($proses))
                                <h3>0</h3>
                            @else
                                <h3>{{ $proses }}</h3>
                            @endif
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
                            @if (empty($selesai))
                                <h3>0</h3>
                            @else
                                <h3>{{ $selesai }}</h3>
                            @endif
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endif
@endsection