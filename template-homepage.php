<?php /* Template Name: Homepage */ ?>

<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php get_template_part('template-parts/home/components') ?>
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <?php $faqs = the_field('faq_schema') ?>
            </div>
          </div>
        </div>
        <?php if ($faqs) : ?>
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


 ?>
<?php
get_footer();
