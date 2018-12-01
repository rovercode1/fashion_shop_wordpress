<?php wp_footer(); ?>
<?php do_action( 'storefront_before_footer' ); ?>
  <section class='container'>
    <footer id="colophon" class="site-footer" role="contentinfo">
    <?php
      wp_nav_menu(array(
        'theme_location'=>'main_footer',
      ));
      ?>
    <?php
    /**
    * Functions hooked in to storefront_footer action
    *
    * @hooked storefront_footer_widgets - 10
    * @hooked storefront_credit         - 20
    */
    ?>
    </footer>
  </div> <!--Loading page icon  -->
  <?php do_action( 'storefront_after_footer' ); ?>
  </section>
</body>
</html>
