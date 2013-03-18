angular.module('ngView', [], function($routeProvider, $locationProvider) {
  $routeProvider.when('/angularTest/Book/:bookId', {
    templateUrl: '/angularTest/book.html',
    controller: BookCntl,
    resolve: {
      // I will cause a 1 second delay
      delay: function($q, $timeout) {
        var delay = $q.defer();
        $timeout(delay.resolve, 1000);
        return delay.promise;
      }
    }
  });
  $routeProvider.when('/angularTest/Book/:bookId/ch/:chapterId', {
    templateUrl: '/angularTest/chapter.html',
    controller: ChapterCntl
  });
 
  // configure html5 to get links working on jsfiddle
  $locationProvider.html5Mode(true);
});
 
function MainCntl($scope, $route, $routeParams, $location) {
  $scope.$route = $route;
  $scope.$location = $location;
  $scope.$routeParams = $routeParams;
}
 
function BookCntl($scope, $routeParams) {
  $scope.name = "BookCntl";
  $scope.params = $routeParams;
}
 
function ChapterCntl($scope, $routeParams) {
  $scope.name = "ChapterCntl";
  $scope.params = $routeParams;
}