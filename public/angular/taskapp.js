/**
 * Created by andreaterzani on 05/07/15.
 */
var app = angular.module('taskApp', ['ui.bootstrap'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

app.controller('taskController', function($scope, $http) {

    $scope.tasks = [];
    $scope.users =[];
    $scope.selected={name:"",due_date:"",assigne:{}};

    $scope.loading = false;


    $scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd-MM-yyyy', 'shortDate'];
    $scope.format = $scope.formats[2];


    $scope.init = function () {
        $scope.loading = true;
        $http.get('/api/tasks').
            success(function (data) {
                $scope.tasks = data;
                $scope.loading = false;

            });
        $http.get('/api/users').success(function(data){
           $scope.users = data;

        });
    };

    $scope.select =function(index){

        $scope.selected= $scope.tasks[index];

    };
    $scope.nuovo = function(){
        $scope.selected={};
    };

    $scope.save = function(){
      $http.post('/api/task',$scope.selected).success(function(){


          $scope.tasks.push($scope.selected);

      });


    };


    $scope.delete = function(index){

        var task = $scope.tasks[index];

        $http.delete('/api/task/'+ task.id).
            success(function(){
                $scope.tasks.splice(index,1);
            });

    };

    $scope.init();




    $scope.open = function($event) {
        $event.preventDefault();
        $event.stopPropagation();

        $scope.opened = true;
    };

    $scope.dateOptions = {
        formatYear: 'yy',
        startingDay: 1
    };



});