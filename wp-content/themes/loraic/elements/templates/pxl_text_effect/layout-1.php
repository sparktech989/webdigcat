<?php if(!empty($settings['text'])) : ?>
    <div class="pxl-text-effect pxl-text-effect1 <?php echo esc_attr($settings['type'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <?php if( !empty($settings['image']['id']) ) : 
            $image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
            $img  = pxl_get_image_by_size( array(
                'attach_id'  => $settings['image']['id'],
                'thumb_size' => $image_size,
                'class' => 'no-lazyload'
            ) );
            $thumbnail    = $img['thumbnail'];
            $thumbnail_url    = $img['url']; ?>
            <?php if($settings['image_type'] == 'img') : ?>
                <div class="pxl-item--image"><?php echo wp_kses_post($thumbnail); ?></div>
            <?php endif; ?>
            <?php if($settings['image_type'] == 'bg') : ?>
                <div class="pxl-item--image-url bg-image" style="background-image: url(<?php echo esc_url($thumbnail_url); ?>);"></div>
            <?php endif; ?>
        <?php endif; ?>
        <div class="pxl-item--holder wow" data-wow-delay="120ms">
            <div class="pxl-item--text-wrap">
                <div class="pxl-item--text-divider"><div class="pxl-item--divider"></div></div>
                <div class="pxl-item--text">
                    <?php echo pxl_print_html($settings['text']); ?>
                </div>
                <div class="pxl-item--text-height"></div>
            </div>
            <div class="pxl-divide--group">
                <div class="pxl-item--divider pxl-divider--top"></div>
                <div class="pxl-item--divider pxl-divider--right"></div>
                <div class="pxl-item--divider pxl-divider--bottom"></div>
                <div class="pxl-divider--box"><div class="pxl-item--divider pxl-divider--left1"></div></div>
                <div class="pxl-item--divider pxl-divider--left2"></div>
            </div>
        </div>
    </div>
<?php endif; ?>