(function(){
  logmeFactory.$inject = ['$http'];
function logmeFactory($http){

  var factory = {};

  factory.getUsers = function(){
      return $http.get('/DemoVersion/2logme/getUsers');
  }
  factory.setStatus = function(login,option){
      return $http.get('/DemoVersion/2logme/setStatus/'+login+'/'+option);
  }
  factory.getStatus = function(login){
      return $http.get('/DemoVersion/2logme/getStatus/'+login);
  }
return factory;
};
angular.module('logmeApp').factory('logmeFactory',logmeFactory);

}());
