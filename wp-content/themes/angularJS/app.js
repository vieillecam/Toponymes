// initialize the app
var myapp = angular.module('myapp', ['ui.bootstrap']);

// set the configuration 
myapp.run(['$rootScope', function($rootScope){
  // the following data is fetched from the JavaScript variables created by wp_localize_script(), and stored in the Angular rootScope
  $rootScope.dir = BlogInfo.url;
  $rootScope.site = BlogInfo.site;
  $rootScope.api = AppAPI.url;
}]);

// add a controller
myapp.controller('mycontroller', ['$scope', '$http', function($scope, $http) {
  // load posts from the WordPress API
  $http({
    method: 'GET',
    url: $scope.api + "posts", // derived from the rootScope
    params: {
      type: 'toponyme'
    }
  }).
  success(function(data, status, headers, config) {
    $scope.postdata = data;
  }).
  error(function(data, status, headers, config) {
  });

  $http({
    method: 'GET',
    url: $scope.api// derived from the rootScope
    // params: {
    //   json: 'get_posts'
    // }
  }).
  success(function(data, status, headers, config) {
    $scope.sitedata = data;
  }).
  error(function(data, status, headers, config) {
  });

}]);

myapp.controller('AlertDemoCtrl', function ($scope) {
  $scope.alerts = [
    { type: 'danger', msg: 'Oh snap! Change a few things up and try submitting again.' },
    { type: 'success', msg: 'Well done! You successfully read this important alert message.' }
  ];

  $scope.addAlert = function() {
    $scope.alerts.push({msg: 'Another alert!'});
  };

  $scope.closeAlert = function(index) {
    $scope.alerts.splice(index, 1);
  };
});

