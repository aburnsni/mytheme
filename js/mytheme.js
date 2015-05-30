jQuery(window).resize(function () { 
    jQuery('body').css('padding-top', parseInt(jQuery('#main-navbar').css("height"))+10);
});

jQuery(window).load(function () { 
    jQuery('body').css('padding-top', parseInt(jQuery('#main-navbar').css("height"))+10);        
});
