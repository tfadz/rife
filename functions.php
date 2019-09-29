<?php
/**
 * Rife functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Rife
 */

if ( ! function_exists( 'rife_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function rife_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Rife, use a find and replace
		 * to change 'rife' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'rife', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'rife' ),
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
		add_theme_support( 'custom-background', apply_filters( 'rife_custom_background_args', array(
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
add_action( 'after_setup_theme', 'rife_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rife_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rife_content_width', 640 );
}
add_action( 'after_setup_theme', 'rife_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rife_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'rife' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'rife' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'rife_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rife_scripts() {
	wp_enqueue_style( 'rife-style', get_stylesheet_uri() );

	wp_enqueue_script( 'rife-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );


	wp_enqueue_script( 'rife-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'rife-scripts', get_template_directory_uri() . '/js/theme.js', array( 'jquery' ), '2', true );
  wp_enqueue_script( 'rife-masonry', get_template_directory_uri() . '/js/masonry.js', array('jquery'), '2', true );

  wp_localize_script( 'rife-scripts', 'rife_vars', array(
    'ajaxurl'        => admin_url( 'admin-ajax.php' ),
    'pageNumber'     => 0,
    'posts_per_page' => 9,
  ));



	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rife_scripts' );
add_action( 'wp_ajax_nopriv_rife_load_posts', 'rife_load_posts' );
add_action( 'wp_ajax_rife_load_posts', 'rife_load_posts' );


// Add Custom Menus Menu
function register_my_menus() {
  register_nav_menus(
    array(
      'footer-menu' => __( 'Footer Menu' ),
      'mobile-menu' => __( 'Mobile Menu' )
    )
  );
}

add_action( 'init', 'register_my_menus' );


// Add Theme Options
if( function_exists('acf_add_options_page') ) {
  
  acf_add_options_page();
  acf_set_options_page_menu('Theme Options');
  acf_add_options_sub_page('Header');
  acf_add_options_sub_page('Footer');


  acf_add_options_sub_page(array(
    'page_title'  => 'Footer',
    'menu_title'  => 'Footer',
    'menu_slug'   => 'theme-options-footer',
    'capability'  => 'edit_posts',
    'parent_slug' => 'theme-options',
    'position'    => false,
    'icon_url'    => false,
  ));

  acf_add_options_sub_page(array(
    'page_title'  => 'Header',
    'menu_title'  => 'Header',
    'menu_slug'   => 'theme-options-header',
    'capability'  => 'edit_posts',
    'parent_slug' => 'theme-options',
    'position'    => false,
    'icon_url'    => false,
  ));
  
}

// Add custom colors for ACF color picker
function my_acf_collor_pallete_script() {
    ?>
    <script type="text/javascript">
    (function($){
        
        acf.add_filter('color_picker_args', function( args, $field ){

            // do something to args
            args.palettes = ['#6a1953', '#A7C1BA', '#EEEEEE', '#333333', '#FFFFFF']
            
            console.log(args);
            // return
            return args;
        });
        
    })(jQuery);
    </script>
    <?php
}

add_action('acf/input/admin_footer', 'my_acf_collor_pallete_script');


// Register Custom Navigation Walker 
require_once('wp_bootstrap_navwalker.php');


// Add Font Awesome
function themeslug_enqueue_script() {
    wp_enqueue_script( 'fontawesome-js', 'https://use.fontawesome.com/2cc6a37b3c.js', false );
}

add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_script' );


// Google Fonts
function wpb_add_google_fonts() {

wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Lato:300,400,700|Playfair+Display', false ); 
}

add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

// Hide Gravity form labels
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

// Move Yoast to bottom
function yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

// Hide Custom fields
// add_filter('acf/settings/show_admin', '__return_false');

// Blog Posts

/**
 * Used to load cards on home page. Can be called directly or via AJAX.
 *
 * Outputs HTML code.
 */
function rife_load_posts() {
  $ppp  = 9;
  $page = 0;

  // Adjust our query parameters when being called via AJAX.
  if ( wp_doing_ajax() ) {
    // This makes adding lazy loading a little easier in the future.
    if ( ! empty( $_GET['pageNumber'] ) ) {
      $page = (int) sanitize_text_field( $_GET['pageNumber'] );
    }

    // Start Output buffer.
    ob_start();
  }

  $args = array(
    'suppress_filters' => true,
    'post_status'      => 'publish',
    'post_type'        => 'post',
    'orderby'          => 'date',
    'order'            => 'DESC',
    'posts_per_page'   => $ppp,
    'offset'           => $page * $ppp,
  );

  $query_cards = new WP_Query( $args );

  if ( $query_cards->have_posts() ) :
    while ( $query_cards->have_posts() ) :
      $query_cards->the_post();

        include get_stylesheet_directory() . '/template-parts/card-post.php';
   
    endwhile;
    wp_reset_postdata();
  endif;

  if ( wp_doing_ajax() ) {
    // Flush output buffer and end script.
    wp_send_json( array(
      'count' => $query_cards->post_count,
      'html'  => ob_get_clean(),
    ));
    exit();
  }
}


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

