<?php
/**
 * SWISSAA functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package SWISSAA
 */


// Menu registration (available in Appearance menu item)
require get_template_directory() . '/inc/menu-registration.php';

// WordPress functionality setup
require get_template_directory() . '/inc/wordpress-functionality-setup.php';

// AJAX Load More
require get_template_directory() . '/inc/ajax-load-more.php';

// Enqueue scripts and styles
require get_template_directory() . '/inc/scripts-and-styles.php';

// Settings Pages
require get_template_directory() . '/inc/settings-pages.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Custom functions that act independently of the theme templates.
require get_template_directory() . '/inc/extras.php';

// WordPress improvements - SVG support, slug in body class,
require get_template_directory() . '/inc/wordpress-improvements.php';

// Additional image sizes
require get_template_directory() . '/inc/image-sizes.php';

// Helper functions - Generate phone number, remove protocol from link, excerpt,
// content, create slug from string
require get_template_directory() . '/inc/helper-functions.php';

// Shortcodes - current year, copyright year,
require get_template_directory() . '/inc/shortcodes.php';

// ACF improvements and compatibility functions
require get_template_directory() . '/inc/acf-improvements.php';

// Gutenberg Blocks Loader
require get_template_directory() . '/inc/loader-blocks.php';

// Gutenberg helper functions like spacing calculations, visibility etc.
require get_template_directory() . '/inc/gutenberg-helper-functions.php';

/**
 * Mega Menu additions.
 */
require get_template_directory() . '/inc/mega-menu/mega-menu.php';

/**
 * Load ACF new fields.
 */
require get_template_directory() . '/inc/acf-fields-extends/advanced-custom-fields-font-awesome/acf-font-awesome.php';

/**
 * Register a Service post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
add_action( 'init', 'swissaa_init' );
function swissaa_init() {
    
    //Mega Menu Post Type
    $labels = array(
		'name'               => _x( 'Mega Menu', 'post type general name', 'swissaa' ),
		'singular_name'      => _x( 'Mega Menu', 'post type singular name', 'swissaa' ),
		'menu_name'          => _x( 'Mega Menu', 'admin menu', 'swissaa' ),
		'name_admin_bar'     => _x( 'Mega Menu', 'add new on admin bar', 'swissaa' ),
		'add_new'            => _x( 'Add New', 'Mega Menu', 'swissaa' ),
		'add_new_item'       => __( 'Add New Mega Menu', 'swissaa' ),
		'new_item'           => __( 'New Mega Menu', 'swissaa' ),
		'edit_item'          => __( 'Edit Mega Menu', 'swissaa' ),
		'view_item'          => __( 'View Mega Menu', 'swissaa' ),
		'all_items'          => __( 'All Mega Menu', 'swissaa' ),
		'search_items'       => __( 'Search Mega Menu', 'swissaa' ),
		'parent_item_colon'  => __( 'Parent Mega Menu:', 'swissaa' ),
		'not_found'          => __( 'No Mega Menu found.', 'swissaa' ),
		'not_found_in_trash' => __( 'No Mega Menu found in Trash.', 'swissaa' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'swissaa' ),
		'public'             => true,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'has_archive'        => false,
		'hierarchical'       => true,
		'menu_position'      => 20,
		'supports'           => array( 'title' )
	);
    
    register_post_type( 'Mega Menu', $args );
    
}
