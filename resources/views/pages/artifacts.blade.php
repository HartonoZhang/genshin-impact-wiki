@extends('layouts.template')

@section('title-page')
    Artifacts
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>List Artifacts</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Artifacts</li>
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
                        <h3 class="card-title">There are <b>{{ $count_data }} Artifact Sets:</b></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr style="text-align: center;">
                                    <th>Name Set</th>
                                    <th>2-Piece Bonus</th>
                                    <th>4-Piece Bonus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        @if ($item['slug'] == 'wanderers-troupe')
                                            <td style="text-align: center;"><img
                                                    src="https://rerollcdn.com/GENSHIN/Gear/wanderer's_troupe.png"
                                                    alt="artifact" height="60" width="60"><br>{{ $item['name'] }}</td>
                                        @elseif($item['slug'] == 'defenders-will')
                                            <td style="text-align: center;"><img
                                                    src="https://rerollcdn.com/GENSHIN/Gear/defender's_will.png"
                                                    alt="artifact" height="60" width="60"><br>{{ $item['name'] }}</td>
                                        @elseif($item['slug'] == 'gladiators-finale')
                                            <td style="text-align: center;"><img
                                                    src="https://rerollcdn.com/GENSHIN/Gear/gladiator's_finale.png"
                                                    alt="artifact" height="60" width="60"><br>{{ $item['name'] }}</td>
                                        @else
                                            <?php $convert = str_replace('-', '_', $item['slug']); ?>
                                            <td style="text-align: center;"><img
                                                    src="{{ 'https://rerollcdn.com/GENSHIN/Gear/' . strtolower($convert) . '.png' }}"
                                                    alt="artifact" height="60" width="60"><br>{{ $item['name'] }}</td>
                                        @endif
                                        <td>{{ $item['2_set_bonus'] }}</td>
                                        <td>{{ $item['4_set_bonus'] }}</td>
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
