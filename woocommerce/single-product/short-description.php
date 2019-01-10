<?php
/**
 * Single product short description
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/short-description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  Automattic
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $post;

// no need for post_excerpt (ACF used)
// cf meta Copie.php for old code (original plugin code)

?>

<div class="content container-fluid"> <!--container -->

		<div class="row infoscontent animated fadeInUp">
		<!--<div class="row">-->
			<div class="col-md-4 col-lg-3 colgauche padding25 order-md-1 order-sm-1">
				
				<div class="row">
				
					<div class="col-12">
						<h3>DATE DE SORTIE <br />
                            <?php
                            $date = get_field('date_de_sortie'); 
                            $timestamp = strtotime($date);
                            
                            $dateformatannee = "Y";
                            $dateformatmois = "F";
                            $dateformatjour = "d";
                            $annee = date_i18n($dateformatannee, $timestamp);
                            $jour =  date_i18n($dateformatjour, $timestamp);
                            $mois =  date_i18n($dateformatmois, $timestamp);
                            
                            echo (float)$jour. ' ' . $mois; echo ' ' . $annee;
                            //28 SEPTEMBRE 2018
                            ?>
                            
                        
                        </h3>
					</div>
				<div class="col-12">
<?php 
// possibilité d'appeler directement 
//template_loop_add_to_cart ici ?

//cf add-to-cart/simple.php
// /!\ variation-add-to-cart.php

global $product;
if ( !  $product->is_purchasable() ) {
//	return;
//	echo "produit non disponible à la vente";
}

else {
echo wc_get_stock_html( $product ); // WPCS: XSS ok.

if ( $product->is_in_stock() ) : ?>

	<?php //do_action( 'woocommerce_before_add_to_cart_form' ); 

	?>




	<!--<form class="cart" action="--><?php //echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?><!--" method="post" enctype='multipart/form-data'>-->

		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>


<?php


woocommerce_template_loop_add_to_cart(); 
// 1171 woocommerce/includes/wc-templates-functions.php
	/*	
function woocommerce_template_loop_add_to_cart( $args = array() ) {
	global $product;

		if ( $product ) {
			$defaults = array(
				'quantity'   => 1,
				'class'      => implode( ' ', array_filter( array(
					'button',
					'product_type_' . $product->get_type(),
					$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
					$product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
				) ) ),
				'attributes' => array(
					'data-product_id'  => $product->get_id(),
					'data-product_sku' => $product->get_sku(),
					'aria-label'       => $product->add_to_cart_description(),
					'rel'              => 'nofollow',
				),
			);

			$args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );

			if ( isset( $args['attributes']['aria-label'] ) ) {
				$args['attributes']['aria-label'] = strip_tags( $args['attributes']['aria-label'] );
			}

			wc_get_template( 'loop/add-to-cart.php', $args );
		}
	}
	*/


//do_action( 'woocommerce_' . $product->get_type() . '_add_to_cart' );



?>

		<?php
		// par défaut : ajout d'un seul article
		//do_action( 'woocommerce_before_add_to_cart_quantity' );

		//woocommerce_quantity_input( array(
		//	'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
		//	'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
		//	'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
		//) );

		//do_action( 'woocommerce_after_add_to_cart_quantity' );
		?>



		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	<!--</form>-->

	<?php //do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php 
//} 
endif; 

}

?>


</div>

					<!--<div class="col-12">-->
                        <?php 
                        //$woocommerce->cart->add_to_cart( $group_product_id, 1); 
                        //[add_to_cart_url id="99"]
                      
                        ?>
					<!--<button class="cta" >ACHETER EN DVD/BLU-RAY</button>
					<br />
					<button class="cta">VOIR EN VOD</button>
					</div>-->





					<div class="col-12 hidewhenmobile">
					<h4><?php echo $annee . ' / ' . get_field('pays_dorigine') .  ' / ' . get_field('duree'); ?> </h4> 
					<h4 class="visa">VISA <?php echo get_field('visa'); ?></h4>
					</div>
					<div class="col-12 order-sm-12 hidewhenmobile">
					<!--<div class="centerTab">-->
						<table class="tableFilm">
						<tbody>
                            <?php $titre = get_field('titre_original');	
                                    if ($titre){?>
							<tr class="titre">
								<td class="colLeft"><b>Titre original </b></td>
								<td class="colRight"><?php echo $titre; ?></td>
							</tr>
                            <?php } ?>
                            
                            <?php if( have_rows('acteurs') ): ?>
	
                            <?php while( have_rows('acteurs') ): the_row(); 

		                          // vars
                                        $role = get_sub_field('role');
                                        $acteur = get_sub_field('acteur');

                                    ?>
                            
							<tr class="acteurs">
							<td class="colLeft"><b><?php echo $role; ?></b></td>
							<td class="colRight"><?php echo $acteur; ?></td>
							</tr>
	<?php endwhile; ?>


<?php endif; ?>
                            
						</tbody>
					</table>
						<table class="tableFilm">
						<tbody>
                            
                            
                                                        <?php if( have_rows('acteurs') ): ?>
	
                            <?php while( have_rows('technique') ): the_row(); 

		                          // vars
                                        $poste = get_sub_field('poste');
                                        $personne = get_sub_field('personne');

                                    ?>
                            
							<tr>
							<td class="colLeft"><b><?php echo $poste; ?></b></td>
							<td class="colRight"><?php echo $personne; ?></td>
							</tr>
	<?php endwhile; ?>


<?php endif; ?>
                            

							
						</tbody>
					</table>
					<!--</div>-->
					</div>
				</div>
			
				
			</div>
			<div class="col-md-8 col-lg-9 order-md-2 order-sm-2 coldroite">
				
				<div class="row">
					<div class="col-lg-9 order-lg-1 order-md-2 order-sm-1"> <!-- col-xl-10 -->
					
						<div class="row">
						
                            <?php 
                                    $prix = get_field('prix');	
                                    if ($prix){
                            ?>
                            
							<div class="col-md-6  prix">
								<?php echo $prix['gauche']; ?>
							</div>
							<div class="col-md-6 prix prix2">
                                <?php echo $prix['droite']; ?>
							</div>
                            
                            <?php } ?>
						
							<div class="col-lg-12 resume ">
								<img src="<?php bloginfo('stylesheet_directory');?>/img/trait-debut-paragraphe.svg" alt="" class="trait">
								<?php echo get_field('synopsis');  ?>
							</div>
						
							<div class="col-lg-12 lauteur">
								<h3>L’AUTEUR </h3>
								<img src="<?php bloginfo('stylesheet_directory');?>/img/trait-debut-paragraphe.svg" alt="" class="trait">
                                <?php echo get_field('lauteur');  ?>

							</div>
                                 
							<div class="col-lg-12 cadreblanc">
                                 <?php 
                                    $video = get_field('video_page_produit');
                                    if( $video ) { ?>
								<div class="video-responsive">
									<!-- <iframe width="420" height="315" src="https://www.youtube.com/embed/xc446vOqXm8" frameborder="0" allowfullscreen ></iframe>		-->
									<iframe width="640" height="564" src="<?php echo $video; ?>" frameborder="0" controls allowFullScreen mozallowfullscreen webkitAllowFullScreen></iframe>									
								</div>
                                
                                <?php } ?>
						
								<div class="gallery">
									<div id="demo" class="carousel slide" data-ride="carousel">

									  <!-- Indicators -->
									 <!-- <ul class="carousel-indicators">
										<li data-target="#demo" data-slide-to="0" class="active"></li>
										<li data-target="#demo" data-slide-to="1"></li>
										<li data-target="#demo" data-slide-to="2"></li>
									  </ul>-->

									  <!-- The slideshow -->
									  <div class="carousel-inner">
                                          
                                        <?php  
           	 	                          /* $i =1;
                                          $postID = get_the_ID();
                                             $gallery = get_post_gallery_images($postID);
                                          if (!empty($gallery)){
                                            foreach( $gallery as $image_url ){*/
                                          $i =1;
                                          $images = get_field('galerie');

                                            if( $images ): 
                                          foreach( $images as $image ): ?>

										<div class="carousel-item <?php if ($i ==1) { echo "active"; $i++; } ?>">
										  <img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>"> 
										</div>
                                          
                                        <?php endforeach;  ?>
                                        <?php endif; ?> 
									  
                                        </div>

									  <!-- Left and right controls -->
									  <a class="carousel-control-prev" href="#demo" data-slide="prev">
										<span class="carousel-control-prev-icon"></span>
									  </a>
									  <a class="carousel-control-next" href="#demo" data-slide="next">
										<span class="carousel-control-next-icon"></span>
									  </a>

									</div>
								</div>
							</div>
							
						</div>
						
					</div>
					
					<div class="col-lg-3 order-lg-2 order-md-1 order-sm-2 colbuttons "> <!-- col-xl-2 -->
						
						<div class="row">
                            <?php if( get_field('bande-annonce') ){?>
							<div class="col-6 col-md-4 col-lg-12">
                                <a href="<?php the_field('bande-annonce'); ?>" alt="<?php the_title(); ?>" download><button class="download">BANDE-ANNONCE</button></a>
							</div>
                            <?php } ?>
                             <?php if( get_field('affiche_hd') ){?>
							<div class="col-6 col-md-4 col-lg-12">
								 <a href="<?php the_field('affiche_hd'); ?>" alt="<?php the_title(); ?>" download><button class="download">AFFICHE HD</button></a>
							</div>
                            <?php } ?>
                             <?php if( get_field('dossier_de_presse') ){?>
							<div class="col-6 col-md-4 col-lg-12">
								 <a href="<?php the_field('dossier_de_presse'); ?>" alt="<?php the_title(); ?>" download><button class="download">DOSSIER DE PRESSE</button></a>
							</div>
                            <?php } ?>
                             <?php if( get_field('photos_hd') ){?>
							<div class="col-6 col-md-4 col-lg-12">
								 <a href="<?php the_field('photos_hd'); ?>" alt="<?php the_title(); ?>" download><button class="download">PHOTOS HD</button></a>
							</div>
                            <?php } ?>
                             <?php if( get_field('extraits') ){?>
							<div class="col-6 col-md-4 col-lg-12">
								 <a href="<?php the_field('extraits'); ?>" alt="<?php the_title(); ?>" download><button class="download">EXTRAITS</button></a>
							</div>
                            <?php } ?>
                            <?php if( get_field('tous_les_documents') ){?>
							<div class="col-6 col-md-4 col-lg-12">
								 <a href="<?php the_field('tous_les_documents'); ?>" alt="<?php the_title(); ?>" download><button class="downloadall">TOUS LES DOCUMENTS</button></a>
							</div>
                            <?php } ?>

						</div>

					</div>
					
				</div>
				
				
			</div>
		</div>

	<!--</div>--><!-- row -->
	
	
	
	</div>

<div class="container-fluid showwhenmobile">
			<div class="row ">
					<div class="col-12 ">
					<h4><?php echo $annee . ' / ' . get_field('pays_dorigine') .  ' / ' . get_field('duree'); ?> </h4> 
					<h4 class="visa">VISA <?php echo get_field('visa'); ?></h4>
					</div>
					<div class="col-12 order-sm-12">
					<!--<div class="centerTab">-->
						<table class="tableFilm">
						<tbody>
                            <?php $titre = get_field('titre_original');	
                                    if ($titre){?>
							<tr class="titre">
								<td class="colLeft"><b>Titre original </b></td>
								<td class="colRight"><?php echo $titre; ?></td>
							</tr>
                            <?php } ?>
                            
                            <?php if( have_rows('acteurs') ): ?>
	
                            <?php while( have_rows('acteurs') ): the_row(); 

		                          // vars
                                        $role = get_sub_field('role');
                                        $acteur = get_sub_field('acteur');

                                    ?>
                            
							<tr class="acteurs">
							<td class="colLeft"><b><?php echo $role; ?></b></td>
							<td class="colRight"><?php echo $acteur; ?></td>
							</tr>
	<?php endwhile; ?>


<?php endif; ?>
                            
						</tbody>
					</table>
						<table class="tableFilm">
						<tbody>
                            
                            
                                                        <?php if( have_rows('acteurs') ): ?>
	
                            <?php while( have_rows('technique') ): the_row(); 

		                          // vars
                                        $poste = get_sub_field('poste');
                                        $personne = get_sub_field('personne');

                                    ?>
                            
							<tr>
							<td class="colLeft"><b><?php echo $poste; ?></b></td>
							<td class="colRight"><?php echo $personne; ?></td>
							</tr>
	<?php endwhile; ?>


<?php endif; ?>
                            

							
						</tbody>
					</table>
					<!--</div>-->
					</div>
	</div>
	
</div>
	
	
	
