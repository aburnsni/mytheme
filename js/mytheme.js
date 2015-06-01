jQuery(window).resize(function () {
//jQuery('body').prepend('<div>'+jQuery(window).width()+'</div>');
  if (parseInt(jQuery(window).width()) < 768) {
    jQuery('body').removeAttr("style");
  } else {
    var x = "padding-top: " + (parseInt(jQuery('#main-navbar').height()) + 10) + "px !important";
    jQuery('body').attr("style", x);
  }
});

jQuery(window).load(function () {
  if (parseInt(jQuery(window).width()) < 768) {
    jQuery('body').removeAttr("style");
  } else {
    var x = "padding-top: " + (parseInt(jQuery('#main-navbar').height()) + 10) + "px !important";
    jQuery('body').attr("style", x);
  }
});

