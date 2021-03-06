<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Rife
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<section class="error-404 not-found">
			<div class="container narrow" style="padding-top: 2rem;">
				<div class="row">
					<div class="col-lg-8">
						<header class="page-header">
							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'rife' ); ?></h1>
						</header><!-- .page-header -->

						<div class="page-content">
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'rife' ); ?></p>

							<form id="searchform" method="get" action="/index.php">
							<div>
							<input style="height: 2.1rem;width: 300px;" type="text" name="s" id="s" size="15" />
							<input style="background: #333;padding: .65rem 2rem;color:#FFFFFF;border: none;font-size: 1rem;margin-left: .5rem;" type="submit" value="Search" />
							</div>
							</form>

							<div style="padding-top: 1rem;">
							<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
							</div>
							
						</div><!-- .page-content -->
					</div>

					<div class="col-lg-4">
						<div class="widget widget_categories">
							<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'rife' ); ?></h2>
								<ul>
									<?php
									wp_list_categories( array(
										'orderby'    => 'count',
										'order'      => 'DESC',
										'show_count' => 1,
										'title_li'   => '',
										'number'     => 10,
									) );
									?>
								</ul>
							</div><!-- .widget -->

							<?php

							/* translators: %1$s: smiley */
							$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'rife' ), convert_smilies( ':)' ) ) . '</p>';
							the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );

							the_widget( 'WP_Widget_Tag_Cloud' );
							?>
					</div>


				</div>
			</div>
			
		</section><!-- .error-404 -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
