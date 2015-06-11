/*global $, jQuery, alert*/
jQuery(function ($) {
    "use strict";

    function mouseOver() { $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown(); }

    function mouseOut() { $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp(); }

    $(window).resize(function () {
        //$('body').prepend('<div>'+$(window).width()+'</div>');
        //Set padding-top to allow for various navbar heights
        if (parseInt($(window).width(), 10) < 768) {
            $('body').removeAttr("style");
            //remove auto dropdown from main navbar
            $('.navbar #main-navbar .dropdown').off('mouseenter mouseleave', mouseOver, mouseOut);
        } else {
            var x = "padding-top: " + (parseInt($('#main-navbar').height(), 10) + 10) + "px !important";
            $('body').attr("style", x);

            //Set navbar drop down on hover
            $('.navbar #main-navbar .dropdown').hover(mouseOver, mouseOut);
        }
    });

    $(window).load(function () {
        //Set padding-top to allow for various navbar heights
        if (parseInt($(window).width(), 10) < 768) {
            $('body').removeAttr("style");
            //remove auto dropdown from main navbar
            $('.navbar #main-navbar .dropdown').off('mouseentermouseleave', mouseOver, mouseOut);

        } else {
            var x = "padding-top: " + (parseInt($('#main-navbar').height(), 10) + 10) + "px !important";
            $('body').attr("style", x);

            //Set navbar drop down on hover
            $('.navbar #main-navbar .dropdown').hover(mouseOver, mouseOut);
        }
    });



});