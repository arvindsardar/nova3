<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package nova3
 */

get_header();
?>

	<section id="primary" class="content-area col">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'nova3' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

						<?php if ( 'post' === get_post_type() ) : ?>
						<small class="entry-meta">
							<?php
							nova3_posted_on();
							nova3_posted_by();
							?>
						</small><!-- .entry-meta -->
						<?php endif; ?>
					</header><!-- .entry-header -->

					<?php nova3_post_thumbnail(); ?>

					<div class="entry-summary">
						<?php the_excerpt(); ?>
					</div><!-- .entry-summary -->

					<footer class="entry-footer">
						<small><?php nova3_entry_footer(); ?></small>
					</footer><!-- .entry-footer -->
				</article><!-- #post-<?php the_ID(); ?> -->
				<hr>
<?php
			endwhile;

			the_posts_navigation();

		else : ?>

			<section class="no-results not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'nova3' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
						<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'nova3' ); ?></p>
						<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</section><!-- .no-results -->


		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
