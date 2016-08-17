
(function(){
  ModalInstanceCtrl.$inject = ['$scope','$uibModalInstance','userLogin'];
function ModalInstanceCtrl($scope,$uibModalInstance,userLogin){

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
  };
  $scope.getStatus();

  $scope.selectOption = function (option) {
    $scope.waiting = true;
  };

  $scope.cancel = function () {
    $uibModalInstance.dismiss($scope.toio);
  };
}
angular.module('exerciseApp').controller('ModalInstanceCtrl',ModalInstanceCtrl);

// Please note that $uibModalInstance represents a modal window (instance) dependency.
// It is not the same as the $uibModal service used above.

}());
