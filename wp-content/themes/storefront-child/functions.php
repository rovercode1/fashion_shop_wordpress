<?php
function my_theme_enqueue_styles() {
    $parent_style = 'storefront-style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function website_files(){
    //Style.css added
    wp_enqueue_style('website_main_files', get_stylesheet_uri());
    // Bootstrap
    wp_enqueue_style('bootstrap_files', '//stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css');
    //Bootstrap Javascript
    wp_enqueue_script(
      'jquery','https://code.jquery.com/jquery-3.3.1.slim.min.js');
    wp_enqueue_script(
    'popper','//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js');
    wp_enqueue_script(
    'bootstrap_bundle','https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js
');
  // Fonts
    wp_enqueue_style('roboto_font', '//fonts.googleapis.com/css?family=Roboto:300,400');
    wp_enqueue_style('Titillium_font', '//fonts.googleapis.com/css?family=Titillium+Web:300,400,700" rel="stylesheet">" rel="stylesheet">');
    wp_enqueue_style('dosis_font', '//fonts.googleapis.com/css?family=Dosis:400,700" rel="stylesheet">');

}
add_action( 'wp_enqueue_scripts', 'website_files' );
// ============================================
// Unhook WooCommerce wrappers:
// ============================================
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
// ============================================
// Woocommerce support
// ============================================
function my_custom_woocommerce_theme_support() {
    add_theme_support( 'woocommerce', array(
        // . . .
        // thumbnail_image_width, single_image_width, etc.
        // Product grid theme settings
        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
    ) );
}
add_action( 'after_setup_theme', 'my_custom_woocommerce_theme_support' );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );
// ============================================
// Wrapper for shop
// ============================================
add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);
function my_theme_wrapper_start() {
  echo '<section id="main">';
}
function my_theme_wrapper_end() {
  echo'</section>';
}
// ============================================
// Add menu
// ============================================
register_nav_menus( array(
	'main_header' => 'Main Header',
	'main_footer' => 'Main Footer',
) );
// ============================================
// Unhook default storefront header functions
// ============================================
function unhook_storefront_functions() {
    // Don't forget the position number if the original function has one
    remove_action('storefront_header','storefront_product_search',40);
    remove_action('storefront_header','storefront_primary_navigation_wrapper',42);
    remove_action('storefront_header','storefront_primary_navigation',50);
    remove_action('storefront_header','storefront_header_cart',60);
    remove_action('storefront_header','storefront_primary_navigation_wrapper_close',68);
}
// ============================================
// Remove search on footer hand-held mode.
// ============================================
add_filter( 'storefront_handheld_footer_bar_links', 'jk_remove_handheld_footer_links' );
function jk_remove_handheld_footer_links( $links ) {
	// unset( $links['my-account'] );
	unset( $links['search'] );
	// unset( $links['cart'] );
	return $links;
}
// ============================================
// Add home to footer hand-held.
// ============================================
add_filter( 'storefront_handheld_footer_bar_links', 'jk_add_home_link' );
function jk_add_home_link( $links ) {
	$new_links = array(
		'home' => array(
			'priority' => 10,
			'callback' => 'jk_home_link',
		),
	);
	$links = array_merge( $new_links, $links );
	return $links;
}
function jk_home_link() {
	echo '<a href="' . esc_url( home_url( '/' ) ) . '">' . __( 'Home' ) . '</a>';
}
// ============================================
// Widgets
// ============================================
function arphabet_widgets_init() {
 register_sidebar( array(
   'name'          => 'Shop Widgets',
   'id'            => 'shop_widget',
   'before_widget' => '<div class="widget-bar">',
   'after_widget'  => '</div>',
   'before_title'  => '<h2 class="rounded">',
   'after_title'   => '</h2>',
 ) );
 register_sidebar( array(
   'name'          => 'More Products',
   'id'            => 'products_widget',
   'before_widget' => '<div class="widget-bar">',
   'after_widget'  => '</div>',
   'before_title'  => '<h2 class="rounded">',
   'after_title'   => '</h2>',
 ) );
}
add_action( 'widgets_init', 'arphabet_widgets_init' );
