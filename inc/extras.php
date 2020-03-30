<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package wpbstarter
 */



/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function wpbstarter_pingback_header() {
	echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
}
add_action( 'wp_head', 'wpbstarter_pingback_header' );
