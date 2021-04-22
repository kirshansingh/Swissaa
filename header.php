<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SWISSAA
 */

?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php the_field('code_in_header_area', 'option'); ?>
<?php wp_head(); ?>
<script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script> <?php /* Detect if JavaScript is enabled and change class in html element */ ?>
</head>

<body <?php if(defined('WP_DEBUG') && true === WP_DEBUG) { body_class('show-screen-size'); } else { body_class(); } ?>>
<?php the_field('code_after_body_opening_tag', 'option'); ?>
<!--[if lt IE 11]>
<div class="browserupgrade"><?php the_field('notice_for_outdated_browsers', 'option'); ?></div>
<![endif]-->

<div class="wrapper">
    <header>
        <div class="container d-flex justify-content-between align-items-center">
            <a href="<?php echo home_url( '/' ); ?>" class="logo">
                <?php $header_logo = get_field( 'header_logo', 'option' ); ?>
                <?php if ( $header_logo ) : ?>
                	<img src="<?php echo esc_url( $header_logo['url'] ); ?>" alt="<?php echo esc_attr( $header_logo['alt'] ); ?>" class="img-fluid"/>
                <?php endif; ?>
            </a>

            <div class="search">
                <form method="get" action="<?php echo home_url( '/' ); ?>">
                    <input type="text" placeholder="Find Counsel / Arbitrator / Expert" name="s" />
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>

            <div class="hamburger d-lg-none">
                <svg version="1.1" id="menuicon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 29 21.7" style="enable-background:new 0 0 29 21.7;" xml:space="preserve" class="">
                    <style type="text/css">
                        .st0{fill:none;stroke:#010202;}
                    </style>
                    <circle id="left" class="st0" cx="3.5" cy="11" r="3"></circle>
                    <g id="centralCirc" transform="translate(332 25)">
                        <circle class="st0" cx="-317.5" cy="-14" r="3"></circle>
                    </g>
                    <circle id="right" class="st0" cx="25.5" cy="11" r="3"></circle>
                    <g id="closeicon" transform="translate(7.143 7.143)">
                        <line id="Line_124" class="st0" x1="12.7" y1="-1.5" x2="2" y2="9.2"></line>
                        <line id="Line_125" class="st0" x1="2" y1="-1.5" x2="12.7" y2="9.2"></line>
                    </g>
                </svg>
            </div>
        </div>
        <?php
          wp_nav_menu(
            array (
              'theme_location' => 'primary',
              'menu_class' => '',
              'container' => '',
              'walker'    => new Swissaa_Walker_Nav_Menu,
              'items_wrap' => '%3$s',
            )
          );
        ?>

    </header>