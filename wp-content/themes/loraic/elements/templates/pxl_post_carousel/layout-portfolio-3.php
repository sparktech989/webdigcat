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
extract(pxl_get_posts_of_grid('portfolio', [
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
$show_excerpt = $widget->get_setting('show_excerpt');
$img_size = $widget->get_setting('img_size');
$num_words = $widget->get_setting('num_words');
$button_text = $widget->get_setting('button_text');
$img_sizes = $widget->get_setting('img_sizes');
$arrows = $widget->get_setting('arrows','false');
$pagination = $widget->get_setting('pagination','false');
$pagination_type = $widget->get_setting('pagination_type','bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover');
$autoplay = $widget->get_setting('autoplay');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite');
$speed = $widget->get_setting('speed', '500');

$show_button = $widget->get_setting('show_button');

$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => '1', 
    'slide_percolumnfill'           => '1', 
    'slide_mode'                    => 'slide', 
    'slides_to_show'                => $col_xl,
    'slides_to_show_xxl'            => $col_xxl,  
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
    <div class="pxl-swiper-sliders pxl-post-carousel pxl-portfolio-carousel pxl-portfolio-carousel3 " <?php if($settings['drap']) : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'loraic'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php
                    $count_pos = 1;
                    foreach ($posts as $key => $post):
                        $image_size = !empty($img_size) ? $img_size : 'full';
                        $count = 0; 
                        if(isset($img_sizes) && !empty($img_sizes[$key]) && (count($img_sizes) > 1)) {
                            $img_size_item = $img_sizes[$key]['img_size_item'];
                            if(!empty($img_size_item)) {
                                $image_size = $img_size_item;
                            }
                        }
                        $img_id       = get_post_thumbnail_id( $post->ID ); 
                        $img = pxl_get_image_by_size( array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $image_size,
                            'class' => 'no-lazyload',
                        ));
                        $thumbnail = $img['thumbnail'];
                        
                        if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                            <div class="pxl-swiper-slide">
                                <h5 class="pxl-item-title">
                                    <span><?php echo esc_attr(get_the_title($post->ID)); ?></span>
                                    <span class="arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="52" height="53" viewBox="0 0 52 53" fill="none">
                                            <path d="M50.7072 1.70314L1.59415 51.005" stroke="#FF7D44" stroke-width="2.5"/>
                                            <path d="M51.502 50.9999H1.50195V2.49988" stroke="#FF7D44" stroke-width="2.5"/>
                                        </svg>
                                    </span>
                                </h5> 
                                <div class="wrap-inner">  
                                    <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>">
                                        <div class="pxl-item--holder">
                                            <div class="pxl-item--categorie">
                                                <?php the_terms( $post->ID, 'portfolio-category', '', ' ' ); ?>
                                            </div>
                                            <h6 class="pxl-item--title">
                                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>" title="<?php echo esc_attr(get_the_title($post->ID)); ?>">
                                                    <?php echo esc_attr(get_the_title($post->ID)); ?>
                                                </a>
                                            </h6>
                                            <div class="pxl-item--content pxl-excerpt-line">
                                                <?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
                                            </div>
                                            <?php if($show_button == 'true') : ?>
                                                <div class="pxl-item--readmore">
                                                    <a class="btn-white" href="<?php if(!empty($case_external_link)) { echo esc_url($case_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                                        <?php if(!empty($button_text)) {
                                                            echo esc_attr($button_text);
                                                        } else {
                                                            echo esc_html__('Learn Details', 'loraic');
                                                        } ?>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="pxl-item--featured">
                                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>" title="<?php echo esc_attr(get_the_title($post->ID)); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                                            <span class="count">
                                                <?php echo '0'.$count_pos++; ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div> 
            </div>
            
            <?php if($arrows !== 'false'): ?>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="caseicon-angle-arrow-right"></i></div>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="caseicon-angle-arrow-left"></i></div>
            <?php endif; ?>
            <?php if($pagination !== 'false'): ?>
                <div class="pxl-swiper-pagination">
                    <div class="pxl-swiper-dots style-2"></div>
                </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>