<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package EshopElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); 
?>
<!--==================== page section ====================-->
 <main id="content" class="page-section main-section">
      <!--row--> 
    
      	<!-- Blog Area -->
		 
			<?php if( have_posts()) :  the_post(); ?>		
			<?php the_content(); ?>
			<?php endif; 
			while ( have_posts() ) : the_post();
			// Include the page
			the_content();
			comments_template( '', true ); // show comments
			wp_link_pages(array(
    		'before' => '<div class="link btn-theme">' . esc_html__('Pages:', 'eshop-elementor'),
    		'after' => '</div>',
				 ));
			endwhile;
			?>
</main>
<?php
get_footer();