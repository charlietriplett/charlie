<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post();?>

<div id="content">

	<div class="title-wrapper gray">
	
		<div class="container">
		   	<div class="span12">
		   	
			   	<h1 class="post-title">
			   		<? the_title(); ?>
			   		<? edit_post_link('Edit', '<span class="edit-link">', '</span>'); ?>
			   	</h1>
		   	
		   	</div>
   		</div>
	</div>
			
	<div class="container clearfix">
	
		<div class="span7">
			
			<? the_content(); ?>
		
		</div><!-- twelve -->
			
	</div><!-- .container -->

</div><!-- #content -->

<?php endwhile; endif;?>

<?php get_footer(); ?>
