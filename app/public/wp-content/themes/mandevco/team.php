<?php
/**
 * Template Name: Team
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
while (have_posts()):
    the_post();
// echo get_the_ID();
// exit();
    ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <section>
                <style>
                    .mobile-screen .page-header {
                        background-image: url(<?php the_field('heade_mobile_image');?>) !important;
                    }
                </style>
                <div class="page-header header-title-light"
                     style="background-image:url(<?php the_field('header_image'); ?>);">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-11">
                                <div class="page-header__content">
                                    <h1><?php the_field('page_title'); ?></h1>
                                    <?php
                                    if (have_rows('page_description')) {
                                        while (have_rows('page_description')) {
                                            the_row(); ?>
                                            <p> <?php the_sub_field('page_content'); ?></p>
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

            <section>
                <div class="out-team-wrap">
                    <div class="container">
                        <div class="out-team-inner">
                            <div class="page-title mb-80">
                                <h1><?php the_field('main_title'); ?></h1>
                                <span class="underline"></span>
                            </div>
                        </div>

                        <?php
                        $current_language = apply_filters('wpml_current_language', null);

                        $args = array(
                            'post_type' => 'team',
                            'posts_per_page' => 30,
                            'category' => '',
                            'lang' => $current_language, // Add this line to specify the language
                            'orderby' => 'date', // Order by publish date
                            'order' => 'DESC', // 'DESC' for newest to oldest, 'ASC' for oldest to newest
                        );
                        $query = new WP_Query($args);

                        // Debug the query
                        if (empty($query->posts)) {
                            echo '<p style="color: red;">No posts found for the language: ' . esc_html($current_language) . '</p>';
                        }
                        // Initialize empty array for posts without content
                        $no_content_posts = [];
                        ?>

                        <?php while ($query->have_posts()) : $query->the_post(); ?>

                            <?php
                            // Check the 'publish_to_team_page' field value using ACF
                            $publish_to_team_page = get_field('publish_to_team_page');
                            if (!$publish_to_team_page) {
                                continue; // Skip this post if 'publish_to_team_page' is false
                            }

                            // If no content, store post ID in the array
                            if (!get_the_content()) {
                                $no_content_posts[] = get_the_ID();
                                continue;
                            }
                            ?>

                            <!-- Normal Post with Content -->
                            <div class="row justify-content-center">
                                <div class="col-xl-11">
                                    <div class="out-team">
                                        <div class="out-team__inner">
                                            <h2><?php the_title(); ?></h2>
                                            <div class="row no-gutters">
                                                <div class="col-lg-4">
                                                    <div class="out-team__image">
                                                        <?php echo get_the_post_thumbnail(); ?>
                                                    </div>
                                                    <div class="out-team__contact">
                                                        <?php if (get_field('contact_no')): ?>
                                                            <div class="contact-no contact-info">
                                                                <div class="contact-icon">
                                                                    <svg width="20px" height="20px" version="1.1"
                                                                         id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                                         y="0px"
                                                                         viewBox="0 0 384 384"
                                                                         style="enable-background:new 0 0 384 384;"
                                                                         xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M353.188,252.052c-23.51,0-46.594-3.677-68.469-10.906c-10.719-3.656-23.896-0.302-30.438,6.417l-43.177,32.594
                                                        c-50.073-26.729-80.917-57.563-107.281-107.26l31.635-42.052c8.219-8.208,11.167-20.198,7.635-31.448
                                                        c-7.26-21.99-10.948-45.063-10.948-68.583C132.146,13.823,118.323,0,101.333,0H30.813C13.823,0,0,13.823,0,30.813
                                                        C0,225.563,158.438,384,353.188,384c16.99,0,30.813-13.823,30.813-30.813v-70.323C384,265.875,370.177,252.052,353.188,252.052z"
                                                    />
                                                </g>
                                            </g>
                                        </svg>
                                                                </div>
                                                                <a href="tel:<?php the_field('contact_no'); ?>"><?php the_field('contact_no'); ?></a>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php if (get_field('email_address')): ?>
                                                            <div class="contact-email contact-info">
                                                                <div class="contact-icon">
                                                                    <svg width="20px" height="20px" version="1.1"
                                                                         id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                                         y="0px"
                                                                         viewBox="0 0 512 512"
                                                                         style="enable-background:new 0 0 512 512;"
                                                                         xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M467,61H45C20.218,61,0,81.196,0,106v300c0,24.72,20.128,45,45,45h422c24.72,0,45-20.128,45-45V106
                                                        C512,81.28,491.872,61,467,61z M460.786,91L256.954,294.833L51.359,91H460.786z M30,399.788V112.069l144.479,143.24L30,399.788z
                                                        M51.213,421l144.57-144.57l50.657,50.222c5.864,5.814,15.327,5.795,21.167-0.046L317,277.213L460.787,421H51.213z M482,399.787
                                                        L338.213,256L482,112.212V399.787z"/>
                                                </g>
                                            </g>
                                        </svg>
                                                                </div>
                                                                <a href="mailto:<?php the_field('email_address'); ?>">
    <?php echo (defined('ICL_LANGUAGE_CODE') && ICL_LANGUAGE_CODE === 'en') ? 'Email me' : 'Courriel'; ?>
</a>

                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="out-team__content">
                                                        <p><?php echo get_the_content(); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>

                        <!-- Display Posts Without Content in a 3-Column Grid -->
                        <?php if (!empty($no_content_posts)): ?>
                            <div class="row p-5 no-content">
                            <?php foreach ($no_content_posts as $index => $post_id): ?>
                                <?php
                                $post = get_post($post_id);
                                setup_postdata($post);
                                ?>
                                <div class="col-md-4 p-5">
                                    <div class="out-team__no-content">
                                        <div class="out-team__image">
                                            <?php echo get_the_post_thumbnail($post_id); ?>
                                        </div>
                                        <h3><?php echo get_the_title($post_id); ?></h3>
                                        <div class="out-team__contact">
                                            <?php if (get_field('contact_no', $post_id)): ?>
                                                <div class="contact-no contact-info">
                                                    <div class="contact-icon">
                                                        <svg width="20px" height="20px" version="1.1"
                                                             id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                             y="0px"
                                                             viewBox="0 0 384 384"
                                                             style="enable-background:new 0 0 384 384;"
                                                             xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M353.188,252.052c-23.51,0-46.594-3.677-68.469-10.906c-10.719-3.656-23.896-0.302-30.438,6.417l-43.177,32.594
                                                        c-50.073-26.729-80.917-57.563-107.281-107.26l31.635-42.052c8.219-8.208,11.167-20.198,7.635-31.448
                                                        c-7.26-21.99-10.948-45.063-10.948-68.583C132.146,13.823,118.323,0,101.333,0H30.813C13.823,0,0,13.823,0,30.813
                                                        C0,225.563,158.438,384,353.188,384c16.99,0,30.813-13.823,30.813-30.813v-70.323C384,265.875,370.177,252.052,353.188,252.052z"
                                                    />
                                                </g>
                                            </g>
                                        </svg>
                                                    </div>
                                                    <a href="tel:<?php the_field('contact_no', $post_id); ?>"><?php the_field('contact_no', $post_id); ?></a>
                                                </div>
                                            <?php endif; ?>

                                            <?php if (get_field('email_address', $post_id)): ?>
                                                <div class="contact-email contact-info">
                                                    <div class="contact-icon">
                                                        <svg width="20px" height="20px" version="1.1"
                                                             id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                             y="0px"
                                                             viewBox="0 0 512 512"
                                                             style="enable-background:new 0 0 512 512;"
                                                             xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M467,61H45C20.218,61,0,81.196,0,106v300c0,24.72,20.128,45,45,45h422c24.72,0,45-20.128,45-45V106
                                                        C512,81.28,491.872,61,467,61z M460.786,91L256.954,294.833L51.359,91H460.786z M30,399.788V112.069l144.479,143.24L30,399.788z
                                                        M51.213,421l144.57-144.57l50.657,50.222c5.864,5.814,15.327,5.795,21.167-0.046L317,277.213L460.787,421H51.213z M482,399.787
                                                        L338.213,256L482,112.212V399.787z"/>
                                                </g>
                                            </g>
                                        </svg>
                                                    </div>
                                                   <a href="mailto:<?php the_field('email_address'); ?>">
    <?php echo ( get_locale() === 'en_US' ) ? 'Email me' : 'Courriel'; ?>
</a>

                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

<!--                                --><?php
//                                // Start a new row after every 3 posts
//                                if (($index + 1) % 3 === 0): ?>
<!--                                    </div><div class="row">-->
<!--                                --><?php //endif; ?>
                            <?php endforeach; ?>
                            <?php wp_reset_postdata(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>

            <section>
                <div class="management-wrap">
                    <div class="container">
                        <div class="management-inner">
                            <div class="row">
                                <div class="col-lg-11">
                                    <div class="management-content">
                                        <h1><?php the_field('service_title'); ?></h1>
                                        <p><?php the_field('service_description'); ?></p>
                                        <p><?php the_field('service_provide__title'); ?></p>
                                        <ul>
                                            <?php
                                            if (have_rows('service_provide')) {
                                                while (have_rows('service_provide')) {
                                                    the_row(); ?>
                                                    <li><?php the_sub_field('service'); ?></li>
                                                    <?php
                                                }
                                            }
                                            ?>

                                        </ul>
                                        <p><?php the_field('service_end_description'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="services-box-main">
                            <div class="row">
                                <?php
                                if (have_rows('service_images')) {
                                    while (have_rows('service_images')) {
                                        the_row(); ?>
                                        <div class="col-sm-4">
                                            <div class="services-box">
                                                <img src="<?php the_sub_field('images'); ?>" alt="">
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
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