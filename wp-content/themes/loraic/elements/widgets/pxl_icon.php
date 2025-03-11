<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_icon',
        'title' => esc_html__('BR Icons', 'loraic'),
        'icon' => 'eicon-alert',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'loraic'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Label', 'loraic'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'condition' => [
                                'style' => ['style-2'],
                            ],
                        ),
                        array(
                            'name' => 'icons',
                            'label' => esc_html__('Icons', 'loraic'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'pxl_icon',
                                    'label' => esc_html__('Icon', 'loraic' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'icon_link',
                                    'label' => esc_html__('Link', 'loraic'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                                
                                // array(
                                //     'name' => 'label_position',
                                //     'label' => esc_html__('Label Position', 'loraic' ),
                                //     'type' => \Elementor\Controls_Manager::SELECT,
                                //     'options' => [
                                //         'ps-top' => 'Top',
                                //         'ps-bottom' => 'Bottom',
                                //     ],
                                //     'default' => 'ps-top',
                                // ),
                                // // array(
                                // //     'name' => 'color_item',
                                // //     'label' => esc_html__( 'Color', 'loraic' ),
                                // //     'type' => \Elementor\Controls_Manager::COLOR,
                                // //     'default' => '',
                                // //     'selectors' => [
                                // //         '{{WRAPPER}} .pxl-icon1 {{CURRENT_ITEM}}' => 'color: {{VALUE}};',
                                // //     ],
                                // // ),
                                // // array(
                                // //     'name' => 'color_item_hover',
                                // //     'label' => esc_html__( 'Color Hover', 'loraic' ),
                                // //     'type' => \Elementor\Controls_Manager::COLOR,
                                // //     'default' => '',
                                // //     'selectors' => [
                                // //         '{{WRAPPER}} .pxl-icon1 {{CURRENT_ITEM}}:hover' => 'color: {{VALUE}} !  ;',
                                // //     ],
                                // // ),
                            ),
                        ),
                        array(
                          'name' => 'align',
                          'label' => esc_html__( 'Alignment', 'loraic' ),
                          'type' => \Elementor\Controls_Manager::CHOOSE,
                          'control_type' => 'responsive',
                          'options' => [
                            'left' => [
                                'title' => esc_html__( 'Left', 'loraic' ),
                                'icon' => 'eicon-text-align-left',
                            ],
                            'center' => [
                                'title' => esc_html__( 'Center', 'loraic' ),
                                'icon' => 'eicon-text-align-center',
                            ],
                            'right' => [
                                'title' => esc_html__( 'Right', 'loraic' ),
                                'icon' => 'eicon-text-align-right',
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .pxl-icon1' => 'text-align: {{VALUE}};',
                        ],
                    ),
                    ),
),

array(
    'name' => 'section_style',
    'label' => esc_html__('Style', 'loraic'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'style',
            'label' => esc_html__('Style', 'loraic' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'style-default' => 'Default',
                'style-2' => 'Style 2',
                'style-round-box' => 'Round Box',
                'style-square-box' => 'Square Box',
            ],
            'default' => 'style-default',
        ),
        array(
            'name' => 'color',
            'label' => esc_html__( 'Color', 'loraic' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-icon1 a' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'color_hover',
            'label' => esc_html__( 'Icon Color Hover', 'loraic' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-icon1 a:hover' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'box_color',
            'label' => esc_html__( 'Box Color', 'loraic' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-icon1.style-round-box a, {{WRAPPER}} .pxl-icon1.style-square-box a' => 'border-color: {{VALUE}};',
                '{{WRAPPER}} .pxl-icon1.style-round-box a, {{WRAPPER}} .pxl-icon1.style-square-box a' => 'background-color: {{VALUE}}  ;',
            ],
            'condition' => [
                'style' => ['style-round-box','style-square-box'],
            ],
        ),
        array(
            'name' => 'bd_color',
            'label' => esc_html__( 'Boder Color', 'loraic' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-icon1.style-round-box a, {{WRAPPER}} .pxl-icon1.style-square-box a' => 'border-color: {{VALUE}};',
            ],
            'condition' => [
                'style' => ['style-round-box','style-square-box'],
            ],
        ),
        array(
            'name' => 'box_color_hover_type',
            'label' => esc_html__('Box Color Hover Type', 'loraic' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'color' => 'Color',
                'gradient' => 'Gradient',
            ],
            'default' => 'color',
        ),
        array(
            'name' => 'box_color_hover',
            'label' => esc_html__( 'Box Color Hover', 'loraic' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-icon1.style-round-box a:hover, {{WRAPPER}} .pxl-icon1.style-square-box a:hover' => 'background-color: {{VALUE}} !important;border-color: {{VALUE}};',
            ],
            'condition' => [
                'style' => ['style-round-box','style-square-box'],
                'box_color_hover_type' => ['color'],
            ],
        ),
        array(
            'name' => 'box_color_hover_from',
            'label' => esc_html__( 'Box Color Hover - From', 'loraic' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-icon1' => '--gradient-color-from: {{VALUE}};',
            ],
            'condition' => [
                'style' => ['style-round-box','style-square-box'],
                'box_color_hover_type' => ['gradient'],
            ],
        ),
        array(
            'name' => 'box_color_hover_to',
            'label' => esc_html__( 'Box Color Hover - To', 'loraic' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-icon1' => '--gradient-color-to: {{VALUE}};',
            ],
            'condition' => [
                'style' => ['style-round-box','style-square-box'],
                'box_color_hover_type' => ['gradient'],
            ],
        ),
        array(
            'name' => 'box_height',
            'label' => esc_html__('Box Height', 'loraic' ),
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
                '{{WRAPPER}} .pxl-icon1 a' => 'height: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'style' => ['style-round-box','style-square-box'],
            ],
        ),
        array(
            'name' => 'box_width',
            'label' => esc_html__('Box Width', 'loraic' ),
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
                '{{WRAPPER}} .pxl-icon1 a' => 'width: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'style' => ['style-round-box','style-square-box'],
            ],
        ),
        array(
            'name' => 'icon_font_size',
            'label' => esc_html__('Font Size', 'loraic' ),
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
                '{{WRAPPER}} .pxl-icon1 a' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'icon_space',
            'label' => esc_html__('Spacer (Left/Right)', 'loraic' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'default' => [
                'size' => 6,
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-icon1 a' => 'margin: 0 {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'icon_space_bottom',
            'label' => esc_html__('Spacer (Bottom)', 'loraic' ),
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
                '{{WRAPPER}} .pxl-icon1 a' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
            ],
        ),
    ),
),
loraic_widget_animation_settings(),
),
),
),
loraic_get_class_widget_path()
);