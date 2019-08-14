<?php /* Template Name: Right Sidebar */ ?>

<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <section class="container right-sidebar narrow">

            <div class="row" style="padding-top: 2rem;">
                <article class="col-lg-8 left-col">
                    <?php the_field('left_column'); ?>
                </article>

                <article class="col-lg-4 right-col">
                    <?php the_field('right_sidebar'); ?>
                </article>
            </div>

        </section>


</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
