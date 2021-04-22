<?php
$blockRootClasses = 'alignfull hero-block';
require get_template_directory() . '/inc/block-start.php';
if(!$block_disabled && empty( $block['data']['block_preview_img'])):

    if( 'v1' == get_field( 'style' ) ):
    ?>

        <div class="container">
            <div class="cta">
                <div class="row">
                    <div class="col-sm-6 col-lg-4">
                        <?php 
                            //Heading
                            if( $heading = get_field( 'heading' ) ):
                                $headerTag = (get_field('heading_tag')) ? get_field('heading_tag') : 'h1';
                                printf( '<%s class="heading mb-3 text-white">%s</%s>', $headerTag, $heading, $headerTag );
                            endif;
                            
                            //Description
                            if( $description = get_field( 'description' ) ):
                                echo '<p class="text-white">'. $description .'</p>';
                            endif;
                        ?>
                    </div>
    
                    <div class="col-sm-6 col-lg-4">
                        <?php if ( have_rows( 'links' ) ) : ?>
                            <ul>
                        		<?php while ( have_rows( 'links' ) ) : the_row(); ?>
                        			<?php $link = get_sub_field( 'link' ); ?>
                        			<?php if ( $link ) : ?>
                        				<li>
                                            <a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?> <svg width="20px" class="ml-1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 13.9 12.1" style="enable-background:new 0 0 13.9 12.1;" xml:space="preserve">
                                                <g transform="translate(0 0.354)">
                                                    <line id="Line_10" stroke="currentColor" x1="0" y1="5.7" x2="13.2" y2="5.7"></line>
                                                    <path id="Union_1" stroke="currentColor" d="M13.2,5.7L7.5,0L13.2,5.7l-5.7,5.7L13.2,5.7z"></path>
                                                </g>
                                                </svg>
                                            </a>
                                        </li>
                        			<?php endif; ?>
                        		<?php endwhile; ?>
                            </ul>
                    	<?php endif; ?>
                    </div>
                </div>
                <?php if ( get_field( 'background' ) ) : ?>
                    <div class="bg" style="background: url(<?php the_field( 'background' ); ?>) no-repeat center;"></div>
                <?php endif ?>
            </div>
        </div>

    <?php
    else:
    ?>
    <div class="side-contact">
        <?php 
            //Heading
            if( $heading = get_field( 'heading' ) ):
                printf( '<%s>%s</%s>', 'span', $heading, 'span' );
            endif;
            
            if ( have_rows( 'contact' ) ) :
                echo '<ul class="sidebar-menu">';
                
                while ( have_rows( 'contact' ) ) : the_row();
                    
                    if( $address = get_sub_field( 'address' ) ):
                        echo '<li>'. get_sub_field( 'address' ) .'</li>';
                    endif;
                    
                    if( $phone = get_sub_field( 'phone' ) ):
                        echo '<li><svg xmlns="http://www.w3.org/2000/svg" width="18" height="17" viewBox="0 0 18 17"><g><g><path fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="20" stroke-width="1.25" d="M16.83 12.43v2.387a1.592 1.592 0 0 1-1.736 1.592 15.751 15.751 0 0 1-6.869-2.444A15.52 15.52 0 0 1 3.45 9.19a15.751 15.751 0 0 1-2.444-6.901A1.592 1.592 0 0 1 2.59.554h2.388A1.592 1.592 0 0 1 6.57 1.923c.1.764.288 1.514.557 2.236a1.592 1.592 0 0 1-.358 1.68l-1.011 1.01a12.735 12.735 0 0 0 4.776 4.776l1.01-1.01a1.592 1.592 0 0 1 1.68-.359c.722.27 1.472.457 2.236.557.8.113 1.39.808 1.37 1.616z"/></g></g></svg> <a href="tel:'. $phone .'">'. $phone .'</a></li>';
                    endif;
                    
                    if( $email = get_sub_field( 'email' ) ):
                        echo '<li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="13" viewBox="0 0 16 13"><g><g><g><path fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="20" stroke-width="1.25" d="M2.4.554h11.2c.77 0 1.4.63 1.4 1.4v8.4c0 .77-.63 1.4-1.4 1.4H2.4c-.77 0-1.4-.63-1.4-1.4v-8.4c0-.77.63-1.4 1.4-1.4z"/></g><g><path fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="20" stroke-width="1.25" d="M15 2.992v0l-7 5.7v0l-7-5.7v0"/></g></g></g></svg> <a href="mailto:'. $email .'">'. $email .'</a></li>';
                    endif;
                
                endwhile;
                
                echo '</ul>';
            endif;
        ?>
    </div>
    <?php
    endif;
    
  endif;
  require get_template_directory() . '/inc/block-end.php';
?>
