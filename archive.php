<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wpbstarter
 */

get_header();
?>

	<div class="wpbstarter-page-title-area archive-title">
		<div class="container">
				<div class="row">
					<div class="col-lg-12">
							<?php
								the_archive_title( '<h1 class="page-title">', '</h1>' );
								the_archive_description( '<div class="archive-description">', '</div>' );
							?>
						<?php 
						if(function_exists('bcn_display')){
							bcn_display();
						} 
					?>
					</div>
				</div>
		</div>
	</div>

	<div id="primary" class="content-area wpbstarter-content-area-padding">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<div class="wpbstarter-blog-list">
							<?php if ( have_posts() ) : ?>

								<?php
								/* Start the Loop */
								while ( have_posts() ) :
									the_post();

									/*
									 * Include the Post-Type-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
									 */
									get_template_part( 'template-parts/content', get_post_type() );

								endwhile;

								the_posts_navigation();

							else :

								get_template_part( 'template-parts/content', 'none' );

							endif;
							?>
						</div>
					</div>
					
					
						<?php 
							get_sidebar();
						?>

				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();