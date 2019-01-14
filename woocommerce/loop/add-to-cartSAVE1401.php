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
/* ORIGINAL WC CODE *//*
echo apply_filters( 'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
	sprintf( '<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
		esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
		isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
		esc_html( $product->add_to_cart_text() )
	),
$product, $args );
*/
/* ORIGINAL understrap CODE *//*
echo apply_filters( 'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
	sprintf( '<div class="add-to-cart-container"><a href="%s" data-quantity="%s" class="%s product_type_%s single_add_to_cart_button btn btn-outline-primary btn-block %s" %s> %s</a></div>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
		$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
		esc_attr( $product->get_type() ),
		$product->get_type() == 'simple' ? 'ajax_add_to_cart' : '',
		isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
		esc_html( $product->add_to_cart_text() )
	),
$product, $args );*/
/* my slight modifs*//*
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

/* my code */ 
	echo sprintf( '<div class="add-to-cart-container"><a href="%s" data-quantity="%s" class="%s product_type_%s single_add_to_cart_button cta btn-block %s" %s> %s</a></div>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
		$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
		esc_attr( $product->get_type() ),
		//$product->get_type() == 'simple' ? 'ajax_add_to_cart' : '',
		esc_attr('ajax_add_to_cart'),
		isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
		esc_html( $product->add_to_cart_text() )
	);

/*
echo apply_filters( 'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
	sprintf( '<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
		esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
		isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
		esc_html( $product->add_to_cart_text() )
	),
$product, $args );
*/

}

else {

do_action( 'woocommerce_' . $product->get_type() . '_add_to_cart' ); 

//1530 de includes\wc-templates-functions :

	//function woocommerce_variable_add_to_cart() {
	//	global $product;

		// Enqueue variation scripts.
	//	wp_enqueue_script( 'wc-add-to-cart-variation' );

		// Get Available variations?
	//	$get_variations = count( $product->get_children() ) <= apply_filters( 'woocommerce_ajax_variation_threshold', 30, $product );

		// Load the template.
	//	wc_get_template( 'single-product/add-to-cart/variable.php', array(
	//		'available_variations' => $get_variations ? $product->get_available_variations() : false,
	//		'attributes'           => $product->get_variation_attributes(),
	//		'selected_attributes'  => $product->get_default_attributes(),
	//	) );
//	}



/*

$get_variations = count( $product->get_children() ) <= apply_filters( 'woocommerce_ajax_variation_threshold', 30, $product );
$available_variations = $product->get_available_variations();
$attributes = $product->get_variation_attributes();
$selected_attributes = $product->get_default_attributes();
$attribute_keys = array_keys( $attributes );



 if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<p class="stock out-of-stock"><?php esc_html_e( 'This product is currently out of stock and unavailable.', 'woocommerce' ); ?></p>
	<?php else :

	 foreach ( $attributes as $attribute_name => $options ) { 
						foreach ( $options as $option ) { 

	echo sprintf( '<div class="add-to-cart-container"><a href="%s" data-quantity="%s" class="%s product_type_%s single_add_to_cart_button cta btn-block %s" %s data-product_variations="%s"  > %s</a></div>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
		$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
		esc_attr( $product->get_type() ),
		esc_attr('ajax_add_to_cart'),
		isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
		esc_attr(htmlspecialchars( wp_json_encode( $available_variations ) )),
		esc_html( $product->add_to_cart_text() . $option)
	);

} 
				}  

	 endif; */

}

//current-image="%s"
/*. '?add-to-cart=' . $product->get_id() .'?attribute_format-film=' . $option*/

/*

	echo sprintf( '<div class="add-to-cart-container"><a href="%s" data-quantity="%s" class="%s product_type_%s single_add_to_cart_button cta btn-block %s" %s> %s</a></div>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
		$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
		esc_attr( $product->get_type() ),
		$product->get_type() == 'simple' ? 'ajax_add_to_cart' : '',
		isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
		esc_html( $product->add_to_cart_text() . $option )
	);

*/




/*

data-product_id="137" 

data-product_variations="[{&quot;attributes&quot;:{&quot;attribute_format-film&quot;:&quot;DVD&quot;},&quot;availability_html&quot;:&quot;&quot;,&quot;backorders_allowed&quot;:false,&quot;dimensions&quot;:{&quot;length&quot;:&quot;&quot;,&quot;width&quot;:&quot;&quot;,&quot;height&quot;:&quot;&quot;},&quot;dimensions_html&quot;:&quot;ND&quot;,&quot;display_price&quot;:15,&quot;display_regular_price&quot;:15,&quot;image&quot;:{&quot;title&quot;:&quot;fond-BadLieutenant&quot;,&quot;caption&quot;:&quot;&quot;,&quot;url&quot;:&quot;http:\/\/testcapricci.fr\/wp-content\/uploads\/sites\/16\/2019\/01\/fond-BadLieutenant.jpg&quot;,&quot;alt&quot;:&quot;&quot;,&quot;src&quot;:&quot;http:\/\/testcapricci.fr\/wp-content\/uploads\/sites\/16\/2019\/01\/fond-BadLieutenant-600x340.jpg&quot;,&quot;srcset&quot;:&quot;http:\/\/testcapricci.fr\/wp-content\/uploads\/sites\/16\/2019\/01\/fond-BadLieutenant-600x340.jpg 600w, http:\/\/testcapricci.fr\/wp-content\/uploads\/sites\/16\/2019\/01\/fond-BadLieutenant-300x170.jpg 300w, http:\/\/testcapricci.fr\/wp-content\/uploads\/sites\/16\/2019\/01\/fond-BadLieutenant-768x435.jpg 768w, http:\/\/testcapricci.fr\/wp-content\/uploads\/sites\/16\/2019\/01\/fond-BadLieutenant-1024x580.jpg 1024w&quot;,&quot;sizes&quot;:&quot;(max-width: 600px) 100vw, 600px&quot;,&quot;full_src&quot;:&quot;http:\/\/testcapricci.fr\/wp-content\/uploads\/sites\/16\/2019\/01\/fond-BadLieutenant.jpg&quot;,&quot;full_src_w&quot;:1921,&quot;full_src_h&quot;:1089,&quot;gallery_thumbnail_src&quot;:&quot;http:\/\/testcapricci.fr\/wp-content\/uploads\/sites\/16\/2019\/01\/fond-BadLieutenant-100x100.jpg&quot;,&quot;gallery_thumbnail_src_w&quot;:100,&quot;gallery_thumbnail_src_h&quot;:100,&quot;thumb_src&quot;:&quot;http:\/\/testcapricci.fr\/wp-content\/uploads\/sites\/16\/2019\/01\/fond-BadLieutenant-300x300.jpg&quot;,&quot;thumb_src_w&quot;:300,&quot;thumb_src_h&quot;:300,&quot;src_w&quot;:600,&quot;src_h&quot;:340},&quot;image_id&quot;:&quot;136&quot;,&quot;is_downloadable&quot;:false,&quot;is_in_stock&quot;:true,&quot;is_purchasable&quot;:true,&quot;is_sold_individually&quot;:&quot;no&quot;,&quot;is_virtual&quot;:false,&quot;max_qty&quot;:&quot;&quot;,&quot;min_qty&quot;:1,&quot;price_html&quot;:&quot;<span class=\&quot;price\&quot;><span class=\&quot;woocommerce-Price-amount amount\&quot;>15,00<span class=\&quot;woocommerce-Price-currencySymbol\&quot;>&amp;euro;<\/span><\/span><\/span>&quot;,&quot;sku&quot;:&quot;&quot;,&quot;variation_description&quot;:&quot;&quot;,&quot;variation_id&quot;:145,&quot;variation_is_active&quot;:true,&quot;variation_is_visible&quot;:true,&quot;weight&quot;:&quot;&quot;,&quot;weight_html&quot;:&quot;ND&quot;},{&quot;attributes&quot;:{&quot;attribute_format-film&quot;:&quot;VOD&quot;},&quot;availability_html&quot;:&quot;&quot;,&quot;backorders_allowed&quot;:false,&quot;dimensions&quot;:{&quot;length&quot;:&quot;&quot;,&quot;width&quot;:&quot;&quot;,&quot;height&quot;:&quot;&quot;},&quot;dimensions_html&quot;:&quot;ND&quot;,&quot;display_price&quot;:10,&quot;display_regular_price&quot;:10,&quot;image&quot;:{&quot;title&quot;:&quot;fond-BadLieutenant&quot;,&quot;caption&quot;:&quot;&quot;,&quot;url&quot;:&quot;http:\/\/testcapricci.fr\/wp-content\/uploads\/sites\/16\/2019\/01\/fond-BadLieutenant.jpg&quot;,&quot;alt&quot;:&quot;&quot;,&quot;src&quot;:&quot;http:\/\/testcapricci.fr\/wp-content\/uploads\/sites\/16\/2019\/01\/fond-BadLieutenant-600x340.jpg&quot;,&quot;srcset&quot;:&quot;http:\/\/testcapricci.fr\/wp-content\/uploads\/sites\/16\/2019\/01\/fond-BadLieutenant-600x340.jpg 600w, http:\/\/testcapricci.fr\/wp-content\/uploads\/sites\/16\/2019\/01\/fond-BadLieutenant-300x170.jpg 300w, http:\/\/testcapricci.fr\/wp-content\/uploads\/sites\/16\/2019\/01\/fond-BadLieutenant-768x435.jpg 768w, http:\/\/testcapricci.fr\/wp-content\/uploads\/sites\/16\/2019\/01\/fond-BadLieutenant-1024x580.jpg 1024w&quot;,&quot;sizes&quot;:&quot;(max-width: 600px) 100vw, 600px&quot;,&quot;full_src&quot;:&quot;http:\/\/testcapricci.fr\/wp-content\/uploads\/sites\/16\/2019\/01\/fond-BadLieutenant.jpg&quot;,&quot;full_src_w&quot;:1921,&quot;full_src_h&quot;:1089,&quot;gallery_thumbnail_src&quot;:&quot;http:\/\/testcapricci.fr\/wp-content\/uploads\/sites\/16\/2019\/01\/fond-BadLieutenant-100x100.jpg&quot;,&quot;gallery_thumbnail_src_w&quot;:100,&quot;gallery_thumbnail_src_h&quot;:100,&quot;thumb_src&quot;:&quot;http:\/\/testcapricci.fr\/wp-content\/uploads\/sites\/16\/2019\/01\/fond-BadLieutenant-300x300.jpg&quot;,&quot;thumb_src_w&quot;:300,&quot;thumb_src_h&quot;:300,&quot;src_w&quot;:600,&quot;src_h&quot;:340},&quot;image_id&quot;:&quot;136&quot;,&quot;is_downloadable&quot;:false,&quot;is_in_stock&quot;:true,&quot;is_purchasable&quot;:true,&quot;is_sold_individually&quot;:&quot;no&quot;,&quot;is_virtual&quot;:true,&quot;max_qty&quot;:&quot;&quot;,&quot;min_qty&quot;:1,&quot;price_html&quot;:&quot;<span class=\&quot;price\&quot;><span class=\&quot;woocommerce-Price-amount amount\&quot;>10,00<span class=\&quot;woocommerce-Price-currencySymbol\&quot;>&amp;euro;<\/span><\/span><\/span>&quot;,&quot;sku&quot;:&quot;&quot;,&quot;variation_description&quot;:&quot;&quot;,&quot;variation_id&quot;:146,&quot;variation_is_active&quot;:true,&quot;variation_is_visible&quot;:true,&quot;weight&quot;:&quot;&quot;,&quot;weight_html&quot;:&quot;ND&quot;}]" 


current-image="136"

*/