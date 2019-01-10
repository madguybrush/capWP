<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

wp_enqueue_style( 'capricci-boutiqueCss', get_template_directory_uri() . '/css/boutique.css',false,null,'all');

$categorie = get_queried_object(); 
$cat = $categorie->name; 
//echo $cat;

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
//do_action( 'woocommerce_before_main_content' );


         
                            $args = array(
                                'post_type' => 'product',
                                //'posts_per_page' => 8,
                                'product_cat' => $cat,
                                //'product_tag' => $tax      
                                );
                    
            

?>



		
<div id="boutique">

	<header class="container-fluid padding10">

		<div class="row selectrow">
			<div class="col-md-2 offset-md-1">
				<select class="selectcategoryboutique selectdark">
					<option selected disabled>CATEGORIE</option>
					<option value="sameCategoryBoutique" <?php if ($cat=="DVD"){ echo ' selected'; } ?>>DVD</option>
					<option value="sameCategoryBoutique" <?php if ($cat=="Livres"){ echo ' selected'; } ?>>Livres</option>
				</select>
			</div>
			<div class="col-md-3">
				<select class="selectcollection" >
					<option selected disabled>COLLECTION</option>
					<option value="sameCollection">Première collection</option>
					<option value="sameCollection">Actualité critique</option>
					<option value="sameCollection">Hors collection</option>
					<option value="sameCollection">Ecrire avec, lire pour</option>
					<option value="sameCollection">Collection des fondations</option>
				</select>
			</div>
		
			<div class="col-md-3">
				<select class="selecttitre" data-filter="titre">
					<option selected disabled>TITRE</option>

                   <?php
                        $ProjetsQuery = new WP_Query($args ); 
                            if ( $ProjetsQuery->have_posts() ) : 
                                while ( $ProjetsQuery->have_posts() ) : 
                                    $ProjetsQuery->the_post(); 
                    ?>

					<option value="sameTitle"><?php the_title(); ?></option>
                    
                                <?php endwhile; ?>
                            <?php endif; ?>
                    <?php wp_reset_query(); ?>

				</select>
			</div>
			<div class="col-md-3">
				<select class="selectauteur">
					<option selected disabled>AUTEUR</option>
 						<?php
                        $ProjetsQuery = new WP_Query($args ); 
                            if ( $ProjetsQuery->have_posts() ) : 
                                while ( $ProjetsQuery->have_posts() ) : 
                                    $ProjetsQuery->the_post(); 
                    ?>
						<option value="sameAuteur"><?php echo get_field('auteur'); ?></option>
                    
                                <?php endwhile; ?>
                            <?php endif; ?>
                    <?php wp_reset_query(); ?>
					
				</select>
			</div>


		</div>
		<div class="row alpharow">
			<div class="col alphabetical">
		<!--<a href="#" class="selectalpha a">A</a> B C D E F G H I J K L M N O P Q R S T U V W X Y Z-->
		<a href="#" class="selectalpha nostyle" data-filter=".a">A</a>
		<a href="#" class="selectalpha nostyle" data-filter=".b">B</a>
		<a href="#" class="selectalpha nostyle" data-filter=".c">C</a>
		<a href="#" class="selectalpha nostyle" data-filter=".d">D</a>
		<a href="#" class="selectalpha nostyle" data-filter=".e">E</a>
		<a href="#" class="selectalpha nostyle" data-filter=".f">F</a>
		<a href="#" class="selectalpha nostyle" data-filter=".g">G</a>
		<a href="#" class="selectalpha nostyle" data-filter=".h">H</a>
		<a href="#" class="selectalpha nostyle" data-filter=".i">I</a>
		<a href="#" class="selectalpha nostyle" data-filter=".j">J</a>
		<a href="#" class="selectalpha nostyle" data-filter=".k">K</a>
		<a href="#" class="selectalpha nostyle" data-filter=".l">L</a>
		<a href="#" class="selectalpha nostyle" data-filter=".m">M</a>
		<a href="#" class="selectalpha nostyle" data-filter=".n">N</a>
		<a href="#" class="selectalpha nostyle" data-filter=".o">O</a>
		<a href="#" class="selectalpha nostyle" data-filter=".p">P</a>
		<a href="#" class="selectalpha nostyle" data-filter=".q">Q</a>
		<a href="#" class="selectalpha nostyle" data-filter=".r">R</a>
		<a href="#" class="selectalpha nostyle" data-filter=".s">S</a>
		<a href="#" class="selectalpha nostyle" data-filter=".t">T</a>
		<a href="#" class="selectalpha nostyle" data-filter=".u">U</a>
		<a href="#" class="selectalpha nostyle" data-filter=".v">V</a>
		<a href="#" class="selectalpha nostyle" data-filter=".w">W</a>
		<a href="#" class="selectalpha nostyle" data-filter=".x">X</a>
		<a href="#" class="selectalpha nostyle" data-filter=".y">Y</a>
		<a href="#" class="selectalpha nostyle" data-filter=".z">Z</a>
		</div>
		</div>
		
	</header>
	
	<div class="container-fluid contentnouveautestitre">
		<div class="row">
			<div class="col-lg-12 livres nouveautes">
				<h2>NOUVEAUTéS</h2>
			</div>
		</div>		
	</div>
					
	<div class="container-fluid contentnouveautes">
		
		<div class="row">

			<div class="col-lg-12 row166">	
			<div class="row">
				<div class="col-lg-2 nouveauteitem">
				<div class="row">
					<div class="col-lg-4">
								<a href="produit.html" alt=""><img src="img/livre1.png" alt="after my death"></a>
								<div class="row">
									<div class="col-4 col-md-12 col-lg-12">
										<button class="cta">
											<div class="row">
												<div class="col-6">LIVRE</div>
												<div class="col-6 lora">18€</div>
											</div>
										</button>
									</div>
									<div class="col-4 col-md-12 col-lg-12">
										<button class="cta-inverse">
											<div class="row">
												<div class="col-6">EPUB</div>
												<div class="col-6 lora">15€</div>
											</div>
										</button>
									</div>
									<div class="col-4 col-md-12 col-lg-12">
										<button class="cta-inverse">
											<div class="row">
												<div class="col-6">PDF</div>
												<div class="col-6 lora">12€</div>
											</div>
										</button>
									</div>
								</div>
					</div>
							<div class="col-lg-8">
								<h5><span class="categorieboutique">Livre</span> -  <span class="collection">Première collection</span></h5>
								<h3 class="titre">Lettre à Wes Anderson</h3>
								<h4><span class="auteur">Marc Cerisuelo</span></h4>
								<p class="quatrieme">Malgré la renommée dont jouissent certains de ses films (comme Elle et lui ou Cette sacrée vérité) et ses collaborations avec Laurel et Hardy et les Marx Brothers, Leo McCarey demeure un cinéaste méconnu. (…)</p>
							
							</div>

				</div>
			</div>
			
			
						<div class="col-lg-2 nouveauteitem">
				<div class="row">
					<div class="col-lg-4">
								<a href="produit.html" alt=""><img src="img/livre1.png" alt="after my death"></a>
								<div class="row">
									<div class="col-4 col-md-12 col-lg-12">
										<button class="cta">
											<div class="row">
												<div class="col-6">LIVRE</div>
												<div class="col-6 lora">18€</div>
											</div>
										</button>
									</div>
									<div class="col-4 col-md-12 col-lg-12">
										<button class="cta-inverse">
											<div class="row">
												<div class="col-6">EPUB</div>
												<div class="col-6 lora">15€</div>
											</div>
										</button>
									</div>
									<div class="col-4 col-md-12 col-lg-12">
										<button class="cta-inverse">
											<div class="row">
												<div class="col-6">PDF</div>
												<div class="col-6 lora">12€</div>
											</div>
										</button>
									</div>
								</div>
					</div>
							<div class="col-lg-8">
								<h5><span class="categorieboutique">Livre</span> -  <span class="collection">Première collection</span></h5>
								<h3 class="titre">Lettre à Wes Anderson</h3>
								<h4><span class="auteur">Marc Cerisuelo</span></h4>
								<p class="quatrieme">Malgré la renommée dont jouissent certains de ses films (comme Elle et lui ou Cette sacrée vérité) et ses collaborations avec Laurel et Hardy et les Marx Brothers, Leo McCarey demeure un cinéaste méconnu. (…)</p>
							
							</div>

				</div>
			</div>
			
			
			
						<div class="col-lg-2 nouveauteitem">
				<div class="row">
					<div class="col-lg-4">
								<a href="produit.html" alt=""><img src="img/livre1.png" alt="after my death"></a>
								<div class="row">
									<div class="col-4 col-md-12 col-lg-12">
										<button class="cta">
											<div class="row">
												<div class="col-6">LIVRE</div>
												<div class="col-6 lora">18€</div>
											</div>
										</button>
									</div>
									<div class="col-4 col-md-12 col-lg-12">
										<button class="cta-inverse">
											<div class="row">
												<div class="col-6">EPUB</div>
												<div class="col-6 lora">15€</div>
											</div>
										</button>
									</div>
									<div class="col-4 col-md-12 col-lg-12">
										<button class="cta-inverse">
											<div class="row">
												<div class="col-6">PDF</div>
												<div class="col-6 lora">12€</div>
											</div>
										</button>
									</div>
								</div>
					</div>
							<div class="col-lg-8">
								<h5><span class="categorieboutique">Livre</span> -  <span class="collection">Première collection</span></h5>
								<h3 class="titre">Lettre à Wes Anderson</h3>
								<h4><span class="auteur">Marc Cerisuelo</span></h4>
								<p class="quatrieme">Malgré la renommée dont jouissent certains de ses films (comme Elle et lui ou Cette sacrée vérité) et ses collaborations avec Laurel et Hardy et les Marx Brothers, Leo McCarey demeure un cinéaste méconnu. (…)</p>
							
							</div>

				</div>
			</div>
			
			
						<div class="col-lg-2 nouveauteitem">
				<div class="row">
					<div class="col-lg-4">
								<a href="produit.html" alt=""><img src="img/livre1.png" alt="after my death"></a>
								<div class="row">
									<div class="col-4 col-md-12 col-lg-12">
										<button class="cta">
											<div class="row">
												<div class="col-6">LIVRE</div>
												<div class="col-6 lora">18€</div>
											</div>
										</button>
									</div>
									<div class="col-4 col-md-12 col-lg-12">
										<button class="cta-inverse">
											<div class="row">
												<div class="col-6">EPUB</div>
												<div class="col-6 lora">15€</div>
											</div>
										</button>
									</div>
									<div class="col-4 col-md-12 col-lg-12">
										<button class="cta-inverse">
											<div class="row">
												<div class="col-6">PDF</div>
												<div class="col-6 lora">12€</div>
											</div>
										</button>
									</div>
								</div>
					</div>
							<div class="col-lg-8">
								<h5><span class="categorieboutique">Livre</span> -  <span class="collection">Première collection</span></h5>
								<h3 class="titre">Lettre à Wes Anderson</h3>
								<h4><span class="auteur">Marc Cerisuelo</span></h4>
								<p class="quatrieme">Malgré la renommée dont jouissent certains de ses films (comme Elle et lui ou Cette sacrée vérité) et ses collaborations avec Laurel et Hardy et les Marx Brothers, Leo McCarey demeure un cinéaste méconnu. (…)</p>
							
							</div>

				</div>
			</div>
			
			
						<div class="col-lg-2 nouveauteitem">
				<div class="row">
					<div class="col-lg-4">
								<a href="produit.html" alt=""><img src="img/livre1.png" alt="after my death"></a>
								<div class="row">
									<div class="col-4 col-md-12 col-lg-12">
										<button class="cta">
											<div class="row">
												<div class="col-6">LIVRE</div>
												<div class="col-6 lora">18€</div>
											</div>
										</button>
									</div>
									<div class="col-4 col-md-12 col-lg-12">
										<button class="cta-inverse">
											<div class="row">
												<div class="col-6">EPUB</div>
												<div class="col-6 lora">15€</div>
											</div>
										</button>
									</div>
									<div class="col-4 col-md-12 col-lg-12">
										<button class="cta-inverse">
											<div class="row">
												<div class="col-6">PDF</div>
												<div class="col-6 lora">12€</div>
											</div>
										</button>
									</div>
								</div>
					</div>
							<div class="col-lg-8">
								<h5><span class="categorieboutique">Livre</span> -  <span class="collection">Première collection</span></h5>
								<h3 class="titre">Lettre à Wes Anderson</h3>
								<h4><span class="auteur">Marc Cerisuelo</span></h4>
								<p class="quatrieme">Malgré la renommée dont jouissent certains de ses films (comme Elle et lui ou Cette sacrée vérité) et ses collaborations avec Laurel et Hardy et les Marx Brothers, Leo McCarey demeure un cinéaste méconnu. (…)</p>
							
							</div>

				</div>
			</div>
			
			
			


			</div>
			</div>
		</div>			
	</div>
	
	<div class="container-fluid content">
		<div class="row">
			<div class="col-lg-12 livres">
				<h2>TOUS LES LIVRES</h2>

				<div class=" gridboutique gridcatalogue">
					 <div class="gutter-sizer"></div> 
					 <div class="grid-sizer"></div>

					
					<div class="grid-item container-fluid">
					
						<div class="row">
							<div class="col-lg-4 col-md-2 col-5">
								<a href="produit.html" alt=""><img src="img/livre1.png" alt="after my death"></a>
						
							</div>
							<div class="col-lg-8 col-md-5 col-7">
								<h5><span class="categorieboutique">Livre</span> -  <span class="collection">Première collection</span></h5>
								<h3 class="titre"><a href="" alt="">Lettre à Wes Anderson</a></h3>
								<h4><span class="auteur">Marc Cerisuelo</span></h4>
								<p class="quatrieme">Malgré la renommée dont jouissent certains de ses films (comme Elle et lui ou Cette sacrée vérité) et ses collaborations avec Laurel et Hardy et les Marx Brothers, Leo McCarey demeure un cinéaste méconnu. (…)</p>
							
							</div>
							<div class="col-lg-4 col-md-2 order-lg-3 order-md-4 order-sm-3">
								
								<div class="row">
									<div class="col-4 col-md-12 col-lg-12">
										<button class="cta">
											<div class="row">
												<div class="col-6">LIVRE</div>
												<div class="col-6 lora">18€</div>
											</div>
										</button>
									</div>
									<div class="col-4 col-md-12 col-lg-12">
										<button class="cta-inverse">
											<div class="row">
												<div class="col-6">EPUB</div>
												<div class="col-6 lora">15€</div>
											</div>
										</button>
									</div>
									<div class="col-4 col-md-12 col-lg-12">
										<button class="cta-inverse">
											<div class="row">
												<div class="col-6">PDF</div>
												<div class="col-6 lora">12€</div>
											</div>
										</button>
									</div>
								</div>
								
							</div>
							<div class="col-lg-8 col-md-3 order-lg-4 order-md-3 order-sm-4">
								<p class="sommaire">
								BONUS DVD : <br />
								- Making of (35min) <br />
								- Reportage par Emmanuel Burdeau <br />
								- Bétisier
								</p>
							</div>
						</div>
					</div>
					
					
					
					<div class="grid-item container-fluid">
					
						<div class="row">
							<div class="col-lg-4 col-md-2 col-5">
								<a href="produit.html" alt=""><img src="img/livre2.png" alt="after my death"></a>
						
							</div>
							<div class="col-lg-8 col-md-5 col-7">
								<h5><span class="categorieboutique">Livre</span> -  <span class="collection">Actualité critique</span></h5>
								<h3 class="titre">Génie de Pixar</h3>
								<h4><span class="auteur">Marc Cerisuelo</span></h4>
								<p class="quatrieme">Malgré la renommée dont jouissent certains de ses films (comme Elle et lui ou Cette sacrée vérité) et ses collaborations avec Laurel et Hardy et les Marx Brothers, Leo McCarey demeure un cinéaste méconnu. (…)</p>
							
							</div>
							<div class="col-lg-4 col-md-2 order-lg-3 order-md-4 order-sm-3">
								
								<div class="row">
									<div class="col-4 col-md-12 col-lg-12">
										<button class="cta">
											<div class="row">
												<div class="col-6">LIVRE</div>
												<div class="col-6 lora">18€</div>
											</div>
										</button>
									</div>
									<div class="col-4 col-md-12 col-lg-12">
										<button class="cta-inverse">
											<div class="row">
												<div class="col-6">EPUB</div>
												<div class="col-6 lora">15€</div>
											</div>
										</button>
									</div>
									<div class="col-4 col-md-12 col-lg-12">
										<button class="cta-inverse">
											<div class="row">
												<div class="col-6">PDF</div>
												<div class="col-6 lora">12€</div>
											</div>
										</button>
									</div>
								</div>
								
							</div>
							<div class="col-lg-8 col-md-3 order-lg-4 order-md-3 order-sm-4">
								<p class="sommaire">
									SOMMAIRE : <br />
									PRÉFACE - WHIT STILLMAN <br />
									TRACES ET MOMENTS D’UNE VIE - JACQUES LOURCELLES <br />
									LEO McCAREY OU L’ESSENTIEL SUFFIT - MIGUEL MARíAS <br />
									COMIQUE A RÉACTION - MARCOS UZAL <br />
									EH BIEN TU M’AS ENCORE MIS DANS UN BEAU BORDEL ! - NICOLAS ZUKERFIELD <br />
									CETTE SACRÉE VERITÉ : LE DIVORCE A LA McCAREY - MOLLY HASKEL <br />
									UN CARRE DE CHÂLE BLANC - SANDRINE RINALDI <br />
									PLACE AUX VIEILLES - CHARLOTTE GARSON <br />
									INÉLUCTABILITÉ DES ACCIDENTS - FERNANDO GANZO <br />
									DEMAIN EST UN AUTRE JOUR - PATRICE ROLLET <br />
									LA PLACE DU MORT - GILLES ESPOSITO<br /> 
								</p>
							</div>
						</div>
					</div>
					
					
					
					
					<div class="grid-item container-fluid">
					
						<div class="row">
							<div class="col-lg-4 col-md-2 col-5">
								<a href="produit.html" alt=""><img src="img/livre3.png" alt="after my death"></a>
						
							</div>
							<div class="col-lg-8 col-md-5 col-7">
								<h5><span class="categorieboutique">Livre</span> -  <span class="collection">Hors collection</span></h5>
								<h3 class="titre">Lettre à Wes Anderson</h3>
								<h4><span class="auteur">Marc Cerisuelo</span></h4>
								<p class="quatrieme">Malgré la renommée dont jouissent certains de ses films (comme Elle et lui ou Cette sacrée vérité) et ses collaborations avec Laurel et Hardy et les Marx Brothers, Leo McCarey demeure un cinéaste méconnu. (…)</p>
							
							</div>
							<div class="col-lg-4 col-md-2 order-lg-3 order-md-4 order-sm-3">
								
								<div class="row">
									<div class="col-4 col-md-12 col-lg-12">
										<button class="cta">
											<div class="row">
												<div class="col-6">LIVRE</div>
												<div class="col-6 lora">18€</div>
											</div>
										</button>
									</div>
									<div class="col-4 col-md-12 col-lg-12">
										<button class="cta-inverse">
											<div class="row">
												<div class="col-6">EPUB</div>
												<div class="col-6 lora">15€</div>
											</div>
										</button>
									</div>
									<div class="col-4 col-md-12 col-lg-12">
										<button class="cta-inverse">
											<div class="row">
												<div class="col-6">PDF</div>
												<div class="col-6 lora">12€</div>
											</div>
										</button>
									</div>
								</div>
								
							</div>
							<div class="col-lg-8 col-md-3 order-lg-4 order-md-3 order-sm-4">
								<p class="sommaire">
								BONUS DVD : <br />
								- Making of (35min) <br />
								- Reportage par Emmanuel Burdeau <br />
								- Bétisier
								</p>
							</div>
						</div>
					</div>
					
					
					
					
					<div class="grid-item container-fluid">
					
						<div class="row">
							<div class="col-lg-4 col-md-2 col-5">
								<a href="produit.html" alt=""><img src="img/livre2.png" alt="after my death"></a>
						
							</div>
							<div class="col-lg-8 col-md-5 col-7">
								<h5><span class="categorieboutique">Livre</span> -  <span class="collection">Actualité critique</span></h5>
								<h3 class="titre">Génie de Pixar</h3>
								<h4><span class="auteur">Marc Cerisuelo</span></h4>
								<p class="quatrieme">Malgré la renommée dont jouissent certains de ses films (comme Elle et lui ou Cette sacrée vérité) et ses collaborations avec Laurel et Hardy et les Marx Brothers, Leo McCarey demeure un cinéaste méconnu. (…)</p>
							
							</div>
							<div class="col-lg-4 col-md-2 order-lg-3 order-md-4 order-sm-3">
								
								<div class="row">
									<div class="col-4 col-md-12 col-lg-12">
										<button class="cta">
											<div class="row">
												<div class="col-6">LIVRE</div>
												<div class="col-6 lora">18€</div>
											</div>
										</button>
									</div>
									<div class="col-4 col-md-12 col-lg-12">
										<button class="cta-inverse">
											<div class="row">
												<div class="col-6">EPUB</div>
												<div class="col-6 lora">15€</div>
											</div>
										</button>
									</div>
									<div class="col-4 col-md-12 col-lg-12">
										<button class="cta-inverse">
											<div class="row">
												<div class="col-6">PDF</div>
												<div class="col-6 lora">12€</div>
											</div>
										</button>
									</div>
								</div>
								
							</div>
							<div class="col-lg-8 col-md-3 order-lg-4 order-md-3 order-sm-4">
								<p class="sommaire">
								BONUS DVD : <br />
								- Making of (35min) <br />
								- Reportage par Emmanuel Burdeau <br />
								- Bétisier
								</p>
							</div>
						</div>
					</div>
					

					
					
					<div class="grid-item container-fluid">
					
						<div class="row">
							<div class="col-lg-4 col-md-2 col-5">
								<a href="produit.html" alt=""><img src="img/livre2.png" alt="after my death"></a>
						
							</div>
							<div class="col-lg-8 col-md-5 col-7">
								<h5><span class="categorieboutique">Film</span> -  <span class="collection">Actualité critique</span></h5>
								<h3 class="titre">Génie de Pixar</h3>
								<h4><span class="auteur">Marc Cerisuelo</span></h4>
								<p class="quatrieme">Malgré la renommée dont jouissent certains de ses films (comme Elle et lui ou Cette sacrée vérité) et ses collaborations avec Laurel et Hardy et les Marx Brothers, Leo McCarey demeure un cinéaste méconnu. (…)</p>
							
							</div>
							<div class="col-lg-4 col-md-2 order-lg-3 order-md-4 order-sm-3">
								
								<div class="row">
									<div class="col-4 col-md-12 col-lg-12">
										<button class="cta">
											<div class="row">
												<div class="col-6">LIVRE</div>
												<div class="col-6 lora">18€</div>
											</div>
										</button>
									</div>
									<div class="col-4 col-md-12 col-lg-12">
										<button class="cta-inverse">
											<div class="row">
												<div class="col-6">EPUB</div>
												<div class="col-6 lora">15€</div>
											</div>
										</button>
									</div>
									<div class="col-4 col-md-12 col-lg-12">
										<button class="cta-inverse">
											<div class="row">
												<div class="col-6">PDF</div>
												<div class="col-6 lora">12€</div>
											</div>
										</button>
									</div>
								</div>
								
							</div>
							<div class="col-lg-8 col-md-3 order-lg-4 order-md-3 order-sm-4">
								<p class="sommaire">
								BONUS DVD : <br />
								- Making of (35min) <br />
								- Reportage par Emmanuel Burdeau <br />
								- Bétisier
								</p>
							</div>
						</div>
					</div>
					
					
					

				</div>
			
			</div>

			
		</div>
	</div>	
	
	
	
	<div class="navdroiteboutique">
		<div class="fleche">
			<a href="#" alt="" class="control-next-nouveaute">
				<img src="img/diaporamaflechedroite.svg" alt=""/>
			</a>
		</div>
	</div>
	
	<div class="navgaucheboutique d-none">
		<div class="fleche">
			<a href="#" alt="" class="control-prev-nouveaute">
				<img src="img/diaporamaflechegauche.svg" alt=""/>
			</a>
		</div>
	</div>
	
	<div class="coldroiteboutique">
				<div class="row panier">
					<div class="col-lg-12"> <h2 class="panier">PANIER</h2> </div>
					<div class="col-lg-12"> 0 items </div>
					<div class="col-lg-12"> 
						<div class="row total">
							<div class="col-lg-6">TOTAL </div> 
							<div class="col-lg-6"><span class="noir">108€</span> </div> 
						</div>
					</div>
					<div class="col-lg-10 offset-lg-1">
						<button class="cta ctapanier text-center">VOIR PANIER</button> 
					</div>
					
				</div>
				<p class="crosssells">VOUS AIMEREZ AUSSI</p>
	</div>
	
	
	
	
</div>








<header class="woocommerce-products-header looooo">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</header>
























<?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 *
			 * @hooked WC_Structured_Data::generate_product_data() - 10
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
//do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */

do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
