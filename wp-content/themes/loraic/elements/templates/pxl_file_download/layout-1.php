<?php
$html_id = pxl_get_element_id($settings);
if(isset($settings['download']) && !empty($settings['download']) && count($settings['download'])): ?>
    <div id="pxl-download-<?php echo esc_attr($html_id) ?>" class="pxl-download pxl-download-layout1 <?php echo esc_attr($settings['style'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <?php
            foreach ($settings['download'] as $key => $value):
                $sub_title = isset($value['sub_title']) ? $value['sub_title'] : '';
                $title = isset($value['title']) ? $value['title'] : '';
                $pxl_icon = isset($value['pxl_icon']) ? $value['pxl_icon'] : '';

                $value_key = $widget->get_repeater_setting_key( 'link', 'value', $key );
                if ( ! empty( $value['link']['url'] ) ) {
                    $widget->add_render_attribute( $value_key, 'href', $value['link']['url'] );

                    if ( $value['link']['is_external'] ) {
                        $widget->add_render_attribute( $value_key, 'target', '_blank' );
                    }

                    if ( $value['link']['nofollow'] ) {
                        $widget->add_render_attribute( $value_key, 'rel', 'nofollow' );
                    }
                }
                $value_attributes = $widget->get_render_attribute_string( $value_key );
                ?>
                <div class="pxl--item pxl-pr-60">
                    <?php if ( !empty($pxl_icon['value']) ) : ?>
                        <div class="pxl-item--iconfile pxl-mr-14">
                            <?php \Elementor\Icons_Manager::render_icon( $pxl_icon, [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                        </div>
                    <?php endif; ?>
                    <div class="pxl-item--meta">
                        <div class="pxl-item--subtitle el-empty"><?php echo esc_attr($sub_title); ?></div>
                        <h5 class="pxl-item--title el-empty"><a class="pxl-item--link pxl-r-0" <?php echo implode( ' ', [ $value_attributes ] ); ?>><?php echo esc_attr($title); ?> </a></h5>
                    </div>
                </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
