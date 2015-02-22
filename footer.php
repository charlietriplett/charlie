</div> <!-- end .content wrapper from header -->


<div class="footer-wrapper">

	<div id="footer" class="container clearfix">
	
					<div class="legal span12">				
					Copyright &#169; <time datetime="<?php echo date('Y'); ?>">
					<?php bloginfo( 'name' ); ?></a>. Updated: <?php if (is_single() || is_page() ) { the_modified_time('M j, Y'); } else {site_modified_date(); } ?>				
					</div> <!--  span12 -->			
	
				
	</div> <!--   #footer  container -->

</div> <!-- footer-wrapper -->


<?php wp_footer(); ?>

</body>