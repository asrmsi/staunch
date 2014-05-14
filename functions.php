<?php
/**
 * staunch functions and definitions
 *
 * @package staunch
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'staunch_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function staunch_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on staunch, use a find and replace
	 * to change 'staunch' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'staunch', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'staunch' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'staunch_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );
}
endif; // staunch_setup
add_action( 'after_setup_theme', 'staunch_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function staunch_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'staunch' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footerbar', 'staunch' ),
		'id'            => 'footerbar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'staunch_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function staunch_scripts() {
	wp_enqueue_style( 'staunch-font', 'http://fonts.googleapis.com/css?family=Roboto+Slab:300|Roboto:400,400italic,700,700italic' );
	wp_enqueue_style( 'staunch-style', get_template_directory_uri() . '/css/style.css' );

	wp_enqueue_script( 'staunch-jslib', get_template_directory_uri() . '/js/jquery.min.js', array(), '20120206', true );

	wp_enqueue_script( 'staunch-plugins', get_template_directory_uri() . '/js/plugins.min.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'staunch_scripts' );

/**
 * Cruft Removal
 */
add_action('widgets_init', 'my_remove_recent_comments_style');
function my_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Grunticon
 */
//require get_template_directory() . '/inc/grunticon.php';

/**
 * Undo Woocommerce Styles
 */
//require get_template_directory() . '/inc/wooreset.php';

/**
 * Add static site-wide header text
 */
//require get_template_directory() . '/inc/headertext.php';
