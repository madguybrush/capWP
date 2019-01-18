<?php
/**
 * The template for displaying search results pages.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

//$container   = get_theme_mod( 'understrap_container_type' );

?>



<div id="recherche">

<?php if ( have_posts() ) : ?>

	<header class="container-fluid padding10">

		<div class="row">
			<div class="col">
				<h1 class="recherche">RESULTATS DE LA RECHERCHE POUR 
					<strong>
						« <?php printf(esc_html__( '%s', 'understrap' ),'<span>' . get_search_query() . '</span>' ); ?> »
					</strong>
				</h1>
			</div>
		</div>
	
	</header>




	<div class="container-fluid padding10 content">
	

			<div class="row films">
				<div class="col-md-12">
					<?php

						$categorie =  get_the_terms(get_post(), 'product_cat'); 
						if ( ! empty( $categorie ) && ! is_wp_error( $categorie ) ){
							foreach ($categorie  as $term  ) {
								$product_cat_name = $term->name;
								if ($product_cat_name != 'DVD'){ echo "<h2>" . $product_cat_name . ' ' . "</h2>"; }
							}
						}

					?>

				</div>
			</div>
			
		<div class=" grid gridcatalogue">
		<div class="gutter-sizer"></div>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>




			<?php

			/**
			 * Run the loop for the search to output the results.
			 * If you want to overload this in a child theme then include a file
			 * called content-search.php and that will be used instead.
			 */
			//get_template_part( 'loop-templates/content', 'search' );
			?>

			<div class="grid-item">
				<!--<a href="" alt=""><img src="img/film1.png" alt="after my death"></a>-->

				<a href="<?php echo get_permalink(); ?>" alt="<?php the_title(); ?>">
					<?php if( get_field('affiche_du_film') ): ?>
                            <img src="<?php the_field('affiche_du_film'); ?>" alt="<?php the_title(); ?>">
                    <?php else : // image par défaut ?>
                            <img src="<?php bloginfo('stylesheet_directory');?>/img/film4.png" alt="<?php the_title(); ?>">
                    <?php endif; ?>
				</a>

				<h3 class="titre"><?php the_title(); ?></h3>
				<h4>de <span class="auteur"><?php echo get_field('auteur'); ?></span></h4>
				    <?php 
                            $date = get_field('date_de_sortie'); 
                            $timestamp = strtotime($date);
                            
                            $dateformatannee = "Y";
                            $dateformatmois = "F";
                            $dateformatjour = "d";
                            $annee = date_i18n($dateformatannee, $timestamp);
                            $jour =  date_i18n($dateformatjour, $timestamp);
                            $mois =  date_i18n($dateformatmois, $timestamp);
                                
                       ?>
				<h5>sortie le <?php echo (float)$jour. ' ' . $mois; ?></h5>
					<?php

						$categorie =  get_the_terms(get_post(), 'product_cat'); 
						if ( ! empty( $categorie ) && ! is_wp_error( $categorie ) ){
							foreach ($categorie  as $term  ) {
								$product_cat_name = $term->name;
								echo "<h5>" . $product_cat_name . ' ' . "</h5>";
							}
						}

					?>
			</div>


			
		<?php endwhile; ?>
		

			<!--<div class="grid-item">
				<a href="produit.html" alt=""><img src="img/film4.png" alt="grandeur"></a>
				<h3 class="titre">Grandeur et décadence d’un petit commerce de cinéma</h3>
				<h4>de <span class="auteur">Jean-Luc Godard</span> </h4>
				<h5>sortie le 12 septembre</h5>
				<h5><span class="categorie">Court-Métrage</span></h5>
			</div>-->
		
		</div>

	</div>






<?php else : ?>

	<?php get_template_part( 'loop-templates/content', 'none' ); ?>

<?php endif; ?>


</div>







<?php get_footer(); ?>
