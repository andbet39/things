@extends('layouts.lte')



@section('head')

    <link href="/lib/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css" rel="stylesheet">
    <link rel="stylesheet" href="/lib/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" href="/lib/bootstrap-fileinput/css/fileinput.css"/>
    <link href="/lte/plugins/iCheck/all.css" rel="stylesheet" type="text/css"/>

@endsection

@section('sidebar')
    @parent

@endsection

@section('content')

    <section class="content-header">
        <h1>
            Nuova uscita
            <small>Archivio uscite</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Crea nuova spesa
                    </div>

                    <div class="panel-body">
                        <form method="POST" action="/entry/store" enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            <input type="hidden" name='user_id' value="{{Auth::User()->id}}">

                            <div class="form-group" id="div_causale">
                                <label class="control-label requiredField" for="causale">
                                    Causale
           <span class="asteriskField">
            *
           </span>
                                </label>

                                <div class="controls ">
                                    <input class="form-control form-control" id="causale" name="reason" type="text"/>
                                </div>
                            </div>
                            <div class="form-group" id="div_email">
                                <label class="control-label requiredField" for="amount">
                                    Importo
           <span class="asteriskField">
            *
           </span>
                                </label>

                                <div class="controls ">
                                    <input class="form-control" id="amount" name="amount" type="text"/>
                                </div>
                            </div>
                            <div class="form-group" id="div_category_id">
                                <label class="control-label " for="category_id">
                                    Categoria
                                </label>

                                <div class="controls ">
                                    <select class="select form-control" id="category_id" name="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">
                                                {{$category->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label " for="datetimepicker1">
                                    Pagato il
                                </label>

                                <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' name="pagato_il" class="form-control"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                                </div>
                            </div>


                            <div class="form-group" id="div_iva_amount">
                                <label class="control-label " for="iva_amount">
                                    IVA
                                </label>

                                <div class="controls ">
                                    <input class="form-control" id="iva_amount" name="iva_amount" type="text"/>
                                </div>
                            </div>
                            <div class="form-group" id="div_option">
                                <label class="control-label " for="option_0">
                                    Opzioni
                                </label>

                                <div class="controls ">
                                    <div class="checkbox">
                                        <label class="checkbox">
                                            <input id="id_option_1" class="minimal" name="fatturato" type="checkbox"
                                                   value="1"/>
                                            Fatturato
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label class="checkbox">
                                            <input id="id_option_2" class="minimal" name="paid" type="checkbox"
                                                   value="1"/>
                                            Pagato
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="div_option">
                                <label class="control-label " for="file">
                                    Allegato
                                </label>

                                <div class="controls ">
                                    <input id="file" type="file" class="file" name="filefield" multiple="false"
                                           data-show-upload="false" data-show-caption="true">
                                    <!--<input type="file" name="filefield">-->
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <input name="_honey" style="display:none" type="text"/>
                                    <button class="btn btn-primary " name="submit" type="submit">
                                        Inserisci
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>

    </section>
@endsection

@section('footer')

    <script src="/lib/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js"></script>

    <script type="text/javascript" src="/lib/moment/min/moment.min.js"></script>
    <script type="text/javascript"
            src="/lib/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="/lib/bootstrap-fileinput/js/fileinput.js"></script>
    <script type="text/javascript" src="/lte/plugins/iCheck/icheck.js"></script>

    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                format: "DD/MM/YYYY"
            });

            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            });
        });


    </script>

@endsection