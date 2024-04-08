<?php
/**
 * Register Custom Navigation Walker
 */
function WebFX_Test_navwalker(){
	require_once get_template_directory() . '/lib/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'WebFX_Test_navwalker' );

/**
 * webfx functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package webfx
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function webfx_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on webfx, use a find and replace
		* to change 'webfx' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'webfx', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'webfx' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'webfx_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'webfx_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function webfx_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'webfx_content_width', 640 );
}
add_action( 'after_setup_theme', 'webfx_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function webfx_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'webfx' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'webfx' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		),
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget 1', 'webfx' ),
			'id'            => 'footer-widget-1',
			'description'   => esc_html__( 'Add widgets here.', 'webfx' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget 2', 'webfx' ),
			'id'            => 'footer-widget-2',
			'description'   => esc_html__( 'Add widgets here.', 'webfx' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'webfx_widgets_init' );

/**
 * Enqueue Styles for Css.
 */
function webfx_scripts() {
	// <!-- bootstrap core css -->
	wp_enqueue_style( 'bootstrap-style', get_stylesheet_directory_uri().'/css/bootstrap.css' , array(), true );
	// <!-- font awesome style -->
	wp_enqueue_style( 'font-awesome-style', get_stylesheet_directory_uri().'/css/font-awesome.min.css' , array(), true );

	// <!--owl slider stylesheet -->
	wp_enqueue_style( 'owl-carousel-style', get_stylesheet_directory_uri().'/css/owl.carousel.min.css' , array(), true );
	// <!-- nice select -->
	wp_enqueue_style( 'nice-select-style', get_stylesheet_directory_uri().'/css/nice-select.min.css' , array(), true );

	// <!-- Custom styles for this template -->
    wp_enqueue_style( 'site-style', get_stylesheet_directory_uri().'/css/style.css' , array(), true );
	// <!-- responsive style -->
    wp_enqueue_style( 'responsive-style', get_stylesheet_directory_uri().'/css/responsive.css' , array(), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'webfx_scripts' );

/**
 * Enqueue Styles For Js
 */
function WebFX_Test_enqueue_js() {
	// <!-- jQery -->
	wp_enqueue_script( 'jquery-script', get_template_directory_uri() . '/js/jquery-3.4.1.min.js', array(), '3.4.1', true );
	// <!-- bootstrap js -->
	wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.js', array(), '1.0.0', true );
	
	// <!-- popper js -->
	wp_enqueue_script( 'popper-script', get_template_directory_uri() . '/js/popper.min.js', array(), '1.0.0', true );
	// <!-- owl slider -->
	wp_enqueue_script( 'owl-carousel-script', get_template_directory_uri() . '/js/owl.carousel.min.js', '1.0.0', array(), true );
	
	// <!--  OwlCarousel 2 - Filter -->
	wp_enqueue_script( 'owl-carousel-filter-script', get_template_directory_uri() . '/js/owlcarousel2-filter.min.js', '1.0.0', array(), true );
	// <!-- nice select -->
	wp_enqueue_script( 'owl-nice-select-script', get_template_directory_uri() . '/js/jquery.nice-select.min.js', '1.0.0', array(), true );
	
	// <!-- custom js -->
    wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/js/custom.js', '1.0.0', array(), true );
}
add_action( 'wp_enqueue_scripts', 'WebFX_Test_enqueue_js' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
