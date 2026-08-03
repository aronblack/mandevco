<?php
/**
 * Template Name: Region
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mandevco
 */

$queried_object = get_queried_object();
$term_id = $queried_object->term_id;

if ( empty( $term_id ) ) {

    wp_safe_redirect( get_permalink( get_page_by_path( 'commercial' ) ));
}

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

            <?php
			get_archive_page_heading_section( 'industrial' );
            get_template_part( 'template-parts/property-list');
            ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
