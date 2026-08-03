<?php
$is_tax_page = false;
if ( is_tax() ) {
  $is_tax_page   = true;
  $queried_object = get_queried_object();
  $term_id        = $queried_object->term_id;
}
?>
<section>
  <div class="select-region-main">
    <div class="container">
      <div class="select-region-inner">
        <?php if ( $is_tax_page ) : ?>
          <div class="page-title mb-80">
            <h1><?php echo esc_html( $queried_object->name ); ?></h1>
            <span class="underline"></span>
          </div>
        <?php endif; ?>

        <?php if ( have_posts() ) : ?>
          <?php while ( have_posts() ) : the_post(); ?>
            <div class="region">
              <div class="row no-gutters">
                <div class="col-lg-6">
                  <div class="region__image">
                    <img src="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>" alt="">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="region__content">
                    <div class="region__content-head">
                      <div class="r-title">
                        <h3><?php the_title(); ?></h3>
                        <span>#<?php the_field('post_number'); ?></span>
                      </div>
                      <ul>
                        <li>
                          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/location-icon.png" alt="">
                          <a href="<?php the_field('location_link'); ?>"><?php the_field('location'); ?></a>
                        </li>
                        <li>
                          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/resize-icon.png" alt="">
                          <a><?php the_field('sqft'); ?></a>
                        </li>
                        <li>
                          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/home-icon.png" alt="">
                          <a><?php the_field('land_mark'); ?></a>
                        </li>
						  <?php echo get_contact_info_html(); ?>
                      </ul>
                    </div>
                    <div class="region__content-des">
                      <?php the_content(); ?>
                    </div>

                    <?php $brochure_file = get_field('brochure_file'); ?>
                    <div class="region__content-btn" <?php if ( ! $brochure_file ) echo 'style="visibility:hidden;"'; ?>>
                      <a target="_blank" href="<?php echo esc_url( $brochure_file ); ?>">
                        <?php the_field('button_text'); ?>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endwhile; ?>

          <?php
          the_posts_pagination( array(
            'prev_text'          => __( '<', 'mandevco' ),
            'next_text'          => __( '>', 'mandevco' ),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'mandevco' ) . ' </span>',
          ) );
          ?>

        <?php else : ?>
          <p class="no-properties" style="color: black">
            <?php
// Check if WPML's language constant is defined and equal to 'fr'
if ( defined('ICL_LANGUAGE_CODE') && ICL_LANGUAGE_CODE === 'fr' ) {
    echo 'Aucune propriété n’est listée pour le moment. Communiquez avec nous pour connaître les prochaines disponibilités.';
} else {
    echo 'No listings are available right now. Get in touch to learn about upcoming opportunities.';
}

?>
          </p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
