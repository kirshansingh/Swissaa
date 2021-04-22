<?php
function register_fields_font_awesome() {

	if ( ! class_exists( 'acf' ) ) {
		return;
	}

	global $acf;

	if ( version_compare( $acf->settings['version'], '5.0', '>=' ) ) {
		include_once( 'acf-font-awesome-v5.php' );
	} else {
		include_once( 'acf-font-awesome-v4.php' );
	}
	
}
add_action( 'init', 'register_fields_font_awesome' );
