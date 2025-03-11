<div class="pxl-banner pxl-banner1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
	<div class="pxl-banner-inner">
		<?php if(!empty($settings['banner_image']['id'])) : 
			$img = pxl_get_image_by_size( array(
				'attach_id'  => $settings['banner_image']['id'],
				'thumb_size' => 'full',
			));
			$thumbnail = $img['thumbnail'];
			?>
			<div class="pxl-item--image">
				<?php echo pxl_print_html($thumbnail); ?>
			</div>
		<?php endif; ?>
		<?php if(!empty($settings['banner_image_2']['id'])) : 
			$img2 = pxl_get_image_by_size( array(
				'attach_id'  => $settings['banner_image_2']['id'],
				'thumb_size' => 'full',
			));
			$thumbnail2 = $img2['thumbnail'];
			?>
			<div class="pxl-item--image2">
				<?php echo pxl_print_html($thumbnail2); ?>
			</div>
		<?php endif; ?>
		<?php if(!empty($settings['banner_title']) || !empty($settings['banner_number'])) : ?>
		<div class="pxl-item--meta wow fadeInUp" data-wow-delay="200ms">
				<div class="pxl-item--title ">
					<?php if(!empty($settings['banner_number'])) : ?>
						<div class="pxl--counter-number ">
								<?php echo pxl_print_html($settings['banner_number']); ?>
						</div>
					<?php endif; ?>
					<?php echo esc_attr($settings['banner_title']); ?>
				</div>
		</div>
		<?php endif; ?>
	</div>
</div>