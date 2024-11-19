<?php
/**
 * Single Event.
 */
$elito_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$elito_large_image = $elito_large_image[0];
$image_alt = get_post_meta( $elito_large_image, '_wp_attachment_image_alt', true);
$project_options = get_post_meta( get_the_ID(), 'project_options', true );
$project_page_options = get_post_meta( get_the_ID(), 'project_page_options', true );

$elito_prev_pro = cs_get_option('prev_service');
$elito_next_pro = cs_get_option('next_servic');
$elito_prev_pro = ($elito_prev_pro) ? $elito_prev_pro : esc_html__('Previous', 'elito');
$elito_next_pro = ($elito_next_pro) ? $elito_next_pro : esc_html__('Next', 'elito');
$elito_prev_post = get_previous_post( '', false);
$elito_next_post = get_next_post( '', false);

?>        
<div class="content-area">
		<?php the_content(); ?>
</div> 


