<div class="pxl-image-box pxl-image-box2 <?php echo esc_attr($settings['pxl_animate']); ?> <?php echo esc_attr($settings['style']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">
        <?php if ( !empty($settings['image']['id']) ) : 
            $image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
            $img  = pxl_get_image_by_size( array(
                'attach_id'  => $settings['image']['id'],
                'thumb_size' => $image_size,
            ) );
            $thumbnail    = $img['thumbnail'];
            $thumbnail_url    = $img['url'];
            ?>

            <?php if($settings['image_type'] == 'img') : ?>
                <div class="pxl-item--image">
                    <?php echo wp_kses_post($thumbnail); ?>
                </div>
            <?php endif; ?>

            <?php if($settings['image_type'] == 'bg') : ?>
                <div class="pxl-item--bg bg-image" style="background-image: url(<?php echo esc_url($thumbnail_url); ?>);"></div>
            <?php endif; ?>

        <?php endif; ?>
        <div class="pxl-item--holder">
            <<?php echo esc_attr($settings['title_tag']); ?> class="pxl-item--title el-empty"><?php echo pxl_print_html($settings['title']); ?></<?php echo esc_attr($settings['title_tag']); ?>>
            <div class="holder-inner">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="22" viewBox="0 0 21 22" fill="none">
                        <path d="M11.5368 2.89242C15.1881 3.35171 18.0472 6.21078 18.5064 9.86212C18.5753 10.4477 19.0691 10.8726 19.6432 10.8726C19.6891 10.8726 19.735 10.8726 19.781 10.8611C20.4125 10.7807 20.8603 10.2066 20.7799 9.57506C20.4977 7.29494 19.4622 5.17435 17.8376 3.54976C16.2131 1.92517 14.0925 0.889633 11.8124 0.607461C11.1808 0.538568 10.6067 0.986374 10.5378 1.6179C10.4575 2.24942 10.9053 2.82353 11.5368 2.89242ZM11.9731 5.31516C11.3646 5.15441 10.733 5.52184 10.5723 6.14188C10.4115 6.76192 10.779 7.38196 11.399 7.54271C11.9931 7.69693 12.5352 8.0071 12.9692 8.44113C13.4033 8.87515 13.7134 9.41727 13.8677 10.0114C13.9441 10.3066 14.1346 10.5594 14.3972 10.7143C14.6598 10.8693 14.9731 10.9138 15.2685 10.8381C15.877 10.6774 16.2445 10.0458 16.0952 9.43728C15.8367 8.44571 15.3185 7.54101 14.5939 6.81644C13.8694 6.09187 12.9647 5.57364 11.9731 5.31516ZM18.8279 14.6158L15.9115 14.2828C15.5686 14.2425 15.221 14.2805 14.8948 14.3938C14.5687 14.5072 14.2724 14.693 14.0284 14.9373L11.9157 17.05C8.65613 15.3922 6.00673 12.7428 4.34896 9.48321L6.47316 7.359C6.96689 6.86526 7.20802 6.17633 7.12764 5.47592L6.79466 2.5824C6.72956 2.02227 6.46075 1.50564 6.03941 1.13087C5.61806 0.756108 5.07361 0.54938 4.50971 0.55005H2.5233C1.22582 0.55005 0.146499 1.62938 0.226874 2.92687C0.835428 12.7327 8.67773 20.5635 18.472 21.1721C19.7695 21.2525 20.8488 20.1731 20.8488 18.8756V16.8892C20.8603 15.7295 19.9876 14.7535 18.8279 14.6158Z" fill="white"/>
                    </svg>
                </div>
                <?php if ( ! empty( $settings['item_link']['url'] ) ) {
                    $widget->add_render_attribute( 'item_link', 'href', $settings['item_link']['url'] );
                    if ( $settings['item_link']['is_external'] ) {
                        $widget->add_render_attribute( 'item_link', 'target', '_blank' );
                    }
                    if ( $settings['item_link']['nofollow'] ) {
                        $widget->add_render_attribute( 'item_link', 'rel', 'nofollow' );
                    } ?>
                    <div class="pxl-item--sub-title"><?php echo pxl_print_html($settings['sub_title']); ?></div>
                    <a class="pxl-item--link" <?php pxl_print_html($widget->get_render_attribute_string( 'item_link' )); ?>><?php echo pxl_print_html($settings['text_link']); ?></a>
                <?php } ?>
            </div>
        </div>
        <svg class="mask" width="420" height="638" viewBox="0 0 420 638" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g class="inner-mask" clip-path="url(#clip0_844_13)">
                <path d="M196.992 362.765C94.065 355.246 21.4444 414.766 -2 445.466V562H420V203C385.691 325.173 325.65 372.162 196.992 362.765Z" fill="#FF7D44"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M239.999 359.928C94.628 361.432 18.2852 438.236 -1.71484 476.45V542.226H-12V643.712H460.286V542.226H419.999V215.659C420.009 214.873 420.008 214.099 419.999 213.337V215.659C419.431 264.611 383.074 358.448 239.999 359.928Z" fill="#07847F"/>
            </g>
            <defs>
                <clipPath id="clip0_844_13">
                    <rect width="420" height="637.714" rx="8.57143" fill="white"/>
                </clipPath>
            </defs>
        </svg>

    </div>
</div>