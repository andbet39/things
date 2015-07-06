@extends('layouts.lte')

@section('title', 'Page Title')

    @section('head')

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
        <div class="col-md-12">

    <div class="panel panel-default">
        <div class="panel-heading">
            Tasks
        </div>

    <div class="panel-body">
        <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" id="EntryTable">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Due Date</th>
                    <th>Assigned To</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{$task->name}}</td>
                        <td>{{$task->due_date}}</td>
                        <td>{{$task->assigned->name}}</td>
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

@endsection