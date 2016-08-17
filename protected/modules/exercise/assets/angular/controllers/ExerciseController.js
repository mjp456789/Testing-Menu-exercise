
(function(){
  exerciseController.$inject = ['$scope','$uibModal','$log'];
function exerciseController($scope,$uibModal,$log){
  //var statsObject = JSON.parse(GLOBAL['statsObject']);
  var statsObject = GLOBAL['statsObject'];
var menuArray =[];
  angular.forEach(statsObject, function(item,menuLabel) {
    menuArray.push(menuLabel);
  });
$scope.$parent.menuOptions = menuArray;
$scope.selectedStats = JSON.parse(statsObject[menuArray[0]])

$scope.$parent.getStats = function(menu){
  console.log(statsObject[menu]);
  $scope.selectedStats = JSON.parse(statsObject[menu])
}
      $scope.open = function (menu) {
        var modalInstance = $uibModal.open({
          animation: $scope.animationsEnabled,
          templateUrl: GLOBAL['assetsUrl']+'/angular/views/modalTemplate.html',
          controller: 'ModalInstanceCtrl',
          resolve: {
            userLogin: function () {
              return user.user_login;
            }
          }
        });

        modalInstance.result.then(function (option) {
          exerciseFactory.setOption(userId,option)
          .success(function(users){
            $scope.users = users;
          })
        }, function (status) {
          if(status != ''){
            user.status = status;
          }
        });
      };

}
angular.module('exerciseApp').controller('exerciseController',exerciseController);

}());
