<?php
/*
 * The header for our theme.
 * Author & Copyright:wpoceans
 * URL: http://themeforest.net/user/wpoceans
 */
?><!DOCTYPE html>
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php
$elito_viewport = cs_get_option( 'theme_responsive' );
if( !$elito_viewport ) { ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php } $elito_all_element_color  = cs_get_customize_option( 'all_element_colors' ); ?>
<meta name="msapplication-TileColor" content="<?php echo esc_attr( $elito_all_element_color ); ?>">
<meta name="theme-color" content="<?php echo esc_attr( $elito_all_element_color ); ?>">
<link rel="profile" href="//gmpg.org/xfn/11">
<?php
  // Metabox
  global $post;
  $elito_id    = ( isset( $post ) ) ? $post->ID : false;
  $elito_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $elito_id;
  $elito_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $elito_id;
  $elito_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $elito_id : false;
  $elito_meta  = get_post_meta( $elito_id, 'page_type_metabox', true );
  // Theme Layout Width
  $elito_layout_width  = cs_get_option( 'theme_layout_width' );
  $theme_preloder  = cs_get_option( 'theme_preloder' );
  $elito_layout_width_class = ( $elito_layout_width === 'container' ) ? 'layout-boxed' : 'layout-full';
  // Header Style
  if ( $elito_meta ) {
    $elito_header_design  = $elito_meta['select_header_design'];
  } else {
    $elito_header_design  = cs_get_option( 'select_header_design' );
  }

  $elito_sticky_header  = cs_get_option( 'sticky_header' );

  if ( $elito_header_design === 'default' ) {
    $elito_header_design_actual  = cs_get_option( 'select_header_design' );
  } else {
    $elito_header_design_actual = ( $elito_header_design ) ? $elito_header_design : cs_get_option('select_header_design');
  }

  $elito_header_design_actual = $elito_header_design_actual ? $elito_header_design_actual : 'style_two';

  if ( $elito_header_design_actual == 'style_one' ) {
    $header_class = 'wpo-header-style-1';
  } else {
    $header_class = 'wpo-header-style-2';
  }

  if ( has_nav_menu( 'primary' ) ) {
     $has_menu = ' has-menu ';
  } else {
     $has_menu = ' dont-has-menu ';
  }

  // Box Style
  $elito_box_style = isset( $elito_meta['box_style'] ) ? $elito_meta['box_style'] : '' ;
  if ( $elito_box_style ) {
    $box_class = ' wpo-box-style';
  } else {
    $box_class = ' box-style-none';
  }

  if ( $elito_sticky_header ) {
    $elito_sticky_header = $elito_sticky_header ? ' sticky-menu-on ' : '';
  } else {
    $elito_sticky_header = '';
  }
  // Header Transparent
  if ( $elito_meta ) {
    $elito_transparent_header = $elito_meta['transparency_header'];
    $elito_transparent_header = $elito_transparent_header ? ' header-transparent' : ' dont-transparent';
    // Shortcode Banner Type
    $elito_banner_type = ' '. $elito_meta['banner_type'];
  } else { $elito_transparent_header = ' dont-transparent'; $elito_banner_type = ''; }
  wp_head();
  ?>
  </head>
  <body <?php body_class(); ?>>
     <?php wp_body_open(); ?>
  <div class="page-wrapper <?php echo esc_attr( $elito_layout_width_class.$box_class ); ?>"> 
  <!-- #elito-theme-wrapper -->
  <?php if( $theme_preloder ) {
   get_template_part( 'theme-layouts/header/preloder' );
   } ?>
  <header id="header" class="<?php echo esc_attr( $header_class ); ?>">
    <div class="wpo-site-header">
      <?php  get_template_part( 'theme-layouts/header/top','bar' ); ?>
      <nav id="site-navigation" class="navigation navbar navbar-expand-lg navbar-light <?php echo esc_attr( $elito_sticky_header.$has_menu ); ?>">
        <?php get_template_part( 'theme-layouts/header/menu','bar' ); ?>
      </nav>
    </div>
  </header>
  <?php
  // Title Area
  $elito_need_title_bar = cs_get_option('need_title_bar');
  if ( !$elito_need_title_bar ) {
    get_template_part( 'theme-layouts/header/title', 'bar' );
  }