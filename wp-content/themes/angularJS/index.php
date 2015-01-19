<?php get_header(); ?>

<!-- <div ng-controller="mycontroller">
  <div>{{sitedata.name}}</div>
  <div>{{sitedata.description}}</div>
  <ul>
    <li ng-repeat="post in postdata">{{post.title}}
	{{post.content}}
    </li>
  </ul>
</div> -->

<!-- <div ng-controller="AlertDemoCtrl">
  <alert ng-repeat="alert in alerts" type="{{alert.type}}" close="closeAlert($index)">{{alert.msg}}</alert>
  <button class='btn btn-default' ng-click="addAlert()">Add Alert</button>
</div> -->

<!-- <div ng-controller="mycontroller">
	<leaflet id="map" center:"center"></leaflet>
</div> -->
<!--     <form>
        Latitude : <input type="number" step="any" ng-model="center.lat">
        Longitude : <input type="number" step="any" ng-model="center.lng">
        Zoom : <input type="number" step="any" ng-model="center.zoom">
    </form> -->


<div ng-controller="mycontroller">
    <leaflet markers="markers" center="center"></leaflet>    	
</div>

<?php get_footer(); ?>