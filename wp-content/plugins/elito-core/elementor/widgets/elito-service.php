<?php
/*
 * Elementor Cleener Service Widget
 * Author & Copyright: wpoceans
*/

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Cleener_Service extends Widget_Base
{

	/**
	 * Retrieve the widget name.
	 */
	public function get_name()
	{
		return 'wpo-elito_service';
	}

	/**
	 * Retrieve the widget title.
	 */
	public function get_title()
	{
		return esc_html__('Service', 'elito-core');
	}

	/**
	 * Retrieve the widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-icon-box';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 */
	public function get_categories()
	{
		return ['wpoceans-category'];
	}

	/**
	 * Retrieve the list of scripts the Cleener Service widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	 */
	public function get_script_depends()
	{
		return ['wpo-elito_service'];
	}

	/**
	 * Register Cleener Service widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 */
	protected function register_controls()
	{


		$posts = get_posts('post_type="service"&numberposts=-1');
		$PostID = array();
		if ($posts) {
			foreach ($posts as $post) {
				$PostID[$post->ID] = $post->ID;
			}
		} else {
			$PostID[__('No ID\'s found', 'elito')] = 0;
		}


		$this->start_controls_section(
			'section_service_listing',
			[
				'label' => esc_html__('Listing Options', 'elito-core'),
			]
		);
		$this->add_control(
			'service_limit',
			[
				'label' => esc_html__('Service Limit', 'elito-core'),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => 3,
				'description' => esc_html__('Enter the number of items to show.', 'elito-core'),
			]
		);
		$this->add_control(
			'service_order',
			[
				'label' => __('Order', 'elito-core'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'ASC' => esc_html__('Asending', 'elito-core'),
					'DESC' => esc_html__('Desending', 'elito-core'),
				],
				'default' => 'DESC',
			]
		);
		$this->add_control(
			'service_orderby',
			[
				'label' => __('Order By', 'elito-core'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'none' => esc_html__('None', 'elito-core'),
					'ID' => esc_html__('ID', 'elito-core'),
					'author' => esc_html__('Author', 'elito-core'),
					'title' => esc_html__('Title', 'elito-core'),
					'date' => esc_html__('Date', 'elito-core'),
				],
				'default' => 'date',
			]
		);
		$this->add_control(
			'service_show_category',
			[
				'label' => __('Certain Categories?', 'elito-core'),
				'type' => Controls_Manager::SELECT2,
				'default' => [],
				'options' => Controls_Helper_Output::get_terms_names('service_category'),
				'multiple' => true,
			]
		);
		$this->add_control(
			'service_show_id',
			[
				'label' => __('Certain ID\'s?', 'elito-core'),
				'type' => Controls_Manager::SELECT2,
				'default' => [],
				'options' => $PostID,
				'multiple' => true,
			]
		);
		$this->add_control(
			'short_content',
			[
				'label' => esc_html__('Excerpt Length', 'elito-core'),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'step' => 1,
				'default' => 16,
				'description' => esc_html__('How many words you want in short content paragraph.', 'elito-core'),
			]
		);
		$this->add_control(
			'read_more_txt',
			[
				'label' => esc_html__('Read More', 'arkio-core'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Read More',
				'placeholder' => esc_html__('Type your Read More text here', 'arkio-core'),
			]
		);
		$this->end_controls_section(); // end: Section

		// section-title
		$this->start_controls_section(
			'section_service_title_style',
			[
				'label' => esc_html__('Section Title ', 'elito-core'),
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
		$this->end_controls_section(); // end: Section

		// section-Tab title
		$this->start_controls_section(
			'section_service_tab_title_style',
			[
				'label' => esc_html__('Tabs Title ', 'elito-core'),
			]
		);
		$this->add_control(
			'development_tab_title',
			[
				'label' => esc_html__('Development Tab Text', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Development', 'elito-core'),
				'placeholder' => esc_html__('Type title text here', 'elito-core'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'design_tab_title',
			[
				'label' => esc_html__('Design Tab Text', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Design', 'elito-core'),
				'placeholder' => esc_html__('Type title text here', 'elito-core'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'marketing_tab_title',
			[
				'label' => esc_html__('Marketing Tab Text', 'elito-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Marketing', 'elito-core'),
				'placeholder' => esc_html__('Type title text here', 'elito-core'),
				'label_block' => true,
			]
		);
		$this->end_controls_section(); // end: Section

		// Background
		$this->start_controls_section(
			'service_section_bg_style',
			[
				'label' => esc_html__('Background', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'section_bg_color',
			[
				'label' => esc_html__('Background Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-service-area' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'section_bg_shape_color',
			[
				'label' => esc_html__('Shape Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-service-area .ab-shape svg circle' => 'fill: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .wpo-service-area .wpo-section-title h2',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-service-area .wpo-section-title h2' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .wpo-service-area .wpo-section-title h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .wpo-service-area .wpo-section-title p',
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-service-area .wpo-section-title p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Tab Style
		$this->start_controls_section(
			'section_tab_content_style',
			[
				'label' => esc_html__('Tab', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'elito-core'),
				'name' => 'section_tab_content_typography',
				'selector' => '{{WRAPPER}} .wpo-service-area .wpo-service-wrap .nav-tabs .nav-item .nav-link',
			]
		);
		$this->add_control(
			'tab_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-service-area .wpo-service-wrap .nav-tabs .nav-item .nav-link' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'tab_bg_color',
			[
				'label' => esc_html__('BG Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-service-area .wpo-service-wrap .nav-tabs .nav-item .nav-link' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'tab_box_color',
			[
				'label' => esc_html__('Border Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-service-area .wpo-service-wrap .nav-tabs .nav-item .nav-link' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'tab_active_color',
			[
				'label' => esc_html__('Active Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-service-area .wpo-service-wrap .nav-tabs .nav-item .nav-link.active' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'tab_active_bg_color',
			[
				'label' => esc_html__('Active BG Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-service-area .wpo-service-wrap .nav-tabs .nav-item .nav-link.active' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'tab_active_box_color',
			[
				'label' => esc_html__('Active Border Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-service-area .wpo-service-wrap .nav-tabs .nav-item .nav-link.active' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Service Item
		$this->start_controls_section(
			'section_service_item_style',
			[
				'label' => esc_html__('Service Box ', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'service_box_bg_color',
			[
				'label' => esc_html__('Background Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-service-area .wpo-service-wrap .wpo-service-item' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'service_box_br_color',
			[
				'label' => esc_html__('Border Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-service-area .wpo-service-wrap .wpo-service-item' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section


		// Icons
		$this->start_controls_section(
			'section_service_icon_section_style',
			[
				'label' => esc_html__('Icon', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]

		);
		$this->add_control(
			'item_icon_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-service-area .wpo-service-wrap .wpo-service-item .icon i:before' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'item_icon_bg_color',
			[
				'label' => esc_html__('BG Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-service-area .wpo-service-wrap .wpo-service-item .icon' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'item_icon_hover_color',
			[
				'label' => esc_html__('Hover Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-service-area .wpo-service-wrap .wpo-service-item:hover .icon .fi:before' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'item_icon_bg_hover_color',
			[
				'label' => esc_html__('Hover BG Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-service-area .wpo-service-wrap .wpo-service-item .icon:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Title
		$this->start_controls_section(
			'service_section_title_style',
			[
				'label' => esc_html__('Title', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'elito-core'),
				'name' => 'service_elito_title_typography',
				'selector' => '{{WRAPPER}} .wpo-service-area .wpo-service-wrap .wpo-service-item h2',
			]
		);
		$this->add_control(
			'service_section_title_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-service-area .wpo-service-wrap .wpo-service-item h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'service_section_title_padding',
			[
				'label' => esc_html__('Title Padding', 'elito-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .wpo-service-area .wpo-service-wrap .wpo-service-item h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Content
		$this->start_controls_section(
			'section_service_content_style',
			[
				'label' => esc_html__('Content Text', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'elito-core'),
				'name' => 'section_service_content_typography',
				'selector' => '{{WRAPPER}} .wpo-service-area .wpo-service-wrap .wpo-service-item p',
			]
		);
		$this->add_control(
			'service_content_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-service-area .wpo-service-wrap .wpo-service-item p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section


		// readmore
		$this->start_controls_section(
			'section_content_readmore_style',
			[
				'label' => esc_html__('Readmore Text', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'elito-core'),
				'name' => 'section_content_readmore_typography',
				'selector' => '{{WRAPPER}} .wpo-service-area .wpo-service-wrap .wpo-service-item a',
			]
		);
		$this->add_control(
			'readmore_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-service-area .wpo-service-wrap .wpo-service-item a,.wpo-service-area .wpo-service-wrap .wpo-service-item a:before' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section


	}

	/**
	 * Render Service widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$section_title = !empty($settings['section_title']) ? $settings['section_title'] : '';
		$section_content = !empty($settings['section_content']) ? $settings['section_content'] : '';
		$design_tab_title = !empty($settings['design_tab_title']) ? $settings['design_tab_title'] : '';
		$development_tab_title = !empty($settings['development_tab_title']) ? $settings['development_tab_title'] : '';
		$marketing_tab_title = !empty($settings['marketing_tab_title']) ? $settings['marketing_tab_title'] : '';

		$service_limit = !empty($settings['service_limit']) ? $settings['service_limit'] : '';
		$service_order = !empty($settings['service_order']) ? $settings['service_order'] : '';
		$service_orderby = !empty($settings['service_orderby']) ? $settings['service_orderby'] : '';
		$service_show_category = !empty($settings['service_show_category']) ? $settings['service_show_category'] : [];
		$service_show_id = !empty($settings['service_show_id']) ? $settings['service_show_id'] : [];
		$short_content = !empty($settings['short_content']) ? $settings['short_content'] : '';
		$excerpt_length = $short_content ? $short_content : '16';

		$read_more_txt = !empty($settings['read_more_txt']) ? $settings['read_more_txt'] : '';

		// Turn output buffer on
		ob_start();

		// Pagination
		global $paged;
		if (get_query_var('paged'))
			$my_page = get_query_var('paged');
		else {
			if (get_query_var('page'))
				$my_page = get_query_var('page');
			else
				$my_page = 1;
			set_query_var('paged', $my_page);
			$paged = $my_page;
		}

		if ($service_show_id) {
			$service_show_id = json_encode($service_show_id);
			$service_show_id = str_replace(array('[', ']'), '', $service_show_id);
			$service_show_id = str_replace(array('"', '"'), '', $service_show_id);
			$service_show_id = explode(',', $service_show_id);
		} else {
			$service_show_id = '';
		}

		$args = array(
			// other query params here,
			'paged' => $my_page,
			'post_type' => 'service',
			'posts_per_page' => (int)$service_limit,
			'service_category' => implode(',', $service_show_category),
			'orderby' => $service_orderby,
			'order' => $service_order,
			'post__in' => $service_show_id,
		);

		$elito_service = new \WP_Query($args);
		if ($elito_service->have_posts()) :

?>

			<div class="wpo-service-area section-padding">
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
					<div class="wpo-service-wrap">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<?php if ($development_tab_title) { ?>
								<li class="nav-item" role="presentation">
									<a class="nav-link" id="Development-tab" data-bs-toggle="tab" href="#Development" role="tab" aria-controls="Development" aria-selected="true"><?php echo esc_html($development_tab_title); ?></a>
								</li>
							<?php }
							if ($design_tab_title) { ?>
								<li class="nav-item" role="presentation">
									<a class="nav-link active" id="Design-tab" data-bs-toggle="tab" href="#Design" role="tab" aria-controls="Design" aria-selected="false"><?php echo esc_html($design_tab_title); ?></a>
								</li>
							<?php }
							if ($marketing_tab_title) { ?>
								<li class="nav-item" role="presentation">
									<a class="nav-link" id="Marketing-tab" data-bs-toggle="tab" href="#Marketing" role="tab" aria-controls="Marketing" aria-selected="false"><?php echo esc_html($marketing_tab_title); ?></a>
								</li>
							<?php } ?>
						</ul>
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane" id="Development">
								<div class="row align-items-center">
									<?php

									while ($elito_service->have_posts()) : $elito_service->the_post();

										$service_options = get_post_meta(get_the_ID(), 'service_options', true);

										$service_icon = isset($service_options['service_icon']) ? $service_options['service_icon'] : '';
										$services_cat = isset($service_options['services_cat']) ? $service_options['services_cat'] : '';

										global $post;

										if ($services_cat == 'development') {
									?>
											<div class="col-lg-4 col-md-6 col-12">
												<div class="wpo-service-item">
													<?php if ($service_icon) { ?>
														<div class="icon">
															<i class="fi <?php echo esc_attr($service_icon); ?>"></i>
														</div>
													<?php } ?>
													<h2><?php echo get_the_title(); ?></h2>
													<p><?php echo get_the_excerpt(); ?></p>
													<a href="<?php echo esc_url(get_permalink()); ?>">
														<?php echo esc_html($read_more_txt); ?>
													</a>
												</div>
											</div>
									<?php }
									endwhile;
									wp_reset_postdata();
									?>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane active" id="Design">
								<div class="row align-items-center">

									<?php

									while ($elito_service->have_posts()) : $elito_service->the_post();

										$service_options = get_post_meta(get_the_ID(), 'service_options', true);

										$service_icon = isset($service_options['service_icon']) ? $service_options['service_icon'] : '';
										$services_cat = isset($service_options['services_cat']) ? $service_options['services_cat'] : '';

										global $post;

										if ($services_cat == 'design') {
									?>
											<div class="col-lg-4 col-md-6 col-12">
												<div class="wpo-service-item">
													<?php if ($service_icon) { ?>
														<div class="icon">
															<i class="fi <?php echo esc_attr($service_icon); ?>"></i>
														</div>
													<?php } ?>
													<h2><?php echo get_the_title(); ?></h2>
													<p><?php echo get_the_excerpt(); ?></p>
													<a href="<?php echo esc_url(get_permalink()); ?>">
														<?php echo esc_html($read_more_txt); ?>
													</a>
												</div>
											</div>
									<?php }
									endwhile;
									wp_reset_postdata();
									?>

								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="Marketing">
								<div class="row align-items-center">

									<?php

									while ($elito_service->have_posts()) : $elito_service->the_post();

										$service_options = get_post_meta(get_the_ID(), 'service_options', true);

										$service_icon = isset($service_options['service_icon']) ? $service_options['service_icon'] : '';
										$services_cat = isset($service_options['services_cat']) ? $service_options['services_cat'] : '';

										global $post;

										if ($services_cat == 'marketing') {
									?>
											<div class="col-lg-4 col-md-6 col-12">
												<div class="wpo-service-item">
													<?php if ($service_icon) { ?>
														<div class="icon">
															<i class="fi <?php echo esc_attr($service_icon); ?>"></i>
														</div>
													<?php } ?>
													<h2><?php echo get_the_title(); ?></h2>
													<p><?php echo get_the_excerpt(); ?></p>
													<a href="<?php echo esc_url(get_permalink()); ?>">
														<?php echo esc_html($read_more_txt); ?>
													</a>
												</div>
											</div>
									<?php }
									endwhile;
									wp_reset_postdata();
									?>

								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="ab-shape">
					<svg width="995" height="1495" viewBox="0 0 995 1495" fill="none">
						<g opacity="0.3" filter="url(#filter0_f_39_4268)">
							<circle cx="247.5" cy="747.5" r="247.5" fill="#FFE500" />
						</g>
						<defs>
							<filter id="filter0_f_39_4268" x="-500" y="0" width="1495" height="1495" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
								<feFlood flood-opacity="0" result="BackgroundImageFix" />
								<feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
								<feGaussianBlur stdDeviation="250" result="effect1_foregroundBlur_39_4267" />
							</filter>
						</defs>
					</svg>
				</div>
			</div>

<?php
		endif;
		// Return outbut buffer
		echo ob_get_clean();
	}
	/**
	 * Render Service widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 */

	//protected function _content_template(){}

}
Plugin::instance()->widgets_manager->register(new Cleener_Service());
