@extends('layouts.thing')

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

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Movimenti</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

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
                    <th>Reason</th>
                    <th>Amount</th>
                </tr>
                </thead>
                <tbody>
                @foreach($entries as $entry)
                    <tr>
                        <td>{{$entry->reason}}</td>
                        <td>{{$entry->amount}}</td>
                </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
    </div>


        </div>
    </div>

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