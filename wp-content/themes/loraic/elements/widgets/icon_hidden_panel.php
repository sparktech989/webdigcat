<?php
$templates_df = ['0' => esc_html__('None', 'loraic')];
$templates = $templates_df + Loraic_get_templates_option('hidden-panel') ;
pxl_add_custom_widget(
    array(
        'name' => 'icon_hidden_panel',
        'title' => esc_html__('BR Hidden Panel', 'loraic' ),
        'icon' => 'eicon-menu-bar',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'loraic' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'graviton' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'default',
                            'options' => [
                                'default' => esc_html__('Default', 'loraic' ),
                                'style-2' => esc_html__('Style 2', 'loraic' ),
                            ],
                        ),
                        array(
                            'name' => 'content_template',
                            'label' => esc_html__('Select Template', 'loraic'),
                            'type' => 'select',
                            'options' => $templates,
                            'default' => 'df',
                            'description' => 'Add new tab template: "<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '" target="_blank">Click Here</a>"',
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-hidden-panel-button .pxl-icon-line,{{WRAPPER}} .pxl-hidden-panel-button .pxl-icon-line::before, {{WRAPPER}} .pxl-hidden-panel-button .pxl-icon-line::after' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-hidden-panel-button' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_color_hv',
                            'label' => esc_html__('Icon Color Hover', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-hidden-panel-button:hover .pxl-icon-line,{{WRAPPER}} .pxl-hidden-panel-button:hover .pxl-icon-line::before, {{WRAPPER}} .pxl-hidden-panel-button:hover .pxl-icon-line::after' => 'background-color: {{VALUE}} !important;',
                                '{{WRAPPER}} .pxl-hidden-panel-button:hover' => 'border-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'bg_color',
                            'label' => esc_html__('Background Color', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-hidden-panel-button' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bg_color_hv',
                            'label' => esc_html__('Background Color Hover', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-hidden-panel-button:hover' => 'background-color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    Loraic_get_class_widget_path()
);