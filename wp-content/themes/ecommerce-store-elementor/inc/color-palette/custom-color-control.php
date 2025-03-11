<?php

  $ecommerce_store_elementor_color_palette_css = '';

	// Global Color

	$ecommerce_store_elementor_first_color = ecommerce_store_elementor_get_option('ecommerce_store_elementor_first_color', '#007BFF' );

	if($ecommerce_store_elementor_first_color != false){
		$ecommerce_store_elementor_color_palette_css .=':root {';
			$ecommerce_store_elementor_color_palette_css .='--primary-color: '.esc_attr($ecommerce_store_elementor_first_color).'!important;';
		$ecommerce_store_elementor_color_palette_css .='}';
	}

	$ecommerce_store_elementor_color_palette_css .='}';

  /*-------------- Copyright Text Align-------------------*/

	$ecommerce_store_elementor_copyright_text_align = ecommerce_store_elementor_get_option('ecommerce_store_elementor_copyright_text_align');
	$ecommerce_store_elementor_color_palette_css .='.site-footer{';
	$ecommerce_store_elementor_color_palette_css .='text-align: '.esc_attr($ecommerce_store_elementor_copyright_text_align).' !important;';
	$ecommerce_store_elementor_color_palette_css .='}';
	$ecommerce_store_elementor_color_palette_css .='
	@media screen and (max-width:575px) {
	.site-footer{';
	$ecommerce_store_elementor_color_palette_css .='text-align: center !important;';
	$ecommerce_store_elementor_color_palette_css .='} }';

  // copyright font size
	$ecommerce_store_elementor_copyright_text_font_size = ecommerce_store_elementor_get_option('ecommerce_store_elementor_copyright_text_font_size');
	$ecommerce_store_elementor_color_palette_css .='#colophon p, #colophon a , #colophon{';
	$ecommerce_store_elementor_color_palette_css .='font-size: '.esc_attr($ecommerce_store_elementor_copyright_text_font_size).'px;';
	$ecommerce_store_elementor_color_palette_css .='}';

	// Copyright Background Color
	$ecommerce_store_elementor_copyright_background_color = ecommerce_store_elementor_get_option('ecommerce_store_elementor_copyright_background_color');
	$ecommerce_store_elementor_color_palette_css .='#colophon {';
	$ecommerce_store_elementor_color_palette_css .='background: '.esc_attr($ecommerce_store_elementor_copyright_background_color);
	$ecommerce_store_elementor_color_palette_css .='}';

	// Copyright Text Color
	$ecommerce_store_elementor_copyright_text_color = ecommerce_store_elementor_get_option('ecommerce_store_elementor_copyright_text_color');
	$ecommerce_store_elementor_color_palette_css .='#colophon a , #colophon{';
	$ecommerce_store_elementor_color_palette_css .='color: '.esc_attr($ecommerce_store_elementor_copyright_text_color);
	$ecommerce_store_elementor_color_palette_css .='}';