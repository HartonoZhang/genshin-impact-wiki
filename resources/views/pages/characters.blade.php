@extends('layouts.template')

@section('title-page')
    Characters
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>List Characters</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Characters</li>
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
                        <h3 class="card-title"> <b>{{ $count_data }} Characters</b> match the category selection:</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover" style="text-align: center">
                            <thead>
                                <tr>
                                    <th>Profile</th>
                                    <th>Name</th>
                                    <th>Rarity</th>
                                    <th>Birthday</th>
                                    <th>Element</th>
                                    <th>Weapon</th>
                                    <th>Gender</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr style="line-height: 80px;">
                                        <td><img src="{{ 'https://genshinlist.com/assets/img/characters/' . $item['slug'] . '.png' }}"
                                                alt="" width="80" height="80"></td>
                                        <td>{{ $item['name'] }}</td>
                                        <td>{{ $item['rarity'] }} Star</td>
                                        <td>{{ $item['birthday'] }}</td>
                                        <td>{{ ucfirst($item['vision']) }}</td>
                                        <td>{{ ucfirst($item['weapon']) }}</td>
                                        <td>{{ ucfirst($item['gender']) }}</td>
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
