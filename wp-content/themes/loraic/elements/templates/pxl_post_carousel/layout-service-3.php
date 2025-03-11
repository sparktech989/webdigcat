<?php
$html_id = pxl_get_element_id($settings);
$select_post_by = $widget->get_setting('select_post_by', '');
$source = $post_ids = [];
if($select_post_by === 'post_selected'){
    $post_ids = $widget->get_setting('source_'.$settings['post_type'].'_post_ids', '');
}else{
    $source  = $widget->get_setting('source_'.$settings['post_type'], '');
}
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$settings['layout']    = $settings['layout_'.$settings['post_type']];
extract(pxl_get_posts_of_grid('service', [
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
$center = $widget->get_setting('center', 'false');
$drap = $widget->get_setting('drap','false');

$img_size = $widget->get_setting('img_size');
$show_excerpt = $widget->get_setting('show_excerpt');
$num_words = $widget->get_setting('num_words');
$show_button = $widget->get_setting('show_button');
$button_text = $widget->get_setting('button_text');
$title_line_break = $widget->get_setting('title_line_break');

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
    'speed'                         => $speed,
    'center'                         => $center,
];

$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]); ?>

<?php if (is_array($posts)): ?>
    <div class="pxl-swiper-sliders pxl-post-carousel pxl-service-carousel pxl-service-carousel3 pxl-service-style3 pxl-content-effect" <?php if($drap !== 'false') : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'loraic'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php
                    $image_size = !empty($img_size) ? $img_size : '454x600';
                    foreach ($posts as $post):
                        $service_excerpt = get_post_meta($post->ID, 'service_excerpt', true);
                        $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
                        $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
                        $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
                        $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
                        if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                            $img_id       = get_post_thumbnail_id( $post->ID );
                        $img          = loraic_get_image_by_size( array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $image_size
                        ) );
                        $thumbnail    = $img['thumbnail'];
                        $thumbnail_url = $img['url']; 
                        $post_title = get_the_title($post->ID); ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>">
                                <div class="pxl-item--featured">
                                    <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                        <?php echo wp_kses_post($thumbnail); ?>
                                        <?php if($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                                            <div class="pxl-item--icon pxl-icon-middle">
                                                <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                                            </div>
                                        <?php endif; ?>
                                        <?php if($service_icon_type == 'image' && !empty($service_icon_img)) : 
                                            $icon_img = pxl_get_image_by_size( array(
                                                'attach_id'  => $service_icon_img['id'],
                                                'thumb_size' => 'full',
                                            ));
                                            $icon_thumbnail = $icon_img['thumbnail'];
                                            ?>
                                            <div class="pxl-icon">
                                                <?php echo wp_kses_post($icon_thumbnail); ?>
                                            </div>
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <div class="wrap-inner">
                                    <h5 class="pxl-item--title">
                                        <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
                                    </h5>
                                    <div class="pxl-item--readmore">
                                        <a class="btn-readmore" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                            <span>
                                                <?php if(!empty($button_text)) {
                                                    echo esc_attr($button_text);
                                                } else {
                                                    echo esc_html__('Find Out More', 'loraic');
                                                } ?>
                                            </span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                <path d="M8.1791 2.84763L8.1791 4.27146C8.1791 4.35232 8.21426 4.42966 8.27578 4.48415L12.7107 8.332L2.8125 8.332C2.73516 8.332 2.67187 8.39528 2.67187 8.47263L2.67187 9.52732C2.67187 9.60466 2.73516 9.66794 2.8125 9.66794L12.7107 9.66794L8.27578 13.5158C8.21426 13.5685 8.1791 13.6459 8.1791 13.7285L8.1791 15.1523C8.1791 15.2718 8.32149 15.3369 8.41113 15.2578L15.1348 9.4236C15.1956 9.37087 15.2444 9.30567 15.2778 9.23243C15.3113 9.15918 15.3286 9.07961 15.3286 8.99909C15.3286 8.91858 15.3113 8.839 15.2778 8.76576C15.2444 8.69252 15.1956 8.62732 15.1348 8.57458L8.41113 2.74216C8.31973 2.66306 8.1791 2.7281 8.1791 2.84763Z" fill="white"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    <?php endif; ?>   
                <?php endforeach; ?>
            </div> 
        </div>
        <?php if($pagination !== 'false'): ?>
            <div class="pxl-swiper-dots style-2"></div>
        <?php endif; ?>

        <?php if($arrows !== 'false'): ?>
            <div class="pxl-swiper-arrow-wrap">
                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" width="7" height="10" viewBox="0 0 7 10" fill="none">
                      <path d="M5.9875 10L6.875 9.1125L2.7625 5L6.875 0.8875L5.9875 0L0.9875 5L5.9875 10Z" fill="#07847F"/>
                  </svg>
              </div>
              <div class="pxl-swiper-arrow pxl-swiper-arrow-next">
                <svg xmlns="http://www.w3.org/2000/svg" width="7" height="10" viewBox="0 0 7 10" fill="none">
                  <path d="M1.0125 10L0.125 9.1125L4.2375 5L0.125 0.8875L1.0125 0L6.0125 5L1.0125 10Z" fill="#07847F"/>
              </svg>
          </div>
      </div>
  <?php endif; ?>  
    </div>
</div>
<?php endif; ?>