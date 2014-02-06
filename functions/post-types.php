<?php

function modify_post_type()
{
	remove_post_type_support('post', 'trackbacks');
}

//handle to add custom post type 
add_action('init', 'project_post_type_init');

//callback function
function project_post_type_init() 
{
	project_init();
	modify_post_type();
}
function project_init()
{
//labels for the UI for the custom post type
  $labels = array(
    'name' => _x('Projects', 'post type general name'),
    'singular_name' => _x('Project', 'post type singular name'),
    'add_new' => _x('Add New', 'project'),
    'add_new_item' => __('Add New Project'),
    'edit_item' => __('Edit Project'),
    'new_item' => __('New Project'),
    'view_item' => __('View Project'),
    'search_items' => __('Search Projects'),
    'not_found' =>  __('No projects found'),
    'not_found_in_trash' => __('No projects found in Trash'), 
    'parent_item_colon' => ''
  );
  //functionality of custom post type see register_post_type entry for info
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'query_var' => false,
    'rewrite' => true, //adding this alllows the changing of the permalink slugs to be changed for custom post types 
//	*****must go to permalinks and save changes to update database for theme to function properly****
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','editor','excerpt','thumbnail','revisions','page-attributes', 'custom-fields'),
  ); 
  register_post_type('project',$args);
} 

?>