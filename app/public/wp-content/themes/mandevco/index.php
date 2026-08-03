<?php
/**
 * Template Name: Home page
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
					.mobile-screen .home-banner{
						background-image:url(<?php the_field('banner_mobile_image');?>) !important;
					}
				</style>
				<div class="home-banner" style="background-image:url(<?php the_field('banner_image');?>);">
					<div class="container">
						<div class="home-banner__inner">
							<div class="row">
								<div class="col-md-12">
									<div class="home-banner__content">
										<h1><?php the_field('banner_title');?></h1>
										<div class="button-group">
											<a href="<?php the_field('button_1_link');?>"><?php the_field('button_1_text');?></a>
											<a href="<?php the_field('button_2_link');?>"><?php the_field('button_2_text');?></a>
											<a href="<?php the_field('button_3_link');?>" target="_blank"><?php the_field('button_3_text');?></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="contact-number">
						<div class="icon">
							<i class="fas fa-phone-alt"></i>
						</div>
						<div class="number">
							<a href="tel:<?php the_field('contact_number', 'option');?>"><?php the_field('contact_number', 'option');?></a>
						</div>
					</div>
				</div>
			</section>
			<section>
				<div class="card-box-main">
					<div class="container">
						<div class="card-box-inner">
							<div class="row">
								<?php
                                    if( have_rows('boxes') )
                                    {
                                        while ( have_rows('boxes') ){the_row(); ?>
                                           
										   <div class="col-md-4">
											   <div class="card-box">
												   <div class="card-box__image">
													   <img src="<?php the_sub_field('box_image');?>" alt="">
												   </div>
												   <h2><a href="<?php the_sub_field('box_link');?>"><?php the_sub_field('box_title');?></a></h2>
												   <p><?php the_sub_field('box_description');?> </p>
											   </div>
										   </div>
										<?php
									}}?>
							
							</div>
						</div>
					</div>
				</div>
			</section>
			<section>
				<div class="grid-box-main">
					<div class="container">
						<div class="grid-box-inner">


							<?php
                                    if( have_rows('zizeg_box') )
                                    {	$key = 0;
                                        while  (have_rows('zizeg_box')) {
											the_row(); ?>
                                           <!-- <div class="grid-box grid-box--left-content">
												<div class="row"> -->
													<?php if($key % 2 == 0){ ?>
															<div class="grid-box grid-box--left-content">
																<div class="row">
																	<div class="col-md-8">
																		<div class="grid-box__content">
																			<h2><?php the_sub_field('box_title');?></h2>
																			<p><?php the_sub_field('box_description');?></p>
																			<a class="blue-btn" href="<?php the_sub_field('box_button_link');?>"><?php the_sub_field('box_button');?></a>
																		</div>
																	</div>
																	<div class="col-md-4">
																		<div class="grid-box__image">
																			<img src="<?php the_sub_field('box_image');?>" alt="">
																		</div>
																	</div>
																</div>
															</div>
													<?php }else{ ?>
															<div class="grid-box grid-box--right-content">
																<div class="row">
																	<div class="col-md-4">
																		<div class="grid-box__image">
																			<img src="<?php the_sub_field('box_image');?>" alt="">
																		</div>
																	</div>
																	<div class="col-md-8">
																		<div class="grid-box__content">
																			<h2><?php the_sub_field('box_title');?></h2>
																			<p><?php the_sub_field('box_description');?></p>
																			<a class="blue-btn" href="<?php the_sub_field('box_button_link');?>"><?php the_sub_field('box_button');?></a>
																		</div>
																	</div>
																</div>
															</div>
													<?php } ?>
												<!-- </div>
											</div> -->
                                        <?php
                                       $key++; }
                                    }                                    
                                        ?>
						
						</div>
					</div>
				</div>
			</section>



			<section>
				<div class="our-blog-main">
					<div class="container">
						<div class="our-blog-inner">
							<div class="common-content desktop-hide">
                                <h1 class="center mb-4"><?php echo __( 'NEWS', 'mandevco' ) ?></h1>
                            </div>
							<div class="row">
								<div class="col-md-12">
									<div class="our-blog-back blog-slider">	
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
										<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
									<?php endif; ?>
									</div>
								</div>
                             </div>
                             <div class="row mt-5 d-flex justify-content-center">   
								<div class="col-md-3">
									<div class="blog-button-inner">
										<div class="blog-button">
											<a href="<?php echo get_home_url( null, '/news' ); ?>">
												<?php echo __( 'Visit our Blog', 'mandevco' ); ?>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

            <?php
// Fetch posts from the custom post type 'team'
$team_posts = new WP_Query([
    'post_type' => 'team',
    'posts_per_page' => -1, // Adjust the number to match your requirements
]);

if ($team_posts->have_posts()): ?>
            <section>
                <div class="our-team-main container">
                    <div class="our-team">
                        <div class="row no-gutters">
                            <div class="col-md-7">
                                <div class="our-team__image">
                                    <?php while ($team_posts->have_posts()): $team_posts->the_post(); ?>
                                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="<?php the_title(); ?>">
                                    <?php endwhile; ?>
                                    <?php endif; wp_reset_postdata(); ?>                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="our-team__content common-content">
                                    <h2 style="color: #134f8d;"><?php the_field('team_title');?></h2>
                                    <p><?php the_field('team_description');?></p>
                                    <a href="<?php the_field('team_button_url');?>" class="blue-btn">
                                        <?php the_field('team_button_text');?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



            <style>
                .our-team__image img {
                    width: 157px;
                    height: 157px;
                    filter: grayscale(100%);
                    margin: 0 0 5px 0; /* Removes margin from images */
                    padding: 0; /* Removes padding from images */
                    border: 0; /* Ensures no border is applied */
                    max-width: 100%; /* Ensures images scale properly */
                    height: auto;
                }
                @media (max-width: 768px) {
                    .our-team__image-grid .col-md-1 {
                        /*flex: 0 0 50%;*/
                        /*max-width: 50%;*/
                        /*width: auto;*/
                        /*height: auto;*/
                    }
                }

                @media (max-width: 576px) {
                    .our-team__image-grid .col-md-1 {
                        /*flex: 0 0 100%;*/
                        /*max-width: 100%;*/
                        /*width: auto;*/
                        /*height: auto;*/
                    }
                }
            </style>

        </main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();