<div class="pxl-text-slip pxl-text-slip1 <?php echo esc_attr($settings['text_effect'].' '.$settings['pxl_animate'].' '.$settings['style']); if($settings['banner'] == 'yes') { echo ' pxl-text-white-shadow'; }  ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
	<div class="pxl-item--container">
		
		<div class="pxl-item--inner" <?php if(!empty($settings['effect_speed'])) { ?>style="animation-duration:<?php echo esc_attr($settings['effect_speed']); ?>ms"<?php } ?>>
			<?php if(isset($settings['items']) && !empty($settings['items']) && count($settings['items'])): ?>
			<?php foreach ($settings['items'] as $key => $value):
				$text = isset($value['text']) ? $value['text'] : '';
				$link_key = $widget->get_repeater_setting_key( 'link', 'value', $key );
				if ( ! empty( $value['link']['url'] ) ) {
					$widget->add_render_attribute( $link_key, 'href', $value['link']['url'] );

					if ( $value['link']['is_external'] ) {
						$widget->add_render_attribute( $link_key, 'target', '_blank' );
					}

					if ( $value['link']['nofollow'] ) {
						$widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
					}
				}
				$link_attributes = $widget->get_render_attribute_string( $link_key );
				?>
				<<?php echo esc_attr($settings['text_tag']); ?> class="pxl-item--text">				
				<span class="pxl-text-backdrop"><?php echo pxl_print_html($text); ?></span>
				<i>*</i>
				</<?php echo esc_attr($settings['text_tag']); ?>>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>
</div>
