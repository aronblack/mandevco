<?php
/**
 * mandevco functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mandevco
 */

if ( ! function_exists( 'mandevco_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mandevco_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on mandevco, use a find and replace
		 * to change 'mandevco' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'mandevco', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'mandevco' ),
			'footer-1' => esc_html__( 'col-1', 'mandevco' ),
			'footer-2' => esc_html__( 'col-2', 'mandevco' ),
			'footer-3' => esc_html__( 'col-3', 'mandevco' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'mandevco_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'mandevco_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mandevco_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'mandevco_content_width', 640 );
}
add_action( 'after_setup_theme', 'mandevco_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mandevco_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mandevco' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'mandevco' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'mandevco_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mandevco_scripts() {
	// include css file
	wp_enqueue_style( 'mandevco-style', get_stylesheet_uri() );
	wp_enqueue_style( 'bootstrap-min-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '20151215');
	wp_enqueue_style( 'fontawesome-css', get_template_directory_uri() . '/css/font-avesome-all.css', array(), '20151215');
	wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/css/slick.css', array(), '20151215');
	wp_enqueue_style( 'slick-theme-css', get_template_directory_uri() . '/css/slick-theme.css', array(), '20151215');
	wp_enqueue_style( 'style-css', get_template_directory_uri() . '/css/style.css', array(), filemtime( get_stylesheet_directory() . '/css/style.css' ), false );

	// include js file
	wp_enqueue_script( 'min-jQuery', get_template_directory_uri() . '/js/jquery-3.4.1.js', array(), '20151215', true );
	wp_enqueue_script( 'mandevco-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'mandevco-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'bootstrap-min-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20151215', true );
	wp_enqueue_script( 'slick-min-js', get_template_directory_uri() . '/js/slick.min.js', array(), '20151215', true );
	wp_enqueue_script( 'script-js', get_template_directory_uri() . '/js/script.js', array(), filemtime( get_stylesheet_directory() . '/js/script.js' ), true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mandevco_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Post Read more

function excerpt_more( $more )
{
    $post_type = get_post_type ( get_the_ID() );
       $more = sprintf( '<a class="read-more " href="%s">%s</a>',get_permalink( get_the_ID() ),__( 'Read more', 'textdomain' ) );
   return $more;
}
add_filter( 'excerpt_more', 'excerpt_more' );

// ACF Option page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}


function custom_post_type() {

 
	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Commercials', 'Post Type General Name', 'mandevco' ),
			'singular_name'       => _x( 'Commercial', 'Post Type Singular Name', 'mandevco' ),
			'menu_name'           => __( 'Commercials', 'mandevco' ),
			'parent_item_colon'   => __( 'Parent Commercial', 'mandevco' ),
			'all_items'           => __( 'All Commercials', 'mandevco' ),
			'view_item'           => __( 'View Commercial', 'mandevco' ),
			'add_new_item'        => __( 'Add New Commercial', 'mandevco' ),
			'add_new'             => __( 'Add New', 'mandevco' ),
			'edit_item'           => __( 'Edit Commercial', 'mandevco' ),
			'update_item'         => __( 'Update Commercial', 'mandevco' ),
			'search_items'        => __( 'Search Commercial', 'mandevco' ),
			'not_found'           => __( 'Not Found', 'mandevco' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'mandevco' ),
		);
		 
	// Set other options for Custom Post Type
		 
		$args = array(
			'label'               => __( 'commercial', 'mandevco' ),
			'description'         => __( 'Commercial news and reviews', 'mandevco' ),
			'labels'              => $labels,
			// Features this CPT supports in Post Editor
			'supports'            => array( 'title', 'editor',  'thumbnail', 'revisions', 'custom-fields', ),
			// You can associate this CPT with a taxonomy or custom taxonomy. 
			'taxonomies'          => array(  'region' ),
			/* A hierarchical CPT is like Pages and can have
			* Parent and child items. A non-hierarchical CPT
			* is like Posts.
			*/ 
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
		 
		// Registering your Custom Post Type
		register_post_type( 'commercial', $args );
	 
	
		register_taxonomy(  
			'region',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
			'commercial',        //post type name
			array(  
				'hierarchical' => true,  
				'label' => 'Region',  //Display name
				'query_var' => true,
				'rewrite' => array(
					'slug' => 'region', // This controls the base slug that will display before each term
					'with_front' => false // Don't display the category base before 
				)
			)  
		);  
	}
	 
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not 
	* unnecessarily executed. 
	*/
	 
	add_action( 'init', 'custom_post_type', 0 );


	function cw_post_type_news() {
		$supports = array(
		'title', // post title
		'editor', // post content
		// 'author', // post author
		'thumbnail', // featured images
		// 'excerpt', // post excerpt
		'custom-fields', // custom fields
		// 'comments', // post comments
		'revisions', // post revisions
		'post-formats', // post formats
		);
		$labels = array(
		'name' => _x('Team', 'plural'),
		'singular_name' => _x('Team', 'singular'),
		'menu_name' => _x('Team', 'admin menu'),
		'name_admin_bar' => _x('Team', 'admin bar'),
		'add_new' => _x('Add New', 'add new'),
		'add_new_item' => __('Add New news'),
		'new_item' => __('New news'),
		'edit_item' => __('Edit news'),
		'view_item' => __('View news'),
		'all_items' => __('Team'),
		'search_items' => __('Search news'),
		'not_found' => __('No news found.'),
		);
		$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'public' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'team'),
		'has_archive' => false,
		'hierarchical' => false,
		);
		register_post_type('team', $args);
		}
		add_action('init', 'cw_post_type_news');

		
function custom_post_type_office() {

 
	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Offices', 'Post Type General Name', 'mandevco' ),
			'singular_name'       => _x( 'Office', 'Post Type Singular Name', 'mandevco' ),
			'menu_name'           => __( 'Offices', 'mandevco' ),
			'parent_item_colon'   => __( 'Parent Office', 'mandevco' ),
			'all_items'           => __( 'All Offices', 'mandevco' ),
			'view_item'           => __( 'View Office', 'mandevco' ),
			'add_new_item'        => __( 'Add New Office', 'mandevco' ),
			'add_new'             => __( 'Add New', 'mandevco' ),
			'edit_item'           => __( 'Edit Office', 'mandevco' ),
			'update_item'         => __( 'Update Office', 'mandevco' ),
			'search_items'        => __( 'Search Office', 'mandevco' ),
			'not_found'           => __( 'Not Found', 'mandevco' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'mandevco' ),
		);
		 
	// Set other options for Custom Post Type
		 
		$args = array(
			'label'               => __( 'office', 'mandevco' ),
			'description'         => __( 'Office', 'mandevco' ),
			'labels'              => $labels,
			// Features this CPT supports in Post Editor
			'supports'            => array( 'title', 'editor',  'thumbnail', 'revisions', 'custom-fields', ),
			// You can associate this CPT with a taxonomy or custom taxonomy. 
			'taxonomies'          => array(  'office-region' ),
			/* A hierarchical CPT is like Pages and can have
			* Parent and child items. A non-hierarchical CPT
			* is like Posts.
			*/ 
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
		 
		// Registering your Custom Post Type
		register_post_type( 'office', $args );
	 
	
		register_taxonomy(  
			'office-region',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
			'office',        //post type name
			array(  
				'hierarchical' => true,  
				'label' => 'Region',  //Display name
				'query_var' => true,
				'rewrite' => array(
					'slug' => 'office-region', // This controls the base slug that will display before each term
					'with_front' => false // Don't display the category base before 
				)
			)  
		);  
	}
	 
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not 
	* unnecessarily executed. 
	*/
	 
	add_action( 'init', 'custom_post_type_office' );

	function custom_post_type_industrial() {

 
		// Set UI labels for Custom Post Type
			$labels = array(
				'name'                => _x( 'Industrials', 'Post Type General Name', 'mandevco' ),
				'singular_name'       => _x( 'Industrial', 'Post Type Singular Name', 'mandevco' ),
				'menu_name'           => __( 'Industrials', 'mandevco' ),
				'parent_item_colon'   => __( 'Parent Industrial', 'mandevco' ),
				'all_items'           => __( 'All Industrials', 'mandevco' ),
				'view_item'           => __( 'View Industrial', 'mandevco' ),
				'add_new_item'        => __( 'Add New Industrial', 'mandevco' ),
				'add_new'             => __( 'Add New', 'mandevco' ),
				'edit_item'           => __( 'Edit Industrial', 'mandevco' ),
				'update_item'         => __( 'Update Industrial', 'mandevco' ),
				'search_items'        => __( 'Search Industrial', 'mandevco' ),
				'not_found'           => __( 'Not Found', 'mandevco' ),
				'not_found_in_trash'  => __( 'Not found in Trash', 'mandevco' ),
			);
			 
		// Set other options for Custom Post Type
			 
			$args = array(
				'label'               => __( 'industrial', 'mandevco' ),
				'description'         => __( 'Industrial', 'mandevco' ),
				'labels'              => $labels,
				// Features this CPT supports in Post Editor
				'supports'            => array( 'title', 'editor',  'thumbnail', 'revisions', 'custom-fields', ),
				// You can associate this CPT with a taxonomy or custom taxonomy. 
				'taxonomies'          => array(  'industrial-region' ),
				/* A hierarchical CPT is like Pages and can have
				* Parent and child items. A non-hierarchical CPT
				* is like Posts.
				*/ 
				'hierarchical'        => false,
				'public'              => true,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'show_in_nav_menus'   => true,
				'show_in_admin_bar'   => true,
				'menu_position'       => 5,
				'can_export'          => true,
				'has_archive'         => true,
				'exclude_from_search' => false,
				'publicly_queryable'  => true,
				'capability_type'     => 'page',
			);
			 
			// Registering your Custom Post Type
			register_post_type( 'industrial', $args );
		 
		
			register_taxonomy(  
				'industrial-region',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
				'industrial',        //post type name
				array(  
					'hierarchical' => true,  
					'label' => 'Region',  //Display name
					'query_var' => true,
					'rewrite' => array(
						'slug' => 'industrial-region', // This controls the base slug that will display before each term
						'with_front' => false // Don't display the category base before 
					)
				)  
			);  
		}
		 
		/* Hook into the 'init' action so that the function
		* Containing our post type registration is not 
		* unnecessarily executed. 
		*/
		 
		add_action( 'init', 'custom_post_type_industrial');

		function custom_post_type_cavendish() {

 
			// Set UI labels for Custom Post Type
				$labels = array(
					'name'                => _x( 'Cavendishs', 'Post Type General Name', 'mandevco' ),
					'singular_name'       => _x( 'Cavendish', 'Post Type Singular Name', 'mandevco' ),
					'menu_name'           => __( 'Cavendishs', 'mandevco' ),
					'parent_item_colon'   => __( 'Parent Cavendish', 'mandevco' ),
					'all_items'           => __( 'All Cavendishs', 'mandevco' ),
					'view_item'           => __( 'View Cavendish', 'mandevco' ),
					'add_new_item'        => __( 'Add New Cavendish', 'mandevco' ),
					'add_new'             => __( 'Add New', 'mandevco' ),
					'edit_item'           => __( 'Edit Cavendish', 'mandevco' ),
					'update_item'         => __( 'Update Cavendish', 'mandevco' ),
					'search_items'        => __( 'Search Cavendish', 'mandevco' ),
					'not_found'           => __( 'Not Found', 'mandevco' ),
					'not_found_in_trash'  => __( 'Not found in Trash', 'mandevco' ),
				);
				 
			// Set other options for Custom Post Type
				 
				$args = array(
					'label'               => __( 'cavendish', 'mandevco' ),
					'description'         => __( 'Cavendish', 'mandevco' ),
					'labels'              => $labels,
					// Features this CPT supports in Post Editor
					'supports'            => array( 'title', 'editor',  'thumbnail', 'revisions', 'custom-fields', ),
					// You can associate this CPT with a taxonomy or custom taxonomy. 
					'taxonomies'          => array(  'cavendish-region' ),
					/* A hierarchical CPT is like Pages and can have
					* Parent and child items. A non-hierarchical CPT
					* is like Posts.
					*/ 
					'hierarchical'        => false,
					'public'              => true,
					'show_ui'             => true,
					'show_in_menu'        => true,
					'show_in_nav_menus'   => true,
					'show_in_admin_bar'   => true,
					'menu_position'       => 5,
					'can_export'          => true,
					'has_archive'         => true,
					'exclude_from_search' => false,
					'publicly_queryable'  => true,
					'capability_type'     => 'page',
				);
				 
				// Registering your Custom Post Type
				register_post_type( 'cavendish', $args );
			 
			
				register_taxonomy(  
					'cavendish-region',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
					'cavendish',        //post type name
					array(  
						'hierarchical' => true,  
						'label' => 'Region',  //Display name
						'query_var' => true,
						'rewrite' => array(
							'slug' => 'cavendish-region', // This controls the base slug that will display before each term
							'with_front' => false // Don't display the category base before 
						)
					)  
				);  
			}
			 
			/* Hook into the 'init' action so that the function
			* Containing our post type registration is not 
			* unnecessarily executed. 
			*/
			 
			add_action( 'init', 'custom_post_type_cavendish', 0 );


function get_property_terms( $taxonomy ) {

	?>
	 <section>
			<div class="select-region-main">
				<div class="container">
					<div class="select-region-inner">
						<div class="page-title">
							<h1>Select a Region</h1>
							<span class="underline"></span>
						</div>
						<div class="row">
						<?php
                          
						$terms = get_terms( array(
							'taxonomy' => $taxonomy,
							'hide_empty' => false,
						) );
                        
						foreach( $terms as $term ) {

							$image = get_field( 'featured_image',  'region_' . $term->term_id );

							if ( empty( $image ) ) {
								$image = get_template_directory_uri() . '/images/region-laurentians.jpg';
							}
							?>
							<div class="col-md-6">
								<div class="region-box">
								<a href="<?php echo get_term_link( $term, 'region' ); ?>">
									<img src="<?php echo $image ?>" alt="">
									<div class="region-name">
										<h1><?php echo $term->name; ?></h1>
									</div>
								</a>
								</div>
							</div>
							<?php
						}
						?>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php
}


function custom_post_type_development() {

 
	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Developments', 'Post Type General Name', 'mandevco' ),
			'singular_name'       => _x( 'Development', 'Post Type Singular Name', 'mandevco' ),
			'menu_name'           => __( 'Developments', 'mandevco' ),
			'parent_item_colon'   => __( 'Parent Development', 'mandevco' ),
			'all_items'           => __( 'All Developments', 'mandevco' ),
			'view_item'           => __( 'View Development', 'mandevco' ),
			'add_new_item'        => __( 'Add New Development', 'mandevco' ),
			'add_new'             => __( 'Add New', 'mandevco' ),
			'edit_item'           => __( 'Edit Development', 'mandevco' ),
			'update_item'         => __( 'Update Development', 'mandevco' ),
			'search_items'        => __( 'Search Development', 'mandevco' ),
			'not_found'           => __( 'Not Found', 'mandevco' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'mandevco' ),
		);
		 
	// Set other options for Custom Post Type
		 
		$args = array(
			'label'               => __( 'development', 'mandevco' ),
			'description'         => __( 'Development', 'mandevco' ),
			'labels'              => $labels,
			// Features this CPT supports in Post Editor
			'supports'            => array( 'title', 'editor',  'thumbnail', 'revisions', 'custom-fields', ),
			// You can associate this CPT with a taxonomy or custom taxonomy. 
			'taxonomies'          => array(  'development-region' ),
			/* A hierarchical CPT is like Pages and can have
			* Parent and child items. A non-hierarchical CPT
			* is like Posts.
			*/ 
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
		 
		// Registering your Custom Post Type
		register_post_type( 'development', $args );
	 
	
	}
	 
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not 
	* unnecessarily executed. 
	*/
	 
	add_action( 'init', 'custom_post_type_development', 0 );


function get_post_type_details( $post_type ) {
	
	if( have_rows('post_type_detail', 'option') ) {
			 while  (have_rows('post_type_detail', 'option')) {
				 the_row(); 
				 
				 if ( get_sub_field( 'post_type_name' ) == $post_type ) {
					return [
						'title' => get_sub_field( 'title' ),
						'description' => get_sub_field( 'description' ),
						'background_image' => get_sub_field( 'background_image' ),
						'mobile_background_image' => get_sub_field( 'mobile_background_image' ),
					];	 
				 }
			 }
	}
	
	return false;
}

function get_archive_page_heading_section( $post_type ) {
	
	$post_type_data = get_post_type_details( $post_type );
		?>
	<section>
            <style>
                .mobile-screen .page-header{
                    background-image:url(<?php echo  $post_type_data['mobile_background_image']; ?>) !important;
                }
			</style>
                <div class="page-header" style="background-image:url(<?php echo $post_type_data['background_image'];?>);">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="page-header__content">
                                    <h1><?php echo $post_type_data['title'] ?></h1>
                                    <p><?php echo $post_type_data['description']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
	<?php	
}

 // Get current language from WPML
function ab_get_current_lang() {
  return defined('ICL_LANGUAGE_CODE') ? ICL_LANGUAGE_CODE : 'en';
}

// Default bilingual label based on current language
function ab_get_monthly_link_label() {
  $lang = ab_get_current_lang();

  if ($lang === 'fr') {
    return 'Voir le lien du mois';
  }

  return "See this month's link";
}

// Shortcode: [monthly_link text="Custom text" target="_blank" class="my-class"]
function ab_monthly_link_shortcode($atts) {
  $url = get_field('monthly_link_url', 'option'); // ACF Theme Options

  if (!$url) {
    return '';
  }

  $default_label = ab_get_monthly_link_label();

  $atts = shortcode_atts(
    [
      'text'   => $default_label,
      'target' => '',          // e.g. "_blank"
      'class'  => '',          // optional CSS class
    ],
    $atts
  );

  $label = $atts['text'];

  $class_attr  = $atts['class'] ? ' class="' . esc_attr($atts['class']) . '"' : '';
  $target_attr = $atts['target'] ? ' target="' . esc_attr($atts['target']) . '" rel="noopener noreferrer"' : '';

  return '<a' . $class_attr . ' href="' . esc_url($url) . '"' . $target_attr . '>' . esc_html($label) . '</a>';
}
add_shortcode('monthly_link', 'ab_monthly_link_shortcode');


function get_contact_info_html() {
    $locale = get_locale();

    $text = ( strpos( $locale, 'fr' ) === 0 )
        ? '514-717-1001 — Parlez à un conseiller'
        : '514-717-1001 — Speak with a leasing specialist';

    $html  = '<li>';
    $html .= '<img src="/wp-content/uploads/2025/12/phone-1b.png" alt="">';
    $html .= '<a href="tel:15147171001">' . esc_html( $text ) . '</a>';
    $html .= '</li>';

    return $html;
}

