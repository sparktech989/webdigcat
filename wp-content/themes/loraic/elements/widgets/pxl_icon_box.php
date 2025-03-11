<?php
// Register Icon Box Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_icon_box',
        'title' => esc_html__('BR Icon Box', 'loraic' ),
        'icon' => 'eicon-icon-box',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_layout',
                    'label' => esc_html__('Layout', 'loraic'),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'loraic' ),
                            'type' => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'loraic' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_icon_box/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'loraic' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_icon_box/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'loraic' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_icon_box/layout3.jpg'
                                ],
                                '4' => [
                                    'label' => esc_html__('Layout 4', 'loraic' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_icon_box/layout4.jpg'
                                ],
                                '5' => [
                                    'label' => esc_html__('Layout 5', 'loraic' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_icon_box/layout5.jpg'
                                ],
                                '6' => [
                                    'label' => esc_html__('Layout 6', 'loraic' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_icon_box/layout6.jpg'
                                ],
                                '7' => [
                                    'label' => esc_html__('Layout 7', 'loraic' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_icon_box/layout7.jpg'
                                ],
                                '8' => [
                                    'label' => esc_html__('Layout 8', 'loraic' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_icon_box/layout8.jpg'
                                ],
                                '9' => [
                                    'label' => esc_html__('Layout 9', 'loraic' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_icon_box/layout9.jpg'
                                ],
                                '10' => [
                                    'label' => esc_html__('Layout 10', 'loraic' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_icon_box/layout10.jpg'
                                ],
                                '11' => [
                                    'label' => esc_html__('Layout 11', 'loraic' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_icon_box/layout11.jpg'
                                ],
                                '12' => [
                                    'label' => esc_html__('Layout 12', 'loraic' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_icon_box/layout12.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'loraic' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        // array(
                        //     'name' => 'item_active',
                        //     'label' => esc_html__('Item Active', 'loraic' ),
                        //     'type' => \Elementor\Controls_Manager::SELECT,
                        //     'options' => [
                        //         'pxl--item-deactive' => 'No',
                        //         'pxl--item-active' => 'Yes',
                        //     ],
                        //     'default' => 'pxl--item-deactive',
                        //     'condition' => [
                        //         'layout' => ['4','8'],
                        //     ],
                        // ),
                        array(
                            'name' => 'step',
                            'label' => esc_html__('Step', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'rows' => 10,
                            'show_label' => false,
                            'condition' => [
                                'layout' => ['4','5'],
                            ],
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'desc',
                            'label' => esc_html__('Description', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'rows' => 10,
                            'show_label' => false,
                            'condition' => [
                                'layout' => ['2','3','4','5','6','7','8','9','10','11'],
                            ],
                        ),
                        array(
                            'name' => 'btb_text',
                            'label' => esc_html__('Button Text', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'rows' => 10,
                            'show_label' => false,
                            'condition' => [
                                'layout' => ['5','12'],
                            ],
                        ),
                        array(
                            'name' => 'item_link',
                            'label' => esc_html__('Item Link', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'condition' => [
                                'layout' => ['1','2','5','6','7','8','9','10','11','12'],
                            ],
                        ),
                        array(
                            'name' => 'icon_type',
                            'label' => esc_html__('Icon Type', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'icon' => 'Icon',
                                'image' => 'Image',
                            ],
                            'default' => 'icon',
                            'condition' => [
                                'layout' => ['1','2','3','6','7','8','9','10','11'],
                            ],
                        ),
                        array(
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Icon', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'icon_type' => 'icon',
                                'layout' => ['1','2','3','6','7','8','9','10','11'],
                            ],
                        ),

                        array(
                            'name' => 'icon_image_2',
                            'label' => esc_html__( 'Image', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'layout' => ['12'],
                            ],
                        ),
                        

                        array(
                            'name' => 'icon_image_3',
                            'label' => esc_html__( 'Image Hover', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'layout' => ['12'],
                            ],
                        ),
                        array(
                            'name' => 'icon_image_4',
                            'label' => esc_html__( 'Background Image Hover', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'layout' => ['12'],
                            ],
                        ),
                        array(
                            'name' => 'icon_image',
                            'label' => esc_html__( 'Icon Image', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'icon_type' => 'image',
                                'layout' => ['1','2','3','6','7','8','9','10','11'],
                            ],
                        ),
                        array(
                            'name' => 'icon_image1',
                            'label' => esc_html__( 'Image', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'icon_type' => 'image',
                                'layout' => ['4'],
                            ],
                        ),
                        array(
                            'name' => 'icon_bg_image',
                            'label' => esc_html__( 'Image', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'layout' => ['3'],
                            ],
                        ),
                        array(
                            'name' => 'wg_max_width',
                            'label' => esc_html__('Widget Max Width', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon-box' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
),
array(
    'name' => 'section_style_general',
    'label' => esc_html__('General', 'loraic' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'btn_border_radius',
            'label' => esc_html__('Box Border Radius', 'loraic' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box6 .pxl-item--inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'control_type' => 'responsive',
            'condition' => [
                'layout' => ['6'],
            ],
        ),
        array(
            'name' => 'btn_padding',
            'label' => esc_html__('Box Padding', 'loraic' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box6 .pxl-item--inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'control_type' => 'responsive',
            'condition' => [
                'layout' => ['6'],
            ],
        ),
        array(
            'name' => 'style',
            'label' => esc_html__('Style', 'loraic' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'style-1' => 'Style 1',
                'style-2' => 'Style 2',
                'style-3' => 'Style 3',
            ],
            'default' => 'style-1',
            'condition' => [
                'layout' => ['1','6','9','10'],
            ],
        ),

        array(
            'name' => 'box_color',
            'label' => esc_html__('Box Color', 'loraic' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box' => 'background-color: {{VALUE}};',
                '{{WRAPPER}} .pxl-icon-box .box-hover:before' => 'background-color: {{VALUE}} !important;',
                '{{WRAPPER}} .pxl-icon-box6 .pxl-item--icon:before' => 'border-color: {{VALUE}} !important;',
                '{{WRAPPER}} .pxl-icon-box6 i' => 'color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'readmore_color',
            'label' => esc_html__('Primary Color', 'loraic' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box2 .pxl-item--icon ' => 'background-color: {{VALUE}};',
                '{{WRAPPER}} .pxl-icon-box2 .pxl-item--icon:before ' => 'border-color: {{VALUE}};',
                '{{WRAPPER}} .pxl-icon-box2 .pxl-item--icon:before ' => 'border-color: {{VALUE}};',
                '{{WRAPPER}} .pxl-icon-box2 .pxl-item--inner:hover ' => 'border-color: {{VALUE}};',
                '{{WRAPPER}} .pxl-icon-box2 .more:before' => 'background-color: {{VALUE}};',
                '{{WRAPPER}} .pxl-icon-box2 .more i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .pxl-icon-box2 .shape1,{{WRAPPER}} .pxl-icon-box2 .shape2,{{WRAPPER}} .pxl-icon-box2 .shape3' => 'background-color: {{VALUE}};',
                '{{WRAPPER}} .pxl-icon-box8 .pxl-item--icon:before,{{WRAPPER}} .pxl-icon-box8 .pxl-item--inner:before,{{WRAPPER}} .pxl-icon-box8 .pxl-item--icon' => 'background-color: {{VALUE}};',
                '{{WRAPPER}} .pxl-icon-box8 .pxl-item--icon--2:before,{{WRAPPER}} .pxl-icon-box8 .pxl-item--icon--2 i' => 'border-color: {{VALUE}};     color: {{VALUE}};',
            ],
            'condition' => [
                'layout' => ['2','8'],
            ],
        ),
    ),
),
array(
    'name' => 'section_style_step',
    'label' => esc_html__('Step', 'loraic'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'condition' => [
        'layout' => ['4','5'],
    ],
    'controls' => array(
        array(
            'name' => 'step_color',
            'label' => esc_html__('Color', 'loraic' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--step' => 'color: {{VALUE}} !important;',
                '{{WRAPPER}} .pxl-icon-box .pxl-item--step .step' => 'color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'bgstep_color',
            'label' => esc_html__('Background Color', 'loraic' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--step' => 'background-color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'bg_in_step_color',
            'label' => esc_html__('Background Inner Step Color', 'loraic' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--step .step' => 'background-color: {{VALUE}} !important;',
            ],
            'condition' => [
                'layout' => ['4'],
            ],
        ),
        array(
            'name' => 'step_typography',
            'label' => esc_html__('Typography', 'loraic' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-icon-box .pxl-item--step,{{WRAPPER}} .pxl-icon-box .pxl-item--step .step',
        ),
    ),
),
array(
    'name' => 'section_style_title',
    'label' => esc_html__('Title', 'loraic'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'title_tag',
            'label' => esc_html__('HTML Tag', 'loraic' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'h1' => 'H1',
                'h2' => 'H2',
                'h3' => 'H3',
                'h4' => 'H4',
                'h5' => 'H5',
                'h6' => 'H6',
                'div' => 'div',
                'span' => 'span',
                'p' => 'p',
            ],
            'default' => 'h5',
        ),
        array(
            'name' => 'title_color',
            'label' => esc_html__('Color', 'loraic' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item-title' => 'color: {{VALUE}} !important;',
                '{{WRAPPER}} .pxl-icon-box .pxl-item-title a' => 'color: {{VALUE}} !important;'
            ],
        ),
        array(
            'name' => 'title_typography',
            'label' => esc_html__('Typography', 'loraic' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-icon-box .pxl-item-title,{{WRAPPER}} .pxl-icon-box .pxl-item-title a',
        ),
        array(
            'name' => 'title_top_spacer',
            'label' => esc_html__('Top Spacer', 'loraic' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item-title' => 'margin-top: {{SIZE}}{{UNIT}} !important;',
            ],
        ),
        array(
            'name' => 'title_bottom_spacer',
            'label' => esc_html__('Bottom Spacer', 'loraic' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item-title' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
            ],
        ),
    ),
),
array(
    'name' => 'section_style_desc',
    'label' => esc_html__('Description', 'loraic'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'condition' => [
        'layout' => ['8','2','3','4','5','6','7','9','10','11'],
    ],
    'controls' => array(
        array(
            'name' => 'description_top_spacer',
            'label' => esc_html__('Top Spacer', 'loraic' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--description' => 'margin-top: {{SIZE}}{{UNIT}} !important;',
            ],
        ),
        array(
            'name' => 'description_bottom_spacer',
            'label' => esc_html__('Bottom Spacer', 'loraic' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--description' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
            ],
        ),
        array(
            'name' => 'desc_color',
            'label' => esc_html__('Color', 'loraic' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--description' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'desc_typography',
            'label' => esc_html__('Typography', 'loraic' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-icon-box .pxl-item--description',
        ),
    ),
),
array(
    'name' => 'section_style_icon',
    'label' => esc_html__('Icon', 'loraic'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'p_bd_color_8',
            'label' => esc_html__('Icon Border Color ', 'loraic' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box8 .pxl-item--inner .pxl-item--icon' => 'background-color: {{VALUE}} !important;',
            ],
            'condition' => [
                'layout' => ['8'],
            ],
        ),
        array(
            'name' => 'p_bd_color',
            'label' => esc_html__('Icon Image Border Color ', 'loraic' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon' => 'border-color: {{VALUE}} !important;',
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon i' => 'color: {{VALUE}} ;',
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon:before' => 'border-color: {{VALUE}} ;',
            ],
        ),
        array(
            'name' => 'p_color',
            'label' => esc_html__('Icon Box Color ', 'loraic' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon' => 'background-color: {{VALUE}} !important;',
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon i' => 'color: {{VALUE}} ;',
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon:before' => 'border-color: {{VALUE}} ;',
                '{{WRAPPER}} .pxl-icon-box8 .pxl-item--inner .pxl-item--icon:before' => 'background-color: {{VALUE}} !important;',
                '{{WRAPPER}} .pxl-icon-box6 .pxl-item--inner ' => 'border-color: {{VALUE}} !important;',

            ],
        ),
        array(
            'name' => 'pri_color',
            'label' => esc_html__('Icon Box Color Hover', 'loraic' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box:hover .pxl-item--icon' => 'background-color: {{VALUE}} !important;',
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon i' => 'color: {{VALUE}} ;',
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon:before' => 'border-color: {{VALUE}} ;',
            ],
        ),
        array(
            'name' => 'bgc7_color',
            'label' => esc_html__('Box Icon Color', 'loraic' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box7 .pxl-item--inner i' => 'background-color: {{VALUE}} !important;',
            ],
            'condition' => [
                'layout' => ['7'],
            ],
        ),
        array(
            'name' => 'spl_icon',
            'label' => esc_html__('Icon Space Right', 'loraic' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'deg','px' ],
            'condition' => [
                'layout' => ['1','2','7'],
            ],
            'range' => [
                'deg' => [
                    'min' => 0,
                    'max' => 360,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box i' => 'margin-right:{{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .pxl-icon-box img' => 'margin-right:{{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .pxl-icon-box svg' => 'margin-right:{{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'icon_color',
            'label' => esc_html__('Color', 'loraic' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon i' => 'color: {{VALUE}};text-fill-color: {{VALUE}};-webkit-text-fill-color: {{VALUE}};background-image: none;',
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon svg path' => 'fill: {{VALUE}};',
            ],
            'condition' => [
                'icon_type' => 'icon',
            ],
        ),
        array(
            'name' => 'icon_font_size',
            'label' => esc_html__('Size', 'loraic' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon i' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'icon_type' => 'icon',
            ],
        ),
        array(
            'name' => 'bicon_width',
            'label' => esc_html__('Box Size', 'loraic' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon' => 'min-width: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'icon_height',
            'label' => esc_html__('Height  (Tag i)', 'loraic' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon i' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'icon_type' => 'icon',
            ],
        ),
        array(
            'name' => 'icon_width',
            'label' => esc_html__('Width (Tag i)', 'loraic' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon i' => 'width: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'icon_type' => 'icon',
            ],
        ),
        array(
            'name' => 'icon_img_max_height',
            'label' => esc_html__('Max Height', 'loraic' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-box .pxl-item--icon img' => 'max-height: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'icon_type' => 'image',
            ],
        ),
    ),
),loraic_widget_animation_settings(),
),
),
),loraic_get_class_widget_path()
);