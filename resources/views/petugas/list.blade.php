@extends('layouts.apppetugas')

@section('content')
    <div class="container mt-4">
        <h1>Pengaduan</h1>

        <div class="card">
            <div class="card-header">
                List Aduan
            </div>
            <div class="card-body">
                <table id="TPengaduan" class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal Pengaduan</th>
                            <th>Status</th>
                            <th>tipe</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengaduan as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$p->tanggal_pengaduan}}</td>
                            <td>{{$p->status}}</td>
                            <td>{{$p->kategori}}</td>
                            <td>
                                <a href="/tambahtanggapan/{{$p->id}}" class="btn btn-success" style="max-width: 120px; width:100%">Tanggapi</a>
                                <a href="/edittanggapan/{{$p->id}}" class="btn btn-primary" style="max-width: 120px; width:100%;">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready( function () {
            $('#TPengaduan').DataTable({
                responsive: true,
                "autoWidth": false,
                scrollX: true,
            });
        });
    </script>
@endsection