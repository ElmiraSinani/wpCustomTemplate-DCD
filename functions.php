<?php

    // Add RSS links to <head> section
    automatic_feed_links();
	
	
    // Clean up the <head>
    function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
    if ( function_exists("add_theme_support") ) { 
        add_theme_support("post-thumbnails"); 
    } 
    
	// Declare sidebar widget zone
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }
    
    
    
    function load_styles_and_scripts() {
        //load styles       
        wp_enqueue_style('custom-styles', get_template_directory_uri() . '/css/custom-styles.css');   
        wp_enqueue_style('media-queries', get_template_directory_uri() . '/css/media-queries.css');   
        
        if (!is_admin()) {
            wp_deregister_script('jquery');       
            wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.min.js');
        }     
        wp_enqueue_script('bxslider', get_template_directory_uri() . '/js/jquery.bxslider.js', array( 'jquery' ), '20160412', true);
        wp_enqueue_script('fullpagejs', get_template_directory_uri() . '/js/jquery.fullpage.js', array( 'jquery' ), '20160412', true);
        wp_enqueue_script('custom-scripts', get_template_directory_uri() . '/js/custom-scripts.js', array( 'jquery' ), '20160412', true);

    }

    add_action('wp_enqueue_scripts', 'load_styles_and_scripts');   
    
    function register_thecode_menus() {
    register_nav_menus(
            array(
                'main-menu' => __('Main Menu','thecode'),
                'footer-menu' => __('Footer Menu','thecode')
            )
        );
    }
    add_action('init', 'register_thecode_menus');

?>