<?php if ( get_option('banner_image_link') && get_option('op_banner_image_url')) : ?>
<a href="<?php echo esc_url( get_option('banner_image_link') ); ?>">
<?php endif; ?>
	<section id='shop-banner-1'>
		<?php if ( get_option('op_banner_image_url') ) : ?>
			<img id='banner-img' src=' <?php  echo esc_url(   get_option('op_banner_image_url') ); ?>'>
		<?php endif; ?>
	</section>
<?php if ( get_option('banner_image_link') && get_option('op_banner_image_url')) : ?>
</a>
<?php endif; ?>

<?php if ( get_option('banner_image_link') && get_option('op_banner_mid_image_url')) : ?>
<a href="<?php echo esc_url( get_option('banner_image_link') ); ?>">
<?php endif; ?>
	<section id='shop-banner-2'>
		<?php if ( get_option('op_banner_mid_image_url') ) : ?>
			<img id='banner-img' src=' <?php  echo esc_url(   get_option('op_banner_mid_image_url') ); ?>'>
		<?php endif; ?>
	</section>
<?php if ( get_option('banner_image_link') && get_option('op_banner_mid_image_url')) : ?>
</a>
<?php endif; ?>

<?php if ( get_option('banner_image_link') && get_option('op_banner_small_image_url')) : ?>
<a href="<?php echo esc_url( get_option('banner_image_link') ); ?>">
<?php endif; ?>
	<section id='shop-banner-3'>
		<?php if ( get_option('op_banner_small_image_url') ) : ?>
			<img id='banner-img' src=' <?php  echo esc_url(   get_option('op_banner_small_image_url') ); ?>'>
		<?php endif; ?>
	</section>
<?php if ( get_option('banner_image_link') && get_option('op_banner_small_image_url')) : ?>
</a>
<?php endif; ?>
