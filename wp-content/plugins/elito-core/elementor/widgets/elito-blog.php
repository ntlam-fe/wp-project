<?php
/*
 * Elementor Elito Blog Widget
 * Author & Copyright: wpoceans
*/

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Elito_Blog extends Widget_Base
{

	/**
	 * Retrieve the widget name.
	 */
	public function get_name()
	{
		return 'wpo-elito_blog';
	}

	/**
	 * Retrieve the widget title.
	 */
	public function get_title()
	{
		return esc_html__('Blog', 'elito-core');
	}

	/**
	 * Retrieve the widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-posts-grid';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 */
	public function get_categories()
	{
		return ['wpoceans-category'];
	}

	/**
	 * Retrieve the list of scripts the Elito Blog widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	 */
	public function get_script_depends()
	{
		return ['wpo-elito_blog'];
	}

	/**
	 * Register Elito Blog widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 */
	protected function register_controls()
	{

		$posts = get_posts('post_type="post"&numberposts=-1');
		$PostID = array();
		if ($posts) {
			foreach ($posts as $post) {
				$PostID[$post->ID] = $post->ID;
			}
		} else {
			$PostID[__('No ID\'s found', 'elito')] = 0;
		}


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
		$this->end_controls_section(); // end: Section

		$this->start_controls_section(
			'section_blog_metas',
			[
				'label' => esc_html__('Meta\'s Options', 'elito-core'),
			]
		);
		$this->add_control(
			'blog_image',
			[
				'label' => esc_html__('Image', 'elito-core'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Show', 'elito-core'),
				'label_off' => esc_html__('Hide', 'elito-core'),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		$this->add_control(
			'blog_date',
			[
				'label' => esc_html__('Date', 'elito-core'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Show', 'elito-core'),
				'label_off' => esc_html__('Hide', 'elito-core'),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		$this->add_control(
			'blog_tags',
			[
				'label' => esc_html__('Tags', 'elito-core'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Show', 'elito-core'),
				'label_off' => esc_html__('Hide', 'elito-core'),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		$this->add_control(
			'blog_author',
			[
				'label' => esc_html__('Author', 'elito-core'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Show', 'elito-core'),
				'label_off' => esc_html__('Hide', 'elito-core'),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		$this->end_controls_section(); // end: Section


		$this->start_controls_section(
			'section_blog_listing',
			[
				'label' => esc_html__('Listing Options', 'elito-core'),
			]
		);
		$this->add_control(
			'blog_limit',
			[
				'label' => esc_html__('Blog Limit', 'elito-core'),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => 3,
				'description' => esc_html__('Enter the number of items to show.', 'elito-core'),
			]
		);
		$this->add_control(
			'blog_order',
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
			'blog_orderby',
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
			'blog_show_category',
			[
				'label' => __('Certain Categories?', 'elito-core'),
				'type' => Controls_Manager::SELECT2,
				'default' => [],
				'options' => Controls_Helper_Output::get_terms_names('category'),
				'multiple' => true,
			]
		);
		$this->add_control(
			'blog_show_id',
			[
				'label' => __('Certain ID\'s?', 'elito-core'),
				'type' => Controls_Manager::SELECT2,
				'default' => [],
				'options' => $PostID,
				'multiple' => true,
			]
		);
		$this->add_control(
			'blog_pagination',
			[
				'label' => esc_html__('Pagination', 'elito-core'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Show', 'elito-core'),
				'label_off' => esc_html__('Hide', 'elito-core'),
				'return_value' => 'true',
				'default' => 'true',
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
					'{{WRAPPER}} .wpo-blog-section' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'section_padding',
			[
				'label' => esc_html__('Section Padding', 'elito-core'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors' => [
					'{{WRAPPER}} .wpo-blog-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .wpo-blog-section .wpo-blog-wrap .wpo-blog-item .wpo-blog-text h2 a',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-blog-section .wpo-blog-wrap .wpo-blog-item .wpo-blog-text h2 a' => 'color: {{VALUE}};'
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
					'{{WRAPPER}} .wpo-blog-section .wpo-blog-wrap .wpo-blog-item .wpo-blog-text h2 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section


		// Date
		$this->start_controls_section(
			'blog_section_date_style',
			[
				'label' => esc_html__('Date', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label' => esc_html__('Typography', 'elito-core'),
				'name' => 'blog_section_date_typography',
				'selector' => '{{WRAPPER}} .wpo-blog-section .wpo-blog-wrap .wpo-blog-item .wpo-blog-text ul li',
			]
		);
		$this->add_control(
			'blog_date_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-blog-section .wpo-blog-wrap .wpo-blog-item .wpo-blog-text ul li' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'blog_date_bg_color',
			[
				'label' => esc_html__('BG Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-blog-section .wpo-blog-wrap .wpo-blog-item .wpo-blog-text ul li' => 'background-color: {{VALUE}};',
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
			'button_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-blog-section .wpo-blog-wrap .wpo-blog-item .wpo-blog-text a.details' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_hover_color',
			[
				'label' => esc_html__('Hover Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-blog-section .wpo-blog-wrap .wpo-blog-item .wpo-blog-text a.details:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section


		// NextPrev
		$this->start_controls_section(
			'section_next_prev_style',
			[
				'label' => esc_html__('NextPrev', 'elito-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'next_prev_color',
			[
				'label' => esc_html__('Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-blog-section .wpo-blog-wrap .owl-nav [class*=owl-]' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'next_prev_bg_color',
			[
				'label' => esc_html__('BG Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-blog-section .wpo-blog-wrap .owl-nav [class*=owl-]' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'next_prev_bg_hover_color',
			[
				'label' => esc_html__('Hover BG Color', 'elito-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpo-blog-section .wpo-blog-wrap .owl-nav [class*=owl-]:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section(); // end: Section


	}

	/**
	 * Render Blog widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$blog_limit = !empty($settings['blog_limit']) ? $settings['blog_limit'] : '';
		$blog_image  = (isset($settings['blog_image']) && ('true' == $settings['blog_image'])) ? true : false;
		$blog_date  = (isset($settings['blog_date']) && ('true' == $settings['blog_date'])) ? true : false;
		$blog_tags  = (isset($settings['blog_tags']) && ('true' == $settings['blog_tags'])) ? true : false;
		$blog_author  = (isset($settings['blog_author']) && ('true' == $settings['blog_author'])) ? true : false;

		$blog_order = !empty($settings['blog_order']) ? $settings['blog_order'] : '';
		$blog_orderby = !empty($settings['blog_orderby']) ? $settings['blog_orderby'] : '';
		$blog_show_category = !empty($settings['blog_show_category']) ? $settings['blog_show_category'] : [];
		$blog_show_id = !empty($settings['blog_show_id']) ? $settings['blog_show_id'] : [];
		$blog_pagination  = (isset($settings['blog_pagination']) && ('true' == $settings['blog_pagination'])) ? true : false;

		$read_more_txt = !empty($settings['read_more_txt']) ? $settings['read_more_txt'] : '';

		$section_title = !empty($settings['section_title']) ? $settings['section_title'] : '';
		$section_content = !empty($settings['section_content']) ? $settings['section_content'] : '';

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

		if ($blog_show_id) {
			$blog_show_id = json_encode($blog_show_id);
			$blog_show_id = str_replace(array('[', ']'), '', $blog_show_id);
			$blog_show_id = str_replace(array('"', '"'), '', $blog_show_id);
			$blog_show_id = explode(',', $blog_show_id);
		} else {
			$blog_show_id = '';
		}

		$args = array(
			// other query params here,
			'paged' => $my_page,
			'post_type' => 'post',
			'posts_per_page' => (int)$blog_limit,
			'category_name' => implode(',', $blog_show_category),
			'orderby' => $blog_orderby,
			'order' => $blog_order,
			'post__in' => $blog_show_id,
		);

		$elito_post = new \WP_Query($args); ?>
		<div class="wpo-blog-section section-padding">
			<div class="container">
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
				<div class="wpo-blog-wrap wpo-blog-slide owl-carousel">
					<?php
					if ($elito_post->have_posts()) : while ($elito_post->have_posts()) : $elito_post->the_post();
							$large_image =  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '');
							$large_alt = get_post_meta(get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true);
							$large_image = $large_image[0];

							$post_options = get_post_meta(get_the_ID(), 'post_options', true);
							$grid_image = isset($post_options['grid_image']) ? $post_options['grid_image'] : '';
							$image_url = wp_get_attachment_url($grid_image);
							$image_alt = get_post_meta($grid_image, '_wp_attachment_image_alt', true);

							$widget_post_title = isset($post_options['widget_post_title']) ? $post_options['widget_post_title'] : '';
					?>
							<div class="wpo-blog-item">
								<div class="wpo-blog-img">
									<?php if ($image_url) { ?>
										<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
									<?php } ?>
								</div>
								<div class="wpo-blog-text">
									<ul>
										<li><?php echo get_the_date(); ?></li>
									</ul>
									<h2>
										<a href="<?php echo esc_url(get_permalink()); ?>">
											<?php echo esc_html($widget_post_title); ?>
										</a>
									</h2>
									<?php
									if ($read_more_txt) {
										echo '<a class="details" href="' . esc_url(get_permalink()) . '">' . esc_html($read_more_txt) . '</a>';
									}
									?>
								</div>
							</div>
						<?php
						endwhile;
					endif;
					wp_reset_postdata();
					if ($blog_pagination) { ?>
						<div class="page-pagination-wrap">
							<?php echo '<div class="paginations">';
							$big = 999999999;
							echo paginate_links(array(
								'base'      => str_replace($big, '%#%', get_pagenum_link($big)),
								'format'    => '?paged=%#%',
								'total'     => $elito_post->max_num_pages,
								'show_all'  => false,
								'current'   => max(1, $my_page),
								'prev_text'    => '<div class="fi flaticon-back"></div>',
								'next_text'    => '<div class="fi flaticon-next"></div>',
								'mid_size'  => 1,
								'type'      => 'list'
							));
							echo '</div>'; ?>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="shadow-shape">
				<svg width="1319" height="1567" viewBox="0 0 1319 1567" fill="none">
					<g filter="url(#filter0_f_39_3832)">
						<circle cx="803" cy="803" r="303" fill="#59C378" fill-opacity="0.5" />
					</g>
					<defs>
						<filter id="filter0_f_39_3832" x="0" y="0" width="1606" height="1606" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
							<feFlood flood-opacity="0" result="BackgroundImageFix" />
							<feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
							<feGaussianBlur stdDeviation="250" result="effect1_foregroundBlur_39_3832" />
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
	 * Render Blog widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 */

	//protected function _content_template(){}

}
Plugin::instance()->widgets_manager->register(new Elito_Blog());
