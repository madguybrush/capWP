<?php
/**
 * Single Product title
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/title.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author     WooThemes
 * @package    WooCommerce/Templates
 * @version    1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

//the_title( '<h1 class="product_title entry-title">', '</h1>' );
global $product;
?>




    <header class="container-fluid animated fadeInDown slower" style="background-image: url(<?php the_post_thumbnail_url(); ?>); background-size: cover; background-position: top; background-repeat: no-repeat;">

        <div class="row infosheader animated fadeInUp">
            <div class="col-md-4 col-lg-3 text-center padding2">
                <?php if( get_field('affiche_du_film') ): ?>
                                    <img src="<?php the_field('affiche_du_film'); ?>" alt="<?php the_title(); ?>" class="imgaffiche animated fadeInUp">
                                <?php else : // image par défaut ?>
                                    <img src="<?php bloginfo('stylesheet_directory');?>/img/film4.png" alt="<?php the_title(); ?>" class="imgaffiche animated fadeInUp">
                                <?php endif; ?>
                <!--<img src="img/film1.png" alt="after my death" class="imgaffiche animated fadeInUp">-->
            </div>
            <div class="col-md-8 col-lg-9 padding0">
                <h1 class="animated fadeInUp"><?php the_title(); ?></h1>
                <h2 class="animated fadeInUp">un film de <?php echo get_field('auteur'); ?></h2>
            </div>
            
        </div>

    </header>