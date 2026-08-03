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
					<img src="<?php the_field('header_logo', 'option');?>" alt="">
				</a>
			</div><!-- .site-branding -->
	
			<div class="menu-icon">
				<i class="far fa-bars"></i>
			</div>
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
				<?php echo do_shortcode('[wpml_language_selector_widget]'); ?>
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
