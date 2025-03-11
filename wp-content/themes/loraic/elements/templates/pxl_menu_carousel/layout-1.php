<?php
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$col_xxl = $widget->get_setting('col_xxl', '');
if ($col_xxl == 'inherit') {
    $col_xxl = $col_xl;
}
$slides_to_scroll = $widget->get_setting('slides_to_scroll', '');
$arrows = $widget->get_setting('arrows', 'false');
$arrows_style = $widget->get_setting('arrows_style', 'style1');
$pagination = $widget->get_setting('pagination', 'false');
$pagination_type = $widget->get_setting('pagination_type', 'bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover');
$autoplay = $widget->get_setting('autoplay', '');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite', 'false');
$speed = $widget->get_setting('speed', '500');

$show_cursor_text = $widget->get_setting('show_cursor_text');
$cursor_text = $widget->get_setting('cursor_text');

$data_cursor_text = '';
if (!empty($cursor_text)) {
    $data_cursor_text = $cursor_text;
} else {
    $data_cursor_text = esc_html__('◄ ►', 'loraic');
}
$opts = [
    'slide_direction'       => 'horizontal',
    'slide_percolumn'       => '1',
    'slide_mode'            => 'slide',
    'slides_to_show'        => $col_xl,
    'slides_to_show_xxl'    => $col_xxl,
    'slides_to_show_lg'     => $col_lg,
    'slides_to_show_md'     => $col_md,
    'slides_to_show_sm'     => $col_sm,
    'slides_to_show_xs'     => $col_xs,
    'slides_to_scroll'      => $slides_to_scroll,
    'arrow'                 => $arrows,
    'pagination'            => $pagination,
    'pagination_type'       => $pagination_type,
    'autoplay'              => $autoplay,
    'pause_on_hover'        => $pause_on_hover,
    'pause_on_interaction'  => 'true',
    'delay'                 => $autoplay_speed,
    'loop'                  => $infinite,
    'speed'                 => $speed
];
$widget->add_render_attribute('carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
$html_id = pxl_get_element_id($settings);
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
$tab_bd_ids = [];

if (isset($settings['tabs']) && !empty($settings['tabs']) && count($settings['tabs'])) :
    ?>
<div class="pxl-swiper-sliders pxl-menu-carousel pxl-menu-carousel1 pxl-swiper-arrow-show <?php if ($arrows == 'true') {
    echo esc_attr__('pxl-show-arrow', 'loraic');
} ?>" data-view-auto="<?php echo esc_attr($col_xl); ?>">
<div class="pxl-carousel-inner">
    <div <?php pxl_print_html($widget->get_render_attribute_string('carousel')); ?>>
        <div class="pxl-swiper-wrapper" <?php if ($show_cursor_text == 'true') {
            echo 'data-cursor-text="' . esc_attr($data_cursor_text) . '"';
        } ?>>
        <?php foreach ($settings['tabs'] as $key => $content) : ?>
            <div class="pxl-swiper-slide <?php if ($show_cursor_text == 'true') {
                echo 'pxl-no-cursor';
            } ?>">
            <div class="pxl-item--inner pxl-transtion <?php if ($show_cursor_text == 'true') {
                echo 'pxl-no-cursor';
            } ?> <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
            <div id="<?php echo esc_attr($html_id.'-'.$content['_id']); ?>" class="pxl-item--content ">
                <?php if(!empty($content['content_template'])) {
                    $tab_content = Elementor\Plugin::$instance->frontend->get_builder_content_for_display( (int)$content['content_template']);
                    $tab_bd_ids[] = (int)$content['content_template'];
                    pxl_print_html($tab_content);
                } ?>
            </div>
        </div>
    </div>

<?php endforeach; ?>
</div>
</div>
<?php if ($pagination !== 'false') : ?>
    <div class="pxl-swiper-dots"></div>
<?php endif; ?>
<?php if ($arrows == 'true') : ?>
    <div class="wp-arrow" data-cursor="-hidden">
        <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="flaticon flaticon-arrow-4"></i></div>
        <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="flaticon flaticon-arrow-4" style="transform: scalex(-1);"></i></div>
    </div>
<?php endif; ?>
</div>
</div>
<?php endif; ?>
