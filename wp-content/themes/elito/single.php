<?php
/*
 * The template for displaying all single posts.
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
		$elito_content_padding = $elito_meta['content_spacings'];
	} else { $elito_content_padding = ''; }
	// Padding - Metabox
	if ( $elito_content_padding && $elito_content_padding !== 'padding-default' ) {
		$elito_content_top_spacings = $elito_meta['content_top_spacings'];
		$elito_content_bottom_spacings = $elito_meta['content_bottom_spacings'];
		if ( $elito_content_padding === 'padding-custom' ) {
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
	$elito_single_comment = cs_get_option( 'single_comment_form' );
	$elito_sidebar_position = cs_get_option( 'blog_sidebar_position' );
	$elito_sidebar_position = $elito_sidebar_position ?$elito_sidebar_position : 'sidebar-right';
	$elito_blog_widget = cs_get_option( 'blog_widget' );
	$elito_blog_widget = $elito_blog_widget ? $elito_blog_widget : 'sidebar-1';

	$elito_sidebar_position = $elito_sidebar_position ? $elito_sidebar_position : 'sidebar-right';

	if (isset($_GET['sidebar'])) {
	  $elito_sidebar_position = $_GET['sidebar'];
	}
	
	// Sidebar Position
	if ( $elito_sidebar_position === 'sidebar-hide' ) {
		$layout_class = 'col col-lg-10 offset-lg-1';
		$elito_sidebar_class = 'hide-sidebar';
	} elseif ( $elito_sidebar_position === 'sidebar-left' && is_active_sidebar( $elito_blog_widget ) ) {
		$layout_class = 'col col-lg-8 order-lg-2';
		$elito_sidebar_class = 'left-sidebar';
	} elseif( is_active_sidebar( $elito_blog_widget ) ) {
		$layout_class = 'col col-lg-8';
		$elito_sidebar_class = 'right-sidebar';
	} else {
		$layout_class = 'col col-lg-12';
		$elito_sidebar_class = 'hide-sidebar';
	}
?>
<div class="wpo-blog-single-section section-padding <?php echo esc_attr( $elito_content_padding .' '. $elito_sidebar_class ); ?>" style="<?php echo esc_attr( $elito_custom_padding ); ?>">
	<div class="container content-area ">
		<div class="row">
			<div class="single-content-wrap <?php echo esc_attr( $layout_class ); ?>">
				<div class="wpo-blog-content">
					<?php
					if ( have_posts() ) :
						/* Start the Loop */
						while ( have_posts() ) : the_post();
							if ( post_password_required() ) {
									echo '<div class="password-form">'.get_the_password_form().'</div>';
								} else {
									get_template_part( 'theme-layouts/post/content', 'single' );
									$elito_single_comment = !$elito_single_comment ? comments_template() : '';

								}
						endwhile;
					else :
						get_template_part( 'theme-layouts/post/content', 'none' );
					endif; ?>
				</div><!-- Blog Div -->
				<?php
		    wp_reset_postdata(); ?>
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