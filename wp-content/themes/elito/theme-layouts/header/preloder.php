<?php
	// Logo Image
	// Metabox - Header Transparent
	$elito_id    = ( isset( $post ) ) ? $post->ID : 0;
	$elito_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $elito_id;
	$elito_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $elito_id;
	$elito_meta  = get_post_meta( $elito_id, 'page_type_metabox'. true );
	$elito_preloader_image  = cs_get_option( 'preloader_image' );

	$elito_preloader_url = wp_get_attachment_url( $elito_preloader_image );
	$elito_preloader_alt = get_post_meta( $elito_preloader_image, '_wp_attachment_image_alt', true );

	if ( $elito_preloader_url ) {
		$elito_preloader_url = $elito_preloader_url;
	} else {
		$elito_preloader_url = ELITO_IMAGES.'/preloader.svg';
	}

?>
<!-- start preloader -->
<div class="preloader">
    <div class="vertical-centered-box">
        <div class="content">
            <div class="loader-circle"></div>
            <div class="loader-line-mask">
                <div class="loader-line"></div>
            </div>
            <img src="<?php echo esc_url( $elito_preloader_url ); ?>" alt="<?php echo esc_attr( $elito_preloader_alt ); ?>">
        </div>
    </div>
</div>
<!-- end preloader -->