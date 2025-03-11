<?php
if ( ! empty( $settings['button_link']['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $settings['button_link']['url'] );

    if ( $settings['button_link']['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $settings['button_link']['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
}
?>
<div class="pxl-pricing pxl-pricing2 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--holder">
        <h5 class="pxl-item--title el-empty"><span><?php echo esc_attr($settings['title']); ?></span></h5>
        <div class="pxl-item--meta">
            <div class="pxl-item--currency"><?php echo pxl_print_html($settings['currency']); ?></div>
            <div class="pxl-item--price">
                <?php echo pxl_print_html($settings['price']); ?>
            </div>
            <div class="pxl-item--time el-empty"><?php echo pxl_print_html($settings['time']); ?></div>
        </div>
        <div class="pxl-item--description el-empty"><?php echo pxl_print_html($settings['description']); ?></div>
        <?php if(!empty($settings['button_text'])) : ?>
            <div class="pxl-item--button">
                <a class="btn btn-gradient btn-flex" <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?>>
                    <span><?php echo esc_attr($settings['button_text']); ?></span>
                </a>
            </div>
        <?php endif; ?>
    </div>
    <div class="pxl-item--bottom_text el-empty"><?php echo pxl_print_html($settings['bottom_text']); ?></div>
</div>