@extends('layouts.lte')

@section('title', 'Page Title')

    @section('head')
        <!-- DataTables CSS -->
        <link href="/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="/admin/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    @endsection

@section('sidebar')
    @parent

@endsection

@section('content')

    <section class="content-header">
        <h1>
            Movimenti
            <small>Archivio uscite</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

    <div class="row">
        <div class="col-md-12">

    <div class="panel panel-default">
        <div class="panel-heading">
            Movimenti
        </div>

    <div class="panel-body">
        <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" id="EntryTable">
                <thead>
                <tr>
                    <th>Data</th>
                    <th>Causale</th>
                    <th>Importo</th>
                    <th>File</th>
                </tr>
                </thead>
                <tbody>
                @foreach($entries as $entry)
                    <tr>
                        <td>{{date('d/m/Y', strtotime($entry->created_at))}}</td>
                        <td>{{$entry->reason}}</td>
                        <td>{{number_format($entry->amount, 2, '.', '')}}</td>
                        <td>@if($entry->filepath)<a href="/entry/getdoc/{{$entry->id}}"><i class="fa fa-file-pdf-o"></i></a>@endif
                        <a href="/entry/delete/{{$entry->id}}"><i class="fa fa-trash"></i></a></td>
                </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
    </div>


        </div>
    </div>
        </section>

@endsection

@section('footer')
    <!-- DataTables JavaScript -->
    <script src="/admin/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>


    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function() {
            $('#EntryTable').DataTable({
                responsive: true
            });
        });
    </script>
@endsection