<?php
/*
Template Name: Wide Page
*/
?>


<?php get_header(); ?>

<div class="span12">

	<main id="main" role="main">
	
		<div id="content">
		
			<article role="article"> 
		
				<?php if (have_posts()) : while (have_posts()) : the_post();?>

					<header>
					    <h1 id="title"><?php the_title(); ?> <?php edit_post_link('Edit'); ?></h1>
					</header>
					
					<section role="region" aria-label="content">
						<?php the_content(); ?>

						<?php include (TEMPLATEPATH . '/query-people.php'); ?>

					</section>					
					
				<?php endwhile; endif;?>
		
			</article>
					
		</div> <!-- #content -->

	</main>


<?php // If comments are open or we have at least one comment, load up the comment template.
if ( is_user_logged_in() ) {
	comments_template();
} ?>


</div> <!-- end .eight .spans -->


<?php get_footer(); ?>