<?php 
function mytheme_enqueue_scripts() {
  
  // register AngularJS
  wp_register_script('jQuery', '//code.jquery.com/jquery-1.11.2.min.js', array(), null, false);
  wp_register_script('angular-core', '//ajax.googleapis.com/ajax/libs/angularjs/1.2.28/angular.min.js', array(), null, false);
  //  register the AngularUI Bootstraped js file
  wp_register_script('angular-ui', "//angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.12.0.js", array(), null, false);
  wp_register_script('leaflet-core', "//cdn.leafletjs.com/leaflet-0.7.1/leaflet.js", array(), null, false);
  wp_register_script('leaflet-Angular', get_bloginfo('template_directory')."/angular-leaflet-directive.min.js", array(), null, false);
  wp_register_script('SemanticUI', get_bloginfo('template_directory')."/semantic.min.js", array(), null, false);
  wp_register_script('angular-animate', get_bloginfo('template_directory').'/bower_components/angular-animate/angular-animate.min.js', array(), null, false);
  wp_register_script('angular-aria', get_bloginfo('template_directory').'/bower_components/angular-aria/angular-aria.min.js', array(), null, false);
  wp_register_script('angular-material', get_bloginfo('template_directory').'/bower_components/angular-material/angular-material.min.js', array(), null, false);
  wp_register_script('My-app', get_bloginfo('template_directory').'/app.js', array('angular-core'), null, false);

  // on ajoute les fichiers CSS
  wp_register_style( 'bootstrap-css', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css', array(), null, false );
  wp_register_style( 'leaflet-css', '//cdn.leafletjs.com/leaflet-0.7.1/leaflet.css', array(), null, false );
  wp_register_style( 'semanticCSS', get_bloginfo('template_directory')."/semantic.min.css", array(), null, false );
  wp_register_style( 'angular-material-css', get_bloginfo('template_directory')."/bower_components/angular-material/angular-material.min.css", array(), null, false );
  wp_register_style( 'my-css', get_bloginfo('template_directory')."/style.css", array(), null, false );
  


  // enqueue all scripts
  wp_enqueue_script('jQuery');
  wp_enqueue_script('angular-core');
  wp_enqueue_script('angular-ui');
  wp_enqueue_script('leaflet-core');
  wp_enqueue_script('leaflet-Angular');
  wp_enqueue_script('SemanticUI');
  wp_enqueue_script('angular-animate');
  wp_enqueue_script('angular-aria');
  wp_enqueue_script('angular-material');
  wp_enqueue_script('My-app');

  // enqueue CSS  files
  wp_enqueue_style('bootstrap-css');
  wp_enqueue_style('leaflet-css');
  wp_enqueue_style('semanticCSS');
  wp_enqueue_style('angular-material-css');
  wp_enqueue_style('my-css');

  // we need to create a JavaScript variable to store our API endpoint...   
  wp_localize_script( 'angular-core', 'AppAPI', array( 'url' => get_bloginfo('wpurl').'/wp-json/') ); // this is the API address of the JSON API plugin
  // ... and useful information such as the theme directory and website url
  wp_localize_script( 'angular-core', 'BlogInfo', array( 'url' => get_bloginfo('template_directory').'/', 'site' => get_bloginfo('wpurl')) );
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_scripts');
?>