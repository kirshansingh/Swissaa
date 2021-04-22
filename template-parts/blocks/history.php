<?php
$blockRootClasses = 'alignfull counter-block';
require get_template_directory() . '/inc/block-start.php';
if(!$block_disabled && empty( $block['data']['block_preview_img'])):
    
    if ( have_rows( 'history' ) ) :
        ?>
        <section class="timeline text">
            <div class="container">
                <?php
                    $counter = 1; 
                    while ( have_rows( 'history' ) ) : the_row();
                        
                        //Content
                        $class = ( $counter == 2 )? ' ml-auto' : '';
                        ?>
                        <div class="row">
            				<div class="col-md-5<?php echo $class; ?>">
                                <?php 
                                    //Heading
                                    if( $heading = get_sub_field( 'heading' ) ):
                                        $headerTag = (get_sub_field('header_tag')) ? get_sub_field('header_tag') : 'h3';
                                        printf( '<%s class="heading color-red h1 mb-3">%s</%s>', $headerTag, $heading, $headerTag );
                                    endif;
                                    
                                    //Description
                                    the_sub_field( 'description' );
                                ?>
            				</div>
                        </div>
                        <?php
                        
                        //Image
                        $image = get_sub_field( 'image' );
                        if( $image ):
                            echo '<div class="figure"><img class="img-fluid" src="'. esc_url( $image['url'] ) .'" alt="'. esc_attr( $image['alt'] ) .'" />'. wp_get_attachment_caption( $image['ID'] ) .'</div>';
                        endif;
                        
                        //Counter Increments
                        if( $counter == 2 ):
                            $counter = 1;
                        else:
                            $counter++;
                        endif;
                        
                    endwhile;
                ?>
            </div>
        </section>
        <?php
    endif;

endif;
require get_template_directory() . '/inc/block-end.php';