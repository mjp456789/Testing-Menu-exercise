
(function(){
  logmeController.$inject = ['$scope','$uibModal','$log','logmeFactory'];
function logmeController($scope,$uibModal,$log,logmeFactory){
  logmeFactory.getUsers()
  .success(function(users){
    $scope.users = users;
  })

  $scope.validStatus = function(user){
    var now= new Date();
    if(user.status){
      return "logme-option"+user.status;
    }else{
      return "";
    }
  };



      $scope.open = function (user) {
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
          logmeFactory.setOption(userId,option)
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
angular.module('logmeApp').controller('logmeController',logmeController);

}());
