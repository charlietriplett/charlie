<?php
/*
Template Name: Isotope
*/
?>

<?php get_header(); ?>

<div id="content" class="" role="main">

    <div class="sixteen columns clearfix">
		<h1 class="page-title clearfix"><?php the_title(); ?> <? edit_post_link('Edit', '<span class="edit-link">', '</span>'); ?></h1>
    </div>
    
    <div class="clear"></div>

	<ul id="isonav" class="clearfix" data-filter-group="program">
		<li><a href="#filter-topic-any" data-filter="" class="selected">All</a></li>
		<?php
		//Grab the project types (program)
		$args = array(
		    'orderby'       => 'name', 
		    'order'         => 'ASC',
		    'hide_empty'    => true, 
		); 
		
		$taxonomies = get_terms('program', $args );
		foreach ( $taxonomies as $taxonomy ) {
		//and format them for use as isotope filters
		echo '<li><a href="#filter-topic-' . $taxonomy->slug . '" class="" data-filter=".' . $taxonomy->slug . '" ' . '>' . $taxonomy->name . '</a></li>';
		}
		?>
	</ul>

<div class="isocontent clearfix">

	<?php $recent = new WP_Query( 'post_type=project&posts_per_page=999' );
	while ( $recent->have_posts() ) : $recent->the_post(); ?>
	
	<div class="isotope-item
		<?php $taxonomies = get_the_terms( $post->ID, 'program' );
		if ( $taxonomies ) {
			foreach ( $taxonomies as $taxonomy ) { ?> 
				<? echo $taxonomy->slug; ?> 
			<?php }  ?>
		<?php } ?>">
		
		    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
			    
			    <div class="clearfix">
			    <?php if ( has_post_thumbnail() ) {  // check if the post has a Post Thumbnail assigned to it. ?>
	
			        <?php the_post_thumbnail('medium'); ?>
	
					<div class="isotope-caption">
				        <h3><? the_title(); ?></h3>
					</div>
		
			<?php } else { ?>
				<div class="isotope-caption">
			        <h3><? the_title(); ?></h3>
			        <?php the_excerpt(); ?>
				</div>
	        <?php }  ?>
		    </div>
	    </a>

	
	</div><!-- end .isotope-item -->
	<?php endwhile;
	wp_reset_query(); ?>

</div>






	
</div><!--end  content -->

<?php get_footer(); ?>