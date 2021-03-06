<aside>

	<div id="sidebar" class="span4">
		<?php $themeta = get_post_custom($post_id); ?>
		<?php  if ($themeta['childnav'][0] !='1') { //  if childnav is populated ?>
			<?php if (function_exists('childnav')) childnav(); ?>
		<?php  } ?>

		
		<?php if (is_single() || is_archive() && !is_tax() ) { ?>

			<h2>Categories</h2>
			<nav role="navigation">
				<ol class="childnav">
					<?php wp_list_categories('orderby=name&title_li='); ?>
				</ol>
			</nav>

		<?php } ?>

            <?php
			  $categories = wp_get_post_categories($post->ID);
			    if ($categories) {
			    
			    $first_category = $categories[0];
			    
			    $related_post_args=array(
			      'cat' => $first_category, //cat__not_in wouldn't work
			      'post__not_in' => array($post->ID),
			      'showposts'=>5,
			      'caller_get_posts'=>1
			    );
			    
			    $related_posts = new WP_Query($related_post_args);
			    
			    if( $related_posts->have_posts() ) { ?>
				
					<ol class="skip-links">
						<li><a class="hidden skip-to-content" href="#main"><span class="text">Skip to content</span></a></li>
					</ol>
				
			   <?php } //if ($my_query)
			  } //if ($categories)
			  wp_reset_query();  // Restore global post data stomped by the_post().
			?>          
		
	</div>

</aside>