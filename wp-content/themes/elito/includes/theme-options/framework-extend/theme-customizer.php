<?php
/*
 * All customizer related options for Elito theme.
 * Author & Copyright:wpoceans
 * URL: http://themeforest.net/user/wpoceans
 */

if( ! function_exists( 'elito_customizer' ) ) {
  function elito_customizer( $options ) {

	$options        = array(); // remove old options

	// Primary Color
	$options[]      = array(
	  'name'        => 'elemets_color_section',
	  'title'       => esc_html__('Primary Color', 'elito'),
	  'settings'    => array(

	    // Fields Start
			array(
				'name'      => 'all_element_colors',
				'default'   => '#59C378',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Elements Color', 'elito'),
						'info'    => esc_html__('This is theme primary color, means it\'ll affect all elements that have default color of our theme primary color.', 'elito'),
					),
				),
			),
			array(
				'name'      => 'all_element_bg_colors',
				'default'   => '#59C378',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Elements Background Color', 'elito'),
						'info'    => esc_html__('This is theme primary Hover background color, means it\'ll affect all elements that have default color of our theme primary background color.', 'elito'),
					),
				),
			),
	    // Fields End

	  )
	);
	// Primary Color

	// Preloader Color
	$options[]      = array(
	  'name'        => 'preloader_color_section',
	  'title'       => esc_html__('Preloader Color', 'elito'),
	  'settings'    => array(

	    // Fields Start
			array(
				'name'      => 'preloader_bg_colors',
				'default'   => '#59C378',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Preloader Color', 'elito'),
						'info'    => esc_html__('This is theme Preloader Background color, means it\'ll Preloader Background Color that have default color of our theme primary color.', 'elito'),
					),
				),
			),
	    // Fields End

	  )
	);
	// Primary Color

	// header Color
	$options[]      = array(
	  'name'        => 'topbar_color_section',
	  'title'       => esc_html__('01. Header Topbar Colors', 'elito'),
	  'settings'    => array(

	    // Fields Start
	    array(
				'name'          => 'topbar_bg_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('header Color', 'elito'),
					),
				),
			),
			array(
				'name'      => 'topbar_bg_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Background Color', 'elito'),
					),
				),
			),
			array(
				'name'          => 'topbar_text_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Common Color', 'elito'),
					),
				),
			),
			array(
				'name'      => 'topbar_text_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Header Topbar Text Color', 'elito'),
					),
				),
			),
			array(
				'name'      => 'topbar_icon_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('header Topbar Icon Color', 'elito'),
					),
				),
			),

	  )
	);
	// Header topbar Color

	// Menu Color
	$options[]      = array(
	  'name'        => 'header_color_section',
	  'title'       => esc_html__('02. Menu Colors', 'elito'),
	  'settings'    => array(

	    // Fields Start
			array(
				'name'          => 'header_main_menu_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Main Menu Colors', 'elito'),
					),
				),
			),
			array(
				'name'      => 'menu_bg_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Background Color', 'elito'),
					),
				),
			),
			array(
				'name'      => 'menu_link_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Link Color', 'elito'),
					),
				),
			),
			array(
				'name'      => 'menu_link_hover_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Link Hover Color', 'elito'),
					),
				),
			),

			// Sub Menu Color
			array(
				'name'          => 'header_submenu_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Sub-Menu Colors', 'elito'),
					),
				),
			),
			array(
				'name'      => 'submenu_bg_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Background Color', 'elito'),
					),
				),
			),
			array(
				'name'      => 'submenu_bg_hover_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Background Hover Color', 'elito'),
					),
				),
			),
			array(
				'name'      => 'submenu_link_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Link Color', 'elito'),
					),
				),
			),
			array(
				'name'      => 'submenu_link_hover_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Link Hover Color', 'elito'),
					),
				),
			),
	    // Fields End

			// Responsive Menu Color
			array(
				'name'          => 'header_responsive_menu_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Responsive Menu Colors', 'elito'),
					),
				),
			),
			array(
				'name'      => 'menu_responsive_menu_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Responsive Menu Color', 'elito'),
					),
				),
			),
			array(
				'name'      => 'menu_responsive_menu_hover_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Responsive Menu Hover Color', 'elito'),
					),
				),
			),
			array(
				'name'      => 'menu_responsive_menu_bg_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Responsive Menu Background', 'elito'),
					),
				),
			),
	    // Fields End

			//Menu Button Color
			array(
				'name'          => 'header_button_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Menu Button Colors', 'elito'),
					),
				),
			),
			array(
				'name'      => 'menu_button_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Button Color', 'elito'),
					),
				),
			),
			array(
				'name'      => 'menu_button_bg_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Button Background Color', 'elito'),
					),
				),
			),
	    // Fields End

	  )
	);
	// Header Color

	// Title Bar Color
	$options[]      = array(
	  'name'        => 'titlebar_section',
	  'title'       => esc_html__('03. Title Bar Colors', 'elito'),
    'settings'      => array(

    	// Fields Start
    	array(
				'name'          => 'titlebar_colors_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => __('<h2 style="margin: 0;text-align: center;">Title Colors</h2> <br /> This is common settings, if this settings not affect in your page. Please check your page metabox. You may set default settings there.', 'elito'),
					),
				),
			),
    	array(
				'name'      => 'titlebar_bg_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Title Bar Background Color', 'elito'),
					),
				),
			),
    	array(
				'name'      => 'titlebar_bg_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Title Bar Background Color', 'elito'),
					),
				),
			),
    	array(
				'name'      => 'titlebar_title_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Title Color', 'elito'),
					),
				),
			),

			array(
				'name'          => 'titlebar_breadcrumbs_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Breadcrumbs Colors', 'elito'),
					),
				),
			),
    	array(
				'name'      => 'breadcrumbs_text_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Text Color', 'elito'),
					),
				),
			),
			array(
				'name'      => 'breadcrumbs_link_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Link Color', 'elito'),
					),
				),
			),
			array(
				'name'      => 'breadcrumbs_link_hover_color',
				'control'   => array(
					'type'    => 'cs_field',
					'options' => array(
						'type'  => 'color_picker',
						'title' => esc_html__('Link Hover Color', 'elito'),
					),
				),
			),
	    // Fields End

	  )
	);
	// Title Bar Color

	// Content Color
	$options[]      = array(
	  'name'        => 'content_section',
	  'title'       => esc_html__('04. Content Colors', 'elito'),
	  'description' => esc_html__('This is all about content area text and heading colors.', 'elito'),
	  'sections'    => array(

	  	array(
	      'name'          => 'content_text_section',
	      'title'         => esc_html__('Content Text', 'elito'),
	      'settings'      => array(

			    // Fields Start
			    array(
						'name'      => 'body_color',
						'control'   => array(
							'type'    => 'cs_field',
							'options' => array(
								'type'  => 'color_picker',
								'title' => esc_html__('Body & Content Color', 'elito'),
							),
						),
					),
					array(
						'name'      => 'body_links_color',
						'control'   => array(
							'type'    => 'cs_field',
							'options' => array(
								'type'  => 'color_picker',
								'title' => esc_html__('Body Links Color', 'elito'),
							),
						),
					),
					array(
						'name'      => 'body_link_hover_color',
						'control'   => array(
							'type'    => 'cs_field',
							'options' => array(
								'type'  => 'color_picker',
								'title' => esc_html__('Body Links Hover Color', 'elito'),
							),
						),
					),
					array(
						'name'      => 'sidebar_content_color',
						'control'   => array(
							'type'    => 'cs_field',
							'options' => array(
								'type'  => 'color_picker',
								'title' => esc_html__('Sidebar Content Color', 'elito'),
							),
						),
					),
			    // Fields End
			  )
			),

			// Text Colors Section
			array(
	      'name'          => 'content_heading_section',
	      'title'         => esc_html__('Headings', 'elito'),
	      'settings'      => array(

	      	// Fields Start
					array(
						'name'      => 'content_heading_color',
						'control'   => array(
							'type'    => 'cs_field',
							'options' => array(
								'type'  => 'color_picker',
								'title' => esc_html__('Content Heading Color', 'elito'),
							),
						),
					),
	      	array(
						'name'      => 'sidebar_heading_color',
						'control'   => array(
							'type'    => 'cs_field',
							'options' => array(
								'type'  => 'color_picker',
								'title' => esc_html__('Sidebar Heading Color', 'elito'),
							),
						),
					),
			    // Fields End

      	)
      ),

	  )
	);
	// Content Color

	// Footer Color
	$options[]      = array(
	  'name'        => 'footer_section',
	  'title'       => esc_html__('05. Footer Colors', 'elito'),
	  'description' => esc_html__('This is all about footer settings. Make sure you\'ve enabled your needed section at : Elito > Theme Options > Footer ', 'elito'),
	  'sections'    => array(

			// Footer Widgets Block
	  	array(
	      'name'          => 'footer_widget_section',
	      'title'         => esc_html__('Widget Block', 'elito'),
	      'settings'      => array(

			    // Fields Start
					array(
			      'name'          => 'footer_widget_color_notice',
			      'control'       => array(
			        'type'        => 'cs_field',
			        'options'     => array(
			          'type'      => 'notice',
			          'class'     => 'info',
			          'content'   => esc_html__('Content Colors', 'elito'),
			        ),
			      ),
			    ),
					array(
						'name'      => 'footer_heading_color',
						'control'   => array(
							'type'    => 'cs_field',
							'options' => array(
								'type'  => 'color_picker',
								'title' => esc_html__('Widget Heading Color', 'elito'),
							),
						),
					),
					array(
						'name'      => 'footer_text_color',
						'control'   => array(
							'type'    => 'cs_field',
							'options' => array(
								'type'  => 'color_picker',
								'title' => esc_html__('Widget Text Color', 'elito'),
							),
						),
					),
					array(
						'name'      => 'footer_link_color',
						'control'   => array(
							'type'    => 'cs_field',
							'options' => array(
								'type'  => 'color_picker',
								'title' => esc_html__('Widget Link Color', 'elito'),
							),
						),
					),
					array(
						'name'      => 'footer_link_hover_color',
						'control'   => array(
							'type'    => 'cs_field',
							'options' => array(
								'type'  => 'color_picker',
								'title' => esc_html__('Widget Link Hover Color', 'elito'),
							),
						),
					),
					array(
						'name'      => 'footer_bg_color',
						'default'   => '#0a172b',
						'control'   => array(
							'type'    => 'cs_field',
							'options' => array(
								'type'  => 'color_picker',
								'title' => esc_html__('Background Color', 'elito'),
							),
						),
					),
			    // Fields End
			  )
			),
			// Footer Widgets Block

			// Footer Copyright Block
	  	array(
	      'name'          => 'footer_copyright_section',
	      'title'         => esc_html__('Copyright Block', 'elito'),
	      'settings'      => array(

			    // Fields Start
			    array(
			      'name'          => 'footer_copyright_active',
			      'control'       => array(
			        'type'        => 'cs_field',
			        'options'     => array(
			          'type'      => 'notice',
			          'class'     => 'info',
			          'content'   => esc_html__('Make sure you\'ve enabled copyright block in : <br /> <strong>Elito > Theme Options > Footer > Copyright Bar : Enable Copyright Block</strong>', 'elito'),
			        ),
			      ),
			    ),
					array(
						'name'      => 'copyright_text_color',
						'control'   => array(
							'type'    => 'cs_field',
							'options' => array(
								'type'  => 'color_picker',
								'title' => esc_html__('Text Color', 'elito'),
							),
						),
					),
					array(
						'name'      => 'copyright_link_color',
						'control'   => array(
							'type'    => 'cs_field',
							'options' => array(
								'type'  => 'color_picker',
								'title' => esc_html__('Link Color', 'elito'),
							),
						),
					),
					array(
						'name'      => 'copyright_link_hover_color',
						'control'   => array(
							'type'    => 'cs_field',
							'options' => array(
								'type'  => 'color_picker',
								'title' => esc_html__('Link Hover Color', 'elito'),
							),
						),
					),
					array(
						'name'      => 'copyright_bg_color',
						'control'   => array(
							'type'    => 'cs_field',
							'options' => array(
								'type'  => 'color_picker',
								'title' => esc_html__('Background Color', 'elito'),
							),
						),
					),
					array(
						'name'      => 'copyright_border_color',
						'default'   => 'rgba(255, 255, 255, 0.07)',
						'control'   => array(
							'type'    => 'cs_field',
							'options' => array(
								'type'  => 'color_picker',
								'title' => esc_html__('Border Color', 'elito'),
							),
						),
					),

			  )
			),
			// Footer Copyright Block

	  )
	);
	// Footer Color

	return $options;

  }
  add_filter( 'cs_customize_options', 'elito_customizer' );
}