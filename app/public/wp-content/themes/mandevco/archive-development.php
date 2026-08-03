<?php
/**
 * Template Name: Developments
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

$post_type_data = get_post_type_details( 'development' );

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

            <section>
                <div class="page-header header-title-light header-bg-blue" style="background-image:url(<?php echo $post_type_data['background_image'];?>);">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-11">
                                <div class="page-header__content">
                                    <h1><?php echo $post_type_data['title'] ?></h1>
                                    <p><?php echo $post_type_data['description']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="select-region-main select-region-top">
                    <div class="container">
                        <div class="select-region-inner">
  
                           <?php
                        //    $loop = new WP_Query( array( 'post_type' => 'development', 'posts_per_page' => 10 ) ); 
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
                                                        </ul>
                                                    </div>
                                                    <div class="region__content-des">
                                                        <?php 
                                                        the_content();
                                                        ?>
                                                    </div>
                                                    <div class="region__content-key">
                                                        <div class="region__content-keyinner">
                                                            <h5>KEY DEMOGRAPHICS</h5>
                                                            <ul>
                                                                <?php
                                                                if( have_rows('key_demographics') ){	
                                                                    while  (have_rows('key_demographics')) {
                                                                        the_row();
                                                                    ?>
                                                                    <li><?php the_sub_field('title'); ?>:  
                                                                        <span><?php the_sub_field('value'); ?></span>
                                                                    </li>
                                                                    <?php
                                                                      }
                                                                    }        
//                                                              ?>
                                                                <!-- <li>Total population within 5km radius:  
                                                                    <span>281,732</span>
                                                                </li>
                                                                <li>Average household income:   
                                                                    <span>$64,368</span>
                                                                </li>
                                                                <li>Trafﬁc count (by volume): 
                                                                    <span>19,000 CARS</span>
                                                                </li> -->
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                // endwhile;
                                // else :
                                ?>
                                    <?php
                            
                                }
                                the_posts_pagination( array(
                                    'prev_text'          => __( '<', 'twentyfifteen' ),
                                    'next_text'          => __( '>', 'twentyfifteen' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'mandevco' ) . ' </span>',
                                ) );
                            }?>

                   
                           
                         
                        </div>
                    </div>
                </div>
            </section>
     
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
