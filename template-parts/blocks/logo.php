<?php
$blockRootClasses = 'alignfull logo-block';
require get_template_directory() . '/inc/block-start.php';
if(!$block_disabled && empty( $block['data']['block_preview_img'])):
    
    ?>
    <section class="container">
        <div class="about-partners">
            <div class="row">
                <div class="col-md-4 col-lg-3">
                    <?php 
                        //Heading
                        if( $heading = get_field( 'heading' ) ):
                            $headerTag = (get_field('header_tag')) ? get_field('header_tag') : 'h2';
                            printf( '<%s class="heading mb-4">%s</%s>', $headerTag, $heading, $headerTag );
                        endif;
                    ?>
                </div>
                <div class="col-md-8 col-lg-6">
                    <?php the_field( 'description' ); ?>
                </div>
            </div>
            
            <?php if ( have_rows( 'logos' ) ) : ?>
                <div class="row">
            		<?php while ( have_rows( 'logos' ) ) : the_row(); ?>
                        
                        <div class="col-sm-6 col-lg-4">
                            <div class="item">
                            
                                <?php $logo = get_sub_field( 'logo' ); ?>
                    			<?php if ( $logo ) : ?>
                    				<div class="thumb"><img src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>" /></div>
                    			<?php endif; ?>
                                
                                <?php the_sub_field( 'description' ); ?>
                                
                    			<?php $link = get_sub_field( 'link' ); ?>
                    			<?php if ( $link ) : ?>
                    				<a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><span><?php echo esc_html( $link['title'] ); ?></span> <svg width="15px" class="ml-1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 13.9 12.1" style="enable-background:new 0 0 13.9 12.1;" xml:space="preserve">
                        <g transform="translate(0 0.354)">
                            <line id="Line_10" stroke="currentColor" x1="0" y1="5.7" x2="13.2" y2="5.7"></line>
                            <path id="Union_1" stroke="currentColor" d="M13.2,5.7L7.5,0L13.2,5.7l-5.7,5.7L13.2,5.7z"></path>
                        </g>
                        </svg></a>
                    			<?php endif; ?> 
                                
                            </div>
                        </div>
                        
            		<?php endwhile; ?>
                </div>
        	<?php endif; ?>

        </div>
    </section>  
    <?php

endif;
require get_template_directory() . '/inc/block-end.php';
?>
