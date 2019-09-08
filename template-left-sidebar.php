<?php /* Template Name: Left Sidebar */ ?>

<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <section class="container narrow" style="padding-top: 2rem;">

            <div class="row">
                <article class="col-lg-4">
                    <?php the_field('left_sidebar'); ?>
                </article>

                <article class="col-lg-8">
                    <?php the_field('right_column'); ?>
                </article>

            </div>

        </section>


    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
