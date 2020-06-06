<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
      <section class="ri-slider">
        <?php if(have_rows('hero_slider')) : while(have_rows('hero_slider')) : the_row(); ?>

          <?php $img = get_sub_field('image'); ?>
          <div style="position: relative;">
            <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
          </div>
        <?php endwhile; endif; ?>
        </section>
        <div class="container-narrow">
          <div class="row">
            <div class="col-lg-12 intro">
              <h2><?php the_field('intro_title'); ?></h2>
              <h3><?php the_field('intro_text'); ?></h3>
            </div>
          </div>
        </div>
        <?php get_template_part('template-parts/home/components') ?>
        <?php $faqs = get_field('faq_schema') ?>
        <?php if ($faqs) : ?>
        <div class="container narrow" style="padding-top: 4rem;">
          <div class="row">
            <div class="col-lg-12">
              <?php echo $faqs ?>
            </div>
          </div>

          <?php if(have_rows('faqs')) : while(have_rows('faqs')) : the_row(); ?>
            <div class="row faq-row">
              <div class="col-lg-12">
                <h3><?php the_sub_field('question') ?></h3>
                <div class="answer"><p><?php the_sub_field('answer') ?></p></div>
              </div>
            </div>
          <?php endwhile; endif; ?>

        </div>
      <?php endif ?>
    </main><!-- #main -->
</div><!-- #primary -->
<?php


 ?>
<?php
get_footer();
