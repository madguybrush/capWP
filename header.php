<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

        

 <!-- menu mobile -->

<nav class="navbar fixed-top menumobile navbar-dark">

<div class="container">


				<a id="brandmobile" class="navbar-brand" rel="home" href="http://testcapricci.fr/" title="Capricci" alt="Capricci" itemprop="url">
					<img alt="logo Capricci" src="<?php bloginfo('stylesheet_directory');?>/img/logomobile.png">
				</a>
				
				
				<div class="flexbuttons">
				<button id="btnmenusearch" class="btn btnsearch" >  <!--type="submit" id="searchsubmit">   my-2 my-sm-0 -->
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="searchbutton">
						<path class="loupe" d="M20.7 22.4l-5.3-6.7c3.6-3.5 3.7-9.3.2-12.9S6.4-.9 2.8 2.6s-3.7 9.3-.2 12.9c3 3.1 7.7 3.6 11.3 1.4l5.3 6.7c.3.4 1 .5 1.4.2.4-.4.5-1 .1-1.4zM2.1 9.2c0-3.9 3.1-7 7-7s7 3.1 7 7-3.1 7-7 7-7-3.1-7-7z"></path>
					
					<rect class="cross1" x="11" y="0" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -4.9704 12.0004)" width="2" height="24"></rect>
					<rect class="cross2" x="0" y="11" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -4.9704 12.0004)" width="24" height="2"></rect>
					</svg>
				
					<!--<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="crosssearchbutton">
						<path class="cross" stroke='rgba(255, 255, 255, 1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'></path>
					</svg>
					<i class="fa fa-search"></i>-->
				</button>
				
				<button id="btnmenumobile" class="btn" type="button" > <!-- navbar-toggler-->
						<div class="bar1"></div>
						<div class="bar2"></div>
						<div class="bar3"></div>
				</button>
				

				
				</div>
				
		


</div>


</nav>

<!-- modal mobile -->				
<nav class="navbar navbar-dark" id="modalmobile">

	<div class="container">


				
			<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'animated sidebar',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav flex-column ml-auto',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				); ?>
					
					
					
					

					<div class="animated menuBasmobile">
						<div class="international">
							<a href="https://capricci-international.com" alt=""  >INTERNATIONAL SALES</a>
						</div>
						
						<div>
							<i class="social fab fa-facebook-square"></i>
							<i class="social fab fa-twitter-square"></i>
						</div>
					</div>
	</div>

</nav>

<!-- modal search -->
<nav class="navbar navbar-dark" id="modalsearch">

	<div class="container">

					<div class="searchform">
					RECHERCHER
					    <form class="flex-container" role="search" method="get" action="">  
							<input class="form-control" type="search" placeholder="titre de film, de livre, auteur,..." name="s" aria-label="Search">  
							<button class="btn btnsearch" type="submit" id="searchsubmit">  
							<!--<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="searchbutton">
								<path class="loupe" d="M20.7 22.4l-5.3-6.7c3.6-3.5 3.7-9.3.2-12.9S6.4-.9 2.8 2.6s-3.7 9.3-.2 12.9c3 3.1 7.7 3.6 11.3 1.4l5.3 6.7c.3.4 1 .5 1.4.2.4-.4.5-1 .1-1.4zM2.1 9.2c0-3.9 3.1-7 7-7s7 3.1 7 7-3.1 7-7 7-7-3.1-7-7z"></path>
							</svg>-->
							
							</button>
						</form>
					</div>
	</div>

</nav>



<!-- menu >768 -->

<nav class="navbar fixed-top navbar-expand-md navbar-dark menudesktop">


			<div class="container">
		
					<!-- Your site title as branding in the menu -->
					
				<a class="navbar-brand" rel="home" href="http://testcapricci.fr/" title="Capricci" alt="Capricci" itemprop="url">
					<img alt="logo Capricci" src="<?php bloginfo('stylesheet_directory');?>/img/logo.png">
				</a>

					<!-- end custom logo -->
					
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				
				<!-- The WordPress Menu goes here -->
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav flex-column ml-auto',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				); ?>
				
				
				<div id="menuBas" >
				
					<div class="international">
						<a href="https://capricci-international.com" alt=""  >INTERNATIONAL SALES</a>
					</div>
					
					<div class="searchform">
					    <form class="flex-container" role="search" method="get" action="">  <!--  my-lg-0 margin-left --> <!-- < ?php echo esc_url( home_url( '/' ) ); ?> -->
							<input class="form-control" type="search" placeholder="titre de film, de livre, auteur,..." name="s" aria-label="Search">  
							<button class="btn btnsearch" type="submit" id="searchsubmit">  <!-- btn-outline-success  --><!-- my-2 my-sm-0 -->
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="searchbutton">
								<path class="loupe" d="M20.7 22.4l-5.3-6.7c3.6-3.5 3.7-9.3.2-12.9S6.4-.9 2.8 2.6s-3.7 9.3-.2 12.9c3 3.1 7.7 3.6 11.3 1.4l5.3 6.7c.3.4 1 .5 1.4.2.4-.4.5-1 .1-1.4zM2.1 9.2c0-3.9 3.1-7 7-7s7 3.1 7 7-3.1 7-7 7-7-3.1-7-7z"></path>
							</svg>
							<!--<i class="fa fa-search"></i>-->
							</button>
						</form>
						</div>
					
					<div>
						<i class="social fab fa-facebook-square"></i>
						<i class="social fab fa-twitter-square"></i>
					</div>
				
				</div>
				
			</div>
			<!-- .container -->
			
		</nav>
	
		
        
        
        
        
        
	</div><!-- #wrapper-navbar end -->
