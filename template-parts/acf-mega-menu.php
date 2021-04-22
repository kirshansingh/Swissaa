<?php if ( have_rows( 'mega_menu' ) ) : ?>
    
    <div class="megamenu">
        <div class="container">
            <div class="row">
                
                <?php while ( have_rows( 'mega_menu' ) ) : the_row(); ?>
                    <?php $background_image = get_sub_field( 'background_image' ); ?>
            		<?php if ( have_rows( 'menu_list' ) ) : ?>
                        <div class="col-lg-2 col-md-6">
                             <ul style="background: url(<?php echo esc_url( $background_image['url'] ); ?>) no-repeat">
                    			<?php while ( have_rows( 'menu_list' ) ) : the_row(); ?>
                    				<?php $menu_link = get_sub_field( 'menu_link' ); ?>
                    				<?php if ( $menu_link ) : ?>
                    					<li><a href="<?php echo esc_url( $menu_link['url'] ); ?>" target="<?php echo esc_attr( $menu_link['target'] ); ?>"><?php echo $menu_link['title']; ?></a></li>
                    				<?php endif; ?>
                    			<?php endwhile; ?>
                             </ul>
                        </div>
                        
            		<?php endif; ?>
            	<?php endwhile; ?>
                                                                                                                  
            </div>
        </div>
    </div>
        
<?php endif; ?>