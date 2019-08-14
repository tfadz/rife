<?php
/**
* The template for displaying all single posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package Rife
*/
get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class="container sm-width">
			<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', get_post_type() );
				//the_post_navigation();
				endwhile; // End of the loop.
			?>
		</div>
	
	<div class="related-posts">
		<?php
		$today = getdate();
		$related = get_posts( array( 
			'category__in' => wp_get_post_categories($post->ID), 
			'numberposts' => 2,
			'post_type' => 'post',
			'orderby' => 'rand',
			'post__not_in' => array($post->ID),
			'date_query' => array(
				array(
					'after' => $today[ 'month' ] . ' 1st, ' . ($today[ 'year' ] - 2)
				)
			)

		)
	);
		if( $related ) foreach( $related as $post ) {
			setup_postdata($post); ?>
			<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
			<ul> 
				<li>
					<a class="related-fi" href="<?php the_permalink() ?>" title="<?php the_title(); ?>" <?php if($url) : ?> style="background-image: url(<?php echo $url ?>);"
						<?php else : ?> style="background-image: url(<?php bloginfo('template_directory'); ?>/assets/images/no-image.jpg);"
						<?php endif ?>>
						<h4><?php the_title(); ?></h4>
						
					</a>
				</li>
			</ul>
			  
		<?php }

		wp_reset_postdata(); ?> 
	</div>
</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();