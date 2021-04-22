<?php
$blockRootClasses = 'alignfull team-block';
require get_template_directory() . '/inc/block-start.php';
if(!$block_disabled && empty( $block['data']['block_preview_img'])):
    
    if( 'v3' == get_field( 'style' ) ):
        ?>
        <section class="text team-wrap p-0">
            <div class="container">
                <hr>
                <div class="row">
                    <div class="col-md-4 col-lg-3">
                        <?php 
                            //Heading
                            if( $heading = get_field( 'heading' ) ):
                                $headerTag = (get_field('header_tag')) ? get_field('header_tag') : 'h3';
                                printf( '<%s class="heading mb-4">%s</%s>', $headerTag, $heading, $headerTag );
                            endif;
                        ?>
                    </div>
                    <div class="col-md-8 col-lg-7 pr-lg-5">
    					<div class="row">
    						<div class="col-sm-4">
                                <?php $image = get_field( 'display_image' ); ?>
                    			<?php if ( $image ) : ?>
                    				<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" class="img-fluid mb-4"/>
                    			<?php endif; ?>
    						</div>
    						<div class="col-sm-8">
                                <?php 
                                    //Name
                                    if( $name = get_field( 'name' ) ):
                                        echo '<p>'. $name .'</p>';
                                    endif;
                                    
                                    if ( have_rows( 'links' ) ) :
                                        while ( have_rows( 'links' ) ) : the_row();
                                            //Link
                                            $link = get_sub_field( 'link' ); 
                                            if( isset( $link ) && !empty( $link ) ):
                                                
                                                $target = ( isset( $link['target'] ) && !empty( $link['target'] ) )? 'target="'. $link['target'] .'"' : '';
                                                $url = ( isset( $link['url'] ) && !empty( $link['url'] ) )? 'href="'. $link['url'] .'"' : '';
                                                $title = ( isset( $link['title'] ) && !empty( $link['title'] ) )? $link['title'] : '';
                                                
                                                 printf( 
                                                 '<a %s %s class="link mb-3 mr-5"><span%s</span
                                                    <svg version="1.1" width="15px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 13.9 12.1" style="enable-background:new 0 0 13.9 12.1;" xml:space="preserve">                
                                                        <g transform="translate(0 0.354)">
                                                            <line id="Line_10" stroke="currentcolor" x1="0" y1="5.7" x2="13.2" y2="5.7"></line>
                                                            <path id="Union_1" stroke="currentcolor" d="M13.2,5.7L7.5,0L13.2,5.7l-5.7,5.7L13.2,5.7z"></path>
                                                        </g>
                                                    </svg>
                                                 </a>', $url, $target, $title  );
                                                
                                            endif;
                                        endwhile;
                                    endif;
                                ?>
    						</div>
    					</div>					
                    </div>
                </div>
    		</div>
    	</section>
        
        <?php
    elseif( 'v1' == get_field( 'style' ) ):
    
        //Class
        $class = 
        array(
            'v1' => 'padding-top',
            'v2' => 'padding-bottom',
            'v3' => 'no-padding'
        );
        
        //Padding
        $padding = get_field( 'padding' );
        ?>
        <section class="<?php echo $class[$padding]; ?> team-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <?php 
                            //Heading
                            if( $heading = get_field( 'heading' ) ):
                                $headerTag = (get_field('header_tag')) ? get_field('header_tag') : 'h3';
                                printf( '<%s class="heading mb-4">%s</%s>', $headerTag, $heading, $headerTag );
                            endif;
                        ?>
                    </div>
                    <div class="col-md-8">
                        <?php the_field( 'description' ); ?>
                        
                        <?php if ( have_rows( 'team' ) ) : ?>
                            <div class="team">
                                <div class="row">
                                    
                                    <?php while ( have_rows( 'team' ) ) : the_row(); ?>
                                        <div class="col-6 col-sm-4 col-lg-3">
                                            <div class="item">
                                                <?php
                                                    //Image 
                                                    $image = get_sub_field( 'image' ); 
                                                    if ( $image ) :
                                                        echo '<img src="'. esc_url( $image['url'] ) .'" class="img-fluid" alt="'. esc_attr( $image['alt'] ) .'" />';
                                                    endif;
                                                    
                                                    //Name
                                                    if( $name = get_sub_field( 'name' ) ):
                                                        echo '<cite class="my-2 d-inline-block">'. $name .'</cite>';
                                                    endif;
                                                    
                                                    //Social Icons
                                                    if ( have_rows( 'social_icons' ) ) : 
                                                        echo '<div class="social">';
                                                            while ( have_rows( 'social_icons' ) ) : the_row();
                                                                
                                                                if( 'fa-envelope' == get_sub_field( 'social_icon' ) ):
                                                                    echo '<a href="'. get_sub_field( 'social_link' ) .'"><i class="fa '. get_sub_field( 'social_icon' ) .'"></i></a>';
                                                                else:
                                                                    echo '<a href="'. get_sub_field( 'social_link' ) .'"><i class="fab '. get_sub_field( 'social_icon' ) .'"></i></a>';
                                                                endif;
                                                                
                                                            endwhile;
                                                        echo '</div>';
                                                    endif;
                                                    
                                                    //Content
                                                    the_sub_field( 'content' );
                                                ?>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                    
                                </div>
                            </div>
                        <?php endif; ?>
                        
                    </div>
                </div>
            </div>
        </section>
        <?php
    else:
        ?>
        <section class="text team-wrap p-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-lg-3">
                        <?php 
                            //Heading
                            if( $heading = get_field( 'heading' ) ):
                                $headerTag = (get_field('header_tag')) ? get_field('header_tag') : 'h3';
                                printf( '<%s class="heading mb-4">%s</%s>', $headerTag, $heading, $headerTag );
                            endif;
                        ?>
                    </div>
                    <div class="col-md-8 col-lg-7 pr-lg-5">
                        
                        <?php if ( have_rows( 'team_alt' ) ) : ?>
                    		<?php while ( have_rows( 'team_alt' ) ) : the_row(); ?>
                                
                                <div class="team-item">
                                    
                                    <?php 
                                        $image = get_sub_field( 'image' ); 
                                        if ( $image ) :
                                            echo '<div><img width="90" class="img-fluid" src="'. esc_url( $image['url'] ) .'" alt="'. esc_attr( $image['alt'] ) .'" /></div>';
                                        endif;
                                    ?>
                        			
                                    <div>
                                        <?php 
                                            //Heading
                                            if( get_sub_field( 'heading' ) ):
                                                echo '<span>'. get_sub_field( 'heading' ) .'</span>';
                                            endif;
                                        ?>
                                        <div class="additional-links">
                                            <div>
                                                <form class="d-lg-flex align-items-center">
                                                    <select>
                                                        <option value="#!"><?php the_sub_field( 'link_heading' ); ?></option> 
                                                        <?php 
                                                            if ( have_rows( 'links' ) ) :
                                                                while ( have_rows( 'links' ) ) : the_row(); 
                                                                    $link = get_sub_field( 'link' );
                                                                    if( $link ):
                                                                        echo '<option value="'. $link['url'] .'">'. $link['title'] .'</option>';
                                                                    endif;
                                                                endwhile;
                                                            endif;
                                                        ?>                            
                                                    </select>
                                                    <a href="#" class="button">View</a>
                                                </form>
                                            </div>
                                        </div>                       
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <script>
                            (function ($) {
                            var id;
                                $('.additional-links select').on('change', function(){
                                    id = $(this).val();
                                    $(this).parent().find('.button').attr('href','');
                                    var new_href = $(this).parent().find('.button').attr('href') + id;
                                    $(this).parent().find('.button').attr('href', new_href);
                                });                            
                            })(jQuery);	
                        </script>                                       
                    </div>
                </div>
            </div> 
        </section>
        <?php
    endif;
endif;
require get_template_directory() . '/inc/block-end.php';
?>