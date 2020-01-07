<?php

if (!defined('ABSPATH')){
	exit;
}

//Add Plugin's Scripts
function ssp_add_scripts(){
    global $plugin_version;
    //Enqueue Styles
    wp_enqueue_style('ssp-font-awesome', 'https://use.fontawesome.com/releases/v5.0.10/css/all.css', array(), '', 'all');
    wp_enqueue_style('ssp-main-style', plugins_url( '/assets/css/ssp-style.css', plugin_basename( __DIR__) ), array(), $plugin_version, 'all');

    //Enqueue Scripte
    wp_enqueue_script('ssp-main-style', plugins_url( '/assets/js/ssp-script.js', plugin_basename( __DIR__)), array('jquery'), $plugin_version, true);
}
add_action('wp_enqueue_scripts','ssp_add_scripts' );

function ssp_admin_styles_scripts(){

    if ( is_admin() ){
        wp_enqueue_style('ssp-font-awesome', 'https://use.fontawesome.com/releases/v5.0.10/css/all.css', array(), $plugin_version, 'all');
        // Add the color picker css file
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_style('ssp-style-admin', plugins_url( 'assets/css/ssp-admin-style.css', plugin_basename( __DIR__)), array(), $plugin_version, 'all');
        // Include our custom jQuery file with WordPress Color Picker dependency
        wp_enqueue_script( 'ssp-admin-script', plugins_url( '/assets/js/ssp-admin-script.js', plugin_basename( __DIR__)), array( 'jquery', 'wp-color-picker' ), false, true );
    }
}

add_action( 'admin_enqueue_scripts', 'ssp_admin_styles_scripts' );