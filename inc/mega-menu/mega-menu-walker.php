<?php
/**
* Menu Walker class
* [html_attributes description]
*
* @method html_attributes
* @param  array           $attributes [description]
*
* @return [type]                [description]
*/
function willowbridge_html_attributes($attributes = array(), $prefix = '')
{
    // If empty return false
    if (empty($attributes)) {
        return false;
    }
    $options = false;
    if (isset($attributes['data-options'])) {
        $options = $attributes['data-options'];
        unset($attributes['data-options']);
    }
    $out = '';
    foreach ($attributes as $key => $value) {
        if (!$value) {
            continue;
        }
        $key = $prefix . $key;
        if (true === $value) {
            $value = 'true';
        }
        if (false === $value) {
            $value = 'false';
        }
        if (is_array($value)) {
            $out .= sprintf(' %s=\'%s\'', esc_html($key), json_encode($value));
        } else {
            $out .= sprintf(' %s="%s"', esc_html($key), esc_attr($value));
        }
    }
    if ($options) {
        $out .= sprintf(' data-options=\'%s\'', $options);
    }
    return $out;
}

class Swissaa_Walker_Nav_Menu extends Walker_Nav_Menu
{
    private $has_megamenu = false;
    private $posts        = false;
    
    /**
    
    * @see Walker::start_el()
    
    */
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        
        // Check for Mega Menu
        if (0 === $depth) {
            $this->has_megamenu = $item->isMega;
            $this->posts = $item->mega_posts;
                
        }
        
        // Generate classes for <li>
        $class_names       = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        // Generate <a> attribute
        $atts              = array();
        $atts['title']     = !empty($item->attr_title) ? esc_attr($item->attr_title) : '';
        $atts['target']    = !empty($item->target) ? esc_attr($item->target) : '';
        $atts['rel']       = !empty($item->xfn) ? esc_attr($item->xfn) : '';
        $atts['href']      = !empty($item->url) ? esc_url($item->url) : '';
        
        $atts       = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);
        $attributes = willowbridge_html_attributes($atts);
        
        if( $this->has_megamenu && $this->posts ):
             
            //Query Post
            $loop = new WP_Query("post_type=megamenu&p={$this->posts}");
            
            //Display Content
            if( $loop->have_posts() ):
                ob_start(); 
                
                while ( $loop->have_posts() ) : $loop->the_post(); 
                    
                    get_template_part( 'template-parts/acf-mega', 'menu' );
                    
        
                endwhile;
                
                //Reset Post Query
                wp_reset_postdata();
                
                //Return Output Content.
        		$item_output .= ob_get_contents();
        		ob_end_clean();
                
            endif;
            
            // Output <a>
            $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
            
            
        endif;
    }
    /**
    
    * @see Walker::end_el()
    
    */
    function end_el(&$output, $item, $depth = 0, $args = array())
    {
        if( $depth === 0 && $this->has_megamenu ) {
    		$output .= "\n";
   		}else {
   			$output .= "\n";
   		}
        
    }
    /**
    
    * @see Walker::start_lvl()
    
    */
    function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        
        if( $depth === 0 && $this->has_megamenu ) {
    		$output .= "\n";
   		}else {
   			$output .= "";
   		}
        
        
        
    }
    /**
    
    * @see Walker::end_lvl()
    
    */
    function end_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        
        if( $depth === 0 && $this->has_megamenu ) {
    		$output .= "\n";
   		}else {
   			$output .= "";
   		}
        
    }
}