<div class="pxl-history">
  <?php if(isset($settings['history']) && !empty($settings['history']) && count($settings['history'])): ?>
  <div class="pxl-history-1" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <?php
    foreach ($settings['history'] as $key => $history): ?>
      <?php
      $image = isset($history['image']) ? $history['image'] : '';
      $item_cls = [ 'elementor-repeater-item-'.$history['_id'] ]; 
      $item_at = [ 'elementor-repeater-item-'.$history['_id'] ]; 
      ?>
      <div class="corner-box <?php echo esc_attr($settings['pxl_animate']); ?> <?php echo implode(' ', $item_cls) ?>">
        <div class="wrap-content">
            <div class="box-1">
                <div class="title"><?php echo pxl_print_html($history['text']); ?></div>
                <div class="desc"><?php echo pxl_print_html($history['decs']); ?></div>
            </div>
            <div class="step"><?php echo pxl_print_html($history['step']); ?></div>
            <div class="box-2">
                <div class="date"><?php echo pxl_print_html($history['date']); ?></div>
                <div class="subtitle"><?php echo pxl_print_html($history['subtitle']); ?></div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<div class="end">
    <i class="caseicon-double-chevron-down"></i>
</div>
</div>
<?php endif; ?>
</div> 