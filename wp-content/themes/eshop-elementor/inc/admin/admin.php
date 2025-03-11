<?php // Admin Page
class Admin {

    public function __construct() {

        // Remove all third party notices and enqueue style and script
        add_action('admin_enqueue_scripts', [$this, 'admin_script_n_style']);

        // Add admin page
        add_action('admin_menu', [$this, 'eshop_admin_page']);

        add_action('wp_ajax_admin_install_plug', array($this, 'install_plug_ajax'));
        // add_action('wp_ajax_nopriv_admin_install_plug', array($this, 'install_plug_ajax'));

    }

    public function admin_script_n_style() {
        $screen = get_current_screen();
        if (isset($screen->base) && $screen->base == 'toplevel_page_eshop-admin') {
            remove_all_actions('admin_notices');

            wp_enqueue_script('eshop-elementor-admin', ESHOP_ELEMENTOR_URI . 'js/admin.js', array('jquery'), ESHOP_ELEMENTOR_VERSION, array());

            wp_localize_script(
                'eshop-elementor-admin',
                'admin_ajax_obj', 
                array(
                    'ajax_url' => admin_url('admin-ajax.php'),
                    'nonce' => wp_create_nonce('esh_admin_nonce_check'),
                    'import_url' => admin_url('themes.php?page=ananta-demo-import')
                )
            );

            wp_enqueue_style('admin-notice-styles', ESHOP_ELEMENTOR_URI . 'css/admin.css', array(), ESHOP_ELEMENTOR_VERSION);

            add_filter('admin_footer_text', [$this, 'esh_remove_admin_footer_text']);
        }
    }

    public function eshop_admin_page() {
        // Add top-level menu page
        
        add_menu_page(
            'Eshop elementor',  // Page title
            'Eshop',            // Menu title
            'manage_options',   // Capability required to access the page
            'eshop-admin',      // Menu slug
            array($this, 'eshop_admin_page_content'), // Callback function
            'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjE1MCIgaGVpZ2h0PSIxNTAiPgo8cGF0aCBkPSJNMCAwIEMyLjI2Njg1NDUyIDEuNjg2MjIxNjEgNC4zNzQ2MTI4MSAzLjQ1NjIwNjg0IDYuNDc2NTYyNSA1LjM0Mzc1IEM3LjcwODI2MTcyIDYuNDM2MjMwNDcgNy43MDgyNjE3MiA2LjQzNjIzMDQ3IDguOTY0ODQzNzUgNy41NTA3ODEyNSBDMjIuMjQ4MDY4NDIgMjAuMDI3NzQwMzkgMzEuMDc5ODQ4MjEgMzcuNTg4NDg4MTYgMzEuODEyNSA1NS45NDUzMTI1IEMzMi4xMzM3MTA1MSA3Ny4yMzY0Nzg3OCAyOC4xMDYyNjYzOCA5Ni4wNTIyNTQyIDEzLjQ3NjU2MjUgMTEyLjM0Mzc1IEMxMi43NDgyNDIxOSAxMTMuMTY0ODgyODEgMTIuMDE5OTIxODcgMTEzLjk4NjAxNTYyIDExLjI2OTUzMTI1IDExNC44MzIwMzEyNSBDLTEuMjA3NDI3ODkgMTI4LjExNTI1NTkyIC0xOC43NjgxNzU2NiAxMzYuOTQ3MDM1NzEgLTM3LjEyNSAxMzcuNjc5Njg3NSBDLTU4LjQxNjE2NjI4IDEzOC4wMDA4OTgwMSAtNzcuMjMxOTQxNyAxMzMuOTczNDUzODggLTkzLjUyMzQzNzUgMTE5LjM0Mzc1IEMtOTQuMzQ0NTcwMzEgMTE4LjYxNTQyOTY5IC05NS4xNjU3MDMxMiAxMTcuODg3MTA5MzcgLTk2LjAxMTcxODc1IDExNy4xMzY3MTg3NSBDLTEwOS4yOTQ5NDM0MiAxMDQuNjU5NzU5NjEgLTExOC4xMjY3MjMyMSA4Ny4wOTkwMTE4NCAtMTE4Ljg1OTM3NSA2OC43NDIxODc1IEMtMTE5LjE4MDU4NTUxIDQ3LjQ1MTAyMTIyIC0xMTUuMTUzMTQxMzggMjguNjM1MjQ1OCAtMTAwLjUyMzQzNzUgMTIuMzQzNzUgQy05OS43OTUxMTcxOSAxMS41MjI2MTcxOSAtOTkuMDY2Nzk2ODcgMTAuNzAxNDg0MzcgLTk4LjMxNjQwNjI1IDkuODU1NDY4NzUgQy03Mi42NDg1MjU5MiAtMTcuNDcxMDc5MTMgLTMwLjY4MTE1MjA5IC0yMC4xMzc0NzQ0NCAwIDAgWiBNLTgwLjUyMzQzNzUgMjcuMzQzNzUgQy04Mi41MDM0Mzc1IDMxLjc5ODc1IC04Mi41MDM0Mzc1IDMxLjc5ODc1IC04NC41MjM0Mzc1IDM2LjM0Mzc1IEMtNzkuMzA5MDE0NzQgMzYuMzkzMTY4NiAtNzQuMDk0NzI4MTYgMzYuNDI5NDc4MzEgLTY4Ljg4MDEyNjk1IDM2LjQ1MzYxMzI4IEMtNjcuMTA2MDE0MjYgMzYuNDYzNjc0MTEgLTY1LjMzMTkxODE1IDM2LjQ3NzMyNDIyIC02My41NTc4NjEzMyAzNi40OTQ2Mjg5MSBDLTYxLjAwODU4NDY2IDM2LjUxODg3Mzc4IC01OC40NTk1MjcxMyAzNi41MzAyMzIxOCAtNTUuOTEwMTU2MjUgMzYuNTM5MDYyNSBDLTU1LjExNjMxMDI3IDM2LjU0OTM4NTA3IC01NC4zMjI0NjQyOSAzNi41NTk3MDc2NCAtNTMuNTA0NTYyMzggMzYuNTcwMzQzMDIgQy00OS42NDEyMDcwNyAzNi41NzExMzExIC00Ny44MTUwNDMwNCAzNi41MzgxNTM2OSAtNDQuNTIzNDM3NSAzNC4zNDM3NSBDLTQ0LjAyMzQzNzUgMzEuODQzNzUgLTQ0LjAyMzQzNzUgMzEuODQzNzUgLTQ0LjUyMzQzNzUgMjkuMzQzNzUgQy00OC4xNjY0ODYxNCAyNi45MTUwNTA5MSAtNTAuODMwNjYwODkgMjcuMDg2OTkzMjUgLTU1LjAzNTE1NjI1IDI3LjE0ODQzNzUgQy01Ni4xMjc0OTMyMSAyNy4xNTI2ODIzNCAtNTYuMTI3NDkzMjEgMjcuMTUyNjgyMzQgLTU3LjI0MTg5NzU4IDI3LjE1NzAxMjk0IEMtNTkuNTY1MDc4ODcgMjcuMTY4MTk3NDMgLTYxLjg4Nzg3Mjk3IDI3LjE5MzI5ODM0IC02NC4yMTA5Mzc1IDI3LjIxODc1IEMtNjUuNzg3MTAzOCAyNy4yMjg3ODIwNiAtNjcuMzYzMjc2MTUgMjcuMjM3OTA3NTIgLTY4LjkzOTQ1MzEyIDI3LjI0NjA5Mzc1IEMtNzIuODAwOTMwMTcgMjcuMjY4MTMxMDQgLTc2LjY2MjExODIxIDI3LjMwMjY0ODU5IC04MC41MjM0Mzc1IDI3LjM0Mzc1IFogTS0zOS41MjM0Mzc1IDM1LjM0Mzc1IEMtNDIuMjIwNDc0NiAzOS44NzM2MzI3MyAtNDIuMjU2NTcxMTUgNDQuMjA0MDk3MjMgLTQxLjUyMzQzNzUgNDkuMzQzNzUgQy0zOS42NjI3MTU4MyA1NC40MTUyOTgzNiAtMzcuMDE1Nzk1NzkgNTcuNDAyOTE2MTMgLTMyLjIxMDkzNzUgNTkuODQzNzUgQy0zMC45OTQwNjI1IDYwLjMzODc1IC0yOS43NzcxODc1IDYwLjgzMzc1IC0yOC41MjM0Mzc1IDYxLjM0Mzc1IEMtMjUuMzEwNjYxNTkgNTkuNzA3NDAzMzcgLTI1LjMxMDY2MTU5IDU5LjcwNzQwMzM3IC0yNS4wMjM0Mzc1IDU2Ljk2ODc1IEMtMjUuMjY4MjQyMjQgNTQuMTI0MzAzODEgLTI1LjI2ODI0MjI0IDU0LjEyNDMwMzgxIC0yNy44OTg0Mzc1IDUyLjQ2ODc1IEMtMzEuMzM0MTUxNDQgNDkuNjg3NDU3NzYgLTMxLjkxNTE3NDYyIDQ3LjY3NzYyMzAyIC0zMi41MjM0Mzc1IDQzLjM0Mzc1IEMtMzEuNDA4MzY3OTkgNDAuOTAxMjE2NzkgLTMwLjQwOTg3MTk1IDM5LjIzMDE4NDQ1IC0yOC41MjM0Mzc1IDM3LjM0Mzc1IEMtMjUuMjczNDM3NSAzNi45Njg3NSAtMjUuMjczNDM3NSAzNi45Njg3NSAtMjEuNTIzNDM3NSAzNy4zNDM3NSBDLTE4Ljg5ODQzNzUgMzkuNzE4NzUgLTE4Ljg5ODQzNzUgMzkuNzE4NzUgLTE2LjUyMzQzNzUgNDIuMzQzNzUgQy0xNC4wMjcwMjYyMiA0My44NjE2NzY0NCAtMTQuMDI3MDI2MjIgNDMuODYxNjc2NDQgLTExLjUyMzQzNzUgNDQuMzQzNzUgQy0xMC41MzM0Mzc1IDQzLjY4Mzc1IC05LjU0MzQzNzUgNDMuMDIzNzUgLTguNTIzNDM3NSA0Mi4zNDM3NSBDLTguODk1MjMwODIgMzcuMTM4NjQzNTYgLTEwLjYxNDg4OTczIDMzLjc0OTkxMzczIC0xNC41MjM0Mzc1IDMwLjM0Mzc1IEMtMjQuMTM2MTI0NCAyNS4xMDA0NjYyNCAtMzIuNDA1NzA2NSAyNy4wMDU4MzY1NCAtMzkuNTIzNDM3NSAzNS4zNDM3NSBaIE0tODQuNTIzNDM3NSA1OC4zNDM3NSBDLTg0LjUyMzQzNzUgNjAuOTgzNzUgLTg0LjUyMzQzNzUgNjMuNjIzNzUgLTg0LjUyMzQzNzUgNjYuMzQzNzUgQy04MC41OTA4MjgwNiA2Ni40MTc5NjQ1NCAtNzYuNjU4NDkwMjggNjYuNDcyMzgxMzYgLTcyLjcyNTM0MTggNjYuNTA4NTQ0OTIgQy03MC43MzAxNjA0OSA2Ni41MzEwMzMzMyAtNjguNzM1MTc1MzcgNjYuNTY5MTUxOTggLTY2Ljc0MDIzNDM4IDY2LjYwNzQyMTg4IEMtNjUuNDg2NjIxMDkgNjYuNjE3MDg5ODQgLTY0LjIzMzAwNzgxIDY2LjYyNjc1NzgxIC02Mi45NDE0MDYyNSA2Ni42MzY3MTg3NSBDLTYxLjc4NDA2OTgyIDY2LjY1MjQyOTIgLTYwLjYyNjczMzQgNjYuNjY4MTM5NjUgLTU5LjQzNDMyNjE3IDY2LjY4NDMyNjE3IEMtNTYuNTAyMzU3NzIgNjYuNjAxNDQ3NSAtNTYuNTAyMzU3NzIgNjYuNjAxNDQ3NSAtNTQuNjIyMzE0NDUgNjQuODI1NDM5NDUgQy01NC4wNzgzNzAzNiA2NC4wOTIwMDMxNyAtNTQuMDc4MzcwMzYgNjQuMDkyMDAzMTcgLTUzLjUyMzQzNzUgNjMuMzQzNzUgQy01NC4xODM0Mzc1IDYxLjY5Mzc1IC01NC44NDM0Mzc1IDYwLjA0Mzc1IC01NS41MjM0Mzc1IDU4LjM0Mzc1IEMtNjUuMDkzNDM3NSA1OC4zNDM3NSAtNzQuNjYzNDM3NSA1OC4zNDM3NSAtODQuNTIzNDM3NSA1OC4zNDM3NSBaIE0tMTguMzM1OTM3NSA2NC40Njg3NSBDLTE5LjcyNTU3MTM5IDY2LjMwODQ5OTY1IC0xOS43MjU1NzEzOSA2Ni4zMDg0OTk2NSAtMTkuNTg1OTM3NSA2OC43MTg3NSBDLTE4LjY1NDA2MTYzIDcxLjY1MzI0MDggLTE4LjY1NDA2MTYzIDcxLjY1MzI0MDggLTE1LjQ2MDkzNzUgNzMuNzE4NzUgQy0xMi41MjM0Mzc1IDc2LjM0Mzc1IC0xMi41MjM0Mzc1IDc2LjM0Mzc1IC0xMS44OTg0Mzc1IDc5LjkwNjI1IEMtMTIuNjA3OTg0NTYgODMuODA4NzU4ODUgLTEzLjM3OTYxMDg4IDg1LjAwODMzNTk0IC0xNi41MjM0Mzc1IDg3LjM0Mzc1IEMtMTcuNTEzNDM3NSA4Ny42NzM3NSAtMTguNTAzNDM3NSA4OC4wMDM3NSAtMTkuNTIzNDM3NSA4OC4zNDM3NSBDLTE5LjUyMzQzNzUgOTEuMzEzNzUgLTE5LjUyMzQzNzUgOTQuMjgzNzUgLTE5LjUyMzQzNzUgOTcuMzQzNzUgQy0xMy4yODEwMjkyOCA5Ni43NDkyMzQ5MyAtOS40NDU2OTk2OSA5NC40MjE4NzEyOSAtNS4yMTA5Mzc1IDg5Ljg0Mzc1IEMtMi4yMzQ1ODgxNiA4NS40MzQzNDM1NiAtMi4xNTgzMzUzOSA4MS42Mzc3MzA1NSAtMi41MjM0Mzc1IDc2LjM0Mzc1IEMtNC4zODY5MzA3NSA3MC45NzI1MDQ3NiAtNy44Mzg3MjM0NSA2Ny40MzY2Njg3NCAtMTIuNTIzNDM3NSA2NC4zNDM3NSBDLTE1LjUzNzg3ODIyIDYzLjE5NjU2Mzc4IC0xNS41Mzc4NzgyMiA2My4xOTY1NjM3OCAtMTguMzM1OTM3NSA2NC40Njg3NSBaIE0tODMuNTIzNDM3NSA4OC4zNDM3NSBDLTgxLjkxODExMzYxIDk0LjAzNjc3OTY5IC04MS45MTgxMTM2MSA5NC4wMzY3Nzk2OSAtNzkuNTIzNDM3NSA5Ny4zNDM3NSBDLTc3LjI2NTI2NjI5IDk3Ljc4MTY4NTI2IC03Ny4yNjUyNjYyOSA5Ny43ODE2ODUyNiAtNzQuNjE0NzQ2MDkgOTcuNjg0MzI2MTcgQy03My41OTM4Mzg4MSA5Ny42ODQwOTk1OCAtNzIuNTcyOTMxNTIgOTcuNjgzODcyOTkgLTcxLjUyMTA4NzY1IDk3LjY4MzYzOTUzIEMtNzAuNDE1ODQ3NDcgOTcuNjY4MTU1NjcgLTY5LjMxMDYwNzMgOTcuNjUyNjcxODEgLTY4LjE3MTg3NSA5Ny42MzY3MTg3NSBDLTY2LjQ3ODEyMjQxIDk3LjYzMDM1MTQ5IC02Ni40NzgxMjI0MSA5Ny42MzAzNTE0OSAtNjQuNzUwMTUyNTkgOTcuNjIzODU1NTkgQy02MS4xMzI2NzQ3NyA5Ny42MDcwMjEzMiAtNTcuNTE1NzQ3ODEgOTcuNTY5MzU5NzUgLTUzLjg5ODQzNzUgOTcuNTMxMjUgQy01MS40NTA1Mjg4NiA5Ny41MTYyMDkzNCAtNDkuMDAyNjExNTIgOTcuNTAyNTE5ODYgLTQ2LjU1NDY4NzUgOTcuNDkwMjM0MzggQy00MC41NDQwODE5IDk3LjQ1NzEwMjI3IC0zNC41MzM3OTkwNCA5Ny40MDY4NTU3OSAtMjguNTIzNDM3NSA5Ny4zNDM3NSBDLTI4LjUyMzQzNzUgOTQuMzczNzUgLTI4LjUyMzQzNzUgOTEuNDAzNzUgLTI4LjUyMzQzNzUgODguMzQzNzUgQy00Ni42NzM0Mzc1IDg4LjM0Mzc1IC02NC44MjM0Mzc1IDg4LjM0Mzc1IC04My41MjM0Mzc1IDg4LjM0Mzc1IFogIiBmaWxsPSIjQTZBOUFDIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgxMTguNTIzNDM3NSwxMi42NTYyNSkiLz4KPC9zdmc+Cg==', // Icon
            20                  // Position
        );
    }

    public function esh_remove_admin_footer_text() {
        return 'Enjoyed <span class="esh-footer-thankyou"><strong>Eshop</strong>? Please leave us a <a href="https://wordpress.org/support/theme/eshop/reviews/?rate=5#new-post" target="_blank">★★★★★</a></span> rating. We really appreciate your support!';
    }

    public function eshop_free_features() {
        return array(
     
            array( 'type' => 'lite' , 'name' => 'Product Grid', 'demo' => 'https://anantaddons.com/product-grid/' ),

            array( 'type' => 'lite' , 'name' => 'Product Category Grid', 'demo' => 'https://anantaddons.com/product-category-grid/' ),
        
            array( 'type' => 'lite' , 'name' => 'Product Category Tab', 'demo' => 'https://anantaddons.com/product-category-tab/' ),
            
            array( 'type' => 'lite' , 'name' => 'Products Grid with Nav', 'demo' => 'https://anantaddons.com/product-grid-with-nav/' ),

            array( 'type' => 'lite' , 'name' => 'Products Quick View', 'demo' => 'https://anantaddons.com/product-grid-with-nav/' ),

            array( 'type' => 'lite' , 'name' => 'Cart Count', 'demo' => 'https://anantaddons.com/cart/' ),
    
            array( 'type' => 'lite' , 'name' => 'Cart Page', 'demo' => 'https://anantaddons.com/cart/' ),
            
            array( 'type' => 'lite' , 'name' => 'Checkout Page', 'demo' => 'https://anantaddons.com/checkout-page/' ),
            
            array( 'type' => 'lite' , 'name' => 'Wishlist Page', 'demo' => 'https://anantaddons.com/addons/wishlist-page/' ),
    
            array( 'type' => 'lite' , 'name' => 'Mini Wishlist', 'demo' => 'https://anantaddons.com/addons/wishlist/' ),
            
            array( 'type' => 'lite' , 'name' => 'Account Page', 'demo' => 'https://anantaddons.com/account-page/' ),
        
            array( 'type' => 'lite' , 'name' => 'Woo Search', 'demo' => 'https://anantaddons.com/woo-search/' ),

            array( 'type' => 'lite' , 'name' => 'Time Counter', 'demo' => 'https://anantaddons.com/addons/time-counter/' ),

            array( 'type' => 'lite' , 'name' => 'Single Product Page', 'demo' => 'https://anantaddons.com/product-title/' ),

            array( 'type' => 'lite' , 'name' => 'Product Archive Page', 'demo' => 'https://anantaddons.com/product-title/' ),
           
        );
    }

    public function eshop_premium_features(){
        return array(
     
            array( 'type' => 'pro' , 'name' => 'Advance Product Grid', 'demo' => 'https://anantaddons.com/product-grid/' ),

            array( 'type' => 'pro'  , 'name' => 'Advance Product Slider', 'demo' => 'https://anantaddons.com/product-slider/' ),
        
            array( 'type' => 'pro' , 'name' => 'Advance Product Category Grid', 'demo' => 'https://anantaddons.com/product-category-grid/' ),
        
            array( 'type' => 'pro'  , 'name' => 'Advance Product Category Slider', 'demo' => 'https://anantaddons.com/product-category-slider/' ),
        
            array( 'type' => 'pro' , 'name' => 'Advance Product Category Tab', 'demo' => 'https://anantaddons.com/product-category-tab/' ),
            
            array( 'type' => 'pro' , 'name' => 'Advance Products Grid with Nav', 'demo' => 'https://anantaddons.com/product-grid-with-nav/' ),

            array( 'type' => 'pro' , 'name' => 'Advance Products Quick View', 'demo' => 'https://anantaddons.com/product-grid-with-nav/' ),

            array( 'type' => 'pro'  , 'name' => 'Advance Products Marquee Stripe', 'demo' => 'https://anantaddons.com/product-grid-with-nav/' ),
        
            array( 'type' => 'pro' , 'name' => 'Advance Mini Cart', 'demo' => 'https://anantaddons.com/cart/' ),
    
            array( 'type' => 'pro' , 'name' => 'Advance Cart Page', 'demo' => 'https://anantaddons.com/cart/' ),
            
            array( 'type' => 'pro' , 'name' => 'Advance Checkout Page', 'demo' => 'https://anantaddons.com/checkout-page/' ),
            
            array( 'type' => 'pro' , 'name' => 'Advance Wishlist Page', 'demo' => 'https://anantaddons.com/addons/wishlist-page/' ),
    
            array( 'type' => 'pro' , 'name' => 'Advance Mini Wishlist', 'demo' => 'https://anantaddons.com/addons/wishlist/' ),
            
            array( 'type' => 'pro'  , 'name' => 'Advance Compare Page', 'demo' => 'https://anantaddons.com/addons/wishlist-page/' ),
    
            array( 'type' => 'pro'  , 'name' => 'Advance Compare Count', 'demo' => 'https://anantaddons.com/addons/wishlist/' ),
    
            array( 'type' => 'pro' , 'name' => 'Advance Account Page', 'demo' => 'https://anantaddons.com/account-page/' ),
        
            array( 'type' => 'pro' , 'name' => 'Advance Woo Search', 'demo' => 'https://anantaddons.com/woo-search/' ),

            array( 'type' => 'pro'  , 'name' => 'Advance Woo Ajax Search', 'demo' => 'https://anantaddons.com/woo-search/' ),
        
            array( 'type' => 'pro' , 'name' => 'Advance Time Counter', 'demo' => 'https://anantaddons.com/addons/time-counter/' ),

            array( 'type' => 'pro' , 'name' => 'Advance Single Product Page', 'demo' => 'https://anantaddons.com/product-title/' ),

            array( 'type' => 'pro' , 'name' => 'Advance Product Archive Page', 'demo' => 'https://anantaddons.com/product-title/' ),
           
        );
    }

    public function eshop_admin_page_content() { 
        $eshop_free_features = $this->eshop_free_features();
        $eshop_pro_features = $this->eshop_premium_features(); ?>

        <div class="page-content">
            <div class="tabbed">
                <input type="radio" id="tab1" name="css-tabs" <?php if( !isset($_GET['tab']) || isset($_GET['tab']) && $_GET['tab'] == 'welcome' ){ echo 'checked'; } ?> >
                <input type="radio" id="tab2" name="css-tabs" <?php if( isset($_GET['tab']) && $_GET['tab'] == 'starter-sites' ){ echo 'checked'; } ?> >
                <input type="radio" id="tab3" name="css-tabs" <?php if( isset($_GET['tab']) && $_GET['tab'] == 'plugins' ){ echo 'checked'; } ?> >
                <div class="head-top-items">
                    <div class="head-item">
                        <a href="#" class="site-icon"><img src="<?php echo ESHOP_ELEMENTOR_URI . 'images/site-logo.jpg' ?>" alt=""></a>
                        <ul class="tabs">
                            <li class="tab">
                                <label for="tab1" tab="welcome">
                                <a  href="<?php echo esc_url( add_query_arg( [ 'tab'   => 'welcome'] ) ); ?>">
                                    <?php esc_html_e( 'Welcome', 'eshop-elementor' ); ?>
                                </a>
                                </label>
                            </li>
                            <li class="tab">
                                <label for="tab2" tab="starter-sites">
                                <a  href="<?php echo esc_url( add_query_arg( [ 'tab'   => 'starter-sites'] ) ); ?>">
                                    <?php esc_html_e( 'Starter Sites', 'eshop-elementor' ); ?>
                                </a>
                                </label>
                            </li>
                            <li class="tab">
                                <label for="tab3" tab="plugins">
                                <a  href="<?php echo esc_url( add_query_arg( [ 'tab'   => 'plugins'] ) ); ?>">
                                    <?php esc_html_e( 'Plugins', 'eshop-elementor' ); ?>
                                </a>
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="right-top-area">
                        <div class="version">
                            <span><?php echo ESHOP_ELEMENTOR_VERSION; ?></span>
                        </div>
                        <div class="feature_pro">
                            <a href="https://anantaddons.com" target="_blank">
                                <span class="head-icon"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24"
                                        fill="none" style="fill: #fff;">
                                        <path
                                            d="M19.6872 14.0931L19.8706 12.3884C19.9684 11.4789 20.033 10.8783 19.9823 10.4999L20 10.5C20.8284 10.5 21.5 9.82843 21.5 9C21.5 8.17157 20.8284 7.5 20 7.5C19.1716 7.5 18.5 8.17157 18.5 9C18.5 9.37466 18.6374 9.71724 18.8645 9.98013C18.5384 10.1814 18.1122 10.606 17.4705 11.2451L17.4705 11.2451C16.9762 11.7375 16.729 11.9837 16.4533 12.0219C16.3005 12.043 16.1449 12.0213 16.0038 11.9592C15.7492 11.847 15.5794 11.5427 15.2399 10.934L13.4505 7.7254C13.241 7.34987 13.0657 7.03557 12.9077 6.78265C13.556 6.45187 14 5.77778 14 5C14 3.89543 13.1046 3 12 3C10.8954 3 10 3.89543 10 5C10 5.77778 10.444 6.45187 11.0923 6.78265C10.9343 7.03559 10.759 7.34984 10.5495 7.7254L8.76006 10.934C8.42056 11.5427 8.25081 11.847 7.99621 11.9592C7.85514 12.0213 7.69947 12.043 7.5467 12.0219C7.27097 11.9837 7.02381 11.7375 6.5295 11.2451C5.88787 10.606 5.46156 10.1814 5.13553 9.98012C5.36264 9.71724 5.5 9.37466 5.5 9C5.5 8.17157 4.82843 7.5 4 7.5C3.17157 7.5 2.5 8.17157 2.5 9C2.5 9.82843 3.17157 10.5 4 10.5L4.01771 10.4999C3.96702 10.8783 4.03162 11.4789 4.12945 12.3884L4.3128 14.0931C4.41458 15.0393 4.49921 15.9396 4.60287 16.75H19.3971C19.5008 15.9396 19.5854 15.0393 19.6872 14.0931Z"
                                            fill="#1C274C" style="&#10;    fill: #fff;&#10;" />
                                        <path
                                            d="M10.9121 21H13.0879C15.9239 21 17.3418 21 18.2879 20.1532C18.7009 19.7835 18.9623 19.1172 19.151 18.25H4.84896C5.03765 19.1172 5.29913 19.7835 5.71208 20.1532C6.65817 21 8.07613 21 10.9121 21Z"
                                            fill="#1C274C" style="&#10;    fill: #fff;&#10;" />
                                    </svg>
                                </span>
                                <?php esc_html_e( 'Pro Feature', 'eshop-elementor' ); ?>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="esh-main-area">
                    <div class="tab-contents">
                        <div class="tab-content welcome">
                            <div class="item-content flex align-center gap-30">
                                <div class="text-content">
                                    <h2 class="heading-content"> 
                                        <?php esc_html_e( 'Welcome to ', 'eshop-elementor' ); 
                                        $current_theme = wp_get_theme();
                                        echo esc_html( $current_theme->get( 'Name' ) );                                       
                                        ?>
                                    </h2>
                                    <p><?php esc_html_e( 'Eshop is a sleek, fast, and highly customizable WordPress theme designed specifically for e-commerce websites. Perfect for creating modern, user-friendly online stores, it’s lightweight, WooCommerce-ready, and optimized for speed and conversions.', 'eshop-elementor' );?></p>
                                    <div class="buttons flex gap-15">
                                        <a href="<?php echo esc_url( add_query_arg( [ 'tab'   => 'starter-sites'] ) ); ?>" class="btn-default"><?php esc_html_e( 'Get Start', 'eshop-elementor' );?></a>
                                        <a href="#" class="btn-default">Watch and Launch Quickly!</a>
                                    </div>
                                </div>
                                <!-- media -->
                                <div class="eshop-media">
                                <iframe width="1109" height="541" src="https://www.youtube.com/embed/mf549otb_hI" title="E shop Elementor Theme  Installation" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                </div>
                            </div>
                            
                            <div class="grid mt-30 gap-30 column-4">
                                <div class="esh-key-features col-span-3">
                                    <div class="esh-key-features-free">
                                        <h2 class="esh-key-feature-title">Elevate Your Store with Eshop Features</h2>
                                        <div class="esh-key-features_content">
                                            <?php foreach ($eshop_free_features as $features) { ?>
                                                <div class="esh-key-feature-box">
                                                    <div class="esh-key-features-title-area">
                                                        <h5 class="esh-key-features-title"><a href="<?php echo esc_url($features['demo']); ?>" target="_blank"><?php echo esc_html($features['name']); ?></a></h5>
                                                    </div>
                                                    <div class="esh-key-features-btn-area anant-admin-f-center">
                                                        <a href="<?php echo esc_url($features['demo']); ?>" target="_blank" class="edit"><i class="dashicons dashicons-external"></i></a> 
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="esh-key-feature-premium">
                                        <h2 class="esh-key-feature-title">Unlock Your Store's Full Potential with Pro Features.</h2>
                                        <div class="esh-key-features_content">
                                            <?php foreach ($eshop_pro_features as $features) { ?>
                                                <div class="esh-key-feature-box">
                                                    <div class="esh-key-features-title-area">
                                                        <h5 class="esh-key-features-title"><a href="<?php echo esc_url($features['demo']); ?>" target="_blank"><?php echo esc_html($features['name']); ?></a></h5>
                                                        <?php if($features['type'] == 'pro'){ ?>
                                                            <span class="esh-pro-feature">Pro</span>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="esh-key-features-btn-area anant-admin-f-center">
                                                        <a href="<?php echo esc_url($features['demo']); ?>" target="_blank" class="edit"><i class="dashicons dashicons-external"></i></a> 
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <!-- <div class="esh-key-feature-box">
                                                <div class="esh-key-features-title-area">
                                                    <h5 class="esh-key-features-title"><a href="" target="_blank">Product Slider</a></h5>
                                                </div>
                                                <div class="esh-key-features-btn-area anant-admin-f-center">
                                                    <a href="" target="_blank" class="edit"><i class="dashicons dashicons-external"></i></a> 
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="esh-quick-links">
                                    <div class="esh-quick-link-box">
                                        <div class="esh-item-icon-title">
                                            <h2 class="esh-heading">Upgrade to Pro</h2>
                                            <span class="esh-item-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" style="fill: white; width: 25px; height: 25px;" viewBox="0 0 640 512"><path d="M528 448H112c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h416c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm64-320c-26.5 0-48 21.5-48 48 0 7.1 1.6 13.7 4.4 19.8L476 239.2c-15.4 9.2-35.3 4-44.2-11.6L350.3 85C361 76.2 368 63 368 48c0-26.5-21.5-48-48-48s-48 21.5-48 48c0 15 7 28.2 17.7 37l-81.5 142.6c-8.9 15.6-28.9 20.8-44.2 11.6l-72.3-43.4c2.7-6 4.4-12.7 4.4-19.8 0-26.5-21.5-48-48-48S0 149.5 0 176s21.5 48 48 48c2.6 0 5.2-.4 7.7-.8L128 416h384l72.3-192.8c2.5 .4 5.1 .8 7.7 .8 26.5 0 48-21.5 48-48s-21.5-48-48-48z"/></svg>
                                            </span>
                                        </div>
                                        <a href="https://anantaddons.com" target="_blank"></a>
                                        <p class="esh-paragraph">Unlock advanced customization and enjoy premium support from our team of WordPress wizards.</p>   
                                        <a href="https://anantaddons.com" target="_blank" class="esh-sm-link">Proceed to Buy Now!</a>                             
                                    </div>

                                    <div class="esh-quick-link-box">
                                        <div class="esh-item-icon-title">
                                            <h2 class="esh-heading">Explore the Guide</h2>
                                            <span class="esh-item-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" style="fill: white; width: 25px; height: 25px;" viewBox="0 0 384 512"><path d="M288 248v28c0 6.6-5.4 12-12 12H108c-6.6 0-12-5.4-12-12v-28c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12zm-12 72H108c-6.6 0-12 5.4-12 12v28c0 6.6 5.4 12 12 12h168c6.6 0 12-5.4 12-12v-28c0-6.6-5.4-12-12-12zm108-188.1V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V48C0 21.5 21.5 0 48 0h204.1C264.8 0 277 5.1 286 14.1L369.9 98c9 8.9 14.1 21.2 14.1 33.9zm-128-80V128h76.1L256 51.9zM336 464V176H232c-13.3 0-24-10.7-24-24V48H48v416h288z"/></svg>
                                            </span>
                                        </div>
                                        <a href="https://anantaddons.com/docs/" target="_blank"></a>
                                        <p class="esh-paragraph">Struggling to figure it out? Let our detailed guides be your ultimate problem-solver!</p>   
                                        <a href="https://anantaddons.com/docs/" target="_blank" class="esh-sm-link">Explore Now</a>                             
                                    </div>

                                    <div class="esh-quick-link-box">
                                        <div class="esh-item-icon-title">
                                            <h2 class="esh-heading">Rate Us</h2>
                                            <span class="esh-item-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" style="fill: white; width: 25px; height: 25px;" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M528.1 171.5L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6zM388.6 312.3l23.7 138.4L288 385.4l-124.3 65.3 23.7-138.4-100.6-98 139-20.2 62.2-126 62.2 126 139 20.2-100.6 98z"/></svg>
                                            </span>
                                        </div>
                                        <a href="https://wordpress.org/support/theme/eshop-elementor/reviews/#new-post" target="_blank"></a>
                                        <p class="esh-paragraph">Share your thoughts! Please leave a review and help us improve your experience.</p>   
                                        <a href="https://wordpress.org/support/theme/eshop-elementor/reviews/#new-post" target="_blank" class="esh-sm-link">Submit a Review</a>                             
                                    </div>

                                    <div class="esh-quick-link-box">
                                        <div class="esh-item-icon-title">
                                            <h2 class="esh-heading">Our support</h2>
                                            <span class="esh-item-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="fill: white; width: 25px; height: 25px;" viewBox="0 0 512 512"><path d="M192 208c0-17.7-14.3-32-32-32h-16c-35.4 0-64 28.7-64 64v48c0 35.4 28.7 64 64 64h16c17.7 0 32-14.3 32-32V208zm176 144c35.4 0 64-28.7 64-64v-48c0-35.4-28.7-64-64-64h-16c-17.7 0-32 14.3-32 32v112c0 17.7 14.3 32 32 32h16zM256 0C113.2 0 4.6 118.8 0 256v16c0 8.8 7.2 16 16 16h16c8.8 0 16-7.2 16-16v-16c0-114.7 93.3-208 208-208s208 93.3 208 208h-.1c.1 2.4 .1 165.7 .1 165.7 0 23.4-18.9 42.3-42.3 42.3H320c0-26.5-21.5-48-48-48h-32c-26.5 0-48 21.5-48 48s21.5 48 48 48h181.7c49.9 0 90.3-40.4 90.3-90.3V256C507.4 118.8 398.8 0 256 0z"/></svg>
                                            </span>
                                        </div>
                                        <a href="https://wordpress.org/support/theme/eshop-elementor/" target="_blank"></a>
                                        <p class="esh-paragraph">Need help or have feedback? Join our Support Forum for quick answers and friendly advice!</p>   
                                        <a href="https://wordpress.org/support/theme/eshop-elementor/" target="_blank" class="esh-sm-link">Ask for Help</a>                             
                                    </div>

                                    <div class="esh-quick-link-box">
                                        <div class="esh-item-icon-title">
                                            <h2 class="esh-heading">Feature Request</h2>
                                            <span class="esh-item-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="fill: white; width: 25px; height: 25px;" viewBox="0 0 512 512"><path d="M168.2 384.9c-15-5.4-31.7-3.1-44.6 6.4c-8.2 6-22.3 14.8-39.4 22.7c5.6-14.7 9.9-31.3 11.3-49.4c1-12.9-3.3-25.7-11.8-35.5C60.4 302.8 48 272 48 240c0-79.5 83.3-160 208-160s208 80.5 208 160s-83.3 160-208 160c-31.6 0-61.3-5.5-87.8-15.1zM26.3 423.8c-1.6 2.7-3.3 5.4-5.1 8.1l-.3 .5c-1.6 2.3-3.2 4.6-4.8 6.9c-3.5 4.7-7.3 9.3-11.3 13.5c-4.6 4.6-5.9 11.4-3.4 17.4c2.5 6 8.3 9.9 14.8 9.9c5.1 0 10.2-.3 15.3-.8l.7-.1c4.4-.5 8.8-1.1 13.2-1.9c.8-.1 1.6-.3 2.4-.5c17.8-3.5 34.9-9.5 50.1-16.1c22.9-10 42.4-21.9 54.3-30.6c31.8 11.5 67 17.9 104.1 17.9c141.4 0 256-93.1 256-208S397.4 32 256 32S0 125.1 0 240c0 45.1 17.7 86.8 47.7 120.9c-1.9 24.5-11.4 46.3-21.4 62.9zM144 272a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm144-32a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm80 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg>
                                            </span>
                                        </div>
                                        <a href="https://wordpress.org/support/theme/eshop/reviews/?rate=5#new-post" target="_blank"></a>
                                        <p class="esh-paragraph">We’d love to hear your ideas—share any features you think could make our product even better!</p>   
                                        <a href="#" target="_blank" class="esh-sm-link">Send Feedback</a>                             
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="tab-content starter-sites">
                            <?php if(!$this->is_plugin_installed('ananta-sites') || !is_plugin_active($this->retrive_plugin_install_path('ananta-sites'))){ ?>
                                <div class="modal-main">
                                    <div class="modal-image overlay">
                                        <img src="<?php echo ESHOP_ELEMENTOR_URI . 'images/demos.jpg' ?>" alt="">
                                    </div>
                                    <div class="modal-popup">
                                        <div class="modal-popup-content">
                                            <div class="modal-icon">
                                                <img src="<?php echo ESHOP_ELEMENTOR_URI . 'images/anantsite-logo.png' ?>" alt="">
                                            </div>
                                            <div>
                                                <h4>Anant Sites</h4>
                                                <p>Unlock 10+ eShop-ready Elementor templates from Anant Sites, designed to elevate your e-commerce store effortlessly.</p>
                                                <a href="#" class="btn-default ins-ant-site" plug="ananta-sites" status="<?php echo $this->plugin_status_check('ananta-sites'); ?>">
                                                    <?php if (!$this->is_plugin_installed('ananta-sites')) {
                                                        esc_html_e('Install Anant Sites', 'eshop-elementor');
                                                    } elseif (!is_plugin_active($this->retrive_plugin_install_path('ananta-sites'))) {
                                                        esc_html_e('Activate Anant Sites', 'eshop-elementor');
                                                    } else {
                                                        esc_html_e( 'Import Demo', 'eshop-elementor' );
                                                    }
                                                    ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } else { 
                                    
                                $theme_data_api = wp_remote_get(esc_url_raw("https://template.anantaddons.com/wp-json/wp/v2/demos?categories=29"));

                                $theme_data_api_body = wp_remote_retrieve_body($theme_data_api);
                                $all_demos = json_decode($theme_data_api_body, TRUE);
                                if ($all_demos === null) { ?>
                                    <script type="text/javascript">
                                        window.location.reload();
                                    </script>
                                <?php }
                                foreach($all_demos as $key => $demo){
                                    if( array_key_exists("elementor", $demo['meta']['template_type']) || array_key_exists("1", $demo['meta']['template_type']) ) {
                                        unset($all_demos[$key]);
                                    }
                                }
                                array_values($all_demos);

                                if (count($all_demos) == 0) {
                                    wp_die('There are no demos available for this theme!');
                                } ?>
                                <section class="ali-templates-main">
                                    <!-- Start: Demo Grid -->
                                    <div class="algrid-wrap theme-grid-wrap">
                                        <?php foreach($all_demos as $demo) { ?>
                                            <div class="grid-item" data-theme_type="<?php echo esc_attr(strtolower($demo['meta']['plugin_type'][0])); ?>" data-name="<?php echo esc_attr(strtolower($demo['title']['rendered'])); ?>" >
                                                <?php 
                                                if(strtolower($demo['meta']['plugin_type'][0]) == "pro"){ ?>
                                                    <span class="alribbon <?php echo esc_attr(strtolower($demo['meta']['plugin_type'][0])); ?>">
                                                        <?php echo esc_attr(ucfirst($demo['meta']['plugin_type'][0])); ?>
                                                    </span>
                                                <?php } ?>
                                                <div class="grid-item-images">
                                                    <img src="<?php echo esc_url($demo['meta']['preview_url'][0]); ?>" />
                                                    <div class="grid-item-overlay flex items-center justify-center">
                                                        <?php if ($this->is_plugin_installed('anant-addons-for-elementor-pro') === false && strtolower($demo['meta']['plugin_type'][0]) == "pro"): ?>
                                                            <a class="demos-link" target="_blank"
                                                                href="<?php echo esc_url($demo['meta']['pro_link'][0]);?>">
                                                                <?php esc_html_e('Buy Now', 'eshop-elementor'); ?>
                                                            </a>
                                                        <?php else: ?>
                                                            <a class="demos-link" href="<?php echo esc_url(admin_url().'admin.php?page=ananta-demo-import&step=2&editor=elementor&theme_id='.$demo['id'].'&preview_url='.esc_url($demo['meta']['preview_link'][0]));?>">
                                                                <?php esc_html_e('Import', 'eshop-elementor'); ?>
                                                            </a>
                                                        <?php endif; ?>
                                                        <a aria-current="page" href="<?php echo !empty($demo['meta']['preview_link'][0]) ? esc_url(admin_url().'admin.php?page=ananta-demo-import&step=preview&editor=elementor&theme_id='.$demo['id'].'&preview_url='.esc_url($demo['meta']['preview_link'][0]).'&pro_link='.esc_url($demo['meta']['pro_link'][0]).'&dtn='.esc_attr($demo['meta']['plugin_name'][0])) : '#'; ?>" class="demos-preview-link">
                                                            <?php esc_html_e('Preview', 'eshop-elementor'); ?>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="grid-item-content flex justify-between align-center">
                                                <h5><?php echo esc_html($demo['title']['rendered']); ?></h5>
                                                <?php if ($this->is_plugin_installed('anant-addons-for-elementor-pro') === false && strtolower($demo['meta']['plugin_type'][0]) == "pro"): ?>
                                                    <a class="pro-demos-link" target="_blank"
                                                        href="<?php echo esc_url($demo['meta']['pro_link'][0]);?>">
                                                        <?php esc_html_e('Buy Now', 'eshop-elementor'); ?>
                                                    </a>
                                                <?php else: ?>
                                                    <a class="import" href="<?php echo esc_url(admin_url().'admin.php?page=ananta-demo-import&&step=2&editor=elementor&theme_id='.$demo['id'].'&preview_url='.esc_url($demo['meta']['preview_link'][0]));?>">Import</a>
                                                <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <!-- End: Demo Grid -->
                                </section>
                            <?php } ?>
                        </div>

                        <div class="tab-content plugins">
                            <!-- plugin area -->
                            <div class="grid column-4 gap-30">
                                <div class="esh-quick-link-box">
                                    <div class="esh-img">
                                        <img src="<?php echo ESHOP_ELEMENTOR_URI . 'images/anantsite-logo.png' ?>" alt="">
                                        <h2 class="esh-img-heading">Anant Sites</h2>
                                    </div>
                                    <p class="esh-paragraph">Anant Sites offers 40+ pre-made Elementor templates, including Woo-ready designs.</p>
                                    <a href="#" class="esh-btn-link" plug="ananta-sites" status="<?php echo $this->plugin_status_check('ananta-sites'); ?>">
                                        <?php if (!$this->is_plugin_installed('ananta-sites')) {
                                                esc_html_e('Install', 'eshop-elementor');
                                            } elseif (!is_plugin_active($this->retrive_plugin_install_path('ananta-sites'))) {
                                                esc_html_e('Activate', 'eshop-elementor');
                                            } else {
                                                esc_html_e('Activated', 'eshop-elementor' );
                                            }
                                        ?>
                                    </a>
                                </div>
                                <div class="esh-quick-link-box">
                                    <div class="esh-img">
                                        <img src="<?php echo ESHOP_ELEMENTOR_URI . 'images/anantsite-logo.png' ?>" alt="">
                                        <h2 class="esh-img-heading">Anant Addons</h2>
                                    </div>
                                    <p class="esh-paragraph">Enhance your Elementor experience with 90+ essential elements and extensions.</p>
                                    <a href="#" class="esh-btn-link" plug="anant-addons-for-elementor" status="<?php echo $this->plugin_status_check('anant-addons-for-elementor'); ?>">
                                        <?php if (!$this->is_plugin_installed('anant-addons-for-elementor')) {
                                                esc_html_e('Install', 'eshop-elementor');
                                            } elseif (!is_plugin_active($this->retrive_plugin_install_path('anant-addons-for-elementor'))) {
                                                esc_html_e('Activate', 'eshop-elementor');
                                            } else {
                                                esc_html_e('Activated', 'eshop-elementor' );
                                            }
                                        ?>
                                    </a>
                                </div>
                                <div class="esh-quick-link-box">
                                    <div class="esh-img">
                                        <img src="<?php echo ESHOP_ELEMENTOR_URI . 'images/postextra-logo.png' ?>" alt="">
                                        <h2 class="esh-img-heading">Post Extra</h2>
                                    </div>
                                    <p class="esh-paragraph">Boost your content with Post Extra’s customizable Gutenberg posts blocks.</p>
                                    <a href="#" class="esh-btn-link" plug="post-extra" status="<?php echo $this->plugin_status_check('post-extra'); ?>">
                                        <?php if (!$this->is_plugin_installed('post-extra')) {
                                                esc_html_e('Install', 'eshop-elementor');
                                            } elseif (!is_plugin_active($this->retrive_plugin_install_path('post-extra'))) {
                                                esc_html_e('Activate', 'eshop-elementor');
                                            } else {
                                                esc_html_e('Activated', 'eshop-elementor' );
                                            }
                                        ?>
                                    </a>
                                </div>
                                <div class="esh-quick-link-box">
                                    <div class="esh-img">
                                        <img src="<?php echo ESHOP_ELEMENTOR_URI . 'images/gutenwawe-logo.png' ?>" alt="">
                                        <h2 class="esh-img-heading">Gutenwave</h2>
                                    </div>
                                    <p class="esh-paragraph">Create WordPress pages effortlessly with Gutenwave, your ultimate tool for seamless design and innovation.</p>
                                    <a href="#" class="esh-btn-link" plug="gutenwave-blocks" status="<?php echo $this->plugin_status_check('gutenwave-blocks'); ?>">
                                        <?php if (!$this->is_plugin_installed('gutenwave-blocks')) {
                                                esc_html_e('Install', 'eshop-elementor');
                                            } elseif (!is_plugin_active($this->retrive_plugin_install_path('gutenwave-blocks'))) {
                                                esc_html_e('Activate', 'eshop-elementor');
                                            } else {
                                                esc_html_e('Activated', 'eshop-elementor' );
                                            }
                                        ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    <?php }

    public function install_plug_ajax() {
        // // Verify nonce
        if (!isset($_POST['esh_admin_nonce']) && !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['esh_admin_nonce'])), 'esh_admin_nonce_check')) {
            wp_send_json_error('Nonce verification failed');
        }

        // Check user capabilities
        if (!current_user_can('edit_posts')) {
            wp_send_json_error('Insufficient permissions');
        }

        // check plugin name
        if (isset($_POST['plugin_name'])) {
            $plugin = $_POST['plugin_name'];
        }

        /* Get All Plugins Installed In Wordpress */
        $all_wp_plugins = get_plugins();
        $installed_plugins = [];

        $plugin_status = $this->eshop_elementor_get_required_plugin_status($plugin, $all_wp_plugins);
        if ($plugin_status == 'not-installed') {
            $this->install_plugin(['slug' => $plugin]);
            $installed_plugins['installed'][] = $plugin;
            $myplugin = $this->get_plugin_install_path($plugin);
            if ($myplugin) {
                $installed_plugins['activated'][] = !is_null(activate_plugin($myplugin, '', false, false)) ?: $plugin;
            }
            wp_send_json_success('Plugin Installed and activated Successfully');
        } else if ($plugin_status == 'inactive') {
            $myplugin = $this->get_plugin_install_path($plugin);
            if ($myplugin) {
                $installed_plugins['activated'][] = !is_null(activate_plugin($myplugin, '', false, false)) ?: $plugin;
            }
            wp_send_json_success('Plugin Activated Successfully');
        } else if ($plugin_status == 'active') {
            $installed_plugins['activated'][] = $plugin;
            wp_send_json_success('Plugin Installed Successfully');
        }else{
            wp_send_json_error('Something is wrong');
        }
    }

    public function is_plugin_installed($plugin_slug) {
        $all_plugins = get_plugins();
        foreach ($all_plugins as $key => $wp_plugin) {
            $folder_arr = explode("/", $key);
            $folder = $folder_arr[0];
            if ($folder == $plugin_slug) {
                return true;
            }
        }
        return false;
    }

    private function get_plugin_install_path($plugin_slug) {
        $all_plugins = get_plugins();
        foreach ($all_plugins as $key => $wp_plugin) {
            $folder_arr = explode("/", $key);
            $folder = $folder_arr[0];
            if ($folder == $plugin_slug) {
                return (string) $key;
                break;
            }
        }
        return false;
    }

    /**
     * Install Plugin
     *
     * @param array $plugin Required Plugin.
     */
    public function install_plugin($plugin = array()) {

        if (!isset($plugin['slug']) || empty($plugin['slug'])) {
            return esc_html__('Invalid plugin slug', 'eshop-elementor');
        }

        include_once ABSPATH . 'wp-admin/includes/plugin.php';
        include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
        include_once ABSPATH . 'wp-admin/includes/plugin-install.php';



        $api = plugins_api(
            'plugin_information',
            array(
                'slug' => sanitize_key(wp_unslash($plugin['slug'])),
                'fields' => array(
                    'sections' => false,
                ),
            )
        );

        if (is_wp_error($api)) {
            $status['errorMessage'] = $api->get_error_message();
            return $status;
        }

        $skin = new WP_Ajax_Upgrader_Skin();
        $upgrader = new Plugin_Upgrader($skin);
        $result = $upgrader->install($api->download_link);

        if (is_wp_error($result)) {
            return $result->get_error_message();
        } elseif (is_wp_error($skin->result)) {
            return $skin->result->get_error_message();
        } elseif ($skin->get_errors()->has_errors()) {
            return $skin->get_error_messages();
        } elseif (is_null($result)) {
            global $wp_filesystem;

            // Pass through the error from WP_Filesystem if one was raised.
            if ($wp_filesystem instanceof WP_Filesystem_Base && is_wp_error($wp_filesystem->errors) && $wp_filesystem->errors->has_errors()) {
                return esc_html($wp_filesystem->errors->get_error_message());
            }

            return esc_html__('Unable to connect to the filesystem. Please confirm your credentials.', 'eshop-elementor');
        }

        /* translators: %s plugin name. */
        return sprintf(esc_html__('Successfully installed "%s" plugin!', 'eshop-elementor'), $api->name);
    }

    public function retrive_plugin_install_path($plugin_slug) {
        include_once ABSPATH . 'wp-admin/includes/plugin.php';
        $all_plugins = get_plugins();
        foreach ($all_plugins as $key => $wp_plugin) {
            $folder_arr = explode("/", $key);
            $folder = $folder_arr[0];
            if ($folder == $plugin_slug) {
                return (string) $key;
                break;
            }
        }
        return false;
    }

    private function eshop_elementor_get_required_plugin_status($plugin, $all_plugins) {
        $response = 'not-installed';
        foreach ($all_plugins as $key => $wp_plugin) {
            $folder_arr = explode("/", $key);
            $folder = $folder_arr[0];
            if ($folder == $plugin) {
                if (is_plugin_inactive($key)) {
                    $response = 'inactive';
                } else {
                    $response = 'active';
                }
                return $response;
            }
        }
        return $response;

    }

    private function plugin_status_check($plug_slug){
        $status = '';
        if (!$this->is_plugin_installed($plug_slug)) {
            $status = 'not-installed';
        } elseif (!is_plugin_active($this->retrive_plugin_install_path($plug_slug))) {
            $status = 'not-active';
        } else {
            $status = 'active';
        }
        return $status;
    }
}

$admin_page = new Admin();
