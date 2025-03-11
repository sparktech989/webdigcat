<div class="pxl-icon-box pxl-icon-box10 <?php echo esc_attr($settings['style'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">
        <?php if ( $settings['icon_type'] == 'icon' && !empty($settings['pxl_icon']['value']) ) : ?>
            <div class="wrap-icon">
                <div class="pxl-item--icon">
                    <?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if ( $settings['icon_type'] == 'image' && !empty($settings['icon_image']['id']) ) : ?>
            <div class="wrap-icon">
                <div class="pxl-item--icon ">
                    <?php $img_icon  = pxl_get_image_by_size( array(
                        'attach_id'  => $settings['icon_image']['id'],
                        'thumb_size' => 'full',
                    ) );
                    $thumbnail_icon    = $img_icon['thumbnail'];
                    echo pxl_print_html($thumbnail_icon); ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="content-right">
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
            <div class="pxl-item--description">
                <?php echo pxl_print_html($settings['desc']); ?>
            </div>
            <a class="more" <?php pxl_print_html($widget->get_render_attribute_string( 'item_link' )); ?>>
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                  <rect y="11" width="25" height="3" fill="#07847F"/>
                  <rect x="14" width="25" height="3" transform="rotate(90 14 0)" fill="#07847F"/>
              </svg></a>
          </div>
      </div>
  </div> 