<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

//if (is_cart()){

?>


<div id="panier">

	<header class="container-fluid">
		<div class="row">
			<div class="col-lg-11 offset-lg-1 "> <!-- col-md-10 offset-md-1-->
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	</header>
	<div class="container">
		<div class="row">
			<!--<div class="col-lg-11 offset-lg-1 "> 
				<h1><?php the_title(); ?></h1>
			</div>-->
			<div class="col-lg-10 offset-lg-1 fondblanc"> <!-- col-md-10 offset-md-1-->

				<div class="container-fluid">
					<div class="row">
						<div class="col-12 nbproduits">
							<?php echo sprintf ( _n( '%d produit', '%d produits', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> 
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    
    <?php //} ?>
