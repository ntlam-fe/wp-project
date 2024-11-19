<?php
/*
 * The sidebar containing the main widget area.
 * Author & Copyright: wpoceans
 * URL: http://themeforest.net/user/wpoceans
 */
$elito_blog_widget = cs_get_option( 'blog_widget' );
$elito_single_blog_widget = cs_get_option( 'single_blog_widget' );
$elito_project_sidebar_position = cs_get_option( 'project_sidebar_position' );
$elito_project_widget = cs_get_option( 'single_project_widget' );
$elito_service_sidebar_position = cs_get_option( 'service_sidebar_position' );
$elito_service_widget = cs_get_option( 'single_service_widget' );
$elito_blog_sidebar_position = cs_get_option( 'blog_sidebar_position' );
$elito_sidebar_position = cs_get_option( 'single_sidebar_position' );
$woo_widget = cs_get_option('woo_widget');
$elito_page_layout_shop = cs_get_option( 'woo_sidebar_position' );
$shop_sidebar_position = ( is_woocommerce_shop() ) ? $elito_page_layout_shop : '';
if ( is_home() || is_archive() || is_search() ) {
	$elito_blog_sidebar_position = $elito_blog_sidebar_position;
} else {
	$elito_blog_sidebar_position = '';
}
if ( is_single() ) {
	$elito_sidebar_position = $elito_sidebar_position;
} else {
	$elito_sidebar_position = '';
}

if ( is_singular( 'project' ) ) {
	$elito_project_sidebar_position = $elito_project_sidebar_position;
} else {
	$elito_project_sidebar_position = '';
}

if ( is_singular( 'service' ) ) {
	$elito_service_sidebar_position = $elito_service_sidebar_position;
} else {
	$elito_service_sidebar_position = '';
}

if ( is_page() ) {
	// Page Layout Options
	$elito_page_layout = get_post_meta( get_the_ID(), 'page_layout_options', true );
	if ( $elito_page_layout ) {
		$elito_page_sidebar_pos = $elito_page_layout['page_layout'];
	} else {
		$elito_page_sidebar_pos = '';
	}
} else {
	$elito_page_sidebar_pos = '';
}
if (isset($_GET['sidebar'])) {
  $elito_blog_sidebar_position = $_GET['sidebar'];
}
// sidebar class
if ( $elito_sidebar_position === 'sidebar-left' || $elito_page_sidebar_pos == 'left-sidebar' || $elito_blog_sidebar_position === 'sidebar-left' ) {
	$col_class = ' order-lg-1 col-12';
} else {
	$col_class = '';
}

if ( $elito_project_sidebar_position === 'sidebar-left' ) {
	$atn_push_class = ' order-lg-1 col-12';
} else {
	$atn_push_class = '';
}
if ( $elito_service_sidebar_position === 'sidebar-left'  ) {
	$service_push_class = ' order-lg-1 col-12';
} else {
	$service_push_class = '';
}

if ( is_singular( 'project' ) ) {
	$custom_col = ' col-lg-4 col-md-8 ';
	$sidebar_class = 'project-sidebar';
}	elseif ( is_singular( 'service' ) ) {
	$custom_col = ' col-lg-4 col-md-8 ';
	$sidebar_class = 'service-sidebar blog-sidebar';
} else {
	$custom_col = '';
	$sidebar_class = 'blog-sidebar';
}

if (  $shop_sidebar_position == 'left-sidebar' ) {
	$shop_push_class = ' order-lg-1 col-12';
} else {
	$shop_push_class = '';
}

if (  class_exists( 'WooCommerce' ) && is_shop() ) {
	$shop_col = ' shop-sidebar col-lg-4 col-md-8';
} else {
	$shop_col = '';
}

?>
<div class="col-lg-4 <?php echo esc_attr( $col_class.$custom_col.$atn_push_class.$shop_col.$shop_push_class.$service_push_class ); ?>">
	<div class="<?php echo esc_attr( $sidebar_class ); ?>">
		<?php
		if (is_page() && isset( $elito_page_layout['page_sidebar_widget'] ) && !empty( $elito_page_layout['page_sidebar_widget'] ) ) {
			if ( is_active_sidebar( $elito_page_layout['page_sidebar_widget'] ) ) {
				dynamic_sidebar( $elito_page_layout['page_sidebar_widget'] );
			}
		} elseif (!is_page() && $elito_blog_widget && !$elito_single_blog_widget) {
			if ( is_active_sidebar( $elito_blog_widget ) ) {
				dynamic_sidebar( $elito_blog_widget );
			}
		} elseif ( $elito_project_widget && is_singular( 'project' ) ) {
			if ( is_active_sidebar( $elito_project_widget ) ) {
				dynamic_sidebar( $elito_project_widget );
			}
		}  elseif ( $elito_service_widget && is_singular( 'service' ) ) {
			if ( is_active_sidebar( $elito_service_widget ) ) {
				dynamic_sidebar( $elito_service_widget );
			}
		}  elseif (is_woocommerce_shop() && $woo_widget) {
			if (is_active_sidebar($woo_widget)) {
				dynamic_sidebar($woo_widget);
			}
		} elseif ( is_single() && $elito_single_blog_widget ) {
			if ( is_active_sidebar( $elito_single_blog_widget ) ) {
				dynamic_sidebar( $elito_single_blog_widget );
			}
		} else {
			if ( is_active_sidebar( 'sidebar-1' ) ) {
				dynamic_sidebar( 'sidebar-1' );
			}
		} ?>
	</div>
</div><!-- #secondary -->
