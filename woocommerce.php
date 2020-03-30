<?php
/**
 * The template for displaying Woocommerce Product
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpbstarter
 */

get_header(); ?>

    <div id="primary" class="content-area wpbstarter-content-area-padding">
		<main id="main" class="site-main">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<?php woocommerce_content(); ?>
					</div>

					<?php get_sidebar(); ?>
					
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

