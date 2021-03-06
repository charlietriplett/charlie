<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title><?php if ( ( is_category() ) ) { ?>Archive: <?php } ?><?php if ( ( is_tag() ) ) { ?>Tag: <?php } ?><?php wp_title(''); ?><?php if ( !( is_home() ) ) { ?> | <?php } ?><?php bloginfo('name'); ?></title>
    <meta content="<?php bloginfo( 'name' ); ?>" name="apple-mobile-web-app-title"/>
    
	<?php global $post; $themeta = get_post_custom($post->ID); // Get the meta fields for the current page?>
	
	<?php if ($themeta['noindex'][0] == 'on' || is_404() || $themeta['nolink'][0] == 'on' ) { ?><META NAME="ROBOTS" CONTENT="NOINDEX,NOARCHIVE"><?php } ?>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0;">
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,400italic,700italic' rel='stylesheet' type='text/css'>
	<!--[if ! lte IE 6]><!-->
		<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">
		<link href="<?php bloginfo('template_url'); ?>/css/print.css" rel="stylesheet" media="print" />
	<!--<![endif]-->

	<?php wp_head(); // javascript and plugins in functions.php ?>
	
	<?php $tracking_code = get_option( 'tracking_input' ); 
	echo $tracking_code; ?>
	
</head>

<body>

<div class="header-wrapper clearfix">

	<div id="header" class="container clearfix">

			<ol class="skip-links">
				<li><a class="hidden skip-to-content" href="#main"><span class="text">Skip to content</span></a></li>
			</ol>

			<div class="clear"></div>
		
			<div class="banner span5">
				<header role="banner">
									
					<div id="site-title">
				        <h3>
				        	<a class="site-logo" href="<?php bloginfo('url'); ?>">
								<span class="text">
									<?php bloginfo( 'name' ); ?> 
								</span>
								<svg width="220" height="80px">
								    <image xlink:href="<?php bloginfo('template_url'); ?>/images/site-title.svg" alt="Logo" src="<?php bloginfo('template_url'); ?>/images/site-title.png" width="220" height="80px"/>
								</svg>
				        	</a>
			        	</h3>
					</div>
					
				</header>

			</div> <!-- end six banner spans -->

			<nav id="navigation" role="navigation">
	
				<div class="span7">
					<?php wp_nav_menu( array( 
						'theme_location' => 'primary',
						'items_wrap'     => '<ol class="%1$s %2$s">%3$s</ol>'
						) ); ?>
				</div>
			
			</nav>

	</div> <!-- end .container #header -->

</div> <!-- end header-wrapper -->

<div class="content-wrapper">
