(function(){
  angular.module('logmeApp',['ngRoute','ui.bootstrap'])
  .config(function($routeProvider){
    $routeProvider
    .when('/',{
      controller:'logmeController',
      templateUrl:GLOBAL['assetsUrl']+'/angular/views/logmeTemplate.html'
    })
    .otherwise({redirectTo:'/'});

  });
}());
