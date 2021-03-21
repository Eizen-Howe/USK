@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Masyarakat</h1>

        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button class="close" type="button" data-dismiss="alert"><i class="fas fa-times"></i></button>
        </div>
        @endif

        <div class="card">
            <div class="card-header pb-0">
                <p class="">List Masyarakat</p>
            </div>
            <div class="card-body">
                <table id="TMasyarakat" class="table table-bordered table-striped text-center" style="width: 100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($masyarakat as $rakyat)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$rakyat->nama}}</td>
                            <td>{{ $rakyat->nik }}</td>
                            <td>
                                <a href="/detailmasyarakat/{{ $rakyat->nik }}" class="btn btn-primary" style="min-width: 120px;"><i class="fas fa-search"></i> Detail</a>
                                <form action="/deletemasyarakat/{{ $rakyat->nik }}" method="POST" class="d-inline">
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
    {{-- script --}}
    <script>
      $(function () {
        $("#TMasyarakat").DataTable({
          responsive: true,
          "autoWidth": true,
          "scrollX" : true,
        });
      });
    </script>
@endsection
