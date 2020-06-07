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
			<div class="container header-container">
				<div class="row">
					<div class="col-lg-2 secondary">
						<a class="site-branding ri-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php get_template_part('template-parts/logo'); ?>
						</a>
					</div>

					<div class="col-lg-10 primary">
						<div class="navbar rife-nav" role="navigation">
							<nav id="site-navigation" class="main-navigation">
								<?php
								wp_nav_menu( array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
								) );
								?>
							</nav>
						</div>
					</div>					
				</div>
			</div>
		</div>
	</header>

	<div id="content" class="site-content">
