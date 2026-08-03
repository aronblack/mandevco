<?php
/**
 * Template Name: Property
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
get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

            <section>
            <style>
                .mobile-screen .page-header{
                    background-image:url(<?php the_field('heade_mobile_image');?>) !important;
                }
			</style>
                <div class="page-header" style="background-image:url(<?php the_field('header_image');?>);">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="page-header__content">
                                    <h1><?php the_field('page_title');?></h1>
                                    <?php
                                    if( have_rows('page_description') )
                                    {
                                        while ( have_rows('page_description') )
                                        {
                                            the_row(); ?>
                                            <p><?php the_sub_field('page_content');?></p>
                                        <?php
                                        }
                                    }                                    
                                        ?>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <?php

            global $post;
            $post_slug = $post->post_name;

            $taxonomy = 'region';
            if ( $post_slug == 'quartier-cavendish' ) {
                $taxonomy = 'cavendish-region';
            } else if ( $post_slug == 'commercial' ) {
                $taxonomy = 'region';
            } else {
                $taxonomy = $post_slug . '-region';
            }

            get_property_terms( $taxonomy );
            ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();