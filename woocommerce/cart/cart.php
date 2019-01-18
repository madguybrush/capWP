<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// woocommerce-message
	//do_action( 'woocommerce_before_cart' ); ?>


<?php //echo sprintf ( _n( '%d produit', '%d produits', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> 

<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<?php do_action( 'woocommerce_before_cart_table' ); ?>

	<!--<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">-->
		<div class="container-fluid shop_table shop_table_responsive cart woocommerce-cart-form__contents">

		<!--<tbody>-->
			<?php do_action( 'woocommerce_before_cart_contents' ); ?>

			<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<!--<tr class="woocommerce-cart-form__cart-item--> <?php //echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?><!--">-->
						<div class="row woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">


							<div class="col-md-2 col-sm-4 product-thumbnail">
								<!--<td class="product-thumbnail">-->


									<?php
									
									//$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
									$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
									
									//if ( ! $product_permalink ) {
										//echo $thumbnail; // PHPCS: XSS ok.
									//} else {
									//	printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
									//}
									?>	

												<a href="<?php echo get_permalink(); ?>" alt="<?php the_title(); ?>">
													<?php 
													//$affiche = the_field('affiche_du_film', $product_id ); 
													$affiche = get_field('affiche_du_film', $product_id ); 
													//if( get_field('affiche_du_film') ) : 
													if( $affiche ) : 
														?>
		                                  				<img src="<?php the_field('affiche_du_film', $product_id ); // the_field('affiche_du_film'); ?>" alt="<?php the_title(); ?>">
		                                			<?php else : // image par défaut ?>
		                                    			<img src="<?php bloginfo('stylesheet_directory');?>/img/film4.png" alt="<?php the_title(); ?>">
		                                			<?php endif; ?>
												</a>


								<!--</td>-->
							</div>
							<div class="col-md-5 col-sm-8 product-name" data-title="<?php esc_attr_e( 'Product', 'understrap' ); ?>">
									<!--<td class="product-name" data-title="--><?php //esc_attr_e( 'Product', 'understrap' ); ?><!--">-->

									<?php

									/*
											$catnouveaute = get_the_terms( $product->get_id(), 'product_cat' );
									 
									        if ( ! empty( $catnouveaute ) && ! is_wp_error( $catnouveaute ) ){
										        foreach ($catnouveaute  as $term  ) {
								
											           $product_cat_name = $term->name;
											            if (($product_cat_name == "DVD") || ($product_cat_name == "Livres")){
												            echo $product_cat_name;
												        }
				
												 }
											}*/



									if ( ! $product_permalink ) {
										echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
									} else {
										echo "<h3>" . wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) ) . "</h3>";
										//echo "<br>";
										echo "<h4>" . get_field('auteur', $product_id) . "</h4>"; 
										echo "<br>";
										$categorie =  get_the_terms($product_id, 'product_cat'); 
										if ( ! empty( $categorie ) && ! is_wp_error( $categorie ) ){
										        foreach ($categorie  as $term  ) {
								
											           $product_cat_name = $term->name;
											            //if (($product_cat_name == "DVD") || ($product_cat_name == "Livres")){
												            echo "<h5>" . $product_cat_name . ' ' . "</h5>";
												       // }
				
												 }
											}
									}


									do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

									// Meta data.
									echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

									// Backorder notification.
									if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
										echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'understrap' ) . '</p>', $product_id ) );
									}
									?>
									<!--</td>-->
							</div>



							<div class="product-price" data-title="<?php esc_attr_e( 'Price', 'understrap' ); ?>">
								<!--<td class="product-price" data-title="--><?php //esc_attr_e( 'Price', 'understrap' ); ?><!--">-->
								<?php
									echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
								?>
								<!--</td>-->
							</div>


						<div class="col-md-2 col-sm-4 product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'understrap' ); ?>">
							<!--<td class="product-quantity" data-title="--><?php //esc_attr_e( 'Quantity', 'understrap' ); ?><!-- "> -->
							
							<div class="row">
								<div class="col-6" style="font-size: .6rem; color: #919191; align-self: center;">QUANTITE</div>
								<div class="col-6" style="font-size: .7rem; color: #919191;">
									<?php
									if ( $_product->is_sold_individually() ) {
										$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
									} else {
										$product_quantity = woocommerce_quantity_input( array(
											'input_name'   => "cart[{$cart_item_key}][qty]",
											'input_value'  => $cart_item['quantity'],
											'max_value'    => $_product->get_max_purchase_quantity(),
											'min_value'    => '0',
											'product_name' => $_product->get_name(),
										), $_product, false );
									}

									echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
									?>
									<!--</td>-->
								</div>
							</div>
						</div>


						<!--<td class="product-remove">-->
							<!--<div class="col-1 product-remove">-->

								<!--</td>-->
							<!--</div>-->


						<div class="col-md-2 col-sm-6">
							
							<div class="row">
								<div class="col-md-12 col-sm-6">

										<button type="submit" class="ctapanierrafraichir" name="update_cart" value="--><?php //esc_attr_e( 'Update cart', 'understrap' ); ?><!--">
											RAFRAICHIR
										</button>
								</div>
								<div class="col-md-12 col-sm-6">

											<?php


											
											// @codingStandardsIgnoreLine
											echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
												//'<a class="" href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"><button class="ctapanierenlever">SUPPRIMER</button></a>',
												'<a class="ctapanierenlever" href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">SUPPRIMER</a>',
												esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
												__( 'Remove this item', 'understrap' ),
												esc_attr( $product_id ),
												esc_attr( $_product->get_sku() )
											), $cart_item_key );



										?>
								</div>	
<!--<button class="cta">ENLEVER</button>-->
<!--  &times;-->
						
							</div>

						</div>
						<div class="col-md-1 col-sm-2 product-subtotal" data-title="<?php esc_attr_e( 'Total', 'understrap' ); ?>">
							<!--<td class="product-subtotal" data-title="--><?php //esc_attr_e( 'Total', 'understrap' ); ?><!--">-->
								<?php
									echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
								?>
							<!--</td>-->
						</div>

					<!--</tr>-->
				</div> <!-- row -->
					<?php
				}
			}
			?>

			<?php do_action( 'woocommerce_cart_contents' ); ?>

		<!--	<tr>
				<td colspan="6" class="actions">-->

					<?php //if ( wc_coupons_enabled() ) { ?>
						<!--<div class="coupon">
							<label for="coupon_code">--><?php //esc_html_e( 'Coupon:', 'understrap' ); ?><!--</label> <input type="text" name="coupon_code" class="input-text form-control" id="coupon_code" value="" placeholder="--><?php //esc_attr_e( 'Coupon code', 'understrap' ); ?><!-- "/> <button type="submit" class="btn btn-outline-primary" name="apply_coupon" value="--><?php //esc_attr_e( 'Apply coupon', 'understrap' ); ?><!--">--><?php //esc_attr_e( 'Apply coupon', 'understrap' ); ?><!--</button>-->
							<?php //do_action( 'woocommerce_cart_coupon' ); ?>
						<!--</div>-->
					<?php //} ?>

					<!--<button type="submit" class="btn btn-outline-primary" name="update_cart" value="--><?php //esc_attr_e( 'Update cart', 'understrap' ); ?><!--">--><?php //esc_html_e( 'Update cart', 'understrap' ); ?><!--</button>-->

					<?php do_action( 'woocommerce_cart_actions' ); ?>

					<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
			<!--	</td>

			</tr> -->

			<?php do_action( 'woocommerce_after_cart_contents' ); ?>
		<!--</tbody>-->
	<!--</table>-->
</div> <!-- container-fluid -->


	<?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>

<div class="cart-collaterals">
	<?php
		/**
		 * Cart collaterals hook.
		 *
		 * @hooked woocommerce_cross_sell_display
		 * @hooked woocommerce_cart_totals - 10
		 */
	do_action( 'woocommerce_cart_collaterals' );
	?>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
