<?php
/**
 * Fashify functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Fashify
 */

if ( ! function_exists( 'fashify_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fashify_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Fashify, use a find and replace
	 * to change 'fashify' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'fashify', get_template_directory() . '/languages' );

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
	 * Enable support for custom logo.
	 *
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 54,
		'width'       => 192,
		'flex-height' => true,
		'flex-width'  => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'fashify-thumb-default', 676, 483, true );
	add_image_size( 'fashify-thumb-layout2', 321, 229, true );
	add_image_size( 'fashify-thumb-layout3', 280, 220, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'fashify' ),
		'social'  => esc_html__( 'Social Links', 'fashify' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'gallery',
		'caption',
	) );


	/*
	 * Add support for Gutenberg.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/reference/theme-support/
	 */
	add_theme_support( 'align-wide' );

}
endif;
add_action( 'after_setup_theme', 'fashify_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fashify_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fashify_content_width', 640 );
}
add_action( 'after_setup_theme', 'fashify_content_width', 0 );


if ( ! function_exists( 'fashify_fonts_url' ) ) :
/**
 * @return string Google fonts URL for the theme.
 */
function fashify_fonts_url() {
	$fonts_url = '';
	/**
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Frankin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x( 'on', 'libre_franklin font: on or off', 'fashify' );
	if ( 'off' !== $libre_franklin ) {
		$font_families = array();
		$font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}
	return esc_url_raw( $fonts_url );
}
endif;

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fashify_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'fashify' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'fashify' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'fashify' ),
		'id'            => 'footer',
		'description'   => esc_html__( 'Add widgets here.', 'fashify' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

}
add_action( 'widgets_init', 'fashify_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fashify_scripts() {

	wp_enqueue_style( 'fashify-fonts', fashify_fonts_url(), array(), null );

	// Add Font Awesome, used in the main stylesheet.
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.5' );
	wp_enqueue_style( 'fashify-style', get_stylesheet_uri() );

	wp_enqueue_script( 'fashify-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array( 'jquery' ), '20151215', true );

	wp_enqueue_script( 'fashify-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array( 'jquery' ), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fashify_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom header
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Widgets
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
