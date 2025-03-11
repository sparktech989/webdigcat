<?php
/**
 * The template for displaying the content.
 * @package EshopElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<div class="row">
      <?php 
      if ( have_posts() ): 
     	while ( have_posts() ) {
			the_post();
			$post_link = get_permalink();?>
            <div id="post-<?php the_ID(); ?>" <?php post_class( 'esh-el-blog-post' ); ?>><?php
                if ( has_post_thumbnail() ) { ?>
                    <a href="<?php echo esc_url($post_link) ?>">
                        <?php echo ( get_the_post_thumbnail( $post, 'large' ));?>
                    </a><?php
                } ?>
			<article class="esh-el-blog-post-inner">
				<div class="esh-el-blog-category">
  
                  <?php $cat_list = get_the_category_list();
                    if(!empty($cat_list)) {
                        the_category('&nbsp'); 
                    } ?>
                </div>
                <div class="post-meta">
                    <span class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
                    <span class="meta-sep">/</span>
                    <?php comments_popup_link( esc_html__( 'No Comments', 'eshop-elementor' ), esc_html__( '1 Comment', 'eshop-elementor' ), '% '. esc_html__( 'Comments', 'eshop-elementor' ), 'post-comments'); ?>
                </div>
				<h2 class="esh-el-title"><a href="<?php echo esc_url($post_link) ?>"><?php echo wp_kses_post( get_the_title() )?></a></h2>

				<?php the_excerpt(); ?>
			</article>
            <footer class="post-footer">
                <div class="read-more">
                    <a href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'Read More','eshop-elementor' ); ?></a>
                </div>
            </footer>
            </div>
		<?php } ?> 
    <?php else: ?>
        <div class="no-result-found">
				<h3><?php esc_html_e( 'Nothing Found!', 'eshop-elementor' ); ?></h3>
				<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'eshop-elementor' ); ?></p>
				<div class="ashe-widget widget_search">
					<?php get_search_form(); ?>
				</div>
			</div>
		<?php

		endif; // Endif have_posts() ?>
        <div class="esh-el-blog-navigation">
            <p><?php posts_nav_link(); ?></p>
        </div> 
    
</div>