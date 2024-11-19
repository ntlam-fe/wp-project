<?php
/*
 * All Theme Options for Elito theme.
 * Author & Copyright:wpoceans
 * URL: http://themeforest.net/user/wpoceans
 */

function elito_settings( $settings ) {

  $settings           = array(
    'menu_title'      => ELITO_NAME . esc_html__(' Options', 'elito'),
    'menu_slug'       => sanitize_title(ELITO_NAME) . '_options',
    'menu_type'       => 'theme',
    'menu_icon'       => 'dashicons-awards',
    'menu_position'   => '4',
    'ajax_save'       => false,
    'show_reset_all'  => true,
    'framework_title' => ELITO_NAME .' <small>V-'. ELITO_VERSION .' by <a href="'. ELITO_BRAND_URL .'" target="_blank">'. ELITO_BRAND_NAME .'</a></small>',
  );

  return $settings;

}
add_filter( 'cs_framework_settings', 'elito_settings' );

// Theme Framework Options
function elito_options( $options ) {

  $options      = array(); // remove old options

  // ------------------------------
  // Branding
  // ------------------------------
  $options[]   = array(
    'name'     => 'elito_theme_branding',
    'title'    => esc_html__('Site Brand', 'elito'),
    'icon'     => 'fa fa-address-book-o',
    'sections' => array(

      // brand logo tab
      array(
        'name'     => 'brand_logo',
        'title'    => esc_html__('Logo', 'elito'),
        'icon'     => 'fa fa-star',
        'fields'   => array(

          // Site Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-elito-heading',
            'content' => esc_html__('Site Logo', 'elito')
          ),
          array(
            'id'    => 'elito_logo',
            'type'  => 'image',
            'title' => esc_html__('Default Logo', 'elito'),
            'info'  => esc_html__('Upload your default logo here. If you not upload, then site title will load in this logo location.', 'elito'),
            'add_title' => esc_html__('Add Logo', 'elito'),
          ),
          array(
            'id'    => 'elito_trlogo',
            'type'  => 'image',
            'title' => esc_html__('Transparent Logo', 'elito'),
            'info'  => esc_html__('Upload your Transparent logo here. If you not upload, then site title will load in this logo location.', 'elito'),
            'add_title' => esc_html__('Add Logo', 'elito'),
          ),
          array(
            'id'          => 'elito_logo_width',
            'type'        => 'number',
            'title'       => esc_html__('Logo Max Width', 'elito'),
            'attributes'  => array( 'Max Width' => 250 ),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'elito_logo_top',
            'type'        => 'number',
            'title'       => esc_html__('Logo Top Space', 'elito'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'elito_logo_bottom',
            'type'        => 'number',
            'title'       => esc_html__('Logo Bottom Space', 'elito'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),
          // WordPress Admin Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-elito-heading',
            'content' => esc_html__('WordPress Admin Logo', 'elito')
          ),
          array(
            'id'    => 'brand_logo_wp',
            'type'  => 'image',
            'title' => esc_html__('Login logo', 'elito'),
            'info'  => esc_html__('Upload your WordPress login page logo here.', 'elito'),
            'add_title' => esc_html__('Add Login Logo', 'elito'),
          ),
        ) // end: fields
      ), // end: section
    ),
  );

  // ------------------------------
  // Layout
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_layout',
    'title'  => esc_html__('Layout', 'elito'),
    'icon'   => 'fa fa-file-text'
  );

  $options[]      = array(
    'name'        => 'theme_general',
    'title'       => esc_html__('General Settings', 'elito'),
    'icon'        => 'fa fa-cog',

    // begin: fields
    'fields'      => array(

      // -----------------------------
      // Begin: Responsive
      // -----------------------------
       array(
        'id'    => 'theme_responsive',
        'off_text'  => 'No',
        'on_text'  => 'Yes',
        'type'  => 'switcher',
        'title' => esc_html__('Responsive', 'elito'),
        'info' => esc_html__('Turn on if you don\'t want your site to be responsive.', 'elito'),
        'default' => false,
      ),
      array(
        'id'    => 'theme_preloder',
        'off_text'  => 'No',
        'on_text'  => 'Yes',
        'type'  => 'switcher',
        'title' => esc_html__('Preloder', 'elito'),
        'info' => esc_html__('Turn off if you don\'t want your site to be Preloder.', 'elito'),
        'default' => true,
      ),
      array(
        'id'    => 'preloader_image',
        'type'  => 'image',
        'title' => esc_html__('Preloader Logo', 'elito'),
        'info'  => esc_html__('Upload your preoader logo here. If you not upload, then site preoader will load in this preloader location.', 'elito'),
        'add_title' => esc_html__('Add Logo', 'elito'),
        'dependency' => array( 'theme_preloder', '==', 'true' ),
      ),
      array(
        'id'    => 'theme_layout_width',
        'type'  => 'image_select',
        'title' => esc_html__('Full Width & Extra Width', 'elito'),
        'info' => esc_html__('Boxed or Fullwidth? Choose your site layout width. Default : Full Width', 'elito'),
        'options'      => array(
          'container'    => ELITO_CS_IMAGES .'/boxed-width.jpg',
          'container-fluid'    => ELITO_CS_IMAGES .'/full-width.jpg',
        ),
        'default'      => 'container-fluid',
        'radio'      => true,
      ),
       array(
        'id'    => 'theme_page_comments',
        'type'  => 'switcher',
        'title' => esc_html__('Hide Page Comments?', 'elito'),
        'label' => esc_html__('Yes! Hide Page Comments.', 'elito'),
        'on_text' => esc_html__('Yes', 'elito'),
        'off_text' => esc_html__('No', 'elito'),
        'default' => false,
      ),
      array(
        'type'    => 'notice',
        'class'   => 'info cs-elito-heading',
        'content' => esc_html__('Background Options', 'elito'),
        'dependency' => array( 'theme_layout_width_container', '==', 'true' ),
      ),
      array(
        'id'             => 'theme_layout_bg_type',
        'type'           => 'select',
        'title'          => esc_html__('Background Type', 'elito'),
        'options'        => array(
          'bg-image' => esc_html__('Image', 'elito'),
          'bg-pattern' => esc_html__('Pattern', 'elito'),
        ),
        'dependency' => array( 'theme_layout_width_container', '==', 'true' ),
      ),
      array(
        'id'    => 'theme_layout_bg_pattern',
        'type'  => 'image_select',
        'title' => esc_html__('Background Pattern', 'elito'),
        'info' => esc_html__('Select background pattern', 'elito'),
        'options'      => array(
          'pattern-1'    => ELITO_CS_IMAGES . '/pattern-1.png',
          'pattern-2'    => ELITO_CS_IMAGES . '/pattern-2.png',
          'pattern-3'    => ELITO_CS_IMAGES . '/pattern-3.png',
          'pattern-4'    => ELITO_CS_IMAGES . '/pattern-4.png',
          'custom-pattern'  => ELITO_CS_IMAGES . '/pattern-5.png',
        ),
        'default'      => 'pattern-1',
        'radio'      => true,
        'dependency' => array( 'theme_layout_width_container|theme_layout_bg_type', '==|==', 'true|bg-pattern' ),
      ),
      array(
        'id'      => 'custom_bg_pattern',
        'type'    => 'upload',
        'title'   => esc_html__('Custom Pattern', 'elito'),
        'dependency' => array( 'theme_layout_width_container|theme_layout_bg_type|theme_layout_bg_pattern_custom-pattern', '==|==|==', 'true|bg-pattern|true' ),
        'info' => __('Select your custom background pattern. <br />Note, background pattern image will be repeat in all x and y axis. So, please consider all repeatable area will perfectly fit your custom patterns.', 'elito'),
      ),
      array(
        'id'      => 'theme_layout_bg',
        'type'    => 'background',
        'title'   => esc_html__('Background', 'elito'),
        'dependency' => array( 'theme_layout_width_container|theme_layout_bg_type', '==|==', 'true|bg-image' ),
      ),

    ), // end: fields

  );

  // ------------------------------
  // Header Sections
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_header_tab',
    'title'    => esc_html__('Header Settings', 'elito'),
    'icon'     => 'fa fa-sliders',
    'sections' => array(

      // header design tab
      array(
        'name'     => 'header_design_tab',
        'title'    => esc_html__('Design', 'elito'),
        'icon'     => 'fa fa-magic',
        'fields'   => array(

          // Header Select
          array(
            'id'           => 'select_header_design',
            'type'         => 'image_select',
            'title'        => esc_html__('Select Header Design', 'elito'),
            'options'      => array(
              'style_one'    => ELITO_CS_IMAGES .'/hs-1.png',
              'style_two'    => ELITO_CS_IMAGES .'/hs-2.png',
              'style_three'    => ELITO_CS_IMAGES .'/hs-3.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'header_design',
            ),
            'radio'        => true,
            'default'   => 'style_four',
            'info' => esc_html__('Select your header design, following options will may differ based on your selection of header design.', 'elito'),
          ),
          // Header Select

          // Extra's
          array(
            'type'    => 'notice',
            'class'   => 'info cs-elito-heading',
            'content' => esc_html__('Extra\'s', 'elito'),
          ),
          array(
            'id'    => 'sticky_header',
            'type'  => 'switcher',
            'title' => esc_html__('Sticky Header', 'elito'),
            'info' => esc_html__('Turn On if you want your naviagtion bar on sticky.', 'elito'),
            'default' => true,
          ),
          array(
            'id'    => 'elito_cart_widget',
            'type'  => 'switcher',
            'title' => esc_html__('Header Cart', 'elito'),
            'info' => esc_html__('Turn On if you want to Show Header Cart .', 'elito'),
            'default' => false,
          ),
          array(
            'id'    => 'elito_header_search',
            'type'  => 'switcher',
            'title' => esc_html__('Header Search', 'elito'),
            'info' => esc_html__('Turn On if you want to Hide Header Search .', 'elito'),
            'default' => false,
          ),
          array(
            'id'    => 'elito_menu_cta',
            'type'  => 'switcher',
            'title' => esc_html__('Header CTA', 'elito'),
            'info' => esc_html__('Turn On if you want to Show Header CTA .', 'elito'),
            'default' => false,
          ),
          array(
            'id'    => 'header_cta_text',
            'type'  => 'text',
            'title' => esc_html__('Header CTA Text', 'elito'),
            'info' => esc_html__('Write Header CTA Text here.', 'elito'),
            'type'        => 'text',
            'default' => 'Free Consulting',
            'dependency'  => array('elito_menu_cta', '==', true),
          ),
          array(
            'id'    => 'header_cta_link',
            'type'  => 'text',
            'title' => esc_html__('Header CTA Link', 'elito'),
            'info' => esc_html__('Write Header CTA Link here.', 'elito'),
            'type'        => 'text',
            'default' => '#',
            'dependency'  => array('elito_menu_cta', '==', true),
          ),
        )
      ),

      // header top bar
      array(
        'name'     => 'header_top_bar_tab',
        'title'    => esc_html__('Top Bar', 'elito'),
        'icon'     => 'fa fa-minus',
        'fields'   => array(

          array(
            'id'          => 'top_bar',
            'type'        => 'switcher',
            'title'       => esc_html__('Hide Top Bar', 'elito'),
            'on_text'     => esc_html__('Yes', 'elito'),
            'off_text'    => esc_html__('No', 'elito'),
            'default'     => true,
          ),
          array(
            'id'          => 'top_left',
            'title'       => esc_html__('Top left Block', 'elito'),
            'desc'        => esc_html__('Top bar left block.', 'elito'),
            'type'        => 'textarea',
            'shortcode'   => true,
            'dependency'  => array('top_bar', '==', false),
          ),
          array(
            'id'          => 'top_right',
            'title'       => esc_html__('Top Right Block', 'elito'),
            'desc'        => esc_html__('Top bar right block.', 'elito'),
            'type'        => 'textarea',
            'shortcode'   => true,
            'dependency'  => array('top_bar', '==', false),
          ),
        )
      ),

      // header banner
      array(
        'name'     => 'header_banner_tab',
        'title'    => esc_html__('Title Bar (or) Banner', 'elito'),
        'icon'     => 'fa fa-bullhorn',
        'fields'   => array(

          // Title Area
          array(
            'type'    => 'notice',
            'class'   => 'info cs-elito-heading',
            'content' => esc_html__('Title Area', 'elito')
          ),
          array(
            'id'      => 'need_title_bar',
            'type'    => 'switcher',
            'title'   => esc_html__('Title Bar ?', 'elito'),
            'label'   => esc_html__('If you want to Hide title bar in your sub-pages, please turn this ON.', 'elito'),
            'default'    => false,
          ),
          array(
            'id'             => 'title_bar_padding',
            'type'           => 'select',
            'title'          => esc_html__('Padding Spaces Top & Bottom', 'elito'),
            'options'        => array(
              'padding-default' => esc_html__('Default Spacing', 'elito'),
              'padding-custom' => esc_html__('Custom Padding', 'elito'),
            ),
            'dependency'   => array( 'need_title_bar', '==', 'false' ),
          ),
          array(
            'id'             => 'titlebar_top_padding',
            'type'           => 'text',
            'title'          => esc_html__('Padding Top', 'elito'),
            'attributes' => array(
              'placeholder'     => '100px',
            ),
            'dependency'   => array( 'title_bar_padding', '==', 'padding-custom' ),
          ),
          array(
            'id'             => 'titlebar_bottom_padding',
            'type'           => 'text',
            'title'          => esc_html__('Padding Bottom', 'elito'),
            'attributes' => array(
              'placeholder'     => '100px',
            ),
            'dependency'   => array( 'title_bar_padding', '==', 'padding-custom' ),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-elito-heading',
            'content' => esc_html__('Background Options', 'elito'),
            'dependency' => array( 'need_title_bar', '==', 'false' ),
          ),
          array(
            'id'      => 'titlebar_bg_overlay_color',
            'type'    => 'color_picker',
            'title'   => esc_html__('Overlay Color', 'elito'),
            'dependency' => array( 'need_title_bar', '==', 'false' ),
          ),
          array(
            'id'    => 'title_color',
            'type'  => 'color_picker',
            'title' => esc_html__('Title Color', 'elito'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-elito-heading',
            'content' => esc_html__('Breadcrumbs', 'elito'),
          ),
         array(
            'id'      => 'need_breadcrumbs',
            'type'    => 'switcher',
            'title'   => esc_html__('Hide Breadcrumbs', 'elito'),
            'label'   => esc_html__('If you want to hide breadcrumbs in your banner, please turn this ON.', 'elito'),
            'default'    => false,
          ),
        )
      ),

    ),
  );

  // ------------------------------
  // Footer Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'footer_section',
    'title'    => esc_html__('Footer Settings', 'elito'),
    'icon'     => 'fa fa-cogs',
    'sections' => array(

      // footer widgets
      array(
        'name'     => 'footer_widgets_tab',
        'title'    => esc_html__('Widget Area', 'elito'),
        'icon'     => 'fa fa-th',
        'fields'   => array(

          // Footer Widget Block
          array(
            'type'    => 'notice',
            'class'   => 'info cs-elito-heading',
            'content' => esc_html__('Footer Widget Block', 'elito')
          ),
          array(
            'id'    => 'footer_widget_block',
            'type'  => 'switcher',
            'title' => esc_html__('Enable Widget Block', 'elito'),
            'info' => __('If you turn this ON, then Goto : Appearance > Widgets. There you can see <strong>Footer Widget 1,2,3 or 4</strong> Widget Area, add your widgets there.', 'elito'),
            'default' => true,
          ),
          array(
            'id'    => 'footer_widget_layout',
            'type'  => 'image_select',
            'title' => esc_html__('Widget Layouts', 'elito'),
            'info' => esc_html__('Choose your footer widget theme-layouts.', 'elito'),
            'default' => 4,
            'options' => array(
              1   => ELITO_CS_IMAGES . '/footer/footer-1.png',
              2   => ELITO_CS_IMAGES . '/footer/footer-2.png',
              3   => ELITO_CS_IMAGES . '/footer/footer-3.png',
              4   => ELITO_CS_IMAGES . '/footer/footer-4.png',
              5   => ELITO_CS_IMAGES . '/footer/footer-5.png',
              6   => ELITO_CS_IMAGES . '/footer/footer-6.png',
              7   => ELITO_CS_IMAGES . '/footer/footer-7.png',
              8   => ELITO_CS_IMAGES . '/footer/footer-8.png',
              9   => ELITO_CS_IMAGES . '/footer/footer-9.png',
            ),
            'radio'       => true,
            'dependency'  => array('footer_widget_block', '==', true),
          ),
           array(
            'id'    => 'elito_ft_bg',
            'type'  => 'image',
            'title' => esc_html__('Footer Background', 'elito'),
            'info'  => esc_html__('Upload your footer background.', 'elito'),
            'add_title' => esc_html__('footer background', 'elito'),
            'dependency'  => array('footer_widget_block', '==', true),
          ),

        )
      ),

      // footer copyright
      array(
        'name'     => 'footer_copyright_tab',
        'title'    => esc_html__('Copyright Bar', 'elito'),
        'icon'     => 'fa fa-copyright',
        'fields'   => array(

          // Copyright
          array(
            'type'    => 'notice',
            'class'   => 'info cs-elito-heading',
            'content' => esc_html__('Copyright Layout', 'elito'),
          ),
         array(
            'id'    => 'hide_copyright',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Copyright?', 'elito'),
            'default' => false,
            'on_text' => esc_html__('Yes', 'elito'),
            'off_text' => esc_html__('No', 'elito'),
            'label' => esc_html__('Yes, do it!', 'elito'),
          ),
          array(
            'id'    => 'footer_copyright_layout',
            'type'  => 'image_select',
            'title' => esc_html__('Select Copyright Layout', 'elito'),
            'info' => esc_html__('In above image, blue box is copyright text and yellow box is secondary text.', 'elito'),
            'default'      => 'copyright-3',
            'options'      => array(
              'copyright-1'    => ELITO_CS_IMAGES .'/footer/copyright-1.png',
              ),
            'radio'        => true,
            'dependency'     => array('hide_copyright', '!=', true),
          ),
          array(
            'id'    => 'copyright_text',
            'type'  => 'textarea',
            'title' => esc_html__('Copyright Text', 'elito'),
            'shortcode' => true,
            'dependency' => array('hide_copyright', '!=', true),
            'after'       => 'Helpful shortcodes: [current_year] [home_url] or any shortcode.',
          ),

          // Copyright Another Text
          array(
            'type'    => 'notice',
            'class'   => 'warning cs-elito-heading',
            'content' => esc_html__('Copyright Secondary Text', 'elito'),
             'dependency'     => array('hide_copyright', '!=', true),
          ),
          array(
            'id'    => 'secondary_text',
            'type'  => 'textarea',
            'title' => esc_html__('Secondary Text', 'elito'),
            'shortcode' => true,
            'dependency'     => array('hide_copyright', '!=', true),
          ),

        )
      ),

    ),
  );

  // ------------------------------
  // Design
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_design',
    'title'  => esc_html__('Design', 'elito'),
    'icon'   => 'fa fa-paint-brush'
  );

  // ------------------------------
  // color section
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_color_section',
    'title'    => esc_html__('Colors Settings', 'elito'),
    'icon'     => 'fa fa-eyedropper',
    'fields' => array(

      array(
        'type'    => 'heading',
        'content' => esc_html__('Color Options', 'elito'),
      ),
      array(
        'type'    => 'subheading',
        'wrap_class' => 'color-tab-content',
        'content' => esc_html__('All color options are available in our theme customizer. The reason of we used customizer options for color section is because, you can choose each part of color from there and see the changes instantly using customizer. Highly customizable colors are in Appearance > Customize', 'elito'),
      ),

    ),
  );

  // ------------------------------
  // Typography section
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_typo_section',
    'title'    => esc_html__('Typography', 'elito'),
    'icon'     => 'fa fa-header',
    'fields' => array(

      // Start fields
      array(
        'id'                  => 'typography',
        'type'                => 'group',
        'fields'              => array(
          array(
            'id'              => 'title',
            'type'            => 'text',
            'title'           => esc_html__('Title', 'elito'),
          ),
          array(
            'id'              => 'selector',
            'type'            => 'textarea',
            'title'           => esc_html__('Selector', 'elito'),
            'info'           => wp_kses( __('Enter css selectors like : <strong>body, .custom-class</strong>', 'elito'), array( 'strong' => array() ) ),
          ),
          array(
            'id'              => 'font',
            'type'            => 'typography',
            'title'           => esc_html__('Font Family', 'elito'),
          ),
          array(
            'id'              => 'size',
            'type'            => 'text',
            'title'           => esc_html__('Font Size', 'elito'),
          ),
          array(
            'id'              => 'line_height',
            'type'            => 'text',
            'title'           => esc_html__('Line-Height', 'elito'),
          ),
          array(
            'id'              => 'css',
            'type'            => 'textarea',
            'title'           => esc_html__('Custom CSS', 'elito'),
          ),
        ),
        'button_title'        => esc_html__('Add New Typography', 'elito'),
        'accordion_title'     => esc_html__('New Typography', 'elito'),
      ),

      // Subset
      array(
        'id'                  => 'subsets',
        'type'                => 'select',
        'title'               => esc_html__('Subsets', 'elito'),
        'class'               => 'chosen',
        'options'             => array(
          'latin'             => 'latin',
          'latin-ext'         => 'latin-ext',
          'cyrillic'          => 'cyrillic',
          'cyrillic-ext'      => 'cyrillic-ext',
          'greek'             => 'greek',
          'greek-ext'         => 'greek-ext',
          'vietnamese'        => 'vietnamese',
          'devanagari'        => 'devanagari',
          'khmer'             => 'khmer',
        ),
        'attributes'         => array(
          'data-placeholder' => 'Subsets',
          'multiple'         => 'multiple',
          'style'            => 'width: 200px;'
        ),
        'default'             => array( 'latin' ),
      ),

      array(
        'id'                  => 'font_weight',
        'type'                => 'select',
        'title'               => esc_html__('Font Weights', 'elito'),
        'class'               => 'chosen',
        'options'             => array(
          '100'   => esc_html__('Thin 100', 'elito'),
          '100i'  => esc_html__('Thin 100 Italic', 'elito'),
          '200'   => esc_html__('Extra Light 200', 'elito'),
          '200i'  => esc_html__('Extra Light 200 Italic', 'elito'),
          '300'   => esc_html__('Light 300', 'elito'),
          '300i'  => esc_html__('Light 300 Italic', 'elito'),
          '400'   => esc_html__('Regular 400', 'elito'),
          '400i'  => esc_html__('Regular 400 Italic', 'elito'),
          '500'   => esc_html__('Medium 500', 'elito'),
          '500i'  => esc_html__('Medium 500 Italic', 'elito'),
          '600'   => esc_html__('Semi Bold 600', 'elito'),
          '600i'  => esc_html__('Semi Bold 600 Italic', 'elito'),
          '700'   => esc_html__('Bold 700', 'elito'),
          '700i'  => esc_html__('Bold 700 Italic', 'elito'),
          '800'   => esc_html__('Extra Bold 800', 'elito'),
          '800i'  => esc_html__('Extra Bold 800 Italic', 'elito'),
          '900'   => esc_html__('Black 900', 'elito'),
          '900i'  => esc_html__('Black 900 Italic', 'elito'),
        ),
        'attributes'         => array(
          'data-placeholder' => esc_html__('Font Weight', 'elito'),
          'multiple'         => 'multiple',
          'style'            => 'width: 200px;'
        ),
        'default'             => array( '400' ),
      ),

      // Custom Fonts Upload
      array(
        'id'                 => 'font_family',
        'type'               => 'group',
        'title'              => esc_html__('Upload Custom Fonts', 'elito'),
        'button_title'       => esc_html__('Add New Custom Font', 'elito'),
        'accordion_title'    => esc_html__('Adding New Font', 'elito'),
        'accordion'          => true,
        'desc'               => esc_html__('It is simple. Only add your custom fonts and click to save. After you can check "Font Family" selector. Do not forget to Save!', 'elito'),
        'fields'             => array(

          array(
            'id'             => 'name',
            'type'           => 'text',
            'title'          => esc_html__('Font-Family Name', 'elito'),
            'attributes'     => array(
              'placeholder'  => esc_html__('for eg. Arial', 'elito')
            ),
          ),

          array(
            'id'             => 'ttf',
            'type'           => 'upload',
            'title'          => wp_kses(__('Upload .ttf <small><i>(optional)</i></small>', 'elito'), array( 'small' => array(), 'i' => array() )),
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => esc_html__('Use this Font-Format', 'elito'),
              'button_title' => wp_kses(__('Upload <i>.ttf</i>', 'elito'), array( 'i' => array() )),
            ),
          ),

          array(
            'id'             => 'eot',
            'type'           => 'upload',
            'title'          => wp_kses(__('Upload .eot <small><i>(optional)</i></small>', 'elito'), array( 'small' => array(), 'i' => array() )),
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => esc_html__('Use this Font-Format', 'elito'),
              'button_title' => wp_kses(__('Upload <i>.eot</i>', 'elito'), array( 'i' => array() )),
            ),
          ),

          array(
            'id'             => 'otf',
            'type'           => 'upload',
            'title'          => wp_kses(__('Upload .otf <small><i>(optional)</i></small>', 'elito'), array( 'small' => array(), 'i' => array() )),
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => esc_html__('Use this Font-Format', 'elito'),
              'button_title' => wp_kses(__('Upload <i>.otf</i>', 'elito'), array( 'i' => array() )),
            ),
          ),

          array(
            'id'             => 'woff',
            'type'           => 'upload',
            'title'          => wp_kses(__('Upload .woff <small><i>(optional)</i></small>', 'elito'), array( 'small' => array(), 'i' => array() )),
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => esc_html__('Use this Font-Format', 'elito'),
              'button_title' =>wp_kses(__('Upload <i>.woff</i>', 'elito'), array( 'i' => array() )),
            ),
          ),

          array(
            'id'             => 'css',
            'type'           => 'textarea',
            'title'          => wp_kses(__('Extra CSS Style <small><i>(optional)</i></small>', 'elito'), array( 'small' => array(), 'i' => array() )),
            'attributes'     => array(
              'placeholder'  => esc_html__('for eg. font-weight: normal;', 'elito'),
            ),
          ),

        ),
      ),
      // End All field

    ),
  );

  // ------------------------------
  // Pages
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_pages',
    'title'  => esc_html__('Custom Pages', 'elito'),
    'icon'   => 'fa fa-files-o'
  );

  
  // ------------------------------
  // Team Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'team_section',
    'title'    => esc_html__('Team Settings', 'elito'),
    'icon'     => 'fa fa-address-book-o',
    'fields' => array(

      // team name change
      array(
        'type'    => 'notice',
        'class'   => 'info cs-tmx-heading',
        'content' => esc_html__('Name Change', 'elito')
      ),
      array(
        'id'      => 'theme_team_name',
        'type'    => 'text',
        'title'   => esc_html__('Team Name', 'elito'),
        'attributes'     => array(
          'placeholder'  => 'Team'
        ),
      ),
      array(
        'id'      => 'theme_team_slug',
        'type'    => 'text',
        'title'   => esc_html__('Team Slug', 'elito'),
        'attributes'     => array(
          'placeholder'  => 'team-item'
        ),
      ),
      array(
        'id'      => 'theme_team_cat_slug',
        'type'    => 'text',
        'title'   => esc_html__('Team Category Slug', 'elito'),
        'attributes'     => array(
          'placeholder'  => 'team-category'
        ),
      ),
      array(
        'type'    => 'notice',
        'class'   => 'danger',
        'content' => __('<strong>Important</strong>: Please do not set team slug and page slug as same. It\'ll not work.', 'elito')
      ),
      // Team Start
      array(
        'type'    => 'notice',
        'class'   => 'info cs-elito-heading',
        'content' => esc_html__('Team Single', 'elito')
      ),
      array(
          'id'             => 'team_sidebar_position',
          'type'           => 'select',
          'title'          => esc_html__('Sidebar Position', 'elito'),
          'options'        => array(
            'sidebar-right' => esc_html__('Right', 'elito'),
            'sidebar-left' => esc_html__('Left', 'elito'),
            'sidebar-hide' => esc_html__('Hide', 'elito'),
          ),
          'default_option' => 'Select sidebar position',
          'info'          => esc_html__('Default option : Right', 'elito'),
        ),
        array(
          'id'             => 'single_team_widget',
          'type'           => 'select',
          'title'          => esc_html__('Sidebar Widget', 'elito'),
          'options'        => elito_registered_sidebars(),
          'default_option' => esc_html__('Select Widget', 'elito'),
          'dependency'     => array('team_sidebar_position', '!=', 'sidebar-hide'),
          'info'          => esc_html__('Default option : Main Widget Area', 'elito'),
        ),
        array(
          'id'    => 'team_comment_form',
          'type'  => 'switcher',
          'title' => esc_html__('Comment Area/Form', 'elito'),
          'info' => esc_html__('If need to hide comment area and that form on single blog page, please turn this OFF.', 'elito'),
          'default' => true,
        ),
    ),
  );


  // ------------------------------
  // Service Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'service_section',
    'title'    => esc_html__('Service Settings', 'elito'),
    'icon'     => 'fa fa-newspaper-o',
    'fields' => array(

      // service name change
      array(
        'type'    => 'notice',
        'class'   => 'info cs-tmx-heading',
        'content' => esc_html__('Name Change', 'elito')
      ),
      array(
        'id'      => 'theme_service_name',
        'type'    => 'text',
        'title'   => esc_html__('Service Name', 'elito'),
        'attributes'     => array(
          'placeholder'  => 'Service'
        ),
      ),
      array(
        'id'      => 'theme_service_slug',
        'type'    => 'text',
        'title'   => esc_html__('Service Slug', 'elito'),
        'attributes'     => array(
          'placeholder'  => 'service-item'
        ),
      ),
      array(
        'id'      => 'theme_service_cat_slug',
        'type'    => 'text',
        'title'   => esc_html__('Service Category Slug', 'elito'),
        'attributes'     => array(
          'placeholder'  => 'service-category'
        ),
      ),
      array(
        'type'    => 'notice',
        'class'   => 'danger',
        'content' => __('<strong>Important</strong>: Please do not set service slug and page slug as same. It\'ll not work.', 'elito')
      ),
      // Service Start
      array(
        'type'    => 'notice',
        'class'   => 'info cs-elito-heading',
        'content' => esc_html__('Service Single', 'elito')
      ),
      array(
          'id'             => 'service_sidebar_position',
          'type'           => 'select',
          'title'          => esc_html__('Sidebar Position', 'elito'),
          'options'        => array(
            'sidebar-right' => esc_html__('Right', 'elito'),
            'sidebar-left' => esc_html__('Left', 'elito'),
            'sidebar-hide' => esc_html__('Hide', 'elito'),
          ),
          'default_option' => 'Select sidebar position',
          'info'          => esc_html__('Default option : Right', 'elito'),
        ),
        array(
          'id'             => 'single_service_widget',
          'type'           => 'select',
          'title'          => esc_html__('Sidebar Widget', 'elito'),
          'options'        => elito_registered_sidebars(),
          'default_option' => esc_html__('Select Widget', 'elito'),
          'dependency'     => array('service_sidebar_position', '!=', 'sidebar-hide'),
          'info'          => esc_html__('Default option : Main Widget Area', 'elito'),
        ),
        array(
          'id'    => 'service_comment_form',
          'type'  => 'switcher',
          'title' => esc_html__('Comment Area/Form', 'elito'),
          'info' => esc_html__('If need to hide comment area and that form on single blog page, please turn this OFF.', 'elito'),
          'default' => true,
        ),
    ),
  );

  
  // ------------------------------
  // Project Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'project_section',
    'title'    => esc_html__('Project Settings', 'elito'),
    'icon'     => 'fa fa-medkit',
    'fields' => array(

      // project name change
      array(
        'type'    => 'notice',
        'class'   => 'info cs-tmx-heading',
        'content' => esc_html__('Name Change', 'elito')
      ),
      array(
        'id'      => 'theme_project_name',
        'type'    => 'text',
        'title'   => esc_html__('Project Name', 'elito'),
        'attributes'     => array(
          'placeholder'  => 'Project'
        ),
      ),
      array(
        'id'      => 'theme_project_slug',
        'type'    => 'text',
        'title'   => esc_html__('Project Slug', 'elito'),
        'attributes'     => array(
          'placeholder'  => 'project-item'
        ),
      ),
      array(
        'id'      => 'theme_project_cat_slug',
        'type'    => 'text',
        'title'   => esc_html__('Project Category Slug', 'elito'),
        'attributes'     => array(
          'placeholder'  => 'project-category'
        ),
      ),
      array(
        'type'    => 'notice',
        'class'   => 'danger',
        'content' => __('<strong>Important</strong>: Please do not set project slug and page slug as same. It\'ll not work.', 'elito')
      ),

      // Project Start
      array(
        'type'    => 'notice',
        'class'   => 'info cs-elito-heading',
        'content' => esc_html__('Project Single', 'elito')
      ),
      array(
          'id'             => 'project_sidebar_position',
          'type'           => 'select',
          'title'          => esc_html__('Sidebar Position', 'elito'),
          'options'        => array(
            'sidebar-right' => esc_html__('Right', 'elito'),
            'sidebar-left' => esc_html__('Left', 'elito'),
            'sidebar-hide' => esc_html__('Hide', 'elito'),
          ),
          'default_option' => 'Select sidebar position',
          'info'          => esc_html__('Default option : Right', 'elito'),
        ),
        array(
          'id'             => 'single_project_widget',
          'type'           => 'select',
          'title'          => esc_html__('Sidebar Widget', 'elito'),
          'options'        => elito_registered_sidebars(),
          'default_option' => esc_html__('Select Widget', 'elito'),
          'dependency'     => array('project_sidebar_position', '!=', 'sidebar-hide'),
          'info'          => esc_html__('Default option : Main Widget Area', 'elito'),
        ),
        array(
          'id'    => 'project_comment_form',
          'type'  => 'switcher',
          'title' => esc_html__('Comment Area/Form', 'elito'),
          'info' => esc_html__('If need to hide comment area and that form on single blog page, please turn this OFF.', 'elito'),
          'default' => true,
        ),
    ),
  );

  // ------------------------------
  // Blog Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'blog_section',
    'title'    => esc_html__('Blog Settings', 'elito'),
    'icon'     => 'fa fa-edit',
    'sections' => array(

      // blog general section
      array(
        'name'     => 'blog_general_tab',
        'title'    => esc_html__('General', 'elito'),
        'icon'     => 'fa fa-cog',
        'fields'   => array(

          // Layout
          array(
            'type'    => 'notice',
            'class'   => 'info cs-elito-heading',
            'content' => esc_html__('Layout', 'elito')
          ),
          array(
            'id'             => 'blog_sidebar_position',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Position', 'elito'),
            'options'        => array(
              'sidebar-right' => esc_html__('Right', 'elito'),
              'sidebar-left' => esc_html__('Left', 'elito'),
              'sidebar-hide' => esc_html__('Hide', 'elito'),
            ),
            'default_option' => 'Select sidebar position',
            'help'          => esc_html__('This style will apply, default blog pages - Like : Archive, Category, Tags, Search & Author.', 'elito'),
            'info'          => esc_html__('Default option : Right', 'elito'),
          ),
          array(
            'id'             => 'blog_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'elito'),
            'options'        => elito_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'elito'),
            'dependency'     => array('blog_sidebar_position', '!=', 'sidebar-hide'),
            'info'          => esc_html__('Default option : Main Widget Area', 'elito'),
          ),
          // Layout
          // Global Options
          array(
            'type'    => 'notice',
            'class'   => 'info cs-elito-heading',
            'content' => esc_html__('Global Options', 'elito')
          ),
          array(
            'id'         => 'theme_exclude_categories',
            'type'       => 'checkbox',
            'title'      => esc_html__('Exclude Categories', 'elito'),
            'info'      => esc_html__('Select categories you want to exclude from blog page.', 'elito'),
            'options'    => 'categories',
          ),
          array(
            'id'      => 'theme_blog_excerpt',
            'type'    => 'text',
            'title'   => esc_html__('Excerpt Length', 'elito'),
            'info'   => esc_html__('Blog short content length, in blog listing pages.', 'elito'),
            'default' => '55',
          ),
          array(
            'id'      => 'theme_metas_hide',
            'type'    => 'checkbox',
            'title'   => esc_html__('Meta\'s to hide', 'elito'),
            'info'    => esc_html__('Check items you want to hide from blog/post meta field.', 'elito'),
            'class'      => 'horizontal',
            'options'    => array(
              'category'   => esc_html__('Category', 'elito'),
              'date'    => esc_html__('Date', 'elito'),
              'author'     => esc_html__('Author', 'elito'),
              'comments'      => esc_html__('Comments', 'elito'),
              'Tag'      => esc_html__('Tag', 'elito'),
            ),
            // 'default' => '30',
          ),
          // End fields

        )
      ),

      // blog single section
      array(
        'name'     => 'blog_single_tab',
        'title'    => esc_html__('Single', 'elito'),
        'icon'     => 'fa fa-sticky-note',
        'fields'   => array(

          // Start fields
          array(
            'type'    => 'notice',
            'class'   => 'info cs-elito-heading',
            'content' => esc_html__('Enable / Disable', 'elito')
          ),
          array(
            'id'    => 'single_featured_image',
            'type'  => 'switcher',
            'title' => esc_html__('Featured Image', 'elito'),
            'info' => esc_html__('If need to hide featured image from single blog post page, please turn this OFF.', 'elito'),
            'default' => true,
          ),
           array(
            'id'    => 'single_author_info',
            'type'  => 'switcher',
            'title' => esc_html__('Author Info', 'elito'),
            'info' => esc_html__('If need to hide author info on single blog page, please turn this On.', 'elito'),
            'default' => false,
          ),
          array(
            'id'    => 'single_share_option',
            'type'  => 'switcher',
            'title' => esc_html__('Share Option', 'elito'),
            'info' => esc_html__('If need to hide share option on single blog page, please turn this OFF.', 'elito'),
            'default' => true,
          ),
          array(
            'id'    => 'single_comment_form',
            'type'  => 'switcher',
            'title' => esc_html__('Comment Area/Form ?', 'elito'),
            'info' => esc_html__('If need to hide comment area and that form on single blog page, please turn this On.', 'elito'),
            'default' => false,
          ),
          array(
            'type'    => 'notice',
            'class'   => 'info cs-elito-heading',
            'content' => esc_html__('Sidebar', 'elito')
          ),
          array(
            'id'             => 'single_sidebar_position',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Position', 'elito'),
            'options'        => array(
              'sidebar-right' => esc_html__('Right', 'elito'),
              'sidebar-left' => esc_html__('Left', 'elito'),
              'sidebar-hide' => esc_html__('Hide', 'elito'),
            ),
            'default_option' => 'Select sidebar position',
            'info'          => esc_html__('Default option : Right', 'elito'),
          ),
          array(
            'id'             => 'single_blog_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'elito'),
            'options'        => elito_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'elito'),
            'dependency'     => array('single_sidebar_position', '!=', 'sidebar-hide'),
            'info'          => esc_html__('Default option : Main Widget Area', 'elito'),
          ),
          // End fields

        )
      ),

    ),
  );

if (class_exists( 'WooCommerce' )){
  // ------------------------------
  // WooCommerce Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'woocommerce_section',
    'title'    => esc_html__('WooCommerce', 'elito'),
    'icon'     => 'fa fa-shopping-basket',
    'fields' => array(

      // Start fields
      array(
        'type'    => 'notice',
        'class'   => 'info cs-elito-heading',
        'content' => esc_html__('Layout', 'elito')
      ),
     array(
        'id'             => 'woo_product_columns',
        'type'           => 'select',
        'title'          => esc_html__('Product Column', 'elito'),
        'options'        => array(
          2 => esc_html__('Two Column', 'elito'),
          3 => esc_html__('Three Column', 'elito'),
          4 => esc_html__('Four Column', 'elito'),
        ),
        'default_option' => esc_html__('Select Product Columns', 'elito'),
        'help'          => esc_html__('This style will apply, default woocommerce shop and archive pages.', 'elito'),
      ),
      array(
        'id'             => 'woo_sidebar_position',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Position', 'elito'),
        'options'        => array(
          'right-sidebar' => esc_html__('Right', 'elito'),
          'left-sidebar' => esc_html__('Left', 'elito'),
          'sidebar-hide' => esc_html__('Hide', 'elito'),
        ),
        'default_option' => esc_html__('Select sidebar position', 'elito'),
        'info'          => esc_html__('Default option : Right', 'elito'),
      ),
      array(
        'id'             => 'woo_widget',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Widget', 'elito'),
        'options'        => elito_registered_sidebars(),
        'default_option' => esc_html__('Select Widget', 'elito'),
        'dependency'     => array('woo_sidebar_position', '!=', 'sidebar-hide'),
        'info'          => esc_html__('Default option : Shop Page', 'elito'),
      ),

      array(
        'type'    => 'notice',
        'class'   => 'info cs-elito-heading',
        'content' => esc_html__('Listing', 'elito')
      ),
      array(
        'id'      => 'theme_woo_limit',
        'type'    => 'text',
        'title'   => esc_html__('Product Limit', 'elito'),
        'info'   => esc_html__('Enter the number value for per page products limit.', 'elito'),
      ),
      // End fields

      // Start fields
      array(
        'type'    => 'notice',
        'class'   => 'info cs-elito-heading',
        'content' => esc_html__('Single Product', 'elito')
      ),
      array(
        'id'             => 'woo_related_limit',
        'type'           => 'text',
        'title'          => esc_html__('Related Products Limit', 'elito'),
      ),
      array(
        'id'    => 'woo_single_upsell',
        'type'  => 'switcher',
        'title' => esc_html__('You May Also Like', 'elito'),
        'info' => esc_html__('If you don\'t want \'You May Also Like\' products in single product page, please turn this ON.', 'elito'),
        'default' => false,
      ),
      array(
        'id'    => 'woo_single_related',
        'type'  => 'switcher',
        'title' => esc_html__('Related Products', 'elito'),
        'info' => esc_html__('If you don\'t want \'Related Products\' in single product page, please turn this ON.', 'elito'),
        'default' => false,
      ),
      // End fields

    ),
  );
}

  // ------------------------------
  // Extra Pages
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_extra_pages',
    'title'    => esc_html__('404 & Maintenance', 'elito'),
    'icon'     => 'fa fa-cogs',
    'sections' => array(

      // error 404 page
      array(
        'name'     => 'error_page_section',
        'title'    => esc_html__('404 Page', 'elito'),
        'icon'     => 'fa fa-exclamation-triangle',
        'fields'   => array(

          // Start 404 Page
          array(
            'id'    => 'error_heading',
            'type'  => 'text',
            'title' => esc_html__('404 Page Heading', 'elito'),
            'info'  => esc_html__('Enter 404 page heading.', 'elito'),
          ),
          array(
            'id'    => 'error_subheading',
            'type'  => 'textarea',
            'title' => esc_html__('404 Page Sub Heading', 'elito'),
            'info'  => esc_html__('Enter 404 page Sub heading.', 'elito'),
          ),
          array(
            'id'    => 'error_page_content',
            'type'  => 'textarea',
            'title' => esc_html__('404 Page Content', 'elito'),
            'info'  => esc_html__('Enter 404 page content.', 'elito'),
            'shortcode' => true,
          ),
          array(
            'id'    => 'error_btn_text',
            'type'  => 'text',
            'title' => esc_html__('Button Text', 'elito'),
            'info'  => esc_html__('Enter BACK TO HOME button text. If you want to change it.', 'elito'),
          ),
          // End 404 Page

        ) // end: fields
      ), // end: fields section

      // maintenance mode page
      array(
        'name'     => 'maintenance_mode_section',
        'title'    => esc_html__('Maintenance Mode', 'elito'),
        'icon'     => 'fa fa-hourglass-half',
        'fields'   => array(

          // Start Maintenance Mode
          array(
            'type'    => 'notice',
            'class'   => 'info cs-elito-heading',
            'content' => esc_html__('If you turn this ON : Only Logged in users will see your pages. All other visiters will see, selected page of : <strong>Maintenance Mode Page</strong>', 'elito')
          ),
          array(
            'id'             => 'enable_maintenance_mode',
            'type'           => 'switcher',
            'title'          => esc_html__('Maintenance Mode', 'elito'),
            'default'        => false,
          ),
          array(
            'id'             => 'maintenance_mode_page',
            'type'           => 'select',
            'title'          => esc_html__('Maintenance Mode Page', 'elito'),
            'options'        => 'pages',
            'default_option' => esc_html__('Select a page', 'elito'),
            'dependency'   => array( 'enable_maintenance_mode', '==', 'true' ),
          ),
          array(
            'id'             => 'maintenance_mode_title',
            'type'           => 'text',
            'title'          => esc_html__('Maintenance Mode Text', 'elito'),
            'dependency'   => array( 'enable_maintenance_mode', '==', 'true' ),
          ),
          array(
            'id'             => 'maintenance_mode_text',
            'type'           => 'textarea',
            'title'          => esc_html__('Maintenance Mode Text', 'elito'),
            'dependency'   => array( 'enable_maintenance_mode', '==', 'true' ),
          ),
          array(
            'id'             => 'maintenance_mode_bg',
            'type'           => 'background',
            'title'          => esc_html__('Page Background', 'elito'),
            'dependency'   => array( 'enable_maintenance_mode', '==', 'true' ),
          ),
          // End Maintenance Mode

        ) // end: fields
      ), // end: fields section

    )
  );

  // ------------------------------
  // Advanced
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_advanced',
    'title'  => esc_html__('Advanced', 'elito'),
    'icon'   => 'fa fa-cog'
  );

  // ------------------------------
  // Misc Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'misc_section',
    'title'    => esc_html__('Advanced Settings', 'elito'),
    'icon'     => 'fa fa-sliders',
    'sections' => array(

      // custom sidebar section
      array(
        'name'     => 'custom_sidebar_section',
        'title'    => esc_html__('Custom Sidebar', 'elito'),
        'icon'     => 'fa fa-reorder',
        'fields'   => array(

          // start fields
          array(
            'id'              => 'custom_sidebar',
            'title'           => esc_html__('Sidebars', 'elito'),
            'desc'            => esc_html__('Go to Appearance -> Widgets after create sidebars', 'elito'),
            'type'            => 'group',
            'fields'          => array(
              array(
                'id'          => 'sidebar_name',
                'type'        => 'text',
                'title'       => esc_html__('Sidebar Name', 'elito'),
              ),
              array(
                'id'          => 'sidebar_desc',
                'type'        => 'text',
                'title'       => esc_html__('Custom Description', 'elito'),
              )
            ),
            'accordion'       => true,
            'button_title'    => esc_html__('Add New Sidebar', 'elito'),
            'accordion_title' => esc_html__('New Sidebar', 'elito'),
          ),
          // end fields

        )
      ),
      // custom sidebar section

      // Custom CSS/JS
      array(
        'name'        => 'custom_css_js_section',
        'title'       => esc_html__('Custom Codes', 'elito'),
        'icon'        => 'fa fa-code',

        // begin: fields
        'fields'      => array(
          // Start Custom CSS/JS
          array(
            'type'    => 'notice',
            'class'   => 'info cs-elito-heading',
            'content' => esc_html__('Custom JS', 'elito')
          ),
          array(
            'id'             => 'theme_custom_js',
            'type'           => 'textarea',
            'attributes' => array(
              'rows'     => 10,
              'placeholder'     => esc_html__('Enter your JS code here...', 'elito'),
            ),
          ),
          // End Custom CSS/JS

        ) // end: fields
      ),

      // Translation
      array(
        'name'        => 'theme_translation_section',
        'title'       => esc_html__('Translation', 'elito'),
        'icon'        => 'fa fa-language',

        // begin: fields
        'fields'      => array(

          // Start Translation
          array(
            'type'    => 'notice',
            'class'   => 'info cs-elito-heading',
            'content' => esc_html__('Common Texts', 'elito')
          ),
          array(
            'id'          => 'read_more_text',
            'type'        => 'text',
            'title'       => esc_html__('Read More Text', 'elito'),
          ),
          array(
            'id'          => 'view_more_text',
            'type'        => 'text',
            'title'       => esc_html__('View More Text', 'elito'),
          ),
          array(
            'id'          => 'share_text',
            'type'        => 'text',
            'title'       => esc_html__('Share Text', 'elito'),
          ),
          array(
            'id'          => 'share_on_text',
            'type'        => 'text',
            'title'       => esc_html__('Share On Tooltip Text', 'elito'),
          ),
          array(
            'id'          => 'author_text',
            'type'        => 'text',
            'title'       => esc_html__('Author Text', 'elito'),
          ),
          array(
            'id'          => 'post_comment_text',
            'type'        => 'text',
            'title'       => esc_html__('Post Comment Text [Submit Button]', 'elito'),
          ),
          array(
            'type'    => 'notice',
            'class'   => 'info cs-elito-heading',
            'content' => esc_html__('WooCommerce', 'elito')
          ),
          array(
            'id'          => 'add_to_cart_text',
            'type'        => 'text',
            'title'       => esc_html__('Add to Cart Text', 'elito'),
          ),
          array(
            'id'          => 'details_text',
            'type'        => 'text',
            'title'       => esc_html__('Details Text', 'elito'),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-elito-heading',
            'content' => esc_html__('Pagination', 'elito')
          ),
          array(
            'id'          => 'older_post',
            'type'        => 'text',
            'title'       => esc_html__('Older Posts Text', 'elito'),
          ),
          array(
            'id'          => 'newer_post',
            'type'        => 'text',
            'title'       => esc_html__('Newer Posts Text', 'elito'),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-elito-heading',
            'content' => esc_html__('Single Portfolio Pagination', 'elito')
          ),
          array(
            'id'          => 'prev_port',
            'type'        => 'text',
            'title'       => esc_html__('Prev Case Text', 'elito'),
          ),
          array(
            'id'          => 'next_port',
            'type'        => 'text',
            'title'       => esc_html__('Next Case Text', 'elito'),
          ),
          // End Translation

        ) // end: fields
      ),

    ),
  );

  
  // ------------------------------
  // backup                       -
  // ------------------------------
  $options[]   = array(
    'name'     => 'backup_section',
    'title'    => 'Backup',
    'icon'     => 'fa fa-shield',
    'fields'   => array(

      array(
        'type'    => 'notice',
        'class'   => 'warning',
        'content' => esc_html__('You can save your current options. Download a Backup and Import.', 'elito'),
      ),

      array(
        'type'    => 'backup',
      ),

    )
  );

  return $options;

}
add_filter( 'cs_framework_options', 'elito_options' );