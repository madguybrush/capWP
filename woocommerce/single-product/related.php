<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
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
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<!--<section class="related products">-->

		<h2><?php //esc_html_e( 'Related products', 'woocommerce' ); ?></h2>
<h3 class="widget-title">Vous aimeriez aussi</h3> 

		<?php woocommerce_product_loop_start(); ?>

			<?php foreach ( $related_products as $related_product ) : ?>

				<?php
				 	$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object );

					//wc_get_template_part( 'content', 'product' ); 

	 echo '<div class="container-fluid"><div class="row"><div class="col-4" style="padding:5px;">';


?>
                <a href="<?php echo get_permalink(); ?>" alt="<?php the_title(); ?>">
											<?php if( get_field('affiche_du_film') ) : ?>
                                  				<img src="<?php the_field('affiche_du_film'); ?>" alt="<?php the_title(); ?>">
                                			<?php else : // image par défaut ?>
                                    			<img src="<?php bloginfo('stylesheet_directory');?>/img/film4.png" alt="<?php the_title(); ?>">
                                			<?php endif; ?>
										</a>
				<?php						
                echo '</div><div class="col-8" style="padding:5px; text-align: left;">';
                echo '<h4>'; the_title(); echo '</h4>';
                echo '<h5> de ' . get_field('auteur') . '</h5>';
                //echo '<br />';
                $date = get_field('date_de_sortie'); 
                            $timestamp = strtotime($date);
                            
                            $dateformatannee = "Y";
                            $dateformatmois = "F";
                            $dateformatjour = "d";
                            $annee = date_i18n($dateformatannee, $timestamp);
                            $jour =  date_i18n($dateformatjour, $timestamp);
                            $mois =  date_i18n($dateformatmois, $timestamp);
                  echo "<h6> sortie le ";
                 echo (float)$jour. ' ' . $mois; echo ' ' . $annee . '</h6>';
                echo '</div></div></div>';



					?>

			<?php endforeach; ?>

		<?php woocommerce_product_loop_end(); ?>

	<!--</section>-->

<?php endif;

wp_reset_postdata();
