<?php include 'header.php'; ?>
<section class='container'>
  <section id='showcase'>
    <div id="carouselControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <?php $class = 'active' ?>
        <?php for($i = 0; $i < get_option('image_count');$i++){
        $count = $i +1;
        if ( get_option('showcase_url'.$count) ) : ?>
          <div class="carousel-item <?php echo $class ?>">
            <img src="<?php echo esc_url( get_option('showcase_url'.$count) ); ?>">
          </div>
        <?php endif; ?>
        <?php  $class = '' ?>
        <?php } ?>
      </div>
      <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
      </a>
    </div>
  </section>
</section>
<?php include 'footer.php'; ?>
