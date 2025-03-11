<?php class Notice {

    public function __construct() {
        add_action('admin_notices', array($this, 'custom_admin_notice'));
        add_action('admin_enqueue_scripts', array($this, 'eshop_elementor_admin_assests'), 999);
        add_action('wp_ajax_install_plug', array($this, 'install_plug_ajax'));
        add_action('wp_ajax_nopriv_install_plug', array($this, 'install_plug_ajax'));

        add_action( 'wp_ajax_dismissed_notice', array($this, 'dismiss_notice_handler') );
    }

    public function custom_admin_notice() {

        $screen = get_current_screen();
          if ( !$this->is_plugin_installed('ananta-sites') || !is_plugin_active($this->retrive_plugin_install_path('ananta-sites')) ) {
            if ( ! get_option('dismissed-esh-el-notice-option', FALSE ) ) { ?>
                <div class="wrap">
                    <div class="esh-el-notice" data-notice="esh-el-notice-option">
                        <button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>                   
                        <div class="esh-el-notice-inner">
                            <div class="esh-el-content">
                                <div class="esh-el-heading">
                                    <h3 class="esh-el-title"> 
                                        <?php esc_html_e( 'Welcome to ', 'eshop-elementor' ); 
                                        $current_theme = wp_get_theme();
                                        echo esc_html( $current_theme->get( 'Name' ) );
                                        ?>
                                    </h3>
                                </div>
                                <div class="esh-el-details">
                                    <p><?php esc_html_e( 'Thank you for choosing the Eshop Elementor theme! Designed for creating stunning e-commerce shops, it features 80+ premium Elementor widgets for full customization of your store, including headers, footers, product pages, carts, and checkouts. We highly recommend installing the Anant Sites plugin to easily import demo content with Elementor and get started quickly.', 'eshop-elementor' ); ?></p>
                                </div>
                                <div class="esh-el-notice-btn">
                                    <a class="btn notice-action url_ins" href="#">
                                        <?php if(!$this->is_plugin_installed('ananta-sites')){
                                            esc_html_e( 'Get Started with Anant Sites', 'eshop-elementor' );
                                        } elseif (!is_plugin_active($this->retrive_plugin_install_path('ananta-sites'))) {
                                            esc_html_e( 'Activate Anant Sites', 'eshop-elementor' );
                                        } else {
                                            esc_html_e( 'Import Demo', 'eshop-elementor' );
                                        }
                                        ?>
                                        <i class="dashicons dashicons-arrow-right-alt"></i>
                                    </a>
                                    <a class="btn notice-action" href="https://www.youtube.com/watch?v=mf549otb_hI" target="_blank">
                                        <?php esc_html_e( 'Video Tutorial', 'eshop-elementor' );?>
                                        <span class="dashicons dashicons-video-alt3"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="esh-el-content-img">
                                <?php 
                                $image_url = get_theme_file_uri( '/images/admin-image.jpg' );
                                // Check if the file exists
                                if ( file_exists( get_theme_file_path( '/images/admin-image.jpg' ) ) ) { ?>
                                    <img src="<?php echo esc_url( $image_url ); ?>" alt="Notice Image">
                                <?php } else { ?>
                                    <img src="<?php echo esc_url( ESHOP_ELEMENTOR_URI . 'images/admin-image.jpg' ); ?>" alt="Notice Image">
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
            
        } 
    }
    

    public function eshop_elementor_admin_assests() {
        wp_enqueue_script('eshop-elementor-ins-plug', get_template_directory_uri() . '/js/init.js', array('jquery'), '', true);
        wp_localize_script('eshop-elementor-ins-plug',
            'ins_plug_ajax_obj', 
                array(
                    'ajax_url' => admin_url('admin-ajax.php'),
                    'nonce' => wp_create_nonce('nonce_check'),
                    'import_url' => admin_url('admin.php?page=eshop-admin&tab=welcome')
                )
            );
        wp_enqueue_style( 'admin-notice-styles', get_template_directory_uri() . '/css/notice.css', array(), '1.0.0' );
        
    }
            
    public function install_plug_ajax() {
        // Verify nonce
        if ( ! isset( $_POST['check_plug_install_nonce'] ) && ! wp_verify_nonce( sanitize_text_field( wp_unslash ( $_POST['check_plug_install_nonce'] ) ) , 'nonce_check' ) ) {
            wp_send_json_error('Nonce verification failed');
        }
    
        // Check user capabilities
        if ( !current_user_can('edit_posts') ) {
            wp_send_json_error('Insufficient permissions');
        }
        /* Get All Plugins Installed In Wordpress */
        $all_wp_plugins = get_plugins();
        $installed_plugins = [];
        
        $plugin_status = $this->eshop_elementor_get_required_plugin_status('ananta-sites', $all_wp_plugins);     
        if($plugin_status == 'not-installed'){
            $this->install_plugin(['name' => 'Anant Sites', 'slug' => 'ananta-sites']);
            $installed_plugins['installed'][] = 'ananta-sites';
            $myplugin = $this->get_plugin_install_path('ananta-sites');
            if($myplugin){
                $installed_plugins['activated'][] = !is_null(activate_plugin( $myplugin, '', false, false )) ?: 'ananta-sites';
            }
        } else if($plugin_status == 'inactive'){
            $myplugin = $this->get_plugin_install_path('ananta-sites');
            if($myplugin){
                $installed_plugins['activated'][] = !is_null(activate_plugin( $myplugin, '', false, false )) ?: 'ananta-sites';
            }
            
        } else if($plugin_status == 'active') {
            $installed_plugins['activated'][] = 'ananta-sites';
        }
    }
    function dismiss_notice_handler() {
        if ( isset( $_POST['type'] ) ) {
            // Pick up the notice "type" - passed via jQuery (the "data-notice" attribute on the notice)
            $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
            // Store it in the options table
            update_option( 'dismissed-' . $type, TRUE );
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
        foreach($all_plugins as $key => $wp_plugin) {
            $folder_arr = explode("/", $key);
            $folder = $folder_arr[0];
            if($folder == $plugin_slug) {
                return (string)$key;
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
         
     public function install_plugin( $plugin = array() ) {
 
         if ( ! isset( $plugin['slug'] ) || empty( $plugin['slug'] ) ) {
                 return esc_html__( 'Invalid plugin slug', 'eshop-elementor' );
         }
 
         include_once ABSPATH . 'wp-admin/includes/plugin.php';
         include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
         include_once ABSPATH . 'wp-admin/includes/plugin-install.php';
 
         
 
         $api = plugins_api(
                 'plugin_information',
                 array(
                     'slug'   => sanitize_key( wp_unslash( $plugin['slug'] ) ),
                     'fields' => array(
                         'sections' => false,
                     ),
                 )
         );
 
         if ( is_wp_error( $api ) ) {
                 $status['errorMessage'] = $api->get_error_message();
                 return $status;
         }
 
         $skin     = new WP_Ajax_Upgrader_Skin();
         $upgrader = new Plugin_Upgrader( $skin );
         $result   = $upgrader->install( $api->download_link );
 
         if ( is_wp_error( $result ) ) {
                 return $result->get_error_message();
         } elseif ( is_wp_error( $skin->result ) ) {
                 return $skin->result->get_error_message();
         } elseif ( $skin->get_errors()->has_errors() ) {
                 return $skin->get_error_messages();
         } elseif ( is_null( $result ) ) {
                 global $wp_filesystem;
 
                 // Pass through the error from WP_Filesystem if one was raised.
                 if ( $wp_filesystem instanceof WP_Filesystem_Base && is_wp_error( $wp_filesystem->errors ) && $wp_filesystem->errors->has_errors() ) {
                         return esc_html( $wp_filesystem->errors->get_error_message() );
                 }
 
                 return esc_html__( 'Unable to connect to the filesystem. Please confirm your credentials.', 'eshop-elementor' );
         }
 
         /* translators: %s plugin name. */
         return sprintf( esc_html__( 'Successfully installed "%s" plugin!', 'eshop-elementor' ), $api->name );
     }

    public function retrive_plugin_install_path($plugin_slug) {
        include_once ABSPATH . 'wp-admin/includes/plugin.php';
        $all_plugins = get_plugins();
        foreach ($all_plugins as $key => $wp_plugin) {
            $folder_arr = explode("/", $key);
            $folder = $folder_arr[0];
            if ($folder == $plugin_slug) {
                return (string)$key;
                break;
            }
        }
        return false;
    }

    private function eshop_elementor_get_required_plugin_status($plugin, $all_plugins) {
        $response = 'not-installed';
        foreach($all_plugins as $key => $wp_plugin) {
            $folder_arr = explode("/", $key);
            $folder = $folder_arr[0];
            if($folder == $plugin) {
                if(is_plugin_inactive( $key ) ) {
                    $response = 'inactive';
                } else {
                    $response = 'active';
                }
                return $response;
            }
        }
        return $response;
            
    }
}

$notice = new Notice();
