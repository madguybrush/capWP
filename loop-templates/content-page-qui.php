<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

		
<div id="agenda">

	<header class="container-fluid">
		<div class="row">
			<div class="col-lg-11 offset-lg-1 "> <!-- col-md-10 offset-md-1-->
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	</header>
	<div class="container-fluid content qui">
		<div class="row">
			<div class="col-lg-6 offset-lg-1"> <!-- col-md-10 offset-md-1-->
				<div class="resume">
				<img src="<?php bloginfo('stylesheet_directory');?>/img/trait-debut-paragraphe.svg" alt="" class="trait">
					<?php echo get_field('presentation'); ?>
				</div>

				<h3>PRODUCTION</h3>
				<?php echo get_field('production'); ?>


				<h3>DISTRIBUTION</h3>
				
				<?php echo get_field('distribution'); ?>

				<h3>EDITION</h3>
				<?php echo get_field('edition'); ?>


				<h3>PARTENAIRES</h3>
				<?php echo get_field('partenaires'); ?>
				<!--<p>- 9 DOIGTS de F.J. Ossang <br />
				<strong>FICUNAM (Mexique) - du 28 février au 6 mars </strong><br />
				Avant-première au Eye Film Institute d'Amsterdam (Pays-Bas) </p>
				
				<p>- GRANDEUR ET DÉCADENCE D'UN PETIT COMMERCE DE CINÉMA de Jean-Luc Godard <br />
				<strong>Festival de Glasgow (Écosse) - projections les 22/02 et 24/02</strong> <br />
				<strong>FICUNAM (Mexique) - du 28 février au 6 mars</strong> </p>
				
				<p>- MANGE TES MORTS de Jean-Charles Hue <br />
				<strong>Institut Français de Mexico - 07/02</strong></p>-->
				
			</div>
			<div class="col-lg-4 offset-lg-1 newslettertitle"> <!-- col-lg-3 offset-lg-1 -->
				POUR RECEVOIR LA NEWSLETTER
				<form class="flex-container" role="search" method="get" action=""> 
					<input class="form-control" type="search" placeholder="votre adresse e-mail" name="s" aria-label="Search">  
						<button class="btn btnsearch" type="submit" id="newslettersubmit">  
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 129 129" enable-background="new 0 0 129 129" class="newsletterbutton">
							<path class="fleche" d="m40.4,121.3c-0.8,0.8-1.8,1.2-2.9,1.2s-2.1-0.4-2.9-1.2c-1.6-1.6-1.6-4.2 0-5.8l51-51-51-51c-1.6-1.6-1.6-4.2 0-5.8 1.6-1.6 4.2-1.6 5.8,0l53.9,53.9c1.6,1.6 1.6,4.2 0,5.8l-53.9,53.9z" >
							</path>
							</svg>
						</button>
				</form>
			</div>
		</div>
	</div>
</div>