<?php

add_action( 'pxl_post_metabox_register', 'loraic_page_options_register' );
function loraic_page_options_register( $metabox ) {
	
	$panels = [
		'post' => [
			'opt_name'            => 'post_option',
			'display_name'        => esc_html__( 'Post Options', 'loraic' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'post_settings' => [
					'title'  => esc_html__( 'Post Options', 'loraic' ),
					'icon'   => 'el el-refresh',
					'fields' => array_merge(
						loraic_sidebar_pos_opts(['prefix' => 'post_', 'default' => true, 'default_value' => '-1']),
						array(
							array(
								'id'      =>'featured-quote-text',
								'type'    => 'textarea',
								'description' => esc_html__( 'Quote that will show when set post format is quote', 'loraic' ),
								'title'   => esc_html__('Quote Text', 'loraic'),
								'default' => '',
							),
							array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'loraic' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								) 
							),
						)
					)
				]
			]
		],
		'page' => [
			'opt_name'            => 'pxl_page_options',
			'display_name'        => esc_html__( 'Page Options', 'loraic' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'loader' => [
					'title'  => esc_html__( 'Loader', 'loraic' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
								'id'       => 'site_loader',
								'type'     => 'switch',
								'title'    => esc_html__('Loader', 'loraic'),
								'default'  => false
							),
							array(
								'id'    => 'loader_style',
								'type'  => 'select',
								'title' => esc_html__('Loader Style', 'loraic'),
								'options' => [
									'style-default'           => esc_html__('Default', 'loraic'),
									'style-fashion'           => esc_html__('Fashion', 'loraic'),
									'style-digital'           => esc_html__('Digital', 'loraic'),
									'style-software'           => esc_html__('Software', 'loraic'),
									'style-business'           => esc_html__('Business', 'loraic'),
									'style-insurance'           => esc_html__('Insurance', 'loraic'),
									'style-event'           => esc_html__('Event', 'loraic'),
									'style-corporate'           => esc_html__('Corporate', 'loraic'),
									'style-startup'           => esc_html__('Startup', 'loraic'),
									'style-app'           => esc_html__('App', 'loraic'),
									'style-photography'           => esc_html__('Photography', 'loraic'),
									'style-architecture'           => esc_html__('Architecture', 'loraic'),
									'style-seo'           => esc_html__('Seo', 'loraic'),
									'style-portfolio'           => esc_html__('Portfolio Dark', 'loraic'),
									'style-portfolio2'           => esc_html__('Portfolio Light', 'loraic'),
									'style-law'           => esc_html__('Law', 'loraic'),
								],
								'default' => 'style-default',
								'indent' => true,
								'required' => array( 0 => 'site_loader', 1 => 'equals', 2 => true ),
							),
							array(
								'id'      => 'loader_text',
								'type'    => 'text',
								'title'   => esc_html__('Loader Text', 'loraic'),
								'default' => '',
								'required' => array( 0 => 'loader_style', 1 => 'equals', 2 => 'style-law' ),
							),
							array(
								'id'             => 'loading_text',
								'type'           => 'text',
								'title'          => esc_html__('Loading Text 1', 'loraic'),
								'default'        => '',
								'desc'           => esc_html__('Enter the text displayed on load.', 'loraic'),
								'required'       => array( 0 => 'loader_style', 1 => 'equals', 2 => 'style-fashion' ),
								'force_output'   => true
							),
							array(
								'id'             => 'loading_text2',
								'type'           => 'text',
								'title'          => esc_html__('Loading Text 2', 'loraic'),
								'default'        => '',
								'desc'           => esc_html__('Color Primary', 'loraic'),
								'required'       => array( 0 => 'loader_style', 1 => 'equals', 2 => 'style-fashion' ),
								'force_output'   => true
							),
							array(
								'id'       => 'loader_text_color',
								'type'     => 'button_set',
								'title'    => esc_html__('Color Type', 'loraic'),
								'options'  => array(
									'primary' => esc_html__('Primary', 'loraic'),
									'gradient' => esc_html__('Gradient', 'loraic'),
								),
								'default'  => 'primary',
								'required' => array( 0 => 'loader_style', 1 => 'equals', 2 => 'style-law' ),
							),
						)
					)
				],
				'header' => [
					'title'  => esc_html__( 'Header', 'loraic' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						loraic_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'p_menu',
								'type'     => 'select',
								'title'    => esc_html__( 'Menu', 'loraic' ),
								'options'  => loraic_get_nav_menu_slug(),
								'default' => '',
							),
						),
						array(
							array(
								'id'       => 'sticky_scroll',
								'type'     => 'button_set',
								'title'    => esc_html__('Sticky Scroll', 'loraic'),
								'options'  => array(
									'-1' => esc_html__('Inherit', 'loraic'),
									'pxl-sticky-stt' => esc_html__('Scroll To Top', 'loraic'),
									'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'loraic'),
								),
								'default'  => '-1',
							),
						)
					)
					
				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'loraic' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
						loraic_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
					)
				],
				'content' => [
					'title'  => esc_html__( 'Content', 'loraic' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						loraic_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
							array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'loraic' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							), 
							array(
								'id'       => 'content_bg_color',
								'type'     => 'color_rgba',
								'title'    => esc_html__('Background Color', 'loraic'),
								'subtitle' => esc_html__('Content background color.', 'loraic'),
								'output'   => array('background-color' => '#pxl-main')
							),
						)
					)
				],
				'footer' => [
					'title'  => esc_html__( 'Footer', 'loraic' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						loraic_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'p_footer_fixed',
								'type'     => 'button_set',
								'title'    => esc_html__('Footer Fixed', 'loraic'),
								'options'  => array(
									'inherit' => esc_html__('Inherit', 'loraic'),
									'on' => esc_html__('On', 'loraic'),
									'off' => esc_html__('Off', 'loraic'),
								),
								'default'  => 'inherit',
							),
						)
					)
				],
				'colors' => [
					'title'  => esc_html__( 'Colors', 'loraic' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						array(
							array(
								'id'          => 'body_bg_color',
								'type'        => 'color',
								'title'       => esc_html__('Body Background Color', 'loraic'),
								'transparent' => false,
								'default'     => ''
							),
							array(
								'id'          => 'primary_color',
								'type'        => 'color',
								'title'       => esc_html__('Primary Color', 'loraic'),
								'transparent' => false,
								'default'     => ''
							),
							array(
								'id'          => 'gradient_color',
								'type'        => 'color_gradient',
								'title'       => esc_html__('Gradient Color', 'loraic'),
								'transparent' => false,
								'default'  => array(
									'from' => '',
									'to'   => '', 
								),
							),
						)
					)
				],
				'extra' => [
					'title'  => esc_html__( 'Extra', 'loraic' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						array(
							array(
								'id' => 'body_custom_class',
								'type' => 'text',
								'title' => esc_html__('Body Custom Class', 'loraic'),
							),
						)
					)
				]
			]
		],
		'portfolio' => [
			'opt_name'            => 'pxl_portfolio_options',
			'display_name'        => esc_html__( 'Portfolio Options', 'loraic' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'loraic' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
								'id'=> 'portfolio_video_link',
								'type' => 'text',
								'title' => esc_html__('Video Link', 'loraic'),
								'validate' => 'url',
								'default' => '',
							),
							array(
								'id'=> 'portfolio_address',
								'type' => 'text',
								'title' => esc_html__('Address', 'loraic'),
								'default' => '',
							),
							array( 
								'id'=> 'portfolio_year',
								'type' => 'text',
								'title' => esc_html__('Year', 'loraic'),
								'default' => '',
							),
							array(
								'id'       => 'portfolio_icon_font',
								'type'     => 'pxl_iconpicker',
								'title'    => esc_html__('Icon Font', 'loraic'),
							),
						)
					)
				],
				'header1' => [
					'title'  => esc_html__( 'Header', 'loraic' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						loraic_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'p_menu',
								'type'     => 'select',
								'title'    => esc_html__( 'Menu', 'loraic' ),
								'options'  => loraic_get_nav_menu_slug(),
								'default' => '',
							),
						),
						array(
							array(
								'id'       => 'sticky_scroll',
								'type'     => 'button_set',
								'title'    => esc_html__('Sticky Scroll', 'loraic'),
								'options'  => array(
									'-1' => esc_html__('Inherit', 'loraic'),
									'pxl-sticky-stt' => esc_html__('Scroll To Top', 'loraic'),
									'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'loraic'),
								),
								'default'  => '-1',
							),
						)
					)
					
				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'loraic' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
						loraic_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
					)
				],
				'content' => [
					'title'  => esc_html__( 'Content', 'loraic' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						loraic_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
							array(
								'id'             => 'content_spacing1',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'loraic' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							), 
							array(
								'id'       => 'content_bg_color',
								'type'     => 'color_rgba',
								'title'    => esc_html__('Background Color', 'loraic'),
								'subtitle' => esc_html__('Content background color.', 'loraic'),
								'output'   => array('background-color' => '#pxl-main')
							),
						)
					)
				],
				'footer' => [
					'title'  => esc_html__( 'Footer', 'loraic' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						loraic_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'p_footer_fixed',
								'type'     => 'button_set',
								'title'    => esc_html__('Footer Fixed', 'loraic'),
								'options'  => array(
									'inherit' => esc_html__('Inherit', 'loraic'),
									'on' => esc_html__('On', 'loraic'),
									'off' => esc_html__('Off', 'loraic'),
								),
								'default'  => 'inherit',
							),
						)
					)
				],
			]
		],
		'carrer' => [
			'opt_name'            => 'pxl_carrer_options',
			'display_name'        => esc_html__( 'Carrer Options', 'loraic' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'loraic' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Content Spacing Top/Bottom', 'loraic' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
						)
					)
				],
			]
		],
		'service' => [
			'opt_name'            => 'pxl_service_options',
			'display_name'        => esc_html__( 'Service Options', 'loraic' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'loraic' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
								'id'=> 'service_external_link',
								'type' => 'text',
								'title' => esc_html__('External Link', 'loraic'),
								'validate' => 'url',
								'default' => '',
							),
							array(
								'id'       => 'service_icon_type',
								'type'     => 'button_set',
								'title'    => esc_html__('Icon Type', 'loraic'),
								'options'  => array(
									'icon'  => esc_html__('Icon', 'loraic'),
									'image'  => esc_html__('Image', 'loraic'),
								),
								'default'  => 'icon'
							),
							array(
								'id'       => 'service_icon_font',
								'type'     => 'pxl_iconpicker',
								'title'    => esc_html__('Icon', 'loraic'),
								'required' => array( 0 => 'service_icon_type', 1 => 'equals', 2 => 'icon' ),
								'force_output' => true
							),
							array(
								'id'       => 'service_icon_img',
								'type'     => 'media',
								'title'    => esc_html__('Icon Image', 'loraic'),
								'default' => '',
								'required' => array( 0 => 'service_icon_type', 1 => 'equals', 2 => 'image' ),
								'force_output' => true
							),
						)
					)
				],
				
				'header1' => [
					'title'  => esc_html__( 'Header', 'loraic' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						loraic_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'p_menu',
								'type'     => 'select',
								'title'    => esc_html__( 'Menu', 'loraic' ),
								'options'  => loraic_get_nav_menu_slug(),
								'default' => '',
							),
						),
						array(
							array(
								'id'       => 'sticky_scroll',
								'type'     => 'button_set',
								'title'    => esc_html__('Sticky Scroll', 'loraic'),
								'options'  => array(
									'-1' => esc_html__('Inherit', 'loraic'),
									'pxl-sticky-stt' => esc_html__('Scroll To Top', 'loraic'),
									'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'loraic'),
								),
								'default'  => '-1',
							),
						)
					)
					
				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'loraic' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
						loraic_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
					)
				],
				'content' => [
					'title'  => esc_html__( 'Content', 'loraic' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						loraic_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
							array(
								'id'             => 'content_spacing1',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'loraic' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							), 
							array(
								'id'       => 'content_bg_color',
								'type'     => 'color_rgba',
								'title'    => esc_html__('Background Color', 'loraic'),
								'subtitle' => esc_html__('Content background color.', 'loraic'),
								'output'   => array('background-color' => '#pxl-main')
							),
						)
					)
				],
				'footer' => [
					'title'  => esc_html__( 'Footer', 'loraic' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						loraic_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'p_footer_fixed',
								'type'     => 'button_set',
								'title'    => esc_html__('Footer Fixed', 'loraic'),
								'options'  => array(
									'inherit' => esc_html__('Inherit', 'loraic'),
									'on' => esc_html__('On', 'loraic'),
									'off' => esc_html__('Off', 'loraic'),
								),
								'default'  => 'inherit',
							),
						)
					)
				],
			]
		],
		'product' => [ 
			'opt_name'            => 'pxl_product_options',
			'display_name'        => esc_html__( 'Product Settings', 'loraic' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'Header', 'loraic' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						loraic_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
					)
				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'loraic' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
						loraic_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
					)

				],
				'general' => [
					'title'  => esc_html__( 'General', 'loraic' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
								'id'=> 'product_feature_text',
								'type' => 'text',
								'title' => esc_html__('Featured Text', 'loraic'),
								'default' => '',
							),
						)
					)
				],
			]
		],
		'pxl-template' => [ //post_type
		'opt_name'            => 'pxl_hidden_template_options',
		'display_name'        => esc_html__( 'Template Options', 'loraic' ),
		'show_options_object' => false,
		'context'  => 'advanced',
		'priority' => 'default',
		'sections'  => [
			'header' => [
				'title'  => esc_html__( 'General', 'loraic' ),
				'icon'   => 'el-icon-website',
				'fields' => array(
					array(
						'id'    => 'template_type',
						'type'  => 'select',
						'title' => esc_html__('Type', 'loraic'),
						'options' => [
							'df'       	   => esc_html__('Select Type', 'loraic'), 
							'header'       => esc_html__('Header', 'loraic'), 
							'footer'       => esc_html__('Footer', 'loraic'), 
							'mega-menu'    => esc_html__('Mega Menu', 'loraic'), 
							'page-title'   => esc_html__('Page Title', 'loraic'), 
							'tab' => esc_html__('Tab', 'loraic'),
							'hidden-panel' => esc_html__('Hidden Panel', 'loraic'),
							'popup' => esc_html__('Popup', 'loraic'),
							'slider' => esc_html__('Slider', 'loraic'),
							'widget' => esc_html__('Widget Sidebar', 'loraic'),
						],
						'default' => 'df',
					),
					array(
						'id'    => 'header_type',
						'type'  => 'select',
						'title' => esc_html__('Header Type', 'loraic'),
						'options' => [
							'px-header--default'       	   => esc_html__('Default', 'loraic'), 
							'px-header--transparent'       => esc_html__('Transparent', 'loraic'),
						],
						'default' => 'px-header--default',
						'indent' => true,
						'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'header' ),
					),
					array(
						'id'          => 'hidden_panel_bg',
						'type'        => 'color',
						'title'       => esc_html__('Hidden Panel Box Color', 'loraic'),
						'transparent' => false,
						'default'     => '',
						'force_output' => true,
						'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'hidden-panel' ),
					),
					array(
						'id'          => 'hidden_panel_width',
						'type'        => 'text',
						'title'       => esc_html__('Hidden Panel Width', 'loraic'),
						'subtitle'       => esc_html__('Enter number.', 'loraic'),
						'transparent' => false,
						'default'     => '',
						'force_output' => true,
						'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'hidden-panel' ),
					),
					array(
						'id'          => 'header_sidebar_width',
						'type'        => 'slider',
						'title'       => esc_html__('Header Sidebar Width', 'loraic'),
						"default"   => 300,
						"min"       => 50,
						"step"      => 1,
						"max"       => 900,
						'force_output' => true,
						'required' => array( 0 => 'header_type', 1 => 'equals', 2 => 'px-header--left_sidebar' ),
					),
				),
				
			],
		]
	],
];

$metabox->add_meta_data( $panels );
}
