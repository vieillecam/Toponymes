// initialize the app
var myapp = angular.module('myapp', ['ui.bootstrap', 'leaflet-directive']);

// set the configuration 
myapp.run(['$rootScope', function ($rootScope) {
  // the following data is fetched from the JavaScript variables created by wp_localize_script(), and stored in the Angular rootScope
  $rootScope.dir = BlogInfo.url;
  $rootScope.site = BlogInfo.site;
  $rootScope.api = AppAPI.url;
}]);


// add a controller
myapp.controller('mycontroller', ['$scope', '$http', '$filter','leafletData', function ($scope, $http, $filter, leafletData) {
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
      $scope.fitMarkersBounds();

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
      },
      events: {
        map: {
            enable: ['click'],
            logic: 'emit'
        }
      },
      iconB: {
        iconUrl: 'http://localhost/img/icon.png',
        shadowUrl: 'http://localhost/img/icon_s.png',
        iconSize:     [38, 95],
          shadowSize:   [50, 64],
          iconAnchor:   [22, 94],
          shadowAnchor: [4, 62]
      },
      layers:{

        baselayers: {

          mapbox: {
              name: 'Mapbox',
              type: 'xyz',
              url: 'http://{s}.tiles.mapbox.com/v3/vieillecam.3d2d958b/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoidmllaWxsZWNhbSIsImEiOiJhUU5DVV9BIn0.HsF74cv6xUJzwoRDkHPMjQ',
              layerOptions: {
                  subdomains: ['a', 'b', 'c'],
                  continuousWorld: true
              }
          }
        },

        topopo: {
          topo: {
            type: "group",
            name: 'toponymes',
            visible: false
          }
        }
      }
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
  $scope.showDetails = false;

  $scope.$on('leafletDirectiveMap.click', function(event){
      $scope.showDetails = false;
  });

  $scope.fitMarkersBounds = function(){
    
    var bounds = [];

    for (var i = 0; i < $scope.markers.length; i++) {
      bounds.push([$scope.markers[i].lat, $scope.markers[i].lng])
    }

    leafletData.getMap().then(function(map) {
        map.fitBounds(bounds);
    });
  }


  function PlaceMarkers() {

    angular.forEach($scope.postdata, function (key, value){
        
        $scope.markers.push({
            //layer: 'topo',
            lat: parseFloat(key.meta.localisation.lat),
            lng: parseFloat(key.meta.localisation.lng),
            message: key.title,
            id: key.ID,
            icon: $scope.iconB
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
         $scope.showDetails = true;
     } else {
         $scope.showDetails = false;
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





