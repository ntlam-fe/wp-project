<?php
/*
 * Elementor Elito CTA Widget
 * Author & Copyright: wpoceans
*/

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Elito_CTA extends Widget_Base
{

	/**
	 * Retrieve the widget name.
	 */
	public function get_name()
	{
		return 'wpo-elito_cta';
	}

	/**
	 * Retrieve the widget title.
	 */
	public function get_title()
	{
		return esc_html__('CTA', 'elito-core');
	}

	/**
	 * Retrieve the widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-posts-ticker';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 */
	public function get_categories()
	{
		return ['wpoceans-category'];
	}

	/**
	 * Retrieve the list of scripts the Elito CTA widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	 */
	/*
	public function get_script_depends() {
		return ['wpo-elito_cta'];
	}
	*/

	/**
	 * Register Elito CTA widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 */
	protected function register_controls()
	{

		$this->start_controls_section(
			'section_CTA',
			[
				'label' => esc_html__('CTA Options', 'elito-core'),
			]
		);
		$this->add_control(
			'cta_title',
			[
				'label' => esc_html__('Title Text', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Title Text', 'elito-core'),
				'placeholder' => esc_html__('Type title text here', 'elito-core'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'btn_text',
			[
				'label' => esc_html__('Button/Link Text', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Button Text', 'elito-core'),
				'placeholder' => esc_html__('Type btn text here', 'elito-core'),
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
		$this->end_controls_section(); // end: Section

		// Section
		$this->start_controls_section(
			'section_cta_style',
			[
				'label' => esc_html__('Section', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'cta_bg_color',
				'label' => esc_html__('Background', 'elito-core'),
				'description' => esc_html__('Background Color', 'elito-core'),
				'types' => ['gradient'],
				'selector' => '{{WRAPPER}} .upper-contact-area',
			]
		);
		$this->add_responsive_control(
			'cta_section_padding',
			[
				'label' => esc_html__('Section Padding', 'elito-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .upper-contact-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .upper-contact-area .contact-grids h2',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .upper-contact-area .contact-grids h2' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .upper-contact-area .contact-grids h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		$this->add_control(
			'form_button_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .upper-contact-area .contact-grids a.theme-btn' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'form_button_bg_color',
			[
				'label' => esc_html__('Background Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .upper-contact-area .contact-grids a.theme-btn' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'form_button_hover_color',
			[
				'label' => esc_html__('Hover Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .upper-contact-area .contact-grids a.theme-btn:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'form_button_hover_bg_color',
			[
				'label' => esc_html__('Hover BG Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .upper-contact-area .contact-grids a.theme-btn:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section
	}

	/**
	 * Render CTA widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();

		$cta_title = !empty($settings['cta_title']) ? $settings['cta_title'] : '';

		$btn_text = !empty($settings['btn_text']) ? $settings['btn_text'] : '';

		$btn_link = !empty($settings['btn_link']['url']) ? $settings['btn_link']['url'] : '';
		$btn_external = !empty($settings['btn_link']['is_external']) ? 'target="_blank"' : '';
		$btn_nofollow = !empty($settings['btn_link']['nofollow']) ? 'rel="nofollow"' : '';
		$btn_link_attr = !empty($btn_link) ?  $btn_external . ' ' . $btn_nofollow : '';

		$button = $btn_link ? '<a href="' . esc_url($btn_link) . '" ' . esc_attr($btn_link_attr) . ' class="theme-btn" >' . esc_html($btn_text) . '</a>' : '';

		// Turn output buffer on
		ob_start(); ?>
		<div class="upper-contact-area">
			<div class="container">
				<div class="contact-grids">
					<div class="row align-items-center">
						<div class="col col-lg-6">
							<?php
							if ($cta_title) {
								echo '<h2>' . esc_html($cta_title) . '</h2>';
							}
							?>
						</div>
						<div class="col col-lg-6">
							<div class="send-message-btn">
								<?php echo $button; ?>
							</div>
						</div>
					</div>
					<div class="left-shape"></div>
				</div>
			</div>
		</div>
<?php // Return outbut buffer
		echo ob_get_clean();
	}
	/**
	 * Render CTA widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 */

	//protected function _content_template(){}

}
Plugin::instance()->widgets_manager->register(new Elito_CTA());
