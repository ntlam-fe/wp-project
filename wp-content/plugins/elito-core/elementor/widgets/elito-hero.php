<?php
/*
 * Elementor Elito Hero Widget
 * Author & Copyright: wpoceans
*/

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Elito_Hero extends Widget_Base
{

	/**
	 * Retrieve the widget name.
	 */
	public function get_name()
	{
		return 'wpo-elito_hero';
	}

	/**
	 * Retrieve the widget title.
	 */
	public function get_title()
	{
		return esc_html__('Hero', 'elito-core');
	}

	/**
	 * Retrieve the widget icon.
	 */
	public function get_icon()
	{
		return 'ti-panel';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 */
	public function get_categories()
	{
		return ['wpoceans-category'];
	}

	/**
	 * Retrieve the list of scripts the Elito Hero widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	 */
	public function get_script_depends()
	{
		return ['wpo-elito_hero'];
	}

	/**
	 * Register Elito Hero widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 */
	protected function register_controls()
	{

		$this->start_controls_section(
			'section_hero',
			[
				'label' => esc_html__('Hero Options', 'elito-core'),
			]
		);
		$this->add_control(
			'hero_style',
			[
				'label' => esc_html__('Hero Style', 'elito-core'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__('Style One', 'elito-core'),
					'style-two' => esc_html__('Style Two', 'elito-core'),
				],
				'default' => 'style-one',
				'description' => esc_html__('Select your hero style.', 'elito-core'),
			]
		);
		$this->add_control(
			'hero_toptitle',
			[
				'label' => esc_html__('Top Title Text', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Hello', 'elito-core'),
				'placeholder' => esc_html__('Type subtitle text here', 'elito-core'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'hero_title',
			[
				'label' => esc_html__('Title Text', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Title Text Here ', 'elito-core'),
				'placeholder' => esc_html__('Type title text here', 'elito-core'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'hero_subtitle',
			[
				'label' => esc_html__('Sub Title Text', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Sub Title Text Here ', 'elito-core'),
				'placeholder' => esc_html__('Type subtitle text here', 'elito-core'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'slider_content',
			[
				'label' => esc_html__('Slider content', 'elito-core'),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => 'Slider Details content',
				'placeholder' => esc_html__('Type slide content here', 'elito-core'),
			]
		);
		$this->add_control(
			'btn_text',
			[
				'label' => esc_html__('Button Text', 'elito-core'),
				'default' => esc_html__('button text', 'elito-core'),
				'placeholder' => esc_html__('Type button Text here', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'btn_link',
			[
				'label' => esc_html__('Button Link', 'elito-core'),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url' => '',
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'experience_icon',
			[
				'label' => __('Icon', 'elito-core'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'condition' => [
					'hero_style' => array('style-one'),
				],
				'default' => [
					'value' => 'fi flaticon-verified',
					'library' => 'solid',
				],
			]
		);
		$this->add_control(
			'experience_number',
			[
				'label' => esc_html__('Experience Number', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'condition' => [
					'hero_style' => array('style-one'),
				],
				'default' => esc_html__('1500+', 'elito-core'),
				'placeholder' => esc_html__('Type experience Number here', 'elito-core'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'experience_title',
			[
				'label' => esc_html__('Experience Title', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'condition' => [
					'hero_style' => array('style-one'),
				],
				'default' => esc_html__('Complete Project ', 'elito-core'),
				'placeholder' => esc_html__('Type experience title here', 'elito-core'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'hero_image',
			[
				'label' => esc_html__('Hero Image', 'elito-core'),
				'type' => Controls_Manager::MEDIA,
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__('Set your image.', 'elito-core'),
			]
		);
		$this->add_control(
			'hero_shape',
			[
				'label' => esc_html__('Hero Shape', 'elito-core'),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'hero_style' => array('style-one'),
				],
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__('Set your shape.', 'elito-core'),
			]
		);
		$this->add_control(
			'hero_shape_two',
			[
				'label' => esc_html__('Hero Shape Two', 'elito-core'),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'hero_style' => array('style-one'),
				],
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__('Set your shape.', 'elito-core'),
			]
		);
		$this->end_controls_section(); // end: Section

		$this->start_controls_section(
			'section_social_icon',
			[
				'label' => esc_html__('Icon Options', 'elito-core'),
				'condition' => [
					'hero_style' => array('style-one'),
				],
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'social_title',
			[
				'label' => esc_html__('Title Text', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Title Text', 'elito-core'),
				'placeholder' => esc_html__('Type title text here', 'elito-core'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'hero_icon',
			[
				'label' => __('Icon', 'elito-core'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fi flaticon-verified',
					'library' => 'solid',
				],
			]
		);
		$this->add_control(
			'socialItem_groups',
			[
				'label' => esc_html__('Icon Item', 'elito-core'),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'social_title' => esc_html__('Icon', 'elito-core'),
					],

				],
				'fields' =>  $repeater->get_controls(),
				'title_field' => '{{{ social_title }}}',
			]
		);
		$this->end_controls_section(); // end: Section

		// Hero BG
		$this->start_controls_section(
			'section_hero_bg_style',
			[
				'label' => esc_html__('Background', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'hero_3_color',
			[
				'label' => esc_html__('Shape Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'hero_style' => array('style-two'),
				],
				'selectors' => [
					'{{WRAPPER}} .dark_svg svg' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'hero_shape_color',
			[
				'label' => esc_html__('Shape 1 Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'hero_style' => array('style-one'),
				],
				'selectors' => [
					'{{WRAPPER}} .static-hero .shape-1 svg circle' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'hero_shape_2_color',
			[
				'label' => esc_html__('Shape 2 Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'hero_style' => array('style-one'),
				],
				'selectors' => [
					'{{WRAPPER}} .static-hero .shape-2 svg circle' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'hero_shape_3_color',
			[
				'label' => esc_html__('Shape 3 Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'hero_style' => array('style-one'),
				],
				'selectors' => [
					'{{WRAPPER}} .static-hero .shape-3 svg circle' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section


		// Top Title
		$this->start_controls_section(
			'section_top_title_style',
			[
				'label' => esc_html__('Top Title', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'elito-core'),
				'name' => 'elito_top_title_typography',
				'selector' => '{{WRAPPER}} .elito-hero .hero-inner .slide-content .slide-title h2 span,.static-hero .slide-title h2 span',
			]
		);
		$this->add_control(
			'top_title_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elito-hero .hero-inner .slide-content .slide-title h2 span, .static-hero .slide-title h2 span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'top_title_padding',
			[
				'label' => esc_html__('Title Padding', 'elito-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .elito-hero .hero-inner .slide-content .slide-title h2 span, .static-hero .slide-title h2 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Title
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__('Title', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'elito-core'),
				'name' => 'elito_title_typography',
				'selector' => '{{WRAPPER}} .elito-hero .hero-inner .slide-content .slide-title h2, .static-hero .slide-title h2',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elito-hero .hero-inner .slide-content .slide-title h2, .static-hero .slide-title h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_padding',
			[
				'label' => esc_html__('Title Padding', 'elito-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .elito-hero .hero-inner .slide-content .slide-title h2, .static-hero .slide-title h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Sub Title
		$this->start_controls_section(
			'section_subtitle_style',
			[
				'label' => esc_html__('Sub Title', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'elito-core'),
				'name' => 'sub_title_typography',
				'selector' => '{{WRAPPER}} .elito-hero .hero-inner .slide-content .slide-sub-title h5, .static-hero .slide-sub-title h5',
			]
		);
		$this->add_control(
			'subtitle_fill_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elito-hero .hero-inner .slide-content .slide-sub-title h5, .static-hero .slide-sub-title h5' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'subtitle_padding',
			[
				'label' => __('Sub Title Padding', 'elito-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .elito-hero .hero-inner .slide-content .slide-sub-title h5, .static-hero .slide-sub-title h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Content
		$this->start_controls_section(
			'section_content_style',
			[
				'label' => esc_html__('Content', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'elito-core'),
				'name' => 'hero_content_typography',
				'selector' => '{{WRAPPER}} .elito-hero .hero-inner .slide-content .slide-text p, .static-hero .slide-text p',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elito-hero .hero-inner .slide-content .slide-text p, .static-hero .slide-text p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'content_padding',
			[
				'label' => esc_html__('Content Padding', 'elito-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .elito-hero .hero-inner .slide-content .slide-text p, .static-hero .slide-text p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Button
		$this->start_controls_section(
			'section_button_style',
			[
				'label' => esc_html__('Button', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_one_typography',
				'label' => esc_html__('Typography', 'elito-core'),
				'selector' => '{{WRAPPER}} .elito-hero .slide-btn .theme-btn',
			]
		);
		$this->start_controls_tabs('button_one_style');
		$this->start_controls_tab(
			'button_one_normal',
			[
				'label' => esc_html__('Normal', 'elito-core'),
			]
		);
		$this->add_control(
			'button_one_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elito-hero .slide-btn .theme-btn' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_one_bg_color',
			[
				'label' => esc_html__('BG Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elito-hero .slide-btn .theme-btn' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_padding',
			[
				'label' => esc_html__('Padding', 'elito-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .elito-hero .slide-btn .theme-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();  // end:Normal tab

		$this->start_controls_tab(
			'button_one_hover',
			[
				'label' => esc_html__('Hover', 'elito-core'),
			]
		);
		$this->add_control(
			'button_one_hover_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elito-hero .slide-btn .theme-btn:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'button_one_hover_bg_color',
				'label' => esc_html__('Hover Background', 'elito-core'),
				'description' => esc_html__('Button Color', 'elito-core'),
				'types' => ['gradient'],
				'selector' => '{{WRAPPER}} .elito-hero .slide-btn .theme-btn:hover',
			]
		);
		$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs

		$this->end_controls_section(); // end: Section


		// Experience
		$this->start_controls_section(
			'section_exper_style',
			[
				'label' => esc_html__('Experience', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'hero_style' => array('style-one'),
				],
			]
		);
		$this->add_control(
			'exper_number_color',
			[
				'label' => esc_html__('Number Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .static-hero .static-hero-right .project .p-text h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'exper_title_color',
			[
				'label' => esc_html__('Title Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .static-hero .static-hero-right .project .p-text p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'exper_bg_color',
			[
				'label' => esc_html__('BG Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .static-hero .static-hero-right .project' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Icon
		$this->start_controls_section(
			'section_social_style',
			[
				'label' => esc_html__('Icon', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'hero_style' => array('style-one'),
				],
			]
		);
		$this->add_control(
			'social_color',
			[
				'label' => esc_html__('BG Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .static-hero .static-hero-right .icon-1, .static-hero .static-hero-right .icon-2, .static-hero .static-hero-right .icon-3' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

	}

	/**
	 * Render Hero widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$socialItem_groups = !empty($settings['socialItem_groups']) ? $settings['socialItem_groups'] : [];
		$hero_style = !empty($settings['hero_style']) ? $settings['hero_style'] : '';
		$hero_toptitle = !empty($settings['hero_toptitle']) ? $settings['hero_toptitle'] : '';
		$hero_title = !empty($settings['hero_title']) ? $settings['hero_title'] : '';
		$hero_subtitle = !empty($settings['hero_subtitle']) ? $settings['hero_subtitle'] : '';
		$slider_content = !empty($settings['slider_content']) ? $settings['slider_content'] : '';

		$experience_title = !empty($settings['experience_title']) ? $settings['experience_title'] : '';
		$experience_number = !empty($settings['experience_number']) ? $settings['experience_number'] : '';

		$experience_icon = !empty($settings['experience_icon']['value']) ? $settings['experience_icon']['value'] : '';
		$experience_svg_url = !empty($settings['experience_icon']['value']['url']) ? $settings['experience_icon']['value']['url'] : '';
		$svg_alt = get_post_meta($experience_svg_url, '_wp_attachment_image_alt', true);


		$bg_image = !empty($settings['hero_image']['id']) ? $settings['hero_image']['id'] : '';
		$shape_image = !empty($settings['hero_shape']['id']) ? $settings['hero_shape']['id'] : '';
		$shape_image2 = !empty($settings['hero_shape_two']['id']) ? $settings['hero_shape_two']['id'] : '';

		$button_text = !empty($settings['btn_text']) ? $settings['btn_text'] : '';
		$button_link = !empty($settings['btn_link']['url']) ? $settings['btn_link']['url'] : '';
		$button_link_external = !empty($settings['btn_link']['is_external']) ? 'target="_blank"' : '';
		$button_link_nofollow = !empty($settings['btn_link']['nofollow']) ? 'rel="nofollow"' : '';
		$button_link_attr = !empty($button_link) ?  $button_link_external . ' ' . $button_link_nofollow : '';

		// Image
		$image_url = wp_get_attachment_url($bg_image);
		$image_alt = get_post_meta($bg_image, '_wp_attachment_image_alt', true);

		// Image
		$shape_url = wp_get_attachment_url($shape_image);
		$shape_alt = get_post_meta($shape_image, '_wp_attachment_image_alt', true);

		// Image
		$shape2_url = wp_get_attachment_url($shape_image2);
		$shape2_alt = get_post_meta($shape_image2, '_wp_attachment_image_alt', true);

		$elito_button = $button_link ? '<a href="' . esc_url($button_link) . '" ' . $button_link_attr . ' class="btn theme-btn">' . esc_html($button_text) . '</a>' : '';


		// Turn output buffer on
		ob_start();
		if ($hero_style == 'style-one') { ?>

			<div class="static-hero elito-hero">
				<div class="hero-container">
					<div class="hero-inner">
						<div class="container">
							<div class="row align-items-center">
								<div class="col-xl-6 col-lg-6 col-12">
									<div class="wpo-static-hero-inner">

										<div data-swiper-parallax="300" class="slide-title">
											<h2>
												<?php if ($hero_toptitle) { ?>
													<span><?php echo esc_html($hero_toptitle); ?></span>
												<?php }
												echo esc_html($hero_title);
												?>
											</h2>
										</div>
										<?php if ($hero_subtitle) { ?>
											<div data-swiper-parallax="300" class="slide-sub-title">
												<h5><?php echo esc_html($hero_subtitle); ?></h5>
											</div>
										<?php }
										if ($slider_content) { ?>
											<div data-swiper-parallax="400" class="slide-text">
												<p><?php echo esc_html($slider_content); ?></p>
											</div>
										<?php } ?>
										<div class="clearfix"></div>
										<div class="slide-btn">
											<?php echo $elito_button; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="static-hero-right">
					<div class="static-hero-img">
						<div class="static-hero-img-inner">
							<?php if ($image_url) {
								echo '<img src="' . esc_url($image_url) . '" alt="' . esc_url($image_alt) . '">';
							}
							// Group Param Output
							$id = 0;
							if (is_array($socialItem_groups) && !empty($socialItem_groups)) {
								foreach ($socialItem_groups as $each_item) {
									$id++;

									$social_title = !empty($each_item['social_title']) ? $each_item['social_title'] : '';

									$hero_icon = !empty($each_item['hero_icon']['value']) ? $each_item['hero_icon']['value'] : '';
									$hero_svg_url = !empty($each_item['hero_icon']['value']['url']) ? $each_item['hero_icon']['value']['url'] : '';
									$svg_alt = get_post_meta($hero_svg_url, '_wp_attachment_image_alt', true);

							?>

									<div class="icon-<?php echo $id; ?> floating-item">
										<?php
										if ($hero_svg_url) {
											echo '<img class="default-icon"  src="' . esc_url($hero_svg_url) . '" alt="' . esc_url($svg_alt) . '">';
										} else {
											echo '<i class="' . esc_attr($hero_icon) . '"></i>';
										}
										?>
									</div>
								<?php
								}
							}
							if ($experience_title) { ?>
								<div class="project floating-item">
									<div class="icon">
										<?php
										if ($experience_svg_url) {
											echo '<img class="default-icon"  src="' . esc_url($experience_svg_url) . '" alt="' . esc_url($svg_alt) . '">';
										} else {
											echo '<i class="' . esc_attr($experience_icon) . '"></i>';
										}
										?>
									</div>
									<div class="p-text">
										<h3><span class="odometer" data-count="<?php echo esc_html($experience_number); ?>">
												00</span>+</h3>
										<p><?php echo esc_html($experience_title); ?></p>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="shape-1">
					<svg width="1038" height="938" viewBox="0 0 1038 938" fill="none">
						<g opacity="0.5" filter="url(#filter0_f_39_4392)">
							<circle cx="290.5" cy="282.5" r="247.5" />
						</g>
						<defs>
							<filter id="filter0_f_39_4392" x="-457" y="-465" width="1495" height="1495" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
								<feFlood flood-opacity="0" result="BackgroundImageFix" />
								<feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
								<feGaussianBlur stdDeviation="250" result="effect1_foregroundBlur_39_4392" />
							</filter>
						</defs>
					</svg>
				</div>
				<div class="shape-2">
					<svg width="1295" height="938" viewBox="0 0 1295 938" fill="none">
						<g opacity="0.4" filter="url(#filter0_f_39_4393)">
							<circle cx="647.5" cy="561.5" r="247.5" />
						</g>
						<defs>
							<filter id="filter0_f_39_4393" x="0" y="-86" width="1295" height="1295" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
								<feFlood flood-opacity="0" result="BackgroundImageFix" />
								<feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
								<feGaussianBlur stdDeviation="200" result="effect1_foregroundBlur_39_4393" />
							</filter>
						</defs>
					</svg>
				</div>
				<div class="shape-3">
					<svg width="752" height="747" viewBox="0 0 752 747" fill="none">
						<g opacity="0.45" filter="url(#filter0_f_39_4394)">
							<circle cx="647.5" cy="99.5" r="247.5" />
						</g>
						<defs>
							<filter id="filter0_f_39_4394" x="0" y="-548" width="1295" height="1295" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
								<feFlood flood-opacity="0" result="BackgroundImageFix" />
								<feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
								<feGaussianBlur stdDeviation="200" result="effect1_foregroundBlur_39_4394" />
							</filter>
						</defs>
					</svg>
				</div>
				<div class="line-shape-1">
					<?php if ($shape_url) {
						echo '<img src="' . esc_url($shape_url) . '" alt="' . esc_url($shape_alt) . '">';
					} ?>
				</div>
				<div class="line-shape-2">
					<?php if ($shape2_url) {
						echo '<img src="' . esc_url($shape2_url) . '" alt="' . esc_url($shape2_alt) . '">';
					} ?>
				</div>
			</div>
		<?php } else { ?>
			<div class="elito-hero hero wpo-hero-style-3">
				<div class="hero-static">
					<div class="hero-inner">
						<div class="slider-image">
							<?php if ($image_url) {
								echo '<img src="' . esc_url($image_url) . '" alt="' . esc_url($image_alt) . '" class="slider-bg">';
							} ?>
						</div>
						<div class="container">
							<div class="slide-content">
								<div data-swiper-parallax="300" class="slide-title">
									<h2>
										<?php if ($hero_toptitle) { ?>
											<span><?php echo esc_html($hero_toptitle); ?></span>
										<?php }
										echo esc_html($hero_title);
										?>
									</h2>
								</div>
								<?php if ($hero_subtitle) { ?>
									<div data-swiper-parallax="300" class="slide-sub-title">
										<h5><?php echo esc_html($hero_subtitle); ?></h5>
									</div>
								<?php }
								if ($slider_content) { ?>
									<div data-swiper-parallax="400" class="slide-text">
										<p><?php echo esc_html($slider_content); ?></p>
									</div>
								<?php } ?>
								<div class="clearfix"></div>
								<div class="slide-btn">
									<?php echo $elito_button; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="dark_svg">
					<svg x="0px" y="0px" viewBox="0 186.5 1920 113.5">
						<polygon points="0,300 655.167,210.5 1432.5,300 1920,198.5 1920,300 " />
					</svg>
				</div>
			</div>
<?php }
		// Return outbut buffer
		echo ob_get_clean();
	}
	/**
	 * Render Hero widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 */

	//protected function _content_template(){}

}
Plugin::instance()->widgets_manager->register(new Elito_Hero());
