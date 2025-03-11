<?php

if( !defined( 'ABSPATH' ) )
	exit; 

class Loraic_Admin_Templates extends Loraic_Base{

	public function __construct() {
		$this->add_action( 'admin_menu', 'register_page', 20 );
	}
 
	public function register_page() {
		add_submenu_page(
			'pxlart',
		    esc_html__( 'Templates', 'loraic' ),
		    esc_html__( 'Templates', 'loraic' ),
		    'manage_options',
		    'edit.php?post_type=pxl-template',
		    false
		);
	}
}
new Loraic_Admin_Templates;
