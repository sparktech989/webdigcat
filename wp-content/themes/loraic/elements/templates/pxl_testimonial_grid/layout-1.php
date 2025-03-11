<?php
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');

$col_xl = 12 / intval($col_xl);
$col_lg = 12 / intval($col_lg);
$col_md = 12 / intval($col_md);
$col_sm = 12 / intval($col_sm);
$col_xs = 12 / intval($col_xs);

$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
?>
<?php if(isset($settings['testimonial']) && !empty($settings['testimonial']) && count($settings['testimonial'])): ?>
<div class="pxl-grid pxl-testimonial-grid pxl-testimonial-grid1">
    <div class="pxl-grid-inner pxl-grid-masonry row" data-gutter="15">
        <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        <?php foreach ($settings['testimonial'] as $key => $value):
           $title = isset($value['title']) ? $value['title'] : '';
           $position = isset($value['position']) ? $value['position'] : '';
           $desc = isset($value['description']) ? $value['description'] : '';
           $image = isset($value['image']) ? $value['image'] : '';
           $star = isset($value['star']) ? $value['star'] : '';
           ?>
           <div class="<?php echo esc_attr($item_class); ?>">
            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>">
                <img class="qt1" src="<?php echo esc_url(get_template_directory_uri().'/assets/img/qt1.png'); ?>" alt="<?php echo esc_attr__('qt1', 'loraic'); ?>" />
                <img class="qt2" src="<?php echo esc_url(get_template_directory_uri().'/assets/img/qt2.png'); ?>" alt="<?php echo esc_attr__('qt1', 'loraic'); ?>" />
                <div class="pxl-item--desc el-empty"><?php echo pxl_print_html($desc); ?></div>
                <div class="pxl-item--bottom pxl-item--flexnw">
                    <?php if(!empty($image['id'])) { 
                        $img = pxl_get_image_by_size( array(
                            'attach_id'  => $image['id'],
                            'thumb_size' => '100x100',
                            'class' => 'no-lazyload',
                        ));
                        $thumbnail = $img['thumbnail'];?>
                        <div class="pxl-item--image pxl-mr-15">
                            <?php echo wp_kses_post($thumbnail); ?>
                        </div>
                    <?php } ?>
                    <div class="content-right">
                        <div class="pxl-item--meta">
                            <h4 class="pxl-item--title el-empty"><?php echo pxl_print_html($title); ?></h4>
                            <div class="pxl-item--position el-empty"><?php echo pxl_print_html($position); ?></div>
                        </div>
                        <div class="pxl-item--star pxl-item--<?php echo esc_attr($star); ?>-star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>
    <?php endforeach; ?>
</div>
</div>
<?php endif; ?>
