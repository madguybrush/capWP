<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
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

/*
 * @hooked wc_empty_cart_message - 10
 */
do_action( 'woocommerce_cart_is_empty' );

//if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
	<!--<p class="return-to-shop">
		<a class="cta" href="--><?php //echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?><!--">-->
			<?php //esc_html_e( 'Return to shop', 'understrap' ); ?>
		<!--</a>
	</p>-->



<?php 
//$cat_name = 'DVD';
//echo $category_id = get_cat_ID( $cat_name );

$categorie =  get_terms('product_cat'); 
	if ( ! empty( $categorie ) && ! is_wp_error( $categorie ) ){
		foreach ($categorie  as $term  ) {
			$category_id = $term->term_id;
		}
	}
//$categories = get_terms('product_cat');
//$category_id = $categories[0];
//echo $category_id;

//print_r($categories);

//get_category_link( $category_id ); 
//wc_get_checkout_url() );
?> 

<form action="<?php echo esc_url( get_category_link( $category_id )); ?>">
	<button type="submit" class=" cta checkout-button button alt wc-forward">
	 	RETOUR A LA BOUTIQUE <?php //esc_html_e( 'Return to shop', 'understrap' );?>
	</button>
</form>

<?php //endif; ?>
