@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Laporan</h1>

        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="row input-daterange mb-4">
                        <div class="col"><input class="form-control" id="from-date" type="text" placeholder="From Date" readonly style="cursor: pointer"></div>
                        <div class="col"><input class="form-control" id="to-date" type="text" placeholder="To Date" readonly style="cursor: pointer"></div>
                        <div class="col"><button class="btn btn-primary mr-3" id="filter">Filter</button><button class="btn btn-secondary" id="refresh"> Reset</button></div>
                    </div>
                </div>
                <table id="TLapor" class="table table-bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Tanggal Pengaduan</th>
                            <th>Tipe</th>
                            <th>Isi Laporan</th>
                            <th>Status</th>
                            <th>Tgl Tanggapan</th>
                            <th>Tanggapan</th>
                            <th>Nama Petugas</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

    </div>

<script>
    $(document).ready(function() {
        load_data();
        $('.input-daterange').datepicker({
            todayBTN: 'linked',
            format: 'yyyy-mm-dd',
            autoclose: true,
        });
        $('#filter').click(function(){
            var from_date = $('#from-date').val();
            var to_date = $('#to-date').val();
            if (from_date != '' && to_date != ''){
                $('#TLapor').DataTable().destroy();
                load_data(from_date,to_date);
            } else {
                alert('Both date is required');
            }
        });
        $('#refresh').click(function(){
            $('#from-date').val('');
            $('#to-date').val('');
            $('#TLapor').DataTable().destroy();
            load_data();
        })
        function load_data(from_date = '', to_date = ''){
            $('#TLapor').DataTable({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "autowidth": true,
                scrollX: true,
                dom: 'Bfrtip',
                buttons: [
                    'print'
                ],
                "processing": true,
                "serverSide": true,
                ajax: {
                    url: "{{ route('laporan') }}",
                    type: 'GET',
                    data: {from_date:from_date,to_date:to_date}
                },
                columns: [
                    {data:'nik',name:'nik'},
                    {data:'tanggal_pengaduan',name:'tanggal_pengaduan'},
                    {data:'kategori',name:'kategori'},
                    {data:'isi_laporan',name:'isi_laporan'},
                    {data:'status',name:'status'},
                    {data:'tgl_tanggapan',name:'tgl_tanggapan'},
                    {data:'tanggapan',name:'tanggapan'},
                    {data:'nama_petugas',name:'nama_petugas'}
                ]
            });
        }
    });
</script>
@endsection