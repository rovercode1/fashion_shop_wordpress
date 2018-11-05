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


// ============================================
// Customizer
// ============================================

function add_customizer($wp_customize) {
  // Add a new section (Banner section)
  $wp_customize->add_section( 'ct_banner_section', array(
      'title' => 'Banner'
  ) );

  // Add a new option to Banner Section
  $wp_customize->add_setting( 'op_banner_bg_color', array(
      'type' => 'option',
      'default' => '#ffffff', // the default value, you can change it.
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color'
  ) );

  // Color option control
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'op_banner_bg_color', array(
      'label' => 'Background Color',
      'section' => 'ct_banner_section',
      'description' => 'Change banner background color.',
      'settings' => 'op_banner_bg_color'
  ) ) );

  // Change Banner Height
  $wp_customize->add_setting( 'op_banner_height', array(
      'type' => 'option',
      'default' => '50px;', // the default value, you can change it.
      'transport' => 'refresh',
  ) );

  // Color option control
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'op_banner_height', array(
      'label' => 'Banner Height',
      'section' => 'ct_banner_section',
      'description' => 'Change banner height.',
      'settings' => 'op_banner_height',
      'type' => 'number'
  ) ) );

  // Banner image
  $wp_customize->add_setting( 'op_banner_image_url', array(
      'type' => 'option',
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw'
  ) );

  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'op_banner_image_url', array(
      'label' => 'Upload Image',
      'section' => 'ct_banner_section',
      'description' => 'Upload your banner image.',
      'settings' => 'op_banner_image_url'
  ) ) );


  // Add a new section (Logo image section)
  $wp_customize->add_section( 'ct_logo_section', array(
      'title' => 'Logo'
  ) );

  $wp_customize->add_setting( 'op_logo_url', array(
      'type' => 'option',
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'esc_url_raw'
  ) );

  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'op_logo_url', array(
      'label' => 'Upload Logo',
      'section' => 'ct_logo_section',
      'description' => 'Upload your logo image.',
      'settings' => 'op_logo_url'
  ) ) );
      //End.
}
add_action( 'customize_register', 'add_customizer' );

function banner_height(){
    if( get_option('op_banner_height') ){
        ?>
            <style type="text/css">
                #shop-banner{
                    height: <?php echo get_option('op_banner_height'); ?>px;
                }
            </style>
        <?php
    }
}
add_action('wp_head', 'banner_height');

function banner_image(){
    if( get_option('op_banner_height') && get_option('op_banner_image_url')){
        ?>
            <style type="text/css">
                #shop-banner, img{
                  max-height: <?php echo get_option('op_banner_height'); ?>px;
                }
            </style>
        <?php
    }
}
add_action('wp_head', 'banner_image');

function banner_background_color_style(){
    if( get_option('op_banner_bg_color') ){
        ?>
            <style type="text/css">
                #shop-banner{
                    background-color: <?php echo get_option('op_banner_bg_color'); ?>;
                }
            </style>
        <?php
    }
}
add_action('wp_head', 'banner_background_color_style');
?>
