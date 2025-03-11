<div class="pxl-image-box pxl-image-box1 <?php echo esc_attr($settings['pxl_animate']); ?> <?php echo esc_attr($settings['style']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">
        <?php if ( !empty($settings['image']['id']) ) : 
            $image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
            $img  = pxl_get_image_by_size( array(
                'attach_id'  => $settings['image']['id'],
                'thumb_size' => $image_size,
            ) );
            $thumbnail    = $img['thumbnail'];
            $thumbnail_url    = $img['url'];
            ?>

            <?php if($settings['image_type'] == 'img') : ?>
                <div class="pxl-item--image">
                    <?php echo wp_kses_post($thumbnail); ?>
                </div>
            <?php endif; ?>

            <?php if($settings['image_type'] == 'bg') : ?>
                <div class="pxl-item--bg bg-image" style="background-image: url(<?php echo esc_url($thumbnail_url); ?>);"></div>
            <?php endif; ?>

        <?php endif; ?>
        <?php if (!empty($settings['sub_title']) || !empty($settings['title']) ): ?>
        <div class="pxl-item--holder">
            <<?php echo esc_attr($settings['title_tag']); ?> class="pxl-item--title el-empty"><?php echo pxl_print_html($settings['title']); ?></<?php echo esc_attr($settings['title_tag']); ?>>
            <div class="pxl-item--sub-title"><?php echo pxl_print_html($settings['sub_title']); ?></div>
        </div>  
    <?php endif ?>
</div>
</div>