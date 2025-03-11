<?php 
/* Start Section */
add_action( 'elementor/element/section/section_structure/after_section_end', 'loraic_add_custom_section_controls' ); 
add_action( 'elementor/element/section/section_structure/after_section_end', 'loraic_add_custom_section_overlay_color' ); 
add_action( 'elementor/element/section/section_structure/after_section_end', 'loraic_add_custom_section_overlay_img' ); 
add_action( 'elementor/element/section/section_structure/after_section_end', 'loraic_add_custom_section_divider' ); 
add_action( 'elementor/element/section/section_structure/after_section_end', 'loraic_add_custom_section_particles' );
function loraic_add_custom_section_controls( \Elementor\Element_Base $element) {
     
    $element->start_controls_section(
        'section_pxl',
        [
            'label' => esc_html__( 'Loraic General Settings', 'loraic' ),
            'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
        ]
    );

    $element->add_control(
        'row_scroll_fixed',
        [
            'label'   => esc_html__( 'Column Fixed', 'loraic' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                'none'        => esc_html__( 'No', 'loraic' ),
                'fixed'   => esc_html__( 'Yes', 'loraic' ),
            ),
            'prefix_class' => 'pxl-row-scroll-',
            'default'      => 'none',      
        ]
    );

    $element->add_control(
        'full_content_with_space',
        [
          'label' => esc_html__( 'Full Content with space from?', 'loraic' ),
          'type'         => \Elementor\Controls_Manager::SELECT,
                'prefix_class' => 'pxl-full-content-with-space-',
                'options'      => array(
                    'none'    => esc_html__( 'None', 'loraic' ),
                    'start'   => esc_html__( 'Start', 'loraic' ),
                    'end'     => esc_html__( 'End', 'loraic' ),
                ),
                'default'      => 'none',
                'condition' => [
                    'layout' => 'full_width'
                ]
        ]
    );
       
    $element->add_control(
        'pxl_container_width',
        [
                'label' => esc_html__('Container Width', 'loraic'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 1200,
                'condition' => [
                  'layout' => 'full_width',
                    'full_content_with_space!' => 'none'
                ]           
        ]
    );

    $element->add_control(
        'pxl_section_overflow',
        [
            'label'   => esc_html__( 'Overflow', 'loraic' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                'visible'        => esc_html__( 'Visible', 'loraic' ),
                'hidden'   => esc_html__( 'Hidden', 'loraic' ),
            ),
            'default'      => 'visible', 
            'separator' => 'after',
            'prefix_class' => 'pxl-section-overflow-'     
        ]
    );
      
    $element->end_controls_section();
};
function loraic_add_custom_section_overlay_color( \Elementor\Element_Base $element) {
     
    $element->start_controls_section(
        'section_overlay_color',
        [
            'label' => esc_html__( 'Loraic Overlay Color', 'loraic' ),
            'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
        ]
    );
 
    $element->add_control(
        'pxl_color_offset',
        [
            'label'   => esc_html__( 'Overlay Color', 'loraic' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                'none'        => esc_html__( 'No', 'loraic' ),
                'left'   => esc_html__( 'Left Space', 'loraic' ),
                'right'   => esc_html__( 'Right Space', 'loraic' ),
                'skew'   => esc_html__( 'Skew', 'loraic' ),
            ),
            'prefix_class' => 'pxl-bg-color-',
            'default'      => 'none',
        ]
    );

    $element->add_control(
        'overlay_left_space',
        [
            'label' => esc_html__('Overlay Left Space', 'loraic' ),
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
                '{{WRAPPER}}.pxl-bg-color-left::before' => 'left: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'pxl_color_offset' => ['left'],
            ],
        ]
    );

    $element->add_control(
        'overlay_right_space',
        [
            'label' => esc_html__('Overlay Right Space', 'loraic' ),
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
                '{{WRAPPER}}.pxl-bg-color-right::before' => 'right: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'pxl_color_offset' => ['right'],
            ],
        ]
    );

    $element->add_control(
        'offset_color',
        [
            'label' => esc_html__('Overlay Color', 'loraic' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}.pxl-bg-color-left:before, {{WRAPPER}}.pxl-bg-color-right:before, {{WRAPPER}}.pxl-bg-color-skew:before' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'pxl_color_offset' => ['left','right','skew'],
            ],
        ]
    );

    $element->add_control(
        'overlay_broder_radius',
        [
            'label' => esc_html__('Overlay Border Radius', 'loraic' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'control_type' => 'responsive',
            'selectors' => [
                '{{WRAPPER}}.pxl-bg-color-left:before, {{WRAPPER}}.pxl-bg-color-right:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'pxl_color_offset' => ['left','right'],
            ],
        ]
    );
      
    $element->end_controls_section();
};

function loraic_add_custom_section_overlay_img( \Elementor\Element_Base $element) {
     
    $element->start_controls_section(
        'section_overlay_img',
        [
            'label' => esc_html__( 'Loraic Overlay Image', 'loraic' ),
            'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
        ]
    );
 
    $element->add_control(
        'pxl_overlay_display',
        [
            'label'   => esc_html__( 'Overlay Image', 'loraic' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                'none'        => esc_html__( 'No', 'loraic' ),
                'image'   => esc_html__( 'Yes', 'loraic' ),
            ),
            'prefix_class' => 'pxl-section-overlay-',
            'default'      => 'none',
        ]
    );

    $element->add_control(
        'pxl_overlay_img',
        [
            'label'   => esc_html__( 'Select Image', 'loraic' ),
            'type'    => \Elementor\Controls_Manager::MEDIA,
            'condition' => [
                'pxl_overlay_display' => ['image'],
            ],
        ]
    );
      
    $element->end_controls_section();
};

function loraic_add_custom_section_divider( \Elementor\Element_Base $element) {
     
    $element->start_controls_section(
        'section_divider',
        [
            'label' => esc_html__( 'Loraic Divider', 'loraic' ),
            'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
        ]
    );
 
    $element->add_control(
        'row_divider',
        [
            'label'   => esc_html__( 'Divider', 'loraic' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                ''        => esc_html__( 'None', 'loraic' ),
                'angle-top'   => esc_html__( 'Angle Top Left', 'loraic' ),
                'angle-top-right'   => esc_html__( 'Angle Top Right', 'loraic' ),
                'angle-bottom-left'   => esc_html__( 'Angle Bottom Left', 'loraic' ),
                'angle-bottom'   => esc_html__( 'Angle Bottom Right', 'loraic' ),
                'angle-top-bottom'   => esc_html__( 'Angle Top & Bottom Right', 'loraic' ),
                'angle-top-bottom-left'   => esc_html__( 'Angle Top & Bottom Left', 'loraic' ),
                'wave-animation-top'   => esc_html__( 'Wave Animation Top', 'loraic' ),
                'wave-animation-bottom'   => esc_html__( 'Wave Animation Bottom 1', 'loraic' ),
                'wave-animation-bottom2'   => esc_html__( 'Wave Animation Bottom 2', 'loraic' ),
                'curved-top'   => esc_html__( 'Curved Top', 'loraic' ),
                'curved-bottom'   => esc_html__( 'Curved Bottom', 'loraic' ),
                'vertical1'   => esc_html__( 'Divider Vertical', 'loraic' ),
            ),
            'prefix_class' => 'pxl-row-divider-active pxl-row-divider-',
            'default'      => '',
        ]
    );

    $element->add_control(
        'divider_color',
        [
            'label' => esc_html__('Divider Color', 'loraic' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-row-angle, {{WRAPPER}} .pxl-wave-parallax > use' => 'background-color: {{VALUE}} !important;',
                '{{WRAPPER}} .pxl-divider-vertical > div' => 'background-color: {{VALUE}} !important;',
            ],
        ]
    );

    $element->add_responsive_control(
        'divider_height',
        [
            'label' => esc_html__('Divider Height', 'loraic' ),
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
                '{{WRAPPER}} .pxl-row-angle, {{WRAPPER}} .pxl-section-waves' => 'height: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'row_divider!' => ['vertical1'],
            ],     
        ]
    );
      
    $element->end_controls_section();
};

function loraic_add_custom_section_particles( \Elementor\Element_Base $element) {
     
    $element->start_controls_section(
        'section_particles',
        [
            'label' => esc_html__( 'Loraic Particles', 'loraic' ),
            'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
        ]
    );

    $element->add_control(
        'row_particles_display',
        [
            'label'   => esc_html__( 'Particles', 'loraic' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'false',  
        ]
    );

    $element->add_control(
        'number',
        [
                'label' => esc_html__('Number', 'loraic'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 4,      
                'condition' => [
                    'row_particles_display' => ['yes'],
                ],     
        ]
    );

    $element->add_control(
        'size',
        [
                'label' => esc_html__('Size', 'loraic'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 3, 
                'condition' => [
                    'row_particles_display' => ['yes'],
                ],           
        ]
    );

    $element->add_control(
        'size_random',
        [
                'label' => esc_html__('Size Random', 'loraic'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'false',
                'condition' => [
                    'row_particles_display' => ['yes'],
                ],   
        ]
    );

    $element->add_control(
        'move_direction',
        [
            'label'   => esc_html__( 'Move Direction', 'loraic' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                'none'        => esc_html__( 'None', 'loraic' ),
                'top'        => esc_html__( 'Top', 'loraic' ),
                'top-right'        => esc_html__( 'Top Right', 'loraic' ),
                'right'        => esc_html__( 'Right', 'loraic' ),
                'bottom-right'        => esc_html__( 'Bottom Right', 'loraic' ),
                'bottom'        => esc_html__( 'Bottom', 'loraic' ),
                'bottom-left'        => esc_html__( 'Bottom Left', 'loraic' ),
                'left'        => esc_html__( 'Left', 'loraic' ),
                'top-left'        => esc_html__( 'Top Left', 'loraic' ),
            ),
            'default'      => 'none',
            'condition' => [
                'row_particles_display' => ['yes'],
            ],  
        ]
    );

    $repeater = new \Elementor\Repeater();
    $repeater->add_control(
        'particle_color', 
        [
            'label' => esc_html__('Color', 'loraic' ),
            'type' => \Elementor\Controls_Manager::COLOR,
        ]
    );
    $element->add_control(
        'particle_color_item',
        [
            'label' => esc_html__('Color', 'loraic'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [],
            'condition' => [
                'row_particles_display' => ['yes'],
            ],    
        ]
    );
      
    $element->end_controls_section();
};

/* End Section */

/* Start Column */
add_action( 'elementor/element/column/layout/after_section_end', 'loraic_add_custom_columns_controls' ); 
function loraic_add_custom_columns_controls( \Elementor\Element_Base $element) {
    $element->start_controls_section(
        'columns_pxl',
        [
            'label' => esc_html__( 'Loraic General Settings', 'loraic' ),
            'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
        ]
    );

    $element->add_control(
        'col_content_align',
        [
            'label'   => esc_html__( 'Column Content Align', 'loraic' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                ''           => esc_html__( 'Default', 'loraic' ),
                'start'           => esc_html__( 'Start', 'loraic' ),
                'center'           => esc_html__( 'Center', 'loraic' ),
                'end'           => esc_html__( 'End', 'loraic' ),
            ),
            'default' => '',
            'prefix_class' => 'pxl-col-align-'
        ]
    );
    $element->add_control(
        'col_sticky',
        [
            'label'   => esc_html__( 'Column Sticky', 'loraic' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                'none'           => esc_html__( 'No', 'loraic' ),
                'sticky' => esc_html__( 'Yes', 'loraic' ),
            ),
            'default' => 'none',
            'prefix_class' => 'pxl-column-'
        ]
    );
    $element->add_control(
        'col_divider',
        [
            'label'   => esc_html__( 'Divider', 'loraic' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                ''        => esc_html__( 'None', 'loraic' ),
                'left'   => esc_html__( 'Left', 'loraic' ),
                'right'   => esc_html__( 'Right', 'loraic' ),
            ),
            'prefix_class' => 'pxl-col-divider-',
            'default'      => '',
        ]
    );
    $element->add_control(
        'bf_left_space',
        [
            'label' => esc_html__('Left Space', 'loraic' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => -3000,
                    'max' => 3000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}}.pxl-col-divider-left:before' => 'left: {{SIZE}}{{UNIT}} !important;',
            ],
            'condition' => [
                'col_divider' => ['left'],
            ],
        ]
    );
    $element->add_control(
        'bf_right_space',
        [
            'label' => esc_html__('Right Space', 'loraic' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => -3000,
                    'max' => 3000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}}.pxl-col-divider-right:before' => 'right: {{SIZE}}{{UNIT}} !important;',
            ],
            'condition' => [
                'col_divider' => ['right'],
            ],
        ]
    );
    $element->add_control(
        'col_divider_color',
        [
            'label' => esc_html__('Divider Color', 'loraic' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}}.pxl-col-divider-right:before' => 'background-color: {{VALUE}} !important;',
                '{{WRAPPER}}.pxl-col-divider-left:before' => 'background-color: {{VALUE}} !important;',
            ],
        ]
    );
    $element->add_control(
        'pxl_column_overflow_hidden',
        [
            'label' => esc_html__('Overflow Hidden', 'loraic'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Yes', 'loraic' ),
            'label_off' => esc_html__( 'No', 'loraic' ),
            'return_value' => 'yes',
            'default' => 'no',
            'separator' => 'after',
            'prefix_class' => 'pxl-column-overflow-hidden-'
        ]
    );
    $element->end_controls_section();
}

/* End Column */

add_action( 'elementor/element/after_add_attributes', 'loraic_custom_el_attributes', 10, 1 );
function loraic_custom_el_attributes($el){
    if( 'section' !== $el->get_name() ) {
        return;
    }
    $settings = $el->get_settings();

    $pxl_container_width = !empty($settings['pxl_container_width']) ? (int)$settings['pxl_container_width'] : 1200;

    if( isset( $settings['stretch_section']) && $settings['stretch_section'] == 'section-stretched') 
        $pxl_container_width = $pxl_container_width - 30;

    $pxl_container_width = $pxl_container_width.'px';

    if ( isset( $settings['full_content_with_space'] ) && $settings['full_content_with_space'] === 'start' ) {
       
        $el->add_render_attribute( '_wrapper', 'style', 'padding-left: calc( (100% - '.$pxl_container_width.')/2);');
    }
    if ( isset( $settings['full_content_with_space'] ) && $settings['full_content_with_space'] === 'end' ) {
       
          $el->add_render_attribute( '_wrapper >', 'style', 'padding-right: calc( (100% - '.$pxl_container_width.')/2);');
    }
}

add_filter( 'pxl-custom-section/before-render', 'loraic_custom_section_before_render', 10, 3 );
function loraic_custom_section_before_render($html ,$settings, $el) {

    if(!empty($settings['row_divider'])) {
        if($settings['row_divider'] == 'angle-top' || $settings['row_divider'] == 'angle-bottom' || $settings['row_divider'] == 'angle-top-right' || $settings['row_divider'] == 'angle-bottom-left') {
            $html .=  '<div class="pxl-row-angle"></div>';
        }
        if($settings['row_divider'] == 'angle-top-bottom' || $settings['row_divider'] == 'angle-top-bottom-left') {
            $html .=  '<div class="pxl-row-angle"></div>';
        }
        if($settings['row_divider'] == 'wave-animation-top' || $settings['row_divider'] == 'wave-animation-bottom') {
            $html .=  '<svg class="pxl-row-angle" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1440 150" fill="#fff"><path d="M 0 26.1978 C 275.76 83.8152 430.707 65.0509 716.279 25.6386 C 930.422 -3.86123 1210.32 -3.98357 1439 9.18045 C 2072.34 45.9691 2201.93 62.4429 2560 26.198 V 172.199 L 0 172.199 V 26.1978 Z"><animate repeatCount="indefinite" fill="freeze" attributeName="d" dur="10s" values="M0 25.9086C277 84.5821 433 65.736 720 25.9086C934.818 -3.9019 1214.06 -5.23669 1442 8.06597C2079 45.2421 2208 63.5007 2560 25.9088V171.91L0 171.91V25.9086Z; M0 86.3149C316 86.315 444 159.155 884 51.1554C1324 -56.8446 1320.29 34.1214 1538 70.4063C1814 116.407 2156 188.408 2560 86.315V232.317L0 232.316V86.3149Z; M0 53.6584C158 11.0001 213 0 363 0C513 0 855.555 115.001 1154 115.001C1440 115.001 1626 -38.0004 2560 53.6585V199.66L0 199.66V53.6584Z; M0 25.9086C277 84.5821 433 65.736 720 25.9086C934.818 -3.9019 1214.06 -5.23669 1442 8.06597C2079 45.2421 2208 63.5007 2560 25.9088V171.91L0 171.91V25.9086Z"></animate></path></svg>';
        }
        if($settings['row_divider'] == 'wave-animation-bottom2') {
            $pxl_uniqid = uniqid();
            $html .=  '<svg class="pxl-section-waves pxl-section-waves1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto"><defs><path id="pxl-gentle-wave-'.$pxl_uniqid.'" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" /></defs><g class="pxl-wave-parallax"><use xlink:href="#pxl-gentle-wave-'.$pxl_uniqid.'" x="48" y="0" /><use xlink:href="#pxl-gentle-wave-'.$pxl_uniqid.'" x="48" y="3" /><use xlink:href="#pxl-gentle-wave-'.$pxl_uniqid.'" x="48" y="5" /><use xlink:href="#pxl-gentle-wave-'.$pxl_uniqid.'" x="48" y="7" /></g></svg>';
        }
        if($settings['row_divider'] == 'curved-top' || $settings['row_divider'] == 'curved-bottom') {
            $html .=  '<svg class="pxl-row-angle" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 1920 128" version="1.1" preserveAspectRatio="none" style="fill:#ffffff"><path stroke-width="0" d="M-1,126a3693.886,3693.886,0,0,1,1921,2.125V-192H-7Z"></path></svg>';
        }
        if($settings['row_divider'] == 'vertical1') {
            $html .=  '<div class="pxl-divider-vertical"><div class="pxl-section-line1"></div><div class="pxl-section-line2"></div><div class="pxl-section-line3"></div><div class="pxl-section-line4"></div><div class="pxl-section-line5"></div><div class="pxl-section-line6"></div></div>';
        }
    }

    if($settings['pxl_overlay_display'] == 'image') {
        $html .=  '<div class="pxl-overlay--image bg-image" style="background-image:url('.$settings['pxl_overlay_img']['url'].');"></div>';
    }

    if(!empty($settings['row_particles_display']) && $settings['row_particles_display'] == 'yes') {
        wp_enqueue_script('particles-background');
        $s_random = '';
        if($settings['size_random'] == 'yes') {
            $s_random = 'true';
        } else {
            $s_random = 'false';
        }
        $colors = [];
        foreach($settings['particle_color_item'] as $values) {
            $colors[] = $values['particle_color'];
        }
        if(empty($colors)) {
            $colors = ["#b73490","#006b41","#cd3000","#608ecb","#ffb500","#6e4e00","#6b541b","#305686","#00ffb4","#8798ff","#0044c1"];
        }
        $el->add_render_attribute( 'color', 'data-color', json_encode($colors) );
        $html .= '<div id="pxl-row-particles-'.uniqid().'" class="pxl-row-particles" data-number="'.$settings['number'].'" data-size="'.$settings['size'].'" data-size-random="'.$s_random.'" data-move-direction="'.$settings['move_direction'].'" '.$el->get_render_attribute_string( 'color' ).'></div>';
    }

    return $html;

}