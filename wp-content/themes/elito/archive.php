<?php
/*
 * The main template file.
 * Author & Copyright: wpoceans
 * URL: http://themeforest.net/user/wpoceans
 */
get_header();
	// Metabox
	$elito_id    = ( isset( $post ) ) ? $post->ID : 0;
	$elito_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $elito_id;
	$elito_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $elito_id;
	$elito_meta  = get_post_meta( $elito_id, 'page_type_metabox', true );
	if ( $elito_meta ) {
		$elito_content_padding = isset( $elito_meta['content_spacings'] ) ? $elito_meta['content_spacings'] : '';
	} else { $elito_content_padding = ''; }
	// Padding - Metabox
	if ($elito_content_padding && $elito_content_padding !== 'padding-default') {
		$elito_content_top_spacings = $elito_meta['content_top_spacings'];
		$elito_content_bottom_spacings = $elito_meta['content_bottom_spacings'];
		if ($elito_content_padding === 'padding-custom') {
			$elito_content_top_spacings = $elito_content_top_spacings ? 'padding-top:'. elito_check_px($elito_content_top_spacings) .';' : '';
			$elito_content_bottom_spacings = $elito_content_bottom_spacings ? 'padding-bottom:'. elito_check_px($elito_content_bottom_spacings) .';' : '';
			$elito_custom_padding = $elito_content_top_spacings . $elito_content_bottom_spacings;
		} else {
			$elito_custom_padding = '';
		}
	} else {
		$elito_custom_padding = '';
	}
	// Theme Options
	$elito_sidebar_position = cs_get_option( 'blog_sidebar_position' );
	$elito_sidebar_position = $elito_sidebar_position ?$elito_sidebar_position : 'sidebar-right';
	$elito_blog_widget = cs_get_option( 'blog_widget' );
	$elito_blog_widget = $elito_blog_widget ? $elito_blog_widget : 'sidebar-1';

	if (isset($_GET['sidebar'])) {
	  $elito_sidebar_position = $_GET['sidebar'];
	}

	$elito_sidebar_position = $elito_sidebar_position ? $elito_sidebar_position : 'sidebar-right';

	// Sidebar Position
	if ( $elito_sidebar_position === 'sidebar-hide' ) {
		$layout_class = 'col col col-md-10 col-md-offset-1';
		$elito_sidebar_class = 'hide-sidebar';
	} elseif ( $elito_sidebar_position === 'sidebar-left' && is_active_sidebar( $elito_blog_widget ) ) {
		$layout_class = 'col col-md-8 col-md-push-4';
		$elito_sidebar_class = 'left-sidebar';
	} elseif( is_active_sidebar( $elito_blog_widget ) ) {
		$layout_class = 'col col-md-8';
		$elito_sidebar_class = 'right-sidebar';
	} else {
		$layout_class = 'col col-md-12';
		$elito_sidebar_class = 'hide-sidebar';
	}

	?>
<div class="wpo-blog-pg-section section-padding">
	<div class="container <?php echo esc_attr( $elito_content_padding .' '. $elito_sidebar_class ); ?>" style="<?php echo esc_attr( $elito_custom_padding ); ?>">
		<div class="row">
			<div class="<?php echo esc_attr( $layout_class ); ?>">
				<div class="blog-content">
				<?php
				if ( have_posts() ) :
					/* Start the Loop */
					while ( have_posts() ) : the_post();
						get_template_part( 'theme-layouts/post/content' );
					endwhile;
				else :
					get_template_part( 'theme-layouts/post/content', 'none' );
				endif;
				elito_posts_navigation();
		    wp_reset_postdata(); ?>
		    </div>
			</div><!-- Content Area -->
			<?php
			if ( $elito_sidebar_position !== 'sidebar-hide' && is_active_sidebar( $elito_blog_widget ) ) {
				get_sidebar(); // Sidebar
			} ?>
		</div>
	</div>
</div>
<?php
get_footer();