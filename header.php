<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hdmk
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700' rel='stylesheet' type='text/css'>	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<?php wp_head(); ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type='text/javascript' src='/prod/wp-content/themes/hdmk/js/script.js'></script>
</head>

<body <?php body_class(); ?>>

<!-- Google Tag Manager -- HD Sites -- Place below body tag -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-KLBHZQ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KLBHZQ');</script>
<!-- End Google Tag Manager -- HD Sites -->

<div id="page" class="site">
	<div id="network-container">
	     <nav>
	     	  <img src="/prod/wp-content/uploads/network-nav-logo.png" class="network-logo" alt="HD Network">
	     	  <h5 class=""><span class="ir"><a href="javascript:void(0)" class="">Menu</a></span></h5>
	          <ul>
	               <li><a href="http://www.hospitalitydesign.com/index.shtml">Hospitality Design</a></li>
	               <li><a href="http://www.hdexpo.com/">HD Expo</a></li>
	               <li><a href="http://www.hdsummit.com/">HD Summit</a></li>
	               <li><a class="active" href="#">Advertise</a></li>
	          </ul>
	     </nav>
	</div>
	<header id="masthead" class="site-header" role="banner">
		<div class="wrapper clearfix">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<div id="publication-of"><a href="http://www.hdexpo.com" target="_blank">&nbsp;</a></div>
				<?php

				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php
				endif; ?>
		</div>		

		<nav id="site-navigation" class="main-navigation" role="navigation">
		    <div class="wrapper clearfix">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'hdmk' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</div>
		</nav><!-- #site-navigation -->
		<div class="wrapper clearfix">
		<?php 
		if (!$post->post_parent){
			$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
		} else{
			if($post->ancestors) {
				$ancestors = end($post->ancestors);
				$children = wp_list_pages("title_li=&child_of=".$ancestors."&echo=0&sort_column=menu_order");
			}
		} 
		if ($children) {

		?>
			<nav class="sub-navigation">
				<ul class="secondary-menu"><?php echo $children; ?></ul>
				<?php 
					if(get_field('pdf_1_link') || get_field('pdf_link')) {
				?>	
					<div class="pdfs-container float-right">
						<?php 
						if(get_field('pdf_1_link')) {				
						?>	
					    <span class="pdf-link"><a href="<?=the_field('pdf_1_link');?>" target="_blank"><img src="/prod/wp-content/themes/hdmk/images/PDFlogo.png" alt="pdf" class="PDF_LogoLink"><?=the_field('pdf_1_title');?></a></span>
					    <?php } elseif (get_field('pdf_link')) { ?>
					    <span class="pdf-link"><a href="<?=the_field('pdf_link');?>" target="_blank"><img src="/prod/wp-content/themes/hdmk/images/PDFlogo.png" alt="pdf" class="PDF_LogoLink"><?=the_field('pdf_1_title');?></a></span>
						<?php 
						}
						if(get_field('pdf_2_title')) {				
						?>	    
					    <span class="pdf-link pdf-link-2"><a href="<?=the_field('pdf_2_link');?>" target="_blank"><img src="/prod/wp-content/themes/hdmk/images/PDFlogo.png" alt="pdf" class="PDF_LogoLink"><?=the_field('pdf_2_title');?></a></span>
					    <?php
						}
						?>
					</div>
				<?php 
					} else if(get_field('current_pdf_title')) {
				?>
						<div class="pdfs-container float-right">
						         <span class="pdf-link"><a href="<?=get_field('current_pdf_link');?>" target="_blank"><img src="/prod/wp-content/themes/hdmk/images/PDFlogo.png" alt="pdf" class="PDF_LogoLink"><?=get_field('current_pdf_title');?></a></span>
						</div>
		      
				<?
					} 
				} 
				?>
			</nav>

		</div> 
	</header><!-- #masthead -->

	<div id="content" class="site-content wrapper clearfix">
