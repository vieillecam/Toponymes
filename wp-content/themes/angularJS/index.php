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
	      <a class="navbar-brand" href="#">Toponymie de fantaisie</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="#">Montmagny <span class="sr-only">(current)</span></a></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	</nav>


	<div ng-controller="mycontroller" class="row">	
		<div id="map" class="col-lg-8">
			<leaflet markers="markers" center="center" defaults="defaults" layers="layers" id="map"></leaflet>  
		</div> 
  		
		<div class="col-lg-4" id="sidenav">

		<div class="jumbo" ng-if="!showDetails">
			<div id="jumbo" class="jumbotron text-center" >

				<h1>Toponymie de fantaisie</h1>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
				<p><a class="btn btn-primary btn-lg" href="#" role="button">En savoir plus</a></p>
			</div>			
		</div>

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
					<div class="extra content">
					    <div class="right floated author">
					      <img class="ui avatar image" src="{{topo.author.avatar}}"> {{topo.author.nickname}}
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>