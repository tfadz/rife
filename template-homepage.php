<?php /* Template Name: Homepage */ ?>

<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php get_template_part('template-parts/home/components') ?>
        <?php $faqs = the_field('faq_schema') ?>
        <?php if($faqs ) : ?>
        <div class="container" style="padding-top: 4rem;">
          <div class="row">
            <div class="col-lg-12">
              <?php echo $faqs ?>
            </div>
          </div>
        </div>
      <?php endif ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();