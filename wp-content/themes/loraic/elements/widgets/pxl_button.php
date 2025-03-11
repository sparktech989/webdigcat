<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_button',
        'title' => esc_html__('BR Button', 'loraic' ),
        'icon' => 'eicon-button',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'loraic' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'btn_style',
                            'label' => esc_html__('Type', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'btn-default',
                            'options' => [
                                'btn-default' => esc_html__('Default', 'loraic' ),
                                'btn-primary' => esc_html__('Primary', 'loraic' ),
                            ],
                        ),
                        array(
                            'name' => 'btn_width',
                            'label' => esc_html__('Width', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'inline',
                            'options' => [
                                'inline' => esc_html__('Inline', 'loraic' ),
                                'full' => esc_html__('Full Width', 'loraic' ),
                            ],
                        ),
                        array(
                            'name' => 'text',
                            'label' => esc_html__('Text', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('Click Here', 'loraic'),
                        ),
                        array(
                            'name' => 'link',
                            'label' => esc_html__('Link', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'default' => [
                                'url' => '#',
                            ],
                        ),
                        array(
                            'name' => 'align',
                            'label' => esc_html__('Alignment', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left'    => [
                                    'title' => esc_html__('Left', 'loraic' ),
                                    'icon' => 'fa fa-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__('Center', 'loraic' ),
                                    'icon' => 'fa fa-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__('Right', 'loraic' ),
                                    'icon' => 'fa fa-align-right',
                                ],
                                'justify' => [
                                    'title' => esc_html__('Justified', 'loraic' ),
                                    'icon' => 'fa fa-align-justify',
                                ],
                            ],
                            'prefix_class' => 'elementor-align-',
                            'default' => '',
                            'selectors'         => [
                                '{{WRAPPER}} .pxl-button' => 'text-align: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'btn_icon',
                            'label' => esc_html__('Icon', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'label_block' => true,
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'btn_style' => ['btn-default','btn-primary','btn-white-shadow','btn-icon-box','btn-icon-box2'],
                            ],
                        ),
                        array(
                            'name' => 'icon_align',
                            'label' => esc_html__('Icon Position', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'left',
                            'options' => [
                                'left' => esc_html__('Before', 'loraic' ),
                                'right' => esc_html__('After', 'loraic' ),
                            ],
                            'condition' => [
                                'btn_style' => ['btn-default','btn-primary','btn-white-shadow','btn-icon-box','btn-icon-box2'],
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style_button',
                    'label' => esc_html__('Button Normal', 'loraic' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'color',
                            'label' => esc_html__('Color', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'color: {{VALUE}} ;',
                            ],
                        ),
                        array(
                            'name' => 'ic_color',
                            'label' => esc_html__('Color Hover', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn:hover i' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_color',
                            'label' => esc_html__('Background Color', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .btn-default:before' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .btn-default:after' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'btn_style' => ['btn-default','btn-primary','btn-white-shadow','btn-icon-box'],
                            ],
                        ),

                        array(
                            'name' => 'btn_bg_color_from',
                            'label' => esc_html__( 'Background Color - From', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn-icon-box2' => '--gradient-color-from: {{VALUE}};',
                            ],
                            'condition' => [
                                'btn_style' => ['btn-icon-box2'],
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_color_to',
                            'label' => esc_html__( 'Background Color - To', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn-icon-box2' => '--gradient-color-to: {{VALUE}};',
                            ],
                            'condition' => [
                                'btn_style' => ['btn-icon-box2'],
                            ],
                        ),

                        array(
                            'name' => 'btn_typography',
                            'label' => esc_html__('Typography', 'loraic' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-button .btn',
                        ),
                        array(
                            'name'         => 'btn_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'loraic' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-button .btn',
                            'condition' => [
                                'btn_style' => ['btn-default','btn-primary','btn-white-shadow','btn-icon-box','btn-icon-box2'],
                            ],
                        ),
                        array(
                            'name' => 'border_type',
                            'label' => esc_html__( 'Border Type', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => esc_html__( 'None', 'loraic' ),
                                'solid' => esc_html__( 'Solid', 'loraic' ),
                                'double' => esc_html__( 'Double', 'loraic' ),
                                'dotted' => esc_html__( 'Dotted', 'loraic' ),
                                'dashed' => esc_html__( 'Dashed', 'loraic' ),
                                'groove' => esc_html__( 'Groove', 'loraic' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'border-style: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'btn_style' => ['btn-default','btn-primary','btn-white-shadow'],
                            ],
                        ),
                        array(
                            'name' => 'border_width',
                            'label' => esc_html__( 'Border Width', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                            'responsive' => true,
                        ),
                        array(
                            'name' => 'border_color',
                            'label' => esc_html__( 'Border Color', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'border-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                        ),
                        array(
                            'name' => 'btn_border_radius',
                            'label' => esc_html__('Border Radius', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-button .btn i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [
                                'btn_style' => ['btn-default','btn-primary','btn-white-shadow','btn-icon-box','btn-icon-box2'],
                            ],
                        ),
                        array(
                            'name' => 'btn_padding',
                            'label' => esc_html__('Padding', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                            'condition' => [
                                'btn_style' => ['btn-default','btn-primary','btn-white-shadow','btn-icon-box','btn-icon-box2'],
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style_button_hover',
                    'label' => esc_html__('Button Hover', 'loraic' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'color_hover',
                            'label' => esc_html__('Color Hover', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn:hover, {{WRAPPER}} .pxl-button .btn:focus' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bd_color_hover',
                            'label' => esc_html__('Border Color Hover', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn:hover, {{WRAPPER}} .pxl-button .btn:focus' => 'border-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_color_hover',
                            'label' => esc_html__('Background Color', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn:hover,{{WRAPPER}} .pxl-button .btn:focus' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'btn_style' => ['btn-default','btn-primary','btn-white-shadow','btn-icon-box'],
                            ],
                        ),
                        array(
                            'name'         => 'btn_box_shadow_hover',
                            'label' => esc_html__( 'Box Shadow', 'loraic' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-button .btn:hover,{{WRAPPER}} .pxl-button .btn:focus',
                            'condition' => [
                                'btn_style' => ['btn-default','btn-primary','btn-white-shadow','btn-icon-box','btn-icon-box2'],
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style_icon',
                    'label' => esc_html__('Icon', 'loraic' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'ic_style',
                            'label' => esc_html__('Icon', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'btn-default',
                            'options' => [
                                'ic-default' => esc_html__('Default', 'loraic' ),
                                'ic-absolute' => esc_html__('Icon Position Absolute', 'loraic' ),
                            ],
                        ),
                        array(
                            'name' => 'type_position',
                            'label' => esc_html__('Position', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'top-left' => 'Top Left',
                                'bottom-left' => 'Bottom Left',
                                'top-right' => 'Top Right',
                                'bottom-right' => 'Bottom Right',
                            ],
                            'default' => 'top-left',
                        ),
                        array(
                            'name' => 'top_positioon',
                            'label' => esc_html__('Top Position', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'default' => [
                                'size' => 0,
                                'unit' => '%',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => -100,
                                    'max' => 100,
                                ],
                            ],
                            'condition' => [
                                'type_position' => ['top-left', 'top-right'],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button i' => 'top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'left_positioon',
                            'label' => esc_html__('Left Position', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'default' => [
                                'size' => 0,
                                'unit' => '%',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => -100,
                                    'max' => 100,
                                ],
                            ],
                            'condition' => [
                                'type_position' => ['top-left','bottom-left'],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button i' => 'left: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'bottom_positioon',
                            'label' => esc_html__('Bottom Position', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'default' => [
                                'size' => 0,
                                'unit' => '%',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => -100,
                                    'max' => 100,
                                ],
                            ],
                            'condition' => [
                                'type_position' => ['bottom-left','bottom-right'],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button i' => 'bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'right_positioon',
                            'label' => esc_html__('Right Position', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'default' => [
                                'size' => 0,
                                'unit' => '%',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => -100,
                                    'max' => 100,
                                ],
                            ],
                            'condition' => [
                                'type_position' => ['top-right', 'bottom-right'],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button i' => 'right: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'size-box-ic',
                            'label' => esc_html__('Box Icon Size', 'loraic' ),
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
                                '{{WRAPPER}} .pxl-button i' => 'width: {{SIZE}}{{UNIT}} !important ; height: {{SIZE}}{{UNIT}} !important;',
                            ],
                            'condition' => [
                                'ic_style' => ['ic-absolute'],
                            ],
                        ),
                        array(
                            'name' => 'box-ic-color',
                            'label' => esc_html__('Box Icon Color', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button i' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'ic_style' => ['ic-absolute'],
                            ],
                        ),
                        array(
                            'name' => 'box-ic-color-hv',
                            'label' => esc_html__('Box Icon Color Hover', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button:hover i' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'ic_style' => ['ic-absolute'],
                            ],
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Color', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn i' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'btn_style' => ['btn-default','btn-primary','btn-white-shadow','btn-icon-box','btn-icon-box2'],
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
                                '{{WRAPPER}} .pxl-button .btn i' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'btn_style' => ['btn-default','btn-primary','btn-white-shadow','btn-icon-box','btn-icon-box2'],
                            ],
                        ),
                        array(
                            'name' => 'icon_space_top',
                            'label' => esc_html__('Icon Spacer Top', 'loraic' ),
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
                                'size' => 9,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .pxl-icon--left i' => 'margin-top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_space_left',
                            'label' => esc_html__('Icon Spacer', 'loraic' ),
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
                                'size' => 9,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .pxl-icon--left i' => 'margin-right: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'icon_align' => ['left'],
                                'btn_style' => ['btn-default','btn-primary','btn-white-shadow','btn-icon-box','btn-icon-box2'],
                            ],
                        ),
                        array(
                            'name' => 'icon_space_right',
                            'label' => esc_html__('Icon Spacer', 'loraic' ),
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
                                'size' => 9,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .pxl-icon--right i' => 'margin-left: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'icon_align' => ['right'],
                                'btn_style' => ['btn-default','btn-primary','btn-white-shadow','btn-icon-box','btn-icon-box2'],
                            ],
                        ),
                        array(
                            'name' => 'icon_box_color_from',
                            'label' => esc_html__( 'Box Color - From', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn-icon-box' => '--gradient-color-from: {{VALUE}};',
                            ],
                            'condition' => [
                                'btn_style' => ['btn-icon-box'],
                            ],
                        ),
                        array(
                            'name' => 'icon_box_color_to',
                            'label' => esc_html__( 'Box Color - To', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn-icon-box' => '--gradient-color-to: {{VALUE}};',
                            ],
                            'condition' => [
                                'btn_style' => ['btn-icon-box'],
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