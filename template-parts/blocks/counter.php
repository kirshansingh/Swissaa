<?php
$blockRootClasses = 'alignfull counter-block';
require get_template_directory() . '/inc/block-start.php';
if(!$block_disabled && empty( $block['data']['block_preview_img'])):
   
   $columns = ( 'v1' == get_field( 'counter_columns' ) )? 'col-sm-4' : 'col-sm-6 col-md-3';
   if ( have_rows( 'counter' ) ) : 
   ?>
   
   <div class="container">
        <div class="about-stats text-center">
            <div class="row">
            
                <?php while ( have_rows( 'counter' ) ) : the_row(); ?>
                    
                    <div class="<?php echo $columns; ?>">
                        <?php  
                            //Heading
                            if( $heading = get_sub_field( 'heading' ) ):
                                $headerTag = (get_sub_field('header_tag')) ? get_sub_field('header_tag') : 'h3';
                                printf( '<%s class="heading mb-4">%s</%s>', $headerTag, $heading, $headerTag );
                            endif; ?>
                            
                			<?php $icon = get_sub_field( 'icon' ); ?>
                			<?php if ( $icon ) : ?>
                				<img src="<?php echo esc_url( $icon['url'] ); ?>" class="img-fluid" alt="<?php echo esc_attr( $icon['alt'] ); ?>" />
                			<?php endif; ?>
                			
                            <?php the_sub_field( 'description' );
                        ?>
                    </div>
                    
                <?php endwhile; ?>
                
            </div>
        </div>
   </div>
    
   <?php
   endif; 
   
endif;
require get_template_directory() . '/inc/block-end.php';