<?php /* Template Name: Homepage */ ?>
<?php get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
       <?php if (get_field('home_widgets')) : while (has_sub_field('home_widgets')) : ?>
        <?php if (get_row_layout() == "content_block"): ?>
          <section class="container main-content">
            <?php the_sub_field('content'); ?>
        </section>
    <?php endif; ?>
    <?php if (get_row_layout() == "gallery"): ?>
      <section class="container container-fluid nopadding">
        <div class="row ri-spotlights__list">
            <?php if (have_rows('spotlights')) : while (have_rows('spotlights')) : the_row();
             $gImage = get_sub_field('g_image');
             $gTitle = get_sub_field('g_title');
             $gLink = get_sub_field('g_link');
             $alt = $gImage['alt'];
             ?>
             <div class="col-lg-4 col-sm-12">
              <div class="thumb-wrap">
                  <a href="<?php echo $gLink ?>" style="background-image:url(<?php echo $gImage['url'] ?>); background-repeat: no-repeat;background-size: cover;">
                    <h3><?php echo $gTitle ?></h3>
                </a>
            </div>
        </div>
    <?php endwhile; endif; ?>
</div>
</section>
<?php endif; ?>

<?php if (get_row_layout() == "narrow_content"): ?>
    <section class="container sm-width">
      <?php the_sub_field('content_narrow'); ?>
  </section>
<?php endif; ?>

<?php if (get_row_layout() == "bio_block"): ?>
    <?php 
    $bio_content = get_sub_field('content');
    $bio_image = get_sub_field('image')['url'];
    ?>
    <section class="container container-fluid nopadding bio-home">
        <div class="row">
            <div class="col-lg-7 col-sm-12 nopadding-left"><img src="<?php echo $bio_image ?>" alt=""></div>
            <div class="col-lg-5 col-sm-12 content"><p><?php echo $bio_content ?></p></div>
      </div>
  </section>
<?php endif; ?>

<?php if (get_row_layout() == "slider_content"): ?>
    <!-- Slider -->
    <section class="ri-slider">
      <?php if (have_rows('slides')) : while (have_rows('slides')) : the_row();
       $slide = get_sub_field('slide');
       ?>
       <div style="position: relative;">
        <img src="<?php echo $slide['url']; ?>" alt="<?php echo $slide['alt']; ?>">
    </div>
<?php endwhile; endif; ?>
</section>
<?php endif; ?>
<?php if (get_row_layout() == "panels"): ?>
    <!-- Panels -->
    <section class="home-panels">
       <?php if (have_rows('home_panel')) : while (have_rows('home_panel')) : the_row();
         $pImage = get_sub_field('panel_image');
         $pContent = get_sub_field('panel_content');
         $pLink = get_sub_field('link');
         ?>
         <article class="home-panels__item">
           <aside class="home-panels-content" >
            <div class="home-panels-content__main container"><?php echo $pContent ?></div>
        </aside>
        <figure>
            <?php if($pLink) : ?>
              <a href="<?php echo $pLink ?>"><img src="<?php echo $pImage ?>" alt=""></a>
              <?php else : ?>
                  <img src="<?php echo $pImage ?>" alt="">
              <?php endif; ?>
          </figure>

      </article>
  <?php endwhile; endif; ?>
</section>
<?php endif; ?>
<?php if (get_row_layout() == "call_to_action"): ?>
    <?php 
    $cta_color = get_sub_field('cta_color');
    $cta_content = get_sub_field('cta_content');
    $cta_tc = get_sub_field('cta_color_text');
    $cta_lc = get_sub_field('cta_color_link');
    ?>
    <!-- CTA -->
    <section class="home-cta" style="background-color:<?php echo $cta_color; ?>">
       <article class="container narrow">
        <div class="home-cta__main">
         <?php echo $cta_content; ?> 
     </div>
 </article>
 <?php if($cta_tc) : ?>
  <style>
    .home-cta__main {
      color: <?php echo $cta_tc; ?>
  }
  .home-cta__main a {
      color: <?php echo $cta_lc; ?>
  }
</style>
<?php endif; ?>
</section>
<?php endif; ?>
<?php endwhile; endif; ?>
<style>
    .absolute {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        color: white;
        font-size: 1.3rem;
        width: auto;
        margin: 0 auto;
        height: auto;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 1rem;
        z-index: 9999999;
        background: linear-gradient(#6a1953, purple);
        transition: .3s all;
        height: 0;
        opacity: 0;
    }
    .slick-slide.slick-active:not(.slick-current) .absolute,
    .slick-slide:not(.slick-active) .absolute {
        opacity: 0;
        visibility: hidden;
        transition: .3s all;
    }
</style>
</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();