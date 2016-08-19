
(function(){
  exerciseController.$inject = ['$scope','$uibModal','$log'];
function exerciseController($scope,$uibModal,$log){
    var statsObject = angular.fromJson(GLOBAL['statsObject']);
    var menuArray =[];
    angular.forEach(statsObject, function(item,menuLabel) {
      menuArray.push(menuLabel);
    });
  $scope.$parent.menuOptions = menuArray;
  $scope.selectedStats = statsObject[menuArray[0]];
$scope.$parent.getStats = function(menu){
  console.log(statsObject[menu]);
  $scope.selectedStats = statsObject[menu];
}
      $scope.open = function (statsRow) {
        var modalInstance = $uibModal.open({
          animation: $scope.animationsEnabled,
          templateUrl: GLOBAL['assetsUrl']+'/angular/views/modalTemplate.html',
          controller: 'ModalInstanceCtrl',
          resolve: {
            showStats: function () {
              return statsRow.description;
            }
          }
        });

        modalInstance.result.then(function (option) {
        }, function (status) {
        });
      };

}
angular.module('exerciseApp').controller('exerciseController',exerciseController);

}());
