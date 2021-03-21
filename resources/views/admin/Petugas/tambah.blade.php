@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h3>Tambah Petugas</h3>
            </div>
            <form action="/tambahpetugas" method="post" enctype="multipart/form-data">
                @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col form-group">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" class="form-control bg-transparent @error ('nama') is-invalid @enderror">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control bg-transparent @error ('password') is-invalid @enderror">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="email">email</label>
                        <input type="email" id="email" name="email" class="form-control bg-transparent @error ('email') is-invalid @enderror">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col form-group">
                        <label for="telp">No. Telp</label>
                        <input type="telp" id="telp" name="telp" class="form-control bg-transparent @error ('telp') is-invalid @enderror">
                        @error('telp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="level">Level</label>
                        <select name="level" id="level" class="form-control @error ('level') is-invalid @enderror">
                            <option value="" readonly>Level</option>
                            <option value="admin">Admin</option>
                            <option value="Petugas">Petugas</option>
                        </select>
                        @error('level')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col form-group">
                        <label for="">Foto</label>
                        <div class="custom-file">
                            <label class="custom-file-label" for="foto">Foto</label>
                            <input type="file" class="custom-file-input" id="foto" name="foto">
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col"><button type="submit" class="btn btn-primary">Simpan</button></div>
                </div>
            </div>
            </form>
        </div>

        <a href="/petugas" class="btn btn-dark mt-4"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
@endsection