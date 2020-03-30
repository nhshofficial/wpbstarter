<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package wpbstarter
 */

get_header();
?>

		<div class="wpbstarter-page-title-area nfound-title">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'wpbstarter' ); ?></h1>
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
		<main id="main" class="site-main">

			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'wpbstarter' ); ?></p>
					</div>
				</div>
				<div class="row widget-area">
					<div class="col-lg-4">
						<div class="widget">
							<?php
							get_search_form();
							?>
						</div>
						<?php
						the_widget( 'WP_Widget_Recent_Posts' );

						/* translators: %1$s: smiley */
						$wpbstarter_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'wpbstarter' ), convert_smilies( ':)' ) ) . '</p>';
						the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$wpbstarter_archive_content" );
						?>
					</div>
					<div class="col-lg-4">
						<div class="widget widget_categories">
							<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'wpbstarter' ); ?></h2>
							<ul>
								<?php
								wp_list_categories( array(
									'orderby'    => 'count',
									'order'      => 'DESC',
									'show_count' => 1,
									'title_li'   => '',
									'number'     => 10,
								) );
								?>
							</ul>
						</div><!-- .widget -->
					</div>
					<div class="col-lg-4">
						<?php
						the_widget( 'WP_Widget_Tag_Cloud' );
						?>
					</div>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
