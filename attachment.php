<?php get_header(); ?>
<div class="container">
<div class="span12">

<main id="main" role="main">
	
	<article role="article"> 

		<?php if (have_posts()) : while (have_posts()) : the_post();?>
 		    
		    <h1 id="title"><?php the_title(); ?> <?php edit_post_link('Edit'); ?></h1>
	
			<section role="region" aria-label="content">

				<?php $attachment_link = get_the_attachment_link($post->ID, true, array(1100, 1100)); ?>
				<?php $_post = &get_post($post->ID); $classname = ($_post->iconsize[0] <= 128 ? 'small' : '') . 'attachment'; ?>
				
				<?php echo $attachment_link; ?>
				
				<?php
				    if ( wp_attachment_is_image() ) { ?>
				    
    				<section role="img" aria-labelledby="caption"> <!-- Label for this region will be firstname lastname itself probably unnecessary and repetitive-->
    
				        <p id="caption">
				            <?php if ( !empty($post->post_excerpt) ) the_excerpt(); // this is the caption ?>
				        </p>
				        
				        <?php the_content(); // this is the description ?>

    				</section>
					
					<?  } else { ?>
    				
    				<section role="img" aria-labelledby="portrait"> <!-- Label for this region will be firstname lastname itself probably unnecessary and repetitive-->

				        <p class="<?php echo $classname; ?>">

				        <a href="<?php echo wp_get_attachment_url(); ?>"><strong>Download</strong> this file: <?php the_title(); ?></a>

				        </p>
				        
    				</section>

					<? } ?>
				
				<?php endwhile; else: ?>

				<p>Sorry, no attachments were found.</p>
				
				<?php endif; ?>
				
				<footer>
				<p>This file is attached to: <a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo get_the_title($post->post_parent); ?></a></p>
				</footer>
				
			</section>
			

	</article>
	
</main>
</div> <!-- end span12 -->
</div>
<?php get_footer(); ?>
