jQuery(document).ready(function(){

    //slider setting options by tabbing
    jQuery('.ocmsfw-container ul.tabs li').click(function(){
        var tab_id = jQuery(this).attr('data-tab');
        jQuery('.ocmsfw-container ul.tabs li').removeClass('current');
        jQuery('.ocmsfw-container .tab-content').removeClass('current');
        jQuery(this).addClass('current');
        jQuery("#"+tab_id).addClass('current');
    })

    
});