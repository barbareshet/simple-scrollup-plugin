<?php

/*
Plugin Name: Simple Scroll-up Plugin
Plugin URI: http://
Description: A Simple Scroll-up Plugin
Author: Ido Barnea
Author URI: https://www.barbareshet.co.il
Version: 1.0
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: barbareshet_ssp
*/

if (!defined('ABSPATH')) {
    exit;
}
//require 'inc/plugin-update-checker/plugin-update-checker.php';
//$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
//    'https://github.com/coinso/coinso-simple-testimonials/',
//    __FILE__,
//    'ssp-options'
//);
//$myUpdateChecker->setBranch('stable');


if ( !defined('SSP_TEXTDOMAIN')){
    define('SSP_TEXTDOMAIN', 'barbareshet_ssp');
}

function ssp_load_textdomain() {
    load_plugin_textdomain( 'barbareshet_ssp', false, basename( dirname( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'ssp_load_textdomain' );

//1.1 register activation
require_once ( plugin_dir_path(__FILE__) . '/inc/simple-scrollup-plugin-activation.php');


register_activation_hook( __FILE__, 'ssp_activation' );

$ssp_options = get_option('ssp_settings');

function ssp_register_settings(){

    register_setting('ssp_settings_group', 'ssp_settings');

}
if ( is_admin() ){

    add_action('admin_init', 'ssp_register_settings');
}
//Load scripts
require_once ( plugin_dir_path(__FILE__) . '/inc/simple-scrollup-plugin-scripts.php');
//Load Content
require_once ( plugin_dir_path(__FILE__) . '/inc/simple-scrollup-plugin-content.php');
//Load Settings only if on the admin side
if ( is_admin()){
    require_once ( plugin_dir_path(__FILE__) . '/inc/simple-scrollup-plugin-settings.php');
}
function ssp_add_settings_link( $links ) {
    $settings_link = '<a href="'.admin_url('admin.php').'?page=ssp-options">' . __( 'Settings', 'ssp_domain' ) . '</a>';
    array_push( $links, $settings_link );
    return $links;
}
$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin", 'ssp_add_settings_link' );



