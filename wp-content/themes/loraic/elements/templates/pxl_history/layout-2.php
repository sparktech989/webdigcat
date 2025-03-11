<div class="pxl-history">
    <?php if(isset($settings['history_2']) && !empty($settings['history_2']) && count($settings['history_2'])): ?>
    <?php $is_new = \Elementor\Icons_Manager::is_migration_allowed(); ?>
    <div class="pxl-history-2" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <?php
        foreach ($settings['history_2'] as $key => $history): ?>
            <?php
            $image = isset($history['image']) ? $history['image'] : '';
            $item_cls = [ 'elementor-repeater-item-'.$history['_id'] ]; 
            $item_at = [ 'elementor-repeater-item-'.$history['_id'] ]; 
            $icon_key = $widget->get_repeater_setting_key( 'pxl_icon', 'icons', $key );
            $widget->add_render_attribute( $icon_key, [
                'class' => $history['pxl_icon'],
                'aria-hidden' => 'true',
            ] );
            ?>
            <div class="wrap-content">
                <div class="icon">
                    <?php if ( ! empty( $history['pxl_icon'] ) ) : ?>
                        <?php if ( $is_new ):
                            \Elementor\Icons_Manager::render_icon( $history['pxl_icon'], [ 'aria-hidden' => 'true' ] );
                            elseif(!empty($history['pxl_icon'])): ?>
                                <i class="<?php echo esc_attr( $history['pxl_icon'] ); ?>" aria-hidden="true"></i>
                            <?php endif; ?>
                            <?php if(!empty($label)) : ?>
                                <span><?php echo esc_attr($label); ?></span>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <div class="box-1">
                        <div class="title"><?php echo pxl_print_html($history['text_2']); ?></div>
                        <div class="desc"><?php echo pxl_print_html($history['decs_2']); ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div> 