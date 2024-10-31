<?php

if (!defined('ABSPATH'))
    exit;



if (!class_exists('OCMSFW_admin')) {
    class OCMSFW_admin {
        protected static $instance;

        /* multiple step option in admin*/
        public function OCMSFW_admin_menu() {
            add_menu_page(
                __( 'Multiple step Woocommerce', 'ocmsfw' ),
                __( 'Multiple step Woocommerce', 'ocmsfw' ),
                'manage_options',
                'ocmsfw-general-setting',
                array($this,'OCMSFW_general_setting'),
                'dashicons-controls-forward',
                10
            );
        }

        /* multiple step page in admin*/
        public function OCMSFW_general_setting() {
            ?>

            <div class="ocmsfw-container">
                    <form method="post">
                        <?php wp_nonce_field( 'ocmsfw_nonce_action', 'ocmsfw_nonce_field' ); ?>
                        <ul class="tabs">
                            <li class="tab-link current" data-tab="ocmsfw-tab-general"><?php echo __( 'General Settings', 'OCMSFW'  );?></li>
                            <li class="tab-link" data-tab="ocmsfw-tab-other"><?php echo __( 'Steps on Buttons', 'OCMSFW' );?></li>
                        </ul>
                        <div id="ocmsfw-tab-general" class="tab-content current">
                            <div class="cover_div">
                                <h2><?php echo __( 'Multiple Step For Woocommerce', 'ocmsfw' ); ?></h2>
                                <table class="data_table">
                                    <tr>
                                        <td><?php echo __( 'Enable Multistep step field', 'ocmsfw' );  ?></td>
                                        <td>
                                            <input type="checkbox" name="ocmsfw_enable_multistep" <?php if( get_option('ocmsfw_enable_multistep', 'on') == 'on' ) { echo 'checked'; } ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo __( 'Enable Login Step Field', 'ocmsfw' );  ?></td>
                                        <td>
                                            <input type="checkbox" name="ocmsfw_enable_loginstep_multistep" <?php if( get_option('ocmsfw_enable_loginstep_multistep', 'on') == 'on' ) { echo 'checked'; } ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo __( 'Enable Validation Nextstep of field', 'ocmsfw' );  ?></td>
                                        <td>
                                            <input type="checkbox" name="ocmsfw_enable_validation_multistep" <?php if( get_option('ocmsfw_enable_validation_multistep', 'on') == 'on' ) { echo 'checked'; } ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo __( 'Enable Back To cart Button in First step', 'ocmsfw' );  ?></td>
                                        <td>
                                            <input type="checkbox" name="ocmsfw_enable_back_cart_button" <?php if( get_option('ocmsfw_enable_back_cart_button', 'on') == 'on' ) { echo 'checked'; } ?>>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo __('Combine Billig & Shipping,Order & Payment','ocmsfw'); ?></td>
                                        <td><input type="checkbox" name="ocmsfw_combine_step" <?php if( get_option('ocmsfw_combine_step', 'off') == 'on' ) { echo 'checked'; } ?>><span class="ocmsfw_combine_notice">Note : If You Check this field so Multistep style only Wizard-round-shape </label></td>
                                    </tr>
                                </table>
                            </div>

                            <div class="cover_div">
                                <h2><?php echo __( 'Multiple Step Color Setting and Style', 'ocmsfw' ); ?></h2>
                                <table class="data_table multidesign">

                                    <tr>
                                        <td><?php echo __( 'Multistep Active BackGround color', 'ocmsfw' ); ?></td>
                                        <td>
                                            <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo get_option( 'ocmsfw_color_theame_multistep', '#5bc0de' ); ?>" name="ocmsfw_color_theame_multistep" value="<?php echo get_option( 'ocmsfw_color_theame_multistep', '#5bc0de' ); ?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo __( 'Multistep BackGround color', 'ocmsfw' ); ?></td>
                                        <td>
                                            <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo get_option( 'ocmsfw_color_default_theame_multistep', '#b0b0b0' ); ?>" name="ocmsfw_color_default_theame_multistep" value="<?php echo get_option( 'ocmsfw_color_default_theame_multistep', '#b0b0b0' ); ?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo __( 'Multistep Active Pipe BackGround color', 'ocmsfw' ); ?></td>
                                        <td>
                                            <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo get_option( 'ocmsfw_color_pipe_theame_multistep', '#b0b0b0' ); ?>" name="ocmsfw_color_pipe_theame_multistep" value="<?php echo get_option( 'ocmsfw_color_pipe_theame_multistep', '#b0b0b0' ); ?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo __( 'Next Button Color', 'ocmsfw' ); ?></td>
                                        <td>
                                            <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo get_option( 'ocmsfw_next_button_color', '#d6225e' ); ?>" name="ocmsfw_next_button_color" value="<?php echo get_option( 'ocmsfw_next_button_color', '#d6225e' ); ?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo __( 'Previous Button Color', 'ocmsfw' ); ?></td>
                                        <td>
                                            <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo get_option( 'ocmsfw_previous_button_color', '#d6225e' ); ?>" name="ocmsfw_previous_button_color" value="<?php echo get_option( 'ocmsfw_previous_button_color', '#d6225e' ); ?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo __( 'Step Text Color', 'ocmsfw' ); ?></td>
                                        <td>
                                            <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>" name="ocmsfw_color_text_step" value="<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>"/>
                                        </td>
                                    </tr>
                                    
                                </table>
                            </div>
                            <div class="cover_div">
                                <h2><?php echo __( 'Multiple Step Style For Woocommerce', 'ocmsfw' ); ?></h2>
                                <table class="data_table multidesign">
                                    <tr>
                                        <td><?php echo __( 'Multi Step Style :', 'ocmsfw' ); ?></td>
                                        <td>
                                            <input type="radio"  name="multiplestepstyle" value="simple" <?php if(get_option( 'multiplestepstyle', 'simple' )=="simple"){ echo 'checked';} ?>>
                                            <label for="simple">Round Wizard</label>
                                            <input type="radio" name="multiplestepstyle" value="simple_round" <?php if(get_option( 'multiplestepstyle', 'simple' )=="simple_round"){ echo 'checked';} ?>>
                                            <label for="simple_round">Wizard Withouttext round shape</label>
                                            <input type="radio"  name="multiplestepstyle" value="rectangle" <?php if(get_option( 'multiplestepstyle', 'simple' )=="rectangle"){ echo 'checked';} ?>>
                                            <label for="rectangle">rectangle Wizard</label>
                                            <input type="radio" name="multiplestepstyle" value="formwizard" <?php if(get_option( 'multiplestepstyle', 'simple' )=="formwizard"){ echo 'checked';} ?>>
                                            <label for="formwizard">Wizard Multistep</label>
                                            <input type="radio" name="multiplestepstyle" value="arrow_wizard" <?php if(get_option( 'multiplestepstyle', 'simple' )=="arrow_wizard"){ echo 'checked';} ?>>
                                            <label for="arrow_wizard">Arrow Wizard Multistep</label>

                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div id="ocmsfw-tab-other" class="tab-content">
                            <div class="cover_div">
                                <h2><?php echo __( 'Multiple Step For Woocommerce', 'ocmsfw' ); ?></h2>
                                <table class="data_table">
                                    <tr>
                                        <td><?php echo __( 'Billing Step', 'ocmsfw' ); ?></td>
                                        <td>
                                            <input type="text" class="regular-text" name="ocmsfw_billing_step"  value="<?php echo get_option( 'ocmsfw_billing_step', 'Billing' ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo __( 'Shipping Step', 'ocmsfw' ); ?></td>
                                        <td>
                                            <input type="text" class="regular-text" name="ocmsfw_shipping_step"  value="<?php echo get_option( 'ocmsfw_shipping_step', 'Shipping' ); ?>" />

                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo __( 'Order Step', 'ocmsfw' ); ?></td>
                                        <td>
                                            <input type="text" class="regular-text" name="ocmsfw_order_step"  value="<?php echo get_option( 'ocmsfw_order_step', 'Order' ); ?>" />

                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo __( 'Payment Step', 'ocmsfw' ); ?></td>
                                        <td>
                                            <input type="text" class="regular-text" name="ocmsfw_payment_step"  value="<?php echo get_option( 'ocmsfw_payment_step', 'Payment' ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo __( 'Login Step', 'ocmsfw' ); ?></td>
                                        <td>
                                            <input type="text" class="regular-text" name="ocmsfw_login_step"  value="<?php echo get_option( 'ocmsfw_login_step', 'Login' ); ?>"/>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td><?php echo __( 'Skip Login Text', 'ocmsfw' ); ?></td>
                                        <td>
                                            <input type="text" class="regular-text" name="ocmsfw_skip_login"  value="<?php echo get_option( 'ocmsfw_skip_login', 'Skip Login' ); ?>"/>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td><?php echo __( 'Back To Login Text', 'ocmsfw' ); ?></td>
                                        <td>
                                            <input type="text" class="regular-text" name="ocmsfw_back_to_login"  value="<?php echo get_option( 'ocmsfw_back_to_login', 'Back To Login' ); ?>"/>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td><?php echo __( 'Next Button Text', 'ocmsfw' ); ?></td>
                                        <td>
                                            <input type="text" class="regular-text" name="ocmsfw_next_button_text"  value="<?php echo get_option( 'ocmsfw_next_button_text', 'Next' ); ?>" />
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo __( 'Previous Step', 'ocmsfw' ); ?></td>
                                        <td>
                                            <input type="text" class="regular-text" name="ocmsfw_previous_button_text"  value="<?php echo get_option( 'ocmsfw_previous_button_text', 'Previous' ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo __( 'Back to cart', 'ocmsfw' ); ?></td>
                                        <td>
                                            <input type="text" class="regular-text" name="ocmsfw_back_to_cart_button_text"  value="<?php echo get_option( 'ocmsfw_back_to_cart_button_text', 'Back To Cart' ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo __( 'Billing & Shipping combine step name', 'ocmsfw' ); ?></td>
                                        <td>
                                            <input type="text" class="regular-text" name="ocmsfw_billing_and_shipping_text"  value="<?php echo get_option( 'ocmsfw_billing_and_shipping_text', 'Billing & Shipping' ); ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo __( 'Ordre & Payment combine step name', 'ocmsfw' ); ?></td>
                                        <td>
                                            <input type="text" class="regular-text" name="ocmsfw_order_and_payment_step"  value="<?php echo get_option( 'ocmsfw_order_and_payment_step', 'Order & Payment' ); ?>" />
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <input type="hidden" name="action" value="ocmsfw_save_option">
                        <input type="submit" value="Save changes" name="submit" class="button-primary" id="ocmsfw-btn-space">
                    </form>  
            </div>
            <?php 

        }


        function remove_checkout_login_form(){

            if( get_option('ocmsfw_enable_loginstep_multistep', 'on') == 'off'){
                remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_login_form', 10 );
            }
        }


        function OCMSFW_support_and_rating_notice() {
            $screen = get_current_screen();

            if( 'ocmsfw-general-setting' == $screen->parent_base) {
                ?>
                <div class="ocmsfw_ratess_open">
                    <div class="ocmsfw_rateus_notice">
                        <div class="ocmsfw_rtusnoti_left">
                            <h3>Rate Us</h3>
                            <label>If you like our plugin, </label>
                            <a target="_blank" href="#">
                                <label>Please vote us</label>
                            </a>
                            <label>,so we can contribute more features for you.</label>
                        </div>
                        <div class="ocmsfw_rtusnoti_right">
                            <img src="<?php echo OCMSFW_PLUGIN_DIR;?>/includes/images/review.png" class="ocmsfw_review_icon">
                        </div>
                    </div>
                    <div class="ocmsfw_support_notice">
                        <div class="ocmsfw_rtusnoti_left">
                            <h3>Having Issues?</h3>
                            <label>You can contact us at</label>
                            <a target="_blank" href="https://oceanwebguru.com/contact-us/">
                                <label>Our Support Forum</label>
                            </a>
                        </div>
                        <div class="ocmsfw_rtusnoti_right">
                            <img src="<?php echo OCMSFW_PLUGIN_DIR;?>/includes/images/support.png" class="ocmsfw_review_icon">
                        </div>
                    </div>
                </div>
                <div class="ocmsfw_donate_main">
                   <img src="<?php echo OCMSFW_PLUGIN_DIR;?>/includes/images/coffee.svg">
                   <h3>Buy me a Coffee !</h3>
                   <p>If you like this plugin, buy me a coffee and help support this plugin !</p>
                   <div class="ocmsfw_donate_form">
                        <a class="button button-primary ocwg_donate_btn" href="https://www.paypal.com/paypalme/shayona163/" data-link="https://www.paypal.com/paypalme/shayona163/" target="_blank">Buy me a coffee !</a>
                   </div>
                </div>
                <?php
            }
        }


        function OCMSFW_save_options() {
            if( current_user_can('administrator') ) { 
                global $wpdb;
                
                if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'ocmsfw_save_option') {
                    if(!isset( $_POST['ocmsfw_nonce_field'] ) || !wp_verify_nonce( $_POST['ocmsfw_nonce_field'], 'ocmsfw_nonce_action' )) {
                        echo 'Sorry, your nonce did not verify.';
                        exit;

                    } else {

                        if(isset($_REQUEST['ocmsfw_enable_multistep']) && !empty($_REQUEST['ocmsfw_enable_multistep'])) {
                            $ocmsfw_enable_multistep = sanitize_text_field( $_REQUEST['ocmsfw_enable_multistep'] );
                        } else {
                            $ocmsfw_enable_multistep = 'off';
                        }


                        if(isset($_REQUEST['ocmsfw_enable_loginstep_multistep']) && !empty($_REQUEST['ocmsfw_enable_loginstep_multistep'])) {
                            $ocmsfw_enable_loginstep_multistep = sanitize_text_field( $_REQUEST['ocmsfw_enable_loginstep_multistep'] );
                        } else {
                            $ocmsfw_enable_loginstep_multistep = 'off';
                        }


                        if(isset($_REQUEST['ocmsfw_enable_validation_multistep']) && !empty($_REQUEST['ocmsfw_enable_validation_multistep'])) {
                            $ocmsfw_enable_validation_multistep = sanitize_text_field( $_REQUEST['ocmsfw_enable_validation_multistep'] );
                        } else {
                            $ocmsfw_enable_validation_multistep = 'off';
                        }


                        if(isset($_REQUEST['ocmsfw_enable_back_cart_button']) && !empty($_REQUEST['ocmsfw_enable_back_cart_button'])){
                             $ocmsfw_enable_back_cart_button = sanitize_text_field( $_REQUEST['ocmsfw_enable_back_cart_button'] );
                        } else {
                            $ocmsfw_enable_back_cart_button = 'off';
                        }


                        if(isset($_REQUEST['ocmsfw_combine_step']) && !empty($_REQUEST['ocmsfw_combine_step'])){
                            $ocmsfw_combine_step = sanitize_text_field( $_REQUEST['ocmsfw_combine_step'] );
                        } else {
                            $ocmsfw_combine_step = 'off';
                        }

                        
                        update_option('ocmsfw_combine_step', sanitize_text_field($ocmsfw_combine_step));

                        update_option('ocmsfw_enable_back_cart_button', sanitize_text_field($ocmsfw_enable_back_cart_button));

                        update_option('ocmsfw_enable_loginstep_multistep', sanitize_text_field($ocmsfw_enable_loginstep_multistep));
                        update_option('ocmsfw_enable_validation_multistep',  sanitize_text_field($ocmsfw_enable_validation_multistep));
                        update_option( 'ocmsfw_color_default_theame_multistep',sanitize_text_field( $_REQUEST['ocmsfw_color_default_theame_multistep'] ));
                        update_option( 'ocmsfw_color_pipe_theame_multistep', sanitize_text_field( $_REQUEST['ocmsfw_color_pipe_theame_multistep'] ));
                        update_option( 'ocmsfw_color_theame_multistep', sanitize_text_field( $_REQUEST['ocmsfw_color_theame_multistep'] ));
                        update_option( 'ocmsfw_previous_button_color', sanitize_text_field( $_REQUEST['ocmsfw_previous_button_color'] ));
                        update_option( 'ocmsfw_next_button_color', sanitize_text_field( $_REQUEST['ocmsfw_next_button_color'] ));
                        update_option( 'ocmsfw_color_text_step', sanitize_text_field( $_REQUEST['ocmsfw_color_text_step'] ));
                        update_option('ocmsfw_enable_multistep', sanitize_text_field($ocmsfw_enable_multistep));

                        update_option( 'ocmsfw_shipping_step', sanitize_text_field( $_REQUEST['ocmsfw_shipping_step'] ));
                        update_option( 'ocmsfw_billing_step', sanitize_text_field( $_REQUEST['ocmsfw_billing_step'] ));
                        update_option( 'ocmsfw_login_step', sanitize_text_field( $_REQUEST['ocmsfw_login_step'] ));
                        update_option( 'multiplestepstyle', sanitize_text_field( $_REQUEST['multiplestepstyle'] ));
                        update_option( 'ocmsfw_order_step', sanitize_text_field( $_REQUEST['ocmsfw_order_step'] ));
                        update_option( 'ocmsfw_payment_step', sanitize_text_field( $_REQUEST['ocmsfw_payment_step'] ));
                        update_option( 'ocmsfw_next_button_text', sanitize_text_field( $_REQUEST['ocmsfw_next_button_text'] ));
                        update_option( 'ocmsfw_skip_login', sanitize_text_field( $_REQUEST['ocmsfw_skip_login'] ));
                        update_option( 'ocmsfw_back_to_login', sanitize_text_field( $_REQUEST['ocmsfw_back_to_login'] ));
                        update_option( 'ocmsfw_previous_button_text', sanitize_text_field( $_REQUEST['ocmsfw_previous_button_text'] ));
                        update_option( 'ocmsfw_back_to_cart_button_text', sanitize_text_field( $_REQUEST['ocmsfw_back_to_cart_button_text'] ));
                        update_option('ocmsfw_billing_and_shipping_text' ,sanitize_text_field( $_REQUEST['ocmsfw_billing_and_shipping_text'] ));
                        update_option('ocmsfw_order_and_payment_step' , sanitize_text_field($_REQUEST['ocmsfw_order_and_payment_step']));
                    }
                }
            }
        }

       
        function init() {
             add_action( 'woocommerce_before_checkout_form', array($this, 'remove_checkout_login_form'), 4 );
            add_action('admin_menu', array($this, 'OCMSFW_admin_menu') );
            add_action( 'init', array($this, 'OCMSFW_save_options') );
            add_action( 'admin_notices', array($this, 'OCMSFW_support_and_rating_notice' ));

        }


        public static function instance() {
            if (!isset(self::$instance)) {
                self::$instance = new self();
                self::$instance->init();
            }
            return self::$instance;
        }
    }
    
    OCMSFW_admin::instance();
}



