<?php
$elito_id    = ( isset( $post ) ) ? $post->ID : 0;
$elito_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $elito_id;
$elito_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $elito_id;
$elito_meta  = get_post_meta( $elito_id, 'page_type_metabox', true);

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
$elito_header_design_actual = $elito_header_design_actual ? $elito_header_design_actual : 'style_one';

$elito_cart_widget  = cs_get_option( 'elito_cart_widget' );
$elito_search  = cs_get_option( 'elito_header_search' );

$elito_menu_cta  = cs_get_option( 'elito_menu_cta' );
$header_cta_text  = cs_get_option( 'header_cta_text' );
$header_cta_link  = cs_get_option( 'header_cta_link' );

?>
<div class="col-lg-2 col-md-2 col-2">
  <div class="header-search-form-wrapper header-right">
    <?php if ( $elito_menu_cta ) { ?>
    <div class="header-btn">
        <a class="theme-btn" href="<?php echo esc_url( $header_cta_link ); ?>">
            <img class="hide-img" src="<?php echo esc_url( $header_cta_link ); ?>" alt>
           <?php echo esc_html( $header_cta_text ) ?>
        </a>
    </div>
    <?php
      }
      if ( !$elito_search ) { ?>
      <div class="cart-search-contact">
          <button class="search-toggle-btn"><i class="fi flaticon-search"></i></button>
          <div class="header-search-form">
              <form method="get" action="<?php echo esc_url( home_url('/') ); ?>" class="form" >
                  <div>
                      <input type="text" name="s" class="form-control" placeholder="<?php echo esc_attr__( 'Search here','elito' ); ?>">
                      <button type="submit"><i class="fi flaticon-search"></i></button>
                  </div>
              </form>
          </div>
      </div>
    <?php } 
    if ( $elito_cart_widget && class_exists( 'WooCommerce' ) ) {
      get_template_part( 'theme-layouts/header/top','cart' );
    }
    ?>
  </div>
</div>
