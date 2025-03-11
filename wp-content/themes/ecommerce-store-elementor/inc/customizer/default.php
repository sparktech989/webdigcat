<?php
/**
 * Default theme options.
 *
 * @package ecommerce_store_elementor
 */

if ( ! function_exists( 'ecommerce_store_elementor_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function ecommerce_store_elementor_get_default_theme_options() {

		$defaults = array();

		//General Option
        $defaults['ecommerce_store_elementor_show_scroll_to_top']          = true;
        $defaults['ecommerce_store_elementor_show_preloader_setting']      = false;
        $defaults['ecommerce_store_elementor_show_data_sticky_setting']    = false;
		$defaults['ecommerce_store_elementor_enable_cursor_dot_outline'] = false;

		// Typography
		$defaults['ecommerce_store_elementor_body_font_family']         = '';
		$defaults['ecommerce_store_elementor_h1_font_family']          	= '';
		$defaults['ecommerce_store_elementor_h1_font_size']         	= '';
		$defaults['ecommerce_store_elementor_h2_font_family']          	= '';
		$defaults['ecommerce_store_elementor_h2_font_size']         	= '';
		$defaults['ecommerce_store_elementor_h3_font_family']          	= '';
		$defaults['ecommerce_store_elementor_h3_font_size']         	= '';
		$defaults['ecommerce_store_elementor_h4_font_family']          	= '';
		$defaults['ecommerce_store_elementor_h4_font_size']         	= '';
		$defaults['ecommerce_store_elementor_h5_font_family']          	= '';
		$defaults['ecommerce_store_elementor_h5_font_size']         	= '';
		$defaults['ecommerce_store_elementor_h6_font_family']          	= '';
		$defaults['ecommerce_store_elementor_h6_font_size']         	= '';

		// Global Color
		$defaults['ecommerce_store_elementor_first_color']          = '#007BFF';

        //Post Option
        $defaults['ecommerce_store_elementor_show_post_date_setting']         		 = true;
        $defaults['ecommerce_store_elementor_show_post_heading_setting']      		 = true;
        $defaults['ecommerce_store_elementor_show_post_content_setting']       		 = true;
        $defaults['ecommerce_store_elementor_show_post_admin_setting']         		 = true;
        $defaults['ecommerce_store_elementor_show_post_categories_setting']    		 = true;
        $defaults['ecommerce_store_elementor_show_post_comments_setting']    	 	 = true;
        $defaults['ecommerce_store_elementor_show_post_featured_image_setting']   	 = true;
        $defaults['ecommerce_store_elementor_show_post_tags_setting']    			 = true;

		// Header.
		$defaults['ecommerce_store_elementor_show_title']            = true;
		$defaults['ecommerce_store_elementor_show_tagline']          = false;
		$defaults['ecommerce_store_elementor_gtranslate_show'] 		= false;
		$defaults['ecommerce_store_elementor_currency_switcher']     = false;
		$defaults['ecommerce_store_elementor_product_search']     	= true;
		$defaults['ecommerce_store_elementor_account_button']     	= true;
		
		// Layout.
		$defaults['ecommerce_store_elementor_global_layout']           = 'right-sidebar';
		$defaults['ecommerce_store_elementor_archive_layout']          = 'excerpt';
		$defaults['ecommerce_store_elementor_archive_image']           = 'large';
		$defaults['ecommerce_store_elementor_archive_image_alignment'] = 'center';
		$defaults['ecommerce_store_elementor_single_image']            = 'large';

		// Home Page.
		$defaults['ecommerce_store_elementor_home_content_status'] = true;
		
		// 404 page
		$defaults['ecommerce_store_elementor_404_page_title']  = esc_html__( 'Oops! That page can&rsquo;t be found.', 'ecommerce-store-elementor' );
		$defaults['ecommerce_store_elementor_404_page_text']  = esc_html__( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'ecommerce-store-elementor' );

		// No Result
		$defaults['ecommerce_store_elementor_no_result_title']  = esc_html__( 'Nothing Found', 'ecommerce-store-elementor' );
		$defaults['ecommerce_store_elementor_no_result_text']  = esc_html__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ecommerce-store-elementor' );

		// Footer.
		$defaults['ecommerce_store_elementor_copyright_text']        = esc_html__( 'Copyright &copy; All rights reserved.', 'ecommerce-store-elementor' );
		$defaults['ecommerce_store_elementor_copyright_text_font_size'] = '18';
		$defaults['ecommerce_store_elementor_copyright_text_align'] = 'center';
		$defaults['ecommerce_store_elementor_copyright_background_color'] = '#007BFF';
		$defaults['ecommerce_store_elementor_copyright_text_color'] = '#fff';

		// Pass through filter.
		$defaults = apply_filters( 'ecommerce_store_elementor_filter_default_theme_options', $defaults );
		return $defaults;
	}

endif;
