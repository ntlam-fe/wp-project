<?php
/*
 * Elementor Elito Pricing Widget
 * Author & Copyright: wpoceans
*/

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Elito_Pricing extends Widget_Base
{

	/**
	 * Retrieve the widget name.
	 */
	public function get_name()
	{
		return 'wpo-elito_pricing';
	}

	/**
	 * Retrieve the widget title.
	 */
	public function get_title()
	{
		return esc_html__('Pricing', 'elito-core');
	}

	/**
	 * Retrieve the widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-price-table';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 */
	public function get_categories()
	{
		return ['wpoceans-category'];
	}

	/**
	 * Retrieve the list of scripts the Elito Pricing widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	 */
	public function get_script_depends()
	{
		return ['wpo-elito_pricing'];
	}

	/**
	 * Register Elito Pricing widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 */
	protected function register_controls()
	{

		$this->start_controls_section(
			'section_pricing',
			[
				'label' => esc_html__('Pricing Options', 'elito-core'),
			]
		);
		$this->add_control(
			'section_title',
			[
				'label' => esc_html__('Title Text', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Title Text', 'elito-core'),
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
		$repeater = new Repeater();
		$repeater->add_control(
			'pricing_title',
			[
				'label' => esc_html__('Title Text', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Pricing Title.', 'elito-core'),
				'placeholder' => esc_html__('Type title text here', 'elito-core'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'pricing_amount',
			[
				'label' => esc_html__('Amount Text', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('250', 'elito-core'),
				'placeholder' => esc_html__('Type Amount text here', 'elito-core'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'pricing_month',
			[
				'label' => esc_html__('Month Text', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Monthly.', 'elito-core'),
				'placeholder' => esc_html__('Type Month text here', 'elito-core'),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'pricing_desc',
			[
				'label' => esc_html__('Description', 'elito-core'),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__('Description.', 'elito-core'),
				'placeholder' => esc_html__('Type Description text here', 'elito-core'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'pricing_content',
			[
				'label' => esc_html__('Content', 'elito-core'),
				'default' => esc_html__('your content text', 'elito-core'),
				'placeholder' => esc_html__('Type your content here', 'elito-core'),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'button_text',
			[
				'label' => esc_html__('Button Text', 'elito-core'),
				'default' => esc_html__('Choose Plan', 'elito-core'),
				'placeholder' => esc_html__('Type your button text here', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'pricing_link',
			[
				'label' => esc_html__('link', 'elito-core'),
				'default' => esc_html__('#', 'elito-core'),
				'placeholder' => esc_html__('Type your link here', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'pricingItems_groups',
			[
				'label' => esc_html__('Pricing Icons', 'elito-core'),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'pricing_title' => esc_html__('Pricing', 'elito-core'),
					],

				],
				'fields' =>  $repeater->get_controls(),
				'title_field' => '{{{ pricing_title }}}',
			]
		);
		$this->end_controls_section(); // end: Section

		// Section
		$this->start_controls_section(
			'section_bg_style',
			[
				'label' => esc_html__('Section', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'section_bg_color',
			[
				'label' => esc_html__('BG Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elito-pricing' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'section_padding',
			[
				'label' => esc_html__('Section Padding', 'elito-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .elito-pricing' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Price
		$this->start_controls_section(
			'section_price_bg_style',
			[
				'label' => esc_html__('Price', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'price_bg_color',
			[
				'label' => esc_html__('Item BG Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-pricing-section .wpo-pricing-wrap .wpo-pricing-item' => 'background-color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .elito-pricing .wpo-pricing-item .wpo-pricing-top .pricing-thumb span',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elito-pricing .wpo-pricing-item .wpo-pricing-top .pricing-thumb span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_bg_color',
			[
				'label' => esc_html__('BG Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elito-pricing .wpo-pricing-item .wpo-pricing-top .pricing-thumb' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_padding',
			[
				'label' => __('Title Padding', 'elito-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .elito-pricing .wpo-pricing-item .wpo-pricing-top .pricing-thumb span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Price Title
		$this->start_controls_section(
			'section_price_style',
			[
				'label' => esc_html__('Price', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'elito-core'),
				'name' => 'elito_price_title_typography',
				'selector' => '{{WRAPPER}} .elito-pricing .wpo-pricing-wrap .wpo-pricing-item .wpo-pricing-top .wpo-pricing-text h2',
			]
		);
		$this->add_control(
			'price_title_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elito-pricing .wpo-pricing-wrap .wpo-pricing-item .wpo-pricing-top .wpo-pricing-text h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'price_title_padding',
			[
				'label' => esc_html__('Title Padding', 'elito-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .elito-pricing .wpo-pricing-wrap .wpo-pricing-item .wpo-pricing-top .wpo-pricing-text h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Price Month
		$this->start_controls_section(
			'section_price_month_style',
			[
				'label' => esc_html__('Month', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'elito-core'),
				'name' => 'elito_month_title_typography',
				'selector' => '{{WRAPPER}} ..elito-pricing .wpo-pricing-wrap .wpo-pricing-item .wpo-pricing-top .wpo-pricing-text h2 span',
			]
		);
		$this->add_control(
			'month_title_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elito-pricing .wpo-pricing-wrap .wpo-pricing-item .wpo-pricing-top .wpo-pricing-text h2 span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'month_title_padding',
			[
				'label' => esc_html__('Title Padding', 'elito-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .elito-pricing .wpo-pricing-wrap .wpo-pricing-item .wpo-pricing-top .wpo-pricing-text h2 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .elito-pricing .wpo-pricing-wrap .wpo-pricing-item .wpo-pricing-bottom .wpo-pricing-bottom-text ul li',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elito-pricing .wpo-pricing-wrap .wpo-pricing-item .wpo-pricing-bottom .wpo-pricing-bottom-text ul li' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'content_br_color',
			[
				'label' => esc_html__('Border Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elito-pricing .wpo-pricing-wrap .wpo-pricing-item .wpo-pricing-top .wpo-pricing-text p' => 'border-bottom-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// button
		$this->start_controls_section(
			'section_button_style',
			[
				'label' => esc_html__('Button', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'button_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elito-pricing .wpo-pricing-wrap .wpo-pricing-item .wpo-pricing-bottom .wpo-pricing-bottom-text a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_border_color',
			[
				'label' => esc_html__('Border Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elito-pricing .wpo-pricing-wrap .wpo-pricing-item .wpo-pricing-bottom .wpo-pricing-bottom-text a' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_bg_color',
			[
				'label' => esc_html__('BG Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elito-pricing .wpo-pricing-wrap .wpo-pricing-item .wpo-pricing-bottom .wpo-pricing-bottom-text a' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_hover_color',
			[
				'label' => esc_html__('Hover Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elito-pricing .wpo-pricing-wrap .wpo-pricing-item .wpo-pricing-bottom .wpo-pricing-bottom-text a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_hover_boder_color',
			[
				'label' => esc_html__('Hover Border Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elito-pricing .wpo-pricing-wrap .wpo-pricing-item .wpo-pricing-bottom .wpo-pricing-bottom-text a:hover' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_bg_hover_color',
			[
				'label' => esc_html__('Hover BG Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elito-pricing .wpo-pricing-wrap .wpo-pricing-item .wpo-pricing-bottom .wpo-pricing-bottom-text a:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

	}

	/**
	 * Render Pricing widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$pricingItems_groups = !empty($settings['pricingItems_groups']) ? $settings['pricingItems_groups'] : [];
		$section_title = !empty($settings['section_title']) ? $settings['section_title'] : '';
		$section_content = !empty($settings['section_content']) ? $settings['section_content'] : '';

		// Turn output buffer on

		ob_start(); ?>
		<div class="elito-pricing wpo-pricing-section section-padding">
			<div class="container">
				<div class="row">
					<div class="row justify-content-center">
						<div class="col-lg-5">
							<div class="wpo-section-title">
								<?php
								if ($section_title) {
									echo '<h2>' . esc_html($section_title) . '</h2>';
								}
								if ($section_content) {
									echo '<p>' . esc_html($section_content) . '</p>';
								}
								?>
							</div>
						</div>
					</div>
				</div>
				<div class="wpo-pricing-wrap">
					<div class="row">
						<?php
						// Group Param Output
						if (is_array($pricingItems_groups) && !empty($pricingItems_groups)) {
							foreach ($pricingItems_groups as $each_item) {

								$pricing_title = !empty($each_item['pricing_title']) ? $each_item['pricing_title'] : '';
								$pricing_amount = !empty($each_item['pricing_amount']) ? $each_item['pricing_amount'] : '';
								$pricing_month = !empty($each_item['pricing_month']) ? $each_item['pricing_month'] : '';
								$pricing_desc = !empty($each_item['pricing_desc']) ? $each_item['pricing_desc'] : '';
								$pricing_content = !empty($each_item['pricing_content']) ? $each_item['pricing_content'] : '';
								$button_text = !empty($each_item['button_text']) ? $each_item['button_text'] : '';
								$pricing_link = !empty($each_item['pricing_link']) ? $each_item['pricing_link'] : '';

						?>
								<div class="col col-lg-4 col-md-6 col-12">
									<div class="wpo-pricing-item">
										<div class="wpo-pricing-top">
											<div class="pricing-thumb">
												<?php
												if ($pricing_title) {
													echo '<span>' . esc_html($pricing_title) . '</span>';
												}
												?>
											</div>
											<div class="wpo-pricing-text">
												<?php
												if ($pricing_amount) {
													echo '<h2>' . esc_html($pricing_amount) . '<span>' . esc_html($pricing_month) . '</span></h2>';
												}
												if ($pricing_desc) {
													echo '<p>' . esc_html($pricing_desc) . '</p>';
												}
												?>
											</div>
										</div>
										<div class="wpo-pricing-bottom">
											<div class="wpo-pricing-bottom-text">
												<?php
												if ($pricing_content) {
													echo wp_kses_post($pricing_content);
												}
												if ($button_text) {
													echo ' <a class="price-btn" href="' . esc_url($pricing_link) . '">' . esc_html($button_text) . '</a>';
												}
												?>
											</div>
										</div>
									</div>
								</div>
						<?php }
						} ?>
					</div>
				</div>
			</div> <!-- end container -->
			<div class="shape-p">
				<svg width="1500" height="1500" viewBox="0 0 1500 1500" fill="none">
					<g opacity="0.45" filter="url(#filter0_f_39_4213)">
						<circle cx="750" cy="750" r="200" />
					</g>
					<defs>
						<filter id="filter0_f_39_4213" x="0" y="0" width="1500" height="1500" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
							<feFlood flood-opacity="0" result="BackgroundImageFix" />
							<feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
							<feGaussianBlur stdDeviation="275" result="effect1_foregroundBlur_39_4212" />
						</filter>
					</defs>
				</svg>
			</div>
		</div>
<?php
		// Return outbut buffer
		echo ob_get_clean();
	}
	/**
	 * Render Pricing widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 */

	//protected function _content_template(){}

}
Plugin::instance()->widgets_manager->register(new Elito_Pricing());
