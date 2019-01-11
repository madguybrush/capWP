<?php
/**
 * Understrap enqueue scripts
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'understrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function understrap_scripts() {
		// Get the theme data.
		$the_theme = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );
		
		$css_version = $theme_version . '.' . filemtime(get_template_directory() . '/css/theme.min.css');
	//	wp_enqueue_style( 'understrap-styles', get_stylesheet_directory_uri() . '/css/theme.min.css', array(), $css_version );
        
            wp_enqueue_style( 'capricci-normalizeCss', get_template_directory_uri() . '/css/normalize.css',false,null,'all');
            wp_enqueue_style( 'capricci-fontawesome', get_template_directory_uri() . '/css/fontawesome-all.css',false,null,'all');
         wp_enqueue_style( 'capricci-lora', 'https://fonts.googleapis.com/css?family=Lora',false,null,'all');
  
    wp_enqueue_style( 'capricci-animateCss', get_template_directory_uri() . '/css/animate.css',false,null,'all');
    wp_enqueue_style( 'capricci-bootstrapCss', get_template_directory_uri() . '/css/bootstrap.min.css',false,null,'all');
    wp_enqueue_style( 'capricci-fullpageCss', get_template_directory_uri() . '/css/fullpage.css',false,null,'all');
           
        if (is_product()) {    wp_enqueue_style( 'capricci-produitCss', get_template_directory_uri() . '/css/produit.css',false,null,'all'); }
        if (is_product_tag()) { wp_enqueue_style( 'capricci-categorieCss', get_template_directory_uri() . '/css/categorie.css',false,null,'all'); }
        if (is_product_category()) { wp_enqueue_style( 'capricci-boutiqueCss', get_template_directory_uri() . '/css/boutique.css',false,null,'all'); }
	wp_enqueue_style( 'capricci-style', get_stylesheet_uri() );
        

	//	wp_enqueue_script( 'jquery');
		
		//$js_version = $theme_version . '.' . filemtime(get_template_directory() . '/js/theme.min.js');
	//	wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true );
         
             wp_enqueue_script( 'capricci-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), null, true );   
    //  wp_enqueue_script( 'capricci-jqueryfullpage', get_template_directory_uri() . '/js/jquery.fullPage.js', array(), null, true );   
              wp_enqueue_script( 'capricci-fullpage', get_template_directory_uri() . '/js/fullpage.js', array(), null, true ); 
          wp_enqueue_script( 'capricci-imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), null, true ); 
          wp_enqueue_script( 'capricci-isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array(), null, true ); 
wp_enqueue_script( 'capricci-script', get_template_directory_uri() . '/js/script.js', array(), null, true ); 
         wp_enqueue_script( 'capricci-jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), null, true ); 
        
        
		//if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		//	wp_enqueue_script( 'comment-reply' );
		//}
	}
} // endif function_exists( 'understrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'understrap_scripts' );