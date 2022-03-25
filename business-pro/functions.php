<?php
/**
 * CrucePest Theme
 *
 * @package   Cruce Pest Control
 * @link      https://webreactor.us
 * @author    Web Reactor SEO Pro
 * @copyright Copyright © 2020 Web Reactor
 * @license   GPL-2.0+
 */

// Child theme (do not remove).
include_once( get_template_directory() . '/lib/init.php' );

// Define theme constants.
define( 'CHILD_THEME_NAME', 'Business Pro' );
define( 'CHILD_THEME_URL', 'https://seothemes.com/themes/business-pro' );
define( 'CHILD_THEME_VERSION', '1.0.0' );

// Set Localization (do not remove).
load_child_theme_textdomain( 'business-pro', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'business-pro' ) );

// Remove unused sidebars and layouts.
unregister_sidebar( 'sidebar-alt' );
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

// Reposition the primary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav' );

// Reposition footer widgets.
remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );
add_action( 'genesis_footer', 'genesis_footer_widget_areas', 6 );

// Genesis style trump.
remove_action( 'genesis_meta', 'genesis_load_stylesheet' );
add_action( 'wp_enqueue_scripts', 'genesis_enqueue_main_stylesheet', 99 );

// Remove default page header.
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
remove_action( 'genesis_before_loop', 'genesis_do_posts_page_heading' );
remove_action( 'genesis_before_loop', 'genesis_do_date_archive_title' );
remove_action( 'genesis_before_loop', 'genesis_do_blog_template_heading' );
remove_action( 'genesis_before_loop', 'genesis_do_taxonomy_title_description', 15 );
remove_action( 'genesis_before_loop', 'genesis_do_author_title_description', 15 );
remove_action( 'genesis_before_loop', 'genesis_do_cpt_archive_title_description' );
remove_action( 'genesis_before_loop', 'genesis_do_search_title' );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );

// Add custom page header.
add_action( 'genesis_after_header', 'genesis_do_posts_page_heading', 24 );
add_action( 'genesis_after_header', 'genesis_do_date_archive_title', 24 );
add_action( 'genesis_after_header', 'genesis_do_blog_template_heading', 24 );
add_action( 'genesis_after_header', 'genesis_do_taxonomy_title_description', 24 );
add_action( 'genesis_after_header', 'genesis_do_author_title_description', 24 );
add_action( 'genesis_after_header', 'genesis_do_cpt_archive_title_description', 24 );

// Remove search results and shop page titles.
add_filter( 'woocommerce_show_page_title', '__return_null' );
add_filter( 'genesis_search_title_output', '__return_false' );

// Enable shortcodes in HTML widgets.
add_filter( 'widget_text', 'do_shortcode' );

// Set portfolio image size to override plugin.
add_image_size( 'portfolio', 620, 380, true );

// Enable support for page excerpts.
add_post_type_support( 'page', 'excerpt' );

// Add support for structural wraps.
add_theme_support( 'genesis-structural-wraps', array(
	'header',
	'menu-primary',
	'menu-secondary',
	'footer-widgets',
	'footer',
) );

// Enable Accessibility support.
add_theme_support( 'genesis-accessibility', array(
	'404-page',
	'drop-down-menu',
	'headings',
	'rems',
	'search-form',
	'skip-links',
) );

// Enable custom navigation menus.
add_theme_support( 'genesis-menus' , array(
	'primary' => __( 'Header Menu', 'business-pro' ),
) );

// Enable support for footer widgets.
add_theme_support( 'genesis-footer-widgets', 4 );

// Enable viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

// Enable HTML5 markup structure.
add_theme_support( 'html5', array(
	'caption',
	'comment-form',
	'comment-list',
	'gallery',
	'search-form',
) );

// Enable support for post formats.
add_theme_support( 'post-formats', array(
	'aside',
	'audio',
	'chat',
	'gallery',
	'image',
	'link',
	'quote',
	'status',
	'video',
) );

// Enable support for post thumbnails.
add_theme_support( 'post-thumbnails' );

// Enable automatic output of WordPress title tags.
add_theme_support( 'title-tag' );

// Enable support for WooCommerce.
add_theme_support( 'woocommerce' );

// Enable selective refresh and Customizer edit icons.
add_theme_support( 'customize-selective-refresh-widgets' );

// Enable theme support for custom background image.
add_theme_support( 'custom-background', array(
	'default-color' => 'f4f5f6',
) );

// Enable logo option in Customizer > Site Identity.
add_theme_support( 'custom-logo', array(
	'height'      => 100,
	'width'       => 300,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( '.site-title', '.site-description' ),
) );

// Display custom logo.
add_action( 'genesis_site_title', 'the_custom_logo', 1 );

// Enable support for custom header image or video.
add_theme_support( 'custom-header', array(
	'header-selector'    => 'false',
	'default_image'      => get_stylesheet_directory_uri() . '/assets/images/hero.jpg',
	'header-text'        => true,
	'default-text-color' => 'ffffff',
	'width'              => 1920,
	'height'             => 1080,
	'flex-height'        => true,
	'flex-width'         => true,
	'uploads'            => true,
	'video'              => true,
) );

// Register default header (just in case).
register_default_headers( array(
	'child' => array(
		'url'           => '%2$s/assets/images/hero.jpg',
		'thumbnail_url' => '%2$s/assets/images/hero.jpg',
		'description'   => __( 'Hero Image', 'business-pro' ),
	),
) );

// Register custom layout.
genesis_register_layout( 'centered-content', array(
	'label' => __( 'Centered Content', 'business-pro' ),
	'img'   => get_stylesheet_directory_uri() . '/assets/images/layout.gif',
) );

// Register front page widget areas.
genesis_register_sidebar( array(
	'id'          => 'front-page-1',
	'name'        => __( 'Front Page 1', 'business-pro' ),
	'description' => __( 'This is the Front Page 1 widget area.', 'business-pro' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-2',
	'name'        => __( 'Front Page 2', 'business-pro' ),
	'description' => __( 'This is the Front Page 2 widget area.', 'business-pro' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-3',
	'name'        => __( 'Front Page 3', 'business-pro' ),
	'description' => __( 'This is the Front Page 3 widget area.', 'business-pro' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-4',
	'name'        => __( 'Front Page 4', 'business-pro' ),
	'description' => __( 'This is the Front Page 4 widget area.', 'business-pro' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-5',
	'name'        => __( 'Front Page 5', 'business-pro' ),
	'description' => __( 'This is the Front Page 5 widget area.', 'business-pro' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-6',
	'name'        => __( 'Front Page 6', 'business-pro' ),
	'description' => __( 'This is the Front Page 6 widget area.', 'business-pro' ),
) );

// Register before footer widget area.
genesis_register_sidebar( array(
	'id'          => 'before-footer',
	'name'        => __( 'Before Footer', 'business-pro' ),
	'description' => __( 'This is the before footer widget area.', 'business-pro' ),
) );

add_action( 'genesis_footer', 'business_before_footer_widget_area', 5 );
/**
 * Display before-footer widget area.
 *
 * @since 1.0.0
 *
 * @return void
 */
function business_before_footer_widget_area() {
	genesis_widget_area( 'before-footer', array(
		'before' => '<div class="before-footer"><div class="wrap">',
		'after'  => '</div></div>',
	) );
}

add_action( 'wp_enqueue_scripts', 'business_scripts_styles', 99 );
/**
 * Enqueue theme scripts and styles.
 *
 * @since  1.0.0
 *
 * @return void
 */
function business_scripts_styles() {

	// Remove Simple Social Icons CSS (included with theme).
	wp_dequeue_style( 'simple-social-icons-font' );

	// Enqueue Google fonts.
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Montserrat:600|Hind:400', array(), CHILD_THEME_VERSION );

	// Enqueue Line Awesome icon font.
	wp_enqueue_style( 'line-awesome', '//maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome-font-awesome.min.css', array(), CHILD_THEME_VERSION );

	// Enqueue WooCommerce styles conditionally.
	if ( class_exists( 'WooCommerce' ) && ( is_woocommerce() || is_shop() || is_product_category() || is_product_tag() || is_product() || is_cart() || is_checkout() || is_account_page() ) ) {
		wp_enqueue_style( 'business-woocommerce', get_stylesheet_directory_uri() . '/assets/styles/min/woocommerce.min.css', array(), CHILD_THEME_VERSION );
	}

	// Enqueue theme scripts.
	wp_enqueue_script( 'business-pro', get_stylesheet_directory_uri() . '/assets/scripts/min/business-pro.min.js', array( 'jquery' ), CHILD_THEME_VERSION, true );

	// Enqueue responsive menu script.
	wp_enqueue_script( 'business-menu', get_stylesheet_directory_uri() . '/assets/scripts/min/menus.min.js', array( 'jquery' ), CHILD_THEME_VERSION, true );

	// Localize responsive menus script.
	wp_localize_script( 'business-menu', 'genesis_responsive_menu', array(
		'mainMenu'         => __( 'Menu', 'business-pro' ),
		'subMenu'          => __( 'Menu', 'business-pro' ),
		'menuIconClass'    => null,
		'subMenuIconClass' => null,
		'menuClasses'      => array(
			'combine' => array(
				'.nav-primary',
			),
		),
	) );
}

// Load theme helper functions.
include_once( get_stylesheet_directory() . '/includes/helpers.php' );

// Load Customizer settings and output.
include_once( get_stylesheet_directory() . '/includes/customize.php' );

// Load default settings for the theme.
include_once( get_stylesheet_directory() . '/includes/defaults.php' );

// Load theme's recommended plugins.
include_once( get_stylesheet_directory() . '/includes/plugins.php' );
