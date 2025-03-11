<div class="pxl-process pxl-process2 <?php echo esc_attr($settings['pxl_animate']); ?> <?php echo esc_attr($settings['style']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">
        <div class="wrap-image">
            <?php if(!empty($settings['img']['id'])) { 
                $img  = pxl_get_image_by_size( array(
                    'attach_id'  => $settings['img']['id'],
                    'thumb_size' => 'full',
                ) );
                $thumbnail    = $img['thumbnail'];
                echo wp_kses_post($thumbnail); 
                ?>
                <?php if(!empty($settings['step'])) : ?>
                    <div class="pxl-item--step">
                        <?php echo esc_attr($settings['step']); ?>
                    </div>
                <?php endif; ?>
            <?php } ?>
        </div>
        <div class="content-right">
            <<?php echo esc_attr($settings['title_tag']); ?> class="pxl-item--title el-empty"><?php echo pxl_print_html($settings['title']); ?></<?php echo esc_attr($settings['title_tag']); ?>>
            <div class="pxl-item--description el-empty"><?php echo pxl_print_html($settings['desc']); ?></div>
        </div>
    </div>
</div>