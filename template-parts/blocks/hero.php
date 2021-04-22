<?php
$blockRootClasses = 'alignfull hero-block';
require get_template_directory() . '/inc/block-start.php';
if(!$block_disabled && empty( $block['data']['block_preview_img'])):

    if( 'v1' == get_field( 'style' ) ):
    ?>

    <section class="hero">
        <div class="container">
            <?php 
                //Heading
                if( $heading = get_field( 'heading' ) ):
                    $headerTag = (get_field('header_tag')) ? get_field('header_tag') : 'h1';
                    printf( '<%s>%s</%s>', $headerTag, $heading, $headerTag );
                endif;
                
                //Description
                the_field( 'description' );
                
                //Button
                $button = get_field( 'button' ); 
                if( isset( $button ) && !empty( $button ) ):
                    
                    $target = ( isset( $button['target'] ) && !empty( $button['target'] ) )? 'target="'. $button['target'] .'"' : '';
                    $url = ( isset( $button['url'] ) && !empty( $button['url'] ) )? 'href="'. $button['url'] .'"' : '';
                    $title = ( isset( $button['title'] ) && !empty( $button['title'] ) )? $button['title'] : '';
                    
                    printf( '<a %s %s class="button">%s <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 13.9 12.1" style="enable-background:new 0 0 13.9 12.1;" xml:space="preserve">
                        <g transform="translate(0 0.354)">
                            <line id="Line_10" class="st0" x1="0" y1="5.7" x2="13.2" y2="5.7"></line>
                            <path id="Union_1" class="st0" d="M13.2,5.7L7.5,0L13.2,5.7l-5.7,5.7L13.2,5.7z"></path>
                        </g>
                        </svg></a>', $url, $target, $title  );
                    
                endif; 
            ?>
        </div>
    </section>
    <?php
    elseif( 'v3' == get_field( 'style' ) ):
    ?>
    <section class="hero with-logo">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <?php 
                        //Heading
                        if( $heading = get_field( 'heading' ) ):
                            $headerTag = (get_field('header_tag')) ? get_field('header_tag') : 'h1';
                            printf( '<%s>%s</%s>', $headerTag, $heading, $headerTag );
                        endif;
                        
                        //Description
                        the_field( 'description' );
                    ?>
                </div>
            </div>
            <?php $icon = get_field( 'icon' ); ?>
        	<?php if ( $icon ) : ?>
        		<img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>" class="img-fluid" width="450"/>
        	<?php endif; ?>
        </div>
    </section>
    <?php
    elseif( 'v4' == get_field( 'style' ) ):
    ?>
    <section class="hero about page_header">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 pr-lg-5">
                    <?php 
                        //Heading
                        if( $heading = get_field( 'heading' ) ):
                            $headerTag = (get_field('header_tag')) ? get_field('header_tag') : 'h1';
                            printf( '<%s>%s</%s>', $headerTag, $heading, $headerTag );
                        endif;
                        
                        //Description
                        the_field( 'description' );
                        
                        //Button
                        $button = get_field( 'button' ); 
                        if( isset( $button ) && !empty( $button ) ):
                            
                            $target = ( isset( $button['target'] ) && !empty( $button['target'] ) )? 'target="'. $button['target'] .'"' : '';
                            $url = ( isset( $button['url'] ) && !empty( $button['url'] ) )? 'href="'. $button['url'] .'"' : '';
                            $title = ( isset( $button['title'] ) && !empty( $button['title'] ) )? $button['title'] : '';
                            
                            printf( '<a %s %s class="button">%s <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 13.9 12.1" style="enable-background:new 0 0 13.9 12.1;" xml:space="preserve">
                        <g transform="translate(0 0.354)">
                            <line id="Line_10" class="st0" x1="0" y1="5.7" x2="13.2" y2="5.7"></line>
                            <path id="Union_1" class="st0" d="M13.2,5.7L7.5,0L13.2,5.7l-5.7,5.7L13.2,5.7z"></path>
                        </g>
                        </svg></a>', $url, $target, $title  );
                            
                        endif; 
                    ?>
                </div>
            </div>
        </div>
    </section>   
    <?php
    else:
    ?>
    
    <section class="hero about">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 pr-lg-5">
                    <?php 
                        //Heading
                        if( $heading = get_field( 'heading' ) ):
                            $headerTag = (get_field('header_tag')) ? get_field('header_tag') : 'h1';
							$subtitle = get_field( 'subtitle' );
                            printf( '<%s>%s <br>%s</%s>', $headerTag, $heading, $subtitle, $headerTag );
                        endif;
                        //Description
                        the_field( 'description' );
                        
                        //Button
                        $button = get_field( 'button' ); 
                        if( isset( $button ) && !empty( $button ) ):
                            
                            $target = ( isset( $button['target'] ) && !empty( $button['target'] ) )? 'target="'. $button['target'] .'"' : '';
                            $url = ( isset( $button['url'] ) && !empty( $button['url'] ) )? 'href="'. $button['url'] .'"' : '';
                            $title = ( isset( $button['title'] ) && !empty( $button['title'] ) )? $button['title'] : '';
                            
                            printf( '<a %s %s class="button">%s <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 13.9 12.1" style="enable-background:new 0 0 13.9 12.1;" xml:space="preserve">
                        <g transform="translate(0 0.354)">
                            <line id="Line_10" class="st0" x1="0" y1="5.7" x2="13.2" y2="5.7"></line>
                            <path id="Union_1" class="st0" d="M13.2,5.7L7.5,0L13.2,5.7l-5.7,5.7L13.2,5.7z"></path>
                        </g>
                        </svg></a>', $url, $target, $title  );
                            
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