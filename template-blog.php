<?php /* Template Name: Blog */ ?>

<?php get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main" style="padding-bottom: 5rem;">

    <section class="container-fluid blog-main">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Rife Photography Blog</h1>
            </div>
        </div>

        <div class="row grid rife-posts">
            <?php rife_load_posts(); ?>
        </div>
        <button id="more_posts" class="more-btn">More</button>

    </section>

</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();