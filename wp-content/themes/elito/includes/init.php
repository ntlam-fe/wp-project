<?php
/*
 * All Elito Theme Related Functions Files are Linked here
 * Author & Copyright:wpoceans
 * URL: http://themeforest.net/user/wpoceans
 */

/* Theme All Elito Setup */
require_once( ELITO_FRAMEWORK . '/theme-support.php' );
require_once( ELITO_FRAMEWORK . '/backend-functions.php' );
require_once( ELITO_FRAMEWORK . '/frontend-functions.php' );
require_once( ELITO_FRAMEWORK . '/enqueue-files.php' );
require_once( ELITO_CS_FRAMEWORK . '/custom-style.php' );
require_once( ELITO_CS_FRAMEWORK . '/config.php' );

/* Install Plugins */
require_once( ELITO_FRAMEWORK . '/theme-options/plugins/activation.php' );

/* Breadcrumbs */
require_once( ELITO_FRAMEWORK . '/theme-options/plugins/breadcrumb-trail.php' );

/* Aqua Resizer */
require_once( ELITO_FRAMEWORK . '/theme-options/plugins/aq_resizer.php' );

/* Bootstrap Menu Walker */
require_once( ELITO_FRAMEWORK . '/core/wp_bootstrap_navwalker.php' );

/* Sidebars */
require_once( ELITO_FRAMEWORK . '/core/sidebars.php' );

if ( class_exists( 'WooCommerce' ) ) :
	require_once( ELITO_FRAMEWORK . '/woocommerce-extend.php' );
endif;