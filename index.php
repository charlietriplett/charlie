<?php get_header(); ?>
	
<article role="article"> 

<div class="iso-wrapper">

<div class="container">

<div class="span12">

	<main id="main" role="main">

		<ul id="isonav" class="clearfix" data-filter-group="program">
			<li><a href="#filter-topic-any" data-filter="">All</a></li>
			<?php
			//Grab the project types (program)
			$args = array(
			    'orderby'       => 'name', 
			    'order'         => 'ASC',
			    'hide_empty'    => true, 
			); 
			
			$taxonomies = get_terms('post_tag', $args );
			foreach ( $taxonomies as $taxonomy ) {
			//and format them for use as isotope filters
			echo '<li><a href="#filter-topic-' . $taxonomy->slug . '" class="" data-filter=".' . $taxonomy->slug . '" ' . '>' . $taxonomy->name . '</a></li>';
			}
			?>
		</ul>
	</div> <!-- end span12 -->

</div> <!-- end container -->
	<div class="isocontent clearfix">

	<?php $recent = new WP_Query( 'post_type=project&posts_per_page=999&orderby=menu_order&order=DESC' );
	while ( $recent->have_posts() ) : $recent->the_post(); ?>
	
		<div class="isotope-item
			<?php $taxonomies = get_the_terms( $post->ID, 'post_tag' );
			if ( $taxonomies ) {
				foreach ( $taxonomies as $taxonomy ) { ?> 
					<? echo $taxonomy->slug; ?> 
				<?php }  ?>
			<?php } ?>"
			style="background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAAGElEQVQYlWNgYGCQwoKxgqGgcJA5h3yFAAs8BRWVSwooAAAAAElFTkSuQmCC)
			">
		    <a class="isotope-link"
style="background-image: url('<?php $thumbnail_id=get_the_post_thumbnail($post->ID, 'medium'); preg_match ('/src="(.*)" class/',$thumbnail_id,$link); echo $link[1]; ?>')"		    
		     href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
				    <div class="clearfix">
					<div class="isotope-caption">
				        <h3><? the_title(); ?></h3>
					</div>
			    </div>
	
		
				</a>
		</div><!-- end .isotope-item -->
	<?php endwhile;
	wp_reset_query(); ?>
	
		</article>
	
	</main>

</div> <!-- end .twelve .spans -->

	<div class="span4 pad">
	    <?php dynamic_sidebar( 'primary-widget' ); ?>
	</div>
	
	<div class="span4 pad">
		<?php dynamic_sidebar('home_left')  ?>
	</div>
	
	
	<div class="span4 pad">
		<?php dynamic_sidebar('home_right')  ?>
	</div>

	
<?php get_footer(); ?>
