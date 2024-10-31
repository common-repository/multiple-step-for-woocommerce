<?php

/**
 * Checkout Form
 *
 * This is an overridden copy of the woocommerce/templates/checkout/form-checkout.php file.
 */
 if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<?php do_action( 'woocommerce_before_checkout_form', $checkout ); ?>
<div class="form-wizard2">
    <div class="form-wizard-header">
        <?php  if(get_option( 'multiplestepstyle', 'simple' )=="simple") { 
            $oc_class= ""; ?>
        <?php }else if(get_option( 'multiplestepstyle', 'simple' )=="rectangle"){ 
            $oc_class= "wizard_theme_ul_rectangle"; 
            $oc_span_class="wizard_theme_rectangle" ; ?>
        <?php }else if(get_option( 'multiplestepstyle', 'simple' )=="simple_round"){ 
            $oc_span_class="wizard_theme_simple_round" ; ?>
        <?php }else if(get_option( 'multiplestepstyle', 'simple' )=="arrow_wizard"){
            $oc_class= "wizard_theme_ul_arrow";  
            $oc_span_class="wizard_theme_rectangle"; ?>
        <?php }else{ ?> 
            <ul class="list-unstyled form-wizard-steps clearfix">
                <?php if(!is_user_logged_in() && get_option('ocmsfw_enable_loginstep_multistep', 'on') == 'on' && get_option('ocmsfw_combine_step', 'off') == 'off' && get_option('woocommerce_enable_checkout_login_reminder') == 'yes'){?>
                    <li class="active" style="width: 20%;"><span class="wizard_theme" style="background-color: <?php echo get_option( 'ocmsfw_color_theame_multistep', '#5bc0de' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><i class="fa fa-user"></i></span></li>
                    <li style="width: 20%;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><span class="wizard_theme" style="background-color: <?php echo get_option( 'ocmsfw_color_default_theame_multistep', '#b0b0b0' ); ?>;"><i style="color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;" class="fa fa-address-card"></i></span></li>
                    <li style="color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;width: 20%;"><span class="wizard_theme" style="background-color: <?php echo get_option( 'ocmsfw_color_default_theame_multistep', '#b0b0b0' ); ?>;"><i style="color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;" class="fa fa-truck"></i></span></li>
                    <li style="color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;width: 20%;"> <span class="wizard_theme" style="background-color: <?php echo get_option( 'ocmsfw_color_default_theame_multistep', '#b0b0b0' ); ?>;"><i style="color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;" class="fa fa-align-justify"></i></span></li>
                     <li style="color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;width: 20%;"><span class="wizard_theme" style="background-color: <?php echo get_option( 'ocmsfw_color_default_theame_multistep', '#b0b0b0' ); ?>;"><i style="color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;" class="fa fa-credit-card"></i></span></li>

                <?php }elseif( is_user_logged_in() &&  get_option('ocmsfw_combine_step', 'off') == 'on' ){?>
                    <li class="active" id="combine"><span class="wizard_theme" style="background-color: <?php echo get_option( 'ocmsfw_color_theame_multistep', '#5bc0de' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><i style="color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;" class="fa fa-address-card"></i><i style="color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;" class="fa fa-truck"></i></span></li>
                    <li  id="combine" style="color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><span class="wizard_theme" style="background-color: <?php echo get_option( 'ocmsfw_color_default_theame_multistep', '#b0b0b0' ); ?>;"><i style="color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;" class="fa fa-align-justify"></i><i style="color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;" class="fa fa-credit-card"></i></span></li>
                <?php }elseif( !is_user_logged_in() && get_option('ocmsfw_combine_step', 'off') == 'on' && get_option('woocommerce_enable_checkout_login_reminder') == 'yes' ){?>
                    <li class="active" id="combine not_login"><span class="wizard_theme" style="background-color: <?php echo get_option( 'ocmsfw_color_theame_multistep', '#5bc0de' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><i class="fa fa-user"></i></span></li>
                    <li id="combine not_login" style="color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><span class="wizard_theme" style="background-color: <?php echo get_option( 'ocmsfw_color_default_theame_multistep', '#b0b0b0' ); ?>;"><i style="color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;" class="fa fa-address-card"></i><i style="color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;" class="fa fa-truck"></i></span></li>
                    <li id="combine not_login" style="color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><span class="wizard_theme" style="background-color: <?php echo get_option( 'ocmsfw_color_default_theame_multistep', '#b0b0b0' ); ?>;"><i style="color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;" class="fa fa-align-justify"></i><i style="color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;" class="fa fa-credit-card"></i></span></li>
                <?php }else{?>

                    <li class="active"><span class="wizard_theme" style="background-color: <?php echo get_option( 'ocmsfw_color_theame_multistep', '#5bc0de' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><i style="color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;" class="fa fa-address-card"></i></span></li>
                    <li style="color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><span class="wizard_theme" style="background-color: <?php echo get_option( 'ocmsfw_color_default_theame_multistep', '#b0b0b0' ); ?>;"><i style="color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;" class="fa fa-truck"></i></span></li>
                    <li style="color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"> <span class="wizard_theme" style="background-color: <?php echo get_option( 'ocmsfw_color_default_theame_multistep', '#b0b0b0' ); ?>;"><i style="color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;" class="fa fa-align-justify"></i></span></li>
                    <li style="color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><span class="wizard_theme" style="background-color: <?php echo get_option( 'ocmsfw_color_default_theame_multistep', '#b0b0b0' ); ?>;"><i style="color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;" class="fa fa-credit-card"></i></span></li>
                <?php } ?>
            </ul>
        <?php } ?>  
            <!--<p>Fill all form field to go next step</p> -->
        <?php if(!(get_option( 'multiplestepstyle', 'simple' )=="formwizard")) { ?>

            <ul class="list-unstyled form-wizard-steps clearfix <?php  if(!empty($oc_class)){ echo $oc_class; }  ?>">
                <?php if(!is_user_logged_in() && get_option('ocmsfw_enable_loginstep_multistep', 'on') == 'on' && get_option('woocommerce_enable_checkout_login_reminder') == 'yes'){?>
                    <?php if( get_option('ocmsfw_combine_step', 'off') == 'off' ){?>
                        <li class="active" style="width: 20%;"><span class="<?php  if(!empty($oc_span_class)){ echo $oc_span_class; }  ?>" style="background-color: <?php echo get_option( 'ocmsfw_color_theame_multistep', '#5bc0de' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><?php echo get_option( 'ocmsfw_login_step', 'Login' ); ?></span></li>
                        <li style="width: 20%;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><span  class="<?php  if(!empty($oc_span_class)){ echo $oc_span_class; }  ?>" style="background-color: <?php echo get_option( 'ocmsfw_color_default_theame_multistep', '#b0b0b0' ); ?>;"><?php echo get_option( 'ocmsfw_billing_step', 'Billing' ); ?></span></li>
                        <li style="color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;width: 20%;"><span  class="<?php  if(!empty($oc_span_class)){ echo $oc_span_class; }  ?>" style="background-color: <?php echo get_option( 'ocmsfw_color_default_theame_multistep', '#b0b0b0' ); ?>;"><?php echo get_option( 'ocmsfw_shipping_step', 'Shipping' ); ?></span></li>
                        <li style="color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;width: 20%;"> <span  class="<?php  if(!empty($oc_span_class)){ echo $oc_span_class; }  ?>" style="background-color: <?php echo get_option( 'ocmsfw_color_default_theame_multistep', '#b0b0b0' ); ?>;"><?php echo get_option( 'ocmsfw_order_step', 'Order' ); ?></span></li>
                         <li style="color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;width: 20%;"><span  class="<?php  if(!empty($oc_span_class)){ echo $oc_span_class; }  ?>" style="background-color: <?php echo get_option( 'ocmsfw_color_default_theame_multistep', '#b0b0b0' ); ?>;"><?php echo get_option( 'ocmsfw_payment_step', 'Payment' ); ?></span></li>

                    <?php } elseif(get_option( 'multiplestepstyle', 'simple' )=="rectangle" && get_option('ocmsfw_combine_step', 'off') == 'on' ) { ?>

                        <li class="combine_class after active" style="width: 33.3%;"><span class="wizard_theme_rectangle" style="background-color: <?php echo get_option( 'ocmsfw_color_theame_multistep', '#5bc0de' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><?php echo get_option( 'ocmsfw_login_step', 'Login' ); ?></span></li>
                        <li class="combine_class after" style="width: 33.3%;"><span class="wizard_theme_rectangle" style="background-color: <?php echo get_option( 'ocmsfw_color_default_theame_multistep', '#b0b0b0' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><?php echo get_option( 'ocmsfw_billing_and_shipping_text', 'Billing & Shipping' ); ?></span></li>
                        <li class="combine_class after" style="width: 33.3%; color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><span class="wizard_theme_rectangle" style="background-color: <?php echo get_option( 'ocmsfw_color_default_theame_multistep', '#b0b0b0' ); ?>;"><?php echo get_option( 'ocmsfw_order_and_payment_step', 'Order & Payment' ); ?></span></li>

                    <?php } elseif(get_option( 'multiplestepstyle', 'simple' )=="simple_round" && get_option('ocmsfw_combine_step', 'off') == 'on' ) { ?>

                        <li class="combine_class simple_round active" style="width: 33.3%;"><span class="wizard_theme_simple_round" style="background-color: <?php echo get_option( 'ocmsfw_color_theame_multistep', '#5bc0de' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"></span></li>
                        <li class="combine_class simple_round" style="width: 33.3%;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><span  class="wizard_theme_simple_round" style="background-color: <?php echo get_option( 'ocmsfw_color_default_theame_multistep', '#b0b0b0' ); ?>;"></span></li>
                        <li class="combine_class simple_round" style="color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;width: 33.3%;"><span  class="wizard_theme_simple_round" style="background-color: <?php echo get_option( 'ocmsfw_color_default_theame_multistep', '#b0b0b0' ); ?>;"></span></li>

                    <?php } elseif(get_option( 'multiplestepstyle', 'simple' )=="arrow_wizard" && get_option('ocmsfw_combine_step', 'off') == 'on' ) { ?>

                        <!-- billing&shipping and  Order&payment  without login -->
                        <li class="wizard_theme_rectangle active" style="width:33.3%;"><span  class="wizard_theme_rectangle"  style="background-color: <?php echo get_option( 'ocmsfw_color_theame_multistep', '#5bc0de' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><?php echo get_option('ocmsfw_login_step', 'Login'); ?></span></li>
                        <li  class="wizard_theme_rectangle" style="width:33.3%; color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><span  class="wizard_theme_rectangle" style="background-color: <?php echo get_option( 'ocmsfw_color_default_theame_multistep', '#b0b0b0' ); ?>;"><?php echo get_option('ocmsfw_billing_and_shipping_text', 'Billing & Shipping'); ?></span></li>
                        <li  class="wizard_theme_rectangle" style="width:33.3%; color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><span  class="wizard_theme_rectangle" style="background-color: <?php echo get_option( 'ocmsfw_color_default_theame_multistep', '#b0b0b0' ); ?>;"><?php echo get_option('ocmsfw_order_and_payment_step', 'Order & Payment'); ?></span></li>
                    <?php } else { ?>

                        <li class="combine_class active" style="width: 33.3%;"><span class="wizard_theme_simple_round" style="background-color: <?php echo get_option( 'ocmsfw_color_theame_multistep', '#5bc0de' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"></span><p><?php echo get_option( 'ocmsfw_login_step', 'Login' ); ?></p></li>
                        <li class="combine_class" style="width: 33.3%;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><span  class="wizard_theme_simple_round" style="background-color: <?php echo get_option( 'ocmsfw_color_default_theame_multistep', '#b0b0b0' ); ?>;"></span><p><?php echo get_option('ocmsfw_billing_and_shipping_text', 'Billing & Shipping'); ?></p></li>
                        <li class="combine_class" style="color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;width: 33.3%;"><span  class="wizard_theme_simple_round" style="background-color: <?php echo get_option( 'ocmsfw_color_default_theame_multistep', '#b0b0b0' ); ?>;"></span><p><?php echo get_option('ocmsfw_order_and_payment_step', 'Order & Payment'); ?></p></li>
                    <?php  } ?>

                <?php }else{?>
                    <!-- All step show  code user is not login -->
                    <?php if( get_option('ocmsfw_combine_step', 'off') == 'off' ){?>
                        <li class="active"><span  class="<?php  if(!empty($oc_span_class)){ echo $oc_span_class; }  ?>"  style="background-color: <?php echo get_option( 'ocmsfw_color_theame_multistep', '#5bc0de' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><?php echo get_option( 'ocmsfw_billing_step', 'Billing' ); ?></span></li>
                        <li style="color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><span  class="<?php  if(!empty($oc_span_class)){ echo $oc_span_class; }  ?>" style="background-color: <?php echo get_option( 'ocmsfw_color_default_theame_multistep', '#b0b0b0' ); ?>;"><?php echo get_option( 'ocmsfw_shipping_step', 'Shipping' ); ?></span></li>
                        <li style="color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"> <span  class="<?php  if(!empty($oc_span_class)){ echo $oc_span_class; }  ?>" style="background-color: <?php echo get_option( 'ocmsfw_color_default_theame_multistep', '#b0b0b0' ); ?>;"><?php echo get_option( 'ocmsfw_order_step', 'Order' ); ?></span></li>
                        <li style="color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><span  class="<?php  if(!empty($oc_span_class)){ echo $oc_span_class; }  ?>" style="background-color: <?php echo get_option( 'ocmsfw_color_default_theame_multistep', '#b0b0b0' ); ?>;"><?php echo get_option( 'ocmsfw_payment_step', 'Payment' ); ?></span></li>
                        
                    <?php } elseif(get_option( 'multiplestepstyle', 'simple' )=="rectangle" && get_option('ocmsfw_combine_step', 'off') == 'on' ) { ?>

                        <li class="combine_class after active" style="width: 50%;"><span class="wizard_theme_rectangle" style="background-color: <?php echo get_option( 'ocmsfw_color_theame_multistep', '#5bc0de' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><?php echo get_option( 'ocmsfw_billing_and_shipping_text', 'Billing & Shipping' ); ?></span></li>
                        <li class="combine_class after" style="width: 50%; color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><span class="wizard_theme_rectangle" style="background-color: <?php echo get_option( 'ocmsfw_color_default_theame_multistep', '#b0b0b0' ); ?>;"><?php echo get_option( 'ocmsfw_order_and_payment_step', 'Order & Payment' ); ?></span></li>
                    <?php } elseif(get_option( 'multiplestepstyle', 'simple' )=="simple_round" && get_option('ocmsfw_combine_step', 'off') == 'on' ) { ?>
                        <!-- billing&shipping and  Order&payment  without login -->
                        <li class="combine_class simple_round active" style="width:50%;"><span  class="wizard_theme_simple_round"  style="background-color: <?php echo get_option( 'ocmsfw_color_theame_multistep', '#5bc0de' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"></span></li>
                        <li  class="combine_class simple_round" style="width:50%; color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><span  class="wizard_theme_simple_round" style="background-color: <?php echo get_option( 'ocmsfw_color_default_theame_multistep', '#b0b0b0' ); ?>;"></span></li>

                    <?php } elseif(get_option( 'multiplestepstyle', 'simple' )=="arrow_wizard" && get_option('ocmsfw_combine_step', 'off') == 'on' ) { ?>

                        <!-- billing&shipping and  Order&payment  without login -->
                        <li class="wizard_theme_rectangle is_login active" style="width:50%;"><span  class="wizard_theme_rectangle"  style="background-color: <?php echo get_option( 'ocmsfw_color_theame_multistep', '#5bc0de' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><?php echo get_option('ocmsfw_billing_and_shipping_text', 'Billing & Shipping'); ?></span></li>
                        <li  class="wizard_theme_rectangle is_login" style="width:50%; color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><span  class="wizard_theme_rectangle" style="background-color: <?php echo get_option( 'ocmsfw_color_default_theame_multistep', '#b0b0b0' ); ?>;"><?php echo get_option('ocmsfw_order_and_payment_step', 'Order & Payment'); ?></span></li>
                    <?php } else { ?>
                        <!-- billing&shipping and  Order&payment  without login -->
                        <li class="combine_class active" style="width:50%;"><span  class="wizard_theme_simple_round"  style="background-color: <?php echo get_option( 'ocmsfw_color_theame_multistep', '#5bc0de' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"></span><p><?php echo get_option('ocmsfw_billing_and_shipping_text', 'Billing & Shipping'); ?></p></li>
                        <li  class="combine_class" style="width:50%; color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><span  class="wizard_theme_simple_round" style="background-color: <?php echo get_option( 'ocmsfw_color_default_theame_multistep', '#b0b0b0' ); ?>;"></span><p><?php echo get_option('ocmsfw_order_and_payment_step', 'Order & Payment'); ?></p></li>

                      
                    <?php  } ?>
                <?php } ?>
            </ul>
        <?php } ?>
    </div>
</div>
<div class="oc_login_form_checkout">
    <?php
    if (get_option('woocommerce_enable_checkout_login_reminder') == 'yes' && !is_user_logged_in()) {
        echo do_action( 'woocommerce_login_step_xee' );
    }
    ?>
</div>
<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data"> 
    <div class="form-wizard">
            
             <?php if(!is_user_logged_in() && get_option('ocmsfw_enable_loginstep_multistep', 'on') == 'on' && get_option('woocommerce_enable_checkout_login_reminder') == 'yes'){?>
                <?php if( get_option('ocmsfw_combine_step', 'off') == 'off' ) {?>
                    
                    <fieldset class="wizard-fieldset show">
                        
                        <div class="form-group login_form_custom clearfix">
                            <?php $back_to_cart = wc_get_cart_url(); ?>
                            <?php if( get_option('ocmsfw_enable_back_cart_button', 'on') == 'on' ){ ?>
                                <a href="<?php echo $back_to_cart; ?>" class="form-wizard-next-btn float-left" style="background-color:<?php echo get_option( 'ocmsfw_previous_button_color', '#d6225e' ); ?>;color:<?php echo get_option('ocmsfw_color_text_step', '#000000' ); ?>;"><?php echo get_option( 'ocmsfw_back_to_cart_button_text', 'Back to cart' ); ?></a>
                            <?php } ?>
                                <a href="#" class="form-wizard-next-btn float-right ocmsfw_disabled" style="background-color:<?php echo get_option( 'ocmsfw_next_button_color', '#d6225e' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;" disabled="disabled"><?php echo get_option( 'ocmsfw_skip_login', 'Skip Login' ); ?></a>
                        </div>
                    </fieldset>
                    <fieldset class="wizard-fieldset ocmsfw_biliing">
                        
                        <?php if ( $checkout->get_checkout_fields() ) : ?>
                            <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
                            <?php do_action( 'woocommerce_checkout_billing' ); ?>
                        <div class="form-group login_form_custom clearfix">
                            <a href="javascript:;" class="form-wizard-previous-btn float-left" style="background-color:<?php echo get_option( 'ocmsfw_previous_button_color', '#d6225e' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><?php echo get_option( 'ocmsfw_back_to_login', 'Back To Login' ); ?>
                            </a>
                            <a href="javascript:;" class="form-wizard-next-btn float-right" style="background-color:<?php echo get_option( 'ocmsfw_next_button_color', '#d6225e' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><?php echo get_option( 'ocmsfw_next_button_text', 'Next' ); ?>
                            </a>
                        </div>
                    </fieldset>
                    <!-- this field end combine Billing & Shipping -->

                    <!-- this field combine add payment & order -->
                    <fieldset class="wizard-fieldset ocmsfw_shipping">
                       
                        <?php do_action( 'woocommerce_checkout_shipping' ); ?>
                        <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
                        <?php endif; ?>
                        <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
                       
                        <div class="form-group clearfix">
                            <a href="javascript:;" class="form-wizard-previous-btn float-left" style="background-color:<?php echo get_option( 'ocmsfw_previous_button_color', '#d6225e' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><?php echo get_option( 'ocmsfw_previous_button_text', 'Previous' ); ?>
                            </a>
                            <a href="javascript:;" class="form-wizard-next-btn float-right" style="background-color:<?php echo get_option( 'ocmsfw_next_button_color', '#d6225e' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><?php echo get_option( 'ocmsfw_next_button_text', 'Next' ); ?>
                            </a>
                        </div>
                    </fieldset> 
                    <fieldset class="wizard-fieldset ocmsfw_order">
                       
                        <h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>
                        
                        <?php do_action( 'OCMSFW-woocommerce_order_review' ); ?>
                        <div class="form-group clearfix">
                            <a href="javascript:;" class="form-wizard-previous-btn float-left" style="background-color:<?php echo get_option( 'ocmsfw_previous_button_color', '#d6225e' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><?php echo get_option( 'ocmsfw_previous_button_text', 'Previous' ); ?>
                            </a>
                            <a href="javascript:;" class="form-wizard-next-btn float-right" style="background-color:<?php echo get_option( 'ocmsfw_next_button_color', '#d6225e' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><?php echo get_option( 'ocmsfw_next_button_text', 'Next' ); ?>
                            </a>
                        </div>
                    </fieldset> 
                    <fieldset class="wizard-fieldset ocmsfw_payment">
                        <div id="order_review" class="woocommerce-checkout-review-order">
                            <?php do_action( 'OCMSFW-woocommerce_checkout_payment' ); ?>
                        </div>
                            <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
                        <div class="form-group clearfix">
                            <a href="javascript:;" class="form-wizard-previous-btn float-left" style="background-color:<?php echo get_option( 'ocmsfw_previous_button_color', '#d6225e' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><?php echo get_option( 'ocmsfw_previous_button_text', 'Previous' ); ?>
                            </a>
                        </div> 
                    </fieldset> 

                <?php }else{ ?>

                    
                    <fieldset class="wizard-fieldset show">
                        <div class="form-group login_form_custom clearfix">
                            <?php $back_to_cart = wc_get_cart_url(); ?>
                            <?php if( get_option('ocmsfw_enable_back_cart_button', 'on') == 'on' ){ ?>
                                <a href="<?php echo $back_to_cart; ?>" class="form-wizard-next-btn float-left" style="background-color:<?php echo get_option( 'ocmsfw_previous_button_color', '#d6225e' ); ?>;color:<?php echo get_option('ocmsfw_color_text_step', '#000000' ); ?>;"><?php echo get_option( 'ocmsfw_back_to_cart_button_text', 'Back to cart' ); ?></a>
                            <?php } ?>
                            <a href="#" class="form-wizard-next-btn float-right ocmsfw_disabled" style="background-color:<?php echo get_option( 'ocmsfw_next_button_color', '#d6225e' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;" disabled="disabled"><?php echo get_option( 'ocmsfw_skip_login', 'Skip Login' ); ?></a>
                        </div>
                    </fieldset>
                    <fieldset class="wizard-fieldset">
                        <?php if ( $checkout->get_checkout_fields() ) : ?>
                            <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
                            <?php do_action( 'woocommerce_checkout_billing' ); ?>
                            <?php do_action( 'woocommerce_checkout_shipping' ); ?>
                            <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
                            <?php endif; ?>
                            <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
                        <div class="form-group login_form_custom clearfix">
                            <a href="javascript:;" class="form-wizard-previous-btn float-left" style="background-color:<?php echo get_option( 'ocmsfw_previous_button_color', '#d6225e' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><?php echo get_option( 'ocmsfw_back_to_login', 'Back To Login' ); ?>  
                            </a>
                            <a href="javascript:;" class="form-wizard-next-btn float-right" style="background-color:<?php echo get_option( 'ocmsfw_next_button_color', '#d6225e' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><?php echo get_option( 'ocmsfw_next_button_text', 'Next' ); ?>
                            </a>
                        </div>
                    </fieldset>
                    <fieldset class="wizard-fieldset">

                        <h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>
                        <h3 ></h3>
                        <?php do_action( 'OCMSFW-woocommerce_order_review' ); ?>
                        <div id="order_review" class="woocommerce-checkout-review-order">
                            <?php do_action( 'OCMSFW-woocommerce_checkout_payment' ); ?>
                        </div>
                            <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
                        <div class="form-group clearfix">
                            <a href="javascript:;" class="form-wizard-previous-btn float-left" style="background-color:<?php echo get_option( 'ocmsfw_previous_button_color', '#d6225e' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><?php echo get_option( 'ocmsfw_previous_button_text', 'Previous' ); ?>
                            </a>

                           
                        </div>
                    </fieldset>

                    

                <?php } ?>

               
            <?php } else { ?>

                <?php if( get_option('ocmsfw_combine_step', 'off') == 'off' ){  ?>
                    
                    <fieldset class="wizard-fieldset ocmsfw_biliing show">
                        <?php if ( $checkout->get_checkout_fields() ) : ?>
                            <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
                            <?php do_action( 'woocommerce_checkout_billing' ); ?>
                        <div class="form-group clearfix">
                            <?php if( get_option('ocmsfw_enable_back_cart_button', 'on') == 'on' ){ ?>
                                
                            <?php $back_to_cart = wc_get_cart_url(); ?>
                            <?php  //echo $back_to_cart;?>
                            <a href="<?php echo $back_to_cart; ?>" class="form-wizard-next-btn float-left" style="background-color:<?php echo get_option( 'ocmsfw_previous_button_color', '#d6225e' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><?php echo get_option( 'ocmsfw_back_to_cart_button_text', 'Back to cart' ); ?></a>
                            <?php  } ?>
                            <a href="javascript:;" class="form-wizard-next-btn float-right" style="background-color:<?php echo get_option( 'ocmsfw_next_button_color', '#d6225e' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><?php echo get_option( 'ocmsfw_next_button_text', 'Next' ); ?></a>

                        </div>
                    </fieldset>
                    <fieldset class="wizard-fieldset ocmsfw_shipping">
                        <?php do_action( 'woocommerce_checkout_shipping' ); ?>
                        <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
                        <?php endif; ?>
                        <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
                   
                        <div class="form-group clearfix">
                            <a href="javascript:;" class="form-wizard-previous-btn float-left" style="background-color:<?php echo get_option( 'ocmsfw_previous_button_color', '#d6225e' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><?php echo get_option( 'ocmsfw_previous_button_text', 'Previous' ); ?></a>
                            <a href="javascript:;" class="form-wizard-next-btn float-right" style="background-color:<?php echo get_option( 'ocmsfw_next_button_color', '#d6225e' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><?php echo get_option( 'ocmsfw_next_button_text', 'Next' ); ?></a>
                        </div>
                    </fieldset> 
                    <fieldset class="wizard-fieldset ocmsfw_order">
                        <h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>
                        <?php do_action( 'OCMSFW-woocommerce_order_review' ); ?>
                        <div class="form-group clearfix">
                            <a href="javascript:;" class="form-wizard-previous-btn float-left" style="background-color:<?php echo get_option( 'ocmsfw_previous_button_color', '#d6225e' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><?php echo get_option( 'ocmsfw_previous_button_text', 'Previous' ); ?>
                            </a>
                            <a href="javascript:;" class="form-wizard-next-btn float-right" style="background-color:<?php echo get_option( 'ocmsfw_next_button_color', '#d6225e' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><?php echo get_option( 'ocmsfw_next_button_text', 'Next' ); ?>
                            </a>

                        </div>
                    </fieldset> 
                    <fieldset class="wizard-fieldset ocmsfw_payment">
                        <div id="order_review" class="woocommerce-checkout-review-order">
                            <?php do_action( 'OCMSFW-woocommerce_checkout_payment' ); ?>
                        </div>
                            <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
                        <div class="form-group clearfix">
                            <a href="javascript:;" class="form-wizard-previous-btn float-left" style="background-color:<?php echo get_option( 'ocmsfw_previous_button_color', '#d6225e' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><?php echo get_option( 'ocmsfw_previous_button_text', 'Previous' ); ?>
                            </a>
                        </div>
                    </fieldset> 
                
                <?php  } else { ?>

                    <fieldset class="wizard-fieldset show">
                        <?php if ( $checkout->get_checkout_fields() ) : ?>
                        <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
                        <?php do_action( 'woocommerce_checkout_billing' ); ?>
                        <?php do_action( 'woocommerce_checkout_shipping' ); ?>
                        <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
                        <?php endif; ?>
                        <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
                        <div class="form-group clearfix">
                            <?php if( get_option('ocmsfw_enable_back_cart_button', 'on') == 'on' ){ ?>
                            <?php $back_to_cart = wc_get_cart_url(); ?>
                                <a href="<?php echo $back_to_cart; ?>" class="form-wizard-next-btn float-left" style="background-color:<?php echo get_option( 'ocmsfw_previous_button_color', '#d6225e' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><?php echo get_option( 'ocmsfw_back_to_cart_button_text', 'Back to cart' ); ?></a>
                            <?php  } ?>
                            <a href="javascript:;" class="form-wizard-next-btn float-right" style="background-color:<?php echo get_option( 'ocmsfw_next_button_color', '#d6225e' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><?php echo get_option( 'ocmsfw_next_button_text', 'Next' ); ?>
                            </a>
                        </div>
                    </fieldset>
                    <fieldset class="wizard-fieldset">
                        <h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>
                        <h3 ></h3>
                        <?php do_action( 'OCMSFW-woocommerce_order_review' ); ?>
                        <div id="order_review" class="woocommerce-checkout-review-order">
                            <?php do_action( 'OCMSFW-woocommerce_checkout_payment' ); ?>
                        </div>
                            <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
                        <div class="form-group clearfix">
                            <a href="javascript:;" class="form-wizard-previous-btn float-left" style="background-color:<?php echo get_option( 'ocmsfw_previous_button_color', '#d6225e' ); ?>;color:<?php echo get_option( 'ocmsfw_color_text_step', '#000000' ); ?>;"><?php echo get_option( 'ocmsfw_previous_button_text', 'Previous' ); ?>
                            </a>
                           
                        </div>
                    </fieldset>

                <?php } ?>

            <?php  } ?>
            
    </div>           
</form>
<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>    
