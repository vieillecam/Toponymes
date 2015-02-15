// initialize the app
var myapp = angular.module('myapp', ['ui.bootstrap', 'leaflet-directive', 'slick']);

// set the configuration 
myapp.run(['$rootScope', function ($rootScope) {
  // the following data is fetched from the JavaScript variables created by wp_localize_script(), and stored in the Angular rootScope
  $rootScope.dir = BlogInfo.url;
  $rootScope.site = BlogInfo.site;
  $rootScope.api = AppAPI.url;
}]);

// add a controller
myapp.controller('mycontroller', ['$scope', '$http', '$filter', function ($scope, $http, $filter) {
  // load posts from the WordPress API
  $http({
    method: 'GET',
    url: $scope.api + "posts", // derived from the rootScope
    params: {
      type: 'toponyme'
    }
  }).
    success(function (data, status, headers, config) {
      $scope.postdata = data;

      PlaceMarkers();

    }).
    error(function (data, status, headers, config) {
      console.log("Erreur dans la récupération des toponymes");
    });

  $http({
    method: 'GET',
    url: $scope.api// derived from the rootScope
    // params: {
    //   json: 'get_posts'
    // }
  }).
  success(function (data, status, headers, config) {
    $scope.sitedata = data;
  }).
  error(function(data, status, headers, config) {
    console.log("Erreur dans la récupération des infos du site");
  });

  angular.extend($scope, {
      center: {
        lat: 46.97621169912407, 
        lng: -70.5556583404541,
        zoom: 14
      },

      defaults: {
          scrollWheelZoom: true,
          tileLayer: 'http://api.tiles.mapbox.com/v4/vieillecam.b02ce6b6/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoidmllaWxsZWNhbSIsImEiOiJhUU5DVV9BIn0.HsF74cv6xUJzwoRDkHPMjQ',
      },
      baselayers: {
        // cycle: {
        //     name: 'OpenCycleMap',
        //     type: 'xyz',
        //     // url: 'http://{s}.tile.opencyclemap.org/cycle/{z}/{x}/{y}.png',
        //     url: 'http://api.tiles.mapbox.com/v4/vieillecam.b02ce6b6/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoidmllaWxsZWNhbSIsImEiOiJhUU5DVV9BIn0.HsF74cv6xUJzwoRDkHPMjQ'
        //     // layerOptions: {
        //     //     subdomains: ['a', 'b', 'c'],
        //     //     attribution: '© OpenCycleMap contributors - © OpenStreetMap contributors',
        //     //     continuousWorld: true
        //     // }
        // }}
        mapbox: {
            name: 'Mapbox',
            type: 'xyz',
            url: 'http://{s}.tiles.mapbox.com/v3/vieillecam.b02ce6b6/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoidmllaWxsZWNhbSIsImEiOiJhUU5DVV9BIn0.HsF74cv6xUJzwoRDkHPMjQ',
            // url: 'http://api.tiles.mapbox.com/v4/vieillecam.b02ce6b6/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoidmllaWxsZWNhbSIsImEiOiJhUU5DVV9BIn0.HsF74cv6xUJzwoRDkHPMjQ',
            layerOptions: {
                subdomains: ['a', 'b', 'c'],
                continuousWorld: true
            }
        }}
  });

  $scope.topo = {
    title: "test",
    content:"description",
    date:"today",
    author: {
      nickname: "camille"
    },
    meta:{
      photo1: "http://placehold.it/300"
    }
  };

  $scope.markers = new Array();

  function PlaceMarkers() {
    angular.forEach($scope.postdata, function (key, value){
        
        $scope.markers.push({
            lat: parseFloat(key.meta.localisation.lat),
            lng: parseFloat(key.meta.localisation.lng),
            message: key.content,
            id: key.ID
        });
    })
  }


  $scope.showdetails = function (markerID) {
     var found = $filter('filter')($scope.postdata, {ID: markerID}, true);
     if (found.length) {
         $scope.topo = found[0];
         $scope.topo.date = new Date(found[0].date).toLocaleDateString(); 
         $scope.topo.content = $scope.topo.content.substr(3,$scope.topo.content.length - 8);
         $scope.topo.content = $scope.topo.content.replace(/&#8217;/g,'\'');
         $scope.topo.title = $scope.topo.title.replace(/&#8217;/g,'\'');
         $scope.topo.meta.photos = new Array();
         $scope.topo.meta.photo1 != false ? $scope.topo.meta.photos.push($scope.topo.meta.photo1):null;
         $scope.topo.meta.photo2 != false ? $scope.topo.meta.photos.push($scope.topo.meta.photo2):null;
         $scope.topo.meta.photo3 != false ? $scope.topo.meta.photos.push($scope.topo.meta.photo3):null;
         $scope.topo.meta.photo4 != false ? $scope.topo.meta.photos.push($scope.topo.meta.photo4):null;
         $scope.topo.meta.photo5 != false ? $scope.topo.meta.photos.push($scope.topo.meta.photo5):null;
     } else {
         $scope.topo = 'Not found';
     }
  }

  $scope.$on('leafletDirectiveMarker.click', function (e, args) {
          // Args will contain the marker name and other relevant information
          var marker = args.leafletEvent.target;
          var id = marker.options.id;
          $scope.showdetails(id);
  }); 

}]);





