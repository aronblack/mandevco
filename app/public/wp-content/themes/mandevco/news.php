<?php
/**
 * Template Name: News
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
                <div class="news-wrap">
                    <div class="container">
                        <div class="news-inner">
                            <div class="page-title mb-80">
                                <h1><?php echo __( 'NEWS', 'mandevco' ); ?></h1>
                                <span class="underline"></span>
                            </div>
                            <div class="news-slider">
                            <?php 
                            // the query
                            $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish')); ?>
                            <?php if ( $wpb_all_query->have_posts() ) : ?>
                                <!-- the loop -->
                                <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
                                    <div class="our-blog">
                                        <div class="our-blog__inner">
                                            <span><?php echo get_the_date(); ?></span>
                                            <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                                            <div class="our-blog__image">
                                                <a href="<?php the_permalink() ?>">
                                                    <?php the_post_thumbnail(); ?>
                                                </a>
                                            </div>
                                            <?php the_excerpt(); ?>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                            <?php else : ?>
                                <p><?php _e( 'Sorry, no posts matched your criteria.', 'mandevco' ); ?></p>
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
