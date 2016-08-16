
(function(){
  ModalInstanceCtrl.$inject = ['$scope','$uibModalInstance','userLogin','logmeFactory'];
function ModalInstanceCtrl($scope,$uibModalInstance,userLogin,logmeFactory){

  $scope.userLogin = userLogin;
  $scope.waiting = true;
  $scope.status_message = "Status message...";
  $scope.toio = '';
  $scope.getStatus = function () {
    $scope.waiting = true;
    $scope.logged= true;
    $scope.notlogged= true;
    if(angular.isUndefined($scope.userLogin) || $scope.userLogin==null){
      $scope.status_message = "Login is invalid...";
      return;
    }
      $scope.status_message = "Getting status...";
      logmeFactory.getStatus($scope.userLogin).success(function(status){
        $scope.waiting = false;
        var data = status[0];
        if(data){
          $scope.toio = data.Toio;
        }
        if($scope.toio == 'out'){
          $scope.status_message = 'You are logged in';
          $scope.notlogged= false;
        }else if($scope.toio == 'in'){
          $scope.status_message = 'You are NOT logged in';
          $scope.logged= false;
        }else{
          $scope.status_message = 'ERROR - Cannot get status';
        }
      })
  };
  $scope.getStatus();

  $scope.selectOption = function (option) {
    $scope.waiting = true;
    logmeFactory.setStatus($scope.userLogin,option).success(function(status){
    $scope.getStatus();
    })
  };

  $scope.cancel = function () {
    $uibModalInstance.dismiss($scope.toio);
  };
}
angular.module('logmeApp').controller('ModalInstanceCtrl',ModalInstanceCtrl);

// Please note that $uibModalInstance represents a modal window (instance) dependency.
// It is not the same as the $uibModal service used above.

}());
