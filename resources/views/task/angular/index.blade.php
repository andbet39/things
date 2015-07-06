@extends('layouts.lte')

@section('title', 'Page Title')

@section('head')
    <link rel="stylesheet" href="/lib/angular-bootstrap/ui-bootstrap-csp.css"/>

@endsection

@section('sidebar')
    @parent

@endsection

@section('content')

    <div ng-app="taskApp">
                <!-- Main content -->
        <section class="content" ng-controller="taskController">

            <div class="row">
                <div class="col-md-8">

                    <div class="box box-warning">
                                              <div class="box-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="EntryTable">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Due Date</th>
                                        <th>Assigned To</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr ng-repeat="task in tasks">
                                        <td><% task.name %></td>
                                        <td><% task.due_date | date:'dd-MM-yyyy' %></td>
                                        <td><% task.assigned.name %></td>
                                        <td>
                                            <button ng-click="delete($index)" class="btn btn-danger"><i
                                                        class="fa fa-trash"></i></button>
                                            <button ng-click="select($index)" class="btn btn-success"><i
                                                        class="fa fa-edit"></i></button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h4>Crea nuovo Task</h4>
                        </div>
                        <div class="box-body">
                                <input type="hidden" name='owner_id' ng-model="selected.owner.id" value="{{Auth::User()->id}}">
                                <fieldset>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" ng-model="selected.name">
                                    </div>
                                    <div class="form-group">
                                        <label>Due Date</label>
                                        <div class="input-group">

                                            <input type="text" class="form-control" datepicker-popup="<%format%>" ng-model="selected.due_date" is-open="opened"  datepicker-options="dateOptions"  ng-required="true" close-text="Close" />
                                                  <span class="input-group-btn">
                                                    <button type="button" class="btn btn-default" ng-click="open($event)"><i class="glyphicon glyphicon-calendar"></i></button>
                                                  </span>
                                        </div>
                                    </div>
                                    <div class="form-group" id="div_assigned_id">
                                        <label class="control-label " for="assigned_id">
                                            Assign to <% selected.assigned.name %>
                                        </label>

                                        <div class="controls ">
                                            <select class="select form-control" id="assigned_id" ng-model="selected.assigned_id" name="assigned_id">
                                                <option value="">
                                                    Unassigned
                                                </option>
                                                <option ng-repeat="user in users" value="<%user.id%>">
                                                    <% user.name %>
                                                </option>

                                            </select>
                                        </div>
                                    </div>
                                    <button ng-click="save()"  class="btn btn-success">Save</button>
                                </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('footer')

    <script type="text/javascript" src="/lib/angularjs/angular.js"></script>
    <script type="text/javascript" src="/angular/taskapp.js"></script>

    <script type="text/javascript" src="/lib/moment/min/moment.min.js"></script>
    <script type="text/javascript" src="/lib/angular-bootstrap/ui-bootstrap.js"></script>
    <script type="text/javascript" src="/lib/angular-bootstrap/ui-bootstrap-tpls.js"></script>



@endsection