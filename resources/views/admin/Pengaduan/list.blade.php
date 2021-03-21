@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Pengaduan</h1>

        @foreach ($selesai as $s)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Laporan Berstatus Selesai = {{ $s }}
                <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
            </div>
        @endforeach
        @foreach ($proses as $p)
            <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                Laporan Berstatus Proses = {{ $p }}
                <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
            </div>
        @endforeach

        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('status')}}
                <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                List Aduan
            </div>
            <div class="card-body">
                <table id="TPengaduan" class="table table-bordered table-striped text-center" style="width: 100%">
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
                            <td>{{ $p->tanggal_pengaduan }}</td>
                            <td>{{ $p->status }}</td>
                            <td>{{ $p->kategori }}</td>
                            <td>
                                <a href="/detailpengaduan/{{$p->id}}" class="btn btn-primary" style="min-width: 120px;"><i class="fas fa-search"></i> Detail</a>
                                <form action="/deletepengaduan/{{$p->id}}" method="POST" class="d-inline">
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
        $(document).ready( function () {
            $('#TPengaduan').DataTable({
                responsive: true,
                "autoWidth": true,
                scrollX: true,
            });
        });
    </script>
@endsection