<?php

/* 
    *My theme functions
*/


// Title function
add_theme_support( 'title-tag' );

// cs and js calling

function rokon_css_js_calling(){
    wp_enqueue_style( 'rokon_style', get_stylesheet_uri( ) );
    wp_register_style( 'rokon_bootstrap', get_template_directory_uri().'/css/bootstrap.min.css' , array(), 'v4.4.1', 'all' );
    wp_enqueue_style('rokon_bootstrap');
    wp_register_style( 'rokon_custom', get_template_directory_uri().'/css/custom.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'rokon_custom' );

    //enque script

    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'rokon_bootstrap_js', get_template_directory_uri().'/js/bootstrap.min.js', array(), 'v4.4.1', true );
    wp_enqueue_script( 'rokon_main', get_template_directory_uri().'/js/main.js', array(), '1.0.0', true );
    
}

add_action( 'wp_enqueue_scripts', 'rokon_css_js_calling');
?>
