<?php

if (!defined('ABSPATH')){
	exit;
}

//Add Plugin's Scripts
function ssp_add_scripts(){
    //Enqueue Styles
    wp_enqueue_style('ssp-font-awesome', 'https://use.fontawesome.com/releases/v5.0.10/css/all.css', array(), microtime(), 'all');
    wp_enqueue_style('ssp-main-style', plugins_url() . '/simple-scrollup-plugin/assets/css/ssp-style.css', array(), microtime(), 'all');
    
    //Enqueue Scripte
    wp_enqueue_script('ssp-main-style', plugins_url() . '/simple-scrollup-plugin/assets/js/ssp-script.js', array('jquery'), microtime(), true);
}
add_action('wp_enqueue_scripts','ssp_add_scripts' );

function ssp_admin_styles_scripts(){

    if ( is_admin() ){
        wp_enqueue_style('ssp-font-awesome', 'https://use.fontawesome.com/releases/v5.0.10/css/all.css', array(), microtime(), 'all');
        // Add the color picker css file
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_style('ssp-style-admin', plugins_url( 'assets/css/ssp-admin-style.css', plugin_basename( __DIR__)), array(), microtime(), 'all');
        // Include our custom jQuery file with WordPress Color Picker dependency
        wp_enqueue_script( 'ssp-admin-script', plugins_url( '/assets/js/ssp-admin-script.js', plugin_basename( __DIR__)), array( 'jquery', 'wp-color-picker' ), false, true );
    }
}

add_action( 'admin_enqueue_scripts', 'ssp_admin_styles_scripts' );