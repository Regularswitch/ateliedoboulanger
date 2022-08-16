var openPopup = function () {
    console.log('opened');
    var pageYOffset = window.pageYOffset;

    $('body').css({
        'position': 'fixed',
        'top': -pageYOffset + 'px'
    });

    return pageYOffset;
};


var closePopup = function (offsetY) {
    var wrapper = $('.wrapper');

    if(wrapper.css('position') == 'fixed') {
        wrapper.css({'position': 'static','overflow-y': 'scroll'});
        wrapper.scrollTop(offsetY);
    }
    $('body').css({'position': 'static'});
    $(window).scrollTop(offsetY);
};
jQuery('document').ready(function ($) {


    var currentOffset = 0;



    $('.openPopup').on('click', function () {
        var popupTrabalhar = $('.popup__trabalhar');

        if(!popupTrabalhar.hasClass('opened')) {
            currentOffset = openPopup($(this));
            popupTrabalhar.addClass('opened');
        }
    });
    $('.popup').on('click', function (e) {
        if(!$(e.target).is('.popupwrapper') && !$(e.target).is($('.popupwrapper').find('*'))  || $(e.target).is('.popup_close') || $(e.target).is('.popup_close svg')) {
            closePopup(currentOffset);
            $('.popup__trabalhar').removeClass('opened');
        }
    });
});