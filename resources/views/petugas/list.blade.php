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
                        <tr>
                            <td>1</td>
                            <td>2021-03-03</td>
                            <td>Proses</td>
                            <td>Aduan</td>
                            <td>
                                <a href="/editpengaduan" class="btn btn-primary" style="max-width: 120px; width:100%;"><i class="fas fa-search"></i> Detail</a>
                            </td>
                        </tr>
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