<?php
$blockRootClasses = 'alignfull hero-block';
require get_template_directory() . '/inc/block-start.php';
if(!$block_disabled && empty( $block['data']['block_preview_img'])):
    
    if( 'v5' == get_field( 'style' ) ):
    ?>
    <section class="container">
        <div class="about-story no-pb">
            <div class="row">
                <div class="col-md-4 col-lg-3">
                    <?php 
                        //Heading
                        if( $heading = get_field( 'heading' ) ):
                            $headerTag = (get_field('header_tag')) ? get_field('header_tag') : 'h2';
                            printf( '<%s class="h4 mb-4">%s</%s>', $headerTag, $heading, $headerTag );
                        endif;
                    ?>
                </div>
                <div class="col-md-8 col-lg-9">
					<div class="row">
						<div class="col-md-8">
							<?php the_field( 'content' ); ?>
						</div>
					</div>					
                </div>
            </div>
        </div>
    </section>
    <?php
    elseif( 'v4' == get_field( 'style' ) ):
    ?>
    <section class="container">
        <div class="rules-alt p-4">
            <div class="row">
                <div class="col-md-6">
                    <?php 
                        //Heading
                        if( $heading = get_field( 'heading' ) ):
                            $headerTag = (get_field('header_tag')) ? get_field('header_tag') : 'h2';
                            printf( '<%s class="heading text-white">%s</%s>', $headerTag, $heading, $headerTag );
                        endif;
                    ?>
                </div>
                <div class="col-md-6">
                	<?php if ( have_rows( 'content_repeat' ) ) : ?>
                		<?php while ( have_rows( 'content_repeat' ) ) : the_row(); ?>
                            <p>            		        
                			<?php the_sub_field( 'content_content' ); ?>
                			<?php $link = get_sub_field( 'link' ); ?>
                			<?php if ( $link ) : ?>
                				<a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?> <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13"><g><g transform="rotate(-45 7 6)"><g><path fill="none" stroke="#fff" stroke-miterlimit="20" stroke-width="1.25" d="M-1 6.33h16.173"></path></g><g><path fill="none" stroke="#fff" stroke-miterlimit="20" stroke-width="1.25" d="M15.173 6.33v0l-7-6.999v0l7 7v0l-7 7v0z"></path></g></g></g></svg></a>
                			<?php endif; ?>
                			</p>
                		<?php endwhile; ?>
                	<?php endif; ?>                    
					<?php the_field( 'content' ); ?>
                </div>
            </div>
        </div>
    </section>
    <?php
    elseif( 'v1' == get_field( 'style' ) ):
    ?>
    <section class="text">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <?php 
                        //Heading
                        if( $heading = get_field( 'heading' ) ):
                            $headerTag = (get_field('header_tag')) ? get_field('header_tag') : 'h2';
                            printf( '<%s class="heading mb-4">%s</%s>', $headerTag, $heading, $headerTag );
                        endif;
                        
                        //Content
                        the_field( 'content' ); 
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php 
    elseif( 'v3' == get_field( 'style' ) ):    
    ?>
    <div class="row">
        <div class="col-md-4 col-lg-5">
            <?php 
                //Heading
                if( $heading = get_field( 'heading' ) ):
                    $headerTag = (get_field('header_tag')) ? get_field('header_tag') : 'h2';
                    printf( '<%s class="heading mb-4">%s</%s>', $headerTag, $heading, $headerTag );
                endif;
            ?>
        </div>
        <div class="col-md-8 col-lg-7">
            <?php the_field( 'content' ); ?>
        </div>
    </div>    
    <?php
    else:
    ?>
    <section class="container">
        <div class="about-story">
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
                    <?php the_field( 'content' ); ?>
                </div>
            </div>
        </div>
    </section>
    <?php
    endif;
    
endif;
require get_template_directory() . '/inc/block-end.php';