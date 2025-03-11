<?php 

if(!function_exists('loraic_get_post_grid')){
    function loraic_get_post_grid($posts = [], $settings = []){ 
        if (empty($posts) || !is_array($posts) || empty($settings) || !is_array($settings)) {
            return false;
        }
        switch ($settings['layout']) {
            case 'post-1':
            loraic_get_post_grid_layout1($posts, $settings);
            break;

            case 'portfolio-1':
            loraic_get_portfolio_grid_layout1($posts, $settings);
            break;

            case 'service-1':
            loraic_get_service_grid_layout1($posts, $settings);
            break;

            case 'service-2':
            loraic_get_service_grid_layout2($posts, $settings);
            break;

            case 'service-3':
            loraic_get_service_grid_layout3($posts, $settings);
            break;

            case 'service-4':
            loraic_get_service_grid_layout4($posts, $settings);
            break;

            case 'service-5':
            loraic_get_service_grid_layout5($posts, $settings);
            break;

            case 'carrer-1':
            loraic_get_carrer_grid_layout1($posts, $settings);
            break;

            default:
            return false;
            break;
        }
    }
}

// Start Post Grid
//--------------------------------------------------

function loraic_get_post_grid_layout1($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '410x282';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            }
            $author = get_user_by('id', $post->post_author);  
            $author_id = get_the_author_meta('ID');
            $avatar = get_avatar($author_id, 100);
            ?>

            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                    <div class="pxl-item--featured">
                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                    </div>
                <?php endif; ?> 
                <div class="pxl-item--meta">
                    <span class="pxl-item--date"><?php $date_formart = get_option('date_format'); echo get_the_date('F,d Y', $post->ID); ?></span>
                    <div class="pxl-item--author">
                        <?php echo ''.$avatar; ?>
                        <div class="info-author">
                            <div class="name"><?php the_author_posts_link(); ?></div>
                            <?php loraic_get_user_theme(); ?>
                        </div>
                    </div>
                </div>
                <div class="pxl-item--holder">
                    <h5 class="pxl-item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h5>
                    <div class="item--content">
                        <?php echo wp_trim_words( $post->post_excerpt, $num_words , $more = null ); ?>
                    </div>
                    <div class="pxl-item--readmore">
                        <a class="btn-readmore" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                            <span>
                                <?php if(!empty($button_text)) {
                                    echo esc_attr($button_text);
                                } else {
                                    echo esc_html__('Read Article', 'loraic');
                                } ?>
                            </span>
                            <i class="flaticon flaticon-arrow-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    endforeach;
endif;
}

function loraic_get_post_grid_layout2($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '700x500';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            }
            $author = get_user_by('id', $post->post_author);  ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                    <div class="pxl-item--featured" <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) { $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>style="background-image: url(<?php echo esc_url($thumbnail_url[0]); ?>);"<?php } ?>>
                        <span class="pxl-item--categorie"><?php the_terms( $post->ID, 'category' ); ?></span>
                    </div>
                <?php endif; ?>
                <div class="pxl-item--holder">
                    <div class="pxl-item--meta">
                        <span class="pxl-item--author"><span>By:</span>&nbsp;<?php the_author_posts_link(); ?>,&nbsp;</span>
                        <?php if($show_date == 'true'): ?>
                            <span class="pxl-item--date"><?php $date_formart = get_option('date_format'); echo get_the_date('F,d Y', $post->ID); ?></span>
                        <?php endif; ?>
                    </div>
                    <h5 class="pxl-item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h5>
                    <div class="item--content">
                        <?php echo wp_trim_words( $post->post_excerpt, 8, $more = null ); ?>
                    </div>
                    <?php if($show_button == 'true') : ?>
                        <div class="pxl-item--readmore">
                            <a class="btn-readmore" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                <span>
                                    <?php if(!empty($button_text)) {
                                        echo esc_attr($button_text);
                                    } else {
                                        echo esc_html__('Read More', 'loraic');
                                    } ?>
                                </span>
                                <i class="far fa-arrow-right"></i>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
    endforeach;
endif;
}

function loraic_get_post_grid_layout3($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '300x300';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            }
            $author = get_user_by('id', $post->post_author);  ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <div class="pxl-item--featured">
                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                    </div>
                    <div class="pxl-item--holder">
                        <?php if($show_date == 'true'): ?>
                            <span class="pxl-item--date"><?php $date_formart = get_option('date_format'); echo get_the_date('d F Y', $post->ID); ?></span>
                        <?php endif; ?>
                        <h5 class="pxl-item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h5>
                    </div>
                </div>
            </div>
            <?php
        endforeach;
    endif;
}

// End Post Grid
//--------------------------------------------------

// Start Portfolio Grid
//--------------------------------------------------
function loraic_get_portfolio_grid_layout1($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '600x665';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            } ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                    <div class="pxl-item--featured">
                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>" title="<?php echo esc_attr(get_the_title($post->ID)); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                    </div>
                <?php endif; ?>
                <div class="pxl-item--holder">
                    <div class="pxl-item--category">
                        <?php the_terms( $post->ID, 'portfolio-category', '', ' ' ); ?>
                    </div>
                    <h5 class="pxl-item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h5>
                </div>
                <?php if($show_button == 'true'): ?>
                    <div class="pxl-item--button ">
                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M17.9347 14.5702V1.03467L16.9777 0.0777061L3.44219 0.0777054L3.44219 1.99163L14.6659 1.99163L0.536112 16.1214L1.88967 17.4749L16.0208 3.34383L16.0194 14.5689L17.9347 14.5702Z" fill="white"/>
                            </svg>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
    endforeach;
endif;
}
// End Portfolio Grid
//--------------------------------------------------

// Start Service Grid
//--------------------------------------------------
function loraic_get_service_grid_layout1($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '740x460';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $service_excerpt = get_post_meta($post->ID, 'service_excerpt', true);
            $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
            $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
            $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
            $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
            $multi_text_country = get_post_meta($post->ID, 'multi_text_country', true);
            $icon_multi_text = get_post_meta($post->ID, 'icon_multi_text', true);
            ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                    $img_id       = get_post_thumbnail_id( $post->ID );
                    $img          = loraic_get_image_by_size( array(
                        'attach_id'  => $img_id,
                        'thumb_size' => $images_size
                    ) );
                    $thumbnail    = $img['thumbnail']; ?>
                    <div class="pxl-item--featured">
                        <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                            <?php echo wp_kses_post($thumbnail); ?>
                        </a>
                    </div>
                <?php endif; ?>
                <div class="wrap-inner">
                    <?php if($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                        <div class="pxl-item--icon pxl-icon-middle">
                            <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                        </div>
                    <?php endif; ?>
                    <?php if($service_icon_type == 'image' && !empty($service_icon_img)) : 
                        $icon_img = pxl_get_image_by_size( array(
                            'attach_id'  => $service_icon_img['id'],
                            'thumb_size' => 'full',
                        ));
                        $icon_thumbnail = $icon_img['thumbnail'];
                        ?>
                        <div class="pxl-icon">
                            <?php echo wp_kses_post($icon_thumbnail); ?>
                        </div>
                    <?php endif; ?>
                    <h5 class="pxl-item--title">
                        <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
                    </h5>
                    <div class="item--content">
                        <?php echo wp_trim_words( $post->post_excerpt, 10, $more = null ); ?>
                    </div>
                    <div class="pxl-item--readmore">
                        <a class="btn-readmore" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                            <span>
                                <?php if(!empty($button_text)) {
                                    echo esc_attr($button_text);
                                } else {
                                    echo esc_html__('Find Out More', 'loraic');
                                } ?>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    endforeach;
endif;
}
function loraic_get_service_grid_layout2($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '740x460';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $service_excerpt = get_post_meta($post->ID, 'service_excerpt', true);
            $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
            $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
            $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
            $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
            $multi_text_country = get_post_meta($post->ID, 'multi_text_country', true);
            $icon_multi_text = get_post_meta($post->ID, 'icon_multi_text', true);
            ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                    $img_id       = get_post_thumbnail_id( $post->ID );
                    $img          = loraic_get_image_by_size( array(
                        'attach_id'  => $img_id,
                        'thumb_size' => $images_size
                    ) );
                    $thumbnail    = $img['thumbnail']; ?>
                    <div class="pxl-item--featured">
                        <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                            <?php echo wp_kses_post($thumbnail); ?>
                        </a>
                    </div>
                <?php endif; ?>
                <div class="wrap-inner">
                    <div class="pxl-item--category">
                        <?php the_terms( $post->ID, 'service-category', '', ' ' ); ?>
                    </div>
                    <?php if($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                        <div class="pxl-item--icon pxl-icon-middle">
                            <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                        </div>
                    <?php endif; ?>
                    <?php if($service_icon_type == 'image' && !empty($service_icon_img)) : 
                        $icon_img = pxl_get_image_by_size( array(
                            'attach_id'  => $service_icon_img['id'],
                            'thumb_size' => 'full',
                        ));
                        $icon_thumbnail = $icon_img['thumbnail'];
                        ?>
                        <div class="pxl-icon">
                            <?php echo wp_kses_post($icon_thumbnail); ?>
                        </div>
                    <?php endif; ?>
                    <h5 class="pxl-item--title">
                        <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
                    </h5>
                    <div class="item--content">
                        <?php echo wp_trim_words( $post->post_excerpt, 10, $more = null ); ?>
                    </div>
                    <div class="pxl-item--readmore">
                        <a class="btn-readmore" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                            <span>
                                <?php if(!empty($button_text)) {
                                    echo esc_attr($button_text);
                                } else {
                                    echo esc_html__('Find Out More', 'loraic');
                                } ?>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    endforeach;
endif;
}


function loraic_get_service_grid_layout3($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '740x460';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $service_excerpt = get_post_meta($post->ID, 'service_excerpt', true);
            $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
            $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
            $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
            $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
            $multi_text_country = get_post_meta($post->ID, 'multi_text_country', true);
            $icon_multi_text = get_post_meta($post->ID, 'icon_multi_text', true);
            ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <a class="link-box" href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"></a>
                    <div class="content">
                        <?php if($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                            <div class="pxl-item--icon pxl-icon-middle">
                                <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                            </div>
                        <?php endif; ?>
                        <?php if($service_icon_type == 'image' && !empty($service_icon_img)) : 
                            $icon_img = pxl_get_image_by_size( array(
                                'attach_id'  => $service_icon_img['id'],
                                'thumb_size' => 'full',
                            ));
                            $icon_thumbnail = $icon_img['thumbnail'];
                            ?>
                            <div class="pxl-icon">
                                <?php echo wp_kses_post($icon_thumbnail); ?>
                            </div>
                        <?php endif; ?>
                        <h5 class="pxl-item--title">
                            <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
                        </h5>
                    </div>
                    <div class="arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="9" height="15" viewBox="0 0 9 15" fill="none">
                            <path d="M0.901424 13.9075C0.701919 13.708 0.589844 13.4373 0.589844 13.1552C0.589844 12.873 0.701919 12.6023 0.901424 12.4028L6.16916 7.13504L0.901424 1.8673C0.707573 1.66659 0.600309 1.39777 0.602733 1.11875C0.605158 0.83972 0.717078 0.572807 0.914387 0.375499C1.1117 0.178189 1.37861 0.0662708 1.65764 0.0638456C1.93666 0.0614214 2.20548 0.168686 2.40619 0.362536L8.42631 6.38265C8.62581 6.58222 8.73789 6.85285 8.73789 7.13504C8.73789 7.41722 8.62581 7.68785 8.42631 7.88742L2.40619 13.9075C2.20662 14.107 1.93599 14.2191 1.65381 14.2191C1.37162 14.2191 1.10099 14.107 0.901424 13.9075Z" fill="#1C3F39"/>
                        </svg>
                    </div>
                </div>
            </div>
            <?php
        endforeach;
    endif;
}
function loraic_get_service_grid_layout4($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '740x460';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $service_excerpt = get_post_meta($post->ID, 'service_excerpt', true);
            $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
            $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
            $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
            $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
            $multi_text_country = get_post_meta($post->ID, 'multi_text_country', true);
            $icon_multi_text = get_post_meta($post->ID, 'icon_multi_text', true);
            ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                    $img_id       = get_post_thumbnail_id( $post->ID );
                    $img          = loraic_get_image_by_size( array(
                        'attach_id'  => $img_id,
                        'thumb_size' => $images_size
                    ) );
                    $thumbnail    = $img['thumbnail']; ?>
                    <div class="pxl-item--featured">
                        <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                            <?php echo wp_kses_post($thumbnail); ?>
                        </a>
                        <?php if($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                            <div class="pxl-item--icon pxl-icon-middle">
                                <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                            </div>
                        <?php endif; ?>
                        <?php if($service_icon_type == 'image' && !empty($service_icon_img)) : 
                            $icon_img = pxl_get_image_by_size( array(
                                'attach_id'  => $service_icon_img['id'],
                                'thumb_size' => 'full',
                            ));
                            $icon_thumbnail = $icon_img['thumbnail'];
                            ?>
                            <div class="pxl-icon">
                                <?php echo wp_kses_post($icon_thumbnail); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                <?php endif; ?>
                <div class="wrap-inner">
                    <h5 class="pxl-item--title">
                        <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
                    </h5>
                    <div class="item--content">
                        <?php echo wp_trim_words( $post->post_excerpt, 10, $more = null ); ?>
                    </div>
                    <div class="pxl-item--readmore">
                        <a class="btn-readmore" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                            <span>
                                <?php if(!empty($button_text)) {
                                    echo esc_attr($button_text);
                                } else {
                                    echo esc_html__('Find Out More', 'loraic');
                                } ?>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    endforeach;
endif;
}
function loraic_get_service_grid_layout5($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '740x460';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $service_excerpt = get_post_meta($post->ID, 'service_excerpt', true);
            $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
            $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
            $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
            $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
            $multi_text_country = get_post_meta($post->ID, 'multi_text_country', true);
            $icon_multi_text = get_post_meta($post->ID, 'icon_multi_text', true);
            ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                    $img_id       = get_post_thumbnail_id( $post->ID );
                    $img          = loraic_get_image_by_size( array(
                        'attach_id'  => $img_id,
                        'thumb_size' => $images_size
                    ) );
                    $thumbnail    = $img['thumbnail']; ?>
                    <div class="pxl-item--featured">
                        <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                            <?php echo wp_kses_post($thumbnail); ?>
                        </a>
                        <?php if($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                            <div class="pxl-item--icon pxl-icon-middle">
                                <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                            </div>
                        <?php endif; ?>
                        <?php if($service_icon_type == 'image' && !empty($service_icon_img)) : 
                            $icon_img = pxl_get_image_by_size( array(
                                'attach_id'  => $service_icon_img['id'],
                                'thumb_size' => 'full',
                            ));
                            $icon_thumbnail = $icon_img['thumbnail'];
                            ?>
                            <div class="pxl-icon">
                                <?php echo wp_kses_post($icon_thumbnail); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                <?php endif; ?>
                <div class="wrap-inner">
                    <h5 class="pxl-item--title">
                        <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
                    </h5>
                    <div class="pxl-item--readmore">
                        <a class="btn-readmore" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                            <span>
                                <?php if(!empty($button_text)) {
                                    echo esc_attr($button_text);
                                } else {
                                    echo esc_html__('Find Out More', 'loraic');
                                } ?>
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path d="M8.1791 2.84763L8.1791 4.27146C8.1791 4.35232 8.21426 4.42966 8.27578 4.48415L12.7107 8.332L2.8125 8.332C2.73516 8.332 2.67187 8.39528 2.67187 8.47263L2.67187 9.52732C2.67187 9.60466 2.73516 9.66794 2.8125 9.66794L12.7107 9.66794L8.27578 13.5158C8.21426 13.5685 8.1791 13.6459 8.1791 13.7285L8.1791 15.1523C8.1791 15.2718 8.32149 15.3369 8.41113 15.2578L15.1348 9.4236C15.1956 9.37087 15.2444 9.30567 15.2778 9.23243C15.3113 9.15918 15.3286 9.07961 15.3286 8.99909C15.3286 8.91858 15.3113 8.839 15.2778 8.76576C15.2444 8.69252 15.1956 8.62732 15.1348 8.57458L8.41113 2.74216C8.31973 2.66306 8.1791 2.7281 8.1791 2.84763Z" fill="white"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    endforeach;
endif;
}


// End Service Grid
//-------------------------------------------------
// Star Carrers Grid


function loraic_get_carrer_grid_layout1($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '740x460';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';
            ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--holder">
                    <div class="meta-content">
                        <span class="pxl-item--date"><?php $date_formart = get_option('date_format'); echo get_the_date('d F, Y', $post->ID); ?></span>
                        <h5 class="pxl-item--title">
                            <a href="<?php if(!empty($carrer_external_link)) { echo esc_url($carrer_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
                        </h5>
                        <div class="pxl-item--button">
                            <a href="<?php if(!empty($carrer_external_link)) { echo esc_url($carrer_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                <?php echo pxl_print_html('Find Out More','loraic'); ?>
                                <i class="flaticon flaticon-arrow-2"></i>
                            </a>
                        </div>
                    </div>
                    <?php if ($button_apply): ?>
                        <div class="pxl-item--apply">
                            <a href="<?php echo esc_attr($button_apply); ?>">
                                <?php echo pxl_print_html('Apply Here','loraic'); ?>
                            </a>
                        </div>
                    <?php endif ?>
                </div>
            </div>
            <?php
        endforeach;
    endif;
}

// End Carrer Grid
//-------------------------------------------------

add_action( 'wp_ajax_loraic_get_pagination_html', 'loraic_get_pagination_html' );
add_action( 'wp_ajax_nopriv_loraic_get_pagination_html', 'loraic_get_pagination_html' );
function loraic_get_pagination_html(){
    try{
        if(!isset($_POST['query_vars'])){
            throw new Exception(__('Something went wrong while requesting. Please try again!', 'loraic'));
        }
        $query = new WP_Query($_POST['query_vars']);
        ob_start();
        loraic()->page->get_pagination( $query,  true );
        $html = ob_get_clean();
        wp_send_json(
            array(
                'status' => true,
                'message' => esc_attr__('Load Successfully!', 'loraic'),
                'data' => array(
                    'html' => $html,
                    'query_vars' => $_POST['query_vars'],
                    'post' => $query->have_posts()
                ),
            )
        );
    }
    catch (Exception $e){
        wp_send_json(array('status' => false, 'message' => $e->getMessage()));
    }
    die;
}

add_action( 'wp_ajax_loraic_load_more_post_grid', 'loraic_load_more_post_grid' );
add_action( 'wp_ajax_nopriv_loraic_load_more_post_grid', 'loraic_load_more_post_grid' );
function loraic_load_more_post_grid(){
    try{
        if(!isset($_POST['settings'])){
            throw new Exception(__('Something went wrong while requesting. Please try again!', 'loraic'));
        }
        $settings = $_POST['settings'];
        set_query_var('paged', $settings['paged']);
        extract(pxl_get_posts_of_grid($settings['post_type'], [
            'source' => isset($settings['source'])?$settings['source']:'',
            'orderby' => isset($settings['orderby'])?$settings['orderby']:'date',
            'order' => isset($settings['order'])?$settings['order']:'desc',
            'limit' => isset($settings['limit'])?$settings['limit']:'6',
            'post_ids' => isset($settings['post_ids'])?$settings['post_ids']:[],
        ]));
        ob_start();
        
        loraic_get_post_grid($posts, $settings);
        $html = ob_get_clean();
        wp_send_json(
            array(
                'status' => true,
                'message' => esc_attr__('Load Successfully!', 'loraic'),
                'data' => array(
                    'html' => $html,
                    'paged' => $settings['paged'],
                    'posts' => $posts,
                    'max' => $max,
                ),
            )
        );
    }
    catch (Exception $e){
        wp_send_json(array('status' => false, 'message' => $e->getMessage()));
    }
    die;
}

add_action( 'wp_ajax_loraic_get_filter_html', 'loraic_get_filter_html' );
add_action( 'wp_ajax_nopriv_loraic_get_filter_html', 'loraic_get_filter_html' );
function loraic_get_filter_html(){
    try{
        if(!isset($_POST['settings'])){
            throw new Exception(__('Something went wrong while requesting. Please try again!', 'loraic'));
        }
        $settings = $_POST['settings'];
        $loadmore_filter = $_POST['loadmore_filter'];
        if($loadmore_filter == '1'){
            set_query_var('paged', 1);
            $limit = isset($settings['limit'])?$settings['limit']:'6';
            $limitx = (int)$limit * (int)$settings['paged'];
        }else{
            set_query_var('paged', $settings['paged']);
            $limitx = isset($settings['limit'])?$settings['limit']:'6';
        }
        extract(pxl_get_posts_of_grid($settings['post_type'], [
            'source' => isset($settings['source'])?$settings['source']:'',
            'orderby' => isset($settings['orderby'])?$settings['orderby']:'date',
            'order' => isset($settings['order'])?$settings['order']:'desc',
            'limit' => $limitx,
            'post_ids' => isset($settings['post_ids'])?$settings['post_ids']: [],
        ],
        $settings['tax']
    ));
    ob_start(); ?>
    
    <span class="filter-item active" data-filter="*">
        <?php echo esc_html($settings['filter_default_title']); ?>
        <?php if($settings['show_cat_count'] == '1'): ?>
            <span class="filter-item-count"><?php echo count($posts); ?></span> 
        <?php endif; ?>
    </span>
    <?php foreach ($categories as $category):
        $category_arr = explode('|', $category);
        $term = get_term_by('slug',$category_arr[0], $category_arr[1]);
        $tax_count = 0;
        foreach ($posts as $key => $post){
            $this_terms = get_the_terms( $post->ID,  $settings['tax'][0] );
            $term_list = [];
            foreach ($this_terms as $t) {
                $term_list[] = $t->slug;
            } 
            if(in_array($term->slug,$term_list))
                $tax_count++;
        } 
        if($tax_count > 0): ?>
            <span class="filter-item" data-filter="<?php echo esc_attr('.' . $term->slug); ?>">
                <?php echo esc_html($term->name); ?>
                <?php if($settings['show_cat_count'] == '1'): ?>
                    <span class="filter-item-count"><?php echo esc_attr($tax_count); ?></span> 
                <?php endif; ?>
            </span>
        <?php endif; ?>
    <?php endforeach; ?>

    <?php $html = ob_get_clean();
    wp_send_json(
        array(
            'status' => true,
            'message' => esc_attr__('Load Successfully!', 'loraic'),
            'data' => array(
                'html' => $html,
                'paged' => $settings['paged'],
                'posts' => $posts,
                'max' => $max,
            ),
        )
    );
}
catch (Exception $e){
    wp_send_json(array('status' => false, 'message' => $e->getMessage()));
}
die;
}