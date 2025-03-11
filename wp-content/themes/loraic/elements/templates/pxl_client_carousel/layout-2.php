<?php
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
$autoplay = $widget->get_setting('autoplay', '');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite','false');  
$speed = $widget->get_setting('speed', '500');
$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => '1', 
    'slide_mode'                    => 'slide', 
    'slides_to_show'                => $col_xl, 
    'slides_to_show_xxl'             => $col_xxl, 
    'slides_to_show_lg'             => $col_lg, 
    'slides_to_show_md'             => $col_md, 
    'slides_to_show_sm'             => $col_sm, 
    'slides_to_show_xs'             => $col_xs, 
    'slides_to_scroll'              => $slides_to_scroll,
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
]);
if(isset($settings['client2']) && !empty($settings['client2']) && count($settings['client2'])): ?>
    <div class="pxl-swiper-slider pxl-client-carousel pxl-client-carousel2 pxl-swiper-arrow-show <?php echo esc_attr($settings['style']); ?>" data-arrow="<?php echo esc_attr($arrows); ?>">
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['client2'] as $key => $value):
                        $title = isset($value['title']) ? $value['title'] : '';
                        $logo3 = isset($value['logo3']) ? $value['logo3'] : '';
                        $logo2 = isset($value['logo2']) ? $value['logo2'] : '';
                        $star = isset($value['star']) ? $value['star'] : ''; 
                        $link_key = $widget->get_repeater_setting_key( 'btn_link2', 'value', $key );
                        if ( ! empty( $value['btn_link2']['url'] ) ) {
                            $widget->add_render_attribute( $link_key, 'href', $value['btn_link2']['url'] );

                            if ( $value['btn_link2']['is_external'] ) {
                                $widget->add_render_attribute( $link_key, 'target', '_blank' );
                            }

                            if ( $value['btn_link2']['nofollow'] ) {
                                $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                            }
                        }
                        $link_attributes = $widget->get_render_attribute_string( $link_key );
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                                <a <?php echo implode( ' ', [ $link_attributes ] ); ?>>

                                	<?php if(!empty($logo2['id'])) { 
                                        $img_logo2 = pxl_get_image_by_size( array(
                                            'attach_id'  => $logo2['id'],
                                            'thumb_size' => 'full',
                                            'class' => 'no-lazyload',
                                        ));
                                        $thumbnail_logo2 = $img_logo2['thumbnail'];
                                        echo wp_kses_post($thumbnail_logo2); 
                                        ?>
                                    <?php } ?>
                                	
                                    <?php if(!empty($logo3['id'])) { 
                                        $img_logo3 = pxl_get_image_by_size( array(
                                            'attach_id'  => $logo3['id'],
                                            'thumb_size' => 'full',
                                            'class' => 'no-lazyload',
                                        ));
                                        $thumbnail_logo3 = $img_logo3['thumbnail'];
                                        echo wp_kses_post($thumbnail_logo3); 
                                        ?>
                                    <?php } ?>
                                    
                                    
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php if($arrows !== 'false'): ?>
            <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="caseicon-angle-arrow-right rtl-icon"></i></div>
            <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="caseicon-angle-arrow-left rtl-icon"></i></div>
        <?php endif; ?>
        <?php if($pagination !== 'false'): ?>
            <div class="pxl-swiper-dots"></div>
        <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
