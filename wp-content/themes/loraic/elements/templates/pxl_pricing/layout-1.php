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
<div class="pxl-pricing pxl-pricing1 <?php echo esc_attr($settings['pxl_animate'].' '.$settings['popular']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">

        <?php if(!empty($settings['title_box'])) : ?>
            <h6 class="pxl-item--title-box el-empty"><?php echo esc_attr($settings['title_box']); ?></h6>
        <?php endif; ?>
        <?php if (!empty($settings['pxl_icon']['value']) ) : ?>
            <div class="pxl-item--icon">
                <?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
            </div>
        <?php endif; ?>

        <?php if(!empty($settings['title'])) : ?>
            <h5 class="pxl-item--title el-empty"><?php echo esc_attr($settings['title']); ?></h5>
        <?php endif; ?>
        <?php if(!empty($settings['description'])) : ?>
            <p class="pxl-item--description el-empty"><span><?php echo esc_attr($settings['description']); ?></span></p>
        <?php endif; ?>

        <div class="pxl-item--price">
            <?php echo pxl_print_html($settings['price']); ?>
        </div>

        <?php if(isset($settings['feature']) && !empty($settings['feature']) && count($settings['feature'])): ?>
        <div class="pxl-item--feature ">
            <?php foreach ($settings['feature'] as $key => $value): ?>
                <div class="<?php echo esc_attr($value['active']); ?> ">
                    <div class="content"><?php echo pxl_print_html($value['feature_text'])?></div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php if(!empty($settings['button_text'])) : ?>
        <div class="pxl-item--button">
            <a class="btn-see" <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?>>
               <i class="flaticon flaticon-calendar"></i><?php echo esc_attr($settings['button_text']); ?>
            </a>
        </div>
    <?php endif; ?>
    <?php if(!empty($settings['bottom_text'])) : ?>
        <div class="bottom-text">
            <p><?php echo pxl_print_html($settings['bottom_text'])?></p>
        </div>
    <?php endif; ?>
</div>
</div>