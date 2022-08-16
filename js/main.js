//-------------------------//
//------ SCRIPT NAME ------//
//---- Created by RSW -----//
//-------------------------//

//----------------//
//--- Variables --//
//----------------//
//----------------//
//--- Functions --//
//----------------//

//----------------//
//--- Listeners --//
//----------------//


jQuery('document').ready(function ($) {

    //----------------//
    //--- Variables --//
    //----------------//
    var sabiaContent;
    var sabiaNbr;
    var randomNbr;
    var refreshButton = $('.refreshButton');
    var wrapper = $('.wrapper');


    //----------------//
    //--- Functions --//
    //----------------//

    var showSabia = function (toShow, toHide) {
        toHide.removeClass('show');
        toShow.fadeIn(300);
        toShow.addClass('show');
        return true;
    };
    var refreshAction = function () {
        var newRand;
        var isShowing = false;
        var sabiaShowing = $('.sabia_content.show');

        do {
            newRand = parseInt(Math.random() * sabiaNbr);
        } while (newRand == randomNbr);

        randomNbr = newRand;

        if (sabiaShowing.length > 0) {
            sabiaShowing.fadeOut(200, function () {
                if (!isShowing) isShowing = showSabia($('.sabia-' + randomNbr), sabiaShowing);
            });
        } else {
            if (!isShowing) isShowing = showSabia($('.sabia-' + randomNbr), sabiaShowing);
        }


    };

    var initialise = function () {
        refreshButton = $('.refreshButton');
        sabiaContent = $('.sabia_content');
        sabiaNbr = sabiaContent.length;
        refreshAction();
    };
    //---------------------//
    //--- Initialization --//
    //---------------------//


    //----------------//
    //--- Listeners --//
    //----------------//
    refreshButton.on('click', function () {
        console.log('refresh button');
        refreshAction();
    });

    var initializeContatoPage = function () {
        skrollr.init({
            forceHeight: false,
            mobileCheck: function () {
                //hack - forces mobile version to be off
                return false;
            }
        });
    };


    initialise();
    initializeContatoPage();
});

