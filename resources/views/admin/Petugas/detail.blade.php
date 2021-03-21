@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h3>Detail Petugas</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col form-group">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" class="form-control bg-transparent" value="{{ $petugas->nama_petugas }}" readonly>
                    </div>
                    <div class="col form-group">
                        <label for="email">email</label>
                        <input type="email" id="email" name="email" class="form-control bg-transparent" value="{{ $petugas->email }}" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="telp">No. Telp</label>
                        <input type="telp" id="telp" name="telp" class="form-control bg-transparent" value="{{ $petugas->telp }}" readonly>
                    </div>
                    <div class="col form-group">
                        <label for="level">Level</label>
                        <select class="form-control" name="level" id="level">
                            @if ($petugas->level=='admin')
                                <option value="Admin">Admin</option>
                            @else 
                                <option value="Petugas">Petugas</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="foto">Foto</label>
                        @if (empty($petugas->foto))
                            <img class="form-control" src="{{ asset('img/user.png') }}" alt="foto" name="foto" style="max-width: 500px; width: 100%; height:auto">
                        @else
                            <img class="form-control" src="{{ asset('uploads/'.$petugas->foto) }}" alt="foto" name="foto" style="max-width: 500px; width: 100%; height:auto">
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <a href="/petugas" class="btn btn-dark mt-4"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
@endsection