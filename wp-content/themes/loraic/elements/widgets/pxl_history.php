<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_history',
        'title' => esc_html__('BR History', 'loraic'),
        'icon' => 'eicon-editor-link',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
               array(
                'name' => 'section_layout',
                'label' => esc_html__('Layout', 'loraic' ),
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
                                'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_history/layout1.jpg'
                            ],
                            '2' => [
                                'label' => esc_html__('Layout 2', 'loraic' ),
                                'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_history/layout2.jpg'
                            ],
                        ],
                    ),
                ),
            ),
               array(
                'name' => 'section_content',
                'label' => esc_html__('Content', 'loraic'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'layout' => ['1'],
                ],
                'controls' => array(
                    array(
                        'name' => 'history',
                        'label' => esc_html__('History', 'loraic'),
                        'type' => \Elementor\Controls_Manager::REPEATER,
                        'controls' => array(
                            array(
                                'name' => 'step',
                                'label' => esc_html__('Step', 'loraic'),
                                'type' => \Elementor\Controls_Manager::TEXT,
                                'label_block' => true,
                            ),
                            array(
                                'name' => 'date',
                                'label' => esc_html__('Date', 'loraic'),
                                'type' => \Elementor\Controls_Manager::TEXT,
                                'label_block' => true,
                            ),
                            array(
                                'name' => 'subtitle',
                                'label' => esc_html__('SubTitle', 'loraic'),
                                'type' => \Elementor\Controls_Manager::TEXT,
                                'label_block' => true,
                            ),
                            array(
                                'name' => 'text',
                                'label' => esc_html__('Title', 'loraic'),
                                'type' => \Elementor\Controls_Manager::TEXTAREA,
                                'label_block' => true,
                            ),
                            array(
                                'name' => 'decs',
                                'label' => esc_html__('Description', 'loraic'),
                                'type' => \Elementor\Controls_Manager::TEXTAREA,
                                'label_block' => true,
                            ),
                            array(
                                'name' => 'space_bottom',
                                'label' => esc_html__('Space Top', 'loraic' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px', '%' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 100,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} {{CURRENT_ITEM}} ' => 'margin-top: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                        ),
                        'title_field' => '{{{ text }}}',
                    ),
                ),
            ),
               array(
                'name' => 'section_content_2',
                'label' => esc_html__('Content', 'loraic'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'layout' => ['2'],
                ],
                'controls' => array(
                    array(
                        'name' => 'history_2',
                        'label' => esc_html__('List', 'loraic'),
                        'type' => \Elementor\Controls_Manager::REPEATER,
                        'controls' => array(
                            array(
                                'name' => 'pxl_icon',
                                'label' => esc_html__('Icon', 'loraic' ),
                                'type' => \Elementor\Controls_Manager::ICONS,
                                'fa4compatibility' => 'icon',
                            ),
                            array(
                                'name' => 'text_2',
                                'label' => esc_html__('Title', 'loraic'),
                                'type' => \Elementor\Controls_Manager::TEXTAREA,
                                'label_block' => true,
                            ),
                            array(
                                'name' => 'decs_2',
                                'label' => esc_html__('Description', 'loraic'),
                                'type' => \Elementor\Controls_Manager::TEXTAREA,
                                'label_block' => true,
                            ),

                        ),
                        'title_field' => '{{{ text_2 }}}',
                    ),
                ),
            ),
               array(
                'name' => 'section_style_date',
                'label' => esc_html__('Date', 'loraic'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'layout' => ['1'],
                ],
                'controls' => array(
                    array(
                        'name' => 'date_typography',
                        'label' => esc_html__('Date Typography', 'loraic' ),
                        'type' => \Elementor\Group_Control_Typography::get_type(),
                        'control_type' => 'group',
                        'selector' => '{{WRAPPER}} .pxl-history .date',
                    ),
                    array(
                        'name' => 'date_color',
                        'label' => esc_html__('Date Color ', 'loraic' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .pxl-history .date' => 'color: {{VALUE}};',
                        ],
                    ),
                ),
            ),
               array(
                'name' => 'section_style_subtitle',
                'label' => esc_html__('Subtitle', 'loraic'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'layout' => ['1'],
                ],
                'controls' => array(
                    array(
                        'name' => 'subtitle_typography',
                        'label' => esc_html__('Title Typography', 'loraic' ),
                        'type' => \Elementor\Group_Control_Typography::get_type(),
                        'control_type' => 'group',
                        'selector' => '{{WRAPPER}} .pxl-history .subtitle',
                    ),
                    array(
                        'name' => 'subtitle_color',
                        'label' => esc_html__('Description Color ', 'loraic' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .pxl-history .subtitle' => 'color: {{VALUE}};',
                        ],
                    ),
                ),
            ),
               array(
                'name' => 'section_style_title',
                'label' => esc_html__('Title', 'loraic'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'controls' => array(
                    array(
                        'name' => 'title_typography',
                        'label' => esc_html__('Title Typography', 'loraic' ),
                        'type' => \Elementor\Group_Control_Typography::get_type(),
                        'control_type' => 'group',
                        'selector' => '{{WRAPPER}} .pxl-history .title',
                    ),
                    array(
                        'name' => 'title_color',
                        'label' => esc_html__('Title Color ', 'loraic' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .pxl-history .title' => 'color: {{VALUE}};',
                        ],
                    ),
                ),
            ),
               array(
                'name' => 'section_style_ic',
                'label' => esc_html__('Icon', 'loraic'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'controls' => array(
                    array(
                        'name' => 'ic_color',
                        'label' => esc_html__('Title Color ', 'loraic' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .pxl-history i' => 'color: {{VALUE}};',
                            '{{WRAPPER}} .pxl-history svg path' => 'fill: {{VALUE}};',
                        ],
                    ),
                ),
            ),
               array(
                'name' => 'section_style_desc',
                'label' => esc_html__('Description', 'loraic'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'controls' => array(
                    array(
                        'name' => 'desc_typography',
                        'label' => esc_html__('Description Typography', 'loraic' ),
                        'type' => \Elementor\Group_Control_Typography::get_type(),
                        'control_type' => 'group',
                        'selector' => '{{WRAPPER}} .pxl-history .desc',
                    ),
                    array(
                        'name' => 'desc_color',
                        'label' => esc_html__('Description Color ', 'loraic' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .pxl-history .desc' => 'color: {{VALUE}};',
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