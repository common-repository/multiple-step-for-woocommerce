<?php 
/**
* Plugin Name: Multiple Step For Woocommerce
* Description: This plugin allows create Multiple Step plugin.
* Version: 1.0.1
* Copyright: 2020
* Text Domain: multiple-step-for-woocommerce
* Domain Path: /languages 
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
  die('-1');
}

if (!defined('OCMSFW_PLUGIN_NAME')) {
  define('OCMSFW_PLUGIN_NAME', 'Multiple Step For Woocommerce');
}
if (!defined('OCMSFW_PLUGIN_VERSION')) {
  define('OCMSFW_PLUGIN_VERSION', '1.0');
}
if (!defined('OCMSFW_PLUGIN_FILE')) {
  define('OCMSFW_PLUGIN_FILE', __FILE__);
}
if (!defined('OCMSFW_PLUGIN_DIR')) {
  define('OCMSFW_PLUGIN_DIR',plugins_url('', __FILE__));
}
if (!defined('OCMSFW_BASE_NAME')) {
    define('OCMSFW_BASE_NAME', plugin_basename(OCMSFW_PLUGIN_FILE));
}
if (!defined('OCMSFW_DOMAIN')) {
  define('OCMSFW_DOMAIN', 'multiple-step-for-woocommerce');
}


if (!class_exists('OCMSFW')) {

    class OCMSFW {

        protected static $OCMSFW_instance;
        function __construct() {
            include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
            add_action('admin_init', array($this, 'OCMSFW_check_plugin_state'));
        }


        function OCMSFW_check_plugin_state(){
            if ( ! ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) ) {
                set_transient( get_current_user_id() . 'wqrerror', 'message' );
            }
        }


        function init() {
            if (!is_user_logged_in() && get_option('woocommerce_enable_checkout_login_reminder') == 'yes') {
                remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
            }
            remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_login_form', 10 );
            add_action( 'woocommerce_login_step_xee', 'woocommerce_checkout_login_form', 10 );
            remove_action( 'woocommerce_checkout_order_review', 'woocommerce_order_review', 10 );
            remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
            add_action( 'OCMSFW-woocommerce_order_review', 'woocommerce_order_review', 20 );
            add_action( 'OCMSFW-woocommerce_checkout_payment', 'woocommerce_checkout_payment', 10 );
            add_action( 'admin_notices', array($this, 'OCMSFW_show_notice'));
            add_action( 'admin_enqueue_scripts', array($this, 'OCMSFW_load_admin'));
            add_action( 'wp_enqueue_scripts',  array($this, 'OCMSFW_load_front'));
            add_filter( 'plugin_row_meta', array( $this, 'OCMSFW_plugin_row_meta' ), 10, 2 );
            add_filter( 'woocommerce_locate_template', array( $this, 'woocommerce_locate_template' ), 10, 3 );
        }


        function OCMSFW_show_notice() {
            if ( get_transient( get_current_user_id() . 'wqrerror' ) ) {
                deactivate_plugins( plugin_basename( __FILE__ ) );
                delete_transient( get_current_user_id() . 'wqrerror' );
                echo '<div class="error"><p> This plugin is deactivated because it require <a href="plugin-install.php?tab=search&s=woocommerce">WooCommerce</a> plugin installed and activated.</p></div>';
                
            }
        } 


        function OCMSFW_plugin_row_meta( $links, $file ) {
            //print_r($links);
            //print_r($file);
            //exit;
            if ( OCMSFW_BASE_NAME === $file ) {
                $row_meta = array(
                    'rating'    =>  '<a href="https://oceanwebguru.com/multiple-step-checkout-for-woocommerce/" target="_blank">Documentation</a> | <a href="https://oceanwebguru.com/contact-us/" target="_blank">Support</a> | <a href="https://wordpress.org/support/plugin/multiple-step-for-woocommerce/reviews/?filter=5" target="_blank"><img src="'.OCMSFW_PLUGIN_DIR.'/includes/images/star.png" class="ocmsfw_rating_div"></a>',
                );

                return array_merge( $links, $row_meta );
            }
            return (array) $links;
        }


        function OCMSFW_load_admin() {
            wp_enqueue_style( 'OCMSFW_admin_style', OCMSFW_PLUGIN_DIR . '/includes/css/ocmsfw_back_style.css', false, '1.0.0' );
            wp_enqueue_script( 'OCMSFW_backend_script', OCMSFW_PLUGIN_DIR . '/includes/js/ocmsfw_back_script.js',false,'1.0.0' );
            wp_enqueue_style( 'wp-color-picker' );
            wp_enqueue_script( 'wp-color-picker-alpha', OCMSFW_PLUGIN_DIR . '/includes/js/wp-color-picker-alpha.js', array( 'wp-color-picker' ), '1.0.0', true );
        }


        function OCMSFW_load_front() {
            // wp_enqueue_
            wp_register_style( 'fontawesome', '//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.2.0' );

            wp_enqueue_style( 'fontawesome' );
            // wp_register_style('fontawesome' , '//stackpa');
        
            wp_enqueue_style( 'OCMSFW_front_style', OCMSFW_PLUGIN_DIR . '/includes/css/ocmsfw_front_style.css', false, '1.0.0' );

            wp_enqueue_script( 'OCMSFW_front_script', OCMSFW_PLUGIN_DIR . '/includes/js/ocmsfw_front_script.js', false, '1.0.0' );

           

            wp_localize_script( 'OCMSFW_front_script', 'ocmsfw_ajax_postajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
            $ocmsfw_color_theame_multistep = get_option( 'ocmsfw_color_theame_multistep', '#5bc0de' );
            $ocmsfw_color_pipe_theame_multistep = get_option( 'ocmsfw_color_pipe_theame_multistep', '#b0b0b0' );
            $ocmsfw_color_arrow_step_multistep = get_option( 'multiplestepstyle', 'simple' );
            $ocmsfw_color_default_theame_multistep = get_option( 'ocmsfw_color_default_theame_multistep', '#b0b0b0' );
            $ocmsfw_enable_multistep = get_option('ocmsfw_enable_multistep', 'on');
            $ocmsfw_enable_validation_multistep = get_option('ocmsfw_enable_validation_multistep', 'on');
            
           
            $data = [
                    'ocmsfw_color_theame_multistep' => $ocmsfw_color_theame_multistep,
                    'ocmsfw_color_pipe_theame_multistep'=>$ocmsfw_color_pipe_theame_multistep,
                    'ocmsfw_color_arrow_step_multistep' =>$ocmsfw_color_arrow_step_multistep,
                    'ocmsfw_color_default_theame_multistep'=> $ocmsfw_color_default_theame_multistep,
                    'ocmsfw_enable_multistep'=> $ocmsfw_enable_multistep,
                    'ocmsfw_enable_validation_multistep'=> $ocmsfw_enable_validation_multistep
                ];
              
          
            wp_localize_script( 'OCMSFW_front_script', 'OCMSFWdata', $data );

        }

        public function woocommerce_locate_template( $template, $template_name, $template_path ) {

               //print_r($template_name);
            if( get_option('ocmsfw_enable_multistep', 'on') == 'on' ){
                if ( 'checkout/form-checkout.php' !== $template_name ) {
                    return $template;
                }
                $template = plugin_dir_path( __FILE__ ) . 'template/form-checkout.php';
                return $template;
            }
            else{ 
                if ( 'checkout/form-checkout.php' !== $template_name ) {
                    return $template;
                }                                
                $template = WP_PLUGIN_DIR .'/woocommerce/templates/checkout/form-checkout.php';
                return $template;
            }

        }

    
        
        function includes() {
            include_once('admin/ocmsfw_admin.php');
            include_once('admin/ocmsfw_kit.php');
        }


        public static function OCMSFW_instance() {
            if (!isset(self::$OCMSFW_instance)) {
                self::$OCMSFW_instance = new self();
               self::$OCMSFW_instance->includes();
               self::$OCMSFW_instance->init();
            }
            return self::$OCMSFW_instance;
        }

    }

   
    add_action('plugins_loaded', array('OCMSFW', 'OCMSFW_instance'));
    // register_activation_hook( OCWPO_PLUGIN_FILE, array('OCWPO', 'OCWPO_create_table' ));
}


add_action( 'plugins_loaded', 'OCMSFW_load_textdomain' );
function OCMSFW_load_textdomain() {
    load_plugin_textdomain( 'multiple-step-for-woocommerce', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

add_filter( 'load_textdomain_mofile', 'OCMSFW_plugin_load_own_textdomain', 10, 2 );
function OCMSFW_plugin_load_own_textdomain( $mofile, $domain ) {
    if ( 'multiple-step-for-woocommerce' === $domain && false !== strpos( $mofile, WP_LANG_DIR . '/plugins/' ) ) {
        $locale = apply_filters( 'plugin_locale', determine_locale(), $domain );
        $mofile = WP_PLUGIN_DIR . '/' . dirname( plugin_basename( __FILE__ ) ) . '/languages/' . $domain . '-' . $locale . '.mo';
    }
    return $mofile;
}