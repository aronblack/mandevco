<?php
/**
 * Template Name: career
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
while( have_posts() ):
    the_post();
// echo get_the_ID();
// exit();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

            <section>
            <style>
                .mobile-screen .page-header{background-image:url(<?php the_field('heade_mobile_image');?>) !important;}
				.career_item{padding:30px 50px;box-shadow: 0px 5px 15px rgba(68,68,68,0.6); -webkit-box-shadow: 0px 5px 20px rgba(68,68,68,0.3); margin-bottom:60px;}
				.career_des{width:calc(100% - 300px); margin-right:100px;}
				.career_des h2{font-size:26px; color:#1c4888; margin-bottom:15px;}
				.career_des p{font-size:18px; color:#1c4888; line-height: 1.4;}
				.career_link{width:250px;}
				
				.page-template-tmp_career .page-header{height:auto;}
				
				@media only screen and (max-width: 767px) {
				  .career_item{padding:35px 15px; margin-bottom:30px; text-align:center;}
				  .career_des{width:100%; margin-right:0px;}
				  .career_link{width:auto; margin-left:auto; margin-right:auto;}
				  .page-template-tmp_career .page-header{ min-height:500px;}
				  .page-template-tmp_career .page-header{ min-height:500px;}
				}
				
			</style>
                <div class="page-header header-title-light" style="background-image:url(<?php the_field('header_image');?>);">
                    <div class="container">
                    	<div class="page-header__content">
                        	<div class="row justify-content-center">
                            
                                <div class="col-xl-2 col-lg-3 col-md-4"><h1><?php the_field('page_title');?></h1></div>
                                <div class="col-xl-1 col-lg-1"></div>
                                <div class="col-xl-6 col-lg-8 col-md-8">
                                    <?php
                                    if( have_rows('page_description') )
                                    {
                                        while ( have_rows('page_description') )
                                        {
                                            the_row(); ?>
                                            <p> <?php the_sub_field('page_content');?></p>
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

           <section class="mb-5">
               <div class="out-team-wrap">
                   <div class="container">
                       <div class="out-team-inner">
                            <div class="page-title mb-80">
                                <h1><?php the_field('main_title');?></h1>
                                <span class="underline"></span>
                            </div>
                       </div>
                       
                       <div class="row justify-content-center">
                            <div class="col-xl-12">
							<?php 
                                // Check rows exists.
                                if( have_rows('career_single') ):
                                
                                    // Loop through rows.
                                    while( have_rows('career_single') ) : the_row();
                                    ?>
                                    <div class="career_item d-md-flex align-items-center justify-content-between">
                                        <div class="career_des">
                                            <h2><?php the_sub_field('job_title'); ?></h2>
                                            <p><?php the_sub_field('job_description'); ?></p>
                                        </div>
                                        <div class="career_link blog-button"><a target="_blank" href="<?php the_sub_field('job_link'); ?>"><b><?php the_sub_field('button_text'); ?></b></a></div>
                                        <div class="clearfix"></div>
                                    </div>
                                   <?php
                                   
                                    // End loop.
                                    endwhile;
                                
                                // No value.
                                else :
                                    // Do something...
                                endif;
                                ?>
                            </div>
                        </div>

                   </div>
               </div>
           </section>

           
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();

endwhile;
get_footer();