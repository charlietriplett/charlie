<?php

// include 'functions/meta.php';
include 'functions/settings.php';
include 'functions/post-types.php'; 
include 'functions/breadcrumbs.php'; 
include 'functions/menus.php';
include 'functions/childnav.php';
include 'functions/shortcodes.php';
include 'functions/widgets.php';
include 'functions/taxonomies.php';
include 'functions/cpt-taxonomy.php';
include 'functions/loop-people.php';


add_theme_support( 'post-thumbnails' );  

remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rsd_link' );

// Remove tabindex setting from gravity forms (learned from NewsA11y)
add_filter("gform_tabindex", create_function("", "return false;"));

function header_enqueue() {
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery.easing-1.3', get_template_directory_uri() . '/js/jquery.easing-1.3.js', array('jquery'));
		if ( is_home() || is_page_template('archives-isotope.php') )  {
			wp_enqueue_script('isotope-script', get_template_directory_uri() . '/js/isotope-script.js', array('jquery'));
			wp_enqueue_script('isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', array('jquery'));
		}
}

add_action('wp_head', 'header_enqueue', 1);


// Change the opening ul to an ol for a11y for wp_list_pages (learned from NewsA11y)
class a11y_walker extends Walker_Page {
    function start_lvl(&$output, $depth) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ol class='children'>\n";
    }
    function end_lvl(&$output, $depth) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ol>\n";
    }
}

// If more than one page of archived posts exists, return TRUE.
function pagination_nav() {
	global $wp_query;
	return ($wp_query->max_num_pages > 1);
}

function edit_tag_link_new_window($content) {
    $content = preg_replace('/href/', 'target="_blank" href', $content);
    return $content;
}
add_filter('edit_tag_link', 'edit_tag_link_new_window');

// Last update of anything on the site
function site_modified_date() {
	global $wpdb;
	$last_site_update =  $wpdb->get_var( "SELECT post_modified FROM $wpdb->posts WHERE post_status = 'publish' ORDER BY post_modified DESC LIMIT 1" );
	echo date('M j, Y', strtotime($last_site_update));
}

?>
