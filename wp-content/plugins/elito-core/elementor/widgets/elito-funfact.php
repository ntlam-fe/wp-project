<?php
/*
 * Elementor Elito Funfact Widget
 * Author & Copyright: wpoceans
*/

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Elito_Funfact extends Widget_Base
{

	/**
	 * Retrieve the widget name.
	 */
	public function get_name()
	{
		return 'wpo-elito_funfact';
	}

	/**
	 * Retrieve the widget title.
	 */
	public function get_title()
	{
		return esc_html__('About Funfact', 'elito-core');
	}

	/**
	 * Retrieve the widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-counter';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 */
	public function get_categories()
	{
		return ['wpoceans-category'];
	}

	/**
	 * Retrieve the list of scripts the Elito Funfact widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	 */
	public function get_script_depends()
	{
		return ['wpo-elito_funfact'];
	}

	/**
	 * Register Elito Funfact widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 */
	protected function register_controls()
	{

		$this->start_controls_section(
			'section_funfact',
			[
				'label' => esc_html__('Funfact Options', 'elito-core'),
			]
		);
		$this->add_control(
			'about_style',
			[
				'label' => esc_html__('About Style', 'elito-core'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__('Style One', 'elito-core'),
					'style-two' => esc_html__('Style Two', 'elito-core'),
				],
				'default' => 'style-one',
				'description' => esc_html__('Select your About style.', 'elito-core'),
			]
		);

		$this->add_control(
			'section_title',
			[
				'label' => esc_html__('Title Text', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('My Advantage', 'elito-core'),
				'placeholder' => esc_html__('Type title text here', 'elito-core'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'section_content',
			[
				'label' => esc_html__('Content Text', 'elito-core'),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__('Content Text', 'elito-core'),
				'placeholder' => esc_html__('Type Content text here', 'elito-core'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'about_image',
			[
				'label' => esc_html__('About Image', 'elito-core'),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'about_style' => array('style-two'),
				],
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__('Set your image.', 'elito-core'),
			]
		);
		$this->add_control(
			'about_icon',
			[
				'label' => __('Icon', 'elito-core'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'condition' => [
					'about_style' => array('style-two'),
				],
				'default' => [
					'value' => 'fi flaticon-verified',
					'library' => 'solid',
				],
			]
		);
		$this->add_control(
			'about_icon2',
			[
				'label' => __('Icon 2', 'elito-core'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'condition' => [
					'about_style' => array('style-two'),
				],
				'default' => [
					'value' => 'fi flaticon-verified',
					'library' => 'solid',
				],
			]
		);
		$this->add_control(
			'about_icon3',
			[
				'label' => __('Icon 3', 'elito-core'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'condition' => [
					'about_style' => array('style-two'),
				],
				'default' => [
					'value' => 'fi flaticon-verified',
					'library' => 'solid',
				],
			]
		);
		$this->add_control(
			'exp_number',
			[
				'label' => esc_html__('Experience Number', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'condition' => [
					'about_style' => array('style-one'),
				],
				'default' => esc_html__('08', 'elito-core'),
				'placeholder' => esc_html__('Type Experience Number here', 'elito-core'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'exp_title',
			[
				'label' => esc_html__('Experience Title', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'condition' => [
					'about_style' => array('style-one'),
				],
				'default' => esc_html__('Years of Experience', 'elito-core'),
				'placeholder' => esc_html__('Type Experience Title here', 'elito-core'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'client_title',
			[
				'label' => esc_html__('Client Title', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Clients Satisfaction', 'elito-core'),
				'placeholder' => esc_html__('Type client Title here', 'elito-core'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'client_number',
			[
				'label' => esc_html__('Client Number', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('100%', 'elito-core'),
				'placeholder' => esc_html__('Type client Number here', 'elito-core'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'client_icon',
			[
				'label' => __('Icon', 'elito-core'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fi flaticon-verified',
					'library' => 'solid',
				],
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'funfact_title',
			[
				'label' => esc_html__('Title Text', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Title Text', 'elito-core'),
				'placeholder' => esc_html__('Type title text here', 'elito-core'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'funfact_number',
			[
				'label' => esc_html__('Funfact Number', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('250', 'elito-core'),
				'placeholder' => esc_html__('Type funfact Number here', 'elito-core'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'funfact_plus',
			[
				'label' => esc_html__('Funfact Plus/Percentage', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('+', 'elito-core'),
				'placeholder' => esc_html__('Type funfact Plus/Percentage here', 'elito-core'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'funfactItems_groups',
			[
				'label' => esc_html__('Funfact Items', 'elito-core'),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'funfact_title' => esc_html__('Funfact', 'elito-core'),
					],

				],
				'fields' =>  $repeater->get_controls(),
				'title_field' => '{{{ funfact_title }}}',
			]
		);
		$this->add_control(
			'shape_one',
			[
				'label' => esc_html__('About Shape', 'elito-core'),
				'type' => Controls_Manager::MEDIA,
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__('Set your shape.', 'elito-core'),
			]
		);
		$this->add_control(
			'shape_two',
			[
				'label' => esc_html__('Shape Two', 'elito-core'),
				'type' => Controls_Manager::MEDIA,
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__('Set your shape.', 'elito-core'),
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
			'about_color',
			[
				'label' => esc_html__('Background', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-about-area, .wpo-about-area-s2' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'about_shape_color',
			[
				'label' => esc_html__('Shape 1 Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-about-area .ab-shape svg circle, .wpo-about-area-s2 .ab-shape svg circle' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'about_shape_2_color',
			[
				'label' => esc_html__('Shape 2 Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-about-area .ab-shape-s2 svg circle, .wpo-about-area-s2 .ab-shape-s2 svg circle' => 'fill: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .elito-about .wpo-about-content .wpo-about-title h2',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elito-about .wpo-about-content .wpo-about-title h2' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .elito-about .wpo-about-content .wpo-about-title h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'name' => 'section_content_typography',
				'selector' => '{{WRAPPER}} .elito-about .wpo-about-content .wpo-about-title p',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elito-about .wpo-about-content .wpo-about-title p' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .elito-about .wpo-about-content .wpo-about-title p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section


		// Funfact Item
		$this->start_controls_section(
			'funfact_number_item_style',
			[
				'label' => esc_html__('Funfact', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'funfact_item_bg_color',
				'label' => esc_html__('Background', 'elito-core'),
				'description' => esc_html__('Background Color', 'elito-core'),
				'types' => ['gradient'],
				'selector' => '{{WRAPPER}} .elito-about .wpo-about-content .wpo-about-funfact .grid, .wpo-about-area-s2 .wpo-about-content .wpo-about-funfact .grid',
			]
		);
		$this->end_controls_section(); // end: Section

		// Funfact Number
		$this->start_controls_section(
			'funfact_number_style',
			[
				'label' => esc_html__('Number', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'elito-core'),
				'name' => 'elito_number_typography',
				'selector' => '{{WRAPPER}} .elito-about .wpo-about-content .wpo-about-funfact .grid .grid-inner h3',
			]
		);
		$this->add_control(
			'funfact_item_number_color',
			[
				'label' => esc_html__('Number Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elito-about .wpo-about-content .wpo-about-funfact .grid .grid-inner h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'number_padding',
			[
				'label' => __('Number Padding', 'elito-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .elito-about .wpo-about-content .wpo-about-funfact .grid .grid-inner h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Funfact Title
		$this->start_controls_section(
			'funfact_title_style',
			[
				'label' => esc_html__('Funfact Title', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'elito-core'),
				'name' => 'ntrsvt_funfact_title_typography',
				'selector' => '{{WRAPPER}} .elito-about .wpo-about-content .wpo-about-funfact .grid .grid-inner p',
			]
		);
		$this->add_control(
			'funfact_title',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elito-about .wpo-about-content .wpo-about-funfact .grid .grid-inner p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'funfact_title_padding',
			[
				'label' => __('Number Padding', 'elito-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .elito-about .wpo-about-content .wpo-about-funfact .grid .grid-inner p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section


		// Experience Title
		$this->start_controls_section(
			'funfact_experience_bg_style',
			[
				'label' => esc_html__('Experience BG', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'experience_bg',
			[
				'label' => esc_html__('BG Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-about-area .wpo-about-exprience-wrap .wpo-about-exprience' => 'background: linear-gradient(180deg, {{VALUE}} 0%, {{VALUE}} 100%);',
				],
			]
		);

		$this->end_controls_section(); // end: Section

		// Experience Title
		$this->start_controls_section(
			'funfact_experience_style',
			[
				'label' => esc_html__('Experience Number', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'elito-core'),
				'name' => 'elito_experience_number_typography',
				'selector' => '{{WRAPPER}} .wpo-about-exprience-wrap .wpo-about-exprience h2',
			]
		);
		$this->add_control(
			'experience_number',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-about-exprience-wrap .wpo-about-exprience h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'experience_number_padding',
			[
				'label' => __('Number Padding', 'elito-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .wpo-about-exprience-wrap .wpo-about-exprience h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Experience Title
		$this->start_controls_section(
			'funfact_experience_title_style',
			[
				'label' => esc_html__('Experience Title', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'elito-core'),
				'name' => 'elito_experience_title_typography',
				'selector' => '{{WRAPPER}} .wpo-about-exprience-wrap .wpo-about-exprience span',
			]
		);
		$this->add_control(
			'experience_title',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-about-exprience-wrap .wpo-about-exprience span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'experience_title_padding',
			[
				'label' => __('Number Padding', 'elito-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .wpo-about-exprience-wrap .wpo-about-exprience span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section


		// Client Title
		$this->start_controls_section(
			'funfact_client_title_style',
			[
				'label' => esc_html__('Client Title', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'elito-core'),
				'name' => 'elito_client_title_typography',
				'selector' => '{{WRAPPER}} .wpo-about-area .wpo-about-exprience-wrap .client h3, .wpo-about-area-s2 .wpo-about-exprience-wrap .client h3',
			]
		);
		$this->add_control(
			'clinet_title',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-about-area .wpo-about-exprience-wrap .client h3, .wpo-about-area-s2 .wpo-about-exprience-wrap .client h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Client Title
		$this->start_controls_section(
			'funfact_client_number_style',
			[
				'label' => esc_html__('Client Numer', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'elito-core'),
				'name' => 'elito_client_number_typography',
				'selector' => '{{WRAPPER}} .wpo-about-area .wpo-about-exprience-wrap .client p, .wpo-about-area-s2 .wpo-about-exprience-wrap .client p',
			]
		);
		$this->add_control(
			'clinet_number',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-about-area .wpo-about-exprience-wrap .client p, .wpo-about-area-s2 .wpo-about-exprience-wrap .client p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section


	}

	/**
	 * Render Funfact widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$funfactItems_groups = !empty($settings['funfactItems_groups']) ? $settings['funfactItems_groups'] : [];

		$about_style = !empty($settings['about_style']) ? $settings['about_style'] : '';

		$section_title = !empty($settings['section_title']) ? $settings['section_title'] : '';
		$section_content = !empty($settings['section_content']) ? $settings['section_content'] : '';

		$exp_title = !empty($settings['exp_title']) ? $settings['exp_title'] : '';
		$exp_number = !empty($settings['exp_number']) ? $settings['exp_number'] : '';

		$client_title = !empty($settings['client_title']) ? $settings['client_title'] : '';
		$client_number = !empty($settings['client_number']) ? $settings['client_number'] : '';

		$client_icon = !empty($settings['client_icon']['value']) ? $settings['client_icon']['value'] : '';
		$client_svg_url = !empty($settings['client_icon']['value']['url']) ? $settings['client_icon']['value']['url'] : '';
		$svg_alt = get_post_meta($client_svg_url, '_wp_attachment_image_alt', true);


		$bg_image = !empty($settings['about_image']['id']) ? $settings['about_image']['id'] : '';

		// Image
		$image_url = wp_get_attachment_url($bg_image);
		$image_alt = get_post_meta($bg_image, '_wp_attachment_image_alt', true);

		$about_icon = !empty($settings['about_icon']['value']) ? $settings['about_icon']['value'] : '';
		$about_svg_url = !empty($settings['about_icon']['value']['url']) ? $settings['about_icon']['value']['url'] : '';
		$abou_svg_alt = get_post_meta($about_svg_url, '_wp_attachment_image_alt', true);

		$about_icon2 = !empty($settings['about_icon2']['value']) ? $settings['about_icon2']['value'] : '';
		$about_svg2_url = !empty($settings['about_icon2']['value']['url']) ? $settings['about_icon2']['value']['url'] : '';
		$about_svg2_alt = get_post_meta($about_svg2_url, '_wp_attachment_image_alt', true);

		$about_icon3 = !empty($settings['about_icon3']['value']) ? $settings['about_icon3']['value'] : '';
		$about_svg3_url = !empty($settings['about_icon3']['value']['url']) ? $settings['about_icon3']['value']['url'] : '';
		$about_svg3_alt = get_post_meta($about_svg3_url, '_wp_attachment_image_alt', true);


		$shape_image = !empty($settings['shape_one']['id']) ? $settings['shape_one']['id'] : '';
		$shape_image2 = !empty($settings['shape_two']['id']) ? $settings['shape_two']['id'] : '';

		// Image
		$shape_url = wp_get_attachment_url($shape_image);
		$shape_alt = get_post_meta($shape_image, '_wp_attachment_image_alt', true);

		// Image
		$shape2_url = wp_get_attachment_url($shape_image2);
		$shape2_alt = get_post_meta($shape_image2, '_wp_attachment_image_alt', true);

		if ($about_style == 'style-one') {
			$about_class = 'wpo-about-area';
		} else {
			$about_class = 'wpo-about-area-s2';
		}

		// Turn output buffer on
		ob_start(); ?>
		<div class="elito-about <?php echo esc_attr($about_class); ?> section-padding">
			<div class="container">
				<div class="row align-items-center">
					<?php if ($about_style == 'style-one') { ?>
						<div class="col-lg-5 col-md-12 col-sm-12">
							<div class="wpo-about-exprience-wrap">
								<div class="wpo-about-exprience">
									<?php
									if ($exp_number) {
										echo '<h2>' . esc_html($exp_number) . '</h2>';
									}
									if ($exp_title) {
										echo '<span>' . esc_html($exp_title) . '</span>';
									}
									?>
								</div>
								<div class="client">
									<?php
									if ($client_number) {
										echo '<h3><span class="odometer" data-count="100">' . esc_html($client_number) . '</span>%</h3>';
									}
									if ($client_title) {
										echo '<p>' . esc_html($client_title) . '</p>';
									}
									?>
								</div>
							</div>
						</div>
					<?php } else { ?>
						<div class="col-lg-5 col-md-12 col-sm-12">
							<div class="wpo-about-img">
								<?php if ($image_url) {
									echo '<img src="' . esc_url($image_url) . '" alt="' . esc_url($image_alt) . '">';
								} ?>

								<div class="icon-1 floating-item">
									<?php
									if ($about_svg_url) {
										echo '<img class="default-icon"  src="' . esc_url($about_svg_url) . '" alt="' . esc_url($abou_svg_alt) . '">';
									} else {
										echo '<i class="' . esc_attr($about_icon) . '"></i>';
									}
									?>
								</div>

								<div class="icon-2 floating-item">
									<?php
									if ($about_svg2_url) {
										echo '<img class="default-icon"  src="' . esc_url($about_svg2_url) . '" alt="' . esc_url($about_svg2_alt) . '">';
									} else {
										echo '<i class="' . esc_attr($about_icon2) . '"></i>';
									}
									?>
								</div>

								<div class="icon-3 floating-item">
									<?php
									if ($about_svg3_url) {
										echo '<img class="default-icon"  src="' . esc_url($about_svg3_url) . '" alt="' . esc_url($about_svg3_alt) . '">';
									} else {
										echo '<i class="' . esc_attr($about_icon3) . '"></i>';
									}
									?>
								</div>

								<div class="project floating-item">
									<div class="icon">
										<?php
										if ($client_svg_url) {
											echo '<img class="default-icon"  src="' . esc_url($client_svg_url) . '" alt="' . esc_url($svg_alt) . '">';
										} else {
											echo '<i class="' . esc_attr($client_icon) . '"></i>';
										}
										?>
									</div>
									<div class="p-text">
										<?php
										if ($client_number) {
											echo '<h3><span class="odometer" data-count="100">' . esc_html($client_number) . '</span>%</h3>';
										}
										if ($client_title) {
											echo '<p>' . esc_html($client_title) . '</p>';
										}
										?>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
					<div class="col-lg-6 offset-lg-1 col-md-12 col-sm-12">
						<div class="wpo-about-content">
							<div class="wpo-about-title">
								<?php
								if ($section_title) {
									echo '<h2>' . esc_html($section_title) . '</h2>';
								}
								if ($section_content) {
									echo '<p>' . esc_html($section_content) . '</p>';
								} ?>
							</div>
							<div class="wpo-about-funfact">
								<?php 	// Group Param Output
								if (is_array($funfactItems_groups) && !empty($funfactItems_groups)) {
									foreach ($funfactItems_groups as $each_item) {
										$funfact_title = !empty($each_item['funfact_title']) ? $each_item['funfact_title'] : '';
										$funfact_number = !empty($each_item['funfact_number']) ? $each_item['funfact_number'] : '';
										$funfact_plus = !empty($each_item['funfact_plus']) ? $each_item['funfact_plus'] : '';
								?>
										<div class="grid">
											<div class="grid-inner">
												<?php
												if ($funfact_number) {
													echo '<h3><span class="odometer" data-count="' . esc_attr($funfact_number) . '">' . esc_html__('00', 'elito-core') . '</span>' . esc_html($funfact_plus) . '</h3>';
												}
												if ($funfact_title) {
													echo '<p>' . esc_html__($funfact_title) . '</p>';
												}
												?>
											</div>
										</div>
								<?php }
								} ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="ab-shape">
				<svg width="995" height="1495" viewBox="0 0 995 1495" fill="none">
					<g opacity="0.3" filter="url(#filter0_f_39_4267)">
						<circle cx="247.5" cy="747.5" r="247.5" fill="#FFE500" />
					</g>
					<defs>
						<filter id="filter0_f_39_4267" x="-500" y="0" width="1495" height="1495" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
							<feFlood flood-opacity="0" result="BackgroundImageFix" />
							<feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
							<feGaussianBlur stdDeviation="250" result="effect1_foregroundBlur_39_4267" />
						</filter>
					</defs>
				</svg>
			</div>
			<div class="ab-shape-s2">
				<svg width="1252" height="1901" viewBox="0 0 1252 1901" fill="none">
					<g opacity="0.15" filter="url(#filter0_f_39_4265)">
						<circle cx="950" cy="950.004" r="450" />
					</g>
					<defs>
						<filter id="filter0_f_39_4265" x="-0.00012207" y="0.00402832" width="1900" height="1900" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
							<feFlood flood-opacity="0" result="BackgroundImageFix" />
							<feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
							<feGaussianBlur stdDeviation="250" result="effect1_foregroundBlur_39_4265" />
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
<?php
		// Return outbut buffer
		echo ob_get_clean();
	}
	/**
	 * Render Funfact widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 */

	//protected function _content_template(){}

}
Plugin::instance()->widgets_manager->register(new Elito_Funfact());
