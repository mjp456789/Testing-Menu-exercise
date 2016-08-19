
(function(){
  ModalInstanceCtrl.$inject = ['$scope','$sce','$uibModalInstance','showStats'];
function ModalInstanceCtrl($scope,$sce,$uibModalInstance,showStats){

  $scope.statsContent = $sce.trustAsHtml(showStats);

  $scope.cancel = function () {
    $uibModalInstance.dismiss();
  };
}
angular.module('exerciseApp').controller('ModalInstanceCtrl',ModalInstanceCtrl);

// Please note that $uibModalInstance represents a modal window (instance) dependency.
// It is not the same as the $uibModal service used above.

}());
