<?php
/**
 * Template Name: Office    
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

            <section id="AB">
                <div class="select-region-main">
                    <div class="container">
                        <div class="select-region-inner">
                            <div class="page-title">
                                <h1>Select a Region</h1>
                                <span class="underline"></span>
                            </div>
                            <?php
                            if ( have_posts() ) {
                                while( have_posts() ) {
                                    the_post();
                                    ?>
                                    <div class="region">
                                        <div class="row no-gutters">
                                            <div class="col-lg-6">
                                                <div class="region__image">
                                                    <img src="<?php echo get_the_post_thumbnail_url();  ?>" alt="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="region__content">
                                                    <div class="region__content-head">
                                                        <div class="r-title">
                                                            <h3><?php the_title(); ?></h3>
                                                            <span>#<?php the_field('post_number');?></span>
                                                        </div>
                                                        <ul>
                                                        
                                                            <li>
                                                                <img src="<?php echo get_template_directory_uri();?>/images/location-icon.png" alt="">
                                                                <a href="<?php the_field('location_link');?>"><?php the_field('location');?></a>
                                                            </li>
                                                            <li>
                                                                <img src="<?php echo get_template_directory_uri();?>/images/resize-icon.png" alt="">
                                                                <a href="<?php the_field('sqft_link');?>"><?php the_field('sqft');?> </a>
                                                            </li>
                                                            <li>
                                                                <img src="<?php echo get_template_directory_uri();?>/images/home-icon.png" alt="">
                                                                <a href="<?php the_field('land_mark_link');?>"><?php the_field('land_mark');?></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="region__content-des">
                                                        <?php 
                                                        the_content();
                                                        ?>
                                                    </div>
                                                    <div class="region__content-btn">
                                                        <a href="<?php the_field('button_link');?>">
                                                        <?php the_field('button_text');?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
