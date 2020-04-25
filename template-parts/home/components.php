<?php if (get_field('home_widgets')) : while (has_sub_field('home_widgets')) : ?>
    

    <?php if (get_row_layout() == "block_intro"): ?>
        <section class="container intro">
            <h2><?php the_sub_field('title'); ?></h2>
            <h3><?php the_sub_field('subtitle'); ?></h3>
        </section>
    <?php endif; ?>

    <?php if (get_row_layout() == "content_block"): ?>
        <section class="container">
            <?php the_sub_field('content'); ?>
        </section>
    <?php endif; ?>
    

    <?php if (get_row_layout() == "gallery"): ?>
    <!-- Gallery -->
        <section>
            <div class="row ri-spotlights__list no-gutters">
                <?php if (have_rows('spotlights')) : while (have_rows('spotlights')) : the_row();
                    $gImage = get_sub_field('g_image');
                    $gTitle = get_sub_field('g_title');
                    $gLink = get_sub_field('g_link');
                    $alt = $gImage['alt'];
                    ?>
                    <div class="col-lg-4 col-sm-12">
                        <div class="thumb-wrap" data-aos="fade-up">
                            <a href="<?php echo $gLink ?>" style="background-image:url(<?php echo $gImage['sizes']['large'] ?>); background-repeat: no-repeat;background-size: cover;">
                                <h3><?php echo $gTitle ?></h3>
                            </a>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
            </div>
        </section>
    <?php endif; ?>


    <?php if (get_row_layout() == "narrow_content"): ?>
    <!-- Narrow Content -->
        <section class="container sm-width">
            <?php the_sub_field('content_narrow'); ?>
        </section>
    <?php endif; ?>


    <?php if (get_row_layout() == "lr_image_text"): ?>
    <!-- Bio Block -->
        <?php 
            $caption = get_sub_field('caption');
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            $image = get_sub_field('image')['url'];
        ?>
        <section class="container-fluid nopadding lr_img_txt" data-aos="fade">
            <div class="row">
                <div class="col-lg-6 col-md-12 nopadding-left" style="background:url(<?php echo $image ?>)no-repeat;background-size: cover;"></div>
                <div class="col-lg-6 col-md-12">
                    <div class="content">
                        <h4><?php echo $caption ?></h4>
                        <h3><?php echo $title ?></h3>
                        <div><?php echo $text ?></div>
                    </div>
                </div>
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
                    <img src="<?php echo $slide['sizes']['large']; ?>" alt="<?php echo $slide['alt']; ?>">
                </div>
            <?php endwhile; endif; ?>
        </section>
    <?php endif; ?>


    <?php if (get_row_layout() == "panels"): ?>
    <!-- Panels -->
    <section class="container home-panels">
 <!--        <div class="row">
            <div class="col-lg-12"><h2 class="styled">Title that describes the section</h2></div>
        </div> -->

      <div class="row">
        <div class="col-lg-12">
          <?php if (have_rows('home_panel')) : while (have_rows('home_panel')) : the_row();
            $pImage = get_sub_field('panel_image');
            $pContent = get_sub_field('panel_content');
            $title = get_sub_field('title');
          ?>
          <article class="item">
            <aside class="content">
              <div class="main">
                <h2><?php echo $title ?></h2>
                <?php echo $pContent ?>
                </div>
            </aside>
          <figure>
            <img src="<?php echo $pImage ?>" alt="">
          </figure>
          </article>
      <?php endwhile; endif; ?>

        </div>
      </div>


           
        </section>
    <?php endif; ?>

    <?php if (get_row_layout() == "call_to_action"): ?>
        <!-- Call to Action -->
        <?php 
            $title1 = get_sub_field('title1');
            $text1 = get_sub_field('text1');
            $btn1 = get_sub_field('button');
            $btn1_link = get_sub_field('button_link');
            $title2 = get_sub_field('title2');
            $text2 = get_sub_field('text2');
            $btn2 = get_sub_field('button2');
            $btn2_link = get_sub_field('button_link2');
        ?>
        <section class="home-cta">
            <article class="container">
               <div class="row">
                   <div class="col-lg-12">
                        <div class="cta cta1">
                            <h3><?php echo $title1 ?></h3>
                            <p><?php echo $text1 ?></p>
                            <a target="_blank" href="<?php echo $btn1_link ?>" class="btn "><?php echo $btn1 ?></a>
                            <br><br>

                            <h3><?php echo $title2 ?></h3>
                            <p><?php echo $text2 ?></p>
                            <div> <a target="_blank" href="<?php echo $btn2_link ?>" class="btn"><?php echo $btn2 ?></a></div>

                        </div>
                   </div>
               </div>
            </article>
        </section>
    <?php endif; ?>
<?php endwhile; endif; ?>