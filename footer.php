<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SWISSAA
 */

?>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <?php 
                        // Heading
                        if( $heading = get_field( 'primary_menu_heading', 'option' ) ):
                            echo '<h4>'. $heading .'</h4>';
                        endif;
                        
                        wp_nav_menu(
                            array (
                              'theme_location' => 'primary-footer',
                              'container'      => ''
                            )
                          );
                    ?>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3">
                    <?php 
                        // Heading
                        if( $heading = get_field( 'secondary_menu_heading', 'option' ) ):
                            echo '<h4>'. $heading .'</h4>';
                        endif;
                        
                        wp_nav_menu(
                            array (
                              'theme_location' => 'secondary-footer',
                              'container'      => ''
                            )
                          );
                    ?>
                </div>


                <div class="col-md-4 col-lg-3 ml-auto">
                    <div class="app-btn-wrap">
                        <?php 
                            // Heading
                            if( $heading = get_field( 'button_heading', 'option' ) ):
                                echo '<h4>'. $heading .'</h4>';
                            endif;
                            
                            if ( have_rows( 'button', 'option' ) ) :
                                echo '<div class="app-btns">';
                                while ( have_rows( 'button', 'option' ) ) : the_row();
                                    $button_image = get_sub_field( 'button_image' );
                                    if( $button_image ):
                                        echo '<a href="'. get_sub_field( 'button_link' ) .'"><img src="'. esc_url( $button_image['url'] ) .'" class="img-fluid" alt="'. esc_attr( $button_image['alt'] ) .'" /></a>';
                                    endif;
                                endwhile;
                                echo '</div>';
                            endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <?php the_field( 'copyright_text', 'option' ); ?>
                </div>

                <div class="col-lg-7">
                    <?php 
                        wp_nav_menu(
                            array (
                              'theme_location' => 'last-footer',
                              'container'      => ''
                            )
                          );
                    ?>
                </div>   
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.2.0/js.cookie.min.js"></script>
<script>
(function($) {

window.onload = function () {
	const cookieBox = document.getElementById('js-cookie-box');
	if (!Cookies.get('cookie-box')) {
        $("#js-cookie-box").addClass("hide");
        $("#js-cookie-box .btns a:first-child").on( 'click', function(){
    	    Cookies.set('cookie-box', true, { expires: 30 });
      		$("#js-cookie-box").removeClass("hide");
    		return false;
    	})        
	}    
};

})(jQuery);	
</script>
    
<?php if ( get_field( 'disable_cookie', 'option' ) != 1 ) : ?>
    <div class="cookie hide-cookie" id="js-cookie-box">
        <?php 
            //Description
            the_field( 'description', 'option' );
            
            //Links
            if ( have_rows( 'cookie_links', 'option' ) ) :
            
                echo '<p>';
                
                    while ( have_rows( 'cookie_links', 'option' ) ) : the_row(); 
                        
                        $cookie_link = get_sub_field( 'cookie_link' );
                        if( $cookie_link ):
                            echo '<a href="'. esc_url( $cookie_link['url'] ) .'" target="'. esc_attr( $cookie_link['target'] ) .'">'. esc_html( $cookie_link['title'] ) .'</a>';
                        endif;
                        
                    endwhile;
                
                echo '</p>';
                
            endif;
            
            //Buttons
            if ( have_rows( 'cookie_buttons', 'option' ) ) :
            
                echo '<div class="btns">';
                
                    while ( have_rows( 'cookie_buttons', 'option' ) ) : the_row();
                        
                        $button = get_sub_field( 'button' );
                        if( $button ):
                            echo '<a href="'. esc_url( $button['url'] ) .'" target="'. esc_attr( $button['target'] ) .'" class="js-cookie-button">'. esc_html( $button['title'] ) .'</a> ';
                        endif;
                        
                    endwhile; 
                    
                echo '</div>';
                
            endif;
        ?>
    </div>
<?php endif; ?>

<?php wp_footer(); ?>
<?php the_field('code_before_body_ending_tag', 'option'); ?>

</body>
</html>