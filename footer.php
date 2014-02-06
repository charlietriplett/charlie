<?php
/**
 * Template file used to render the footer of the site
 * 
 * 
 * @package WordPress
 * @subpackage mizzou-news
 * @since MIZZOU News 0.1
 * @category theme
 * @category template
 * @uses class-customPostData
 * @author Charlie Triplett, University of Missouri
 * @copyright 2013 Curators of the University of Missouri
 */
?>

</div> <!-- end .content wrapper from header -->


<div class="footer-wrapper">

	<div id="footer" class="container clearfix">
	
			<div id="mobile-navigation" class="desktop-hide clearfix">

				<a class="close-button mobile-nav-button" href="#exit"><span class="text">Close Menu</span></a>

				<div class="menu-wrapper">
	
					<nav role="navigation">
						<?
						$walker = new a11y_walker();
						$child_args = array(
							'depth'        	=> 4, // if it's a top level page, we only want to see the major sections
							'post_type'    	=> 'page',
							'post_status'  	=> 'publish',
							'sort_column'  	=> 'menu_order, post_title',
							'title_li'		=> '', 
							'walker' 		=> $walker,
						);?>
							
						<ol class="mobilenav menu">
							<li class="home"><a href=" <?php bloginfo( 'url' ); ?> ">Portfolio</a></li>
							<?php  $children = wp_list_pages($child_args); // use if alternate URLs aren't needed ?>
						</ol>
					
					</nav>
				</div> <!-- end menu-wrapper -->

				<a class="close" href="#exit"><span class="text">Close Menu</span></a>

			</div> <!-- end #mobile-navigation -->
					

					<div class="legal span12">				
					Copyright &#169; <time datetime="<?php echo date('Y'); ?>">
					<?php bloginfo( 'name' ); ?></a>. Updated: <?php if (is_single() || is_page() ) { the_modified_time('M j, Y'); } else {site_modified_date(); } ?>				
					</div> <!--  span12 -->			
	
				</footer>
				
	</div> <!--   #footer  container -->

</div> <!-- footer-wrapper -->


<?php wp_footer(); ?>

</body>