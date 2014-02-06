<?php function breadcrumbs() {
// Set up list components

if (!is_home()) {

?>

<nav role="navigation">
	<p id="breadcrumblabel" class="hidden">You are here:</p>
	<ol class="breadcrumbs clearfix" aria-labelledby="breadcrumblabel">
		<li><a title="University of Missouri Home Page" href="http://missouri.edu/">MU</a></li>
		<li><a href="<?php bloginfo('url'); ?>"><span class="mobile-hide"></span><?php bloginfo( 'name' ); ?></a></li>	
		<li><?php global $post;
	    if ( is_category() ) {
			global $wp_query;
			$cat_obj = $wp_query->get_queried_object();
			$thisCat = $cat_obj->term_id;
			$thisCat = get_category($thisCat);
			$parentCat = get_category($thisCat->parent);
			if ($thisCat->parent != 0) { // output the parent category ?>
			<li>
				<?php echo get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' ');?>
				<?php } ?>
			</li>
			<li>
			<?php single_cat_title(); ?>
	
	<?php } elseif ( is_attachment() ) { ?>
				Attachment: <?php the_title(); ?>

						
	<?php } elseif ( is_singular() ) { ?>
				<?php the_title(); ?>

    <?php } elseif ( is_day() ) { ?>
			<?php echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>'; ?>
		</li>
		<li>
			<?php echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a>'; ?>
		</li>
		<li>
			<?php echo get_the_time('d'); ?>

    <?php } elseif ( is_month() ) { ?>
			<?php echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>'; ?>
		</li>
		<li>
			<?php echo get_the_time('F'); ?>
    <?php } elseif ( is_year() ) { ?>
			<?php echo get_the_time('Y'); ?>
    
    <?php } elseif ( is_single() ) { 
		$cat = get_the_category(); $cat = $cat[0]; ?>
		<?php echo get_category_parents($cat, TRUE, ''); ?>
		</li>
		<li>
			<?php the_title(); ?>
 
    <?php } elseif ( is_page() && !$post->post_parent ) { ?>
			<?php the_title(); ?>
 
    <?php } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $parent_link[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li><li>';
        $parent_id  = $page->post_parent;
      }
      $parent_link = array_reverse($parent_link);
      foreach ($parent_link as $parent) { ?>
			<?php echo $parent; ?>
		<?php } ?>
			<?php the_title(); ?>
 
    <?php } elseif ( is_search() ) { ?>
			Search results for &#39; '<?php echo get_search_query(); ?>'
 
   <?php } elseif ( is_tag() ) { ?>
			Tag: '<?php single_tag_title(); ?>'
		
    <?php } elseif ( is_tax() ) { ?>
			Archive: <?php single_tag_title(); ?>
		
    <?php } elseif ( is_author() ) { 
		global $author;
		$userdata = get_userdata($author); ?>
			<?php echo $userdata->display_name; ?>

    <?php } elseif ( is_404() ) { ?>
			Error 404
	<?php } ?>
 
    <?php if ( get_query_var('paged') ) { ?>
			<?php if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
			echo __('Page') . ' ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')'; ?>
    <?php } ?></li>
		
	</ol>
</nav>

<? } // end function cleanup ob
} // end if is not home
 ?>