@extends('layouts.lte')

@section('title', 'Page Title')

@section('head')
    <!-- DataTables CSS -->

    <!-- DataTables Responsive CSS -->
    <link href="/lib/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css" rel="stylesheet">
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
        <div class="col-md-6">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Crea nuova Categoria
                </div>

                <div class="panel-body">
                    <form method="POST" action="/category/store">
                        {!! csrf_field() !!}
                        <fieldset>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name"class="form-control">
                    </div>
                            <div class="form-group">
                    <div class="input-group color">
                        <input type="text" value="" name="color" class="form-control" />
                        <span class="input-group-addon"><i></i></span>
                    </div>
                                </div>
                            <button type="submit" class="btn btn-success">Crea</button>


                            </fieldset>
                        </form>
                </div>
            </div>


        </div>
    </div>
    </section>
@endsection

@section('footer')

    <script src="/lib/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js"></script>


    <script>
        $(function(){
            $('.color').colorpicker();
        });
    </script>

@endsection