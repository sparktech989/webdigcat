<?php
$templates = loraic_get_templates_option('tab', []) ;
pxl_add_custom_widget(
    array(
        'name' => 'pxl_tabs',
        'title' => esc_html__( 'BR Tabs', 'loraic' ),
        'icon' => 'eicon-tabs',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'loraic-tabs'
        ),
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_tabs/layout-image/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'loraic' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_tabs/layout-image/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'loraic' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_tabs/layout-image/layout3.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_content',
                    'label' => esc_html__( 'Tabs', 'loraic' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'tab_active',
                            'label' => esc_html__( 'Active Tab', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 1,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'tabs',
                            'label' => esc_html__( 'Content', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'pxl_icon_tab',
                                    'label' => esc_html__('Icon', 'loraic' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__( 'Title', 'loraic' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'content_type',
                                    'label' => esc_html__('Content Type', 'loraic'),
                                    'type' => 'select',
                                    'options' => [
                                        'df' => esc_html__( 'Default', 'loraic' ),
                                        'template' => esc_html__( 'From Template Builder', 'loraic' )
                                    ],
                                    'default' => 'df' 
                                ),
                                array(
                                    'name' => 'desc',
                                    'label' => esc_html__( 'Content', 'loraic' ),
                                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                                    'condition' => ['content_type' => 'df'] 
                                ),
                                array(
                                    'name' => 'content_template',
                                    'label' => esc_html__('Select Templates', 'loraic'),
                                    'type' => 'select',
                                    'options' => $templates,
                                    'default' => 'df',
                                    'description' => 'Add new tab template: "<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '" target="_blank">Click Here</a>"',
                                    'condition' => ['content_type' => 'template'] 
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style',
                    'label' => esc_html__( 'Style', 'loraic' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'bf_color',
                            'label' => esc_html__('Before Color', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => ['layout' => '3'], 
                            'selectors' => [
                                '{{WRAPPER}} .pxl-tabs .pxl-tabs--content:before' => 'background-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'bg_color',
                            'label' => esc_html__('Background Color ', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-tabs .pxl-tabs--title > .pxl-item--title' => 'background-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'bg_at_color',
                            'label' => esc_html__('Background Color Title Active', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-tabs .pxl-tabs--title > .pxl-item--title.active' => 'background-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'top_space',
                            'label' => esc_html__('Space Top Content', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-tabs--content ' => 'top: {{SIZE}}{{UNIT}} ;',
                            ],
                        ),
                        array(
                            'name' => 'tab_effect',
                            'label' => esc_html__('Effect', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'tab-effect-slide' => 'Slide',
                                'tab-effect-fade' => 'Fade',
                            ],
                            'default' => 'tab-effect-slide',
                        ),

                        array(
                            'name' => 'bd_ic_color',
                            'label' => esc_html__('Border Title Color', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-tabs .pxl-tabs--title > .pxl-item--title ' => 'border-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'bd_ic_color_at',
                            'label' => esc_html__('Border Title Color Active', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-tabs .pxl-tabs--title > .pxl-item--title.active' => 'border-color: {{VALUE}} !important;',
                            ],
                        ),

                        array(
                            'name' => 'ic_color',
                            'label' => esc_html__('Icon Color', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-tabs .pxl-tabs--title > .pxl-item--title i' => 'color: {{VALUE}} !important;',
                                '{{WRAPPER}} .pxl-tabs .pxl-tabs--title > .pxl-item--title svg path' => 'fill: {{VALUE}} !important;',
                            ],
                        ),

                        array(
                            'name' => 'ic_color_at',
                            'label' => esc_html__('Icon Color Active', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-tabs .pxl-tabs--title > .pxl-item--title.active i' => 'color: {{VALUE}} !important;',
                                '{{WRAPPER}} .pxl-tabs .pxl-tabs--title > .pxl-item--title.active svg path' => 'fill: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-tabs .pxl-tabs--title > .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_active_color',
                            'label' => esc_html__('Title Active Color', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-tabs .pxl-item--title.active' => 'color: {{VALUE}};',
                            ],
                         ),
                        // array(
                        //     'name' => 'btn_color',
                        //     'label' => esc_html__('Background Button Color', 'loraic' ),
                        //     'type' => \Elementor\Controls_Manager::COLOR,
                        //     'selectors' => [
                        //         '{{WRAPPER}} .pxl-tabs .pxl-item--title:nth-child(1):before' => 'background-color: {{VALUE}};',
                        //     ],
                        // ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'loraic' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-tabs .pxl-tabs--title > .pxl-item--title',
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'content_color',
                            'label' => esc_html__('Content Color', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-tabs .pxl-item--content' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'content_typography',
                            'label' => esc_html__('Content Typography', 'loraic' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-tabs .pxl-item--content',
                        ),
                    ),
                ),
                loraic_widget_animation_settings(),
            ),
),
),
loraic_get_class_widget_path()
);