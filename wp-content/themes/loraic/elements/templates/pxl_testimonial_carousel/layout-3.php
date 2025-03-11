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
$drap = $widget->get_setting('drap','false');  
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
    'speed'                         => $speed,
];
$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
if(isset($settings['testimonial']) && !empty($settings['testimonial']) && count($settings['testimonial'])): ?>

    <div class="pxl-swiper-sliders pxl-testimonial-carousel pxl-testimonial-carousel3 " <?php if($drap !== 'false') : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'loraic'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['testimonial'] as $key => $value):
                        $title = isset($value['title']) ? $value['title'] : '';
                        $position = isset($value['position']) ? $value['position'] : '';
                        $desc = isset($value['desc']) ? $value['desc'] : '';
                        $image = isset($value['image']) ? $value['image'] : '';
                        $star = isset($value['star']) ? $value['star'] : '';
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>">
                                <div class="quote">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="71" height="60" viewBox="0 0 71 60" fill="none">
                                      <path d="M32.7692 8.18182V38.1818C32.7692 41.1364 32.1932 43.956 31.0412 46.6406C29.8891 49.3253 28.3317 51.6477 26.369 53.608C24.4062 55.5682 22.0808 57.1236 19.3927 58.2741C16.7046 59.4247 13.8814 60 10.9231 60H8.19231C7.45272 60 6.8127 59.7301 6.27224 59.1903C5.73177 58.6506 5.46154 58.0114 5.46154 57.2727V51.8182C5.46154 51.0795 5.73177 50.4403 6.27224 49.9006C6.8127 49.3608 7.45272 49.0909 8.19231 49.0909H10.9231C13.9383 49.0909 16.5126 48.0256 18.646 45.8949C20.7794 43.7642 21.8462 41.1932 21.8462 38.1818V36.8182C21.8462 35.6818 21.4479 34.7159 20.6514 33.9205C19.855 33.125 18.8878 32.7273 17.75 32.7273H8.19231C5.91667 32.7273 3.98237 31.9318 2.38942 30.3409C0.796474 28.75 0 26.8182 0 24.5455V8.18182C0 5.90909 0.796474 3.97727 2.38942 2.38636C3.98237 0.795455 5.91667 0 8.19231 0H24.5769C26.8526 0 28.7869 0.795455 30.3798 2.38636C31.9728 3.97727 32.7692 5.90909 32.7692 8.18182ZM71 8.18182V38.1818C71 41.1364 70.424 43.956 69.2719 46.6406C68.1199 49.3253 66.5625 51.6477 64.5998 53.608C62.637 55.5682 60.3116 57.1236 57.6235 58.2741C54.9354 59.4247 52.1122 60 49.1538 60H46.4231C45.6835 60 45.0435 59.7301 44.503 59.1903C43.9625 58.6506 43.6923 58.0114 43.6923 57.2727V51.8182C43.6923 51.0795 43.9625 50.4403 44.503 49.9006C45.0435 49.3608 45.6835 49.0909 46.4231 49.0909H49.1538C52.1691 49.0909 54.7434 48.0256 56.8768 45.8949C59.0102 43.7642 60.0769 41.1932 60.0769 38.1818V36.8182C60.0769 35.6818 59.6787 34.7159 58.8822 33.9205C58.0857 33.125 57.1186 32.7273 55.9808 32.7273H46.4231C44.1474 32.7273 42.2131 31.9318 40.6202 30.3409C39.0272 28.75 38.2308 26.8182 38.2308 24.5455V8.18182C38.2308 5.90909 39.0272 3.97727 40.6202 2.38636C42.2131 0.795455 44.1474 0 46.4231 0H62.8077C65.0833 0 67.0176 0.795455 68.6106 2.38636C70.2035 3.97727 71 5.90909 71 8.18182Z" fill="#FF7D44"/>
                                  </svg>
                              </div>
                              <?php if(!empty($image['id'])) { 
                                $img = pxl_get_image_by_size( array(
                                    'attach_id'  => $image['id'],
                                    'thumb_size' => '300x300',
                                    'class' => 'no-lazyload',
                                ));
                                $thumbnail = $img['thumbnail'];?>
                                <div class="pxl-item--image">
                                    <?php echo wp_kses_post($thumbnail); ?>
                                </div>
                            <?php } ?>
                            <div class="pxl-item--desc el-empty"><?php echo pxl_print_html($desc); ?></div>
                            <div class="pxl-item--meta">
                                <div class="content-left">
                                    <span class="rating"><?php echo esc_html__('Rating: ','loraic') ?></span>
                                    <div class="pxl-item--star pxl-item--<?php echo esc_attr($star); ?>-star">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <div class="content-right">
                                    <h4 class="pxl-item--title el-empty"><?php echo pxl_print_html($title); ?></h4>
                                    <div class="pxl-item--position el-empty"><?php echo pxl_print_html($position); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php if($pagination !== 'false'): ?>
        <div class="pxl-swiper-pagination">
            <div class="pxl-swiper-dots style-2"></div>
        </div>
    <?php endif; ?>
    <?php if($arrows !== 'false'): ?>
        <div class="pxl-swiper-arrow-wrap style-2">
            <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><?php echo esc_html__('Prev','loraic') ?><svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33" fill="none">
  <path d="M9.70825 7.82289L1.03125 16.4998L9.70825 25.1768L11.1666 23.7183L4.97926 17.531L31.9195 17.531L31.9195 15.4685L4.97945 15.4685L11.1666 9.28133L9.70825 7.82289Z" fill="white"/>
</svg></div>
            <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33" fill="none">
  <path d="M23.2917 7.82289L31.9688 16.4998L23.2917 25.1768L21.8334 23.7183L28.0207 17.531L1.08049 17.531L1.08049 15.4685L28.0205 15.4685L21.8334 9.28133L23.2917 7.82289Z" fill="white"/>
</svg><?php echo esc_html__('Next','loraic') ?></div>
        </div>
    <?php endif; ?>
</div>
<?php endif; ?>
