<?php
namespace Elementor;

defined( 'ABSPATH' ) || die();

class Elito_Icons_Manager {

    public static function init() {
        add_filter( 'elementor/icons_manager/additional_tabs', [ __CLASS__, 'add_elito_icons_tab' ] );
    }

    public static function add_elito_icons_tab( $tabs ) {
        $tabs['elito-icons'] = [
            'name' => 'elito-icons',
            'label' => __( 'Elito Icons', 'elito-elementor-addons' ),
            'url' => ELITO_PLUGIN_URL . 'elementor/assets/css/flaticon.css',
            'enqueue' => [ ELITO_PLUGIN_URL . 'elementor/assets/css/flaticon.css' ],
            'prefix' => 'flaticon-',
            'displayPrefix' => 'fi',
            'labelIcon' => 'flaticon-interior-design',
            'ver' => '1.0.0',
            'fetchJson' => ELITO_PLUGIN_URL . 'elementor/assets/js/elito-icons.js?v=1.0.0',
            'native' => false,
        ];
        return $tabs;
    }

    /**
     * Get a list of elito icons
     *
     * @return array
     */
    public static function get_elito_icons() {
        return [
            'flaticon-shopping-cart' => 'shopping-cart',
            'flaticon-search'  => 'search',
            'flaticon-play' => 'play',
            'flaticon-email' => 'email',
            'flaticon-location' => 'location',
            'flaticon-telephone' => 'telephone',
            'flaticon-linkedin' => 'linkedin',
            'flaticon-twitter' => 'twitter',
            'flaticon-facebook-app-symbol' => 'facebook-app-symbol',
            'flaticon-instagram' => 'instagram',
            'flaticon-quote' => 'quote',
            'flaticon-planning' => 'planning',
            'flaticon-blueprint' => 'blueprint',
            'flaticon-double-bed' => 'double-bed',
            'flaticon-armchair' => 'armchair',
            'flaticon-furniture' => 'furniture',
            'flaticon-interior-design' => 'interior-design',
        ];
    }
}

Elito_Icons_Manager::init();