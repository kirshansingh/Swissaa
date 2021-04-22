<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package SWISSAA
 */

get_header(); ?>

	<div id="primary" class="l-wrap">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found text-center py-5 my-5">
    <div class="container py-5">
					<h1 class="title text-center mb-4"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'swissaa' ); ?></h1>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="button-red"><span><?php esc_html_e( 'Back to homepage', 'swissaa' ); ?></span><svg version="1.1" width="15px" class="ml-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 13.9 12.1" style="enable-background:new 0 0 13.9 12.1;" xml:space="preserve">
                        <g transform="translate(0 0.354)">
                            <line id="Line_10" stroke="currentColor" x1="0" y1="5.7" x2="13.2" y2="5.7"></line>
                            <path id="Union_1" stroke="currentColor" d="M13.2,5.7L7.5,0L13.2,5.7l-5.7,5.7L13.2,5.7z"></path>
                        </g>
                        </svg></a>                        
                        </div>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();