<?php
/**
 * Related posts based on categories and tags.
 * 
 */
$ecommerce_store_elementor_archive_layout = ecommerce_store_elementor_get_option( 'ecommerce_store_elementor_archive_layout' );
$ecommerce_store_elementor_related_posts_taxonomy = ecommerce_store_elementor_get_option( 'ecommerce_store_elementor_related_posts_taxonomy', 'category' );

$ecommerce_store_elementor_post_args = array(
    'posts_per_page'    => 3,
    'orderby'           => 'rand',
    'post__not_in'      => array( get_the_ID() ),
);

$ecommerce_store_elementor_tax_terms = wp_get_post_terms( get_the_ID(), 'category' );
$ecommerce_store_elementor_terms_ids = array();
foreach( $ecommerce_store_elementor_tax_terms as $tax_term ) {
	$ecommerce_store_elementor_terms_ids[] = $tax_term->term_id;
}

$ecommerce_store_elementor_post_args['category__in'] = $ecommerce_store_elementor_terms_ids;

$ecommerce_store_elementor_related_posts = new WP_Query( $ecommerce_store_elementor_post_args );

if ( $ecommerce_store_elementor_related_posts->have_posts() ) : ?>
    <div class="related-post">
        <h3><?php echo esc_html__('Related Post' ,'ecommerce-store-elementor' );?></h3>
        <div class="row">
            <?php while ( $ecommerce_store_elementor_related_posts->have_posts() ) : $ecommerce_store_elementor_related_posts->the_post(); ?>
                <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                      <div class="blog-img mb-2">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                        <?php endif; ?>
                      </div>
                    <div class="entry-content-wrapper">
                      <?php ecommerce_store_elementor_entry_meta_date(); ?>
                        <header class="entry-header">
                          <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                        </header>
                    </div>
                    <div class="text-content">
                      <?php if ( 'full' === $ecommerce_store_elementor_archive_layout ) : ?>
                        <?php
                        the_content( sprintf(
                          wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'ecommerce-store-elementor' ), array( 'span' => array( 'class' => array() ) ) ),
                          the_title( '<span class="screen-reader-text">"', '"</span>', false )
                        ) );
                        ?>
                        <?php else : ?>
                        <?php the_excerpt(); ?>
                        <?php endif; ?>
                    </div>
                  </article>
              </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif;
wp_reset_postdata();