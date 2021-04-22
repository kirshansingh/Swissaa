<?php

// Turn on shortcodes for ACF textarea and text fields
function my_acf_format_value( $value, $post_id, $field ) {
    // run do_shortcode on all textarea values
    $value = do_shortcode($value);
    // return
    return $value;
}

add_filter('acf/format_value/type=textarea', 'my_acf_format_value', 10, 3);
add_filter('acf/format_value/type=text', 'my_acf_format_value', 10, 3);

// Load ACF image with support for lazy load (Lazy Loader plugin)
function acf_image($id, $size, $class) {
  if( $id ) {
    global $lazy_loader;
    if ( isset( $lazy_loader ) && $lazy_loader instanceof     FlorianBrinkmann\LazyLoadResponsiveImages\Plugin ) {
      echo $lazy_loader->filter_markup( wp_get_attachment_image( $id, $size, false, array( 'class' => $class )) );
    }
    else {
      echo wp_get_attachment_image( $id, $size, false, array( 'class' => $class ));
    }
  }
}

// Function for generating image from ID with various Lazy Loading options (support for Slick Carousel and Swiper included)
function image_from_id($id, $options = array() ) {
  $defaults = array(
    'size' => 'full',
    'lazyload' => 'lazysizes', // lazysizes / slick / swiper / none
    'class' => ''
  );

  $config = array_merge($defaults, $options);

  if( $id ) {
    global $lazy_loader;
    // if Lazysizes plugin is installed in WP then apply it to the image
    if($config['lazyload'] == 'lazysizes') {
      if(isset( $lazy_loader ) && $lazy_loader instanceof FlorianBrinkmann\LazyLoadResponsiveImages\Plugin ) {
        echo $lazy_loader->filter_markup( wp_get_attachment_image( $id, $config['size'], false, array( 'class' => $config['class'] )) );
      }
      // Plugin is not isntalled. Load standard image
      else {
        echo wp_get_attachment_image( $id, $config['size'], false, array( 'class' => $config['class'] ));
      }
    }
    
    // Load standard image
    if($config['lazyload'] == 'none') {
      $classes = $config['class'] . ' no-lazyload';
      echo wp_get_attachment_image( $id, $config['size'], false, array( 'class' => $classes ));
    }
    
    // Load image prepared for lazyloading in the Slick carousel
    if($config['lazyload'] == 'slick') {
      $img_data = wp_get_attachment_image_src($id, $config['size']);
      $img_width = $img_data[1];
      $img_height = $img_data[2];
      $img_src = $img_data[0];
      $img_alt = get_post_meta($id, '_wp_attachment_image_alt', true);
      $classes = 'skip-lazy'; // to disable lazysizes plugin
      if(!empty($config['class'])) {
        $classes .= ' ' . $config['class'];
      }
      echo '<img data-lazy="' . $img_src . '" class="' . $classes . '"';
      if($img_width > 1) {
        echo ' width="' . $img_width . '"';
      }
      if($img_height > 1) {
        echo ' height="' . $img_height . '"';
      }
      if(!empty($img_alt)) {
        echo ' alt="' . $img_alt . '"';
      }
      echo '>';
    }

    // Load image prepared for lazyloading in the Swiper carousel
    if($config['lazyload'] == 'swiper') {
      $img_data = wp_get_attachment_image_src($id, $config['size']);
      $img_width = $img_data[1];
      $img_height = $img_data[2];
      $img_src = $img_data[0];
      $img_alt = get_post_meta($id, '_wp_attachment_image_alt', true);
      $classes = 'skip-lazy swiper-lazy'; // skip-lazy to disable lazysizes plugin
      if(!empty($config['class'])) {
        $classes .= ' ' . $config['class'];
      }
      echo '<img data-src="' . $img_src . '" class="' . $classes . '"';
      if($img_width > 1) {
        echo ' width="' . $img_width . '"';
      }
      if($img_height > 1) {
        echo ' height="' . $img_height . '"';
      }
      if(!empty($img_alt)) {
        echo ' alt="' . $img_alt . '"';
      }
      echo '>';
      echo '<div class="swiper-lazy-preloader"></div>';
    }
  }
}

// Enable Email Address Encoder plugin in ACF fields
if(function_exists( 'eae_encode_emails' )) {
  add_filter('acf/load_value', 'eae_encode_emails');
}
