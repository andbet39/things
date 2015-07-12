conAngular.controller('TaskController', function($rootScope, $scope, $http, $timeout, $interval) {

  // toast
  $timeout(function() {
    Materialize.toast('Welcome to Con!', 1000);
  }, 1000);


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

          $scope.loggedUser = data;
          $scope.updateCounter();

         /* $http.get('/api/users').success(function(data){
            $scope.users = data;

            $http.get('/api/loggedUser').success(function(data){



            });
          });
        */
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
        /*$scope.users.forEach(function(user){
          if($newTask.assigned_id==user.id){
            $newTask.assigned=$scope.users[$newTask.assigned_id]= user;
          }
        });
*/
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
      if($scope.tasks[i].assigned_id == $scope.loggedUser.id)$scope.assigned_to_me +=1;
      if($scope.tasks[i].assigned_id)$scope.assigned +=1;

    };
  }


});