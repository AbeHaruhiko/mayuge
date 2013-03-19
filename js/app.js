angular.module('mayuge', [], function($routeProvider, $locationProvider) {
  $routeProvider.when('/', {
    templateUrl: '/home.php',
    controller: mayugeCtrl
  });
  $routeProvider.when('/about', {
    templateUrl: '/about.html',
    controller: aboutCtrl
  });
 
  // configure html5 to get links working on jsfiddle
  $locationProvider.html5Mode(true);
});

