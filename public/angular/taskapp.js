/**
 * Created by andreaterzani on 05/07/15.
 */
var app = angular.module('taskApp', ['ui.bootstrap'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

app.directive('icheck', function($timeout, $parse) {
    return {
        require: 'ngModel',
        link: function($scope, element, $attrs, ngModel) {
            return $timeout(function() {
                var value = $attrs['value'];
                $scope.$watch($attrs['ngModel'], function(newValue){
                    $(element).iCheck('update');
                });

                $scope.$watch($attrs['ngDisabled'], function(newValue) {
                    $(element).iCheck(newValue ? 'disable':'enable');
                    $(element).iCheck('update');
                });

                return $(element).iCheck({
                    checkboxClass: 'icheckbox_minimal',
                    radioClass: 'iradio_minimal'
                }).on('ifToggled', function(event) {
                    if ($(element).attr('type') === 'checkbox' && $attrs['ngModel']) {
                        $scope.$apply(function() {
                            return ngModel.$setViewValue(event.target.checked);
                        });
                    }
                    if ($(element).attr('type') === 'radio' && $attrs['ngModel']) {
                        return $scope.$apply(function() {
                            return ngModel.$setViewValue(value);
                        });
                    }
                });
            },300);
        }
    };
});

app.controller('taskController', function($scope, $http) {

    $scope.tasks = [];
    $scope.users =[];
    $scope.selected={name:"",due_date:"",assigned:{},owner:{}};
    $scope.selected_idx;


    $scope.loading = false;


    $scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd-MM-yyyy', 'shortDate'];
    $scope.format = $scope.formats[2];


    $scope.init = function () {
        $scope.loading = true;
        $http.get('/api/tasks').
            success(function (data) {
                $scope.tasks = data;
                $scope.loading = false;

                $http.get('/api/users').success(function(data){
                    $scope.users = data;

                    $http.get('/api/loggedUser').success(function(data){

                        $scope.loggedUser = data;
                        $scope.updateCounter();

                    });
                });

            });

    };

    $scope.setdone= function (index){

        $http.put('/api/task/'+$scope.tasks[index].id, $scope.tasks[index]).success(function () {

            $scope.updateCounter();

        });
        console.log($scope.tasks[index]);
    }

    $scope.select =function(index){

        $scope.selected= $scope.tasks[index];
        $scope.selected_idx=index;
    };
    $scope.nuovo = function(){
        $scope.selected={};
    };

    $scope.save = function(){
        if(!$scope.selected.id) {
            $http.post('/api/task', $scope.selected).success(function () {

                var $newTask = angular.copy($scope.selected);

                $scope.users.forEach(function(user){
                    if($newTask.assigned_id==user.id){
                        $newTask.assigned=$scope.users[$newTask.assigned_id]= user;
                    }
                });


                $scope.tasks.push($newTask);
                $scope.updateCounter();

            });
        }else{//UPDATE
            $http.put('/api/task/'+$scope.selected.id, $scope.selected).success(function () {

                $scope.selected.assigned={};
                $scope.users.forEach(function(user){
                  if($scope.selected.assigned_id==user.id){
                      $scope.selected.assigned = user;
                  }
                });

                $scope.tasks[$scope.seleceted_idx] = angular.copy($scope.selected);
                $scope.selected={};
                $scope.updateCounter();

            });
        }
    };


    $scope.delete = function(index){

        var task = $scope.tasks[index];

        $http.delete('/api/task/'+ task.id).
            success(function(){
                $scope.tasks.splice(index,1);
                $scope.updateCounter();
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

    $scope.total=0;
    $scope.completed=0;
    $scope.assigned_to_me=0;
    $scope.assigned=0;
    $scope.unassigned=0;

   $scope.updateCounter = function(){

       $scope.total=0;
       $scope.completed=0;
       $scope.assigned_to_me=0;
       $scope.assigned=0;
       $scope.unassigned=0;

       console.log($scope.tasks.length);
        $scope.total = $scope.tasks.length;

       for(i=0;i<$scope.tasks.length;i++){
            if($scope.tasks[i].is_completed)$scope.completed +=1;
            if(!$scope.tasks[i].assigned_id)$scope.unassigned +=1;
           if($scope.tasks[i].assigned_id == $scope.loggedUser.id)$scope.assigned_to_me +=1;
           if($scope.tasks[i].assigned_id)$scope.assigned +=1;

        };
    }


});