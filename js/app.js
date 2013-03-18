angular.module('mayuge', [], function($routeProvider, $locationProvider) {
  $routeProvider.when('/', {
    // templateUrl: 'home.php',
    template: 'test',
    controller: mainCntl
    }
  });
  // $routeProvider.when('/about', {
  //   templateUrl: 'about.html',
  //   controller: mainCntl
  // });
 
  // configure html5 to get links working on jsfiddle
  $locationProvider.html5Mode(true);
});