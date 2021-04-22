<?php

if ( ! function_exists( 'swissaa_register_nav_menu' ) ) {
  function swissaa_register_nav_menu(){
    register_nav_menus( array(
      'primary'          => esc_html__( 'Primary', 'swissaa' ),
      'primary-footer'   => esc_html__( 'Footer Primary', 'primaservice' ),
      'secondary-footer' => esc_html__( 'Footer Secondary', 'primaservice' ),
      'last-footer'      => esc_html__( 'Footer Site Map', 'primaservice' ),
    ));
  }
  add_action( 'after_setup_theme', 'swissaa_register_nav_menu', 0 );
}
