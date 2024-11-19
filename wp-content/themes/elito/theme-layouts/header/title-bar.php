<?php
	// Metabox
	$elito_id    = ( isset( $post ) ) ? $post->ID : 0;
	$elito_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $elito_id;
	$elito_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $elito_id;
	$elito_meta  = get_post_meta( $elito_id, 'page_type_metabox', true );
	if ($elito_meta && is_page()) {
		$elito_title_bar_padding = $elito_meta['title_area_spacings'];
	} else { $elito_title_bar_padding = ''; }
	// Padding - Theme Options
	if ($elito_title_bar_padding && $elito_title_bar_padding !== 'padding-default') {
		$elito_title_top_spacings = $elito_meta['title_top_spacings'];
		$elito_title_bottom_spacings = $elito_meta['title_bottom_spacings'];
		if ($elito_title_bar_padding === 'padding-custom') {
			$elito_title_top_spacings = $elito_title_top_spacings ? 'padding-top:'. elito_check_px($elito_title_top_spacings) .';' : '';
			$elito_title_bottom_spacings = $elito_title_bottom_spacings ? 'padding-bottom:'. elito_check_px($elito_title_bottom_spacings) .';' : '';
			$elito_custom_padding = $elito_title_top_spacings . $elito_title_bottom_spacings;
		} else {
			$elito_custom_padding = '';
		}
	} else {
		$elito_title_bar_padding = cs_get_option('title_bar_padding');
		$elito_titlebar_top_padding = cs_get_option('titlebar_top_padding');
		$elito_titlebar_bottom_padding = cs_get_option('titlebar_bottom_padding');
		if ($elito_title_bar_padding === 'padding-custom') {
			$elito_titlebar_top_padding = $elito_titlebar_top_padding ? 'padding-top:'. elito_check_px($elito_titlebar_top_padding) .';' : '';
			$elito_titlebar_bottom_padding = $elito_titlebar_bottom_padding ? 'padding-bottom:'. elito_check_px($elito_titlebar_bottom_padding) .';' : '';
			$elito_custom_padding = $elito_titlebar_top_padding . $elito_titlebar_bottom_padding;
		} else {
			$elito_custom_padding = '';
		}
	}
	// Banner Type - Meta Box
	if ($elito_meta && is_page()) {
		$elito_banner_type = $elito_meta['banner_type'];
	} else { $elito_banner_type = ''; }
	// Header Style
	if ($elito_meta) {
	  $elito_header_design  = $elito_meta['select_header_design'];
	  $elito_hide_breadcrumbs  = $elito_meta['hide_breadcrumbs'];
	} else {
	  $elito_header_design  = cs_get_option('select_header_design');
	  $elito_hide_breadcrumbs = cs_get_option('need_breadcrumbs');
	}
	if ( $elito_header_design === 'default') {
	  $elito_header_design_actual  = cs_get_option('select_header_design');
	} else {
	  $elito_header_design_actual = ( $elito_header_design ) ? $elito_header_design : cs_get_option('select_header_design');
	}
	if ( $elito_header_design_actual == 'style_two') {
		$overly_class = ' overly';
	} else {
		$overly_class = ' ';
	}
	// Overlay Color - Theme Options
		if ($elito_meta && is_page()) {
			$elito_bg_overlay_color = $elito_meta['titlebar_bg_overlay_color'];
			$title_color = isset($elito_meta['title_color']) ? $elito_meta['title_color'] : '';
		} else { $elito_bg_overlay_color = ''; }
		if (!empty($elito_bg_overlay_color)) {
			$elito_bg_overlay_color = $elito_bg_overlay_color;
			$title_color = $title_color;
		} else {
			$elito_bg_overlay_color = cs_get_option('titlebar_bg_overlay_color');
			$title_color = cs_get_option('title_color');
		}
		$e_uniqid        = uniqid();
		$inline_style  = '';
		if ( $elito_bg_overlay_color ) {
		 $inline_style .= '.wpo-page-title-'.$e_uniqid .'.wpo-page-title {';
		 $inline_style .= ( $elito_bg_overlay_color ) ? 'background-color:'. $elito_bg_overlay_color.';' : '';
		 $inline_style .= '}';
		}
		if ( $title_color ) {
		 $inline_style .= '.wpo-page-title-'.$e_uniqid .'.wpo-page-title h2, .page-title-'.$e_uniqid .'.wpo-page-title .breadcrumb li, .wpo-page-title-'.$e_uniqid .'.wpo-page-title .breadcrumbs ul li a {';
		 $inline_style .= ( $title_color ) ? 'color:'. $title_color.';' : '';
		 $inline_style .= '}';
		}
		// add inline style
		elito_add_inline_style( $inline_style );
		$styled_class  = ' page-title-'.$e_uniqid;
	// Background - Type
	if( $elito_meta ) {
		$title_bar_bg = $elito_meta['title_area_bg'];
	} else {
		$title_bar_bg = '';
	}
	$elito_custom_header = get_custom_header();
	$header_text_color = get_theme_mod( 'header_textcolor' );
	$background_color = get_theme_mod( 'background_color' );
	if( isset( $title_bar_bg['image'] ) && ( $title_bar_bg['image'] ||  $title_bar_bg['color'] ) ) {
	  extract( $title_bar_bg );
	  $elito_background_image       = ( ! empty( $image ) ) ? 'background-image: url(' . esc_url($image) . ');' : '';
	  $elito_background_repeat      = ( ! empty( $image ) && ! empty( $repeat ) ) ? ' background-repeat: ' . esc_attr( $repeat) . ';' : '';
	  $elito_background_position    = ( ! empty( $image ) && ! empty( $position ) ) ? ' background-position: ' . esc_attr($position) . ';' : '';
	  $elito_background_size    = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-size: ' . esc_attr($size) . ';' : '';
	  $elito_background_attachment    = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-attachment: ' . esc_attr( $attachment ) . ';' : '';
	  $elito_background_color       = ( ! empty( $color ) ) ? ' background-color: ' . esc_attr( $color ) . ';' : '';
	  $elito_background_style       = ( ! empty( $image ) ) ? $elito_background_image . $elito_background_repeat . $elito_background_position . $elito_background_size . $elito_background_attachment : '';
	  $elito_title_bg = ( ! empty( $elito_background_style ) || ! empty( $elito_background_color ) ) ? $elito_background_style . $elito_background_color : '';
	} elseif( $elito_custom_header->url ) {
		$elito_title_bg = 'background-image:  url('. esc_url( $elito_custom_header->url ) .');';
	} else {
		$elito_title_bg = '';
	}
	if($elito_banner_type === 'hide-title-area') { // Hide Title Area
	} elseif($elito_meta && $elito_banner_type === 'revolution-slider') { // Hide Title Area
		echo do_shortcode($elito_meta['page_revslider']);
	} else {
	?>
	<section class="wpo-page-title <?php echo esc_attr( $overly_class.$styled_class.' '.$elito_banner_type ); ?>"  style="<?php echo esc_attr( $elito_title_bg.''.$elito_custom_padding ); ?>">
	  <div class="container">
	      <div class="row">
	          <div class="col wpo-breadcumb-wrap col-xs-12">
                <div class="page-title">
                	<h2><?php echo elito_title_area(); ?></h2>
                </div>
	              <?php if ( !$elito_hide_breadcrumbs && function_exists( 'breadcrumb_trail' )) { breadcrumb_trail();  } ?>
	          </div>
	      </div> <!-- end row -->
	  </div> <!-- end container -->
	</section>
  <!-- end page-title -->
<?php } ?>