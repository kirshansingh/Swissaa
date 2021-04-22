<?php
if ( ! defined( 'ABSPATH' ) ){
  exit;  
} 

// Load front-end menu walker
require_once( get_template_directory(). '/inc/mega-menu/mega-menu-walker.php' );

/** --------------------------------------------------------------------------
 * Custom Mega Menu - Fields & Edit Function
 * --------------------------------------------------------------------------- */
class Willowbridge_Mega_Menu {

    /* ---------------------------------------------------------------------------
	 * Custom Fields - Add
	 * --------------------------------------------------------------------------- */
    function setup_nav_menu_item( $menu_item ) {
        
        $menu_item->isMega = get_post_meta( $menu_item->ID, '_menu_item_isMega', true );
        $menu_item->mega_posts = get_post_meta( $menu_item->ID, '_menu_item_mega_posts', true );
        
        return $menu_item;
    }
    
    /* ---------------------------------------------------------------------------
	 * Custom Fields - Save
	 * --------------------------------------------------------------------------- */
	function update_nav_menu_item( $menu_id, $menu_item_db_id, $menu_item_data ) {
		
		// mega menu
		if ( ! isset( $_REQUEST['menu-item-isMega'][$menu_item_db_id]) ) {
			$_REQUEST['menu-item-isMega'][$menu_item_db_id] = '';
		}
		$megamenu = $_REQUEST['menu-item-isMega'][$menu_item_db_id] ? 1 : 0;
		update_post_meta( $menu_item_db_id, '_menu_item_isMega', $megamenu );
        
        // is mega menu
        // Check if element is properly sent
        if ( isset( $_REQUEST['menu-item-mega-posts'] ) && is_array( $_REQUEST['menu-item-mega-posts'] ) ) {
            $mega_posts = isset( $_REQUEST['menu-item-mega-posts'][$menu_item_db_id] ) ? $_REQUEST['menu-item-mega-posts'][$menu_item_db_id] : 0;
            update_post_meta( $menu_item_db_id, '_menu_item_mega_posts', $mega_posts );
        }else {
            delete_post_meta( $menu_item_db_id, '_menu_item_mega_posts' );
        }
  
	}
    
    /* ---------------------------------------------------------------------------
	 * Custom Backend Walker - Edit
	 * --------------------------------------------------------------------------- */
	function edit_nav_menu_walker($walker,$menu_id) {
		return 'Willowbridge_Walker_Nav_Menu_Edit';
	}
    
    function __construct() {
        
        // Custom Fields - Add
		add_filter( 'wp_setup_nav_menu_item',  array( $this, 'setup_nav_menu_item' ) );
	
		// Custom Fields - Save
		add_action( 'wp_update_nav_menu_item', array( $this, 'update_nav_menu_item'), 100, 3 );
	
		// Custom Walker - Edit
		add_filter( 'wp_edit_nav_menu_walker', array( $this, 'edit_nav_menu_walker'), 100, 2 );

    } // end constructor

}

new Willowbridge_Mega_Menu();

/**
 * Create HTML list of nav menu input items.
 * Based on Walker_Nav_Menu_Edit class.
 */
class Willowbridge_Walker_Nav_Menu_Edit extends Walker_Nav_Menu  {
    /**
	 * Starts the list before the elements are added.
	 *
	 * @see Walker_Nav_Menu::start_lvl()
	 */
	function start_lvl( &$output, $depth = 0, $args = array() ) {}

	/**
	 * Ends the list of after the elements are added.
	 *
	 * @see Walker_Nav_Menu::end_lvl()
	 */
	function end_lvl( &$output, $depth = 0, $args = array() ) {}

	/**
	 * Start the element output.
	 *
	 * @see Walker_Nav_Menu::start_el()
	 */
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $_wp_nav_menu_max_depth;
		$_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;
        
        ob_start();
		$item_id = esc_attr( $item->ID );
		$removed_args = array(
			'action',
			'customlink-tab',
			'edit-menu-item',
			'menu-item',
			'page-tab',
			'_wpnonce',
		);
        
        $original_title = '';
		if ( 'taxonomy' == $item->type ) {
			$original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
			if ( is_wp_error( $original_title ) )
				$original_title = false;
		} elseif ( 'post_type' == $item->type ) {
			$original_object = get_post( $item->object_id );
			$original_title = get_the_title( $original_object->ID );
		}

		$classes = array(
			'menu-item menu-item-depth-' . $depth,
			'menu-item-' . esc_attr( $item->object ),
			'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
		);
        
        $title = $item->title;

    	if ( ! empty( $item->_invalid ) ) {
    		$classes[] = 'menu-item-invalid';
    		/* translators: %s: title of menu item which is invalid */
    		$title = sprintf( esc_html__( '%s (Invalid)', 'nexmo' ), $item->title );
    	} elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
    		$classes[] = 'pending';
    		/* translators: %s: title of menu item in draft status */
    		$title = sprintf( esc_html__('%s (Pending)', 'nexmo'), $item->title );
    	}
    
    	$title = ( ! isset( $item->label ) || '' == $item->label ) ? $title : $item->label;
    
    	$submenu_text = '';
    	if ( 0 == $depth )
    		$submenu_text = 'style=display: none;';
	    ?>
	    <li id="menu-item-<?php echo esc_attr( $item_id ); ?>" class="<?php echo implode(' ', $classes ); ?>">
	        <dl class="menu-item-bar">
	            <dt class="menu-item-handle">
                    <span class="item-title"><span class="menu-item-title"><?php echo esc_html( $title ); ?></span> <span class="is-submenu" <?php echo esc_attr( $submenu_text ); ?>><?php _e( 'sub item', 'nexmo' ); ?></span></span>
	                <span class="item-controls">
	                    <span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
	                    <span class="item-order hide-if-js">
	                        <a href="<?php
	                            echo wp_nonce_url(
	                                add_query_arg(
	                                    array(
	                                        'action' => 'move-up-menu-item',
	                                        'menu-item' => $item_id,
	                                    ),
	                                    remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
	                                ),
	                                'move-menu_item'
	                            );
	                        ?>" class="item-move-up"><abbr title="<?php esc_attr_e('Move up', 'nexmo'); ?>">&#8593;</abbr></a>
	                        |
	                        <a href="<?php
	                            echo wp_nonce_url(
	                                add_query_arg(
	                                    array(
	                                        'action' => 'move-down-menu-item',
	                                        'menu-item' => $item_id,
	                                    ),
	                                    remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
	                                ),
	                                'move-menu_item'
	                            );
	                        ?>" class="item-move-down"><abbr title="<?php esc_attr_e('Move down', 'nexmo'); ?>">&#8595;</abbr></a>
	                    </span>
	                    <a class="item-edit" id="edit-<?php echo esc_attr( $item_id ); ?>" title="<?php esc_attr_e('Edit Menu Item', 'nexmo'); ?>" href="<?php
	                        echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );
	                    ?>"><?php _e( 'Edit Menu Item', 'nexmo' ); ?></a>
	                </span>
	            </dt>
	        </dl>

	        <div class="menu-item-settings" id="menu-item-settings-<?php echo esc_attr( $item_id ); ?>">
	            <?php if( 'custom' == $item->type ) : ?>
    				<p class="field-url description description-wide">
    					<label for="edit-menu-item-url-<?php echo esc_attr( $item_id ); ?>">
    						<?php _e( 'URL', 'nexmo' ); ?><br />
    						<input type="text" id="edit-menu-item-url-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
    					</label>
    				</p>
    			<?php endif; ?>
	            <p class="description description-thin">
    				<label for="edit-menu-item-title-<?php echo esc_attr( $item_id ); ?>">
    					<?php _e( 'Navigation Label', 'nexmo' ); ?><br />
    					<input type="text" id="edit-menu-item-title-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
    				</label>
    			</p>
    			<p class="description description-thin">
    				<label for="edit-menu-item-attr-title-<?php echo esc_attr( $item_id ); ?>">
    					<?php _e( 'Title Attribute', 'nexmo' ); ?><br />
    					<input type="text" id="edit-menu-item-attr-title-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
    				</label>
    			</p>
                <p class="field-link-target description">
    				<label for="edit-menu-item-target-<?php echo esc_attr( $item_id ); ?>">
    					<input type="checkbox" id="edit-menu-item-target-<?php echo esc_attr( $item_id ); ?>" value="_blank" name="menu-item-target[<?php echo esc_attr( $item_id ); ?>]"<?php checked( $item->target, '_blank' ); ?> />
    					<?php _e( 'Open link in a new window/tab', 'nexmo' ); ?>
    				</label>
    			</p>
	            <p class="field-css-classes description description-thin">
	                <label for="edit-menu-item-classes-<?php echo esc_attr( $item_id ); ?>">
	                    <?php _e( 'CSS Classes (optional)', 'nexmo' ); ?><br />
	                    <input type="text" id="edit-menu-item-classes-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
	                </label>
	            </p>
	            <p class="field-xfn description description-thin">
	                <label for="edit-menu-item-xfn-<?php echo esc_attr( $item_id ); ?>">
	                    <?php _e( 'Link Relationship (XFN)', 'nexmo' ); ?><br />
	                    <input type="text" id="edit-menu-item-xfn-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
	                </label>
	            </p>
	            <p class="field-description description description-wide">
	                <label for="edit-menu-item-description-<?php echo esc_attr( $item_id ); ?>">
	                    <?php _e( 'Description', 'nexmo' ); ?><br />
	                    <textarea id="edit-menu-item-description-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo esc_attr( $item_id ); ?>]"><?php echo esc_html( $item->description ); // textarea_escaped ?></textarea>
	                    <span class="description"><?php _e('The description will be displayed in the menu if the current theme supports it.', 'nexmo'); ?></span>
	                </label>
	            </p>
	            
                <?php
	            /* New fields insertion starts here */
                if ( 0 == $depth ):
                $value = get_post_meta( $item_id, '_menu_item_isMega', true);
                if( $value != 0 ) $value = "checked='checked'";
	            ?>
                <p class="field-custom description-thin">
    				<label for="edit-menu-item-isMega-<?php echo esc_attr( $item_id ); ?>">
    					<?php _e( 'Mega Menu', 'nexmo' ); ?><br />
                        <input type="checkbox" id="edit-menu-item-isMega-<?php echo esc_attr( $item_id ); ?>" value="1" name="menu-item-isMega[<?php echo esc_attr( $item_id ); ?>]" <?php echo esc_attr( $value ); ?> />
    					<?php _e( 'Activate Mega Menu', 'nexmo' ); ?>
    				</label>
    			</p>
                <?php
                endif;
                
                if( 0 == $depth ):
                    /**
                     * Setup query to show the megamenu post type with ‘8’ posts.
                     * Output the title with an excerpt.
                     */
                        $args = array(  
                            'post_type'      => 'megamenu',
                            'post_status'    => 'publish',
                            'posts_per_page' => -1, 
                            'orderby'        => 'title', 
                            'order'          => 'ASC', 
                        );
                    
                        $loop = new WP_Query( $args ); 
                        ?>
                        <p class="field-custom description-wide">
            				<label for="edit-menu-item-mega-posts-<?php echo esc_attr( $item_id ); ?>">
            					<?php _e( 'Mega Menu Posts', 'willowbridge' );  ?>
                                <select id="edit-menu-item-mega-posts-<?php echo esc_attr( $item_id ); ?>" name="menu-item-mega-posts[<?php echo esc_attr( $item_id ); ?>]">
                                    <option value=""><?php _e( 'Select Mega Post', 'willowbridge' );  ?></option>
                                    <?php 
                                        while ( $loop->have_posts() ) : $loop->the_post(); 
                                            echo '<option value="'. esc_attr( get_the_ID() ) .'" '. selected( $item->mega_posts, get_the_ID() ) .'>'. esc_html( get_the_title() ) .'</option> ';
                                        endwhile;
                                    ?>
                                </select>
            				</label>
            			</p>
                        <?php
                        wp_reset_postdata();
                endif;
                ?>
                <p class="field-move hide-if-no-js description description-wide">
    				<label>
    					<span><?php _e( 'Move', 'nexmo' ); ?></span>
    					<a href="#" class="menus-move-up"><?php _e( 'Up one', 'nexmo' ); ?></a>
    					<a href="#" class="menus-move-down"><?php _e( 'Down one', 'nexmo' ); ?></a>
    					<a href="#" class="menus-move-left"></a>
    					<a href="#" class="menus-move-right"></a>
    					<a href="#" class="menus-move-top"><?php _e( 'To the top', 'nexmo' ); ?></a>
    				</label>
    			</p>
                <div class="menu-item-actions description-wide submitbox">
	                <?php if( 'custom' != $item->type && $original_title !== false ) : ?>
	                    <p class="link-to-original">
	                        <?php printf( __('Original: %s', 'nexmo'), '<a href="' . esc_url( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
	                    </p>
	                <?php endif; ?>
	                <a class="item-delete submitdelete deletion" id="delete-<?php echo esc_attr( $item_id ); ?>" href="<?php
	                echo wp_nonce_url(
	                    add_query_arg(
	                        array(
	                            'action' => 'delete-menu-item',
	                            'menu-item' => $item_id,
	                        ),
	                        remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
	                    ),
	                    'delete-menu_item_' . $item_id    
	                ); ?>"><?php _e( 'Remove', 'nexmo' ); ?></a> <span class="meta-sep hide-if-no-js"> | </span> <a class="item-cancel submitcancel hide-if-no-js" id="cancel-<?php echo esc_attr( $item_id ); ?>" href="<?php echo esc_url( add_query_arg( array( 'edit-menu-item' => $item_id, 'cancel' => time() ), admin_url( 'nav-menus.php' ) ) );?>#menu-item-settings-<?php echo esc_attr( $item_id ); ?>"><?php _e('Cancel', 'nexmo'); ?></a>
	            </div>

	            <input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item_id ); ?>" />
	            <input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
	            <input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
	            <input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
	            <input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
	            <input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
	        </div><!-- .menu-item-settings-->
	        <ul class="menu-item-transport"></ul>
	    <?php

	    $output .= ob_get_clean();
    }
}