<?php
$html_id = pxl_get_element_id($settings);
if(isset($settings['link']) && !empty($settings['link']) && count($settings['link'])): ?>
    <ul id="pxl-link-<?php echo esc_attr($html_id) ?>" class="pxl-link pxl-link-l1 <?php echo esc_attr($settings['pxl_animate'].' '.$settings['style'].' '.$settings['type']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <?php
        foreach ($settings['link'] as $key => $link):
            $icon_key = $widget->get_repeater_setting_key( 'pxl_icon', 'icons', $key );
            $widget->add_render_attribute( $icon_key, [
                'class' => $link['pxl_icon'],
                'aria-hidden' => 'true',
            ] );
            $link_key = $widget->get_repeater_setting_key( 'link', 'value', $key );
            if ( ! empty( $link['link']['url'] ) ) {
                $widget->add_render_attribute( $link_key, 'href', $link['link']['url'] );

                if ( $link['link']['is_external'] ) {
                    $widget->add_render_attribute( $link_key, 'target', '_blank' );
                }

                if ( $link['link']['nofollow'] ) {
                    $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                }
            }
            $link_attributes = $widget->get_render_attribute_string( $link_key );
            $image = isset($link['image']) ? $link['image'] : '';
            ?>
            <li>
                <a class="pxl-type-<?php echo esc_attr($settings['icon_color_type']); ?>" <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                    <?php if(!empty($link['pxl_icon'])){
                        \Elementor\Icons_Manager::render_icon( $link['pxl_icon'], [ 'aria-hidden' => 'true' ], 'i' );
                    }else if(!empty($image['id'])){
                        $img = pxl_get_image_by_size( array(
                            'attach_id'  => $image['id'],
                            'thumb_size' => 'full',
                            'class' => 'no-lazyload',
                        ));
                        $thumbnail = $img['thumbnail'];
                        echo wp_kses_post($thumbnail); 
                    }?>
                    <span><?php echo pxl_print_html($link['text']); ?></span>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
