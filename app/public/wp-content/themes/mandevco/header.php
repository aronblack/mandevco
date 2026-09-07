<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mandevco
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="icon" href="<?php the_field('favicon_icon', 'option');?>"/>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
<div id="page" class="site">

	<header id="masthead" class="site-header">
		<div class="header-inner">
			<div class="site-branding">
				<a href="<?php echo get_home_url();?>">
					<img src="<?php the_field('header_logo', 'option');?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
				</a>
			</div><!-- .site-branding -->
	
			<button class="menu-icon" type="button" aria-controls="site-navigation" aria-expanded="false">
				<span class="screen-reader-text"><?php esc_html_e( 'Toggle navigation', 'mandevco' ); ?></span>
				<i class="far fa-bars" aria-hidden="true"></i>
			</button>
			<div class="navigation">
				<nav id="site-navigation" class="main-navigation">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					) );
					?>
				</nav><!-- #site-navigation -->
			</div>
			<div class="lang-switch">
				<?php
				$languages = apply_filters(
					'wpml_active_languages',
					null,
					array(
						'orderby'      => 'code',
						'skip_missing' => 0,
					)
				);

				if ( is_array( $languages ) ) {
					foreach ( $languages as $language ) {
						if ( ! empty( $language['active'] ) ) {
							continue;
						}

						$language_label = 'fr' === $language['code'] ? 'Français' : 'English';
						?>
						<a class="lang-switch__link" href="<?php echo esc_url( $language['url'] ); ?>" hreflang="<?php echo esc_attr( $language['code'] ); ?>" lang="<?php echo esc_attr( $language['code'] ); ?>">
							<?php echo esc_html( $language_label ); ?>
						</a>
						<?php
					}
				}
				?>
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
