<?php
/*
 * All CSS and JS files are enqueued from this file
 * Author & Copyright:wpoceans
 * URL: http://themeforest.net/user/wpoceans
 */

/**
 * Enqueue Files for FrontEnd
 */

function elito_heading_google_font_url() {
    $font_url = '';
    if ( 'off' !== esc_html__( 'on', 'elito' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Inter:wght@300;400;500;600;700;800;900&display=swap' ), "//fonts.googleapis.com/css2" );
    }
     return str_replace( array("%3A","%40", "%3B", "%26", "%3D"), array(":", "@", ";", "&", "="), $font_url );
}

if ( ! function_exists( 'elito_scripts_styles' ) ) {
  function elito_scripts_styles() {

    // Styles
    wp_enqueue_style( 'themify-icons', ELITO_CSS .'/themify-icons.css', array(), '4.6.3', 'all' );
    wp_enqueue_style( 'flaticon', ELITO_CSS .'/flaticon.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'bootstrap', ELITO_CSS .'/bootstrap.min.css', array(), '5.0.1', 'all' );
    wp_enqueue_style( 'animate', ELITO_CSS .'/animate.css', array(), '3.5.1', 'all' );
    wp_enqueue_style( 'odometer', ELITO_CSS .'/odometer.css', array(), '0.4.8', 'all' );
    wp_enqueue_style( 'owl-carousel', ELITO_CSS .'/owl.carousel.css', array(), '2.3.4', 'all' );
    wp_enqueue_style( 'owl-theme', ELITO_CSS .'/owl.theme.css', array(), '2.0.0', 'all' );
    wp_enqueue_style( 'slick', ELITO_CSS .'/slick.css', array(), '1.6.0', 'all' );
    wp_enqueue_style( 'swiper', ELITO_CSS .'/swiper.min.css', array(), '4.0.7', 'all' );
    wp_enqueue_style( 'slick-theme', ELITO_CSS .'/slick-theme.css', array(), '1.6.0', 'all' );
    wp_enqueue_style( 'owl-transitions', ELITO_CSS .'/owl.transitions.css', array(), '2.0.0', 'all' );
    wp_enqueue_style( 'fancybox', ELITO_CSS .'/fancybox.css', array(), '2.0.0', 'all' );
    wp_enqueue_style( 'magnific-popup', ELITO_CSS .'/magnific-popup.css', array(), '2.0.0', 'all' );
    wp_enqueue_style( 'elito-style', ELITO_CSS .'/styles.css', array(), ELITO_VERSION, 'all' );
    wp_enqueue_style( 'element', ELITO_CSS .'/elements.css', array(), ELITO_VERSION, 'all' );
    if ( !function_exists('cs_framework_init') ) {
      wp_enqueue_style('elito-default-style', get_template_directory_uri() . '/style.css', array(),  ELITO_VERSION, 'all' );
    }
    wp_enqueue_style( 'elito-heading-google-fonts', esc_url( elito_heading_google_font_url() ), array(), ELITO_VERSION, 'all' );
    // Scripts
    wp_enqueue_script( 'bootstrap', ELITO_SCRIPTS . '/bootstrap.min.js', array( 'jquery' ), '5.0.1', true );
    wp_enqueue_script( 'imagesloaded');
    wp_enqueue_script( 'isotope', ELITO_SCRIPTS . '/isotope.min.js', array( 'jquery' ), '2.2.2', true );
    wp_enqueue_script( 'countdown', ELITO_SCRIPTS . '/countdown.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'fancybox', ELITO_SCRIPTS . '/fancybox.min.js', array( 'jquery' ), '2.1.5', true );
    wp_enqueue_script( 'instafeed', ELITO_SCRIPTS . '/instafeed.min.js', array( 'jquery' ), '2.1.5', true );
    wp_enqueue_script( 'circle-progress', ELITO_SCRIPTS . '/circle-progress.min.js', array( 'jquery' ), '2.1.5', true );
    wp_enqueue_script( 'masonry');
    wp_enqueue_script( 'owl-carousel', ELITO_SCRIPTS . '/owl-carousel.js', array( 'jquery' ), '2.3.4', true );
    wp_enqueue_script( 'jquery-easing', ELITO_SCRIPTS . '/jquery-easing.js', array( 'jquery' ), '1.4.0', true );
    wp_enqueue_script( 'wow', ELITO_SCRIPTS . '/wow.min.js', array( 'jquery' ), '1.4.0', true );
    wp_enqueue_script( 'odometer', ELITO_SCRIPTS . '/odometer.min.js', array( 'jquery' ), '0.4.8', true );
    wp_enqueue_script( 'magnific-popup', ELITO_SCRIPTS . '/magnific-popup.js', array( 'jquery' ), '1.1.0', true );
    wp_enqueue_script( 'slick-slider', ELITO_SCRIPTS . '/slick-slider.js', array( 'jquery' ), '1.6.0', true );
    wp_enqueue_script( 'swiper', ELITO_SCRIPTS . '/swiper.min.js', array( 'jquery' ), '4.0.7', true );
    wp_enqueue_script( 'wc-quantity-increment', ELITO_SCRIPTS . '/wc-quantity-increment.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'elito-scripts', ELITO_SCRIPTS . '/scripts.js', array( 'jquery' ), ELITO_VERSION, true );
    // Comments
    wp_enqueue_script( 'elito-inline-validate', ELITO_SCRIPTS . '/jquery.validate.min.js', array( 'jquery' ), '1.9.0', true );
    wp_add_inline_script( 'elito-validate', 'jQuery(document).ready(function($) {$("#commentform").validate({rules: {author: {required: true,minlength: 2},email: {required: true,email: true},comment: {required: true,minlength: 10}}});});' );

    // Responsive Active
    $elito_viewport = cs_get_option('theme_responsive');
    if( !$elito_viewport ) {
      wp_enqueue_style( 'elito-responsive', ELITO_CSS .'/responsive.css', array(), ELITO_VERSION, 'all' );
    }

    // Adds support for pages with threaded comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }

  }
  add_action( 'wp_enqueue_scripts', 'elito_scripts_styles' );
}

/**
 * Enqueue Files for BackEnd
 */
if ( ! function_exists( 'elito_admin_scripts_styles' ) ) {
  function elito_admin_scripts_styles() {

    wp_enqueue_style( 'elito-admin-main', ELITO_CSS . '/admin-styles.css', true );
    wp_enqueue_style( 'flaticon', ELITO_CSS . '/flaticon.css', true );
    wp_enqueue_style( 'themify-icons', ELITO_CSS . '/themify-icons.css', true );
    wp_enqueue_script( 'elito-admin-scripts', ELITO_SCRIPTS . '/admin-scripts.js', true );

  }
  add_action( 'admin_enqueue_scripts', 'elito_admin_scripts_styles' );
}
