<div class="pxl-icon-box pxl-icon-box4 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">
        <?php if (!empty($settings['icon_image1']['id']) ) : ?>
            <div class="pxl-item--icon">
                <?php $img_icon  = pxl_get_image_by_size( array(
                    'attach_id'  => $settings['icon_image1']['id'],
                    'thumb_size' => 'full',
                ) );
                $thumbnail_icon    = $img_icon['thumbnail'];
                echo pxl_print_html($thumbnail_icon); ?>
                <div class="pxl-item--step">
                    <div class="step">
                        <?php echo pxl_print_html($settings['step']); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="wrap-content">

            <<?php echo esc_attr($settings['title_tag']); ?> class="pxl-item-title el-empty"><?php echo pxl_print_html($settings['title']); ?></<?php echo esc_attr($settings['title_tag']); ?>>
            <div class="pxl-item--description el-empty"><?php echo pxl_print_html($settings['desc']); ?></div>
        </div>
        
    </div>
</div>