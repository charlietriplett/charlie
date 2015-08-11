<?php
/*
Template Name: Blog Archive
*/
?>
<?php get_header(); ?>

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
	
	<div class="container">
        <div class="span6 archive">
			<?php 
			// the query to set the posts per page to 3
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
					'posts_per_page' => 10, 
					'paged' => $paged 
					);
			query_posts($args); ?>
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="clearfix">
					
					<?php if ( has_post_thumbnail() ) {  // check if the post has a Post Thumbnail assigned to it. ?>
					
						<div class="three columns alpha">
						    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
						        <?php the_post_thumbnail('thumbnail'); ?>
						    </a>
						</div>
						
						<div class="seven columns omega">
					
						<?php } else { ?>
					
						<div class="clearfix">
						<?php } ?>
		                    <p class="postmetadata"><?php the_time('l, F jS, Y') ?></p>
	                    <h3 class="headline"><strong><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></strong></h3>
					        <?php the_excerpt(); ?>
				        </div> <!-- .clearfix or four columns -->
				        
				</div> <!-- .clearfix -->
                <hr />
				<? endwhile; ?>
				
				<? endif; ?>
				
	        <div class="clear"></div>
		        <div class="pagination-nav">
			        <div class="alignleft">
			        	<p><?php next_posts_link('&laquo; Previous Entries ') ?></p>
			        </div>
			        <div class="alignright">
			        	<p><?php previous_posts_link('Newer Entries &raquo;') ?></p>
			        </div>
		        </div>

        </div> <!--end eight -->

        <div class="span4 left-offset2">
        	<div class="box">
			<h2>Categories:</h2>
			<ul>
			     <?php wp_list_categories('title_li='); ?>
			</ul>
        	</div>
            
        	<div class="box">
            <h2>Archives by month:</h2>
            <ul>
                <?php wp_get_archives('type=monthly'); ?>
            </ul>
        	</div>
        </div> <!--end four -->
    
    </div><!--end  content -->
</div><!--end  container -->

<?php get_footer(); ?>