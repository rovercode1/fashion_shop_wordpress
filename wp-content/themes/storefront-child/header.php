<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
<?php if ( get_option('op_logo_url') ) : ?>
	<link rel="shortcut icon" href="<?php echo esc_url( get_option('op_logo_url') ); ?>">
<?php endif; ?>
</head>
<body <?php body_class(); ?>>
<div id="shop" class="hfeed site">
	<?php do_action( 'storefront_before_header' ); ?>
  <section id='shop-banner'>
		<?php if ( get_option('op_banner_image_url') ) : ?>
			<img src="<?php echo esc_url( get_option('op_banner_image_url') ); ?>">
		<?php endif; ?>
  </section>
	<header id="masthead" class="site-header" role="banner" style="<?php storefront_header_styles(); ?>">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="<?php echo site_url(); ?>"> <img src=" <?php echo get_theme_file_uri('assets/img/logo.png')?> " alt=""> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
					<div class="nav-box">
						<?php
						wp_nav_menu(array(
							'theme_location'=>'main_header',
						));
						?>
						<?php storefront_header_cart() ?>
					</div>
        </div>
      </div>
    </nav>
	</header>
	<!-- #masthead -->
	<?php 	do_action( 'storefront_before_content' ); ?>
	<!-- <div id="content" class="site-content" tabindex="-1"> -->
		<!-- <div class="col-full"> -->

		<?php
		do_action( 'storefront_content_top' );
