<?php get_header(); ?>
<div id="content">

	<div class="title-wrapper gray">
	
		<div class="container">
		   	<div class="span12">
	
			<?php if ( have_posts() ) the_post(); ?>
	
				<h1 class="page-title">
					<?php if ( is_day() ) : ?>
									<?php printf( __( 'Daily News Archives: <span>%s</span>', 'basic' ), get_the_date() ); ?>
					<?php elseif ( is_month() ) : ?>
									<?php printf( __( 'Monthly News Archives: <span>%s</span>', 'basic' ), get_the_date('F Y') ); ?>
					<?php elseif ( is_year() ) : ?>
									<?php printf( __( 'Yearly News Archives: <span>%s</span>', 'basic' ), get_the_date('Y') ); ?>
					<?php elseif ( is_category() ) : ?>
									<?php echo single_cat_title(); ?>
					<?php elseif ( is_author() ) : ?>
									Author Archive: <?php the_author(); ?>
					<?php else : ?>
									<?php _e( 'Archives', 'basic' ); ?>
					<?php endif; ?>
				</h1>
	
			    <?php rewind_posts(); ?>
	    
		   	</div> <!-- end span12 -->
   		</div> <!-- end container -->
	</div> <!-- end title-wrapper -->
			



<div class="container">
	
	<div  class="span7">
		   		
				<?php while (have_posts()) : the_post(); ?>
		         	
	        		<?php if ( has_post_thumbnail() ) {  // check if the post has a Post Thumbnail assigned to it. ?>
	
			                <div class="two columns alpha">
			        		
			        		    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
			        		        <?php the_post_thumbnail('thumbnail'); ?>
			        		    </a>
			        		    
			        	    </div>
			        	    
							<div class="eight columns omega">
						
					<?php } else { ?>
						
							<div class="clearfix">
						
					<?php } ?>
						
		                    <p class="postmetadata"><?php the_time('l, F jS, Y') ?></p>
		                    <h3 class="headline"><strong><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></strong></h3>
		                    <?php the_excerpt(); ?>
		                
			                </div> <!-- end eight alpha or -->
			                <hr />
				<?php endwhile;?>
			</div> <!-- end content  -->
		
		        <div class="clear"></div>
		        <?php if (show_posts_nav() ) { // uses show_posts_nav in functions.php?>
			        <div class="pagination-nav">
				        <div class="alignleft">
				        	<p><?php next_posts_link('&laquo; Previous Entries ') ?></p>
				        </div>
				        <div class="alignright">
				        	<p><?php previous_posts_link('Newer Entries &raquo;') ?></p>
				        </div>
			        </div>
		        <?php } // end if show_posts_nav ?>
		
	</div> <!-- end span8  -->
	
	</div> <!-- end container -->

</div> <!-- end content -->

<?php get_footer(); ?>
