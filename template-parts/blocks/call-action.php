<?php
$blockRootClasses = 'alignfull call-action-block';
require get_template_directory() . '/inc/block-start.php';
if(!$block_disabled && empty( $block['data']['block_preview_img'])):
    
    if( 'v1' == get_field( 'style' ) ):
    
        //Heading
        if( $heading = get_field( 'heading' ) ):
            $headerTag = (get_field('header_tag')) ? get_field('header_tag') : 'h3';
            printf( '<%s class="heading mb-4">%s</%s>', $headerTag, $heading, $headerTag );
        endif;
        
        //Description
        the_field( 'description' ); 
        
        //Link
        $link = get_field( 'link' ); 
        if( isset( $link ) && !empty( $link ) ):
            
            $target = ( isset( $link['target'] ) && !empty( $link['target'] ) )? 'target="'. $link['target'] .'"' : '';
            $url = ( isset( $link['url'] ) && !empty( $link['url'] ) )? 'href="'. $link['url'] .'"' : '';
            $title = ( isset( $link['title'] ) && !empty( $link['title'] ) )? $link['title'] : '';
            
            if( 'v2' == get_field( 'link_icon' ) ):
                printf( '<a %s %s class="link"><span>%s</span><svg version="1.1" class="ml-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 13.9 12.1" style="enable-background:new 0 0 13.9 12.1;" xml:space="preserve">
                        <g transform="translate(0 0.354)">
                            <line id="Line_10" stroke="currentColor" x1="0" y1="5.7" x2="13.2" y2="5.7"></line>
                            <path id="Union_1" stroke="currentColor" d="M13.2,5.7L7.5,0L13.2,5.7l-5.7,5.7L13.2,5.7z"></path>
                        </g>
                        </svg></a>', $url, $target, $title  );
            else:
                printf( '<a %s %s class="link"><i class="fas fa-file-pdf"></i> <span>%s</span><svg version="1.1" class="ml-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 13.9 12.1" style="enable-background:new 0 0 13.9 12.1;" xml:space="preserve">
                        <g transform="translate(0 0.354)">
                            <line id="Line_10" stroke="currentColor" x1="0" y1="5.7" x2="13.2" y2="5.7"></line>
                            <path id="Union_1" stroke="currentColor" d="M13.2,5.7L7.5,0L13.2,5.7l-5.7,5.7L13.2,5.7z"></path>
                        </g>
                        </svg></a>', $url, $target, $title  );
            endif;
            
        endif; 
        
    elseif( 'v3' == get_field( 'style' ) ):
        ?>
        <div class="container">
            <div class="cta">
                <div class="row">
                    <div class="col-sm-6 col-lg-4">
                        <?php 
                            //Heading
                            if( $heading = get_field( 'heading' ) ):
                                $headerTag = (get_field('header_tag')) ? get_field('header_tag') : 'h3';
                                printf( '<%s class="heading mb-3 text-white">%s</%s>', $headerTag, $heading, $headerTag );
                            endif;
                        ?>
                    </div>
    
                    <div class="col-sm-6 col-lg-4">
                        <?php 
                            if ( have_rows( 'links' ) ) :
                                echo '<ul>';
                                    while ( have_rows( 'links' ) ) : the_row();
                                    
                                        //Link
                                        $link = get_sub_field( 'link' ); 
                                        if( isset( $link ) && !empty( $link ) ):
                                            
                                            $target = ( isset( $link['target'] ) && !empty( $link['target'] ) )? 'target="'. $link['target'] .'"' : '';
                                            $url = ( isset( $link['url'] ) && !empty( $link['url'] ) )? 'href="'. $link['url'] .'"' : '';
                                            $title = ( isset( $link['title'] ) && !empty( $link['title'] ) )? $link['title'] : '';
                                            printf( '
                                                <li>
                                                    <a %s %s>%s 
                                                        <svg width="20px" class="ml-1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 13.9 12.1" style="enable-background:new 0 0 13.9 12.1;" xml:space="preserve">
                                                            <g transform="translate(0 0.354)">
                                                                <line id="Line_10" stroke="currentColor" x1="0" y1="5.7" x2="13.2" y2="5.7"></line>
                                                                <path id="Union_1" stroke="currentColor" d="M13.2,5.7L7.5,0L13.2,5.7l-5.7,5.7L13.2,5.7z"></path>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </li>',
                                            $url, $target, $title );
                                        
                                        endif;
                                    
                                    
                                    endwhile;
                                echo '</ul>';
                            endif;
                        ?>
                    </div>
                </div>
                <?php $image = get_field( 'image' ); ?>
            	<?php if ( $image ) : ?>
                    <div class="bg" style="background: url(<?php echo esc_url( $image['url'] ); ?>) no-repeat center;"></div>
            	<?php endif; ?>
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
                                printf( '<%s class="heading-medium mb-4">%s</%s>', $headerTag, $heading, $headerTag );
                            endif;
                        ?>
                    </div>
                    <div class="col-md-8 col-lg-6">
                        <?php 
                            //Description
                            the_field( 'description' ); 
                            
                            //Link
                            $link = get_field( 'link' ); 
                            if( isset( $link ) && !empty( $link ) ):
                                
                                $target = ( isset( $link['target'] ) && !empty( $link['target'] ) )? 'target="'. $link['target'] .'"' : '';
                                $url = ( isset( $link['url'] ) && !empty( $link['url'] ) )? 'href="'. $link['url'] .'"' : '';
                                $title = ( isset( $link['title'] ) && !empty( $link['title'] ) )? $link['title'] : '';
                                
                                $class = ( 'v2' == get_field( 'link_icon' ) )? 'link' : 'button-red';
                                printf( '<a %s %s class="%s"><span>%s</span><svg version="1.1" width="15px" class="ml-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 13.9 12.1" style="enable-background:new 0 0 13.9 12.1;" xml:space="preserve">
                        <g transform="translate(0 0.354)">
                            <line id="Line_10" stroke="currentColor" x1="0" y1="5.7" x2="13.2" y2="5.7"></line>
                            <path id="Union_1" stroke="currentColor" d="M13.2,5.7L7.5,0L13.2,5.7l-5.7,5.7L13.2,5.7z"></path>
                        </g>
                        </svg></a>', $url, $target, $class, $title  );
                                
                            endif;
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
        
    endif;

endif;
require get_template_directory() . '/inc/block-end.php';
?>
