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
<div id="shop">
<?php do_action( 'storefront_before_header' ); ?>
<?php if ( get_option('banner_image_link') && get_option('op_banner_image_url')) : ?>
	<a href="<?php echo esc_url( get_option('banner_image_link') ); ?>">
<?php endif; ?>
  <section id='shop-banner'>
			<?php if ( get_option('op_banner_image_url') ) : ?>
				<img src="<?php echo esc_url( get_option('op_banner_image_url') ); ?>">
			<?php endif; ?>
  </section>
<?php if ( get_option('banner_image_link') && get_option('op_banner_image_url')) : ?>
	</a>
<?php endif; ?>
<section class='container'>
	<header id="masthead" class="site-header" role="banner" style="<?php storefront_header_styles(); ?>">
	<section id="category-bar">
		<nav class="navbar navbar-expand-lg navbar-dark ">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<div id="nav-contain">
					<div class="nav-box">
						<?php storefront_header_cart() ?>
					</div>
					<div>
						<?php
							wp_nav_menu(array(
							'theme_location'=>'category_bar',
							 'depth' => 10,
						));
						?>
					</div>
				</div>
			</div>
		</nav>
	</section>
</section>
	</header>
	<!-- #masthead -->
	<?php 	do_action( 'storefront_before_content' ); ?>
	<!-- <div id="content" class="site-content" tabindex="-1"> -->
		<!-- <div class="col-full"> -->

		<?php
		do_action( 'storefront_content_top' );
