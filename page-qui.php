<?php
/**
 * The template for displaying all pages.
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

//$container   = get_theme_mod( 'understrap_container_type' );

?>


			<!-- Do the left sidebar check -->
			<?php //get_template_part( 'global-templates/left-sidebar-check' ); ?>


				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'page-qui' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					//if ( comments_open() || get_comments_number() ) :
					//	comments_template();
					//endif;
					?>

				<?php endwhile; // end of the loop. ?>


		<!-- Do the right sidebar check -->
		<?php if ( !is_cart() && !is_front_page()) : ?>
            <?php //get_template_part( 'global-templates/right-sidebar-check' ); ?>
<?php endif; ?>
            


<?php get_footer(); ?>
