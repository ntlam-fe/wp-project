<?php
/*
 * The template for displaying the footer.
 * Author & Copyright:wpoceans
 * URL: http://themeforest.net/user/wpoceans
 */

$elito_id    = ( isset( $post ) ) ? $post->ID : 0;
$elito_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $elito_id;
$elito_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $elito_id;
$elito_meta  = get_post_meta( $elito_id, 'page_type_metabox', true );
$elito_ft_bg = cs_get_option('elito_ft_bg');
$elito_attachment = wp_get_attachment_image_src( $elito_ft_bg , 'full' );
$elito_attachment = $elito_attachment ? $elito_attachment[0] : '';

if ( $elito_attachment ) {
	$bg_url = ' style="';
	$bg_url .= ( $elito_attachment ) ? 'background-image: url( '. esc_url( $elito_attachment ) .' );' : '';
	$bg_url .= '"';
} else {
	$bg_url = '';
}

if ( $elito_meta ) {
	$elito_hide_footer  = $elito_meta['hide_footer'];
} else { $elito_hide_footer = ''; }
if ( !$elito_hide_footer ) { // Hide Footer Metabox
	$hide_copyright = cs_get_option('hide_copyright');
	
?>
	<!-- Footer -->
	<footer class="wpo-site-footer clearfix"  <?php echo wp_kses( $bg_url, array('img' => array('src' => array(), 'alt' => array()),) ); ?>>
		<?php
			$footer_widget_block = cs_get_option( 'footer_widget_block' );
			if ( $footer_widget_block ) {
	      get_template_part( 'theme-layouts/footer/footer', 'widgets' );
	    }
			if ( !$hide_copyright ) {
      	get_template_part( 'theme-layouts/footer/footer', 'copyright' );
	    }
    ?>
	</footer>
	<!-- Footer -->
<?php } // Hide Footer Metabox ?>
</div><!--elito-theme-wrapper -->
<?php wp_footer(); ?>
</body>
</html>
