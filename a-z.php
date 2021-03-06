<?php
/*
Template Name: A-Z Directory
*/
?>

<?php get_header(); ?>

<main id="main" role="main">

	<div id="content">

		<article role="article"> 
	
	 			<div class="span12">
					<header>
						<h1 id="title"><?php the_title(); ?> <?php edit_post_link('Edit'); ?></h1>
					</header>
	 			</div>
				
				<section role="region" aria-label="content">
	 			
		 			<div class="span12">
						<?php the_content(); ?>
		 			</div>
					
		 			<div class="span4">
					
						<?php query_posts("post_type=person&posts_per_page=300&orderby=title&order=ASC");?>
						<? if ( have_posts() ) : ?>
							<h3>Faculty &amp; Staff</h3>
							<ol>
							<? while ( have_posts() ) : the_post(); ?>
								<li id="post-<?php the_ID(); ?>">
								<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a> 
								</li>
							<? endwhile; ?>
							</ol>
						<?php endif; ?>
		 			</div>
		 			<div class="span4">
		                <h3>Site map</h3>
		                <ul>
		                 	<?php wp_list_pages('title_li='); ?>
		                </ul>

		 			</div>
		 			<div class="span4">
		                
		                <h3>Authors & editors</h3>
						<ol>
		                 <?php wp_list_authors('show_fullname=1&optioncount=1&orderby=post_count&order=DESC&number=10'); ?>
						</ol>

		            	<?php
						$today = current_time('mysql', 1);
						$howMany = 20; //Number of posts you want to display
						
						if ( $recentposts = $wpdb->get_results("
							SELECT ID, post_title, post_type
							FROM $wpdb->posts 
							WHERE post_status = 'publish' 
							AND post_modified_gmt != post_date_gmt 
							ORDER BY post_modified_gmt 
							DESC LIMIT $howMany")):
						?>						
						
						<h3>Recent edits</h3>
						<ol>
						<?php
						
							foreach ($recentposts as $post) {
								
								if ( $post->post_type =='page' || $post->post_type =='post' || $post->post_type =='publication' || $post->post_type =='person' ) { 
									
									echo "<li><a href='".get_permalink($post->ID)."'>";
									the_title();
									echo '</a></li>';
									} 
								}	?>
						</ol>
						<?php endif; ?>
		 			</div>
				</section>
				
	
		</article>
	
	</div> <!-- end content -->
	
</main>

<?php get_footer(); ?>
