<?php 
if ( ! empty( $settings['btn_link']['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $settings['btn_link']['url'] );

    if ( $settings['btn_link']['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $settings['btn_link']['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
}
if ( ! empty( $settings['btn_link_2']['url'] ) ) {
    $widget->add_render_attribute( 'button2', 'href', $settings['btn_link_2']['url'] );

    if ( $settings['btn_link_2']['is_external'] ) {
        $widget->add_render_attribute( 'button2', 'target', '_blank' );
    }

    if ( $settings['btn_link_2']['nofollow'] ) {
        $widget->add_render_attribute( 'button2', 'rel', 'nofollow' );
    }
}
?>
<div class="pxl-showcase pxl-showcase1 pxl-hover-parallax <?php echo esc_attr($settings['style']); ?> <?php if($settings['active'] == 'yes' && !empty($settings['active_label']) && empty($settings['btn_text'])) { echo 'pxl-wg-active'; } ?>">
    <div class="pxl-item--inner">
        <?php if(!empty($settings['image']['id'])) :
            $img = pxl_get_image_by_size( array(
                'attach_id'  => $settings['image']['id'],
                'thumb_size' => 'full',
            ));
            $thumbnail = $img['thumbnail']; ?>
            <div class="pxl-item--image">
                <?php echo pxl_print_html($thumbnail); ?>
                <div class="pxl-item--right">
                  <?php if(!empty($settings['btn_text'])) : ?>
                    <div class="pxl-item--readmore pxl-item-parallax">
                        <a <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?>>
                            <span><?php echo esc_attr($settings['btn_text']); ?></span>
                        </a>
                    </div>                
                <?php endif; ?>
                <?php if(!empty($settings['btn_text_2'])) : ?>
                    <div class="pxl-item--readmore pxl-item-parallax">
                        <a <?php pxl_print_html($widget->get_render_attribute_string( 'button2' )); ?>>
                            <span><?php echo esc_attr($settings['btn_text_2']); ?></span>
                        </a>
                    </div>                
                <?php endif; ?>  
            </div>
        </div>
    <?php endif; ?>
    <div class="pxl-item--holder">
        <div class="pxl-item--left">
            <?php if(!empty($settings['title'])) : ?>
                <div class="pxl-item--title"><?php echo esc_attr($settings['title']); ?></div>
            <?php endif; ?>
            <?php if(!empty($settings['sub_title'])) : ?>
                <div class="pxl-item--subtitle"><?php echo esc_attr($settings['sub_title']); ?></div>
            <?php endif; ?>
        </div>
        <div class="pxl-item--right">
          <?php if(!empty($settings['btn_text'])) : ?>
            <div class="pxl-item--readmore pxl-item-parallax">
                <a <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?>>
                    <span><?php echo esc_attr($settings['btn_text']); ?></span>
                </a>
            </div>                
        <?php endif; ?>
        <?php if(!empty($settings['btn_text_2'])) : ?>
            <div class="pxl-item--readmore pxl-item-parallax">
                <a <?php pxl_print_html($widget->get_render_attribute_string( 'button2' )); ?>>
                    <span><?php echo esc_attr($settings['btn_text_2']); ?></span>
                </a>
            </div>                
        <?php endif; ?>  
    </div>
</div>
<?php if($settings['active'] == 'yes' && !empty($settings['active_label']) && empty($settings['btn_text'])) : ?>
<div class="pxl-item--label"><?php echo esc_attr($settings['active_label']); ?></div>
<?php endif; ?>
</div>
</div>