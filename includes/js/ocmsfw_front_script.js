jQuery(document).ready(function() {

	var oc_class_select = OCMSFWdata.ocmsfw_color_arrow_step_multistep;
	if(oc_class_select == "arrow_wizard"){
		jQuery("head").append("<style>.form-wizard2 .form-wizard-steps.wizard_theme_ul_arrow  li::after{border-left: 40px solid "+OCMSFWdata.ocmsfw_color_default_theame_multistep+";} @media screen and (max-width: 767px){.form-wizard2 .form-wizard-steps.wizard_theme_ul_arrow  li::after{border-left: 25px solid "+OCMSFWdata.ocmsfw_color_default_theame_multistep+";}}</style>");
		jQuery("head").append("<style>.form-wizard2 .form-wizard-steps li.active::after, .form-wizard2 .form-wizard-steps li.activated::after{background-color:inherit; border-left: 40px solid "+OCMSFWdata.ocmsfw_color_theame_multistep+";} @media screen and (max-width: 767px){.form-wizard2 .form-wizard-steps li.active::after, .form-wizard2 .form-wizard-steps li.activated::after{background-color:inherit; border-left: 25px solid "+OCMSFWdata.ocmsfw_color_theame_multistep+";}}</style>");
	}else{
		jQuery("head").append("<style>.form-wizard2 .form-wizard-steps li.active::after, .form-wizard2 .form-wizard-steps li.activated::after{background-color:"+OCMSFWdata.ocmsfw_color_pipe_theame_multistep+";left: 50%;  border-color:"+OCMSFWdata.ocmsfw_color_pipe_theame_multistep+";}</style>");
	
	}

	//login form block if user are not login
	if(OCMSFWdata.ocmsfw_enable_multistep == "on"){
		jQuery(".woocommerce-form-login").css("display","block");
	}

	// click on next button
	jQuery('.form-wizard-next-btn').click(function() {
		var parentFieldset = jQuery(this).parents('.wizard-fieldset');
		var currentActiveStep = jQuery('.form-wizard2').find('.form-wizard-steps .active');
		var next = jQuery(this);
 		nextWizardStep = true;
		jQuery("html, body").animate({  scrollTop: jQuery(".form-wizard2").offset().top},1000);
		if(OCMSFWdata.ocmsfw_enable_validation_multistep == "on"){
			$isvalid= false;
			parentFieldset.find('.validate-required').each(function(){
				var thisValue = jQuery(this).find("input").val();
				if( thisValue == "" || thisValue == "undefined" ) {
				     jQuery(this).find("input").css("border","1px solid red").slideDown();
				     	nextWizardStep = false;
				}else {
					jQuery(this).find("input").css("border","1px solid inherit").slideDown();
				}
			});
			if(jQuery(this).closest('.wizard-fieldset').hasClass("ocmsfw_shipping")){
				if(jQuery('#ship-to-different-address-checkbox').prop('checked')==false){
					nextWizardStep = true;
				}
			}
		}
		if( nextWizardStep) {			
			next.parents('.wizard-fieldset').removeClass("show","400");
			currentActiveStep.removeClass('active').addClass('activated').next().addClass('active',"400");
			next.parents('.wizard-fieldset').next('.wizard-fieldset').addClass("show","400");
			jQuery("li.active span").css("background-color", OCMSFWdata.ocmsfw_color_theame_multistep);			
		}
		return false;
	});
	//click on previous button

	jQuery('.form-wizard-previous-btn').click(function() {
			//alert("eheloo");
		var counter = parseInt(jQuery(".wizard-counter").text());
		var prev =jQuery(this);
			//console.log(".form-wizard-previous-btn.float-left");
		jQuery("html, body").animate({  scrollTop: jQuery(".form-wizard2").offset().top}, 1000);
		var currentActiveStep = jQuery('.form-wizard2').find('.form-wizard-steps .active');
		jQuery("li.active span").css("background-color", OCMSFWdata.ocmsfw_color_default_theame_multistep);
		prev.parents('.wizard-fieldset').removeClass("show","400");
		prev.parents('.wizard-fieldset').prev('.wizard-fieldset').addClass("show","400");
		currentActiveStep.removeClass('active').prev().removeClass('activated').addClass('active',"400");
		return false;
	});

	jQuery('.login_form_custom .form-wizard-previous-btn').click(function() {
		jQuery('.oc_login_form_checkout').css('display','block');
		return false;
	});
	jQuery('.login_form_custom .form-wizard-next-btn').click(function() {
		jQuery('.oc_login_form_checkout').css('display','none');
		return false;
	});
	

	// focus on input field check empty or not
	if(OCMSFWdata.ocmsfw_enable_validation_multistep == "on"){
		jQuery(".validate-required  .woocommerce-input-wrapper input").on('focus', function(){
			var tmpThis = jQuery(this).val();
			//alert(tmpThis);
			if(tmpThis == '' ) {
				jQuery(this).parent().addClass("focus-input");
			}else if(tmpThis !='' ){
				jQuery(this).parent().addClass("focus-input");
			}
		
		}).on('blur', function(){
			var tmpThis = jQuery(this).val();
			if(tmpThis == '' ) {
				jQuery(this).parent().find("input").css("border","1px solid red");
				jQuery(this).parent().removeClass("focus-input");
			}else if(tmpThis !='' ){
				jQuery(this).parent().find("input").css("border","1px solid inherit");
				jQuery(this).parent().addClass("focus-input");				
			}		
		});
	}
});