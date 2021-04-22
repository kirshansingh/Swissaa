<?php
  $blockRootClasses = 'c-title c-title--' . get_field('header_size') . ' text-' . get_field('header_color') . ' ';

  if( !empty($block['align']) ) {
    $blockRootClasses .= ' align' . $block['align'];
  }

  require get_template_directory() . '/inc/block-start.php';
  if(!$block_disabled && empty( $block['data']['block_preview_img'])):

  if( !empty( $block['data']['block_preview_img'] ) ) echo '<img src="' . get_template_directory_uri() . '/assets/img/block-preview/' . $block['data']['block_preview_img'] . '" alt="">';
  
?>

<?php 
  if(get_field('mode') == 'simple') {
    echo get_field('header'); 
  } 
  elseif(get_field('mode') == 'advanced') { 
    echo get_field('header_advanced', false, false); 
  } 
?>

<?php
  endif;
  require get_template_directory() . '/inc/block-end-self.php';
?>