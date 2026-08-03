<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mandevco
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="single-blog">
			<div class="container_d">
				<div class="single-blog-inner">
					<h1><?php the_title();?></h1>
					<span class="date date-center"><?php the_date();?></span>
					<div class="row justify-content-center">
						<div class="col-lg-10">
							<div class="blog-image">
								<?php the_post_thumbnail();?>
							</div>
						</div>
					</div>
					<?php
						the_content( sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'mandevco' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							get_the_title()
						) );

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mandevco' ),
							'after'  => '</div>',
						) );
						?>
					<span class="date date-left"><?php echo get_the_date();?></span>
					<footer class="entry-footer">
						<?php mandevco_entry_footer(); ?>
					</footer><!-- .entry-footer -->
				</div>
			</div>
		</div>


	
</article><!-- #post-<?php the_ID(); ?> -->
