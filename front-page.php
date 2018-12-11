<?php
/**
 * The template for displaying front page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

?>


<div id="fullpage">
	
    
             <?php 
    
    //if ( is_woocommerce_activated() ) {
    
    /*		 $ProjetsQuery = new WP_Query([
      		'post_type'   =>  'product',
      		'stock'       =>  1,
      		'showposts'   =>  3,
      		'orderby'     =>  'date',
      		'order'       =>  'DESC',
     		 'meta_query'  =>  [ 
        		['key' => '_featured', 'value' => 'yes' ]
        		]
    		]);*/
    
    //$args = array( 'post_type' => 'product', 'posts_per_page' => 3, 'meta_query' => array( array('key' => '_visibility','value' => array('catalog', 'visible'),'compare' => 'IN'),array('key' => '_featured','value' => 'yes')) );
    //$args = array( 'post_type' => 'product',  'meta_query' => array('key' => '_featured','value' => 'yes') );
    
    $args = array(
            'post_type' => 'product',
            'posts_per_page' => 8,
            'tax_query' => array(
                    array(
                        'taxonomy' => 'product_visibility',
                        'field'    => 'name',
                        'terms'    => 'featured',
                    ),
                ),
            );
    
    
    $ProjetsQuery = new WP_Query($args ); 
    // , 'meta_key' => '_featured', 'meta_value' => 'yes'         is_featured( ) sticky_posts?>
            <?php if ( $ProjetsQuery->have_posts() ) : ?>
                <?php while ( $ProjetsQuery->have_posts() ) : ?>
                    <?php $ProjetsQuery->the_post(); ?>
    
	<div class="section" id="section" style="background-image: url(<?php the_post_thumbnail_url(); ?>); background-size: cover; background-position: center; background-repeat: no-repeat;">
		<div class="intro">
			<h1><?php the_title(); ?></h1>
			<h2>un film de UI-SEOK Kim</h2>
			<h3>EN SALLE LE 22 NOVEMBRE 2018</h3>
			<a href="" class="plusbutton">&nbsp;+&nbsp;</a>
		</div>
	</div>

	

	  <?php endwhile; ?>
    
    <?php else : ?>
    lol
   <?php endif; ?>
	
	
	
</div>

<?php get_footer(); ?>