conAngular.controller('TaskController', function($rootScope, $scope, $http, $timeout, $interval) {


  $scope.tasks = [];
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

          $scope.updateCounter();

        });

  };

  $scope.setdone= function (index){

    if($scope.tasks[index].is_completed){
      $scope.tasks[index].is_completed=false
    }else{
      $scope.tasks[index].is_completed=true;
    }

    $http.put('/api/task/'+$scope.tasks[index].id, $scope.tasks[index]).success(function () {

      $scope.updateCounter();

    });
    console.log($scope.tasks[index]);
  }

  $scope.select =function(index){

    $scope.selected= $scope.tasks[index];
    $scope.selected_idx=index;
  };


  $scope.save = function(){
      $http.post('/api/task', $scope.selected).success(function (data) {

        var $newTask = angular.copy(data);

        console.log(data);

        $scope.selected={};
        $scope.tasks.push($newTask);
        $scope.updateCounter();

      });
  };


  $scope.delete = function(index){

    var task = $scope.tasks[index];
    console.log("delete method");
    $http.delete('/api/task/'+ task.id).
        success(function(){
          $scope.tasks.splice(index,1);
          $scope.updateCounter();
        });

  };

  $scope.init();


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
      if($scope.tasks[i].assigned_id == $rootScope.currentUser.id)$scope.assigned_to_me +=1;
      if($scope.tasks[i].assigned_id)$scope.assigned +=1;

    };
  }


});