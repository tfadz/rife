<?php /* Template Name: Blog */ ?>

<?php get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main" style="padding-bottom: 5rem;">
    <section class="container-fluid blog-main nopadding">

      <div class="row">
        <div class="col-lg-12 text-center">
          <h1>Blog</h1>
        </div>
      </div>

      <div class="row no-gutters">
        <div class="col-lg-3 col-sm-12">
          <button class="filter-toggle">Filter</button>
          <button class="filter-close">X</button>
          <nav class="filter-holder">
            <?php echo do_shortcode( '[searchandfilter id="18740"] ' ); ?>
          </nav>
        </div>

        <div class="col-lg-9 col-sm-12">
          <div class="rife-posts">
            <?php
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $args = array(
              'post_type' => 'post',
              'posts_per_page' => 12,
              'order'   => 'DESC',
              'paged'   => $paged,
            );
            $args['search_filter_id'] = 18740;
            $query = new WP_Query($args);
            ?>

            <?php if ( $query->have_posts() ) : ?>
              <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <?php get_template_part( 'template-parts/card-post' ); ?>
              <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
          </div>

          <div class="blog-pagination">
            <?php
            $big = 999999999;

            echo paginate_links( array(
              'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
              'format' => '?page=%#%',
              'current' => max( 1, get_query_var('paged') ),
              'total' => $query->max_num_pages
            ) );
            ?>
          </div>

        </div>
      </div>

    </section>
  </main>
</div>

<?php
get_footer();