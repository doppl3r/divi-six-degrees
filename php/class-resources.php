<?php
    class Six_Resources {
        public function __construct() {
            if (!is_admin()) {
                // Register scripts and stylesheets
                wp_register_script('featured-post', get_stylesheet_directory_uri() . '/js/featured-post.js', array(), time());
                wp_register_style('featured-post', get_stylesheet_directory_uri() . '/css/featured-post.css', array(), time());
                wp_register_script('popup', get_stylesheet_directory_uri() . '/js/popup.js', array(), time());
                wp_register_style('popup', get_stylesheet_directory_uri() . '/css/popup.css', array(), time());
            }
        }
    }
?>