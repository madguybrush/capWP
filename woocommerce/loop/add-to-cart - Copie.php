<?php
/**
 * Loop Add to Cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
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
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
/*
echo apply_filters( 'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok. btn btn-outline-primary 
	sprintf( '<div class="add-to-cart-container"><a href="%s" data-quantity="%s" class="%s product_type_%s single_add_to_cart_button cta btn-block %s" %s> %s</a></div>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
		$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
		esc_attr( $product->get_type() ),
		$product->get_type() == 'simple' ? 'ajax_add_to_cart' : '',
		isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
		esc_html( $product->add_to_cart_text() )
	),
$product, $args );
*/

if ($product->get_type() == 'simple'){

	echo sprintf( '<div class="add-to-cart-container"><a href="%s" data-quantity="%s" class="%s product_type_%s single_add_to_cart_button cta btn-block %s" %s> %s</a></div>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
		$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
		esc_attr( $product->get_type() ),
		$product->get_type() == 'simple' ? 'ajax_add_to_cart' : '',
		isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
		esc_html( $product->add_to_cart_text() )
	);
}

else if ($product->get_type() == 'variable'){

$get_variations = count( $product->get_children() ) <= apply_filters( 'woocommerce_ajax_variation_threshold', 30, $product );
$available_variations = $product->get_available_variations();
$attributes = $product->get_variation_attributes();
$selected_attributes = $product->get_default_attributes();

$attribute_keys = array_keys( $attributes );
//print_r($attribute_keys);
//Array ( [0] => format film )

 if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<p class="stock out-of-stock"><?php esc_html_e( 'This product is currently out of stock and unavailable.', 'woocommerce' ); ?></p>
	<?php else : ?>

				<?php foreach ( $attributes as $attribute_name => $options ) { 
						foreach ( $options as $option ) { ?>
		<div class="add-to-cart-container"
			<a href="" data-quantity="" class=""> 
				<?php 
				//print_r($attributes);
				//Array ( [format film] => Array ( [0] => DVD [1] => VOD ) ) 
				//print_r($attribute_name);
				//format film
				//print_r($options);
				// Array ( [0] => DVD [1] => VOD )
				//echo $attributes[$attribute_name] => $options;
				echo $option;
				?>
			</a>
		</div>
					
					<?php
					            //wc_dropdown_variation_attribute_options( array(
                                //    'options'   => $options,
                            	//        'attribute' => $attribute_name,
                                //    'product'   => $product,
                            	//    ) );
					?>		


				<?php } //endforeach;
				} //endforeach; ?>


	<?php endif; 




} // endif 