<?php
	// Child theme functions
	function my_et_enqueue_styles() { wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); }

	// Load PHP libraries
	require_once 'php/class-resources.php';
	require_once 'php/class-shortcodes.php';
	require_once 'php/class-blog.php';

	// Enqueue child theme information
	add_action( 'wp_enqueue_scripts', 'my_et_enqueue_styles' );

	// Initialize classes
	$six_resources = new Six_Resources();
	$six_shortcodes = new Six_Shortcodes();

	// Apply actions and filters
	add_filter('the_content', 'Six_Blog::update_content', 1); // Update post content
	add_filter('init', 'Six_Shortcodes::add_shortcode'); // Add shortcode object
?>