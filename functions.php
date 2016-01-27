<?php

if ( ! function_exists( 'basic_setup' ) ) :

function basic_setup() {

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'basic' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

}
endif;
add_action( 'after_setup_theme', 'basic_setup' );


function basic_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'basic' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the left.', 'basic' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

}
add_action( 'widgets_init', 'basic_widgets_init' );


function basic_scripts() {

	// Normalize css
	wp_enqueue_style( 'basic-normalize', get_template_directory_uri() . '/css/normalize.css', array(), '20160127' );

	// Main stylesheet.
	wp_enqueue_style( 'basic-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Main script
	wp_enqueue_script( 'basic-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20160127', true );
}
add_action( 'wp_enqueue_scripts', 'basic_scripts' );



