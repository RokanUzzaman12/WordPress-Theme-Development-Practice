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


/*============================================================ 
Google Fonts Enque
==============================================================*/

function rokon_google_fonts_enqueue(){
    wp_enqueue_style( 'rokon_google_fonts','https://fonts.googleapis.com/css2?family=Kaisei+Decol&family=Oswald:wght@200..700&display=swap',false );
}

add_action('wp_enqueue_scripts', 'rokon_google_fonts_enqueue');


/*==========================================================
Theme Functions
============================================================*/

function rokon_customizer_register($wp_customize){

    // Header logo section

    $wp_customize->add_section('rokon_header',array(
        'title'=>__("Header Area","rokon"),
        'description'=>"If you want to update your header area, You can do it here"
    ));

    $wp_customize->add_setting('rokon_logo',array(
        'default'=>get_bloginfo('template_directory') . '/img/amazon-logo.png'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'rokon_logo',array(
        'label'=>"logo Upload",
        'setting'=>"rokon_logo",
        'description'=>"If you want to change or update your logo you can do it here",
        'section'=>"rokon_header"
    )));

    // Menu position section

    $wp_customize->add_section('rokon_menu_position',array(
        'title'=> __("Menu Position","rokon"),
        'description'=>"If you want to change your menu position you can do it here"
    ));

    $wp_customize->add_setting('rokon_menu_position_setting',array(
        'default'=>'right_menu'
    ));

    $wp_customize->add_control('rokon_menu_position_setting',array(
        'label'=>"Menu Position",
        'description'=>"Select your menu position",
        'setting'=>'rokon_menu_position_setting',
        'section'=>'rokon_menu_position',
        'type'=>'radio',
        'choices'=> array(
            'left_menu'=> __("Left Menu",'rokon'),
            'right_menu'=> __("Right Menu",'rokon'),
            'center_menu'=> __("Center Menu",'rokon')
        )
    ));
}

add_action('customize_register','rokon_customizer_register');

/*========================================================================= 
Nav menu 
===========================================================================*/

register_nav_menu( 'main_menu', __('Main Menu','rokon') );







?>


