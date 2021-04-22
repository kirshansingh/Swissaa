<?php

// Options page for theme
add_action('acf/init', 'my_acf_op_init');

function my_acf_op_init() {
  if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
      'page_title'    => 'Site settings', // German: Theme-Einstellungen
      'menu_title'    => 'Site settings', // German: Theme-Einstell.
      'menu_slug'     => 'theme-general-settings',
      'capability'    => 'edit_posts',
      'redirect'      => false
    ));
  }
}
