<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nova
 */

get_header(); ?>

<section id="zone__content">

	<main id="main-content" class="sitewidth">

		<?php while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class('post-content'); ?>>

			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header>

			<div class="entry-content">
				<?php the_content(); ?>
			</div>

		</article>

		<?php endwhile; ?>

		<?php get_sidebar(); ?>

	</main><!-- #main-content -->

</section><!-- content-zone -->

<?php get_footer(); ?>

