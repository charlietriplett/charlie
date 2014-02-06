<?
function loop_people($first_span,$second_span,$short,$people){
	// ob_start(); ?>
	
	<?php // we assume this occurs within a people query ?>
	
	<?php while ($people->have_posts()) : $people->the_post(); ?>

		<?php $personmeta = get_post_custom($post->ID); ?>
		
		<div class="archive clearfix">
		
		<?php if ( has_post_thumbnail() ) {  // check if the post has a Post Thumbnail assigned to it. ?>
		
			<div class="<? echo $first_span; ?> one-third portrait alpha">
			    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
			        <?php the_post_thumbnail('medium'); ?>
			    </a>
			</div>
			
			<div class="<? echo $second_span; ?> two-thirds omega">
		
			<?php } else { ?>
		
			<div class="clearfix">
		
			<?php } ?>
		
				<ol class="contact nobullet">
					<li class="name"><strong><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php echo $personmeta['first_name'][0]." ".$personmeta['last_name'][0]; ?></a></strong></li>
					<?php if ($personmeta['primary_title'][0] != '') { ?>
					    <li><?php echo $personmeta['primary_title'][0]; ?></li>
					<?php } ?>
					
					<?php if ($short !='true') { ?>

					<?php if ($personmeta['secondary_title'][0] != '') { ?>
					    <li><?php echo $personmeta['secondary_title'][0]; ?></li>
					<?php } ?>

		
					<? $groups = get_the_terms($post->ID, 'group'); ?>
		            <?php if ($groups !='') { ?>
						<? foreach ($groups as $group) { // uses program description for the url ?>
						    <li><a href="<? echo $group->description; ?>"><? echo $group->name; ?></a></li>
						<? } ?>
		            <?php } ?>
		            
		            <? } // end if short ?>
		            
					<?php if ($personmeta['phone'][0] != '') { ?>
					    <li><?php echo $personmeta['phone'][0]; ?></li>
					<?php } ?>

				    <li><a class="break" href="mailto:<?php echo $personmeta['email'][0]; ?>"><?php echo $personmeta['email'][0]; ?></a></li>
				</ol>
			
			</div> <!-- end span3 -->
			
			
		</div> <!-- end clearfix -->
	
	<?php endwhile;?>
	<?php wp_reset_query(); ?>
	
	<? // return ob_get_clean(); // must go after restore_current_blog
} // end function
?>