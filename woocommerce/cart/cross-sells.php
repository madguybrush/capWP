<?php
/**
 * Cross-sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cross-sells.php.
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

if ( $cross_sells ) : ?>

<div class="cross-sells">


	<?php

							//dynamic_sidebar( 'right-sidebar' );

							/*$args = array(
								'posts_per_page' => 6,
								'columns'        => 2,
								'orderby'        => 'rand', 
								'order'          => 'desc',
							);
							
							woocommerce_output_related_products($args);*/


							//$product->get_id()
							// appeler woocommerce_output_related_products(); et modifier template single-product/related.php

							?>

							<h2><?php //_e( 'You may be interested in&hellip;', 'woocommerce' ) ?></h2>
							<h3 style="margin-left: 1.5rem; font-size: .8rem; font-family: Montserrat; color: #A78A3C; text-transform: uppercase;">Vous aimeriez aussi</h3>
							<div class="container-fluid">
								<div class="row">
									<?php woocommerce_product_loop_start(); ?>

									<?php foreach ( $cross_sells as $cross_sell ) : ?>

										<?php

				 	//$post_object = get_post( $cross_sell->get_id() );

					//setup_postdata( $GLOBALS['post'] =& $post_object );

					//wc_get_template_part( 'content', 'product' ); 

										$post_object = get_post( $cross_sell->get_id() );
				//print_r($post_object);
										$id =  $post_object->ID;
										$product = wc_get_product($id);
				//$price = $product->price;
										
				//$price = get_price_html($product);
				//print_r($product);
										setup_postdata( $GLOBALS['post'] =& $post_object );
                //wc_get_template_part( 'content', 'product' ); 

               // do_action( 'woocommerce_before_shop_loop_item_title' );
               // do_action( 'woocommerce_shop_loop_item_title' );
										echo '<div class="col-md-3 col-6"><div class="row"><div class="col-4" style="padding:5px;">';
                //echo woocommerce_get_product_thumbnail(); 

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
                //echo get_product_price();
                //echo get_price();
               //if ( $price_html = $product->get_price_html() ) { echo $price_html; }
                //$price = $product->get_price();
              // echo '<br />'; //. $price;
										echo '<h7>' . apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $product ) ) . '</h7>';

										echo '</div></div></div>';

										?>

									<?php endforeach; ?>

									<?php woocommerce_product_loop_end(); ?>

								</div>
							</div>
						</div>
					<?php endif;

					wp_reset_postdata();
