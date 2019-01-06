<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( ); 
// 'shop'

?>



<div id="produit">

	<header class="container-fluid animated fadeInDown slower" style="background-image: url(<?php the_post_thumbnail_url(); ?>); background-size: cover; background-position: top; background-repeat: no-repeat;">

		<div class="row infosheader animated fadeInUp">
			<div class="col-md-4 col-lg-3 text-center padding2">
                <?php if( get_field('affiche_du_film') ): ?>
                                    <img src="<?php the_field('affiche_du_film'); ?>" alt="<?php the_title(); ?>" class="imgaffiche animated fadeInUp">
                                <?php else : // image par défaut ?>
                                    <img src="<?php bloginfo('stylesheet_directory');?>/img/film4.png" alt="<?php the_title(); ?>">
                                <?php endif; ?>
				<!--<img src="img/film1.png" alt="after my death" class="imgaffiche animated fadeInUp">-->
			</div>
			<div class="col-md-8 col-lg-9 padding0">
				<h1 class="animated fadeInUp"><?php the_title(); ?></h1>
				<h2 class="animated fadeInUp">un film de <?php echo get_field('auteur'); ?></h2>
			</div>
			
		</div>

	</header>

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
					<button class="cta">ACHETER EN DVD/BLU-RAY</button>
					<br />
					<button class="cta">VOIR EN VOD</button>
					</div>
					<div class="col-12 hidewhenmobile">
					<h4>2017 / COREE DU SUD / 1H53 </h4> 
					<h4 class="visa">VISA</h4>
					</div>
					<div class="col-12 order-sm-12 hidewhenmobile">
					<!--<div class="centerTab">-->
						<table class="tableFilm">
						<tbody>
							<tr class="titre">
								<td class="colLeft"><b>Titre original </b></td>
								<td class="colRight">After my death </td>
							</tr>
							<tr class="acteurs">
							<td class="colLeft"><b>Young-hee </b></td>
							<td class="colRight">JEON Yeo-bin</td>
							</tr>
							<tr class="acteurs">
							<td class="colLeft"><b>La mère </b></td>
							<td class="colRight">SEO Young-hwa </td>
							</tr>
							<tr class="acteurs">
							<td class="colLeft"><b>Kyung-min</b></td>
							<td class="colRight">JEON So-nee </td>
							</tr>
							<tr class="acteurs">
							<td class="colLeft"><strong>Han-sol</strong></td>
							<td class="colRight">KO Won-hee</td>
							</tr>
							<tr class="acteurs">
							<td class="colLeft"><b>L’enquêteur </b></td>
							<td class="colRight">YOO Jae-myuong</td>
							</tr>
						</tbody>
					</table>
						<table class="tableFilm">
						<tbody>
							<tr>
							<td class="colLeft"><b>Réalisation  </b></td>
							<td class="colRight">KIM Ui-seok</td>
							</tr>
							<tr>
							<td class="colLeft"><b>Scénario </b></td>
							<td class="colRight">KIM Ui-seok</td>
							</tr>
							<tr>
								<td class="colLeft"><b>Photographie</b></td>
								<td class="colRight">KIM Ui-seok</td>
							</tr>
							<tr>
							<td class="colLeft"><b>Prise de Son</b></td>
							<td class="colRight">Baek Seonbin </td>
							</tr>
							<tr>
							<td class="colLeft"><b>Costumes</b></td>
							<td class="colRight">Baek Seonbin  </td>
							</tr>
							<tr>
							<td class="colLeft"><b>Maquillage </b></td>
							<td class="colRight">Baek Seonbin </td>
							</tr>
							<tr>
							<td class="colLeft"><strong>Décors </strong></td>
							<td class="colRight">Baek Seonbin </td>
							</tr>
							<tr>
							<td class="colLeft"><b>Direction artistique</b></td>
							<td class="colRight">Baek Seonbin </td>
							</tr>
									<tr>
							<td class="colLeft"><b>Montage image</b></td>
							<td class="colRight">Kim Minjung </td>
							</tr>
							<tr>
							<td class="colLeft"><b>Montage image</b></td>
							<td class="colRight">Kim Minjung </td>
							</tr>
							
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
						
							<div class="col-md-6  prix">
								<strong>GRAND PRIX DU JURY</strong> — CANNES 2018<br />
								<strong>SELECTION OFFICIEL</strong> — BELFORT 2018<br />
								<strong>GRAND PRIX DU JURY</strong> — CANNES 2018
							</div>
							<div class="col-md-6 prix prix2">
								<strong>GRAND PRIX DU JURY</strong> — CANNES 2018<br />
								<strong>SELECTION OFFICIEL</strong> — BELFORT 2018
							</div>
						
							<div class="col-lg-12 resume ">
								<img src="<?php bloginfo('stylesheet_directory');?>/img/trait-debut-paragraphe.svg" alt="" class="trait">
								La disparition soudaine d’une élève d’un lycée pour jeunes filles précipite la communauté scolaire dans le chaos. Famille de la victime, enseignants et élèves cherchent à fuir toute responsabilité, l’image de l’école étant en jeu. Pourtant, sans indice ni corps, on suspecte un suicide. Young-hee, l’une de ses camarades d’école, dernière à l’avoir vue vivante, est suspectée par tout le monde, à commencer par la mère de la victime. Bouc-émissaire idéal, Young-hee va chercher à n’importe quel prix à échapper à la spirale de persécutions qui l’accablent. Mais quel secret, quel pacte peut-elle bien cacher… ?
							</div>
						
							<div class="col-lg-12 lauteur">
								<h3>L’AUTEUR </h3>
								<img src="<?php bloginfo('stylesheet_directory');?>/img/trait-debut-paragraphe.svg" alt="" class="trait">
								Né à Madrid d’une famille bourgeoise et fortunée, Ado Arrietta découvre le cinéma à sept ans lorsqu’on lui offre un « Cinematik » avec lequel il projette des dessins animés. A treize ans, alors qu’il peint de plus en plus sérieusement, encouragé par sa mère, elle-même ancienne pianiste prodige, il découvre Orphée et Le Cuirasse Potemkine. A vingt-deux ans, en 1964, il réalise un premier court-métrage, Le Crime de la toupie, avec pour acteur son ami Xavier Grandes, qui sera dès lors de tous ses films. L’Imitation de l’ange, tourné deux ans après, un brulot qui doit autant à Rimbaud qu’à Vigo, prépare à un exil : ce sera Paris, où Adolpho et Xavier viennent habiter, à l’Hôtel des Pyrénées, dans le quartier de Saint-Germain-des-Prés.
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
                                           //global $post;
           	 	                           $i =1;
            	                          // $galleries = get_post_gallery_images_with_info( ); 
                                           //print_r($galleries);
            	                          //$x = count($galleries);
            	                           //echo $x;
            	                          // if (!empty($galleries)){
                                           //    echo "pasvide";
            	                              // 	foreach ($galleries as $key => $val) {
                                          $postID = get_the_ID();
                                          //echo  $postID;
                                             $gallery = get_post_gallery_images($postID);
                                          if (!empty($gallery)){
                                            foreach( $gallery as $image_url ){
                                          
                                        ?>
                                          
                                          
										<!--<div class="carousel-item active">
										  <img src="img/fond-aftermydeath.jpg" alt="image 1"> 
										</div>-->
										<div class="carousel-item <?php if ($i ==1) { echo "active"; $i++; } ?>">
										  <img src="<?php echo $image_url; ?>" alt="<?php the_title(); ?>"> 
										</div>

                                          
                                          
                                            <?php } // end foreach //$i++; ?>
                                        <?php } else { echo "vide"; }//endif ?> 
									  
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
							<div class="col-6 col-md-4 col-lg-12">
								<button class="download">BANDE-ANNONCE</button>
							</div>
							<div class="col-6 col-md-4 col-lg-12">
								<button class="download">AFFICHE HD</button>
							</div>
							<div class="col-6 col-md-4 col-lg-12">
								<button class="download">DOSSIER DE PRESSE</button>
							</div>
							<div class="col-6 col-md-4 col-lg-12">	
								<button class="download">PHOTOS HD</button>
							</div>
							<div class="col-6 col-md-4 col-lg-12">	
								<button class="download">EXTRAITS</button>
							</div>
							<div class="col-6 col-md-4 col-lg-12">	
								<button class="downloadall">TOUS LES DOCUMENTS</button>
							</div>
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
					<h4>2017 / COREE DU SUD / 1H53 VISA</h4> 
					</div>
					<div class="col-12 order-sm-12">
					<!--<div class="centerTab">-->
						<table class="tableFilm">
						<tbody>
							<tr class="titre">
								<td class="colLeft"><b>Titre original </b></td>
								<td class="colRight">After my death </td>
							</tr>
							<tr class="acteurs">
							<td class="colLeft"><b>Young-hee </b></td>
							<td class="colRight">JEON Yeo-bin</td>
							</tr>
							<tr class="acteurs">
							<td class="colLeft"><b>La mère </b></td>
							<td class="colRight">SEO Young-hwa </td>
							</tr>
							<tr class="acteurs">
							<td class="colLeft"><b>Kyung-min</b></td>
							<td class="colRight">JEON So-nee </td>
							</tr>
							<tr class="acteurs">
							<td class="colLeft"><strong>Han-sol</strong></td>
							<td class="colRight">KO Won-hee</td>
							</tr>
							<tr class="acteurs">
							<td class="colLeft"><b>L’enquêteur </b></td>
							<td class="colRight">YOO Jae-myuong</td>
							</tr>
						</tbody>
					</table>
						<table class="tableFilm">
						<tbody>
							<tr>
							<td class="colLeft"><b>Réalisation  </b></td>
							<td class="colRight">KIM Ui-seok</td>
							</tr>
							<tr>
							<td class="colLeft"><b>Scénario </b></td>
							<td class="colRight">KIM Ui-seok</td>
							</tr>
							<tr>
								<td class="colLeft"><b>Photographie</b></td>
								<td class="colRight">KIM Ui-seok</td>
							</tr>
							<tr>
							<td class="colLeft"><b>Prise de Son</b></td>
							<td class="colRight">Baek Seonbin </td>
							</tr>
							<tr>
							<td class="colLeft"><b>Costumes</b></td>
							<td class="colRight">Baek Seonbin  </td>
							</tr>
							<tr>
							<td class="colLeft"><b>Maquillage </b></td>
							<td class="colRight">Baek Seonbin </td>
							</tr>
							<tr>
							<td class="colLeft"><strong>Décors </strong></td>
							<td class="colRight">Baek Seonbin </td>
							</tr>
							<tr>
							<td class="colLeft"><b>Direction artistique</b></td>
							<td class="colRight">Baek Seonbin </td>
							</tr>
									<tr>
							<td class="colLeft"><b>Montage image</b></td>
							<td class="colRight">Kim Minjung </td>
							</tr>
							<tr>
							<td class="colLeft"><b>Montage image</b></td>
							<td class="colRight">Kim Minjung </td>
							</tr>
							
						</tbody>
					</table>
					<!--</div>-->
					</div>
	</div>
	
</div>
	
	
	

</div>


<?php get_footer();
// 'shop'

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
