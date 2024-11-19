<?php
/*
 * The template for displaying all pages.
 * Author & Copyright: wpoceans
 * URL: http://themeforest.net/user/wpoceans
 */
$elito_id    = ( isset( $post ) ) ? $post->ID : 0;
$elito_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $elito_id;
$elito_meta  = get_post_meta( $elito_id, 'page_type_metabox', true );
if ( $elito_meta ) {
	$elito_content_padding = $elito_meta['content_spacings'];
} else { $elito_content_padding = 'section-padding'; }
// Top and Bottom Padding
if ( $elito_content_padding && $elito_content_padding !== 'padding-default' ) {
	$elito_content_top_spacings = isset( $elito_meta['content_top_spacings'] ) ? $elito_meta['content_top_spacings'] : '';
	$elito_content_bottom_spacings = isset( $elito_meta['content_bottom_spacings'] ) ? $elito_meta['content_bottom_spacings'] : '';
	if ( $elito_content_padding === 'padding-custom' ) {
		$elito_content_top_spacings = $elito_content_top_spacings ? 'padding-top:'. elito_check_px( $elito_content_top_spacings ) .';' : '';
		$elito_content_bottom_spacings = $elito_content_bottom_spacings ? 'padding-bottom:'. elito_check_px($elito_content_bottom_spacings) .';' : '';
		$elito_custom_padding = $elito_content_top_spacings . $elito_content_bottom_spacings;
	} else {
		$elito_custom_padding = '';
	}
	$padding_class = '';
} else {
	$elito_custom_padding = '';
	$padding_class = '';
}

// Page Layout
$page_layout_options = get_post_meta( get_the_ID(), 'page_layout_options', true );
if ( $page_layout_options ) {
	$elito_page_layout = $page_layout_options['page_layout'];
	$page_sidebar_widget = $page_layout_options['page_sidebar_widget'];
} else {
	$elito_page_layout = 'right-sidebar';
	$page_sidebar_widget = '';
}
$page_sidebar_widget = $page_sidebar_widget ? $page_sidebar_widget : 'sidebar-1';
if ( $elito_page_layout === 'extra-width' ) {
	$elito_page_column = 'extra-width';
	$elito_page_container = 'container-fluid';
} elseif ( $elito_page_layout === 'full-width' ) {
	$elito_page_column = 'col-md-12';
	$elito_page_container = 'container ';
} elseif( ( $elito_page_layout === 'left-sidebar' || $elito_page_layout === 'right-sidebar' ) && is_active_sidebar( $page_sidebar_widget ) ) {
	if( $elito_page_layout === 'left-sidebar' ){
		$elito_page_column = 'col-md-8 order-12';
	} else {
		$elito_page_column = 'col-md-8';
	}
	$elito_page_container = 'container ';
} else {
	$elito_page_column = 'col-md-12';
	$elito_page_container = 'container ';
}
$elito_theme_page_comments = cs_get_option( 'theme_page_comments' );
get_header();
?>
<div class="page-wrap <?php echo esc_attr( $padding_class.''.$elito_content_padding ); ?>">
	<div class="<?php echo esc_attr( $elito_page_container.''.$elito_page_layout ); ?>" style="<?php echo esc_attr( $elito_custom_padding ); ?>">
		<div class="row">
			<div class="<?php echo esc_attr( $elito_page_column ); ?>">
				<div class="page-wraper clearfix">
				<?php
				while ( have_posts() ) : the_post();
					the_content();
					if ( !$elito_theme_page_comments && ( comments_open() || get_comments_number() ) ) :
						comments_template();
					endif;
				endwhile; // End of the loop.
				?>
				</div>
				<div class="page-link-wrap">
					<?php elito_wp_link_pages(); ?>
				</div>
			</div>
			<?php
			// Sidebar
			if( ($elito_page_layout === 'left-sidebar' || $elito_page_layout === 'right-sidebar') && is_active_sidebar( $page_sidebar_widget )  ) {
				get_sidebar();
			}
			?>
		</div>
	</div>
</div>
<?php
get_footer();