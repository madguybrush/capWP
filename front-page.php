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
		
        
        <?php 
        
                  //  $attachment_id = get_field('jaquette_du_dvd__prix_recus_page_daccueil');
                     //  $attachment_id =   get_post_meta($post->ID, "wccaf_jaquette_dvd_homepage", true);
            /* Use the following if you want only the attachment URL */
           // $img = wp_get_attachment_image_src($attachment_id, 'full');
                    //print_r($img);
            /* $img[0] contains the SRC */
            // $html = '<img src="'. $img[0] .'" />';
        
        //$video = get_post_meta( $post->ID, "wccaf_url_vido_homepage", true );
        $video = get_field('url_vimeo_de_la_video_page_daccueil');
        //if (!empty($video)){
        if( $video ) {    


            
      /*  $categories = get_the_category();
            if ( ! empty( $categories ) ) {
                echo esc_html( $categories[0]->name );   
            }*/
            
            ?>
        
             <video class="myVideo"  loop muted data-autoplay> <!-- controls width="100%" height="100%" -->
                <source src="<?php echo $video; //get_post_meta( $post->ID, "wccaf_url_vido_homepage", true ) ?>" type="video/mp4">
				Your browser does not support the video tag.
             </video>

				<div class="flex-container animated fadeInUp">

					<div class="layer flex-item animated fadeIn flextexte" >
						<!--<span class="tag">PROCHAINEMENT    </span>-->
						<h1><?php the_title(); ?></h1>
						<h2>
                            
                            <?php if( get_field('sous_titre') ): ?>
                               <?php echo get_field('sous_titre');   ?>
                            <br />
                             <?php endif; ?>
                            <?php 
                                $product_categories = get_the_terms($post->ID, 'product_cat');
                                if ( ! empty( $product_categories ) && ! is_wp_error( $product_categories ) ) {
                                        $categories = wp_list_pluck( $product_categories, 'name' );
                                    }
                                //print_r($categories); 
                                //$cat = $categories->name;
                               //echo $categories[0];
                                //echo $categories['name'];  
                                //$categories = get_the_terms($post->ID, 'category'); 
                                //print_r(get_the_category($post->ID)) ; 
                                //print_r($categories);
                                
                               // $term_obj_list = get_the_terms( $post->ID, 'taxonomy' );
                               // $terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
                               // echo $terms_string ;
                                if (($categories[0] === "DVD" ) || ($categories[0] === "Films" )) { echo "un film de ";}
                                else { echo "un livre de "; }
                                echo get_field('auteur'); 
                                //get_post_meta( $post->ID, "wccaf_auteur", true ); ?>
                        </h2>
						<h3><!-- EN SALLE/DVD/LIBRAIRIE LE -->

                            <?php 
                            $date = get_field('date_de_sortie'); 
                            $timestamp = strtotime($date);
                            
                            $dateformatannee = "Y";
                            $dateformatmois = "F";
                            $dateformatjour = "d";
                            $annee = date_i18n($dateformatannee, $timestamp);
                            $jour =  date_i18n($dateformatjour, $timestamp);
                            $mois =  date_i18n($dateformatmois, $timestamp);

                            if ($categories[0] === "DVD" ) { echo "en dvd le ";}
                             else if ($categories[0] === "Films" ) { echo "en salle le ";}
                                else { echo "en livrairie le "; }
                            
                            echo (float)$jour. ' ' . $mois; echo ' ' . $annee;

                        ?>
                        </h3>
						<a href="<?php echo get_permalink(); ?>" alt=""><img alt="en savoir plus" src="<?php bloginfo('stylesheet_directory');?>/img/plus-sign-button.svg" class="plusbutton"></a>
						
					</div>
					<div class="layerimg flex-item animated fadeIn fleximage">
						<?php if( get_field('jaquette') ): ?>
                        <img alt="<?php the_title(); ?>" src="<?php the_field('jaquette'); //$img[0]; ?>" class="fleximg">
                        <?php endif; ?>
					</div>
				</div>
        
        <?php
        }
        else {
            // get_the_ID()
        ?>
        
        <div class="flex-container animated fadeInUp ">
			<div class="intro flex-item flextexte">
                <h1><?php the_title(); ?></h1>
                <h2>
                                 <?php if( get_field('sous_titre') ): ?>
                               <?php echo get_field('sous_titre');   ?>
                            <br />
                             <?php endif; ?>
                    
                                <?php 
                                $product_categories = get_the_terms($post->ID, 'product_cat');
                                if ( ! empty( $product_categories ) && ! is_wp_error( $product_categories ) ) {
                                        $categories = wp_list_pluck( $product_categories, 'name' );
                                    }

                                if (($categories[0] === "DVD" ) || ($categories[0] === "Films" )) { echo "un film de ";}
                                else { echo "un livre de "; }
                                echo get_field('auteur'); 
                    ?>
                
                </h2>
			     <h3><!--EN SALLE/DVD/LIBRAIRIE LE  -->
                        <?php 
                            $date = get_field('date_de_sortie'); 
                            $timestamp = strtotime($date);
                            
                            $dateformatannee = "Y";
                            $dateformatmois = "F";
                            $dateformatjour = "d";
                            $annee = date_i18n($dateformatannee, $timestamp);
                            $jour =  date_i18n($dateformatjour, $timestamp);
                            $mois =  date_i18n($dateformatmois, $timestamp);
                            if ($categories[0] === "DVD" ) { echo "en dvd le ";}
                             else if ($categories[0] === "Films" ) { echo "en salle le ";}
                                else { echo "en librairie le "; }
                            echo (float)$jour. ' ' . $mois; echo ' ' . $annee;
                            //$date = new DateTime($date);
                            // echo $date->format('d M Y');
                            //get_post_meta( $post->ID, "wccaf_date_de_sortie", true ); 
                        ?>
                </h3>
			     <a href="<?php echo get_permalink(); ?>" alt=""><img alt="en savoir plus" src="<?php bloginfo('stylesheet_directory');?>/img/plus-sign-button.svg" class="plusbutton"></a>
		      </div>
            
            <div class="flex-item fleximage ">
                <?php if( get_field('jaquette') ): ?>
                    <img alt="<?php the_title(); ?>" src="<?php the_field('jaquette'); //$img[0]; ?>" class="fleximg">
                <?php endif; ?>

            </div>
		
        </div>	
        <?php 
        }
        ?>
        
	</div>

	

	  <?php endwhile; ?>
    
    <?php else : ?>
    
   <?php endif; ?>
	
	
	
</div>

<?php get_footer(); ?>