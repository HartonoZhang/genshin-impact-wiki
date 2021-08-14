@extends('layouts.template')

@section('title-page')
    Weapons
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>List Weapons</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Weapons</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">There are <b>{{ $count_data }} Weapons:</b></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover" style="text-align: center">
                            <thead>
                                <tr>
                                    <th>Weapon</th>
                                    <th>Type</th>
                                    <th>Rarity</th>
                                    <th>Attack</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <?php $convert = str_replace(' ', '_', $item['name']); ?>
                                        <td><img
                                                src="{{ 'https://rerollcdn.com/GENSHIN/Weapon/NEW/' . $convert . '.png' }}"
                                                alt="weapon" height="70" width="70"><br>{{ $item['name'] }}</td>
                                        <td>{{ ucfirst($item['type']) }}</td>
                                        <td>{{ $item['rarity'] }} Star</td>
                                        <td>{{ $item['atk'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@endsection

@section('custom-script')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('template-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('template-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template-lte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('template-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template-lte/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('template-lte/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('template-lte/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('template-lte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('template-lte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('template-lte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
