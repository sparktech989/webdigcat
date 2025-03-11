<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_accordion',
        'title' => esc_html__('BR Accordion', 'loraic' ),
        'icon' => 'eicon-accordion',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'loraic-accordion'
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'loraic' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'active',
                            'label' => esc_html__('Active', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'separator' => 'after',
                            'default' => '1',
                        ),
                        array(
                            'name' => 'accordion',
                            'label' => esc_html__('Accordion', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'loraic' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'desc',
                                    'label' => esc_html__('Content', 'loraic' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 10,
                                ),
                                array(
                                    'name' => 'pxl_icon',
                                    'label' => esc_html__('Icon', 'loraic' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                            'separator' => 'after',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_title',
                    'label' => esc_html__('Title', 'loraic' ),
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
                            'name' => 'ic_cl',
                            'label' => esc_html__('Icon Color', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .icon-plus:before,{{WRAPPER}} .pxl-accordion .icon-plus:after' => 'background-color: {{VALUE}} ;',
                            ],
                        ),
                        array(
                            'name' => 'ic_cl_at',
                            'label' => esc_html__('Icon Color Active', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .active .icon-plus:before,{{WRAPPER}} .pxl-accordion .active .icon-plus:after' => 'background-color: {{VALUE}} ;',
                            ],
                        ),
                        array(
                            'name' => 'bg_ic_cl',
                            'label' => esc_html__('Background Icon Color', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .icon-plus,{{WRAPPER}} .pxl-accordion .icon-plus' => 'background-color: {{VALUE}} ;',
                            ],
                        ),
                        array(
                            'name' => 'bg_ic_cl_at',
                            'label' => esc_html__('Background Icon Color Active', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .active .icon-plus,{{WRAPPER}} .pxl-accordion .active .icon-plus' => 'background-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'bd_cl',
                            'label' => esc_html__('Border Color', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .pxl-item--title' => 'border-color: {{VALUE}} ;',
                            ],
                        ),
                        array(
                            'name' => 'bd_cl_at',
                            'label' => esc_html__('Border Color Active', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .active .pxl-item--title' => 'background-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'bg_tl_cl',
                            'label' => esc_html__('Background Color', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .pxl-item--title' => 'background-color: {{VALUE}} ;',
                            ],
                        ),
                        array(
                            'name' => 'bg_tl_cl_at',
                            'label' => esc_html__('Background Color Active', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .active .pxl-item--title' => 'background-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Color', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'loraic' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-accordion .pxl-item--title',
                        ),
                        array(
                            'name' => 'bsd',
                            'label' => esc_html__('Box Shadow', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',

                        ),
                        array(
                            'name' => 'bsd_tl',
                            'label' => esc_html__( 'Box Shadow', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::BOX_SHADOW,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .pxl-item--title' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{box_shadow_position.VALUE}};',
                            ],
                            'condition' => [
                                'bsd' => 'true',
                            ],
                        ),
                        
                    ),
),
array(
    'name' => 'section_style_content',
    'label' => esc_html__('Content', 'loraic' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'content_color',
            'label' => esc_html__('Color', 'loraic' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-accordion .pxl-item--content' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'desc_typography',
            'label' => esc_html__('Typography', 'loraic' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-accordion .pxl-item--content',
        ),
    ),
),
loraic_widget_animation_settings(),
),
),
),
loraic_get_class_widget_path()
);