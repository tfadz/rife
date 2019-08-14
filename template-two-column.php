<?php /* Template Name: Two Column */ ?>

<?php get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
    
    <section class="container">

      <div class="grid">

      <article class="grid--6">
        <?php the_field('left_column'); ?>
      </article>

        <article class="grid--6">
        <?php the_field('right_sidebar'); ?>
  	 
        </article>

        </div>
    </section>
		
  
    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
