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
<?php get_footer(); ?>