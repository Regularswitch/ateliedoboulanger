//-------------------------//
//------ SCRIPT NAME ------//
//--- Created by RSW ------//
//-------------------------//

jQuery('document').ready(function ($) {

    var wrapper = $('.wrapper');

    var isEmpty = function (e) {
        var input = $(event.target);
        if (event.target.value != "") {
            input.css('border', '1px solid rgba(14,69,222,1)');
        } else {
            input.css('border', '1px solid rgba(14,69,222, 0.5)');
        }
    }

    if (wrapper.hasClass('contato')) {
        $('.champ').on('change', function () {
            isEmpty();
        });

    }
});