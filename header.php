<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Rife
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-37859368-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-37859368-1');
</script>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'rife' ); ?></a>

		<header id="riheader" class="site-header ri-header">
			<a class="site-branding ri-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php
					get_template_part('template-parts/logo');
				 ?>
			</a><!-- .site-branding -->

			<!-- Nav -->
		<div class="navbar rife-nav" role="navigation">

			<div class="navbar-header container" style="max-width: 900px;">
				<div class="row">
					<div class="col-lg-12">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar top-bar"></span>
							<span class="icon-bar middle-bar"></span>
							<span class="icon-bar bottom-bar"></span>
						</button>
					</div>
				</div>
			</div>

			<nav class="navbar-collapse collapse">
				<div class="container" style="max-width: 800px;">
					<div class="row navbar-row">
						<div class="col-lg-8 col-md-7 col-sm-12 navbar-col2">
							<h2>Menu</h2>
							<?php  /* menu */
							wp_nav_menu( array(
								'theme_location'  => 'menu-1',
							'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
							'container'       => 'div',
							// 'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'rife-nav-links',
							'menu_class'      => 'navbar-nav',
							'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
							'walker'          => new WP_Bootstrap_Navwalker(),
						) );
						?>
					</div>
					<div class="col-lg-4 col-md-5 col-sm-12 navbar-col1">
						<section class="navbar-posts">
							<h2>Latest Posts</h2>
							<?php
							$args = array(
								'post_type' => 'post',
								'posts_per_page' => '3',
								'orderby' => 'date',
								'order' => 'DESC',
								'paged' => $paged
							);

							$the_query = new WP_Query( $args );
							?>

							<?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<?php $thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>
								<article class="navbar-posts__post">
									<div class="thumb-wrap">
										<a class="tn-image" href="<?php the_permalink(); ?>" style="background-image: url(<?php echo $thumbnail_url ?>) ;"></a>
									</div>
									<h3><a href="<?php the_permalink(); ?>" class="name"><?php the_title(); ?></a></h3>
								</article>

							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
							<?php else: ?>
							<?php endif; ?>
						</section>

					</div>

				</div>
			</div>
		</nav>
	</div><!-- Navigation -->


		</header><!-- #masthead -->


	<div id="content" class="site-content">
