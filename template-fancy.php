<?php /* Template Name: Fancy Page */ ?>

<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">


      <?php if(get_field('fancy_widgets')) : while(has_sub_field('fancy_widgets')) : ?>

        <?php if(get_row_layout() == "content_block"): ?>
            <!-- Content Block -->
            <section class="container narrow ri-fancy__section">
                <?php the_sub_field('fancy_content'); ?>
            </section>
        <?php endif; ?>


        <?php if(get_row_layout() == "parallax_image"): ?>
            <section class="ri-scrolling parallax" style="background-image: url(<?php the_sub_field('fancy_image'); ?>);">
              <div class="parallax-content"></div>
          </section>

      <?php endif; ?>

      <?php if(get_row_layout() == "slider_block"): ?>
          <!-- Slider -->
          <section class="ri-slider">
              <?php if(have_rows('slides')) : while(have_rows('slides')) : the_row();
                $slide = get_sub_field('s_image');
                ?>
                <div>
                    <img src="<?php echo $slide['url']; ?>" alt="<?php echo $slide['alt']; ?>" height="500">
                </div>
            <?php endwhile; endif; ?>
        </section>
    <?php endif; ?>

    <?php if(get_row_layout() == "pricing_block"): ?>
        <!-- Pricing -->
        <section class="container pricing-blocks">
            <div class="row">
                <?php if (have_rows('pricing')) : while (have_rows('pricing')) : the_row();
                    $image = get_sub_field('image')['url'];
                    $title = get_sub_field('title');
                    $details = get_sub_field('details');
                    $cta = get_sub_field('cta');
                    $cta_link = get_sub_field('cta_link');
                ?>
                    <div class="col-lg-4">
                        <figure class="pricing-image">
                            <img src="<?php echo $image ?>">
                        </figure>
                        <header><h2><?php echo $title ?></h2></header>
                        <div class="pricing-details"><?php echo $details ?></div>
                        <a href="<?php echo $cta_link ?>" class="pricing-cta button"><?php echo $cta ?></a>
                    </div>

                <?php endwhile; endif; ?>
            </div>
        </section>

        <?php endif; ?>

    <?php  endwhile; endif; ?>


</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
