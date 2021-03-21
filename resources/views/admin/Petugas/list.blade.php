@extends('layouts.app')

@section('content')

    <div class="container mt-4">
        <h1>Petugas</h1>

        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col my-auto">
                        {{-- left --}}
                        <span class="">List Petugas</span>
                    </div>
                    <div class="col">
                        {{-- right --}}
                        <a href="/tambahpetugas" class="float-right btn btn-success" style="width: 150px;"><i class="fas fa-plus"></i> Tambah</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="TPetugas" class="table table-bordered table-striped text-center" style="width: 100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Petugas</th>
                            <th>No. Telp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($petugas as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->nama_petugas }}</td>
                            <td>{{ $p->telp }}</td>
                            <td>
                                <a href="/detailpetugas/{{ $p->id }}" class="btn btn-primary" style="min-width: 120px;"><i class="fas fa-search"></i> Detail</a>
                                <a href="/editpetugas/{{ $p->id }}" class="btn btn-warning" style="min-width: 120px;"><i class="fas fa-edit"></i> Edit</a>
                                <form action="/deletepetugas/{{ $p->id }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                <button type="submit" class="btn btn-danger" style="min-width: 120px;"><i class="fas fa-trash-alt"></i> Hapus</button>
                                </form>
                            </td>
                        </tr>               
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function() {
            $('#TPetugas').DataTable({
                responsive: true,
                "autoWidth": true,
                scrollX: true,
            });
        });
    </script>
@endsection