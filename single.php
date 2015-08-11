<?php get_header(); ?>

<div class="container">

<?php get_sidebar(); ?>

<main id="main" role="main">
	
	<div id="content" class="flex span7">
		<article role="article"> <!-- Article is any syndicatable kind of content -->
	
			<?php if (have_posts()) : while (have_posts()) : the_post();?>
	 		    	
				<header>
				    <h1 id="title"><?php the_title(); ?> <?php edit_post_link('Edit'); ?></h1>
				</header>
						
				<section>
					<?php the_content(); ?>
				</section>
				
				<footer> 
				<p class="postmetadata">Published 
					<time datetime="<?php the_time('c'); // ISO 8601 ?>" pubdate>
						<?php the_time('l, F jS	, Y'); ?>
					</time>
				</p>
				</footer>
				
			<?php endwhile; endif;?>
		
		</article>
	
<?php // If comments are open or we have at least one comment, load up the comment template.
if ( is_user_logged_in() ) {
	comments_template();
} ?>

	</div>
</main>
</div> <!-- end container -->

<?php get_footer(); ?>