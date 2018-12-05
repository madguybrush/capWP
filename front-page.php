<?php
/**
 * The template for displaying front page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

?>


<div id="fullpage">
	
	<div class="section" id="section0" style="background-image: url(<?php bloginfo('stylesheet_directory');?>/img/fond-aftermydeath.jpg); background-size: cover; background-position: center; background-repeat: no-repeat;">
		<div class="intro">
			<h1>AFTER MY DEATH</h1>
			<h2>un film de UI-SEOK Kim</h2>
			<h3>EN SALLE LE 22 NOVEMBRE 2018</h3>
			<a href="" class="plusbutton">&nbsp;+&nbsp;</a>
		</div>
	</div>

	
	<div class="section" id="section1" style="background-image: url(<?php bloginfo('stylesheet_directory');?>/img/fond-LIVRE-HUPPERT.jpg); background-size: cover; background-position: center; background-repeat: no-repeat;">	
	
			<div class="flex-container">
	
				<div class="intro flex-item">
					<h1>ISABELLE HUPERT</h1>
					<h2>VIVRE NE VOUS REGARDE PAS <br />un livre de Murielle JOUDET</h2>
					<h3>EN LIBRAIRIE LE 15 SEPTEMBRE 2018</h3>
				</div>
		
		
				<div class="flex-item ">
					<img alt="logo Capricci" src="<?php bloginfo('stylesheet_directory');?>/img/PremiereCollection-Jaquette-3D-HUPPERT.png" class="fleximg">
				</div>
	
			</div>	
	</div>
	
	<div class="section" id="section2" style="background-image: url(<?php bloginfo('stylesheet_directory');?>/img/fond-BadLieutenant.jpg); background-size: cover; background-position: center; background-repeat: no-repeat;">

		<div class="intro">
				<span class="tag">PROCHAINEMENT	</span>
			<h1>BAD LIEUTENANT</h1>
			<h2>un film de Abel FERRARA</h2>
			<h3>EN SALLE LE 15 FEVRIER 2019</h3>
		</div>
	</div>
	
	<div class="section" id="section3" style="background-image: url(<?php bloginfo('stylesheet_directory');?>/img/fond-jour-dapres.jpg); background-size: cover; background-position: center; background-repeat: no-repeat;">
		<div class="intro">
			<span class="tag">PROCHAINEMENT	</span>
			<h1>LE JOUR D’APRES</h1>
			<h2>un film de Hong SANGSOO</h2>
			<h3>EN DVD LE 30 FEVRIER 2019</h3>
		</div>
	</div>
	
	<div class="section" id="section4">
			
			<video id="myVideo" controls loop muted data-autoplay> <!-- width="100%" height="100%" -->
				<source src="<?php bloginfo('stylesheet_directory');?>/img/movie.mp4" type="video/mp4">
				<source src="<?php bloginfo('stylesheet_directory');?>/img/movie.ogg" type="video/ogg">
				Your browser does not support the video tag.
			</video>
			
		<div class="layer">
			<span class="tag">PROCHAINEMENT	</span>
			<h1>LE JOUR D’APRES</h1>
			<h2>un film de Hong SANGSOO</h2>
			<h3>EN DVD LE 30 FEVRIER 2019</h3>
		</div>

	</div>	
	
	
	
</div>

<?php get_footer(); ?>