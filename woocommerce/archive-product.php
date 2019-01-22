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

/**************** PAGE BOUTIQUE ************************************/

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

//wp_enqueue_style( 'capricci-boutiqueCss', get_template_directory_uri() . '/css/boutique.css',false,null,'all');

$categorie = get_queried_object(); 
$cat = $categorie->name; 


if (isset($_GET["id"])) {

	$id = htmlspecialchars($_GET["id"]); 
$product = wc_get_product($id);
//print_r($product);
}


//echo $cat;

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
//do_action( 'woocommerce_before_main_content' );


         // AFFICHER PRODUITS EN STOCK && avec prix défini
		// même si normalement si c'est dans DVD c'est que c'est un DVD et pas un film

    						 $nouveautes = array(
                                'post_type' => 'product',
                                'posts_per_page' => 5,
                                //'stock_status' => 'instock'
                                'product_cat' => 'dvd, livres',
                                //'product_tag' => $tax      
                                );

                                        $args = array(
                                'post_type' => 'product',
                                //'posts_per_page' => 8,
                                'product_cat' => $cat,
                                //'stock_status' => 'instock'
                                //'product_tag' => $tax      
                                );
                    

// passer id produit ajouter en parametre
// récup id produit
// + variation...
// afficher infos



?>


<div class="popup">
    <div class="popupcontent  animated fadeInDown">
	    <div class="row">
	        <div class="col-12">
	        <h2>CET ARTICLE A ETE AJOUTE AU PANIER</h2>
	         </div>   
	             <div class="col-xl-6 text-center margintop">
                 <a href="#" title="Continuer mes achats"><button class=" cta ctapopup continuermesachats">Continuer mes achats</button></a>
            </div>

			<div class="col-xl-6 text-center margintop marginbottom">
	    	   <?php /*global $woocommerce;*/ $cart_url = wc_get_cart_url(); // added_to_cart wc-forward ?>
	    	   <a href="<?php echo $cart_url; ?>" class="" title="Voir le panier"><button class=" cta ctapopup">Voir mon panier</button></a>
			</div>	
	    </div>
	</div>
</div>


		
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

     <?php
                        $NouveautesQuery = new WP_Query($nouveautes ); 
                            if ( $NouveautesQuery->have_posts() ) : 
                                while ( $NouveautesQuery->have_posts() ) : 
                                    $NouveautesQuery->the_post(); 
                    ?>

				<div class="col-lg-2 nouveauteitem">
						<div class="row">
							<div class="col-lg-4">
										<a href="<?php echo get_permalink(); ?>" alt="<?php the_title(); ?>">
											<?php if( get_field('affiche_du_film') ): ?>
                                  				<img src="<?php the_field('affiche_du_film'); ?>" alt="<?php the_title(); ?>">
                                			<?php else : // image par défaut ?>
                                    			<img src="<?php bloginfo('stylesheet_directory');?>/img/film4.png" alt="<?php the_title(); ?>">
                                			<?php endif; ?>
										</a>
									<div class="col-4 col-md-12 col-lg-12" style="padding:0;">
										<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
										<?php woocommerce_template_loop_add_to_cart();  ?>
										<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
									</div>
										<!--<div class="row">
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
										</div>-->
							</div>
									<div class="col-lg-8">
										<h5>
											<span class="categorieboutique">
												<?php 
												//echo $cat; 
												global $product; 
												$catnouveaute = get_the_terms( $product->get_id(), 'product_cat' );
										        //$nterms = get_the_terms( $post->ID, 'product_tag'  );
										        if ( ! empty( $catnouveaute ) && ! is_wp_error( $catnouveaute ) ){
										        foreach ($catnouveaute  as $term  ) {
										            //$product_cat_id = $term->term_id;
										            $product_cat_name = $term->name;
										            if (($product_cat_name == "DVD") || ($product_cat_name == "Livres")){
										            echo $product_cat_name;}
										           // break;
										       			 }
										 		   }
										        
												?>
											</span>
										<?php 
										//if ($cat=="Livres"){  
											if ($product_cat_name =="Livres"){ 
											?>  
											-  <span class="collection">
													<?php 
														//echo $product->get_id(); 
														//$tags = get_the_tags();
														//echo $tags[0];
														$terms = get_the_terms($product->get_id(), 'product_tag' );
														//$terms = get_terms('product_tag' );
														//$term_array = array();
														if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
   															foreach ( $terms as $term ) {
      														  $product_tag_name = $term->name;
      														  echo $product_tag_name;
   																 }
															}
															//echo $term_array[0];
													?>
												
												</span>
										<?php  } ?> 
										</h5>
										<h3 class="titre"> 
											<a href="<?php echo get_permalink(); ?>" alt="<?php the_title(); ?>"><?php the_title(); ?></a>
										</h3>
										<h4><span class="auteur"><?php echo get_field('auteur'); ?></span></h4>
										<p class="quatrieme">
											<?php //echo get_field('synopsis'); ?>
												<?php echo substr(get_field('synopsis'), 0 , 300); ?><a href="<?php echo get_permalink(); ?>" alt="lire plus"> ... (lire plus)</a>
											</p>
									
									</div>

						</div>
				</div>



                             
                          

					 <?php endwhile; ?>
                            <?php endif; ?>
                    <?php wp_reset_query(); ?>



				</div>
			</div>
		</div>			
	</div>
	
	<div class="container-fluid content">
		<div class="row">
			<div class="col-lg-12 livres">
				<h2>TOUS LES <?php echo $cat; ?></h2>

				<div class=" gridboutique gridcatalogue">
					 <div class="gutter-sizer"></div> 
					 <div class="grid-sizer"></div>

					
 						<?php
                        $ProjetsQuery = new WP_Query($args ); 
                            if ( $ProjetsQuery->have_posts() ) : 
                                while ( $ProjetsQuery->have_posts() ) : 
                                    $ProjetsQuery->the_post(); 
                    ?>
                    
                  

					<div class="grid-item container-fluid">
					
						<div class="row">
							<div class="col-lg-4 col-md-2 col-5">
								<!--<a href="produit.html" alt=""><img src="img/livre1.png" alt="after my death"></a>-->
										<a href="<?php echo get_permalink(); ?>" alt="<?php the_title(); ?>">
											<?php if( get_field('affiche_du_film') ) : ?>
                                  				<img src="<?php the_field('affiche_du_film'); ?>" alt="<?php the_title(); ?>">
                                			<?php else : // image par défaut ?>
                                    			<img src="<?php bloginfo('stylesheet_directory');?>/img/film4.png" alt="<?php the_title(); ?>">
                                			<?php endif; ?>
										</a>
						
							</div>
							<div class="col-lg-8 col-md-5 col-7">
								<h5>
									<!--<span class="categorieboutique">Livre</span> -  <span class="collection">Première collection</span>-->
	<span class="categorieboutique">
												<?php 
												//echo $cat; 
												global $product; 
												$catnouveaute = get_the_terms( $product->get_id(), 'product_cat' );
										        //$nterms = get_the_terms( $post->ID, 'product_tag'  );
										        if ( ! empty( $catnouveaute ) && ! is_wp_error( $catnouveaute ) ){
										        foreach ($catnouveaute  as $term  ) {
										            //$product_cat_id = $term->term_id;
										            $product_cat_name = $term->name;
										            if (($product_cat_name == "DVD") || ($product_cat_name == "Livres")){
										            echo $product_cat_name;
										        }
										           // break;
										       			 }
										 		   }
										        
												?>
											</span>
										<?php 
										//if ($cat=="Livres"){  
											if ($product_cat_name =="Livres"){ 
											?>  
											-  <span class="collection">
													<?php 
														//echo $product->get_id(); 
														//$tags = get_the_tags();
														//echo $tags[0];
														$terms = get_the_terms($product->get_id(), 'product_tag' );
														//$terms = get_terms('product_tag' );
														//$term_array = array();
														if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
   															foreach ( $terms as $term ) {
      														  $product_tag_name = $term->name;
      														  echo $product_tag_name;
   																 }
															}
															//echo $term_array[0];
													?>
												
												</span>
										<?php  } ?> 
								</h5>

								<a href="<?php echo get_permalink(); ?>" alt="<?php the_title(); ?>"><h3 class="titre"><?php the_title(); ?></a>
								
								</h3>

								<h4><span class="auteur"><?php echo get_field('auteur'); ?></span></h4>

								<p class="quatrieme"><?php echo substr(get_field('synopsis'), 0 , 300); ?><a href="<?php echo get_permalink(); ?>" alt="lire plus"> ... (lire plus)</a></p>
							
							</div>

							<div class="col-lg-4 col-md-2 order-lg-3 order-md-4 order-sm-3">
								
								<div class="row">
									<div class="col-4 col-md-12 col-lg-12">
										<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
										<?php woocommerce_template_loop_add_to_cart();  ?>
										<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
									</div>

									<?php // if ( $price_html = $product->get_price_html() ) { echo $price_html; } ?>

									<!--<div class="col-4 col-md-12 col-lg-12">
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
									</div>-->
								</div>
								
							</div>
							<div class="col-lg-8 col-md-3 order-lg-4 order-md-3 order-sm-4 sommaire">
							
									<?php echo get_field('bonus'); ?>
									<?php echo get_field('preface'); ?>
							
							</div>
						</div>
					</div>
					
					              <?php endwhile; ?>
                            <?php endif; ?>
                    <?php wp_reset_query(); ?>
					
					
					
					
					

				</div>
			
			</div>

			
		</div>
	</div>	
	
	
	
	<div class="navdroiteboutique">
		<div class="fleche">
			<a href="#" alt="" class="control-next-nouveaute">
				<img src="<?php bloginfo('stylesheet_directory');?>/img/diaporamaflechedroite.svg" alt=""/>
			</a>
		</div>
	</div>
	
	<div class="navgaucheboutique d-none">
		<div class="fleche">
			<a href="#" alt="" class="control-prev-nouveaute">
				<img src="<?php bloginfo('stylesheet_directory');?>/img/diaporamaflechegauche.svg" alt=""/>
			</a>
		</div>
	</div>
	
	<div class="coldroiteboutique">
				<div class="row panier">
					<div class="col-lg-12"> <h2 class="panier">PANIER</h2> </div>
					<div class="col-lg-12"> <?php echo sprintf ( _n( '%d produit', '%d produits', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> </div>
					<div class="col-lg-12"> 
						<div class="row total">
							<div class="col-lg-6">TOTAL </div> 
							<div class="col-lg-6"><span class="noir"><?php echo WC()->cart->get_cart_total(); ?></span> </div> 
						</div>
					</div>
					<div class="col-lg-10 offset-lg-1">
						<a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><button class="cta ctapanier text-center">VOIR PANIER</button> </a>
					</div>
					
				</div>
				<div class="crosssells">

				<!--<p>VOUS AIMEREZ AUSSI</p>-->
				<?php 
				// do_action( 'woocommerce_after_single_product_summary' ); 
				//do_action( 'woocommerce_upsell_display' ); 
				/*        woocommerce_product_loop_start();
        		    foreach ( $cross_sells as $cross_sell ) :
                $post_object = get_post( $cross_sell->get_id() );
                setup_postdata( $GLOBALS['post'] =& $post_object );
                wc_get_template_part( 'content', 'product' ); 
            endforeach;
        woocommerce_product_loop_end();*/

        //get_sidebar('shop');
        //get_template_part( 'global-templates/right-sidebar-check' );
        dynamic_sidebar( 'right-sidebar' );

        ?>
				</div>
				
	</div>
	
	
	




</div> <!-- boutique -->

<?php
get_footer( 'shop' );
