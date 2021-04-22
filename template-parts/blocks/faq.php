<?php
$blockRootClasses = 'alignfull counter-block';
require get_template_directory() . '/inc/block-start.php';
if(!$block_disabled && empty( $block['data']['block_preview_img'])):
    if ( have_rows( 'faq' ) ) : 
        while ( have_rows( 'faq' ) ) : the_row(); 
            
            echo '<div class="faq">';
                
                //Heading
                if( $heading = get_sub_field( 'heading' ) ):
                    echo '<p>'. $heading .'<p>';
                endif;
                
                //Link
                $link = get_sub_field( 'link' ); 
                if( isset( $link ) && !empty( $link ) ):
                    
                    $target = ( isset( $link['target'] ) && !empty( $link['target'] ) )? 'target="'. $link['target'] .'"' : '';
                    $url = ( isset( $link['url'] ) && !empty( $link['url'] ) )? 'href="'. $link['url'] .'"' : '';
                    $title = ( isset( $link['title'] ) && !empty( $link['title'] ) )? $link['title'] : '';
                    
                     printf( 
                     '<a %s %s class="link">%s  
                        <svg version="1.1" width="15px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 13.9 12.1" style="enable-background:new 0 0 13.9 12.1;" xml:space="preserve">
                            <g transform="translate(0 0.354)">
                                <line id="Line_10" stroke="currentColor" x1="0" y1="5.7" x2="13.2" y2="5.7">
                                </line><path id="Union_1" stroke="currentColor" d="M13.2,5.7L7.5,0L13.2,5.7l-5.7,5.7L13.2,5.7z"></path>
                            </g>
                        </svg>
                     </a>', $url, $target, $title  );
                    
                endif;
            
            echo '</div>';
            
        endwhile;
    endif;
endif;
require get_template_directory() . '/inc/block-end.php';
?>