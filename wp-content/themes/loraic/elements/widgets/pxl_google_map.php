<?php
// Register Google Maps Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_google_map',
        'title' => esc_html__( 'BR Google Maps', 'loraic' ),
        'icon' => 'eicon-google-maps',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'pxl-map-api',
            'pxl-map',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'source_section',
                    'label' => esc_html__( 'Source Settings', 'loraic' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'address',
                            'label' => esc_html__( 'Address', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => 'New York, United States',
                        ),
                        array(
                            'name' => 'coordinate',
                            'label' => esc_html__( 'Coordinate', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '40.6976684,-74.2605501',
                        ),
                        array(
                            'name' => 'markercoordinate',
                            'label' => esc_html__( 'Marker Coordinate', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => esc_html__('Enter marker coordinate of Map, format input (latitude, longitude)', 'loraic'),
                            'default' => '40.6976684,-74.2605501',
                        ),
                        array(
                            'name' => 'markericon',
                            'label' => esc_html__( 'Marker Icon', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'type',
                            'label' => esc_html__( 'Map Type', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'ROADMAP' => 'ROADMAP',
                                'HYBRID' => 'HYBRID',
                                'SATELLITE' => 'SATELLITE',
                                'TERRAIN' => 'TERRAIN'
                            ],
                            'default' => 'ROADMAP',
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__( 'Style Template', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'light-monochrome' => 'Light Monochrome',
                                'blue-water' => 'Blue water',
                                'midnight-commander' => 'Midnight Commander',
                                'paper' => 'Paper',
                                'red-hues' => 'Red Hues',
                                'hot-pink' => 'Hot Pink',
                                'custom' => 'Custom',
                            ],
                            'default' => 'light-monochrome',
                        ),
                        array(
                            'name' => 'content',
                            'label' => esc_html__( 'Custom Template', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::CODE,
                            'language' => 'json',
                            'description' => esc_html__('Get template from snazzymaps.com', 'loraic'),
                            'description' => 'Get template from snazzymaps.com: <a href="https://snazzymaps.com/" target="_blank">Click Here</a>',
                            'condition' => [
                                'style' => 'custom',
                            ],
                        ),
                        array(
                            'name' => 'zoom',
                            'label' => esc_html__( 'Zoom', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => 13,
                            'description' => esc_html__('Enter number.', 'loraic'),
                        ),
                        array(
                            'name' => 'height',
                            'label' => esc_html__( 'Height', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '350',
                            'description' => esc_html__('Enter number.', 'loraic'),
                        ),
                        array(
                            'name' => 'scrollwheel',
                            'label' => esc_html__( 'Scroll Wheel', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'pancontrol',
                            'label' => esc_html__( 'Pan Control', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'zoomcontrol',
                            'label' => esc_html__( 'Zoom Control', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'scalecontrol',
                            'label' => esc_html__( 'Scale Control', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'maptypecontrol',
                            'label' => esc_html__( 'Map Type Control', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'streetviewcontrol',
                            'label' => esc_html__( 'Street View Control', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'overviewmapcontrol',
                            'label' => esc_html__( 'Over View Map Control', 'loraic' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                    ),
                ),
            ),
        ),
    ),
    loraic_get_class_widget_path()
);