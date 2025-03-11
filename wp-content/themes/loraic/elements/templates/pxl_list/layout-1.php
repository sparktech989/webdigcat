<?php if(isset($settings['lists']) && !empty($settings['lists']) && count($settings['lists'])): 
    $is_new = \Elementor\Icons_Manager::is_migration_allowed(); ?>
    <div class="pxl-list pxl-list1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <?php foreach ($settings['lists'] as $key => $value): 
            $icon_key = $widget->get_repeater_setting_key( 'pxl_icon', 'icons', $key );
            $widget->add_render_attribute( $icon_key, [
                'class' => $value['pxl_icon'],
                'aria-hidden' => 'true',
            ] ); ?>
            <div class="pxl--item">
                <?php if ( ! empty( $value['pxl_icon'] ) ) : ?>
                    <div class="pxl-item--icon pxl-mr-8 <?php if($settings['icon_color_type'] == 'gradient') { echo 'pxl-icon--gradient'; } ?>">
                        <?php if ( $is_new ):
                            \Elementor\Icons_Manager::render_icon( $value['pxl_icon'], [ 'aria-hidden' => 'true' ] );
                        elseif(!empty($value['pxl_icon'])): ?>
                            <i class="<?php echo esc_attr( $value['pxl_icon'] ); ?>" aria-hidden="true"></i>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <div class="pxl-item--text el-empty"><?php echo pxl_print_html($value['text'])?></div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>