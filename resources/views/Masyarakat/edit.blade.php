@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h3>Data Pengguna</h3>
            </div>
            <form action="" method="POST">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control bg-transparent" id="nik" name="nik">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control bg-transparent" id="nama" name="nama">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control bg-transparent" id="email" name="email">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="telp">No. Telp</label>
                            <input type="text" class="form-control bg-transparent" id="telp" name="telp">
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col">
                        <button type="submit" class="btn btn-primary px-5">Simpan</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection