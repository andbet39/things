@extends('layouts.lte')

@section('title', 'Tasks')

@section('head')
    <link rel="stylesheet" href="/lib/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css"/>
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Tasks
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Crea nuovo Task
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="/task/store">
                            {!! csrf_field() !!}
                            <input type="hidden" name='owner_id' value="{{Auth::User()->id}}">
                            <fieldset>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="control-label " for="datetimepicker1">
                                        Due date
                                    </label>

                                    <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' name="due_date" class="form-control"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group" id="div_assigned_id">
                                    <label class="control-label " for="assigned_id">
                                        Assign to
                                    </label>

                                    <div class="controls ">
                                        <select class="select form-control" id="assigned_id" name="assigned_id">
                                            <option value="">
                                                Unassigned
                                            </option>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">
                                                    {{$user->name}}
                                                </option>
                                            @endforeach
                                        </select>
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
    <script type="text/javascript" src="/lib/moment/min/moment.min.js"></script>
    <script type="text/javascript" src="/lib/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>


    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                format: "DD-MM-YYYY"
            });

        });
    </script>

@endsection