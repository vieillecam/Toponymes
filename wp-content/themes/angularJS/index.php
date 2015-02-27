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
	<nav class="navbar navbar-inverse" id="nav">
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


	<div ng-controller="mycontroller" class="row">	
		<div id="map" class="col-lg-8">
			<leaflet markers="markers" center="center" defaults="defaults" layers="layers" id="map"></leaflet>  
		</div> 
  		
  		<div class="col-lg-4">
			<div class="ui card" ng-if="showDetails">
				<div class="image">
					<img ng-src="{{topo.meta.photo1}}">
				</div>

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
</div>




<?php get_footer(); ?>