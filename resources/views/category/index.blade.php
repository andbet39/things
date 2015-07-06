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
            Categorie

        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

    <div class="row">
        <div class="col-md-12">

    <div class="panel panel-default">
        <div class="panel-heading">
            Categorie
        </div>

    <div class="panel-body">
        <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" id="EntryTable">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Colore</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td style="background-color: {{$category->color}}">{{$category->color}}</td>
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