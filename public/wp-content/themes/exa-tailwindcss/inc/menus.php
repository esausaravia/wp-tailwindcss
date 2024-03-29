<?php

add_filter('wp_nav_menu_args',function($args){
  /*
  $defaults = array(
		'menu'                 => '',
		'container'            => 'nav',
		'container_class'      => '',
		'container_id'         => '',
		'container_aria_label' => '',
		'menu_class'           => 'menu',
		'menu_id'              => '',
		'echo'                 => true,
		'fallback_cb'          => 'wp_page_menu',
		'before'               => '',
		'after'                => '',
		'link_before'          => '',
		'link_after'           => '',
		'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'item_spacing'         => 'preserve',
		'depth'                => 0,
		'walker'               => '',
		'theme_location'       => '',
	);
  //$args = wp_parse_args( $args, $defaults );
  */

  $args['container'] = "nav";
  $args['container_class'] = "menu-container ".$args['container_class'];

  return $args;
},10,1);

add_filter('wp_nav_menu', function($nav_menu, $args){

  $nav_menu = str_replace('<nav ', '<nav role="navigation" ', $nav_menu);

  return $nav_menu;

},10,2);