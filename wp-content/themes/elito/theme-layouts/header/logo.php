<?php
// Metabox
global $post;
$elito_id    = ( isset( $post ) ) ? $post->ID : false;
$elito_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $elito_id;
$elito_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $elito_id;
$elito_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('service') ) ? $elito_id : false;
$elito_meta  = get_post_meta( $elito_id, 'page_type_metabox', true );
// Header Style
if ( $elito_meta ) {
  $elito_header_design  = $elito_meta['select_header_design'];
} else {
  $elito_header_design  = cs_get_option( 'select_header_design' );
}

if ( $elito_header_design === 'default' ) {
  $elito_header_design_actual  = cs_get_option( 'select_header_design' );
} else {
  $elito_header_design_actual = ( $elito_header_design ) ? $elito_header_design : cs_get_option('select_header_design');
}
$elito_header_design_actual = $elito_header_design_actual ? $elito_header_design_actual : 'style_four';

$elito_logo = cs_get_option( 'elito_logo' );
$elito_trlogo = cs_get_option( 'elito_trlogo' );

$logo_url = wp_get_attachment_url( $elito_logo );
$logo_alt = get_post_meta( $elito_logo, '_wp_attachment_image_alt', true );

$trlogo_url = wp_get_attachment_url( $elito_trlogo );
$trlogo_alt = get_post_meta( $elito_trlogo, '_wp_attachment_image_alt', true );

if ( $logo_url ) {
  $logo_url = $logo_url;
} else {
 $logo_url = ELITO_IMAGES.'/logo.svg';
}

if ( $trlogo_url ) {
  $trlogo_url = $trlogo_url;
} else {
 $trlogo_url = ELITO_IMAGES.'/tr-logo.svg';
}

if ( $elito_header_design_actual == 'style_two' ||  $elito_header_design_actual == 'style_three' ) {
  $elito_logo_url = $trlogo_url;
  $elito_logo_alt = $trlogo_alt;
} else {
  $elito_logo_url = $logo_url;
  $elito_logo_alt = $logo_alt;
}

if ( has_nav_menu( 'primary' ) ) {
  $logo_padding = ' has_menu ';
}
else {
   $logo_padding = ' dont_has_menu ';
}

// Logo Spacings
$elito_brand_max_width = cs_get_option( 'elito_logo_width' );
$elito_brand_logo_top = cs_get_option( 'elito_logo_top' );
$elito_brand_logo_bottom = cs_get_option( 'elito_logo_bottom' );
if ( $elito_brand_logo_top ) {
  $elito_brand_logo_top = 'padding-top:'. elito_check_px( $elito_brand_logo_top ) .';';
} else { $elito_brand_logo_top = ''; }
if ( $elito_brand_logo_bottom ) {
  $elito_brand_logo_bottom = 'padding-bottom:'. elito_check_px( $elito_brand_logo_bottom ) .';';
} else { $elito_brand_logo_bottom = ''; }
if ( $elito_brand_max_width ) {
  $elito_brand_max_width = 'max-width:'. elito_check_px( $elito_brand_max_width ) .';';
} else { $elito_brand_max_width = ''; }
?>
<div class="site-logo <?php echo esc_attr( $logo_padding ); ?>" style="<?php echo esc_attr( $elito_brand_logo_top ); echo esc_attr( $elito_brand_logo_bottom ); ?>">
   <?php if ( $elito_logo ) {
    ?>
      <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
       <img style="<?php echo esc_attr( $elito_brand_max_width ); ?>" src="<?php echo esc_url( $elito_logo_url ); ?>" alt=" <?php echo esc_attr( $elito_logo_alt ); ?>">
     </a>
   <?php } elseif( has_custom_logo() ) {
      the_custom_logo();
    } else {
    ?>
    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
       <img style="<?php echo esc_attr( $elito_brand_max_width ); ?>" src="<?php echo esc_url( $elito_logo_url ); ?>" alt="<?php echo esc_attr( get_bloginfo('name') ); ?>">
     </a>
   <?php
  } ?>
</div>