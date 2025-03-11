<?php 
$template = (int)$widget->get_setting('content_template','0');
if($template > 0 ){
	if ( !has_action( 'pxl_anchor_target_hidden_panel_'.$template) ){
		add_action( 'pxl_anchor_target_hidden_panel_'.$template, 'loraic_hook_anchor_hidden_panel' );
	} 
}
?>
<?php if ($settings['style']=='default'): ?>
	<div class="pxl-hidden-panel-button pxl-anchor-button pxl-cursor--cta <?php echo esc_attr($settings['style']); ?>">
		<span class="pxl-icon-line pxl-icon-line1"></span>
		<span class="pxl-icon-line pxl-icon-line2"></span>
		<span class="pxl-icon-line pxl-icon-line3"></span>
	</div>
<?php endif ?>
<?php if ($settings['style']=='style-2'): ?>
	<div class="pxl-hidden-panel-button pxl-anchor-button pxl-cursor--cta <?php echo esc_attr($settings['style']); ?>">
		<span class="pxl-icon-line pxl-icon-line1"></span>
		<span class="pxl-icon-line pxl-icon-line2"></span>
		<span class="pxl-icon-line pxl-icon-line3"></span>
		<span class="pxl-icon-line pxl-icon-line4"></span>
		<span class="pxl-icon-line pxl-icon-line5"></span>
		<span class="pxl-icon-line pxl-icon-line6"></span>
		<span class="pxl-icon-line pxl-icon-line7"></span>
		<span class="pxl-icon-line pxl-icon-line8"></span>
		<span class="pxl-icon-line pxl-icon-line9"></span>
	</div>
<?php endif ?>
