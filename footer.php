<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nova
 */

?>


<!-- above footer  -->
	<?php if ( is_active_sidebar( 'above_footer_widgets' ) ) { ?>
		<div id="above-footer-wrap" class="wrap-outer">
			<div class="wrap-inner container">
				<div class="row">
						<div id="above-footer" class="col"><?php dynamic_sidebar( 'above_footer_widgets' );?></div>
				</div><!-- #site-footer-wrap.row -->
			</div><!-- #above-footer-wrap.container -->
		</div><!-- #above-footer-wrap.wrapper -->
	<?php } ?>


	<footer id="site-footer-wrap" class="wrap-outer">
		<div class="wrap-inner container">
			<div class="row">
				<?php if ( is_active_sidebar( 'footer1_widgets' ) ) { ?>
					<div id="footer-1" class="widget-column col-md-6 col-lg"><?php dynamic_sidebar( 'footer1_widgets' );?></div>
				<?php } ?>
				<?php if ( is_active_sidebar( 'footer2_widgets' ) ) { ?>
					<div id="footer-2" class="widget-column col-md-6 col-lg"><?php dynamic_sidebar( 'footer2_widgets' );?></div>
				<?php } ?>
				<?php if ( is_active_sidebar( 'footer3_widgets' ) ) { ?>
					<div id="footer-3" class="widget-column col-md-6 col-lg"><?php dynamic_sidebar( 'footer3_widgets' );?></div>
				<?php } ?>
				<?php if ( is_active_sidebar( 'footer4_widgets' ) ) { ?>
					<div id="footer-4" class="widget-column col-md-6 col-lg"><?php dynamic_sidebar( 'footer4_widgets' );?></div>
				<?php } ?>
				<div id="site-info" class="col-12">
					<small>
					&copy; <?php echo date("Y") . ' ' . get_bloginfo();?>  | <a target="_blank" href="https://thecreativecollective.com.au">Website Design &amp; Development</a> by <a target="_blank" href="https://thecreativecollective.com.au">The Creative Collective</a>
					</small>
				</div><!-- .site-info -->
			</div><!-- #site-footer-wrap.row -->
		</div><!-- #site-footer-wrap.container -->
	</footer><!-- #site-footer-wrap.wrapper -->

<a id="back-to-top" href="#header-content-wrap"><span class="dashicons dashicons-arrow-up-alt"></span></a>

<?php wp_footer(); ?>

</body>
</html>
