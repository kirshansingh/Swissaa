<?php

// Frontend Assets
function swissaa_scripts() {

  global $wp_query;
    
  wp_enqueue_style( 'bootstrap-min',  'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css', false, false );
  wp_enqueue_style( 'font-awesome',  'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', false, false );
  wp_enqueue_style( 'font-style', get_template_directory_uri() . '/assets/fonts/style.css', false, false );
  wp_enqueue_style( 'swissaa-main-style', get_template_directory_uri() . '/assets/css/main.css', false, filemtime(get_template_directory() . '/assets/css/main.css') );
  
  wp_enqueue_script( 'swissaa-plugins', get_template_directory_uri() . '/assets/js/vendor/plugins.js', array('jquery'), filemtime(get_template_directory() . '/assets/js/vendor/plugins.js'), true );
  wp_enqueue_script( 'cookie-min',  'https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.2.0/js.cookie.min.js', false, false, true );
  wp_enqueue_script( 'swissaa-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), filemtime(get_template_directory() . '/assets/js/main.js'), true );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }

  if(get_field('show_popup_after_refuse', 'option')) {
      $cookie_popup = 1;
      $cookie_popup_text = get_field('message_in_popup_after_refuse', 'option');
  }
  else {
      $cookie_popup = 0;
      $cookie_popup_text = '';
  }

  $theme_settings = array(
    'cookie_popup' => $cookie_popup,
    'cookie_popup_text' => $cookie_popup_text,
    'home_dir' => esc_url( home_url('/')),
    'template_dir' => get_template_directory_uri(),
    'ajaxurl' => admin_url( 'admin-ajax.php'),
    'noposts'  => esc_html__('No older posts found', 'swissaa'),
    'loadmore' => esc_html__('Load more', 'swissaa'),
    'loading' => esc_html__('Loading', 'swissaa'),
    'posts' => json_encode( $wp_query->query_vars ),
    'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
    'max_page' => $wp_query->max_num_pages
  );

  wp_localize_script( 'swissaa-script', 'theme_settings', $theme_settings );
}

add_action( 'wp_enqueue_scripts', 'swissaa_scripts' );

// Admin assets
function custom_editor_styles() {
  add_theme_support( 'editor-styles' );
	add_editor_style('assets/css/editor-styles.css');
}
add_action('after_setup_theme', 'custom_editor_styles');

function admin_style() {
  wp_enqueue_style('admin-global', get_stylesheet_directory_uri().'/assets/css/admin-global.css');
}
add_action('admin_enqueue_scripts', 'admin_style');

add_action( 'enqueue_block_editor_assets', function() {
  wp_enqueue_style('admin-acf-blocks', get_stylesheet_directory_uri().'/assets/css/admin-acf-blocks.css');
});