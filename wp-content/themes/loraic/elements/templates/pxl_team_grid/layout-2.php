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
$image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
?>
<?php if(isset($settings['team']) && !empty($settings['team']) && count($settings['team'])): ?>
<div class="pxl-grid pxl-team-grid pxl-team-grid2">
    <div class="pxl-grid-inner pxl-grid-masonry row" data-gutter="15">
        <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        <?php foreach ($settings['team'] as $key => $value):
           $title = isset($value['title']) ? $value['title'] : '';
           $position = isset($value['position']) ? $value['position'] : '';
           $description = isset($value['description']) ? $value['description'] : '';
           $image = isset($value['image']) ? $value['image'] : '';
           $social = isset($value['social']) ? $value['social'] : '';
           $btn_text = isset($value['btn_text']) ? $value['btn_text'] : '';
           $link_key = $widget->get_repeater_setting_key( 'btn_link', 'value', $key );
           if ( ! empty( $value['btn_link']['url'] ) ) {
            $widget->add_render_attribute( $link_key, 'href', $value['btn_link']['url'] );

            if ( $value['btn_link']['is_external'] ) {
                $widget->add_render_attribute( $link_key, 'target', '_blank' );
            }

            if ( $value['btn_link']['nofollow'] ) {
                $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
            }
        }
        $link_attributes = $widget->get_render_attribute_string( $link_key );
        ?>
        <div class="<?php echo esc_attr($item_class); ?>">
            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>">
                <?php if(!empty($image['id'])) { 
                    $img = pxl_get_image_by_size( array(
                        'attach_id'  => $image['id'],
                        'thumb_size' => $image_size,
                        'class' => 'no-lazyload',
                    ));
                    $thumbnail = $img['thumbnail'];
                    ?>
                    <div class="pxl-item--image">
                        <?php echo wp_kses_post($thumbnail); ?>
                    </div>
                <?php } ?>
                <div class="pxl-item--holder">
                    <a <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                        <div class="plus">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.7715 15.494C7.19927 15.494 6.7356 15.0303 6.7356 14.4581V1.28298C6.7356 0.710743 7.19927 0.24707 7.7715 0.24707C8.34374 0.24707 8.80741 0.710743 8.80741 1.28298V14.4581C8.80741 15.0303 8.34374 15.494 7.7715 15.494Z" fill="#FF7D44"/>
                                <path d="M14.3592 8.90629H1.1841C0.611866 8.90629 0.148193 8.44262 0.148193 7.87038C0.148193 7.29815 0.611866 6.83447 1.1841 6.83447H14.3592C14.9314 6.83447 15.3951 7.29815 15.3951 7.87038C15.3951 8.44262 14.9314 8.90629 14.3592 8.90629Z" fill="#FF7D44"/>
                            </svg>

                        </div>
                    </a>
                    <h5 class="pxl-item--title">    
                        <a <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                            <?php echo pxl_print_html($title); ?>
                        </a>
                    </h5>
                    <div class="pxl-item--position"><?php echo pxl_print_html($position); ?></div>
                    <?php if(!empty($social)): ?>
                        <div class="pxl-item--social">
                            <?php  $team_social = json_decode($social, true);
                            foreach ($team_social as $value): ?>
                                <a href="<?php echo esc_url($value['url']); ?>" target="_blank"><i class="<?php echo esc_attr($value['icon']); ?>"></i></a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</div>
<?php endif; ?>
