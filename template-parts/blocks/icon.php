<?php
$blockRootClasses = 'icon-block';
require get_template_directory() . '/inc/block-start.php';
if(!$block_disabled && empty( $block['data']['block_preview_img'])):
    
    if( 'v3' == get_field( 'style' ) ):
        
        if ( have_rows( 'icons_three' ) ) :
        ?>
        <div class="container">
    		<div class="row">
                <?php while ( have_rows( 'icons_three' ) ) : the_row(); ?>
                    <div class="col-md-3">
                        <?php 
                            //Icon
                            $icon = get_sub_field( 'icon' );
                            if ( $icon ) : 
                                echo '<img src="'. esc_url( $icon['url'] ) .'" alt="'. esc_attr( $icon['alt'] ) .'" class="img-fluid"/>';
                            endif;
                            
                            //Icon SVG
                            the_sub_field( 'icon_svg' );
                            
                            //Heading
                            if( $title = get_sub_field( 'title' ) ):
                                echo '<h3 class="mt-4 h4">'. $title .'</h3>';
                            endif;
                            
                            //Description
                            the_sub_field( 'description' );
                        ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <?php
        endif;
    
    elseif( 'v1' == get_field( 'style' ) ):
    ?>

        <section class="container">
            <div class="why-swiss">
                <?php 
                    //Heading
                    if( $heading = get_field( 'heading' ) ):
                        $headerTag = (get_field('header_tag')) ? get_field('header_tag') : 'h2';
                        printf( '<%s class="heading">%s</%s>', $headerTag, $heading, $headerTag );
                    endif;
                    
                    if ( have_rows( 'icons' ) ) :
                ?>
                    <div class="row text-center">
                		<?php while ( have_rows( 'icons' ) ) : the_row(); ?>
                        
                            <div class="col-sm-6 col-lg-3">
                                <div class="item">
                                     <?php 
                                        $icon = get_sub_field( 'icon' );
                                        if ( $icon ) : 
                                            echo '<img src="'. esc_url( $icon['url'] ) .'" alt="'. esc_attr( $icon['alt'] ) .'" class="img-fluid"/>';
                                        endif;
                                        
                                        //Heading
                                        if( $title = get_sub_field( 'title' ) ):
                                            echo '<span>'. $title .'</span>';
                                        endif;
                                    ?>
                                </div>
                            </div>
                            
                		<?php endwhile; ?>
                    </div>
            	<?php endif; ?>
            </div>
        </section>
    
    <?php else: ?>
    
        <section class="container">
            <div class="organisations">
                <?php 
                    //Heading
                    if( $heading = get_field( 'heading' ) ):
                        $headerTag = (get_field('header_tag')) ? get_field('header_tag') : 'h2';
                        printf( '<%s class="heading">%s</%s>', $headerTag, $heading, $headerTag );
                    endif;
                    
                    if ( have_rows( 'icons_two' ) ) :
                ?>
                
                    <div class="row">
            		    <?php while ( have_rows( 'icons_two' ) ) : the_row(); ?>
                        
                            <div class="col-sm-6">
                                <div class="item">
                                    <h3>
                                        <?php 
                                            $icon = get_sub_field( 'icon' );
                                            if ( $icon ) : 
                                                echo '<img src="'. esc_url( $icon['url'] ) .'" alt="'. esc_attr( $icon['alt'] ) .'" class="img-fluid"/>';
                                            endif;
                                            
                                            //Heading
                                            if( $title = get_sub_field( 'title' ) ):
                                                echo '<span>'. $title .'</span>';
                                            endif;
                                        ?>
                                    </h3>
                                    <?php 
                                        //Description
                                        the_sub_field( 'description' );
                                        
                                        //Button
                                        $button = get_sub_field( 'link' ); 
                                        if( isset( $button ) && !empty( $button ) ):
                                            
                                            $target = ( isset( $button['target'] ) && !empty( $button['target'] ) )? 'target="'. $button['target'] .'"' : '';
                                            $url = ( isset( $button['url'] ) && !empty( $button['url'] ) )? 'href="'. $button['url'] .'"' : '';
                                            $title = ( isset( $button['title'] ) && !empty( $button['title'] ) )? $button['title'] : '';
                                            
                                            printf( '<a %s %s class="link"><span>%s</span> <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 13.9 12.1" style="enable-background:new 0 0 13.9 12.1;" xml:space="preserve">
                                            <g transform="translate(0 0.354)">
                                                <line id="Line_10" stroke="currentColor" x1="0" y1="5.7" x2="13.2" y2="5.7"></line>
                                                <path id="Union_1" stroke="currentColor" d="M13.2,5.7L7.5,0L13.2,5.7l-5.7,5.7L13.2,5.7z"></path>
                                            </g>
                                            </svg></a>', $url, $target, $title  );
                                            
                                        endif;
                                    ?>
                                </div>
                            </div>
                        
            		   <?php endwhile; ?>
                        
                    </div>
            	<?php endif; ?>
                
            </div>
        </section> 
    
        <?php
        endif; 
  endif;
  require get_template_directory() . '/inc/block-end.php';
?>
