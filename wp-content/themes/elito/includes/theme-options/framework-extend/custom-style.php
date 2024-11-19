<?php
/*
 * Codestar Framework - Custom Style
 * Author & Copyright:wpoceans
 * URL: http://themeforest.net/user/wpoceans
 */

/* All Dynamic CSS Styles */
if ( ! function_exists( 'elito_dynamic_styles' ) ) {
  function elito_dynamic_styles() {

    // Typography
    $elito_get_typography  = elito_get_typography();

    $all_element_color  = cs_get_customize_option( 'all_element_colors' );
    $all_element_bg_color  = cs_get_customize_option( 'all_element_bg_colors' );

    // Logo
    $elito_logo_top     = cs_get_option( 'elito_logo_top' );
    $elito_logo_bottom  = cs_get_option( 'elito_logo_bottom' );

    // Layout
    $bg_type = cs_get_option('theme_layout_bg_type');
    $bg_pattern = cs_get_option('theme_layout_bg_pattern');
    $bg_image = cs_get_option('theme_layout_bg');

    // Footer
    $footer_bg_color  = cs_get_customize_option( 'footer_bg_color' );
    $footer_heading_color  = cs_get_customize_option( 'footer_heading_color' );
    $footer_text_color  = cs_get_customize_option( 'footer_text_color' );
    $footer_link_color  = cs_get_customize_option( 'footer_link_color' );
    $footer_link_hover_color  = cs_get_customize_option( 'footer_link_hover_color' );

  ob_start();

global $post;
$elito_id    = ( isset( $post ) ) ? $post->ID : 0;
$elito_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $elito_id;
$elito_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $elito_id;
$elito_meta  = get_post_meta( $elito_id, 'page_type_metabox', true );

/* Layout - Theme Options - Background */
if ( $bg_type === 'bg-image' ) {

  $layout_boxed = ( ! empty( $bg_image['image'] ) ) ? 'background-image: url('. esc_url( $bg_image['image'] ) .');' : '';
  $layout_boxed .= ( ! empty( $bg_image['repeat'] ) ) ? 'background-repeat: '. esc_attr( $bg_image['repeat'] ) .';' : '';
  $layout_boxed .= ( ! empty( $bg_image['position'] ) ) ? 'background-position: '. esc_attr( $bg_image['position'] ) .';' : '';
  $layout_boxed .= ( ! empty( $bg_image['attachment'] ) ) ? 'background-attachment: '. esc_attr( $bg_image['attachment'] ) .';' : '';
  $layout_boxed .= ( ! empty( $bg_image['size'] ) ) ? 'background-size: '. esc_attr( $bg_image['size'] ) .';' : '';
  $layout_boxed .= ( ! empty( $bg_image['color'] ) ) ? 'background-color: '. esc_attr( $bg_image['color']  ).';' : '';
?>
  .layout-boxed {
    <?php echo wp_kses_data(  $layout_boxed ); ?>
  }
<?php
}
if ($bg_type === 'bg-pattern') {
$custom_bg_pattern = cs_get_option('custom_bg_pattern');
$layout_boxed = ( $bg_pattern === 'custom-pattern' ) ? 'background-image: url('. esc_url($custom_bg_pattern) .');' : 'background-image: url('. esc_url(ELITO_IMAGES) . '/patterns/'. $bg_pattern .'.png);';
?>
  .layout-boxed {
    <?php echo   wp_kses_data( $layout_boxed ); ?>
  }
<?php
}

/* Preloader  - Background */
$preloader_bg_color  = cs_get_customize_option( 'preloader_bg_colors' );
if ($preloader_bg_color) {?>
  .preloader {
    background-color: <?php echo esc_attr( $preloader_bg_color ); ?>;
  }
<?php
}

/* Top Bar - Customizer - Background */
$topbar_bg_color  = cs_get_customize_option( 'topbar_bg_color' );
if ($topbar_bg_color) {?>
  .wpo-site-header .topbar {
    background-color: <?php echo esc_attr( $topbar_bg_color ); ?>;
  }
<?php
}

$topbar_text_color  = cs_get_customize_option( 'topbar_text_color' );
if ($topbar_text_color) {?>
  .wpo-site-header .topbar ul li,
  .wpo-site-header .topbar ul li a,
  .wpo-site-header .topbar p {
    color: <?php echo esc_attr($topbar_text_color); ?>
  }
<?php
}
$topbar_icon_color  = cs_get_customize_option( 'topbar_icon_color' );
if ( $topbar_icon_color ) { ?>
 .topbar .contact-info ul li a i:before,
 .wpo-site-header .topbar .social ul li a i:before {
    color: <?php echo  esc_attr($topbar_icon_color); ?>;
  }
<?php
}

/* Header - Customizer */
$menu_bg_color  = cs_get_customize_option( 'menu_bg_color' );
if ( $menu_bg_color ) {?>
  .header-style-1 .navigation-holder,
  .wpo-site-header .navigation {
    background-color: <?php echo  esc_attr( $menu_bg_color ); ?>;
  }
<?php
}
$menu_link_color  = cs_get_customize_option( 'menu_link_color' );
$menu_link_hover_color  = cs_get_customize_option( 'menu_link_hover_color' );
if($menu_link_color ) {?>
.wpo-header-style-1 #navbar > ul > li a,
.wpo-header-style-2 #navbar > ul > li a,
.wpo-header-style-3 #navbar > ul > li a {
    color: <?php echo  esc_attr( $menu_link_color ); ?>;
  }
  <?php
}
  if ($menu_link_hover_color) {
?>
  .wpo-site-header #navbar > ul li a:hover,
  .wpo-site-header #navbar > ul li a:focus {
    color: <?php echo  esc_attr( $menu_link_hover_color ); ?> ;
  }

  .wpo-site-header #navbar>ul>li.current-menu-item>a:before,
  .wpo-site-header #navbar>ul>li>a:before {
    background-color: <?php echo  esc_attr( $menu_link_hover_color ); ?> ;
  }
<?php
}
// Metabox - Header Transparent
if ($elito_meta) {
  $transparent_header = $elito_meta['transparency_header'];
  $transparent_menu_color = $elito_meta['transparent_menu_color'];
  $transparent_menu_hover = $elito_meta['transparent_menu_hover_color'];
} else {
  $transparent_header = '';
  $transparent_menu_color = '';
  $transparent_menu_hover = '';
}
if ($transparent_header) {?>

  .header-two .navigation .navbar-nav > li > a,
  .navigation .navbar-nav > li > a,
  .header-two #search-trigger-two i,
  .header-two #cart-trigger i{
    color: <?php echo  esc_attr( $transparent_menu_color ); ?>;
  }

  .header-two .navigation .navbar-nav > li > a:hover,
  .navigation .navbar-nav > li > a:hover,
  .navigation .navbar-nav > li.current_page_item > a,
  .navigation .navbar-nav > li.current-menu-parent > a{
    color: <?php echo  esc_attr( $transparent_menu_hover ); ?>;
  }
<?php
}

$submenu_bg_color  = cs_get_customize_option( 'submenu_bg_color' );
$submenu_bg_hover_color  = cs_get_customize_option( 'submenu_bg_hover_color' );
$submenu_link_color  = cs_get_customize_option( 'submenu_link_color' );
$submenu_link_hover_color  = cs_get_customize_option( 'submenu_link_hover_color' );
if ( $submenu_bg_color || $submenu_bg_hover_color ||  $submenu_link_color || $submenu_link_hover_color ) {?>
  .wpo-site-header #navbar > ul > li .sub-menu a {
    color: <?php echo  esc_attr( $submenu_link_color ); ?>;
  }
  .wpo-site-header #navbar>ul>li .sub-menu a:hover {
    color: <?php echo  esc_attr( $submenu_link_hover_color ); ?>;
  }
  .wpo-site-header #navbar > ul .sub-menu {
    background-color: <?php echo  esc_attr( $submenu_bg_color ); ?>;
  }
  .wpo-site-header #navbar > ul .sub-menu:hover {
    background-color: <?php echo  esc_attr( $submenu_bg_hover_color ); ?>;
  }
<?php
}

/* Header Menu Button- Customizer */
$menu_button_color  = cs_get_customize_option( 'menu_button_color' );
$menu_button_bg_color  = cs_get_customize_option( 'menu_button_bg_color' );
if ( $menu_button_color || $menu_button_bg_color ) {?>

  @media (max-width: 991px) {
    .wpo-site-header .mobail-menu button span {
      background-color: <?php echo  esc_attr( $menu_button_color ); ?>;
    }
    .wpo-site-header .mobail-menu button {
      background-color: <?php echo  esc_attr( $menu_button_bg_color ); ?>;
    }
  }
  
<?php
} 

/* Header - Responsive Customizer */
$menu_responsive_menu_bg_color  = cs_get_customize_option( 'menu_responsive_menu_bg_color' );
$menu_responsive_menu_color  = cs_get_customize_option( 'menu_responsive_menu_color' );
$menu_responsive_menu_hover_color  = cs_get_customize_option( 'menu_responsive_menu_hover_color' );
if ( $menu_responsive_menu_color || $menu_responsive_menu_bg_color || $menu_responsive_menu_hover_color ) {?>
  @media (max-width: 991px) {
    .wpo-site-header #navbar {
      background: <?php echo  esc_attr( $menu_responsive_menu_bg_color ); ?>;
    }
    .wpo-site-header #navbar>ul>li>a,
    .wpo-site-header #navbar>ul .menu-item-has-children>a {
       color: <?php echo  esc_attr( $menu_responsive_menu_color ); ?>;
    }
    .wpo-site-header #navbar>ul>li>a:hover,
    .wpo-site-header #navbar>ul .menu-item-has-children>a:hover {
       color: <?php echo  esc_attr( $menu_responsive_menu_hover_color ); ?>;
    }
  }
  
<?php
} 

/* Title Area - Theme Options - Background */
$title_heading_color  = cs_get_customize_option( 'titlebar_title_color' );
if ($title_heading_color) {?>
  .wpo-page-title .wpo-breadcumb-wrap h2 {
    color: <?php echo  esc_attr( $title_heading_color ); ?>;
  }
<?php
}

/* Title Area - Theme Options - Background */
$titlebar_bg_color  = cs_get_customize_option( 'titlebar_bg_color' );
if ( $titlebar_bg_color ) {?>
  .wpo-page-title:before {
    background: <?php echo  esc_attr( $titlebar_bg_color ); ?>;
  }
<?php
}

// Breadcrubms
$breadcrumbs_text_color  = cs_get_customize_option( 'breadcrumbs_text_color' );
$breadcrumbs_link_color  = cs_get_customize_option( 'breadcrumbs_link_color' );
$breadcrumbs_link_hover_color  = cs_get_customize_option( 'breadcrumbs_link_hover_color' );
if ($breadcrumbs_text_color) {?>

  .wpo-page-title .breadcrumb.trail-items li {
    color: <?php echo  esc_attr( $breadcrumbs_text_color ); ?>;
  }
<?php
}
if ($breadcrumbs_link_color) { ?>

  .wpo-page-title .breadcrumb.trail-items li a {
    color: <?php echo  esc_attr( $breadcrumbs_link_color ); ?>;
  }
<?php
}
if ($breadcrumbs_link_hover_color) {?>

  .wpo-page-title .breadcrumb.trail-items li a:hover {
    color: <?php echo  esc_attr( $breadcrumbs_link_hover_color ); ?>;
  }
<?php
}

/* Footer */
if ( $footer_bg_color ) {?>
  .wpo-site-footer ,
  .wpo-site-footer:before {background: <?php echo  esc_attr( $footer_bg_color ); ?>;}
<?php
}
if ( $footer_heading_color ) {?>
  .wpo-site-footer .widget-title h3,
  .wpo-site-footer .contact-widget .newsletter h4,
  .wpo-upper-footer .widget.recent-post-widget .widget-title {color: <?php echo  esc_attr( $footer_heading_color ); ?>;}
<?php
}
if ( $footer_text_color ) {?>
  .wpo-site-footer .about-widget p,
  .wpo-site-footer .address-widget p,
  .wpo-site-footer .contact-ft p,
  .wpo-site-footer .contact-widget ul li {color: <?php echo  esc_attr( $footer_text_color ); ?>;}
<?php
}
if ( $footer_link_color ) {?>
  footer a,
  .wpo-site-footer .contact-widget ul li,
  .wpo-site-footer .widget a,
  .wpo-site-footer ul li a,
  .wpo-site-footer .contact-ft ul li,
  .wpo-site-footer .link-widget ul li a,
  .wpo-site-footer .contact-widget li span,
  .wpo-site-footer .link-widget ul a,
  .wpo-site-footer .social-icons ul li a,
  .wpo-site-footer .recent-post-widget .post h4 a {color: <?php echo  esc_attr( $footer_link_color ); ?>;}
<?php
}
if ( $footer_link_hover_color ) {?>

  footer a:hover,
  footer a:hover,
  .wpo-site-footer .link-widget ul a:hover,
  .wpo-site-footer .widget a:hover,
  .wpo-site-footer .link-widget ul a:hover,
  .wpo-site-footer .recent-post-widget .post h4 a:hover {color: <?php echo  esc_attr( $footer_link_hover_color ); ?>;}
<?php
}

/* Copyright */
$copyright_text_color  = cs_get_customize_option( 'copyright_text_color' );
$copyright_link_color  = cs_get_customize_option( 'copyright_link_color' );
$copyright_link_hover_color  = cs_get_customize_option( 'copyright_link_hover_color' );
$copyright_bg_color  = cs_get_customize_option( 'copyright_bg_color' );
$copyright_border_color  = cs_get_customize_option( 'copyright_border_color' );
if ( $copyright_bg_color  ) { ?>
  .wpo-site-footer .wpo-lower-footer {
    background: <?php echo  esc_attr( $copyright_bg_color ); ?>;
  }
<?php
}
if ( $copyright_border_color ) {?>
  .wpo-site-footer .wpo-lower-footer {border-top: <?php echo  esc_attr( $copyright_border_color ); ?> 1px solid ;}
<?php
}
if ( $copyright_text_color ) {?>
  .page-wrapper .wpo-site-footer .wpo-lower-footer p {color: <?php echo  esc_attr( $copyright_text_color ); ?>;}
<?php
}
if ( $copyright_link_color ) {?>
  .wpo-site-footer .wpo-lower-footer p a {color: <?php echo  esc_attr( $copyright_link_color ); ?>;}
<?php
}
if ( $copyright_link_hover_color ) {?>
  .wpo-site-footer .wpo-lower-footer p a:hover {color: <?php echo  esc_attr( $copyright_link_hover_color ); ?>;}
<?php
}

/* Primary Colors */
if ( $all_element_color ) {?>
  .theme-btn, .view-cart-btn,
  .wpo-blog-section .wpo-blog-item .wpo-blog-content ul li:first-child:before ,
  .theme-btn-s3,
  .theme-btn-s4,
  .view-cart-btn,
  .wpo-site-header #navbar ul li a::before,
  .wpo-site-header .mini-cart .cart-count,
  .theme-btn:hover, 
  .view-cart-btn:hover, 
  .theme-btn:focus, 
  .view-cart-btn:focus, 
  .theme-btn:active, 
  .view-cart-btn:active,
  .theme-btn-s3:hover,
  .theme-btn-s3:focus,
  .theme-btn-s3:active,
  .theme-btn-s4:hover,
  .theme-btn-s4:focus,
  .theme-btn-s4:active,
  .back-to-top:hover,
  .wpo-hero-style-3 .slide-btns .theme-btn:hover, 
  .wpo-hero-style-3 .slide-btns .view-cart-btn:hover, 
  .wpo-hero-style-3 .slide-btns .view-cart-btn:hover,
  .wpo-team-section .wpo-team-wrap .wpo-team-item .wpo-team-text ul li a:hover,
  .wpo-site-header .mobail-menu button,
  .wpo-site-header #navbar > ul > li .sub-menu a:after,
  .education-area ul li:before,
  .blog-sidebar .search-widget form button,
  .blog-sidebar .widget h3::before,
  .coming-soon-section .wpo-coming-contact button,
  .wpo-shop-sidebar .search-widget form button,
  .rating-wrapper .theme-btn-s2,
  .wpo-shop-single-section .product-info .nav-tabs a::before,
  .cart-area .cart-wrap .action a:hover,
  .cart-area .submit-btn-area button:hover,
  .wpo-checkout-area .create-account button:hover,
  .cart-area .cart-wrap .action li.c-btn a,
  .wpo-blog-pg-section .entry-meta ul li + li:before,
  .wpo-event-section .wpo-event-wrap .wpo-event-item .wpo-event-text ul li a:before,
  .blog-sidebar .tag-widget ul li a:hover,
  .wpo-blog-single-section .comment-respond .form-submit input:hover,
  .wpo-blog-pg-section .format-gallery .owl-nav [class*=owl-]:hover,
  .pagination-wrapper .pg-pagination .active a, .pagination-wrapper .pg-pagination li a:hover,
  .wpo-shop-single-section .product-details .product-option .theme-btn:hover,
  .wpo-shop-single-section .product-details .product-option .view-cart-btn:hover, .wpo-shop-single-section .product-details .product-option .view-cart-btn:hover,
  .wpo-shop-single-section .product-details .product-option .product-row > div:last-child .theme-btn:hover,
  .wpo-shop-single-section .product-details .product-option .product-row > div:last-child .view-cart-btn:hover, .wpo-shop-single-section .product-details .product-option .product-row > div:last-child .view-cart-btn:hover,
  .wpo-shop-single-section .product-details .bootstrap-touchspin .input-group-btn-vertical .bootstrap-touchspin-up:hover, .wpo-shop-single-section .product-details .bootstrap-touchspin .input-group-btn-vertical .bootstrap-touchspin-down:hover,
  .wpo-product-section .wpo-product-wrap .wpo-product-item .wpo-product-img a:hover,
  .static-hero-s3 .wpo-event-item .wpo-event-text ul li a::before, .static-hero-s4 .wpo-event-item .wpo-event-text ul li a::before,
  .wpo-blog-single-section .entry-meta ul li + li:before,
  .wpo-testimonial-area .wpo-testimonial-wrap .testimonial-slider .owl-dots button.active,
  .back-to-top,
  .view-cart-btn:hover,
  .wpo-header-style-2 .navigation.sticky-on,
  .cta-fullwidth {background-color: <?php echo  esc_attr( $all_element_color ); ?>;}

  .view-cart-btn.s1,
  .wpo-section-title h2,
  .wpo-site-header .navbar-header .logo,
  .wpo-site-header #navbar ul li a:hover, .wpo-site-header #navbar ul li a:focus,
  .wpo-site-header .mini-checkout-price span,
  .static-hero .slide-title h2,
  .couple-section ul li a,
  .wpo-story-section .tab-area .nav-tabs .nav-item .nav-link.active,
  .wpo-story-section .tab-area .wpo-story-item .wpo-story-content .wpo-story-content-inner span,
  .wpo-event-section .wpo-event-wrap .wpo-event-item .wpo-event-text h2,
  .wpo-event-section .wpo-event-wrap .wpo-event-item .wpo-event-text ul li a,
  .wpo-blog-section .wpo-blog-item .wpo-blog-content ul li,
  .wpo-section-title h2,
  .wpo-site-header .navbar-header .logo,
  .wpo-site-header #navbar ul li a:hover, .wpo-site-header #navbar ul li a:focus,
  .wpo-site-header .mini-checkout-price span,
  .static-hero .slide-title h2,
  .couple-section ul li a,
  .wpo-story-section .tab-area .nav-tabs .nav-item .nav-link.active,
  .wpo-story-section .tab-area .wpo-story-item .wpo-story-content .wpo-story-content-inner span,
  .wpo-event-section .wpo-event-wrap .wpo-event-item .wpo-event-text h2,
  .wpo-event-section .wpo-event-wrap .wpo-event-item .wpo-event-text ul li a,
  .wpo-blog-section .wpo-blog-item .wpo-blog-content ul li a,
  .wpo-blog-section .wpo-blog-item .wpo-blog-content ul li a:hover,
  .wpo-blog-section .wpo-blog-item .wpo-blog-content h2 a:hover,
  .wpo-site-footer .about-widget .logo,
  .wpo-Service-section .wpo-Service-item .wpo-Service-text a,
  .wpo-about-section .wpo-about-section-wrapper .wpo-about-content .about-title h2,
  .wpo-testimonial-area .wpo-testimonial-wrap .wpo-testimonial-item .wpo-testimonial-content h2,
  .wpo-team-section .wpo-team-wrap .wpo-team-item .wpo-team-text span,
  .wpo-product-section .wpo-product-wrap .wpo-product-item .wpo-product-text span,
  .static-hero-s3 .wpo-event-item .wpo-event-text p, .static-hero-s4 .wpo-event-item .wpo-event-text p,
  .static-hero-s3 .wpo-event-item .wpo-event-text ul li a, .static-hero-s4 .wpo-event-item .wpo-event-text ul li a,
  .wpo-p-details-section .process-wrap .process-item .process-icon .fi:before,
  .wpo-shop-sidebar .widget_price_filter .filter-price button,
  .wpo-product-section .wpo-product-wrap .wpo-product-item .wpo-product-img a,
  .wpo-checkout-area .cout-order-area .oreder-item ul .o-bottom,
  .wpo-contact-pg-section .office-info .office-info-item .office-info-icon .icon .fi:before,
  .wpo-blog-pg-section .post a.read-more:hover,
  .wpo-shop-single-section .product-details .price,
  .wpo-blog-single-section .tag-share .tag a:hover, .wpo-blog-single-section .tag-share-s2 .tag a:hover,
  .wpo-blog-single-section .author-box .social-link a:hover,
  .wpo-blog-single-section .comments-area .comment-reply-link:hover,
  .wpo-blog-pg-section .format-video .video-holder .fi::before,
  .blog-sidebar .recent-post-widget .post h4 a:hover,
  .wpo-blog-single-section .post blockquote:before,
  .blog-sidebar .about-widget a:hover,
  .wpo-lower-footer .copyright,
  .wpo-blog-pg-section .format-gallery .owl-nav [class*="owl-"],
  .wpo-pricing-section .wpo-pricing-wrap .wpo-pricing-item .wpo-pricing-top .wpo-pricing-text h2, .wpo-pricing-section-s2 .wpo-pricing-wrap .wpo-pricing-item .wpo-pricing-top .wpo-pricing-text h2,
  .wpo-fun-fact-section .grid h3,
  .wpo-blog-pg-section .format-standard:before,
  .couple-section-s2 .couple-area .middle-couple-text h2,
  .couple-section-s3 .couple-area .middle-couple-text h2,
  .wpo-portfolio-section .grid .img-holder .hover-content h4 a:hover,
  .wpo-portfolio-section .grid .img-holder .hover-content h4 a:hover,
  .wpo-blog-pg-section .post h3 a:hover,
  .blog-sidebar .category-widget ul a:hover, .blog-sidebar .category-widget ul li:hover:before,
  .wpo-product-section .wpo-product-wrap .wpo-product-item .wpo-product-text h3 a:hover,
  .wpo-team-section .wpo-team-wrap .wpo-team-item .wpo-team-text h3 a:hover ,
  .primary-color {color: <?php echo  esc_attr( $all_element_color ); ?>;}

  .theme-btn:hover:after, 
  .view-cart-btn:hover:after,
  .theme-btn:focus:after, 
  .view-cart-btn:focus:after, 
  .theme-btn:active:after, 
  .view-cart-btn:active:after,
  .theme-btn-s3:hover:after,
  .theme-btn-s3:focus:after,
  .theme-btn-s3:active:after,
  .theme-btn-s4:hover:after,
  .theme-btn-s4:focus:after,
  .theme-btn-s4:active:after,
  .back-to-top,
  .wpo-product-section .wpo-product-wrap .wpo-product-item .wpo-product-img a,
  .wpo-checkout-area .s1.active-border .coupon-active label, .wpo-checkout-area .s3.coupon-2 .coupon-3 label,
  .wpo-checkout-area .s2 .coupon-3,
  .wpo-checkout-area .s2.coupon-2 .coupon-3 label,
  .cart-search-contact input:focus,
  .wpo-shop-sidebar .search-widget input:focus,
  .wp-link-pages > span {border-color: <?php echo  esc_attr( $all_element_color ); ?>;}

<?php
}


if ( $all_element_bg_color ) {?>
  .wpo-team-section .wpo-team-wrap .wpo-team-item .wpo-team-text ul li a,
  .blog-sidebar .category-widget ul a span,
  .wpo-checkout-area .coupon,
  .wpo-blog-pg-section .format-standard, .wpo-blog-pg-section .format-quote,
  .blog-sidebar .tag-widget ul li a,
  .blog-sidebar .about-widget,
  .wpo-blog-single-section .post blockquote,
  .couple-section .couple-area,
  .wpo-site-footer,
  .view-cart-btn.s1,
  .wpo-blog-single-section .tag-share .tag a,
  .blog-sidebar .search-widget input ,
  .pagination-wrapper .pg-pagination li a,
  .wpo-blog-single-section .comment-respond .form-submit input
  {background-color: <?php echo  esc_attr( $all_element_bg_color ); ?>;}
<?php
}
// Content Colors
$body_color  = cs_get_customize_option( 'body_color' );
if ( $body_color ) {?>
  .page-wrapper p,
  .wpo-blog-pg-section .entry-details p,
  .blog-single-section .entry-details p,
   body p {color: <?php echo  esc_attr( $body_color ); ?>;}
<?php
}
$body_links_color  = cs_get_customize_option( 'body_links_color' );
if ( $body_links_color ) {?>
   body a,
  .page-wraper a,
  .blog-single-section .post .meta a,
  .blog-single-section .tag-share .share a,
  .blog-single-section .tag-share .tag a,
  .blog-single-section .author-box .social-lnk a,
  .widget ul li a { color: <?php echo  esc_attr( $body_links_color ); ?>; }
<?php
}
$body_link_hover_color  = cs_get_customize_option( 'body_link_hover_color' );
if ($body_link_hover_color) {?>
   body a:hover,
  .page-wraper a:hover,
  .blog-single-section .post .meta a:hover,
  .blog-single-section .tag-share .share a:hover,
  .blog-single-section .tag-share .tag a:hover,
  .blog-single-section .author-box .social-lnk a:hover,
  .widget ul li a:hover  {color: <?php echo  esc_attr( $body_link_hover_color ); ?>;}
<?php
}
$sidebar_content_color  = cs_get_customize_option( 'sidebar_content_color' );
if ($sidebar_content_color) {?>
  .widget p,
  .widget_rss .rssSummary,
 .woocommerce .product-categories li a,
 .tagcloud a,
 .blog-sidebar ul li,
 .blog-sidebar ul li a,
 .blog-sidebar .popular-post-widget .post-title,
 .blog-sidebar .widget_archive ul a,
  blog-sidebar {color: <?php echo  esc_attr( $sidebar_content_color ); ?>;}
<?php
}

$sidebar_heading_color  = cs_get_customize_option( 'sidebar_heading_color' );
if ($sidebar_heading_color) { ?>
  .blog-sidebar .widget>h3 {
    color: <?php echo  esc_attr( $sidebar_heading_color ); ?>;
  }
<?php
}


// Heading Color
$content_heading_color  = cs_get_customize_option( 'content_heading_color' );
if ($content_heading_color) {?>
  .page-wrapper h1,
  .page-wrapper h2,
  .page-wrapper h3,
  .page-wrapper h4,
  .page-wrapper h5,
  .page-wrapper h6,
  body h1,
  body h2,
  body h3,
  body h4,
  body h5,
  body h6,
  .wpo-blog-pg-section .post h3 a,
  .wpo-blog-pg-section .post h2,
  .wpo-blog-pg-section .post h3,
  .wpo-blog-pg-section .post h4,
  .wpo-blog-pg-section .post h5,
  .wpo-blog-pg-section .post h6,
  .blog-single-section .post h2.post-title,
  .blog-single-section .post h2,
  .blog-single-section .post h3,
  .blog-single-section .post h4,
  .blog-single-section .post h5,
  .blog-single-section .post h6,
  .blog-single-section .more-posts .previous-post>a>span,
  .blog-single-section .comments-area .comments-meta h4,
  .blog-single-section .more-posts .next-post>a>span
    {color: <?php echo  esc_attr( $content_heading_color ); ?>;}
<?php
}

  echo   wp_kses_data( $elito_get_typography );
  $output = ob_get_clean();
  return $output;

  }

}

/**
 * Custom Font Family
 */
if ( ! function_exists( 'elito_custom_font_load' ) ) {
  function elito_custom_font_load() {

    $font_family       = cs_get_option( 'font_family' );

    ob_start();

    if( ! empty( $font_family ) ) {

      foreach ( $font_family as $font ) {
        echo '@font-face{';

        echo 'font-family: "'. $font['name'] .'";';

        if( empty( $font['css'] ) ) {
          echo 'font-style: normal;';
          echo 'font-weight: normal;';
        } else {
          echo wp_kses( $font['css'], 'post' );
        }

        echo ( ! empty( $font['ttf']  ) ) ? 'src: url('. $font['ttf'] .');' : '';
        echo ( ! empty( $font['eot']  ) ) ? 'src: url('. $font['eot'] .');' : '';
        echo ( ! empty( $font['woff'] ) ) ? 'src: url('. $font['woff'] .');' : '';
        echo ( ! empty( $font['otf']  ) ) ? 'src: url('. $font['otf'] .');' : '';

        echo '}';
      }

    }

    // Typography
    $output = ob_get_clean();
    return $output;
  }
}

/* Custom Styles */
if( ! function_exists( 'elito_custom_css' ) ) {
  function elito_custom_css() {
    wp_enqueue_style('elito-default-style', get_template_directory_uri() . '/style.css');
    $output  = elito_custom_font_load();
    $output .= elito_dynamic_styles();

    if( function_exists( 'elito_compress_css_lines' ) ) {
      $custom_css = elito_compress_css_lines( $output );
       wp_add_inline_style( 'elito-default-style', $custom_css );
    }
    elito_typography_fonts();
  }
  add_action( 'wp_enqueue_scripts', 'elito_custom_css' );
}

/* Custom JS */
if( ! function_exists( 'elito_custom_js' ) ) {
  function elito_custom_js() {
    $output = cs_get_option( 'theme_custom_js' );
    if ( $output ) {
      wp_add_inline_script( 'jquery-migrate', $output );
    }
  }
  add_action( 'wp_enqueue_scripts', 'elito_custom_js' );
}