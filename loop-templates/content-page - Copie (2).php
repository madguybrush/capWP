<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<header style="height: 35%; background-image: url('<?php echo get_the_post_thumbnail_url();  ?>'); "> 


<div class="jumbotron text-center">
<h1><?php the_title();  ?> loooooooooo</h1> 
</div>

</header>


<section id="content">
<div class="container margintop0">
<?php the_content(); ?>
</div>
</section>
    
