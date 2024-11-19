<?php
/*
 * Elementor Elito Testimonial Widget
 * Author & Copyright: wpoceans
*/

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Elito_Testimonial extends Widget_Base
{

	/**
	 * Retrieve the widget name.
	 */
	public function get_name()
	{
		return 'wpo-elito_testimonial';
	}

	/**
	 * Retrieve the widget title.
	 */
	public function get_title()
	{
		return esc_html__('Testimonial', 'elito-core');
	}

	/**
	 * Retrieve the widget icon.
	 */
	public function get_icon()
	{
		return 'ti-quote-right';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 */
	public function get_categories()
	{
		return ['wpoceans-category'];
	}

	/**
	 * Retrieve the list of scripts the Elito Testimonial widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	 */
	public function get_script_depends()
	{
		return ['wpo-elito_testimonial'];
	}

	/**
	 * Register Elito Testimonial widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 */
	protected function register_controls()
	{

		$this->start_controls_section(
			'section_testimonial',
			[
				'label' => esc_html__('Testimonial Options', 'elito-core'),
			]
		);
		$this->add_control(
			'image_shape',
			[
				'label' => esc_html__('Shape Image', 'elito-core'),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],

			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'avatar_title',
			[
				'label' => esc_html__('Avatar Title', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Avatar Title', 'elito-core'),
				'placeholder' => esc_html__('Type Avatar text here', 'elito-core'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'testi_image',
			[
				'label' => esc_html__('Avatar Image', 'elito-core'),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],

			]
		);
		$this->add_control(
			'avatar_groups',
			[
				'label' => esc_html__('Avatar Images', 'elito-core'),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'avatar_title' => esc_html__('Images', 'elito-core'),
					],

				],
				'fields' =>  $repeater->get_controls(),
				'title_field' => '{{{ avatar_title }}}',
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'testimonial_title',
			[
				'label' => esc_html__('Testimonial Title Text', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Title Text', 'elito-core'),
				'placeholder' => esc_html__('Type title text here', 'elito-core'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'testimonial_content',
			[
				'label' => esc_html__('Testimonial Content', 'elito-core'),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__('Testimonial Content', 'elito-core'),
				'placeholder' => esc_html__('Type testimonial Content here', 'elito-core'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'testimonial_name',
			[
				'label' => esc_html__('Testimonial Name', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Cathi Falcon', 'elito-core'),
				'placeholder' => esc_html__('Type testimonial Name here', 'elito-core'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'testimonial_subtitle',
			[
				'label' => esc_html__('Testimonial Sub Title', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Software Engineer', 'elito-core'),
				'placeholder' => esc_html__('Type testimonial Sub title here', 'elito-core'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'bg_image',
			[
				'label' => esc_html__('Testimonial Image', 'elito-core'),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],

			]
		);
		$this->add_control(
			'testimonialItems_groups',
			[
				'label' => esc_html__('Testimonial Items', 'elito-core'),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'testimonial_title' => esc_html__('Testimonial', 'elito-core'),
					],

				],
				'fields' =>  $repeater->get_controls(),
				'title_field' => '{{{ testimonial_title }}}',
			]
		);
		$this->end_controls_section(); // end: Section

		// Section
		$this->start_controls_section(
			'testi_section_title_style',
			[
				'label' => esc_html__('Section', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'section_color',
			[
				'label' => esc_html__('BG Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-testimonial-section' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'section_left_color',
			[
				'label' => esc_html__('Left BG Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-testimonial-section .left-shape' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'section_border',
			[
				'label' => esc_html__('Border Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}.wpo-testimonial-section .wpo-testimonial-wrap .testimonial-left .testimonial-left-inner .border-s1, .wpo-testimonial-section .wpo-testimonial-wrap .testimonial-left .testimonial-left-inner .border-s2, .wpo-testimonial-section .wpo-testimonial-wrap .testimonial-left .testimonial-left-inner .border-s3' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'section_padding',
			[
				'label' => esc_html__('Section Padding', 'elito-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .wpo-testimonial-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'name' => 'elito_title_typography',
				'selector' => '{{WRAPPER}} .wpo-testimonial-section .wpo-testimonial-wrap .wpo-testimonial-item .wpo-testimonial-text h4',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-testimonial-section .wpo-testimonial-wrap .wpo-testimonial-item .wpo-testimonial-text h4' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_padding',
			[
				'label' => esc_html__('Title Padding', 'elito-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .wpo-testimonial-section .wpo-testimonial-wrap .wpo-testimonial-item .wpo-testimonial-text h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .wpo-testimonial-section .wpo-testimonial-wrap .wpo-testimonial-item .wpo-testimonial-text p',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-testimonial-section .wpo-testimonial-wrap .wpo-testimonial-item .wpo-testimonial-text p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Testimonial Name Style 
		$this->start_controls_section(
			'testimonials_section_name_style',
			[
				'label' => esc_html__('Testimonial Name', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'elito-core'),
				'name' => 'testimonials_elito_name_typography',
				'selector' => '{{WRAPPER}} .wpo-testimonial-section .wpo-testimonial-wrap .wpo-testimonial-item .wpo-testimonial-text .wpo-testimonial-text-btm h3',
			]
		);
		$this->add_control(
			'testimonials_name_color',
			[
				'label' => esc_html__('Name Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-testimonial-section .wpo-testimonial-wrap .wpo-testimonial-item .wpo-testimonial-text .wpo-testimonial-text-btm h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Testimonial Title Style 
		$this->start_controls_section(
			'testimonials_section_title_style',
			[
				'label' => esc_html__('Testimonial Title', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'elito-core'),
				'name' => 'testimonials_elito_title_typography',
				'selector' => '{{WRAPPER}} .wpo-testimonial-section .wpo-testimonial-wrap .wpo-testimonial-item .wpo-testimonial-text .wpo-testimonial-text-btm h3 span',
			]
		);
		$this->add_control(
			'testimonials_title_color',
			[
				'label' => esc_html__('Name Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-testimonial-section .wpo-testimonial-wrap .wpo-testimonial-item .wpo-testimonial-text .wpo-testimonial-text-btm h3 span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section



	}

	/**
	 * Render Testimonial widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$testimonialItems_groups = !empty($settings['testimonialItems_groups']) ? $settings['testimonialItems_groups'] : [];

		$avatar_groups = !empty($settings['avatar_groups']) ? $settings['avatar_groups'] : [];

		$bg_shape = !empty($settings['image_shape']['id']) ? $settings['image_shape']['id'] : '';

		// Image
		$shape_url = wp_get_attachment_url($bg_shape);
		$shape_alt = get_post_meta($bg_shape, '_wp_attachment_image_alt', true);

		// Turn output buffer on
		ob_start(); ?>
		<div class="wpo-testimonial-section section-padding">
			<div class="container">
				<div class="wpo-testimonial-wrap">
					<div class="row align-items-center">
						<div class="col-lg-6 col-12">
							<div class="testimonial-left">
								<div class="testimonial-left-inner">
									<div class="slider-for">
										<?php 	// Group Param Output
										if (is_array($testimonialItems_groups) && !empty($testimonialItems_groups)) {
											foreach ($testimonialItems_groups as $each_items) {

												$image_url = wp_get_attachment_url($each_items['bg_image']['id']);
												$image_alt = get_post_meta($each_items['bg_image']['id'], '_wp_attachment_image_alt', true);

										?>
												<div class="testimonial-img">
													<?php if ($image_url) {
														echo '<img src="' . esc_url($image_url) . '" alt="' . esc_url($image_alt) . '">';
													} ?>
												</div>
										<?php }
										} ?>
									</div>
									<?php 	// Group Param Output
									$id = 0;
									if (is_array($avatar_groups) && !empty($avatar_groups)) {
										foreach ($avatar_groups as $each_image) {
											$id++;
											$avatar_url = wp_get_attachment_url($each_image['testi_image']['id']);
											$avatar_alt = get_post_meta($each_image['testi_image']['id'], '_wp_attachment_image_alt', true);

									?>
											<div class="side-img-<?php echo esc_attr($id); ?>">
												<?php if ($avatar_url) {
													echo '<img src="' . esc_url($avatar_url) . '" alt="' . esc_url($avatar_alt) . '">';
												} ?>
											</div>

									<?php
										}
									}
									?>
									<div class="border-s1"></div>
									<div class="border-s2"></div>
									<div class="border-s3"></div>
								</div>
								<div class="shape-t">
									<svg width="750" height="750" viewBox="0 0 750 750" fill="none">
										<g filter="url(#filter0_f_39_4154)">
											<circle r="125" transform="matrix(-1 0 0 1 375 375)" fill-opacity="0.4" />
										</g>
										<defs>
											<filter id="filter0_f_39_4154" x="0" y="0" width="750" height="750" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
												<feFlood flood-opacity="0" result="BackgroundImageFix" />
												<feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
												<feGaussianBlur stdDeviation="125" result="effect1_foregroundBlur_39_4154" />
											</filter>
										</defs>
									</svg>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-12">
							<div class="wpo-testimonial-items">
								<div class="slider-nav">
									<?php 	// Group Param Output
									if (is_array($testimonialItems_groups) && !empty($testimonialItems_groups)) {
										foreach ($testimonialItems_groups as $each_items) {

											$testimonial_title = !empty($each_items['testimonial_title']) ? $each_items['testimonial_title'] : '';
											$testimonial_subtitle = !empty($each_items['testimonial_subtitle']) ? $each_items['testimonial_subtitle'] : '';
											$testimonial_name = !empty($each_items['testimonial_name']) ? $each_items['testimonial_name'] : '';
											$testimonial_content = !empty($each_items['testimonial_content']) ? $each_items['testimonial_content'] : '';

											$image_url = wp_get_attachment_url($each_items['bg_image']['id']);
											$image_alt = get_post_meta($each_items['bg_image']['id'], '_wp_attachment_image_alt', true);

									?>
											<div class="wpo-testimonial-item">
												<div class="wpo-testimonial-text">
													<?php
													if ($testimonial_title) {
														echo '<h4>' . esc_html($testimonial_title) . '</h4>';
													}
													if ($testimonial_content) {
														echo '<p>' . esc_html($testimonial_content) . '</p>';
													}
													?>
													<div class="wpo-testimonial-text-btm">
														<h3><?php if ($testimonial_name) {
																echo esc_html($testimonial_name);
															}
															if ($testimonial_subtitle) {
																echo '<span>' . esc_html($testimonial_subtitle) . '</span>';
															} ?></h3>
													</div>
												</div>
											</div>
									<?php }
									} ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="left-shape"></div>
			<div class="right-shape">
				<?php if ($shape_url) {
					echo '<img src="' . esc_url($shape_url) . '" alt="' . esc_url($shape_alt) . '">';
				} ?>
			</div>
		</div>
<?php
		// Return outbut buffer
		echo ob_get_clean();
	}
	/**
	 * Render Testimonial widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 */

	//protected function _content_template(){}

}
Plugin::instance()->widgets_manager->register(new Elito_Testimonial());
