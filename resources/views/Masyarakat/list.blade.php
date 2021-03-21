@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        <div class="row px-5 justify-content-center">
            <div class="col-lg-3">
                <a href="" class="text-decoration-none text-reset">
                    <div class="card text-white bg-danger">
                        <div class="card-body text-center">
                            <span><i class="fas fa-times fa-7x color-white"></i></span>
                            <h3>ditolak</h3>
                            <h3>0</h3>
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
                            <h3>0</h3>
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
                            <h3>0</h3>
                        </div>
                    </div>
                </a>
            </div>
        </div>
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
                        <tr>
                            <td>1</td>
                            <td>2020-03-03</td>
                            <td>Selesai</td>
                            <td>Aduan</td>
                            <td>
                                <a href="/detailmasyarakat" class="btn btn-primary" style="min-width: 120px;"><i class="fas fa-search"></i> Detail</a>
                                <a href="" class="btn btn-danger" style="min-width: 120px;"><i class="fas fa-trash-alt"> Hapus</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>2020-03-03</td>
                            <td>Selesai</td>
                            <td>Aduan</td>
                            <td>
                                <a href="/detailmasyarakat" class="btn btn-primary" style="min-width: 120px;"><i class="fas fa-search"></i> Detail</a>
                                <a href="" class="btn btn-danger" style="min-width: 120px;"><i class="fas fa-trash-alt"> Hapus</i></a>
                            </td>
                        </tr>
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