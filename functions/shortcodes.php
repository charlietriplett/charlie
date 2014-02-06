<?php 
function recent_posts_function($atts){
   extract(shortcode_atts(array(
      'posts' => 1,
      'category' => '',
      'tag' => '',
   ), $atts));
   
   ob_start();
   
   switch_to_blog(1);
	   query_posts(array(
				'orderby' => 'date', 
				'order' => 'DESC' , 
				'category_name' => $category,
				'tag' => $tag,
				'showposts' => $posts)
				);
   
   if (have_posts()) { ?>
     <ul class="recent-posts">

      <?php while (have_posts()) : the_post(); ?>
       		<li>
	       		<a class="related-title" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
		       	<?php if (has_post_thumbnail()) { ?>
                    <?php the_post_thumbnail(array(150,150)); ?>
	            <?php } ?>
	            <span><?php the_title(); ?></span>
                <span class="clearfix uncolor"><? the_time(get_option('date_format')); ?></span>
			  </a>
			</li>

      <?php endwhile; // endwhile  ?>
   
   <div class="clear"></div>

   <?php  }  // endif ?>
  	</ul>
   <hr />
   <?php wp_reset_query();
   return ob_get_clean(); // must go after restore_current_blog
}


function  person_function($atts){
	extract(shortcode_atts(array(
			'posts' => 1,
			'posts' => $posts,
			'id' => '',
			'slug' => '',
			'group' => $group,
			'type' => $type,
	), $atts));
	
	ob_start();
	if($group != '') {  // if the group is set then do this query
		$args = array(
			'post_type' => 'person',
			'orderby' => 'name',
			'order' => 'ASC',
			'showposts' => $posts,
			'name' => $slug,
			'tax_query' => array(
				array(	// restrict to the current group
					'taxonomy' => 'group',
					'field' => 'slug',
					'terms' => $group,
				),
				array(	// restrict to the current person type
					'taxonomy' => 'person_type',
					'field' => 'slug',
					'terms' => $type,
				)
				)
			);
	} else { // if group isn't set, just query by id
	
		$args = array(
			'post_type' => 'person',
			'order' => 'ASC',
			'showposts' => 1,
			'name' => $slug,
			);
		} // end else
	
		// Retrieve the posts matching our args
	$people = new WP_Query( $args ); ?>
	
	<?php if($people->have_posts()) { ?>
		<?php loop_people('span2','span5','false',$people); // requires class applied to first and second columns ?>
	<?php } ?>


   <?php wp_reset_query();
   return ob_get_clean(); // must go after restore_current_blog
}


// Function that will return our WordPress menu
function list_menu($atts, $content = null) {
	extract(shortcode_atts(array(  
		'name'            => '', 
		'container'       => 'div', 
		'container_class' => '', 
		'container_id'    => '', 
		'menu_class'      => 'menu', 
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'depth'           => 0,
		'walker'          => '',
		'theme_location'  => ''), 
		$atts));

	return wp_nav_menu( array( 
		'menu'            => $name, 
		'container'       => $container, 
		'container_class' => $container_class, 
		'container_id'    => $container_id, 
		'menu_class'      => $menu_class, 
		'menu_id'         => $menu_id,
		'echo'            => false,
		'fallback_cb'     => $fallback_cb,
		'before'          => $before,
		'after'           => $after,
		'link_before'     => $link_before,
		'link_after'      => $link_after,
		'depth'           => $depth,
		'walker'          => $walker,
		'theme_location'  => $theme_location));
}


function list_taxonomy ($atts){
   extract(shortcode_atts(array(
      'taxonomy' => 'category',
   ), $atts));
  ob_start();

   echo '<ul>';
	wp_list_categories( array( 
				'taxonomy' => $taxonomy, 
				'format' => 'list',
				'title_li' => ''
				) 
				);
   echo '</ul>';
   return ob_get_clean(); // must go after restore_current_blog

}


function register_shortcodes() {
	add_shortcode('list-category', 'list_taxonomy');
	add_shortcode("menu", "list_menu");
	add_shortcode('recent-posts', 'recent_posts_function');
	add_shortcode('person', 'person_function');
}

add_action( 'init', 'register_shortcodes');
?>