<?php
// Metabox
global $post;
$elito_id    = ( isset( $post ) ) ? $post->ID : false;
$elito_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $elito_id;
$elito_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $elito_id;
$elito_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $elito_id : false;
$elito_meta  = get_post_meta( $elito_id, 'page_type_metabox', true );
  if ($elito_meta) {
    $elito_topbar_options = $elito_meta['topbar_options'];
  } else {
    $elito_topbar_options = '';
  }

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
  
$elito_header_design_actual = $elito_header_design_actual ? $elito_header_design_actual : 'style_one';

// Define Theme Options and Metabox varials in right way!
if ($elito_meta) {
  if ($elito_topbar_options === 'custom' && $elito_topbar_options !== 'default') {
    $elito_top_left          = $elito_meta['top_left'];
    $elito_top_right          = $elito_meta['top_right'];
    $elito_hide_topbar        = $elito_topbar_options;
    $elito_topbar_bg          = $elito_meta['topbar_bg'];
    if ($elito_topbar_bg) {
      $elito_topbar_bg = 'background-color: '. $elito_topbar_bg .';';
    } else {$elito_topbar_bg = '';}
  } else {
    $elito_top_left          = cs_get_option('top_left');
    $elito_top_right          = cs_get_option('top_right');
    $elito_hide_topbar        = cs_get_option('top_bar');
    $elito_topbar_bg          = '';
  }
} else {
  // Theme Options fields
  $elito_top_left         = cs_get_option('top_left');
  $elito_top_right          = cs_get_option('top_right');
  $elito_hide_topbar        = cs_get_option('top_bar');
  $elito_topbar_bg          = '';
}
// All options
if ( $elito_meta && $elito_topbar_options === 'custom' && $elito_topbar_options !== 'default' ) {
  $elito_top_right = ( $elito_top_right ) ? $elito_meta['top_right'] : cs_get_option('top_right');
  $elito_top_left = ( $elito_top_left ) ? $elito_meta['top_left'] : cs_get_option('top_left');
} else {
  $elito_top_right = cs_get_option('top_right');
  $elito_top_left = cs_get_option('top_left');
}
if ( $elito_meta && $elito_topbar_options !== 'default' ) {
  if ( $elito_topbar_options === 'hide_topbar' ) {
    $elito_hide_topbar = 'hide';
  } else {
    $elito_hide_topbar = 'show';
  }
} else {
  $elito_hide_topbar_check = cs_get_option( 'top_bar' );
  if ( $elito_hide_topbar_check === true ) {
     $elito_hide_topbar = 'hide';
  } else {
     $elito_hide_topbar = 'show';
  }
}
if ( $elito_meta ) {
  $elito_topbar_bg = ( $elito_topbar_bg ) ? $elito_meta['topbar_bg'] : '';
} else {
  $elito_topbar_bg = '';
}
if ( $elito_topbar_bg ) {
  $elito_topbar_bg = 'background-color: '. $elito_topbar_bg .';';
} else { $elito_topbar_bg = ''; }

if( $elito_hide_topbar === 'show' && ( $elito_top_left || $elito_top_right ) ) {
?>
 <div class="topbar" style="<?php echo esc_attr( $elito_topbar_bg ); ?>">
    <div class="container-fluid">
        <div class="row">
            <div class="col col-lg-7 col-md-12 col-12">
               <?php echo do_shortcode( $elito_top_left ); ?>
            </div>
            <div class="col col-lg-5 col-md-12 col-12">
                <?php echo do_shortcode( $elito_top_right ); ?>
            </div>
        </div>
    </div>
</div> <!-- end topbar -->
<?php } // Hide Topbar - From Metabox