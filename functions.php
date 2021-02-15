<?php
	// Child theme functions
	function my_et_enqueue_styles() { wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); }
	function add_cors_http_header(){ header("Access-Control-Allow-Origin: *"); }

	// Load PHP libraries
	require_once 'php/class-resources.php';
	require_once 'php/class-shortcodes.php';
	require_once 'php/class-blog.php';
	require_once 'php/class-user.php';

	// Apply actions
	add_action('init','add_cors_http_header');
	add_action('wp_enqueue_scripts', 'my_et_enqueue_styles');
	add_action('rest_api_init', 'Six_User::add_rest_route');

	// Initialize classes
	$six_resources = new Six_Resources();
	$six_shortcodes = new Six_Shortcodes();

	// Apply filters
	add_filter('the_content', 'Six_Blog::update_content', 1); // Update post content
	add_filter('init', 'Six_Shortcodes::add_shortcode'); // Add shortcode object
?>