<?php /* Template Name: Homepage */ ?>

<?php get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
     

      <?php if(get_field('home_widgets')) : while(has_sub_field('home_widgets')) : ?>
      	
      	<?php if(get_row_layout() == "content_block"): ?>
		      <section class="container main-content">
		        <?php the_sub_field('content'); ?>
		       </section>
      	<?php endif; ?>

      	<?php if(get_row_layout() == "gallery"): ?>
		      <section class="container">
						<div class="ri-spotlights">
							<ul class="ri-spotlights__list">
								<?php if(have_rows('spotlights')) : while(have_rows('spotlights')) : the_row(); 
									$gImage = get_sub_field('g_image');
									$gTitle = get_sub_field('g_title');
									$gLink = get_sub_field('g_link');
									$alt = $gImage['alt'];
								?>
								<li>
								<a href="<?php echo $gLink ?>">
								<h3><?php echo $gTitle ?></h3>
									 <?php echo wp_get_attachment_image($gImage['id'], 'full'); ?>
								</a>
								</li>
								<?php endwhile; endif; ?>
							</ul>
						</div>
		       </section>
      	<?php endif; ?>


      	<?php if(get_row_layout() == "narrow_content"): ?>
		      <section class="container sm-width">
		        <?php the_sub_field('content_narrow'); ?>
		       </section>
      	<?php endif; ?>


      	<!-- Slider -->
      		<?php if(get_row_layout() == "slider_content"): ?>
              <section class="ri-slider">
                  <?php if(have_rows('slides')) : while(have_rows('slides')) : the_row();
                  $slide = get_sub_field('slide');
                  ?>
                      <div>
                          <img data-lazy="<?php echo wp_get_attachment_image($slide['id'], 'full'); ?>">
                      </div>
                  <?php endwhile; endif; ?>
		       </section>
      	<?php endif; ?>

      <?php  endwhile; endif; ?>


	
    </main><!-- #main -->
  </div><!-- #primary -->


<?php
get_footer();
