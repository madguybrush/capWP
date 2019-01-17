<?php
/**
 * The Template for displaying products in a product tag. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product_tag.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */



/*****************PAGES FILMS ET LIVRES*******************/


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); // 'shop'

//wc_get_template( 'archive-product.php' );

//woocommerce_content();

//wp_enqueue_style( 'capricci-produitCss', get_template_directory_uri() . '/css/produit.css',false,null,'all');

$taxonomie = get_queried_object(); 
$tax = $taxonomie->name; 
//print_r($taxonomie);
//  echo $tax;
//  $myposts = new WP_Query( array( 'category_name' => $cat ) );
?>

<div id="category">
    
	<header class="container-fluid padding10">

		<div class="row">

			<div class="col-sm-4">
				<select class="selecttitre" data-filter="titre">
					<option selected disabled>TITRE</option>
                    
                    
                    <?php
                            $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => 8,
                               // 'product_cat' => 'films, dvd',
                                'product_tag' => $tax      
                                );
                    
                        $ProjetsQuery = new WP_Query($args ); 
                            if ( $ProjetsQuery->have_posts() ) : 
                                while ( $ProjetsQuery->have_posts() ) : 
                                    $ProjetsQuery->the_post(); 
                    ?>
                    
					<option value="sameTitle"><?php the_title(); ?></option>
                    
                                <?php endwhile; ?>
                            <?php endif; ?>
                    <?php wp_reset_query(); ?>
                    
				</select>
			</div>
			<div class="col-sm-4">
				<select class="selectauteur">
					<option selected disabled>AUTEUR</option>
                    <?php
                            $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => 8,
                                //'product_cat' => 'films, dvd',
                                'product_tag' => $tax      
                                );
                    
                        $ProjetsQuery = new WP_Query($args ); 
                            if ( $ProjetsQuery->have_posts() ) : 
                                while ( $ProjetsQuery->have_posts() ) : 
                                    $ProjetsQuery->the_post(); 
                    ?>
                    
					
                                <option value="sameAuteur"><?php echo get_field('auteur'); ?></option>
					
                    
                               <?php endwhile; ?>
                            <?php endif; ?>
                    <?php wp_reset_query(); ?>
                    
				</select>
			</div>
			<div class="col-sm-4">
				<select class="selectcategory">
					<option selected disabled>CATEGORIE</option>
					<!--<option value="sameCategory">Distribution</option>
					<option value="sameCategory">Production</option>
					<option value="sameCategory">Court-Métrage</option>-->
					<option value="sameCategory">film d'actualité</option>
                    <option value="sameCategory">film de patrimoine</option>
                    <?php // echo get_field('categorie'); ?>
				</select>
			</div>

		</div>
		<div class="row">
			<div class="col alphabetical">
		<!--<a href="#" class="selectalpha a">A</a> B C D E F G H I J K L M N O P Q R S T U V W X Y Z-->
		<a href="#" class="selectalpha nostyle" data-filter=".a">A</a>
		<a href="#" class="selectalpha nostyle" data-filter=".b">B</a>
		<a href="#" class="selectalpha nostyle" data-filter=".c">C</a>
		<a href="#" class="selectalpha nostyle" data-filter=".d">D</a>
		<a href="#" class="selectalpha nostyle" data-filter=".e">E</a>
		<a href="#" class="selectalpha nostyle" data-filter=".f">F</a>
		<a href="#" class="selectalpha nostyle" data-filter=".g">G</a>
		<a href="#" class="selectalpha nostyle" data-filter=".h">H</a>
		<a href="#" class="selectalpha nostyle" data-filter=".i">I</a>
		<a href="#" class="selectalpha nostyle" data-filter=".j">J</a>
		<a href="#" class="selectalpha nostyle" data-filter=".k">K</a>
		<a href="#" class="selectalpha nostyle" data-filter=".l">L</a>
		<a href="#" class="selectalpha nostyle" data-filter=".m">M</a>
		<a href="#" class="selectalpha nostyle" data-filter=".n">N</a>
		<a href="#" class="selectalpha nostyle" data-filter=".o">O</a>
		<a href="#" class="selectalpha nostyle" data-filter=".p">P</a>
		<a href="#" class="selectalpha nostyle" data-filter=".q">Q</a>
		<a href="#" class="selectalpha nostyle" data-filter=".r">R</a>
		<a href="#" class="selectalpha nostyle" data-filter=".s">S</a>
		<a href="#" class="selectalpha nostyle" data-filter=".t">T</a>
		<a href="#" class="selectalpha nostyle" data-filter=".u">U</a>
		<a href="#" class="selectalpha nostyle" data-filter=".v">V</a>
		<a href="#" class="selectalpha nostyle" data-filter=".w">W</a>
		<a href="#" class="selectalpha nostyle" data-filter=".x">X</a>
		<a href="#" class="selectalpha nostyle" data-filter=".y">Y</a>
		<a href="#" class="selectalpha nostyle" data-filter=".z">Z</a>		
		</div>
		</div>
		
	</header>
        
                          
    
    <?php
    
    $i = getdate()['year'];
                  
    
      while ( $i > 1980 ) { 
          //echo $i; 
      
    
                    /*     $argsglobal = array(
                                'post_type' => 'product',
                                'posts_per_page' => 8,
                                'product_cat' => 'films, dvd',
                                'product_tag' => $tax      
                                );*/
                    
                      
                     /*   $AnneesQuery = new WP_Query($argsglobal ); 
                            if ( $AnneesQuery->have_posts() ) : 
                                while ( $AnneesQuery->have_posts() ) : 
                                    $AnneesQuery->the_post(); */
 
                
                  
                  //count post where annee = $i
                  // if >0 display
                  $args = array(
            'post_type' => 'product',
            'posts_per_page' => 8,
            //'product_cat' => 'films, dvd',
            'product_tag' => $tax      

            );
    
          $j = 0;
    
       $ProjetsQuery = new WP_Query($args ); 
                if ( $ProjetsQuery->have_posts() ) : 
                 while ( $ProjetsQuery->have_posts() ) : 
                   $ProjetsQuery->the_post(); 

                 // afficher seulement si annee = $i;
            
            $date = get_field('date_de_sortie'); 
            $timestamp = strtotime($date);
            $dateformatannee = "Y";
            $annee = date_i18n($dateformatannee, $timestamp);
        
           if ($annee == $i) { $j++; }
          endwhile; 

                            else : echo "";
            
                            endif;
          
            if ($j > 0){
           // wp_reset_query();
                    

          
          
                    ?>
    
                        <div class="container-fluid padding10 content">
        
        
        
		<div class="row films">
            
			<div class="col-md-12">
				<h2>
                    <?php  
                        echo $i; 
                        //$i = getdate();
                        //print_r($i['year']);
                    ?>
                </h2>
			</div>

		</div>
        
        
        
		<div class=" grid gridcatalogue <?php echo $tax; ?>">
			 <div class="gutter-sizer"></div> 
                <div class="grid-sizer"></div>

            
            

            
            <?php
                
                  $args = array(
            'post_type' => 'product',
            'posts_per_page' => 8,
          //   'product_cat' => 'films, dvd',
            'product_tag' => $tax      

            );
    
    
       $ProjetsQuery = new WP_Query($args ); 
                if ( $ProjetsQuery->have_posts() ) : 
                 while ( $ProjetsQuery->have_posts() ) : 
                   $ProjetsQuery->the_post(); 

                 // afficher seulement si annee = $i;
            
            $date = get_field('date_de_sortie'); 
            $timestamp = strtotime($date);
            $dateformatannee = "Y";
            $annee = date_i18n($dateformatannee, $timestamp);
           // echo "annee : " . $annee;
             //echo "i : " . $i;
            if ($annee == $i){
            
                ?>       

			<div class="grid-item text-center">

                
				<div class="container">
					<div class="row">
						<div class="col-12 colimg">
                          <!-- <a href="produit.html" alt=""><img src="img/film4.png" alt="grandeur"></a> -->
                            <a href="<?php echo get_permalink(); ?>" alt="<?php the_title(); ?>">
                                <?php if( get_field('affiche_du_film') ): ?>
                                    <img src="<?php the_field('affiche_du_film'); ?>" alt="<?php the_title(); ?>">
                                <?php else : // image par défaut ?>
                                    <img src="<?php bloginfo('stylesheet_directory');?>/img/film4.png" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                            </a>
						</div>
						<div class="col-12">	
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
							<h5><span class="categorie <?php if (get_field('categorie') === "film d'actualité" ){ echo "d-none"; } ?>"><?php echo get_field('categorie'); ?></span></h5>
						</div>	
							
					</div>
				</div>
				
                
			</div>

	  <?php 
            }
            
                endwhile; ?>
    
    <?php else : ?>
            
            pas de produit
    
   <?php endif; ?>
 <?php wp_reset_query(); ?>
	
		</div>
        
        
        
	</div>
    
    
    
    <?php 
  
            }                 
          /* endwhile; 

                            else : echo "";
            
                            endif; */
    
    
        $i--;
      }
 
    wp_reset_query();
    
    ?>
    

</div>


<?php



get_footer(); 
//  'shop'