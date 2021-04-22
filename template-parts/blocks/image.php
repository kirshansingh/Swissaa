<?php
$blockRootClasses = 'alignfull counter-block';
require get_template_directory() . '/inc/block-start.php';
if(!$block_disabled && empty( $block['data']['block_preview_img'])):
    
    if( 'v4' == get_field( 'style' ) ):
        ?>
        <section class="container">
            <div class="about-story pb-50">
                <div class="row">
                    <div class="col-md-4 col-lg-3">
                        <?php $left_image = get_field( 'left_image' ); ?>
                    	<?php if ( $left_image ) : ?>
                    		<img src="<?php echo esc_url( $left_image['url'] ); ?>" alt="<?php echo esc_attr( $left_image['alt'] ); ?>" class="img-fluid"/>
                    	<?php endif; ?>
                    </div>
                    <div class="col-md-8 col-lg-9">
    					<div class="row">
    						<div class="col-md-8">
    							<?php 
                                    //Top Content
                                    the_field( 'top_content' ); 
                                    
                                    //Middle Content
                                    if ( have_rows( 'middle_content' ) ) :
                                        while ( have_rows( 'middle_content' ) ) : the_row();
                                            ?>
                                            <div class="row">
                								<div class="col-sm-4">
                                                    <?php $image = get_sub_field( 'image' ); ?>
                                        			<?php if ( $image ) : ?>
                                        				<img class="img-fluid mb-3" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                                        			<?php endif; ?>
                								</div>
                
                								<div class="col-sm-8">
                									<?php the_sub_field( 'content' ); ?>
                								</div>
                							</div>
                                            <?php
                                        endwhile;
                                    endif;
                                    
                                    //Bottom Content
                                    the_field( 'bottom_content' );
                                ?>
    						</div>
    					</div>
    				
                    </div>
                </div>
            </div>
        </section>
        <?php
    elseif( 'v3' == get_field( 'style' ) ):
        ?>
        <section class="text pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <?php the_field( 'description' ); ?>
                    </div>
    				<div class="col-lg-6">
                        <?php 
                            $image = get_field( 'image' );
                            if( $image ):
                        ?>
                        <div class="figure mb-5">
                            <?php echo '<img class="img-fluid" src="'. esc_url( $image['url'] ) .'" alt="'. esc_attr( $image['alt'] ) .'" /><caption>'. wp_get_attachment_caption( $image['ID'] ) .'</caption>'; ?>
                        </div>
                        <?php endif; ?>
    				</div>
                </div>
            </div>
        </section>
        <?php
    elseif( 'v1' == get_field( 'style' ) ):
    ?>
    <section class="text pb-0">
        <div class="container">
            <?php 
                $image = get_field( 'image' );
                if( $image ):
            ?>
            <div class="figure mb-5">
                <?php echo '<img class="img-fluid" src="'. esc_url( $image['url'] ) .'" alt="'. esc_attr( $image['alt'] ) .'" /><caption>'. wp_get_attachment_caption( $image['ID'] ) .'</caption>'; ?>
            </div>
            <?php endif; ?>
            
            <?php if( get_field( '_description' ) ): ?>
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <?php the_field( '_description' ); ?>
                    </div>
                </div>
            <?php endif; ?>
            
        </div>
    </section><br /><br /><br />
    
    <?php else: ?>
    
        <section class="text pb-0">
            <div class="container">
                <?php 
                    //Heading
                    if( $heading = get_field( 'heading' ) ):
                        $headerTag = (get_field('header_tag')) ? get_field('header_tag') : 'h2';
                        printf( '<%s class="heading mb-4">%s</%s>', $headerTag, $heading, $headerTag );
                    endif;
                    
                    //Button
                    $button = get_field( 'button' ); 
                    if( isset( $button ) && !empty( $button ) ):
                        
                        $target = ( isset( $button['target'] ) && !empty( $button['target'] ) )? 'target="'. $button['target'] .'"' : '';
                        $url = ( isset( $button['url'] ) && !empty( $button['url'] ) )? 'href="'. $button['url'] .'"' : '';
                        $title = ( isset( $button['title'] ) && !empty( $button['title'] ) )? $button['title'] : '';
                        
                         printf( 
                         '<a %s %s class="button-red mr-sm-2">%s  
                            <svg version="1.1" width="15px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 13.9 12.1" style="enable-background:new 0 0 13.9 12.1;" xml:space="preserve">                
                                <g transform="translate(0 0.354)">
                                    <line id="Line_10" stroke="currentcolor" x1="0" y1="5.7" x2="13.2" y2="5.7"></line>
                                    <path id="Union_1" stroke="currentcolor" d="M13.2,5.7L7.5,0L13.2,5.7l-5.7,5.7L13.2,5.7z"></path>
                                </g>
                            </svg>
                         </a>', $url, $target, $title  );
                        
                    endif;
                    
                    //Image
                    $image = get_field( 'image' ); 
                    if ( $image ) :
                        echo '<div class="figure my-5">';
                        
                            printf( '<img class="img-fluid" src="%s" alt="%s" />', esc_url( $image['url'] ), esc_attr( $image['alt'] ) );
                            
                            if(  $caption = wp_get_attachment_caption( $image['ID'] )  ):
                                echo '<caption>'. $caption .'</caption>'; 
                            endif;
                        
                        echo '</div>';
                        
                    endif;
                ?>
                
            </div>
        </section>
        
    <?php
    endif;
endif;
require get_template_directory() . '/inc/block-end.php';
?>