<?php
/*
 * Elementor Elito Project Widget
 * Author & Copyright: wpoceans
*/

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Elito_Project extends Widget_Base
{

	/**
	 * Retrieve the widget name.
	 */
	public function get_name()
	{
		return 'wpo-elito_project';
	}

	/**
	 * Retrieve the widget title.
	 */
	public function get_title()
	{
		return esc_html__('Project', 'elito-core');
	}

	/**
	 * Retrieve the widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-featured-image';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 */
	public function get_categories()
	{
		return ['wpoceans-category'];
	}

	/**
	 * Retrieve the list of scripts the Elito Project widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	 */
	public function get_script_depends()
	{
		return ['wpo-elito_project'];
	}

	/**
	 * Register Elito Project widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 */
	protected function register_controls()
	{


		$posts = get_posts('post_type="project"&numberposts=-1');
		$PostID = array();
		if ($posts) {
			foreach ($posts as $post) {
				$PostID[$post->ID] = $post->ID;
			}
		} else {
			$PostID[__('No ID\'s found', 'elito')] = 0;
		}


		$this->start_controls_section(
			'section_project_listing',
			[
				'label' => esc_html__('Project Options', 'elito-core'),
			]
		);
		$this->add_control(
			'project_limit',
			[
				'label' => esc_html__('Project Limit', 'elito-core'),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => 3,
				'description' => esc_html__('Enter the number of items to show.', 'elito-core'),
			]
		);
		$this->add_control(
			'project_order',
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
			'project_orderby',
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
			'project_show_category',
			[
				'label' => __('Certain Categories?', 'elito-core'),
				'type' => Controls_Manager::SELECT2,
				'default' => [],
				'options' => Controls_Helper_Output::get_terms_names('project_category'),
				'multiple' => true,
			]
		);
		$this->add_control(
			'project_show_id',
			[
				'label' => __('Certain ID\'s?', 'elito-core'),
				'type' => Controls_Manager::SELECT2,
				'default' => [],
				'options' => $PostID,
				'multiple' => true,
			]
		);
		$this->end_controls_section(); // end: Section

		$this->start_controls_section(
			'section_Title',
			[
				'label' => esc_html__('Title Options', 'elito-core'),
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
		$this->add_control(
			'title_icon',
			[
				'label' => __('Icon', 'elito-core'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fi flaticon-self-growth',
					'library' => 'solid',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		$this->start_controls_section(
			'section_shape',
			[
				'label' => esc_html__('Shape', 'elito-core'),
			]
		);
		$this->add_control(
			'shape_image',
			[
				'label' => esc_html__('Shape Image', 'elito-core'),
				'type' => Controls_Manager::MEDIA,
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__('Set your image.', 'elito-core'),
			]
		);
		$this->add_control(
			'shape_image2',
			[
				'label' => esc_html__('Shape Image 2', 'elito-core'),
				'type' => Controls_Manager::MEDIA,
				'frontend_available' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'description' => esc_html__('Set your image.', 'elito-core'),
			]
		);
		$this->end_controls_section(); // end: Section


		// BG
		$this->start_controls_section(
			'project_sectiion_title_style',
			[
				'label' => esc_html__('Section', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'project_sectiion_bg_color',
				'label' => esc_html__('Background', 'elito-core'),
				'description' => esc_html__('Background Color', 'elito-core'),
				'types' => ['gradient'],
				'selector' => '{{WRAPPER}} .wpo-project-area',
			]
		);
		$this->add_control(
			'project_sectiion_padding',
			[
				'label' => __('Title Padding', 'elito-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .wpo-project-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .wpo-project-area .wpo-section-title-s2 h2',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-project-area .wpo-section-title-s2 h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_padding',
			[
				'label' => __('Title Padding', 'elito-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .wpo-project-area .wpo-section-title-s2 h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'name' => 'elito_subtitle_typography',
				'selector' => '{{WRAPPER}} .wpo-project-area .wpo-section-title-s2 p',
			]
		);
		$this->add_control(
			'subtitle_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-project-area .wpo-section-title-s2 p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'subtitle_padding',
			[
				'label' => __('Title Padding', 'elito-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .wpo-project-area .wpo-section-title-s2 p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Title Icons
		$this->start_controls_section(
			'section_feature_icon_section_style',
			[
				'label' => esc_html__('Icon BG', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]

		);
		$this->add_control(
			'feature_item_icon_bg_color',
			[
				'label' => esc_html__('BG Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-project-area .sec-title-icon' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'feature_item_icon_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-project-area .sec-title-icon .fi::before' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Title
		$this->start_controls_section(
			'section_project_title_style',
			[
				'label' => esc_html__('Project Title', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'elito-core'),
				'name' => 'elito_project_title_typography',
				'selector' => '{{WRAPPER}} .wpo-project-area .wpo-project-wrap .wpo-project-item .wpo-project-text h2',
			]
		);
		$this->add_control(
			'project_title_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-project-area .wpo-project-wrap .wpo-project-item .wpo-project-text h2 a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'project_title_padding',
			[
				'label' => esc_html__('Title Padding', 'elito-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .wpo-project-area .wpo-project-wrap .wpo-project-item .wpo-project-text h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section

		// Number
		$this->start_controls_section(
			'section_number_style',
			[
				'label' => esc_html__('Project Sub Title', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'elito-core'),
				'name' => 'elito_project_sub_typography',
				'selector' => '{{WRAPPER}} .wpo-project-area .wpo-project-wrap .wpo-project-item .wpo-project-text span',
			]
		);
		$this->add_control(
			'project_sub_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-project-area .wpo-project-wrap .wpo-project-item .wpo-project-text span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'project_sub_bg_color',
			[
				'label' => esc_html__('BG Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-project-area .wpo-project-wrap .wpo-project-item .wpo-project-text span' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section


	}

	/**
	 * Render Project widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();

		$project_limit = !empty($settings['project_limit']) ? $settings['project_limit'] : '';
		$project_order = !empty($settings['project_order']) ? $settings['project_order'] : '';
		$project_orderby = !empty($settings['project_orderby']) ? $settings['project_orderby'] : '';
		$project_show_category = !empty($settings['project_show_category']) ? $settings['project_show_category'] : [];
		$project_show_id = !empty($settings['project_show_id']) ? $settings['project_show_id'] : [];

		$section_title = !empty($settings['section_title']) ? $settings['section_title'] : '';
		$section_content = !empty($settings['section_content']) ? $settings['section_content'] : '';

		$title_icon = !empty($settings['title_icon']['value']) ? $settings['title_icon']['value'] : '';
		$title_svg_url = !empty($settings['title_icon']['value']['url']) ? $settings['title_icon']['value']['url'] : '';
		$svg_alt = get_post_meta($title_svg_url, '_wp_attachment_image_alt', true);

		$bg_image = !empty($settings['shape_image']['id']) ? $settings['shape_image']['id'] : '';
		$bg_image2 = !empty($settings['shape_image2']['id']) ? $settings['shape_image2']['id'] : '';

		// Image
		$shape_url = wp_get_attachment_url($bg_image);
		$shape_alt = get_post_meta($bg_image, '_wp_attachment_image_alt', true);
		// Image
		$shape2_url = wp_get_attachment_url($bg_image2);
		$shape2_alt = get_post_meta($bg_image2, '_wp_attachment_image_alt', true);

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

		if ($project_show_id) {
			$project_show_id = json_encode($project_show_id);
			$project_show_id = str_replace(array('[', ']'), '', $project_show_id);
			$project_show_id = str_replace(array('"', '"'), '', $project_show_id);
			$project_show_id = explode(',', $project_show_id);
		} else {
			$project_show_id = '';
		}

		$args = array(
			// other query params here,
			'paged' => $my_page,
			'post_type' => 'project',
			'posts_per_page' => (int)$project_limit,
			'category_name' => implode(',', $project_show_category),
			'orderby' => $project_orderby,
			'order' => $project_order,
			'post__in' => $project_show_id,
		);

		$elito_project = new \WP_Query($args);
?>

		<div class="wpo-project-area section-padding">
			<div class="container">
				<div class="wpo-section-title-s2">
					<div class="row align-items-center">
						<div class="col-lg-4 col-12">
							<div class="title">
								<?php
								if ($section_title) {
									echo '<h2>' . esc_html($section_title) . '</h2>';
								}
								if ($section_content) {
									echo '<P>' . esc_html($section_content) . '</P>';
								}
								?>
							</div>
						</div>
						<div class="col-lg-6 offset-lg-2">
							<div class="sec-title-icon">
								<?php
								if ($title_svg_url) {
									echo '<img class="default-icon"  src="' . esc_url($title_svg_url) . '" alt="' . esc_url($svg_alt) . '">';
								} else {
									echo '<i class="' . esc_attr($title_icon) . '"></i>';
								}
								?>
							</div>
						</div>
					</div>
				</div>
				<div class="wpo-project-wrap wpo-project-slide owl-carousel">
					<?php
					$id = 0;
					if ($elito_project->have_posts()) : while ($elito_project->have_posts()) : $elito_project->the_post();
							$id++;
							$project_options = get_post_meta(get_the_ID(), 'project_options', true);

							$project_title = isset($project_options['project_title']) ? $project_options['project_title'] : '';
							$project_image = isset($project_options['project_image']) ? $project_options['project_image'] : '';

							global $post;
							$image_url = wp_get_attachment_url($project_image);
							$image_alt = get_post_meta($project_image, '_wp_attachment_image_alt', true);

					?>
							<div class="wpo-project-item">
								<div class="wpo-project-img">
									<?php if ($image_url) {
										echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($image_alt) . '">';
									} ?>
								</div>
								<div class="wpo-project-text">
									<h2>
										<a href="<?php echo esc_url(get_permalink()); ?>">
											<?php echo get_the_title(); ?>
										</a>
									</h2>
									<?php if ($project_title) {
										echo '<span>' . esc_html($project_title) . '</span>';
									} ?>
								</div>
							</div>
					<?php
						endwhile;
					endif;
					wp_reset_postdata();
					?>
				</div>
			</div>
			<div class="shape-p">
				<svg width="1325" height="1687" viewBox="0 0 1325 1687" fill="none">
					<g filter="url(#filter0_f_39_4166)">
						<circle cx="481.5" cy="843.5" r="343.5" fill-opacity="0.27" />
					</g>
					<defs>
						<filter id="filter0_f_39_4166" x="-362" y="0" width="1687" height="1687" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
							<feFlood flood-opacity="0" result="BackgroundImageFix" />
							<feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
							<feGaussianBlur stdDeviation="250" result="effect1_foregroundBlur_39_4166" />
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
	 * Render Project widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 */

	//protected function _content_template(){}

}
Plugin::instance()->widgets_manager->register(new Elito_Project());
