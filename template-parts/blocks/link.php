<?php
$blockRootClasses = 'alignfull links-block';
require get_template_directory() . '/inc/block-start.php';
if(!$block_disabled && empty( $block['data']['block_preview_img'])):
    
    if( 'v6' == get_field( 'style' ) ):
        
        if ( have_rows( 'links' ) ) :
        
            echo '<ul class="sidebar-menu">';
            
                while ( have_rows( 'links' ) ) : the_row();
                    
                    $link = get_sub_field( 'link' );
                    if ( $link ):
                        ?><li><a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a></li><?php
                    endif;
                    
                endwhile;
            
            echo '</ul>'; 
            
        endif;
    
    elseif( 'v5' == get_field( 'style' ) ):
     
        //Heading
        $padding = '';
        if( $heading = get_field( 'heading' ) ):
            $headerTag = (get_field('header_tag')) ? get_field('header_tag') : 'h3';
            printf( '<%s class="mt-5 mb-3">%s</%s>', $headerTag, $heading, $headerTag );
            $padding = ' mt-0';
        endif;
    ?>
    <div class="how-we-can-help alt px-4 p-0<?php echo $padding; ?>">
        <div class="row">
            <div class="col-md-12">
                <div class="additional-links">
                    <?php if ( have_rows( 'links_content_alt' ) ) : ?>
                		<?php while ( have_rows( 'links_content_alt' ) ) : the_row(); ?>
                            
                            <div>
                                <form class="d-lg-flex align-items-center justify-content-between">
                                
                                    <?php if ( get_sub_field( 'heading' ) ) : ?>
                                        <div class="d-flex align-items-center"><i class="fas fa-file-pdf mr-4"></i> <?php the_sub_field( 'heading' ); ?>n</div>
                                    <?php endif; ?>
                                    
                                    <?php $link = get_sub_field( 'link' ); ?>
                        			<?php if ( $link ) : ?>
                        				<a href="<?php echo esc_url( $link['url'] ); ?>" class="button" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
                        			<?php endif; ?>
                                    
                                </form>
                            </div>
                			
                		<?php endwhile; ?>
                	<?php endif; ?>                                    
                </div>
            </div>
        </div>
    </div>
    
    <?php elseif( 'v7' == get_field( 'style' ) ): ?>
    <section class="container">
        <div class="position-papers">    
    <?php 
     
        //Heading
        $padding = '';
        if( $heading = get_field( 'heading' ) ):
            $headerTag = (get_field('header_tag')) ? get_field('header_tag') : 'h2';
            printf( '<%s class="heading">%s</%s>', $headerTag, $heading, $headerTag );
            $padding = ' mt-0';
        endif;
    ?>
    
            <?php if ( have_rows( 'links_custom' ) ) : ?>
            <div class="position-papers-inner">
		<?php while ( have_rows( 'links_custom' ) ) : the_row(); ?>
		    <div class="item">
		        <div>
			        <?php the_sub_field( 'content' ); ?>
			    </div>
                <div>
        			<?php if ( have_rows( 'custom_links' ) ) : ?>
        				<?php while ( have_rows( 'custom_links' ) ) : the_row(); ?>
        					<?php $link = get_sub_field( 'link' ); ?>
        					<?php if ( $link ) : ?>
        						<a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><i class="fas fa-file-pdf"></i> <?php echo esc_html( $link['title'] ); ?><svg class="black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12.382 17.5"><g transform="translate(-1512.118 -1215.5)"><g class="arrow"><path d="M-3724.5-6554.5l5.749,5.749,5.749-5.749" transform="translate(5236.972 7778.474)" fill="none" stroke-width="1"></path><line y2="14" transform="translate(1518.221 1215.5)" fill="none" stroke-width="1"></line></g><line x2="12" transform="translate(1512.5 1232.5)" fill="none" stroke-width="1"></line></g></svg></a>
        					<?php endif; ?>
        				<?php endwhile; ?>
        			<?php endif; ?>
                </div>
			</div>
		<?php endwhile; ?>
            <?php endif; ?>  
        </div>
    </section>    
    
    <br>
    <br>

    <?php
    elseif( 'v4' == get_field( 'style' ) ):
        $bg_color = ( 'v2' == get_field( 'bg_color' ) )? ' bg-red' : '';
    ?>
    <div class="how-we-can-help alt px-4 p-0<?php echo $bg_color; ?>">
        <div class="row">
            <div class="col-md-12">
                <?php if ( have_rows( 'additional_links_alt' ) ) : ?>
                    <div class="additional-links">
                		<?php while ( have_rows( 'additional_links_alt' ) ) : the_row(); ?>
                            <div>
                                <form class="d-lg-flex align-items-center"> 
                                    <?php 
                                        //Heading
                                        if( $heading = get_sub_field( 'heading' ) ):
                                            echo '<div>'. $heading .'</div>';
                                        endif;
                                        
                                        //Description
                                        if( $description = get_sub_field( 'description' ) ):
                                            echo '<div>'. $description .'</div>';
                                        endif;
                                        
                                        $link_heading = get_sub_field( 'link_heading' );
                                        
                                        if ( have_rows( 'links' ) ) :
                                        ?>                       		
                                        <select>
                                            <option value="#!"><?php echo $link_heading; ?></option>                        		
                            				<?php while ( have_rows( 'links' ) ) : the_row(); ?>
                            					<option value="<?php the_sub_field( 'link' ); ?>"><?php the_sub_field( 'title' ); ?></option>
                            				<?php endwhile; ?>
                                		</select>
                                        <a href="#" class="button">view</a>
                                    <?php endif; ?>
                                </form>
                            </div>
                		<?php endwhile; ?>
                    </div> 
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
            	<?php endif; ?>
            </div>
        </div>
    </div>
    <?php
    elseif( 'v3' == get_field( 'style' ) ):
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
                <div class="col-md-8 col-lg-9">
                    <?php if ( have_rows( 'links_content' ) ) : ?>
        				<table>
        					<tbody>
                                <?php while ( have_rows( 'links_content' ) ) : the_row(); ?>
            						<tr>
                                        <?php 
                                            //Date
                                            if( get_sub_field( 'date' ) ):
                                                echo '<td>'. get_sub_field( 'date' ) .'</td>';
                                            endif;
                                            
                                            //Heading
                                            if( get_sub_field( 'heading' ) ):
                                                echo '<td>'. get_sub_field( 'heading' ) .'</td>';
                                            endif;
                                            
                                            //Link
                                            $link = get_sub_field( 'link' ); 
                                            if( isset( $link ) && !empty( $link ) ):
                                                
                                                $target = ( isset( $link['target'] ) && !empty( $link['target'] ) )? 'target="'. $link['target'] .'"' : '';
                                                $url = ( isset( $link['url'] ) && !empty( $link['url'] ) )? 'href="'. $link['url'] .'"' : '';
                                                $title = ( isset( $link['title'] ) && !empty( $link['title'] ) )? $link['title'] : '';
                                                
                                                 printf( 
                                                 '<td>
                                                    <a %s %s class="link dark">%s  
                                                        <svg width="15px" class="ml-1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 13.9 12.1" style="enable-background:new 0 0 13.9 12.1;" xml:space="preserve"><g transform="translate(0 0.354)"><line id="Line_10" stroke="currentColor" x1="0" y1="5.7" x2="13.2" y2="5.7"></line><path id="Union_1" stroke="currentColor" d="M13.2,5.7L7.5,0L13.2,5.7l-5.7,5.7L13.2,5.7z"></path></g></svg>
                                                    </a>
                                                 </td>', $url, $target, $title  );
                                                
                                            endif;
                                        ?>
            						</tr>
                                <?php endwhile; ?>				
        					</tbody>
        				</table>
                    <?php endif; ?>
                </div>
            </div>
    	</div>
    </section>
    <?php
    else:
        //Icon Position
        $pdf_icon_position = get_field( 'pdf_icon_position' );
    ?>
    <section class="container">
        <div class="how-we-can-help p-5 py-md-0 px-md-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="py-md-5">
                        <?php 
                            //Heading
                            if( $heading = get_field( 'heading' ) ):
                                $headerTag = (get_field('header_tag')) ? get_field('header_tag') : 'h3';
                                printf( '<%s class="h2 heading mb-4">%s</%s>', $headerTag, $heading, $headerTag );
                            endif;
                            
                            //Description
                            if( $description = get_field( 'description' ) ):
                                echo ''. $description .'';
                            endif;
                        ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <?php if ( have_rows( 'links' ) ) : ?>
                        <ul>
                    		<?php while ( have_rows( 'links' ) ) : the_row(); ?>
                    			<?php $link = get_sub_field( 'link' ); ?>
                    			<?php if ( $link && $pdf_icon_position == 'v2' ) : ?>
                    				<li><a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?> <i class="fas fa-file-pdf ml-auto" aria-hidden="true"></i><svg class="black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12.382 17.5"><g transform="translate(-1512.118 -1215.5)"><g class="arrow"><path d="M-3724.5-6554.5l5.749,5.749,5.749-5.749" transform="translate(5236.972 7778.474)" fill="none" stroke-width="1"></path><line y2="14" transform="translate(1518.221 1215.5)" fill="none" stroke-width="1"></line></g><line x2="12" transform="translate(1512.5 1232.5)" fill="none" stroke-width="1"></line></g></svg></a></li>
                    			<?php elseif( $link && $pdf_icon_position == 'v1' ): ?> 
                                    <li><a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><i class="fas fa-file-pdf" aria-hidden="true"></i> <?php echo esc_html( $link['title'] ); ?> <svg class="black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12.382 17.5"><g transform="translate(-1512.118 -1215.5)"><g class="arrow"><path d="M-3724.5-6554.5l5.749,5.749,5.749-5.749" transform="translate(5236.972 7778.474)" fill="none" stroke-width="1"></path><line y2="14" transform="translate(1518.221 1215.5)" fill="none" stroke-width="1"></line></g><line x2="12" transform="translate(1512.5 1232.5)" fill="none" stroke-width="1"></line></g></svg></a></li>
                                <?php endif; ?>
                    		<?php endwhile; ?>
                        </ul>
                	<?php endif; ?>
                	
                    <?php if( 'v2' == get_field( 'style' ) ): ?>
                    
                    	<?php if ( have_rows( 'additional_links' ) ) : ?>
                            <div class="additional-links">
                    		<?php while ( have_rows( 'additional_links' ) ) : the_row(); ?>
                                <div>
                                    <form class="d-lg-flex align-items-center">                        		
                                        <select>
                                            <option value="#!"><?php the_sub_field( 'heading' ); ?></option>                        		
                                			<?php if ( have_rows( 'links' ) ) : ?>
                                				<?php while ( have_rows( 'links' ) ) : the_row(); ?>
                                					<option value="<?php the_sub_field( 'link' ); ?>"><?php the_sub_field( 'title' ); ?></option>
                                				<?php endwhile; ?>
                                			<?php endif; ?>
                                		</select>
                                        <a href="#" class="button">Download</a>
                                    </form>
                                </div>
                    		<?php endwhile; ?>
                            </div>  
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
                                              
                    <?php endif; ?>  
                </div>
            </div>
        </div>
    </section>
    <?php
    endif;
    
endif;
require get_template_directory() . '/inc/block-end.php';