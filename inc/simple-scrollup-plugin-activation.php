<?php
if (!defined('ABSPATH')){
	exit;
}
function ssp_activation() {
	global $wp_version;

	$php = '5.6';
	$wp  = '4.8';

	if ( version_compare( PHP_VERSION, $php, '<' ) ) {
		deactivate_plugins( basename( __FILE__ ) );
		wp_die(
			'<p>' .
			sprintf(
				__( 'This plugin can not be activated because it requires a PHP version greater than %1$s. Your PHP version can be updated by your hosting company.', 'barbareshet_ssp' ),
				$php
			)
			. '</p> <a href="' . admin_url( 'plugins.php' ) . '">' . __( 'go back', 'barbareshet_ssp' ) . '</a>'
		);
	}

	if ( version_compare( $wp_version, $wp, '<' ) ) {
		deactivate_plugins( basename( __FILE__ ) );
		wp_die(
			'<p>' .
			sprintf(
				__( 'This plugin can not be activated because it requires a WordPress version greater than %1$s. Please go to Dashboard &#9656; Updates to gran the latest version of WordPress .', 'barbareshet_ssp' ),
				$php
			)
			. '</p> <a href="' . admin_url( 'plugins.php' ) . '">' . __( 'go back', 'barbareshet_ssp' ) . '</a>'
		);
	}



}
