<?php
/**
 * the Snippets Plugin will contain most of this site's functions
 */

/* THEME DEFAULTS AND SUPPORT FOR VARIOUS FEATURES
------------------------------------------------------*/
	if ( ! function_exists( 'nova_setup' ) ) :
		function nova_setup() {
			add_theme_support( 'title-tag' ); //let WP manage the <title> head tag
			add_theme_support( 'editor-styles' ); //register gutenberg stylesheet
			add_theme_support( 'align-wide' );
			add_theme_support( 'customize-selective-refresh-widgets' ); //support for widget selective refresh
			add_theme_support( 'post-thumbnails' ); //Enable support for Post Thumbnails on posts and pages.
			add_theme_support( 'responsive-embeds' ); // Add support for responsive embeds.
			//add_editor_style( 'css/style-editor.css' ); //load gutenberg stylesheet
			add_theme_support( 'automatic-feed-links' );

			// ADD WOOCOMMERCE THEME SUPPORT
			add_theme_support( 'woocommerce' );
			add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider' );


			// Change markup for HTML5
			add_theme_support( 'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			) );

			// Support for core custom logo
			add_theme_support('custom-logo');
		}
	endif;
	add_action( 'after_setup_theme', 'nova_setup' );


/* SET CONTENT WIDTH
--------------------------------------------*/
	add_action( 'after_setup_theme', 'nova_content_width', 0 );
	function nova_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'nova_content_width', 1140 );
	}


/* CUSTOMIZER ADDITIONS
--------------------------------------------*/
	require get_template_directory() . '/inc/customizer.php';


/* ENQUEUE SCRIPTS & STYLES
--------------------------------------------*/
	//for cache busting
	define( 'MY_THEME_VERSION', wp_get_theme()->get( 'Version' ) );

	add_action( 'wp_enqueue_scripts', function(){

		// styles
		wp_enqueue_style( 'dashicons' );
		wp_enqueue_style( 'nova-bs4-grid', get_stylesheet_directory_uri()  . '/vendor/bootstrap-grid.min.css' );
		// wp_enqueue_style( 'nova-forms', get_stylesheet_directory_uri()  . '/css/forms.css', array(), MY_THEME_VERSION );
		wp_enqueue_style( 'nova-style', get_stylesheet_uri(), array(), MY_THEME_VERSION );

		// scripts
		wp_enqueue_script( 'nova_custom_js', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true );
		// wp_enqueue_script( 'jquery-ui-accordion' );
		// if ( is_singular() ) wp_enqueue_script( "comment-reply" );

		// slick slider
		// wp_enqueue_style( 'slick-slider-style', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css' );
		// wp_enqueue_style( 'slick-slider-theme', '//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css' );
		// wp_enqueue_script( 'slickslider-js', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', '', '1.8.1', true );

	}, 99 );

	// Wordpress Backend Stylesheet
	add_action( 'admin_enqueue_scripts', function(){
		wp_enqueue_style( 'tcc_admin_css', get_stylesheet_directory_uri()  . '/css/admin-styles.css', false, '1.0.0' );
	} );

	// Block Editor Stylesheet
	add_action( 'enqueue_block_editor_assets', function() {
		wp_enqueue_style( 'nova-editor-style', get_stylesheet_directory_uri() . "/css/block-editor.css", false, '1.0', 'all' );
		//wp_enqueue_script( 'nova-editor-script', get_stylesheet_directory_uri() . '/js/editor.js', array( 'wp-blocks', 'wp-dom' ), get_stylesheet_directory_uri() . '/js/editor.js' , true );
	} );



/* REGISTER WIDGET AREAS
--------------------------------------------*/
	add_action( 'widgets_init', 'nova_widgets_init' );
	function nova_widgets_init() {
		// MAIN SIDEBAR
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'nova' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'nova' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		// PAGE TOP ZONE
		register_sidebar( array(
			'name'          => esc_html__( 'Above Page Zone', 'nova' ),
			'id'            => 'above_page_widgets',
			'description'   => esc_html__( 'Widgets will appear at the top of the page', 'nova' ),
			'before_widget' => '<section id="%1$s" class="col-md widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		// ABOVE FOOTER ZONE
		register_sidebar( array(
			'name'          => esc_html__( 'Above Footer Zone', 'nova' ),
			'id'            => 'above_footer_widgets',
			'description'   => esc_html__( 'Widgets will appear above the footer', 'nova' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		// FOOTER ONE
		register_sidebar( array(
			'name'          => esc_html__( 'Footer 1', 'nova' ),
			'id'            => 'footer1_widgets',
			'description'   => esc_html__( 'First footer area', 'nova' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		// FOOTER TWO
		register_sidebar( array(
			'name'          => esc_html__( 'Footer 2', 'nova' ),
			'id'            => 'footer2_widgets',
			'description'   => esc_html__( 'Second footer area', 'nova' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		// FOOTER THREE
		register_sidebar( array(
			'name'          => esc_html__( 'Footer 3', 'nova' ),
			'id'            => 'footer3_widgets',
			'description'   => esc_html__( 'Third footer area', 'nova' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		// FOOTER FOUR
		register_sidebar( array(
			'name'          => esc_html__( 'Footer 4', 'nova' ),
			'id'            => 'footer4_widgets',
			'description'   => esc_html__( 'Fourth footer area', 'nova' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}

/* ADDITIONAL BODY CLASSES
--------------------------------------------*/
add_filter( 'body_class', 'nova_body_classes' );
function nova_body_classes( $classes ) {
	//add theme class
	$classes[] = 'nova';

	//add page slug class
	global $post;
	if ( isset( $post ) ) {
		$classes[] = 'page-' . $post->post_name;
	}

	//for blog page
	if ( is_home() || is_archive() ) {
		$classes[] = 'nova-archive';
	}

	//Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'nova-no-sidebar';
	}

	//Adds a class of not-front if it's an internal page
	if ( ! is_front_page() ) {
		$classes[] = 'nova-not-front';
	}

	return $classes;
}


/* Redirect /mockup to theme path
--------------------------------------------*/
	add_action('template_redirect', 'rudr_url_redirects');
	function rudr_url_redirects() {
		$TEMPLATE_PATH = get_template_directory_uri();
		$TEMPLATE_PATH = parse_url($TEMPLATE_PATH, PHP_URL_PATH);
		$newurl = $TEMPLATE_PATH . '/mockup/';
		/* in this array: old URLs=>new URLs  */
		$redirect_rules = array(
			array('old'=>'/mockup/','new'=>$newurl)
		);
		foreach( $redirect_rules as $rule ) :
			// if URL of request matches with the one from the array, then redirect
			if( urldecode($_SERVER['REQUEST_URI']) == $rule['old'] ) :
				wp_redirect( site_url( $rule['new'] ), 301 );
				exit();
			endif;
		endforeach;
	}


/* NUMBER PAGINATION FUNCTION
--------------------------------------------*/
function nova_pagination() {
	global $wp_query;
	$big = 9999999; // need an unlikely integer
	  echo paginate_links( array(
	   'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	   'format' => '?paged=%#%',
	   'current' => max( 1, get_query_var('paged') ),
	   'total' => $wp_query->max_num_pages) );
}


/* PERFORMANCE: ASYNC SCRIPTS
--------------------------------------------*/
	function defer_parsing_of_js( $url ) {
		if ( is_user_logged_in() ) return $url; //don't break WP Admin
		if ( FALSE === strpos( $url, '.js' ) ) return $url;
		if ( strpos( $url, 'jquery.js' ) ) return $url;
		return str_replace( ' src', ' defer src', $url );
	}
	// add_filter( 'script_loader_tag', 'defer_parsing_of_js', 10 );
	/* *
	 * this is a good thing to defer the script but jquery needs to be excluded
	 * */

