<div class="pxl-icon-box pxl-icon-box12 <?php echo esc_attr($settings['style'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <?php if (!empty($settings['icon_image_4']['id']) ) : ?>
        <?php $img_icon4  = pxl_get_image_by_size( array(
            'attach_id'  => $settings['icon_image_4']['id'],
            'thumb_size' => 'full',
        ) );
        $thumbnail_icon4    = $img_icon4['url'];
    endif; ?>
    <div class="bg-hover" style="background-image:url(<?php echo esc_attr($thumbnail_icon4); ?>);"></div>
    <div class="pxl-item--inner">
        <div class="pxl-item--icon ">

            <?php if (!empty($settings['icon_image_2']['id']) ) : ?>
                <?php $img_icon  = pxl_get_image_by_size( array(
                    'attach_id'  => $settings['icon_image_2']['id'],
                    'thumb_size' => 'full',
                ) );
                $thumbnail_icon    = $img_icon['thumbnail'];
                echo pxl_print_html($thumbnail_icon); ?>
            <?php endif; ?>

            <?php if (!empty($settings['icon_image_3']['id']) ) : ?>
                <?php $img_icon2  = pxl_get_image_by_size( array(
                    'attach_id'  => $settings['icon_image_3']['id'],
                    'thumb_size' => 'full',
                ) );
                $thumbnail_icon2    = $img_icon2['thumbnail'];
                echo pxl_print_html($thumbnail_icon2); ?>
            <?php endif; ?>


        </div>

        <<?php echo esc_attr($settings['title_tag']); ?> class="pxl-item-title el-empty">

        <?php if ( ! empty( $settings['item_link']['url'] ) ) {
            $widget->add_render_attribute( 'item_link', 'href', $settings['item_link']['url'] );

            if ( $settings['item_link']['is_external'] ) {
                $widget->add_render_attribute( 'item_link', 'target', '_blank' );
            }

            if ( $settings['item_link']['nofollow'] ) {
                $widget->add_render_attribute( 'item_link', 'rel', 'nofollow' );
            } ?>
            <a <?php pxl_print_html($widget->get_render_attribute_string( 'item_link' )); ?>><?php echo pxl_print_html($settings['title']); ?></a>
        <?php } ?>
        </<?php echo esc_attr($settings['title_tag']); ?>>

        <?php if ( ! empty( $settings['item_link']['url'] ) ) { ?>
            <a class="button-more" <?php pxl_print_html($widget->get_render_attribute_string( 'item_link' )); ?>>
                <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none">
                        <path d="M11.7934 20.8716L10.3469 19.4505L16.0312 13.7661H3.67285V11.736H16.0312L10.3469 6.05164L11.7934 4.63055L19.9139 12.7511L11.7934 20.8716Z" fill="white"/>
                    </svg>
                </span>
                <span class="text"><?php echo pxl_print_html($settings['btb_text']); ?></span>
            </a>
        <?php } ?>
    </div>
</div>
