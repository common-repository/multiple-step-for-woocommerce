<?php

if (!defined('ABSPATH'))
    exit;

if (!class_exists('OCMSFW_front')) {

    class OCMSFW_front {

        protected static $instance;

        function init() {
            //remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_login_form', 10 );
            remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
            add_action( 'woocommerce_review_order_before_payment', 'woocommerce_checkout_coupon_form', 5 );    

        }
       
        public static function instance() {

            if (!isset(self::$instance)) {
                self::$instance = new self();
                self::$instance->init();
            }
            return self::$instance;
        }
    }
    OCMSFW_front::instance();
}