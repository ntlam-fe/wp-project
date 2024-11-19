<?php
/*
 * Elito Theme's Functions
 * Author & Copyright:wpoceans
 * URL: http://themeforest.net/user/wpoceans
 */

/**
 * Define - Folder Paths
 */

define( 'ELITO_THEMEROOT_URI', get_template_directory_uri() );
define( 'ELITO_CSS', ELITO_THEMEROOT_URI . '/assets/css' );
define( 'ELITO_IMAGES', ELITO_THEMEROOT_URI . '/assets/images' );
define( 'ELITO_SCRIPTS', ELITO_THEMEROOT_URI . '/assets/js' );
define( 'ELITO_FRAMEWORK', get_template_directory() . '/includes' );
define( 'ELITO_LAYOUT', get_template_directory() . '/theme-layouts' );
define( 'ELITO_CS_IMAGES', ELITO_THEMEROOT_URI . '/includes/theme-options/framework-extend/images' );
define( 'ELITO_CS_FRAMEWORK', get_template_directory() . '/includes/theme-options/framework-extend' ); // Called in Icons field *.json
define( 'ELITO_ADMIN_PATH', get_template_directory() . '/includes/theme-options/cs-framework' ); // Called in Icons field *.json

/**
 * Define - Global Theme Info's
 */
if (is_child_theme()) { // If Child Theme Active
	$elito_theme_child = wp_get_theme();
	$elito_get_parent = $elito_theme_child->Template;
	$elito_theme = wp_get_theme($elito_get_parent);
} else { // Parent Theme Active
	$elito_theme = wp_get_theme();
}
define('ELITO_NAME', $elito_theme->get( 'Name' ));
define('ELITO_VERSION', $elito_theme->get( 'Version' ));
define('ELITO_BRAND_URL', $elito_theme->get( 'AuthorURI' ));
define('ELITO_BRAND_NAME', $elito_theme->get( 'Author' ));

/**
 * All Main Files Include
 */
require_once( ELITO_FRAMEWORK . '/init.php' );