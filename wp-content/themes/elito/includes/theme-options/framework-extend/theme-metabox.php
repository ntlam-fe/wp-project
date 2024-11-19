<?php
/*
 * All Metabox related options for Elito theme.
 * Author & Copyright:wpoceans
 * URL: http://themeforest.net/user/wpoceans
 */

function elito_metabox_options( $options ) {

 $cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
    $contact_forms = array();
    if ( $cf7 ) {
      foreach ( $cf7 as $cform ) {
        $contact_forms[ $cform->ID ] = $cform->post_title;
      }
    } else {
      $contact_forms[ esc_html__( 'No contact forms found', 'elito' ) ] = 0;
    }
  $options      = array();

  // -----------------------------------------
  // Post Metabox Options                    -
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'post_type_metabox',
    'title'     => esc_html__('Post Options', 'elito'),
    'post_type' => 'post',
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

      // All Post Formats
      array(
        'name'   => 'section_post_formats',
        'fields' => array(

          // Standard, Image
          array(
            'title' => 'Standard Image',
            'type'  => 'subheading',
            'content' => esc_html__('There is no Extra Option for this Post Format!', 'elito'),
            'wrap_class' => 'elito-minimal-heading hide-title',
          ),
          // Standard, Image

          // Gallery
          array(
            'type'    => 'notice',
            'title'   => 'Gallery Format',
            'wrap_class' => 'hide-title',
            'class'   => 'info cs-elito-heading',
            'content' => esc_html__('Gallery Format', 'elito')
          ),
          array(
            'id'          => 'gallery_post_format',
            'type'        => 'gallery',
            'title'       => esc_html__('Add Gallery', 'elito'),
            'add_title'   => esc_html__('Add Image(s)', 'elito'),
            'edit_title'  => esc_html__('Edit Image(s)', 'elito'),
            'clear_title' => esc_html__('Clear Image(s)', 'elito'),
          ),
          array(
            'type'    => 'text',
            'title'   => esc_html__('Add Video URL', 'elito' ),
            'id'   => 'video_post_format',
            'desc' => esc_html__('Add youtube or vimeo video link', 'elito' ),
            'wrap_class' => 'video_post_format',
          ),
          array(
            'type'    => 'icon',
            'title'   => esc_html__('Add Quote Icon', 'elito' ),
            'id'   => 'quote_post_format',
            'desc' => esc_html__('Add Quote Icon here', 'elito' ),
            'wrap_class' => 'quote_post_format',
          ),
          // Gallery

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Page Metabox Options                    -
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'page_type_metabox',
    'title'     => esc_html__('Page Custom Options', 'elito'),
    'post_type' => array('post', 'page'),
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

      // Title Section
      array(
        'name'  => 'page_topbar_section',
        'title' => esc_html__('Top Bar', 'elito'),
        'icon'  => 'fa fa-minus',

        // Fields Start
        'fields' => array(

          array(
            'id'           => 'topbar_options',
            'type'         => 'image_select',
            'title'        => esc_html__('Topbar', 'elito'),
            'options'      => array(
              'default'     => ELITO_CS_IMAGES .'/topbar-default.png',
              'custom'      => ELITO_CS_IMAGES .'/topbar-custom.png',
              'hide_topbar' => ELITO_CS_IMAGES .'/topbar-hide.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'hide_topbar_select',
            ),
            'radio'     => true,
            'default'   => 'default',
          ),
          array(
            'id'          => 'top_left',
            'type'        => 'textarea',
            'title'       => esc_html__('Top Left', 'elito'),
            'dependency'  => array('hide_topbar_select', '==', 'custom'),
            'shortcode'       => true,
          ),
          array(
            'id'          => 'top_right',
            'type'        => 'textarea',
            'title'       => esc_html__('Top Right', 'elito'),
            'dependency'  => array('hide_topbar_select', '==', 'custom'),
            'shortcode'       => true,
          ),
          array(
            'id'    => 'topbar_bg',
            'type'  => 'color_picker',
            'title' => esc_html__('Topbar Background Color', 'elito'),
            'dependency'  => array('hide_topbar_select', '==', 'custom'),
          ),
          array(
            'id'    => 'topbar_border',
            'type'  => 'color_picker',
            'title' => esc_html__('Topbar Border Color', 'elito'),
            'dependency'  => array('hide_topbar_select', '==', 'custom'),
          ),

        ), // End : Fields

      ), // Title Section

      // Header
      array(
        'name'  => 'header_section',
        'title' => esc_html__('Header', 'elito'),
        'icon'  => 'fa fa-bars',
        'fields' => array(

          array(
            'id'           => 'select_header_design',
            'type'         => 'image_select',
            'title'        => esc_html__('Select Header Design', 'elito'),
            'options'      => array(
              'default'     => ELITO_CS_IMAGES .'/hs-0.png',
              'style_one'   => ELITO_CS_IMAGES .'/hs-1.png',
              'style_two'   => ELITO_CS_IMAGES .'/hs-2.png',
              'style_three'   => ELITO_CS_IMAGES .'/hs-3.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'header_design',
            ),
            'radio'     => true,
            'default'   => 'default',
            'info'      => esc_html__('Select your header design, following options will may differ based on your selection of header design.', 'elito'),
          ),
          array(
            'id'    => 'transparency_header',
            'type'  => 'switcher',
            'title' => esc_html__('Transparent Header', 'elito'),
            'info' => esc_html__('Use Transparent Method', 'elito'),
          ),
          array(
            'id'    => 'transparent_menu_color',
            'type'  => 'color_picker',
            'title' => esc_html__('Menu Color', 'elito'),
            'info' => esc_html__('Pick your menu color. This color will only apply for non-sticky header mode.', 'elito'),
            'dependency'   => array('transparency_header', '==', 'true'),
          ),
          array(
            'id'    => 'transparent_menu_hover_color',
            'type'  => 'color_picker',
            'title' => esc_html__('Menu Hover Color', 'elito'),
            'info' => esc_html__('Pick your menu hover color. This color will only apply for non-sticky header mode.', 'elito'),
            'dependency'   => array('transparency_header', '==', 'true'),
          ),
          array(
            'id'             => 'choose_menu',
            'type'           => 'select',
            'title'          => esc_html__('Choose Menu', 'elito'),
            'desc'          => esc_html__('Choose custom menus for this page.', 'elito'),
            'options'        => 'menus',
            'default_option' => esc_html__('Select your menu', 'elito'),
          ),

          // Enable & Disable
          array(
            'type'    => 'notice',
            'class'   => 'info cs-elito-heading',
            'content' => esc_html__('Enable & Disable', 'elito'),
            'dependency' => array('header_design', '!=', 'default'),
          ),
        ),
      ),
      // Header

      // Banner & Title Area
      array(
        'name'  => 'banner_title_section',
        'title' => esc_html__('Banner & Title Area', 'elito'),
        'icon'  => 'fa fa-bullhorn',
        'fields' => array(

          array(
            'id'        => 'banner_type',
            'type'      => 'select',
            'title'     => esc_html__('Choose Banner Type', 'elito'),
            'options'   => array(
              'default-title'    => 'Default Title',
              'revolution-slider' => 'Shortcode [Rev Slider]',
              'hide-title-area'   => 'Hide Title/Banner Area',
            ),
          ),
          array(
            'id'    => 'page_revslider',
            'type'  => 'textarea',
            'title' => esc_html__('Revolution Slider or Any Shortcodes', 'elito'),
            'desc' => __('Enter any shortcodes that you want to show in this page title area. <br />Eg : Revolution Slider shortcode.', 'elito'),
            'attributes' => array(
              'placeholder' => esc_html__('Enter your shortcode...', 'elito'),
            ),
            'dependency'   => array('banner_type', '==', 'revolution-slider'),
          ),
          array(
            'id'    => 'page_custom_title',
            'type'  => 'text',
            'title' => esc_html__('Custom Title', 'elito'),
            'attributes' => array(
              'placeholder' => esc_html__('Enter your custom title...', 'elito'),
            ),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'        => 'title_area_spacings',
            'type'      => 'select',
            'title'     => esc_html__('Title Area Spacings', 'elito'),
            'options'   => array(
              'padding-default' => esc_html__('Default Spacing', 'elito'),
              'padding-custom' => esc_html__('Custom Padding', 'elito'),
            ),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'title_top_spacings',
            'type'  => 'text',
            'title' => esc_html__('Top Spacing', 'elito'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('banner_type|title_area_spacings', '==|==', 'default-title|padding-custom'),
          ),
          array(
            'id'    => 'title_bottom_spacings',
            'type'  => 'text',
            'title' => esc_html__('Bottom Spacing', 'elito'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('banner_type|title_area_spacings', '==|==', 'default-title|padding-custom'),
          ),
          array(
            'id'    => 'title_area_bg',
            'type'  => 'background',
            'title' => esc_html__('Background', 'elito'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'titlebar_bg_overlay_color',
            'type'  => 'color_picker',
            'title' => esc_html__('Overlay Color', 'elito'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'title_color',
            'type'  => 'color_picker',
            'title' => esc_html__('Title Color', 'elito'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),

        ),
      ),
      // Banner & Title Area

      // Content Section
      array(
        'name'  => 'page_content_options',
        'title' => esc_html__('Content Options', 'elito'),
        'icon'  => 'fa fa-file',

        'fields' => array(

          array(
            'id'        => 'content_spacings',
            'type'      => 'select',
            'title'     => esc_html__('Content Spacings', 'elito'),
            'options'   => array(
              'padding-default' => esc_html__('Default Spacing', 'elito'),
              'padding-custom' => esc_html__('Custom Padding', 'elito'),
            ),
            'desc' => esc_html__('Content area top and bottom spacings.', 'elito'),
          ),
          array(
            'id'    => 'content_top_spacings',
            'type'  => 'text',
            'title' => esc_html__('Top Spacing', 'elito'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('content_spacings', '==', 'padding-custom'),
          ),
          array(
            'id'    => 'content_bottom_spacings',
            'type'  => 'text',
            'title' => esc_html__('Bottom Spacing', 'elito'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('content_spacings', '==', 'padding-custom'),
          ),
          array(
            'id'    => 'box_style',
            'type'  => 'switcher',
            'title' => esc_html__('Content Box Style', 'elito'),
            'label' => esc_html__('Yes, Please do it.', 'elito'),
          ),
        ), // End Fields
      ), // Content Section

      // Enable & Disable
      array(
        'name'  => 'hide_show_section',
        'title' => esc_html__('Enable & Disable', 'elito'),
        'icon'  => 'fa fa-toggle-on',
        'fields' => array(

          array(
            'id'    => 'hide_header',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Header', 'elito'),
            'label' => esc_html__('Yes, Please do it.', 'elito'),
          ),
          array(
            'id'    => 'hide_breadcrumbs',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Breadcrumbs', 'elito'),
            'label' => esc_html__('Yes, Please do it.', 'elito'),
          ),
          array(
            'id'    => 'hide_footer',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Footer', 'elito'),
            'label' => esc_html__('Yes, Please do it.', 'elito'),
          ),
       
        ),
      ),
      // Enable & Disable

    ),
  );

  // -----------------------------------------
  // Page Layout
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'page_layout_options',
    'title'     => esc_html__('Page Layout', 'elito'),
    'post_type' => 'page',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'page_layout_section',
        'fields' => array(

          array(
            'id'        => 'page_layout',
            'type'      => 'image_select',
            'options'   => array(
              'full-width'    => ELITO_CS_IMAGES . '/page-1.png',
              'extra-width'   => ELITO_CS_IMAGES . '/page-2.png',
              'left-sidebar'  => ELITO_CS_IMAGES . '/page-3.png',
              'right-sidebar' => ELITO_CS_IMAGES . '/page-4.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'page_layout',
            ),
            'default'    => 'full-width',
            'radio'      => true,
            'wrap_class' => 'text-center',
          ),
          array(
            'id'            => 'page_sidebar_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'elito'),
            'options'        => elito_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'elito'),
            'dependency'   => array('page_layout', 'any', 'left-sidebar,right-sidebar'),
          ),

        ),
      ),

    ),
  );

 // -----------------------------------------
  // Team
  // -----------------------------------------

  $options[]    = array(
    'id'        => 'team_options',
    'title'     => esc_html__('Team Meta', 'elito'),
    'post_type' => 'team',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(
      array(
        'name'   => 'team_infos',
        'fields' => array(
          array(
            'title'   => esc_html__('Team Title', 'elito'),
            'id'      => 'team_title',
            'type'    => 'text',
            'attributes' => array(
              'placeholder' => esc_html__('Jhon Deno', 'elito'),
            ),
            'info'    => esc_html__('Write Team Title.', 'elito'),

          ),
          array(
            'title'   => esc_html__('Team Sub Title', 'elito'),
            'id'      => 'team_subtitle',
            'type'    => 'text',
             'attributes' => array(
              'placeholder' => esc_html__('Planner', 'elito'),
            ),
            'info'    => esc_html__('Write Team Sub Title.', 'elito'),
          ),
          // Start fields
          array(
            'id'                  => 'team_infos',
            'title'   => esc_html__('Team Info', 'elito'),
            'type'                => 'group',
            'fields'              => array(
              array(
                'id'              => 'info_title',
                'type'            => 'text',
                'title'           => esc_html__('Info Title', 'elito'),
              ),
              array(
                'id'              => 'info_desc',
                'type'            => 'text',
                'title'           => esc_html__('Info Description', 'elito'),
              ),
            ),
            'button_title'        => esc_html__('Add Team info', 'elito'),
            'accordion_title'     => esc_html__('team Info', 'elito'),
          ),
          array(
            'id'                  => 'team_socials',
            'title'   => esc_html__('Team Social', 'elito'),
            'type'                => 'group',
            'fields'              => array(
              array(
                'id'              => 'team_social_icon',
                'type'            => 'icon',
                'title'           => esc_html__('Social Icon', 'elito'),
              ),
              array(
                'id'              => 'team_social_link',
                'type'            => 'text',
                'title'           => esc_html__('URL', 'elito'),
              ),
            ),
            'button_title'        => esc_html__('Add Social Icon', 'elito'),
            'accordion_title'     => esc_html__('Social Icons', 'elito'),
          ),
         array(
            'id'           => 'team_image',
            'type'         => 'image',
            'title'        => esc_html__('Team Grid Image', 'elito'),
            'add_title' => esc_html__('Team Image', 'elito'),
            'info'    => esc_html__('Attached Team Grid Image.', 'elito'),
          ),

        ),
      ),
    ),
  );

// -----------------------------------------
  // Project
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'project_options',
    'title'     => esc_html__('Project Extra Options', 'elito'),
    'post_type' => 'project',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'project_option_section',
        'fields' => array(
          array(
            'id'           => 'project_title',
            'type'         => 'text',
            'title'        => esc_html__('Project title', 'elito'),
            'add_title' => esc_html__('Add Project title', 'elito'),
            'attributes' => array(
              'placeholder' => esc_html__('Project Title', 'elito'),
            ),
            'info'    => esc_html__('Write Project Title.', 'elito'),
          ), 
          array(
            'id'           => 'project_image',
            'type'         => 'image',
            'title'        => esc_html__('Project Image', 'elito'),
            'add_title' => esc_html__('Add Project Image', 'elito'),
          ),
           // Start fields
        ),
      ),

    ),
  );



 // -----------------------------------------
  // Service
  // -----------------------------------------

  $options[]    = array(
    'id'        => 'service_options',
    'title'     => esc_html__('Service Meta', 'cleener'),
    'post_type' => 'service',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(
      array(
        'name'   => 'service_infos',
        'fields' => array(
         array(
            'id'           => 'service_icon',
            'type'         => 'icon',
            'title'        => esc_html__('Service Icon', 'cleener'),
            'add_title' => esc_html__('Service icon', 'cleener'),
            'info'    => esc_html__('Attached Service icon.', 'cleener'),
          ),
         array(
            'id'      => 'services_cat',
            'type'    => 'select',
            'title'   => esc_html__('Service Category', 'cleener'),
            'info'    => esc_html__('Check items you want to show from service.', 'cleener'),
            'class'      => 'horizontal',
            'options'    => array(
              'development'   => esc_html__('Development', 'cleener'),
              'design'    => esc_html__('Design', 'cleener'),
              'marketing'    => esc_html__('Marketing', 'cleener'),
            ),
            // 'default' => '30',
          ),

        ),
      ),
    ),
  );



if (class_exists( 'WooCommerce' )){ 
   // -----------------------------------------
    // Product
    // -----------------------------------------
    $options[]    = array(
      'id'        => 'elito_woocommerce_section',
      'title'     => esc_html__('Product Custom Options', 'elito'),
      'post_type' => 'product',
      'context'   => 'normal',
      'priority'  => 'high',
      'sections'  => array(

        // All Post Formats
        array(
          'name'   => 'elito_single_title',
          'fields' => array(
            array(
              'id'          => 'elito_product_title',
              'type'        => 'text',
              'title'       => esc_html__('Single Title', 'elito'),
              'attributes' => array(
                'placeholder' => 'The Title Gose Here'
              ),
            ),
            array(
              'id'           => 'product_grid',
              'type'         => 'image',
              'title'        => esc_html__('Grid  Image', 'elito'),
              'add_title' => esc_html__('Add Grid  Image', 'elito'),
            ),

          ),
        ),

      ),
    );
}
// -----------------------------------------
  // Donation Forms
  // -----------------------------------------
  $options[]    = array(
    'id'        => '_donation_form_metabox',
    'title'     => esc_html__('Donation Deadline', 'elito'),
    'post_type' => 'give_forms',
    'context'   => 'normal',
    'priority'  => 'high',
    'sections'  => array(

      // All Post Formats
      array(
        'name'   => 'section_deadline',
        'fields' => array(
          array(
            'id'          => 'donation_deadline',
            'type'        => 'text',
            'title'       => esc_html__('Deadline Date', 'elito'),
            'attributes' => array(
              'placeholder' => 'DD/MM/YYYY'
            ),
          ),
          // Gallery

        ),
      ),

    ),
  );
  
  // -----------------------------------------
  // Causes
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'causes_options',
    'title'     => esc_html__('Causes Extra Options', 'elito'),
    'post_type' => 'give_forms',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'causes_option_section',
        'fields' => array(
         array(
            'id'           => 'causes_image',
            'type'         => 'image',
            'title'        => esc_html__('Causes Image', 'elito'),
            'add_title' => esc_html__('Add Causes Image', 'elito'),
          ),
         array(
            'id'           => 'case_form_title',
            'type'         => 'text',
            'default'    => 'Donate Now',
            'title'        => esc_html__('Form Title', 'elito'),
            'add_title' => esc_html__('Add Form Title here', 'elito'),
          ),
        ),
      ),

    ),
  );

  // -----------------------------------------
  // post options
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'post_options',
    'title'     => esc_html__('Grid Image', 'elito'),
    'post_type' => 'post',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(
      array(
        'name'   => 'post_option_section',
        'fields' => array(
          array(
            'id'           => 'widget_post_title',
            'type'         => 'text',
            'title'        => esc_html__('Widget Post Title', 'elito'),
            'add_title' => esc_html__('Add Widget Post Title here', 'elito'),
          ),
          array(
            'id'           => 'grid_image',
            'type'         => 'image',
            'title'        => esc_html__('Post Grid Image', 'elito'),
            'add_title' => esc_html__('Add Post Grid Image', 'elito'),
          ),
        ),
      ),

    ),
  );


  return $options;

}
add_filter( 'cs_metabox_options', 'elito_metabox_options' );