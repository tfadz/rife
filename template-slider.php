<?php /* Template Name: Page with full width slider */ ?>

<?php get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
    
    <section class="ri-slider" data-aos="fade">

	    <?php if(have_rows('slider')) : while(have_rows('slider')) : the_row(); 
	      $fimage = get_sub_field('slider_image');
	    ?>
      <div>
        <img src="<?php echo $fimage['url']; ?>" alt="<?php echo $fimage['alt']; ?>" height="500">
      </div>
     
      <?php endwhile; endif; ?>
    </section>
		
  
    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
