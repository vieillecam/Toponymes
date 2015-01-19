// initialize the app
var myapp = angular.module('myapp', ['ui.bootstrap','leaflet-directive']);

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

    PlaceMarkers();

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

  angular.extend($scope, {
      center: {
        lat: 46.97621169912407, 
        lng: -70.5556583404541,
        zoom: 14
      },
      markers: {
        osloMarker: {
            lat: 59.91,
            lng: 10.75,
            message: "I want to travel here!",
            focus: false,
            draggable: false
        }
      },
      defaults: {
          scrollWheelZoom: false
      },
      baselayers: {
        cycle: {
            name: 'OpenCycleMap',
            type: 'xyz',
            url: 'http://{s}.tile.opencyclemap.org/cycle/{z}/{x}/{y}.png',
            layerOptions: {
                subdomains: ['a', 'b', 'c'],
                attribution: '© OpenCycleMap contributors - © OpenStreetMap contributors',
                continuousWorld: true
            }
        }}
  });


  function PlaceMarkers(){
    angular.forEach($scope.postdata, function(key, value){
        $scope.marker = {"lat":key.meta.localisation.lat,"lng":key.meta.localisation.lng,"message":key.content};
        //$scope.markers.add(marker);
        console.log($scope.markers);
    })
  }

}]);

