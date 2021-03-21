@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h3>Edit Petugas</h3>
            </div>
            <form action="/editpetugas/{{$petugas->id}}" method="post">
                @csrf
                @method('put')
            <div class="card-body">
                <div class="row">
                    <div class="col form-group">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" class="form-control bg-transparent @error ('nama') is-invalid @enderror" value="{{ $petugas->nama_petugas }}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="telp">No. Telp</label>
                        <input type="telp" id="telp" name="telp" class="form-control bg-transparent @error ('telp') is-invalid @enderror" value="{{ $petugas->telp }}">
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
                            @if ($petugas->level=='admin')
                                <option value="Admin">Admin</option>
                                <option value="Petugas">Petugas</option>
                                @else 
                                <option value="Petugas">Petugas</option>
                                <option value="Admin">Admin</option>
                            @endif
                        </select>
                        @error('level')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col"><button type="submit" class="btn btn-primary"> Simpan</button></div>
                </div>
            </div>
            </form>
        </div>

        <a href="/petugas" class="btn btn-dark mt-4"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>

    <script>
        function toggleShow(){
            var x = document.getElementById("password");
            if (x.type === "password"){
                x.type = "text";
                const changeClass = document.querySelector('.fa-eye');
                changeClass.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                x.type = "password";
                const toggleClass = document.querySelector('.fa-eye-slash');
                toggleClass.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
    </script>
@endsection