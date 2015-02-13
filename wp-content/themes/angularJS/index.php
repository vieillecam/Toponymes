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
<div class="container-fluid">
	<nav class="navbar navbar-inverse">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Toponymie de fantaisie</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="#">Accueil <span class="sr-only">(current)</span></a></li>
	        <li><a href="#">Villes</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="#">Link</a></li>
	    </div><!-- /.navbar-collapse -->
	</nav>


	<div ng-controller="mycontroller">	

	<div class="row">
		<div id="map" class="col-lg-12">
			<leaflet markers="markers" center="center" class=".col-lg-12 .col-md-12 .col-sm-12 .col-xs-12" id="map"></leaflet>  
		</div> 
	</div>

	<div class="ui card">
	<div class="image">
		<img ng-src="{{topo.meta.photo1}}">
	</div>

<!-- 	<slick infinite="true" dots="true" arrows="true" data="topo.meta.photos" init-onload="true">
	   <div ng-repeat="photo in topo.meta.photos"> 
	      <img ng-src="{{photo}}"  />
	   </div>
	</slick> -->
<!-- 		<div class="image">
			<slick dots="true">
				<img src="http://dummyimage.com/800x600/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image">
				<img src="http://dummyimage.com/800x600/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image">
				<img src="http://dummyimage.com/800x600/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image">
			</slick>
		</div> -->

<!-- 			   <div ng-repeat="img in topo.meta.photos"> 
			      <img ng-src="{{img}}" />
			   </div> -->

	  <div class="content">
	    <a class="header">{{topo.title}}</a>
	    <div class="meta">
	      <span class="date">{{topo.date}}</span>
	    </div>
	    <div class="description">
	      {{topo.content}}
	    </div>
	  </div>
	  <div class="extra content">
	    <a>
	      <i class="user icon"></i>
	      {{topo.author.nickname}}
	    </a>
	  </div>
	</div>
</div>




<?php get_footer(); ?>