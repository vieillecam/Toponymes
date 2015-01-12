<?php get_header(); ?>
<div ng-controller="mycontroller">
  <!-- display all post titles in a list -->
  <div>{{sitedata.name}}</div>
  <div>{{sitedata.description}}</div>
  <ul>
    <li ng-repeat="post in postdata">{{post.title}}
	{{post.content}}
    </li>
  </ul>
</div>

<!-- <div ng-controller="AlertDemoCtrl">
  <alert ng-repeat="alert in alerts" type="{{alert.type}}" close="closeAlert($index)">{{alert.msg}}</alert>
  <button class='btn btn-default' ng-click="addAlert()">Add Alert</button>
</div> -->

<leaflet width="640px" height="480px"></leaflet>

<?php get_footer(); ?>