@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>History Pengaduan Anda</h1>
        <div class="card mt-4">
            <div class="card-header pb-0">
                <p class="">List Aduan</p>
            </div>
            <div class="card-body">
                <table id="TPengaduan" class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal Aduan</th>
                            <th>Status</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengaduan as $hp)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $hp->tanggal_pengaduan }}</td>
                            <td>{{ $hp->status }}</td>
                            <td>{{ $hp->kategori }}</td>
                            <td>
                                <a href="/detailhistory/{{$hp->id}}" class="btn btn-primary" style="min-width: 120px;"><i class="fas fa-search"></i> Detail</a>
                                <a href="" class="btn btn-danger" style="min-width: 120px;"><i class="fas fa-trash-alt"> Hapus</i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#TPengaduan').DataTable({
                responsive: true,
                "autoWidth": false,
                scrollX: true,
            })
        });
    </script>
@endsection