<?php
/*
 * All Back-End Helper Functions for Elito Theme
 * Author & Copyright:wpoceans
 * URL: http://themeforest.net/user/wpoceans
 */

/* Validate px entered in field */
if( ! function_exists( 'elito_check_px' ) ) {
  function elito_check_px( $num ) {
    return ( is_numeric( $num ) ) ? $num . 'px' : $num;
  }
}

/* Escape Strings */
if( ! function_exists( 'elito_esc_string' ) ) {
  function elito_esc_string( $num ) {
    return preg_replace('/\D/', '', $num);
  }
}

/* Escape Numbers */
if( ! function_exists( 'elito_esc_number' ) ) {
  function elito_esc_number( $num ) {
    return preg_replace('/[^a-zA-Z]/', '', $num);
  }
}


/* Inline Style */
global $elito_all_inline_styles;
$elito_all_inline_styles = array();
if( ! function_exists( 'elito_add_inline_style' ) ) {
  function elito_add_inline_style( $style ) {
    global $elito_all_inline_styles;
    array_push( $elito_all_inline_styles, $style );
  }
}


/**
 * TinyMCE Editor
 */

// Enable font size & font family selects in the editor
if ( ! function_exists( 'elito_tinymce_btns_font' ) ) {
  function elito_tinymce_btns_font( $buttons ) {
    array_unshift( $buttons, 'fontselect' ); // Add Font Select
    array_unshift( $buttons, 'fontsizeselect' ); // Add Font Size Select
    return $buttons;
  }
  add_filter( 'mce_buttons_2', 'elito_tinymce_btns_font' );
}

// Customize mce editor font sizes
if ( ! function_exists( 'elito_tinymce_sizes' ) ) {
  function elito_tinymce_sizes( $initArray ){
    $initArray['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 18px 21px 24px 28px 32px 36px";
    return $initArray;
  }
  add_filter( 'tiny_mce_before_init', 'elito_tinymce_sizes' );
}

// Customize mce editor font family
if ( ! function_exists( 'elito_tinmymce_family' ) ) {
  function elito_tinmymce_family( $initArray ) {
      $initArray['font_formats'] = 'Amiri=Amiri,serif;Montserrat=Montserrat,sans-serif;Andale Mono=andale mono,times;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats';
            return $initArray;
  }
  add_filter( 'tiny_mce_before_init', 'elito_tinmymce_family' );
}

/* HEX to RGB */
if( ! function_exists( 'elito_hex2rgb' ) ) {
  function elito_hex2rgb( $hexcolor, $opacity = 1 ) {

    if( preg_match( '/^#[a-fA-F0-9]{6}|#[a-fA-F0-9]{3}$/i', $hexcolor ) ) {

      $hex    = str_replace( '#', '', $hexcolor );

      if( strlen( $hex ) == 3 ) {
        $r    = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
        $g    = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
        $b    = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
      } else {
        $r    = hexdec( substr( $hex, 0, 2 ) );
        $g    = hexdec( substr( $hex, 2, 2 ) );
        $b    = hexdec( substr( $hex, 4, 2 ) );
      }

      return ( isset( $opacity ) && $opacity != 1 ) ? 'rgba('. $r .', '. $g .', '. $b .', '. $opacity .')' : ' ' . $hexcolor;

    } else {

      return $hexcolor;

    }

  }
}


if( ! function_exists( 'is_post_type' ) ) {
  function is_post_type($type){
    global $wp_query;
    if($type == get_post_type($wp_query->post->ID)) return true;
    return false;
  }
}

/**
 * If WooCommerce Plugin Activated
 */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
  function is_woocommerce_activated() {
    if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
  }
}

/**
 * If is WooCommerce Shop
 */
if ( ! function_exists( 'is_woocommerce_shop' ) ) {
  function is_woocommerce_shop() {
    if ( is_woocommerce_activated() && is_shop() ) { return true; } else { return false; }
  }
}

/**
 * If is WPML is active
 */
if ( ! function_exists( 'is_wpml_activated' ) ) {
  function is_wpml_activated() {
    if ( class_exists( 'SitePress' ) ) { return true; } else { return false; }
  }
}

/**
 * Remove Rev Slider Metabox
 */
if ( is_admin() ) {

  if( ! function_exists( 'elito_remove_rev_slider_meta_boxes' ) ) {
    function elito_remove_rev_slider_meta_boxes() {
      remove_meta_box( 'elito_metabox_revslider_0', 'page', 'normal' );
      remove_meta_box( 'elito_metabox_revslider_0', 'post', 'normal' );
      remove_meta_box( 'elito_metabox_revslider_0', 'service', 'normal' );
      remove_meta_box( 'elito_metabox_revslider_0', 'testimonial', 'normal' );
      remove_meta_box( 'elito_metabox_revslider_0', 'portfolio', 'normal' );
    }
    add_action( 'do_meta_boxes', 'elito_remove_rev_slider_meta_boxes' );
  }

}

function elito_project_add_icons_to_codestar_iconset() {

    $title  = esc_html__( 'Flat Icons', 'elito' );
    $icons  = array(
        'flaticon-coding',
        'flaticon-app-development',
        'flaticon-smartphone',
        'flaticon-vector',
        'flaticon-palette',
        'flaticon-add',
        'flaticon-social-media',
        'flaticon-promotion',
        'flaticon-email-marketing',
        'ti-facebook',
        'ti-twitter-alt',
        'ti-linkedin',
        'ti-pinterest',
        'ti-instagram',
        'ti-mobile',
        'ti-email',
        'ti-timer',
        'ti-location-pin',
    );

    echo '<h4 class="cs-icon-title">'. $title .'</h4>';
    foreach( $icons as $icon ) :
        echo '<a class="cs-icon-tooltip" data-cs-icon="'. esc_attr($icon) .'" data-title="'. esc_attr($icon) .'">';
            echo '<span class="cs-icon cs-selector"><i class="'. esc_attr($icon) .'"></i></span>';
        echo '</a>';
    endforeach;

}

add_action( 'cs_add_icons', 'elito_project_add_icons_to_codestar_iconset' );


function elito_kingcomposer_fonts() {
 if( function_exists( 'kc_add_icon' ) ) {
   kc_add_icon( get_template_directory_uri().'/assets/css/flaticon.css' );
   kc_add_icon( get_template_directory_uri().'/assets/css/themify-icons.css' );
 }
}
add_action('init', 'elito_kingcomposer_fonts');
