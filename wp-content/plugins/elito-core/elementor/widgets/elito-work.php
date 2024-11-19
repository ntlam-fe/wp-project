<?php
/*
 * Elementor Elito Work Widget
 * Author & Copyright: wpoceans
*/

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Elito_Work extends Widget_Base
{

	/**
	 * Retrieve the widget name.
	 */
	public function get_name()
	{
		return 'wpo-elito_work';
	}

	/**
	 * Retrieve the widget title.
	 */
	public function get_title()
	{
		return esc_html__('Work', 'elito-core');
	}

	/**
	 * Retrieve the widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-editor-unlink';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 */
	public function get_categories()
	{
		return ['wpoceans-category'];
	}

	/**
	 * Retrieve the list of scripts the Elito Work widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	 */
	public function get_script_depends()
	{
		return ['wpo-elito_work'];
	}

	/**
	 * Register Elito Work widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 */
	protected function register_controls()
	{

		$this->start_controls_section(
			'section_work',
			[
				'label' => esc_html__('Work Options', 'elito-core'),
			]
		);
		$this->add_control(
			'work_style',
			[
				'label' => esc_html__('Work Style', 'elito-core'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-one' => esc_html__('Style One', 'elito-core'),
					'style-two' => esc_html__('Style Two', 'elito-core'),
				],
				'default' => 'style-one',
				'description' => esc_html__('Select your work style.', 'elito-core'),
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
			'work_date',
			[
				'label' => esc_html__('Work Date', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('2019 - 2020', 'elito-core'),
				'placeholder' => esc_html__('Type date here', 'elito-core'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'client_logo',
			[
				'label' => esc_html__('Logo Image', 'elito-core'),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],

			]
		);
		$repeater->add_control(
			'work_title',
			[
				'label' => esc_html__('Title Text', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('UI/UX Designer', 'elito-core'),
				'placeholder' => esc_html__('Type title text here', 'elito-core'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'work_subtitle',
			[
				'label' => esc_html__('Sub Title', 'elito-core'),
				'default' => esc_html__('Trapeza Group, USA.', 'elito-core'),
				'placeholder' => esc_html__('Type your subtitle here', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'link_text',
			[
				'label' => esc_html__('Link Text', 'elito-core'),
				'default' => esc_html__('Go to website.', 'elito-core'),
				'placeholder' => esc_html__('Type your link text here', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'work_link',
			[
				'label' => esc_html__('link', 'elito-core'),
				'default' => esc_html__('#', 'elito-core'),
				'placeholder' => esc_html__('Type your link here', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'workItems_groups',
			[
				'label' => esc_html__('Work Icons', 'elito-core'),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'work_title' => esc_html__('Work', 'elito-core'),
					],

				],
				'fields' =>  $repeater->get_controls(),
				'title_field' => '{{{ work_title }}}',
			]
		);
		$this->end_controls_section(); // end: Section


		$this->start_controls_section(
			'section_work_section_style',
			[
				'label' => esc_html__('Work BG', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]

		);
		$this->add_control(
			'work_bg_color',
			[
				'label' => esc_html__('BG Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-work-area, .wpo-work-area-s2' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'work_shape_color',
			[
				'label' => esc_html__('Shape Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-work-area .shape-wk svg circle, .wpo-work-area-s2 .shape-wk svg circle' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'work_item_bg_color',
			[
				'label' => esc_html__('Item BG Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-work-area .wpo-work-wrap .wpo-work-item, .wpo-work-area-s2 .wpo-work-wrap .wpo-work-item' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Work Number
		$this->start_controls_section(
			'section_work_number_section_style',
			[
				'label' => esc_html__('Date', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'elito-core'),
				'name' => 'elito_date_typography',
				'selector' => '{{WRAPPER}} .wpo-work-area .wpo-work-wrap .wpo-work-item ul li.date, .wpo-work-area-s2 .wpo-work-wrap .wpo-work-item ul li.date',
			]
		);
		$this->add_control(
			'work_item_number_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-work-area .wpo-work-wrap .wpo-work-item ul li.date, .wpo-work-area-s2 .wpo-work-wrap .wpo-work-item ul li.date' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .wpo-work-area .wpo-work-wrap .wpo-work-item ul li.position, .wpo-work-area-s2 .wpo-work-wrap .wpo-work-item ul li.position',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-work-area .wpo-work-wrap .wpo-work-item ul li.position, .wpo-work-area-s2 .wpo-work-wrap .wpo-work-item ul li.position' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .wpo-work-area .wpo-work-wrap .wpo-work-item ul li.position, .wpo-work-area-s2 .wpo-work-wrap .wpo-work-item ul li.position' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section


		// Title
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
				'name' => 'elito_subtitle_typography',
				'selector' => '{{WRAPPER}} .wpo-work-area .wpo-work-wrap .wpo-work-item ul li.position span, .wpo-work-area-s2 .wpo-work-wrap .wpo-work-item ul li.position span',
			]
		);
		$this->add_control(
			'subtitle_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-work-area .wpo-work-wrap .wpo-work-item ul li.position span, .wpo-work-area-s2 .wpo-work-wrap .wpo-work-item ul li.position span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'subtitle_padding',
			[
				'label' => __('Title Padding', 'elito-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .wpo-work-area .wpo-work-wrap .wpo-work-item ul li.position span, .wpo-work-area-s2 .wpo-work-wrap .wpo-work-item ul li.position span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section



		// Title
		$this->start_controls_section(
			'section_link_style',
			[
				'label' => esc_html__('Link', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'elito-core'),
				'name' => 'elito_link_typography',
				'selector' => '{{WRAPPER}} .wpo-work-area .wpo-work-wrap .wpo-work-item ul li.link a, .wpo-work-area-s2 .wpo-work-wrap .wpo-work-item ul li.link a',
			]
		);
		$this->add_control(
			'link_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-work-area .wpo-work-wrap .wpo-work-item ul li.link a, .wpo-work-area-s2 .wpo-work-wrap .wpo-work-item ul li.link a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'link_hover_color',
			[
				'label' => esc_html__('Hover Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-work-area .wpo-work-wrap .wpo-work-item ul li.link a:hover, .wpo-work-area-s2 .wpo-work-wrap .wpo-work-item ul li.link a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

	}

	/**
	 * Render Work widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$work_style = !empty($settings['work_style']) ? $settings['work_style'] : '';
		$workItems_groups = !empty($settings['workItems_groups']) ? $settings['workItems_groups'] : [];
		// Turn output buffer on
		$section_title = !empty($settings['section_title']) ? $settings['section_title'] : '';
		$section_content = !empty($settings['section_content']) ? $settings['section_content'] : '';

		if ($work_style == 'style-one') {
			$work_class = 'wpo-work-area';
		} else {
			$work_class = 'wpo-work-area-s2';
		}

		ob_start(); ?>
		<div class="<?php echo esc_attr($work_class); ?> section-padding">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 col-12">
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
				<div class="wpo-work-wrap">
					<?php
					$id = 0;
					// Group Param Output
					if (is_array($workItems_groups) && !empty($workItems_groups)) {
						foreach ($workItems_groups as $each_item) {
							$id++;
							$work_date = !empty($each_item['work_date']) ? $each_item['work_date'] : '';
							$work_title = !empty($each_item['work_title']) ? $each_item['work_title'] : '';
							$work_subtitle = !empty($each_item['work_subtitle']) ? $each_item['work_subtitle'] : '';
							$link_text = !empty($each_item['link_text']) ? $each_item['link_text'] : '';
							$work_link = !empty($each_item['work_link']) ? $each_item['work_link'] : '';

							$bg_image = !empty($each_item['client_logo']['id']) ? $each_item['client_logo']['id'] : '';

							$image_url = wp_get_attachment_url($bg_image);
							$image_alt = get_post_meta($bg_image, '_wp_attachment_image_alt', true);

							if ($work_link) {
								$link_o = '<a href="' . $work_link . '" class="more">';
								$link_c = '</a>';
							} else {
								$link_o = '';
								$link_c = '';
							}

					?>
							<div class="wpo-work-item">
								<ul>
									<?php
									if ($work_date) {
										echo '<li class="date">' . wp_kses_post($work_date) . '</li>';
									}
									?>
									<li class="logo">
										<?php if ($image_url) {
											echo '<img src="' . esc_url($image_url) . '" alt="' . esc_url($image_alt) . '">';
										} ?>
									</li>
									<?php
									if ($work_title) {
										echo '<li class="position">' . esc_html($work_title) . '<span>' . wp_kses_post($work_subtitle) . '</span></li>';
									}
									if ($link_text) {
										echo ' <li class="link">' . $link_o . '' . esc_html($link_text) . '' . $link_c . '</li>';
									}
									?>
								</ul>
							</div>
					<?php }
					} ?>
				</div>
			</div>
			<div class="shape-wk">
				<svg width="1500" height="1500" viewBox="0 0 1500 1500" fill="none">
					<g opacity="0.45" filter="url(#filter0_f_39_4214)">
						<circle cx="750" cy="750" r="200" />
					</g>
					<defs>
						<filter id="filter0_f_39_4214" x="0" y="0" width="1500" height="1500" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
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
	 * Render Work widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 */

	//protected function _content_template(){}

}
Plugin::instance()->widgets_manager->register(new Elito_Work());
