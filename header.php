<?php
/**
 * The header for our theme
 * @package nova
 */

	//Theme Settings Page
	$sitename = get_bloginfo( 'name' );
	$sitelogo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
	$altlogo = get_theme_mod( 'nova_mobile_logo', '' );

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'nova' ); ?></a>

	<header id="zone__header">
		<!-- ------------ offscreen search ------------ -->
		<div id="sitesearch-wrapper">
			<form id="sitesearch" class="sitewidth" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ) ?>" >
				<label class="screen-reader-text" for="s">Search</label>
					<input class="searchinput" type="text" placeholder="Type & press enter..." value="<?php get_search_query(); ?>" name="s" id="s" />
					<span class="unsearch">X</span>
			</form>
		</div>

		<!-- ------------ offscreen sticky header ------------ -->
		<div id="fixed-header">
			<div class="container">
				<div class="row flexi-spaced flexi-middle">
					<?php if($altlogo){ ?>
						<a href="/"><img class="site-logo-small" src="<?php echo $altlogo; ?>"></a>
					<?php } else {
						echo '<div class="sitename"><a href="/">' . $sitename . '</a></div>';
					}
					?>
					<?php wp_nav_menu($args = array(
						'menu' => '2',
						'menu_id' => 'menu__sticky',
						'menu_class' => 'header-menu',
						'container' => 'nav',
						'container_class' => 'sticky-menu-container',
					)); ?>
				</div>
			</div>
		</div>

		<div id="site-header">

		<!-- ------------ offscreen mobile menu ------------ -->
		<?php wp_nav_menu( $args = array(
			'menu'=> '2',
			'menu_id' => 'id-menu--mobile',
			'menu_class' => 'offscreen-menu',
			'container' => 'nav',
			'container_class' => 'offscreen-menu-container',
		)); ?>


	<!-- ------------ above header v2 ------------ -->
			<div id="above-page-wrapper">
				<div id="above-page" class="sitewidth">
					<div class="nova-icons">
						<a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-square"></i></a>
						<a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
						<a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a>
						<a href="mailto:<?php echo bloginfo('admin_email'); ?>" target="_blank"><i class="far fa-envelope"></i></a>
						<a href="https://maps.google.com" target="_blank"><i class="fas fa-map-marker-alt"></i></a>
						<a href="/cart"><i class="fas fa-cart-plus"></i></a>
					</div>
				</div>
			</div>


			<div id="header-content-wrap" class="wrap-outer">

				<div class="wrap-inner sitewidth">

					<!-- ------------ logo ------------ -->
					<a href="/" class="site-logo">
						<img src="<?php echo esc_url( $sitelogo[0] ); ?>">
					</a>

					<!-- ------------ navigation ------------ -->
					<?php wp_nav_menu(array(
						'menu'=> '2',
						'menu_id' => 'id_menu__main',
						'menu_class' => 'header-menu menu-inline',
						'container_class' => 'header-menu-container',
						'fallback_cb' => false
					)); ?>

					<!-- ------------ search toggle ------------ -->
					<div class="search-toggle">
						<a class="nova-searchtoggle-button">
							<i class="fas fa-search"></i>
						</a>
					</div>

					<!-- ------------ hamburger button ------------ -->
					<div class="mobilemenu-button">
						<div class="bar bar1"></div>
						<div class="bar bar2"></div>
						<div class="bar bar3"></div>
					</div>

				</div><!-- wrap-inner -->
			</div><!-- wrap-outer -->

				</div>

		<?php do_action('nova_below_nav'); ?>

	</header>

