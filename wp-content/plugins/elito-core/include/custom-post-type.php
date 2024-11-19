<?php

/**
 * Initialize Custom Post Type - Elito Theme
 */

function elito_custom_post_type() {

  $service_cpt = (elito_framework_active()) ? cs_get_option('theme_service_name') : '';
  $service_slug = (elito_framework_active()) ? cs_get_option('theme_service_slug') : '';
  $service_cpt_slug = (elito_framework_active()) ? cs_get_option('theme_service_cat_slug') : '';

  $base = (isset($service_cpt_slug) && $service_cpt_slug !== '') ? sanitize_title_with_dashes($service_cpt_slug) : ((isset($service_cpt) && $service_cpt !== '') ? strtolower($service_cpt) : 'service');
  $base_slug = (isset($service_slug) && $service_slug !== '') ? sanitize_title_with_dashes($service_slug) : ((isset($service_cpt) && $service_cpt !== '') ? strtolower($service_cpt) : 'service');
  $label = ucfirst((isset($service_cpt) && $service_cpt !== '') ? strtolower($service_cpt) : 'service');

  // Register custom post type - Service
  register_post_type('service',
    array(
      'labels' => array(
        'name' => $label,
        'singular_name' => sprintf(esc_html__('%s Post', 'elito-core' ), $label),
        'all_items' => sprintf(esc_html__('All %s', 'elito-core' ), $label),
        'add_new' => esc_html__('Add New', 'elito-core') ,
        'add_new_item' => sprintf(esc_html__('Add New %s', 'elito-core' ), $label),
        'edit' => esc_html__('Edit', 'elito-core') ,
        'edit_item' => sprintf(esc_html__('Edit %s', 'elito-core' ), $label),
        'new_item' => sprintf(esc_html__('New %s', 'elito-core' ), $label),
        'view_item' => sprintf(esc_html__('View %s', 'elito-core' ), $label),
        'search_items' => sprintf(esc_html__('Search %s', 'elito-core' ), $label),
        'not_found' => esc_html__('Nothing found in the Database.', 'elito-core') ,
        'not_found_in_trash' => esc_html__('Nothing found in Trash', 'elito-core') ,
        'parent_item_colon' => ''
      ) ,
      'public' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'show_ui' => true,
      'query_var' => true,
      'menu_position' => 10,
      'menu_icon' => 'dashicons-portfolio',
      'rewrite' => array(
        'slug' => $base_slug,
        'with_front' => false
      ),
      'has_archive' => true,
      'capability_type' => 'post',
      'hierarchical' => true,
      'supports' => array(
        'title',
        'editor',
        'author',
        'thumbnail',
        'excerpt',
        'trackbacks',
        'custom-fields',
        'comments',
        'revisions',
        'sticky',
        'page-attributes'
      )
    )
  );
  // Registered

  // Add Category Taxonomy for our Custom Post Type - Service
  register_taxonomy(
    'service_category',
    'service',
    array(
      'hierarchical' => true,
      'public' => true,
      'show_ui' => true,
      'show_admin_column' => true,
      'show_in_nav_menus' => true,
      'labels' => array(
        'name' => sprintf(esc_html__( '%s Categories', 'elito-core' ), $label),
        'singular_name' => sprintf(esc_html__('%s Category', 'elito-core'), $label),
        'search_items' =>  sprintf(esc_html__( 'Search %s Categories', 'elito-core'), $label),
        'all_items' => sprintf(esc_html__( 'All %s Categories', 'elito-core'), $label),
        'parent_item' => sprintf(esc_html__( 'Parent %s Category', 'elito-core'), $label),
        'parent_item_colon' => sprintf(esc_html__( 'Parent %s Category:', 'elito-core'), $label),
        'edit_item' => sprintf(esc_html__( 'Edit %s Category', 'elito-core'), $label),
        'update_item' => sprintf(esc_html__( 'Update %s Category', 'elito-core'), $label),
        'add_new_item' => sprintf(esc_html__( 'Add New %s Category', 'elito-core'), $label),
        'new_item_name' => sprintf(esc_html__( 'New %s Category Name', 'elito-core'), $label)
      ),
      'rewrite' => array( 'slug' => $base . '_cat' ),
    )
  );

  $service_custom_taxonomies = (elito_framework_active()) ? cs_get_option('service_custom_taxonomies') : '';
  $counter = 0;
  if ($service_custom_taxonomies) {
    foreach ($service_custom_taxonomies as $key => $custom_taxonomy) {
      $counter++;
      $heading = $custom_taxonomy['taxonomy_name'];
      $own_id = preg_replace('/[^a-z]/', "_", strtolower($heading));

      register_taxonomy(
        'service_'.$own_id,
        'service',
        array(
          'hierarchical' => true,
          'public' => true,
          'show_ui' => true,
          'show_admin_column' => true,
          'show_in_nav_menus' => true,
          'labels' => array(
            'name' => sprintf(esc_html__( '%s '.$heading, 'elito-core' ), $label),
            'singular_name' => sprintf(esc_html__('%s '.$heading, 'elito-core'), $label),
            'search_items' =>  sprintf(esc_html__( 'Search %s '.$heading, 'elito-core'), $label),
            'all_items' => sprintf(esc_html__( 'All %s '.$heading, 'elito-core'), $label),
            'parent_item' => sprintf(esc_html__( 'Parent %s '.$heading, 'elito-core'), $label),
            'parent_item_colon' => sprintf(esc_html__( 'Parent %s :.$heading', 'elito-core'), $label),
            'edit_item' => sprintf(esc_html__( 'Edit %s '.$heading, 'elito-core'), $label),
            'update_item' => sprintf(esc_html__( 'Update %s '.$heading, 'elito-core'), $label),
            'add_new_item' => sprintf(esc_html__( 'Add New %s '.$heading, 'elito-core'), $label),
            'new_item_name' => sprintf(esc_html__( 'New %s '.$heading.' Name', 'elito-core'), $label)
          ),
          'rewrite' => array( 'slug' => 'service_'.$own_id),
        )
      );
    }
  }


  // Project Start
  
  $project_cpt = (elito_framework_active()) ? cs_get_option('theme_project_name') : '';
  $project_slug = (elito_framework_active()) ? cs_get_option('theme_project_slug') : '';
  $project_cpt_slug = (elito_framework_active()) ? cs_get_option('theme_project_cat_slug') : '';

  $base = (isset($project_cpt_slug) && $project_cpt_slug !== '') ? sanitize_title_with_dashes($project_cpt_slug) : ((isset($project_cpt) && $project_cpt !== '') ? strtolower($project_cpt) : 'project');
  $base_slug = (isset($project_slug) && $project_slug !== '') ? sanitize_title_with_dashes($project_slug) : ((isset($project_cpt) && $project_cpt !== '') ? strtolower($project_cpt) : 'project');
  $label = ucfirst((isset($project_cpt) && $project_cpt !== '') ? strtolower($project_cpt) : 'project');

  // Register custom post type - Project
  register_post_type('project',
    array(
      'labels' => array(
        'name' => $label,
        'singular_name' => sprintf(esc_html__('%s Post', 'elito-core' ), $label),
        'all_items' => sprintf(esc_html__('All %s', 'elito-core' ), $label),
        'add_new' => esc_html__('Add New', 'elito-core') ,
        'add_new_item' => sprintf(esc_html__('Add New %s', 'elito-core' ), $label),
        'edit' => esc_html__('Edit', 'elito-core') ,
        'edit_item' => sprintf(esc_html__('Edit %s', 'elito-core' ), $label),
        'new_item' => sprintf(esc_html__('New %s', 'elito-core' ), $label),
        'view_item' => sprintf(esc_html__('View %s', 'elito-core' ), $label),
        'search_items' => sprintf(esc_html__('Search %s', 'elito-core' ), $label),
        'not_found' => esc_html__('Nothing found in the Database.', 'elito-core') ,
        'not_found_in_trash' => esc_html__('Nothing found in Trash', 'elito-core') ,
        'parent_item_colon' => ''
      ) ,
      'public' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'show_ui' => true,
      'query_var' => true,
      'menu_position' => 10,
      'menu_icon' => 'dashicons-portfolio',
      'rewrite' => array(
        'slug' => $base_slug,
        'with_front' => false
      ),
      'has_archive' => true,
      'capability_type' => 'post',
      'hierarchical' => true,
      'supports' => array(
        'title',
        'editor',
        'author',
        'thumbnail',
        'excerpt',
        'trackbacks',
        'custom-fields',
        'comments',
        'revisions',
        'sticky',
        'page-attributes'
      )
    )
  );
  // Registered

  // Add Category Taxonomy for our Custom Post Type - Project
  register_taxonomy(
    'project_category',
    'project',
    array(
      'hierarchical' => true,
      'public' => true,
      'show_ui' => true,
      'show_admin_column' => true,
      'show_in_nav_menus' => true,
      'labels' => array(
        'name' => sprintf(esc_html__( '%s Categories', 'elito-core' ), $label),
        'singular_name' => sprintf(esc_html__('%s Category', 'elito-core'), $label),
        'search_items' =>  sprintf(esc_html__( 'Search %s Categories', 'elito-core'), $label),
        'all_items' => sprintf(esc_html__( 'All %s Categories', 'elito-core'), $label),
        'parent_item' => sprintf(esc_html__( 'Parent %s Category', 'elito-core'), $label),
        'parent_item_colon' => sprintf(esc_html__( 'Parent %s Category:', 'elito-core'), $label),
        'edit_item' => sprintf(esc_html__( 'Edit %s Category', 'elito-core'), $label),
        'update_item' => sprintf(esc_html__( 'Update %s Category', 'elito-core'), $label),
        'add_new_item' => sprintf(esc_html__( 'Add New %s Category', 'elito-core'), $label),
        'new_item_name' => sprintf(esc_html__( 'New %s Category Name', 'elito-core'), $label)
      ),
      'rewrite' => array( 'slug' => $base . '_cat' ),
    )
  );

  $project_custom_taxonomies = (elito_framework_active()) ? cs_get_option('project_custom_taxonomies') : '';
  $counter = 0;
  if ($project_custom_taxonomies) {
    foreach ($project_custom_taxonomies as $key => $custom_taxonomy) {
      $counter++;
      $heading = $custom_taxonomy['taxonomy_name'];
      $own_id = preg_replace('/[^a-z]/', "_", strtolower($heading));

      register_taxonomy(
        'project_'.$own_id,
        'project',
        array(
          'hierarchical' => true,
          'public' => true,
          'show_ui' => true,
          'show_admin_column' => true,
          'show_in_nav_menus' => true,
          'labels' => array(
            'name' => sprintf(esc_html__( '%s '.$heading, 'elito-core' ), $label),
            'singular_name' => sprintf(esc_html__('%s '.$heading, 'elito-core'), $label),
            'search_items' =>  sprintf(esc_html__( 'Search %s '.$heading, 'elito-core'), $label),
            'all_items' => sprintf(esc_html__( 'All %s '.$heading, 'elito-core'), $label),
            'parent_item' => sprintf(esc_html__( 'Parent %s '.$heading, 'elito-core'), $label),
            'parent_item_colon' => sprintf(esc_html__( 'Parent %s :.$heading', 'elito-core'), $label),
            'edit_item' => sprintf(esc_html__( 'Edit %s '.$heading, 'elito-core'), $label),
            'update_item' => sprintf(esc_html__( 'Update %s '.$heading, 'elito-core'), $label),
            'add_new_item' => sprintf(esc_html__( 'Add New %s '.$heading, 'elito-core'), $label),
            'new_item_name' => sprintf(esc_html__( 'New %s '.$heading.' Name', 'elito-core'), $label)
          ),
          'rewrite' => array( 'slug' => 'project_'.$own_id),
        )
      );
    }
  }

    // Team Start

  $team_cpt = (elito_framework_active()) ? cs_get_option('theme_team_name') : '';
  $team_slug = (elito_framework_active()) ? cs_get_option('theme_team_slug') : '';
  $team_cpt_slug = (elito_framework_active()) ? cs_get_option('theme_team_cat_slug') : '';

  $base = (isset($team_cpt_slug) && $team_cpt_slug !== '') ? sanitize_title_with_dashes($team_cpt_slug) : ((isset($team_cpt) && $team_cpt !== '') ? strtolower($team_cpt) : 'team');
  $base_slug = (isset($team_slug) && $team_slug !== '') ? sanitize_title_with_dashes($team_slug) : ((isset($team_cpt) && $team_cpt !== '') ? strtolower($team_cpt) : 'team');
  $label = ucfirst((isset($team_cpt) && $team_cpt !== '') ? strtolower($team_cpt) : 'team');

  // Register custom post type - Team
  register_post_type('team',
    array(
      'labels' => array(
        'name' => $label,
        'singular_name' => sprintf(esc_html__('%s Post', 'elito-core' ), $label),
        'all_items' => sprintf(esc_html__('All %s', 'elito-core' ), $label),
        'add_new' => esc_html__('Add New', 'elito-core') ,
        'add_new_item' => sprintf(esc_html__('Add New %s', 'elito-core' ), $label),
        'edit' => esc_html__('Edit', 'elito-core') ,
        'edit_item' => sprintf(esc_html__('Edit %s', 'elito-core' ), $label),
        'new_item' => sprintf(esc_html__('New %s', 'elito-core' ), $label),
        'view_item' => sprintf(esc_html__('View %s', 'elito-core' ), $label),
        'search_items' => sprintf(esc_html__('Search %s', 'elito-core' ), $label),
        'not_found' => esc_html__('Nothing found in the Database.', 'elito-core') ,
        'not_found_in_trash' => esc_html__('Nothing found in Trash', 'elito-core') ,
        'parent_item_colon' => ''
      ) ,
      'public' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'show_ui' => true,
      'query_var' => true,
      'menu_position' => 10,
      'menu_icon' => 'dashicons-portfolio',
      'rewrite' => array(
        'slug' => $base_slug,
        'with_front' => false
      ),
      'has_archive' => true,
      'capability_type' => 'post',
      'hierarchical' => true,
      'supports' => array(
        'title',
        'editor',
        'author',
        'thumbnail',
        'excerpt',
        'trackbacks',
        'custom-fields',
        'comments',
        'revisions',
        'sticky',
        'page-attributes'
      )
    )
  );
  // Registered

  // Add Category Taxonomy for our Custom Post Type - Team
  register_taxonomy(
    'team_category',
    'team',
    array(
      'hierarchical' => true,
      'public' => true,
      'show_ui' => true,
      'show_admin_column' => true,
      'show_in_nav_menus' => true,
      'labels' => array(
        'name' => sprintf(esc_html__( '%s Categories', 'elito-core' ), $label),
        'singular_name' => sprintf(esc_html__('%s Category', 'elito-core'), $label),
        'search_items' =>  sprintf(esc_html__( 'Search %s Categories', 'elito-core'), $label),
        'all_items' => sprintf(esc_html__( 'All %s Categories', 'elito-core'), $label),
        'parent_item' => sprintf(esc_html__( 'Parent %s Category', 'elito-core'), $label),
        'parent_item_colon' => sprintf(esc_html__( 'Parent %s Category:', 'elito-core'), $label),
        'edit_item' => sprintf(esc_html__( 'Edit %s Category', 'elito-core'), $label),
        'update_item' => sprintf(esc_html__( 'Update %s Category', 'elito-core'), $label),
        'add_new_item' => sprintf(esc_html__( 'Add New %s Category', 'elito-core'), $label),
        'new_item_name' => sprintf(esc_html__( 'New %s Category Name', 'elito-core'), $label)
      ),
      'rewrite' => array( 'slug' => $base . '_cat' ),
    )
  );

  $team_custom_taxonomies = (elito_framework_active()) ? cs_get_option('team_custom_taxonomies') : '';
  $counter = 0;
  if ($team_custom_taxonomies) {
    foreach ($team_custom_taxonomies as $key => $custom_taxonomy) {
      $counter++;
      $heading = $custom_taxonomy['taxonomy_name'];
      $own_id = preg_replace('/[^a-z]/', "_", strtolower($heading));

      register_taxonomy(
        'team_'.$own_id,
        'team',
        array(
          'hierarchical' => true,
          'public' => true,
          'show_ui' => true,
          'show_admin_column' => true,
          'show_in_nav_menus' => true,
          'labels' => array(
            'name' => sprintf(esc_html__( '%s '.$heading, 'elito-core' ), $label),
            'singular_name' => sprintf(esc_html__('%s '.$heading, 'elito-core'), $label),
            'search_items' =>  sprintf(esc_html__( 'Search %s '.$heading, 'elito-core'), $label),
            'all_items' => sprintf(esc_html__( 'All %s '.$heading, 'elito-core'), $label),
            'parent_item' => sprintf(esc_html__( 'Parent %s '.$heading, 'elito-core'), $label),
            'parent_item_colon' => sprintf(esc_html__( 'Parent %s :.$heading', 'elito-core'), $label),
            'edit_item' => sprintf(esc_html__( 'Edit %s '.$heading, 'elito-core'), $label),
            'update_item' => sprintf(esc_html__( 'Update %s '.$heading, 'elito-core'), $label),
            'add_new_item' => sprintf(esc_html__( 'Add New %s '.$heading, 'elito-core'), $label),
            'new_item_name' => sprintf(esc_html__( 'New %s '.$heading.' Name', 'elito-core'), $label)
          ),
          'rewrite' => array( 'slug' => 'team_'.$own_id),
        )
      );
    }
  }
  

}




// After Theme Setup
function elito_custom_flush_rules() {
	// Enter post type function, so rewrite work within this function
	elito_custom_post_type();
	// Flush it
	flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'elito_custom_flush_rules');
add_action('init', 'elito_custom_post_type');


/* ---------------------------------------------------------------------------
 * Custom columns - Service
 * --------------------------------------------------------------------------- */
add_filter("manage_edit-service_columns", "elito_service_edit_columns");
function elito_service_edit_columns($columns) {
  $new_columns['cb'] = '<input type="checkbox" />';
  $new_columns['title'] = esc_html__('Title', 'elito-core' );
  $new_columns['thumbnail'] = esc_html__('Image', 'elito-core' );
  $new_columns['date'] = esc_html__('Date', 'elito-core' );

  return $new_columns;
}

add_action('manage_service_posts_custom_column', 'elito_manage_service_columns', 10, 2);
function elito_manage_service_columns( $column_name ) {
  global $post;

  switch ($column_name) {

    /* If displaying the 'Image' column. */
    case 'thumbnail':
      echo get_the_post_thumbnail( $post->ID, array( 100, 100) );
    break;

    /* Just break out of the switch statement for everything else. */
    default :
      break;
    break;

  }
}


/* ---------------------------------------------------------------------------
 * Custom columns - case
 * --------------------------------------------------------------------------- */
add_filter("manage_edit-project_columns", "elito_project_edit_columns");
function elito_project_edit_columns($columns) {
  $new_columns['cb'] = '<input type="checkbox" />';
  $new_columns['title'] = esc_html__('Title', 'elito-core' );
  $new_columns['thumbnail'] = esc_html__('Image', 'elito-core' );
  $new_columns['date'] = esc_html__('Date', 'elito-core' );

  return $new_columns;
}

add_action('manage_project_posts_custom_column', 'elito_manage_project_columns', 10, 2);
function elito_manage_project_columns( $column_name ) {
  global $post;

  switch ($column_name) {

    /* If displaying the 'Image' column. */
    case 'thumbnail':
      echo get_the_post_thumbnail( $post->ID, array( 100, 100) );
    break;

    /* Just break out of the switch statement for everything else. */
    default :
      break;
    break;

  }
}


