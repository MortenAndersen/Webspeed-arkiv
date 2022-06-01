<?php

// Arkiv

add_action( 'init', 'webspeed_arkiv_create_posttype_arkiv' );

function webspeed_arkiv_create_posttype_arkiv() {
	register_post_type(
	    'webspeedarkiv',
	    array(
	    	'labels' => array(
	    		'name' => __('Arkiv', 'websepeed-arkiv-domain'),
	    		'singular_name' => __('Arkiv', 'websepeed-arkiv-domain')
	    	),
	    	'public' => true,
	    	'exclude_from_search' => true,
			'show_in_admin_bar'   => false,
			'show_in_nav_menus'   => false,
			'publicly_queryable'  => false,
			'query_var'           => false,
	    	'menu_icon' => 'dashicons-archive',
	    	'supports' => array(
	    		'title',
	    		'page-attributes'
	    	),
	    	'show_in_rest' => true,
	    	'rewrite' => array(
	    		'slug' => 'web-arkiv'
	    	),
	    )
	);

}

function webspeed_arkiv_posttype_function() {
	webspeed_arkiv_create_posttype_arkiv();
}

register_activation_hook( __FILE__, 'webspeed_arkiv_posttype_function' );