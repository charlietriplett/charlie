<?php 

// Make the metabox appear on the page editing screen
function categories_for_pages() {
	register_taxonomy_for_object_type('category', 'page');
	register_taxonomy_for_object_type('category', 'project');
	register_taxonomy_for_object_type('post_tag', 'page');
	register_taxonomy_for_object_type('post_tag', 'project');
}
add_action('init', 'categories_for_pages');
?>