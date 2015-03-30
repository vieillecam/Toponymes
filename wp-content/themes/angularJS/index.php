<?php get_header(); ?>

<div class="container-fluid">
	<nav class="navbar navbar-inverse" id="nav">
	    <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="#">
		      <img alt="Brand" src="http://localhost/img/icon.png" style="max-height: 40px; display:inline;">
		      Toponymie de fantaisie
		      </a>
		    </div>

		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li class="active"><a href="#">Montmagny <span class="sr-only">(current)</span></a></li>
		      </ul>
		    </div>
	    </div>
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
						<span class="right floated date">{{topo.date}}</span>
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

<!-- 			<div class="ui card" ng-if="showDetails">
				<div class="content">
					<a class="header">Témoignage 1</a>
					<div class="meta">
						<span class="right floated date">{{topo.date}}</span>
					</div>
					<div class="description">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
					</div>
					<div class="extra content">
					    <div class="right floated author">
					      <img class="ui avatar image" src="{{topo.author.avatar}}"> Isabelle
					    </div>
					</div>
				</div>
			</div>

			<div class="ui card" ng-if="showDetails">
				<div class="content">
					<a class="header">Témoignage 2</a>
					<div class="meta">
						<span class="right floated date">{{topo.date}}</span>
					</div>
					<div class="description">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
					</div>
					<div class="extra content">
					    <div class="right floated author">
					      <img class="ui avatar image" src="{{topo.author.avatar}}"> Robert
					    </div>
					</div>
				</div>
			</div> -->

		</div>
	</div>
</div>
<?php get_footer(); ?>