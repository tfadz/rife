<?php
/**
* The template for displaying the footer
*
* Contains the closing of the #content div and all content after.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package Rife
*/
?>
  <a href="javascript:" id="return-to-top"><svg class="up-arrow" version="1.1" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="https://www.w3.org/1999/xlink" enable-background="new 0 0 129 129">
  <g>
    <path d="m121.4,61.6l-54-54c-0.7-0.7-1.8-1.2-2.9-1.2s-2.2,0.5-2.9,1.2l-54,54c-1.6,1.6-1.6,4.2 0,5.8 0.8,0.8 1.8,1.2 2.9,1.2s2.1-0.4 2.9-1.2l47-47v98.1c0,2.3 1.8,4.1 4.1,4.1s4.1-1.8 4.1-4.1v-98.1l47,47c1.6,1.6 4.2,1.6 5.8,0s1.5-4.2 1.42109e-14-5.8z"/>
  </g>
</svg>
</a>
</div><!-- #content -->
<footer id="colophon" class="site-footer ri-footer">
  <section class="container">
    <div class="row">
      <div class="col-lg-12 col-sm-12">

        <div class="ri-footer__main">
          <div class="links">
            <?php
            wp_nav_menu(array(
              'theme_location' => 'footer-menu',
              'menu_class'        => 'nav-list',
            ));
            ?>
          </div>
          <div class="site-info">
            <div class="footer-logo">
              <?php get_template_part('template-parts/logo'); ?>
            </div>
            <div class="legal">&copy; <?php echo date("Y"); ?> Rife Photography</div>
            <div class="info"><a href="tel:402-304-4057">(402)-304-4057</a></div> <div class="info"><a href="mailto:maggie@rifeponcephotography.com">maggie@rifeponcephotography.com</a></div>

          </div>
        </div>
      </div>
    </div>
  </section>

</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
