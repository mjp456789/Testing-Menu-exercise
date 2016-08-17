(function(){
  angular.module('exerciseApp',['ngRoute','ui.bootstrap'])
  .config(function($routeProvider){
    $routeProvider
    .when('/',{
      controller:'exerciseController',
      templateUrl:GLOBAL['assetsUrl']+'/angular/views/exerciseTemplate.html'
    })
    .otherwise({redirectTo:'/'});

  });
}());
