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

$img_size = $widget->get_setting('img_size');
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
    <div class="pxl-swiper-sliders pxl-post-carousel pxl-portfolio-carousel pxl-portfolio-carousel1 pxl-portfolio-style1" <?php if($settings['drap']) : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'loraic'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner">
            <?php if (($pagination !== 'false') || ($arrows !== 'false')): ?>
            <div class="wrap-nav-postcarousel container">
                <div class="row">
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
        <?php endif ?>
        <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
            <div class="pxl-swiper-wrapper">
                <?php
                foreach ($posts as $key => $post):
                    $image_size = !empty($img_size) ? $img_size : 'full';
                    if(isset($img_sizes) && !empty($img_sizes[$key]) && (count($img_sizes) > 1)) {
                        $img_size_item = $img_sizes[$key]['img_size_item'];
                        if(!empty($img_size_item)) {
                            $image_size = $img_size_item;
                        }
                    }
                    $img_id       = get_post_thumbnail_id( $post->ID ); 
                    if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                        <div class="pxl-swiper-slide pxl--widget-hover">
                            <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                            $img          = pxl_get_image_by_size( array(
                                'attach_id'  => $img_id,
                                'thumb_size' => $image_size
                            ) );
                            $thumbnail    = $img['thumbnail'];
                            $thumbnail_url    = $img['url'];
                            ?>
                        <?php endif; ?>
                        <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" style='background-image: url( <?php echo esc_attr($thumbnail_url); ?> );'>

                            <div class="pxl-item--holder">
                                <div class="pxl-item--category">
                                    <?php the_terms( $post->ID, 'portfolio-category', '', ' ' ); ?>
                                </div>
                                <h5 class="pxl-item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h5>
                            </div>
                            <?php if($show_button == 'true'): ?>
                                <div class="pxl-item--button ">
                                    <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><i class="flaticon flaticon-arrow-2"></i></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div> 
    </div>
</div>
<?php endif; ?>