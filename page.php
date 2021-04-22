<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SWISSAA
 */

get_header(); 
    
    //Breadcrumb
    if ( get_field( 'disable_page_breadcrumb', get_the_ID() ) != 1 ) :
        get_template_part( 'template-parts/breadcrumb' );
    endif;
?>

<div class="l-blocks-wrap">

  <?php
    while ( have_posts() ) : the_post();
      get_template_part( 'template-parts/content', 'page' );
    endwhile;
  ?>

</div>

<?php get_footer(); ?>