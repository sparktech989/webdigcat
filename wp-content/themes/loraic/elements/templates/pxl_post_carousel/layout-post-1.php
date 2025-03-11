<?php

$html_id = pxl_get_element_id($settings);
$source    = $widget->get_setting('source_'.$settings['post_type']);
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$post_ids = $widget->get_setting('post_ids', '');
$settings['layout']    = $settings['layout_'.$settings['post_type']];
extract(pxl_get_posts_of_grid('post', [
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
]));

$pxl_animate = $widget->get_setting('pxl_animate', '');
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$col_xxl = $widget->get_setting('col_xxl', '');
if($col_xxl == 'inherit') {
    $col_xxl = $col_xl;
}
$slides_to_scroll = $widget->get_setting('slides_to_scroll', '');

$arrows = $widget->get_setting('arrows','false');  
$pagination = $widget->get_setting('pagination','false');
$pagination_type = $widget->get_setting('pagination_type','bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover');
$autoplay = $widget->get_setting('autoplay');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite');
$speed = $widget->get_setting('speed', '500');

$img_size = $widget->get_setting('img_size');
$show_author = $widget->get_setting('show_author');
$show_date = $widget->get_setting('show_date');
$show_button = $widget->get_setting('show_button');
$button_text = $widget->get_setting('button_text');

$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => '1', 
    'slide_percolumnfill'           => '1', 
    'slide_mode'                    => 'slide', 
    'slides_to_show'                => $col_xl,
    'slides_to_show_xxl'             => $col_xxl,  
    'slides_to_show_lg'             => $col_lg, 
    'slides_to_show_md'             => $col_md, 
    'slides_to_show_sm'             => $col_sm, 
    'slides_to_show_xs'             => $col_xs, 
    'slides_to_scroll'              => $slides_to_scroll,  
    'slides_gutter'                 => 30, 
    'arrow'                         => $arrows,
    'pagination'                    => $pagination,
    'pagination_type'               => $pagination_type,
    'autoplay'                      => $autoplay,
    'pause_on_hover'                => $pause_on_hover,
    'pause_on_interaction'          => 'true',
    'delay'                         => $autoplay_speed,
    'loop'                          => $infinite,
    'speed'                         => $speed
];

$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]); ?>

<?php if (is_array($posts)): ?>
    <div class="pxl-swiper-sliders pxl-post-carousel pxl-post-carousel1 pxl-swiper-boxshadow pxl-blog-style1 <?php echo esc_attr($settings['post_stype_l1']); ?>" <?php if($settings['drap']) : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'loraic'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner">
         
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php
                    $image_size = !empty($img_size) ? $img_size : '700x500';
                    foreach ($posts as $post):
                        $author = get_user_by('id', $post->post_author);  
                        $author_id = get_the_author_meta('ID');
                        $avatar = get_avatar($author_id, 100);
                        $img_id       = get_post_thumbnail_id( $post->ID );
                        $author = get_user_by('id', $post->post_author); ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                                <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                                $img= pxl_get_image_by_size( array(
                                    'attach_id'  => $img_id,
                                    'thumb_size' => $image_size
                                ) );
                                $thumbnail    = $img['thumbnail'];
                                ?>
                                <div class="pxl-item--featured">
                                    <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                                </div>
                            <?php endif; ?> 
                            <div class="pxl-item--meta">
                                <span class="pxl-item--date"><?php $date_formart = get_option('date_format'); echo get_the_date('F,d Y', $post->ID); ?></span>
                                <div class="pxl-item--author">
                                    <?php echo ''.$avatar; ?>
                                    <div class="info-author">
                                        <div class="name"><?php the_author_posts_link(); ?></div>
                                        <?php loraic_get_user_theme(); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="pxl-item--holder">
                                <h5 class="pxl-item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h5>
                                <div class="item--content">
                                    <?php echo wp_trim_words( $post->post_excerpt, 13 , $more = null ); ?>
                                </div>
                                <div class="pxl-item--readmore">
                                    <a class="btn-readmore" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                        <span>
                                            <?php if(!empty($button_text)) {
                                                echo esc_attr($button_text);
                                            } else {
                                                echo esc_html__('Read Article', 'loraic');
                                            } ?>
                                        </span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                          <path d="M6.36152 2.2152L6.36152 3.32262C6.36152 3.38551 6.38887 3.44567 6.43672 3.48805L9.88613 6.48083L2.1875 6.48083C2.12734 6.48083 2.07812 6.53005 2.07812 6.5902L2.07812 7.41051C2.07812 7.47067 2.12734 7.51989 2.1875 7.51989L9.88613 7.51989L6.43672 10.5127C6.38887 10.5537 6.36152 10.6138 6.36152 10.6781L6.36152 11.7855C6.36152 11.8785 6.47227 11.9291 6.54199 11.8675L11.7715 7.32985C11.8188 7.28883 11.8568 7.23812 11.8828 7.18115C11.9088 7.12419 11.9222 7.0623 11.9222 6.99967C11.9222 6.93705 11.9088 6.87516 11.8828 6.81819C11.8568 6.76123 11.8188 6.71052 11.7715 6.6695L6.54199 2.13317C6.4709 2.07165 6.36152 2.12223 6.36152 2.2152Z" fill="#1C3F39"/>
                                      </svg>
                                  </a>
                              </div>
                          </div>
                      </div>
                  </div>
              <?php endforeach; ?>
          </div> 
      </div>
      <?php if($pagination !== 'false'): ?>
        <div class="pxl-swiper-dots style-2"></div>
    <?php endif; ?>
    <?php if($arrows !== 'false'): ?>
        <div class="pxl-swiper-arrow-wrap">
            <div class="pxl-swiper-arrow pxl-swiper-arrow-prev">
                <svg xmlns="http://www.w3.org/2000/svg" width="42" height="10" viewBox="0 0 42 10" fill="none">
                    <path d="M4.64172 9.91998L5.37575 9.18576L1.91533 5.72442H41.9723V4.67554H1.91533L5.37575 1.2142L4.64172 0.47998L0.027832 5.19998" fill="#1C3F39"/>
                </svg>
            </div>
            <div class="pxl-swiper-arrow pxl-swiper-arrow-next">
                <svg xmlns="http://www.w3.org/2000/svg" width="42" height="10" viewBox="0 0 42 10" fill="none">
                    <path d="M37.3584 0.47998L36.6244 1.2142L40.0848 4.67554H0.027832V5.72442H40.0848L36.6244 9.18576L37.3584 9.91998L41.9723 5.19998" fill="#1C3F39"/>
                </svg>
            </div>
        </div>
    <?php endif; ?>  
</div>
</div>
<?php endif; ?>