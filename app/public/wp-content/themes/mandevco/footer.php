<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mandevco
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="footer">
			<div class="container_d">
				<div class="row m-0">
					<div class="col-lg-3 border-right logo-col">
						<div class="footer-logo">
							<a href="<?php echo get_home_url();?>">
								<img src="<?php the_field('footer_logo', 'option');?>" alt="">
							</a>
						</div>
					</div>
					<div class="col-lg-2 border-right">
						<div class="footer-menu">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'footer-1',
							'menu_id'        => 'col-1',
						) );
						?>
						</div>
					</div>
					<div class="col-lg-2 border-right">
						<div class="footer-menu">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'footer-2',
							'menu_id'        => 'col-2',
						) );
						?>
						</div>
					</div>
					<div class="col-lg-2 border-right">
						<div class="footer-menu">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'footer-3',
							'menu_id'        => 'col-3',
						) );
						?>
						</div>
						<div class="footer-follow">
							<h4><?php the_field('social_follow_title', 'option');?></h4>
							<a href="<?php the_field('linkdin_url', 'option');?>" title="">
								<i class="fab fa-linkedin-in"></i>
							</a>
							<a href="<?php the_field('facebook_url', 'option');?>" title="">
								<i class="fab fa-facebook-f"></i>								
							</a>
							<a href="<?php the_field('instagram_url', 'option');?>" title="">
								<i class="fab fa-instagram"></i>								
							</a>
						</div>
					</div>
					<div class="col-lg-3 contact-col">
						<div class="footer-contact">
							<h4><?php the_field('contact_details_title', 'option');?></h4>
							<h2><?php the_field('contact_number', 'option');?></h2>
							<p><?php the_field('address', 'option');?></p>
							<a href="mailto:<?php the_field('email_address', 'option');?>"><?php the_field('email_address', 'option');?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
