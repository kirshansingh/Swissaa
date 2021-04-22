<?php
$blockRootClasses = 'alignfull counter-block';
require get_template_directory() . '/inc/block-start.php';
if(!$block_disabled && empty( $block['data']['block_preview_img'])):

    if ( have_rows( 'buttons' ) ) : 
        ?>
        <section class="mb-md-5 pb-5">
            <div class="container">
                <?php
                    while ( have_rows( 'buttons' ) ) : the_row();
                        //Link
                        $button = get_sub_field( 'button' ); 
                        if( isset( $button ) && !empty( $button ) ):
                            
                            $target = ( isset( $button['target'] ) && !empty( $button['target'] ) )? 'target="'. $button['target'] .'"' : '';
                            $url = ( isset( $button['url'] ) && !empty( $button['url'] ) )? 'href="'. $button['url'] .'"' : '';
                            $title = ( isset( $button['title'] ) && !empty( $button['title'] ) )? $button['title'] : '';
                            
                             printf( 
                             '<a %s %s class="button-red mb-3 mb-sm-0 mr-sm-2">%s  
                                <svg version="1.1" width="15px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 13.9 12.1" style="enable-background:new 0 0 13.9 12.1;" xml:space="preserve">                
                                    <g transform="translate(0 0.354)">
                                        <line id="Line_10" stroke="currentcolor" x1="0" y1="5.7" x2="13.2" y2="5.7"></line>
                                        <path id="Union_1" stroke="currentcolor" d="M13.2,5.7L7.5,0L13.2,5.7l-5.7,5.7L13.2,5.7z"></path>
                                    </g>
                                </svg>
                             </a>', $url, $target, $title  );
                            
                        endif;
           
                    endwhile;
                ?>
            </div>
        </section>
        <?php
    endif;
    
endif;
require get_template_directory() . '/inc/block-end.php';
?>