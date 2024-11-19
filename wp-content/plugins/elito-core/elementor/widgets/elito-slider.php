<?php
/*
 * Elementor Elito Slider Widget
 * Author & Copyright: wpoceans
*/

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Elito_Slider extends Widget_Base
{

	/**
	 * Retrieve the widget name.
	 */
	public function get_name()
	{
		return 'wpo-elito_slider';
	}

	/**
	 * Retrieve the widget title.
	 */
	public function get_title()
	{
		return esc_html__('Slider', 'elito-core');
	}

	/**
	 * Retrieve the widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-post-slider';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 */
	public function get_categories()
	{
		return ['wpoceans-category'];
	}

	/**
	 * Retrieve the list of scripts the Elito Slider widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	 */

	public function get_script_depends()
	{
		return ['wpo-elito_slider'];
	}


	/**
	 * Register Elito Slider widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 */
	protected function register_controls()
	{

		$this->start_controls_section(
			'section_slider',
			[
				'label' => __('Slider Options', 'elito-core'),
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'slide_color',
			[
				'label' => esc_html__('Slide background Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'default' => '#bbbbbb',
				'selectors' => [
					'{{WRAPPER}} .wpo-hero-slider' => 'background-color: {{VALUE}};',
				],
			]
		);
		$repeater->add_control(
			'slider_toptitle',
			[
				'label' => esc_html__('Slider toptitle', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Hello',
				'placeholder' => esc_html__('Type slide title here', 'elito-core'),
			]
		);
		$repeater->add_control(
			'slider_title',
			[
				'label' => esc_html__('Slider title', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'I am Ronald.',
				'placeholder' => esc_html__('Type slide title here', 'elito-core'),
			]
		);
		$repeater->add_control(
			'slider_subtitle',
			[
				'label' => esc_html__('Slider subtitle', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'UX UI Designer',
				'placeholder' => esc_html__('Type slide subtitle here', 'elito-core'),
			]
		);

		$repeater->add_control(
			'slider_content',
			[
				'label' => esc_html__('Slider content', 'elito-core'),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => 'Slider Details content',
				'placeholder' => esc_html__('Type slide content here', 'elito-core'),
			]
		);
		$repeater->add_control(
			'btn_txt',
			[
				'label' => esc_html__('Button Text', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Get Started',
				'placeholder' => esc_html__('Type your button text here', 'elito-core'),
			]
		);
		$repeater->add_control(
			'button_link',
			[
				'label' => esc_html__('Button Link', 'elito-core'),
				'type' => Controls_Manager::URL,
				'placeholder' => __('https://your-link.com', 'elito-core'),
				'show_external' => true,
				'default' => [
					'url' => '#',
				],
			]
		);
		$repeater->add_control(
			'slider_image',
			[
				'label' => esc_html__('Slider Image', 'elito-core'),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'swipeSliders_groups',
			[
				'label' => esc_html__('Slider Items', 'elito-core'),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'slider_title' => esc_html__('Item #1', 'elito-core'),
					],

				],
				'fields' =>  $repeater->get_controls(),
				'title_field' => '{{{ slider_title }}}',
			]
		);
		$this->end_controls_section(); // end: Section

		$this->start_controls_section(
			'section_carousel',
			[
				'label' => esc_html__('Carousel Options', 'elito-core'),
			]
		);
		$this->add_control(
			'carousel_nav',
			[
				'label' => esc_html__('Navigation', 'elito-core'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Yes', 'elito-core'),
				'label_off' => esc_html__('No', 'elito-core'),
				'return_value' => 'true',
				'description' => esc_html__('If you want Carousel Navigation, enable it.', 'elito-core'),
			]
		);

		$this->end_controls_section(); // end: Section


		// Slide
		$this->start_controls_section(
			'section_slide_option_style',
			[
				'label' => esc_html__('Slide', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'slide_height',
			[
				'label' => esc_html__('Height', 'elito-core'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 350,
						'max' => 1000,
						'step' => 1,
					],
				],
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .wpo-hero-slider' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section


		// Title
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
				'name' => 'top_title_typography',
				'selector' => '{{WRAPPER}} .wpo-hero-slider .slide-title h2 span',
			]
		);
		$this->add_control(
			'top_title_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-hero-slider .slide-title h2 span' => 'color: {{VALUE}};',
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
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .wpo-hero-slider .slide-title h2',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-hero-slider .slide-title h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// SubTitle
		$this->start_controls_section(
			'section_subtitle_style',
			[
				'label' => esc_html__('SubTitle', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',
				'selector' => '{{WRAPPER}} .wpo-hero-slider .slide-inner .slide-content .slide-sub-title h5',
			]
		);
		$this->add_control(
			'subtitle_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-hero-slider .slide-inner .slide-content .slide-sub-title h5' => 'color: {{VALUE}};',
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
				'name' => 'slider_content_typography',
				'selector' => '{{WRAPPER}} .wpo-hero-slider .slide-inner .slide-content .slide-text p',
			]
		);
		$this->add_control(
			'slider_content_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-hero-slider .slide-inner .slide-content .slide-text p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section


		// Navigation
		$this->start_controls_section(
			'section_navigation_style',
			[
				'label' => esc_html__('Navigation', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'slider_nav_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-hero-slider .swiper-button-prev:before,.wpo-hero-slider .swiper-button-next:before' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'slider_nav_bg_color',
			[
				'label' => esc_html__('Background Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-hero-slider .swiper-button-prev, .wpo-hero-slider .swiper-button-next' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'slider_nav_br_color',
			[
				'label' => esc_html__('Border Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-hero-slider .swiper-button-next:after, .wpo-hero-slider .swiper-button-prev:after' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Button Style
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
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .wpo-hero-slider .slide-btn .theme-btn',
			]
		);
		$this->add_responsive_control(
			'button_min_width',
			[
				'label' => esc_html__('Width', 'elito-core'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 500,
						'step' => 1,
					],
				],
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .wpo-hero-slider .slide-btn .theme-btn' => 'min-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_padding',
			[
				'label' => __('Padding', 'elito-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .wpo-hero-slider .slide-btn .theme-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_border_radius',
			[
				'label' => __('Border Radius', 'elito-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .wpo-hero-slider .slide-btn .theme-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs('button_style');
		$this->start_controls_tab(
			'button_normal',
			[
				'label' => esc_html__('Normal', 'elito-core'),
			]
		);
		$this->add_control(
			'button_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-hero-slider .slide-btn .theme-btn' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'button_bg_color',
				'label' => esc_html__('Background', 'elito-core'),
				'description' => esc_html__('Button Color', 'elito-core'),
				'types' => ['gradient'],
				'selector' => '{{WRAPPER}} .wpo-hero-slider .slide-btn .theme-btn',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_border',
				'label' => esc_html__('Border', 'elito-core'),
				'selector' => '{{WRAPPER}} .wpo-hero-slider .slide-btn .theme-btn',
			]
		);
		$this->end_controls_tab();  // end:Normal tab

		$this->start_controls_tab(
			'button_hover',
			[
				'label' => esc_html__('Hover', 'elito-core'),
			]
		);
		$this->add_control(
			'button_hover_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-hero-slider .slide-btn .theme-btn:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'button_bg_hover_color',
				'label' => esc_html__('Hover Background', 'elito-core'),
				'description' => esc_html__('Hover Background Color', 'elito-core'),
				'types' => ['gradient'],
				'selector' => '{{WRAPPER}} .elito-hero .btns .theme-btn:hover',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_hover_border',
				'label' => esc_html__('Border', 'elito-core'),
				'selector' => '{{WRAPPER}} .wpo-hero-slider .slide-btn .theme-btn:hover',
			]
		);
		$this->end_controls_tab();  // end:Hover tab
		$this->end_controls_tabs(); // end tabs

		$this->end_controls_section(); // end: Section



	}

	/**
	 * Render Blog widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$slide_style = !empty($settings['slide_style']) ? $settings['slide_style'] : '';
		// Carousel Options
		$swipeSliders_groups = !empty($settings['swipeSliders_groups']) ? $settings['swipeSliders_groups'] : [];
		$carousel_nav  = (isset($settings['carousel_nav']) && ('true' == $settings['carousel_nav'])) ? true : false;
		// Turn output buffer on

		ob_start();

?>
		<div class="wpo-hero-slider">
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<?php
					if (is_array($swipeSliders_groups) && !empty($swipeSliders_groups)) {
						foreach ($swipeSliders_groups as $each_item) {

							$image_url = wp_get_attachment_url($each_item['slider_image']['id']);

							$slider_subtitle = !empty($each_item['slider_subtitle']) ? $each_item['slider_subtitle'] : '';
							$slider_title = !empty($each_item['slider_title']) ? $each_item['slider_title'] : '';
							$slider_toptitle = !empty($each_item['slider_toptitle']) ? $each_item['slider_toptitle'] : '';
							$slider_content = !empty($each_item['slider_content']) ? $each_item['slider_content'] : '';

							$button_text = !empty($each_item['btn_txt']) ? $each_item['btn_txt'] : '';
							$button_link = !empty($each_item['button_link']['url']) ? $each_item['button_link']['url'] : '';
							$button_link_external = !empty($each_item['button_link']['is_external']) ? 'target="_blank"' : '';
							$button_link_nofollow = !empty($each_item['button_link']['nofollow']) ? 'rel="nofollow"' : '';
							$button_link_attr = !empty($button_link) ?  $button_link_external . ' ' . $button_link_nofollow : '';

							$button_one = $button_link ? '<a href="' . esc_url($button_link) . '" ' . $button_link_attr . ' class="theme-btn" >' . $button_text . '</a>' : '';

							$button_actual = ($button_one) ? '<div class="slide-btn">' . $button_one . '</div>' : '';

					?>

							<div class="swiper-slide">
								<div class="slide-inner slide-bg-image" data-background="<?php echo esc_url($image_url); ?>">
									<div class="container">
										<div class="slide-content">
											<div data-swiper-parallax="300" class="slide-title">
												<h2>
													<?php
													if ($slider_toptitle) {
														echo '<span>' . esc_html($slider_toptitle) . '</span>';
													}
													if ($slider_title) {
														echo esc_html($slider_title);
													} ?>
												</h2>
											</div>
											<div data-swiper-parallax="300" class="slide-sub-title">
												<?php if ($slider_subtitle) {
													echo '<h5>' . esc_html($slider_subtitle) . '</h5>';
												} ?>
											</div>
											<div data-swiper-parallax="400" class="slide-text">
												<?php if ($slider_content) {
													echo '<p>' . esc_html($slider_content) . '</p>';
												} ?>
											</div>
											<div class="clearfix"></div>
											<?php echo $button_actual; ?>
										</div>
									</div>
								</div> <!-- end slide-inner -->
							</div> <!-- end swiper-slide -->
					<?php }
					} ?>
				</div>
				<!-- swipper controls -->
				<?php if ($carousel_nav) { ?>
					<div class="swiper-pagination"></div>
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				<?php } ?>
			</div>
		</div>
<?php
		// Return outbut buffer
		echo ob_get_clean();
	}

	/**
	 * Render Blog widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 */

	//protected function _content_template(){}

}
Plugin::instance()->widgets_manager->register(new Elito_Slider());
