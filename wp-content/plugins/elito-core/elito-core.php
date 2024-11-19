<?php
/*
Plugin Name: Elito Core
Plugin URI: http://themeforest.net/user/wpoceans
Description: Plugin to contain shortcodes and custom post types of the elito theme.
Author: wpoceans
Author URI: http://themeforest.net/user/wpoceans/portfolio
Version: 1.0.3
Text Domain: elito-core
*/

if (!function_exists('elito_block_direct_access')) {
  function elito_block_direct_access()
  {
    if (!defined('ABSPATH')) {
      exit('Forbidden');
    }
  }
}

// Plugin URL
define('ELITO_PLUGIN_URL', plugins_url('/', __FILE__));

// Plugin PATH
define('ELITO_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('ELITO_PLUGIN_ASTS', ELITO_PLUGIN_URL . 'assets');
define('ELITO_PLUGIN_IMGS', ELITO_PLUGIN_ASTS . '/images');
define('ELITO_PLUGIN_INC', ELITO_PLUGIN_PATH . 'include');

// DIRECTORY SEPARATOR
define('DS', DIRECTORY_SEPARATOR);

// Elito Elementor Shortcode Path
define('ELITO_EM_SHORTCODE_BASE_PATH', ELITO_PLUGIN_PATH . 'elementor/');
define('ELITO_EM_SHORTCODE_PATH', ELITO_EM_SHORTCODE_BASE_PATH . 'widgets/');

/**
 * Check if Codestar Framework is Active or Not!
 */
function elito_framework_active()
{
  return (defined('CS_VERSION')) ? true : false;
}

/* ELITO_THEME_NAME_PLUGIN */
define('ELITO_THEME_NAME_PLUGIN', 'Elito');

// Initial File
include_once(ABSPATH . 'wp-admin/includes/plugin.php');
if (is_plugin_active('elito-core/elito-core.php')) {

  // Custom Post Type
  require_once(ELITO_PLUGIN_INC . '/custom-post-type.php');

  if (is_plugin_active('kingcomposer/kingcomposer.php')) {

    define('ELITO_KC_SHORTCODE_BASE_PATH', ELITO_PLUGIN_PATH . 'kc/');
    define('ELITO_KC_SHORTCODE_PATH', ELITO_KC_SHORTCODE_BASE_PATH . 'shortcodes/');
    // Shortcodes
    require_once(ELITO_KC_SHORTCODE_BASE_PATH . '/kc-setup.php');
    require_once(ELITO_KC_SHORTCODE_BASE_PATH . '/library.php');
  }

  // Theme Custom Shortcode
  require_once(ELITO_PLUGIN_INC . '/custom-shortcodes/theme-shortcodes.php');
  require_once(ELITO_PLUGIN_INC . '/custom-shortcodes/custom-shortcodes.php');

  // Importer
  require_once(ELITO_PLUGIN_INC . '/demo/importer.php');


  if (class_exists('WP_Widget') && is_plugin_active('codestar-framework/cs-framework.php')) {
    // Widgets

    require_once(ELITO_PLUGIN_INC . '/widgets/nav-widget.php');
    require_once(ELITO_PLUGIN_INC . '/widgets/recent-posts.php');
    require_once(ELITO_PLUGIN_INC . '/widgets/footer-posts.php');
    require_once(ELITO_PLUGIN_INC . '/widgets/text-widget.php');
    require_once(ELITO_PLUGIN_INC . '/widgets/widget-extra-fields.php');

    // Elementor
    if (file_exists(ELITO_EM_SHORTCODE_BASE_PATH . '/em-setup.php')) {
      require_once(ELITO_EM_SHORTCODE_BASE_PATH . '/em-setup.php');
      require_once(ELITO_EM_SHORTCODE_BASE_PATH . 'lib/fields/icons.php');
      require_once(ELITO_EM_SHORTCODE_BASE_PATH . 'lib/icons-manager/icons-manager.php');
    }
  }

  add_action('wp_enqueue_scripts', 'elito_plugin_enqueue_scripts');
  function elito_plugin_enqueue_scripts()
  {
    wp_enqueue_script('plugin-scripts', ELITO_PLUGIN_ASTS . '/plugin-scripts.js', array('jquery'), '', true);
  }
}

// Extra functions
require_once(ELITO_PLUGIN_INC . '/theme-functions.php');
