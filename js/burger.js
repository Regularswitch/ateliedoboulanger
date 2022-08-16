//-------------------------//
//------ SCRIPT NAME ------//
//--- Created by RSW --//
//-------------------------//
jQuery('document').ready(function ($) {

    var pageYOffset;

    $('.menu__burger').on('click', function () {
        $('.menu__burger .burger').toggleClass('opened');

        if ($('.menu__burger .burger').hasClass('opened')) {

            pageYOffset = window.pageYOffset;

            $('.menu__mobile').addClass('opened');
            $('body').addClass('noscroll');
            $('body').css({
                'position': 'fixed',
                'top': -pageYOffset + 'px',
                'overflow-y': 'hidden'
            });
        } else {
            $('.menu__mobile').removeClass('opened');
            $('body').removeClass('noscroll');
            $('body').css({
                'position': 'static', 'overflow-y': 'scroll'
            });
        }
    });


    $('.menu__mobile').on('click', function (e) {
        if(!$(e.target).is('.menu__mobile_wrapper') && !$(e.target).is($('.menu__mobile_wrapper').find('*'))) {
            $('.menu__mobile').removeClass('opened');
            $('.burger').removeClass('opened');
            $('body').removeClass('noscroll');
            $('body').css({
                'position': 'static', 'overflow-y': 'scroll'
            });

        }
    });


});