//-------------------------//
//------ SCRIPT NAME ------//
//--- Created by RSW ------//
//-------------------------//

var cursosData;
function getCursosInfos(infos) {
    cursosData = infos;
    // console.log(cursosData);
}

//console.log (getCursosInfos);

jQuery('document').ready(function ($) {

    var url = window.location.href;
    // console.log(url);
    var anchorName = document.location.hash.substring(1);

    if (anchorName.length > 0) {
        var scroll = $('.' + anchorName).offset().top - 80;
        var body = $('body, html');
        setTimeout(function () {
            body.stop().animate({scrollTop: scroll}, '800', 'swing');
        }, 200);
    }

    //----------------//
    //--- Variables --//
    //----------------//
    var wrapper = $('.wrapper');
    var menuLine;
    var ongletItems;
    var onglet;
    var ongletItemsActive;
    var mouseInMenu;

    var tabItems;
    var tab;
    var tabActive;

    // Highlights
    var highlightsAction = $('.highlights__item_action');//.not( ".esgotado")
    var highlitsCloseAction = $('.rollover__infos_close');
    var offsetHighlightPopup;

    var triggerChangePanel__cursos = $('.alacarte__button');
    var slideItemClass__cursos = [
        '.title_container',
        '.cursos__alacarte_button',
        '.picto1__blue',
        '.picto2__blue',
        '.picto4__blue',
        '.picto6__blue',
        '.picto15__blue',
        '.pictoMobile1',
        '.pictoMobile2'
    ];


    //----------------//
    //--- Functions --//
    //----------------//

    var changePanel = function (secondPanel, tabClass) {
        for (var i = 0; i < tabClass.length; i++) {
            $(tabClass[i]).addClass('animate');
        }
        secondPanel.css('display', 'block');
        setTimeout(function () {
            secondPanel.addClass('animate');
        }, 500);
    };

    var setMenuLinePosition = function (item) {
        //console.log('setLine');
        menuLine.css({
            'top': $(item).position().top + $(item).height() - menuLine.height(),
            'left': $(item).position().left,
            'width': $(item).width()
        });
        menuLine.css('opacity', 1);
    };

    var mouseEnterMenuItem = function (item) {
        if (!item.hasClass('socialSVG')) {
            mouseInMenu = true;
            setMenuLinePosition(item);

        }
    };

    var mouseLeaveMenuItem = function (item) {
        mouseInMenu = false;
        if (wrapper.hasClass('home')) {
            setTimeout(function () {
                if (!mouseInMenu) {
                    menuLine.css('opacity', 0);
                }
            }, 200);
        } else {
            if (!item.hasClass('active')) {
                setTimeout(function () {
                    if (!mouseInMenu) {
                        setMenuLinePosition('.cursos__header_onglets h4.active');
                    }
                }, 500);
            }
        }
    };

    var changeTab = function (item) {
        // console.log('changeTab');
        var tabSelect = item.data('tab');
        if (tabSelect != tabActive) {
            ////// ONGLETS //////
            setMenuLinePosition($(onglet + tabSelect));

            $(onglet + tabActive).removeClass('active');
            $(onglet + tabSelect).addClass('active');

            ////// TABS //////
            $(tab + tabSelect).addClass('active');

            // Reset the previous active tab coming state
            $(tab + tabActive + ' .tab__left').removeClass('coming');
            $(tab + tabActive + ' .tab__left img').removeClass('coming');
            $(tab + tabActive + ' .tab__right').removeClass('coming');
            // Add the previous active tab leaving state
            $(tab + tabActive + ' .tab__right').addClass('leaving');
            $(tab + tabActive + ' .tab__left').addClass('leaving');
            $(tab + tabActive + ' .tab__left img').addClass('leaving');

            // console.log('timeout', $(tab + tabActive));
            setTimeout(function () {
                // console.log('timeout', $(tab + tabActive));
                // Reset the previous active tab leaving state
                $(tab + tabActive).removeClass('shown');
                $(tab + tabActive).removeClass('active');

                $(tab + tabActive + ' .tab__right').removeClass('leaving');
                $(tab + tabActive + ' .tab__left').removeClass('leaving');
                $(tab + tabActive + ' .tab__left img').removeClass('leaving');
                $(tab + tabActive + ' .tab__left img').addClass('away');

                // Bring the new tab
                $(tab + tabSelect).addClass('shown');
                // Add the new active tab coming state (will be removed at the tab change
                $(tab + tabSelect + ' .tab__left').addClass('coming');
                $(tab + tabSelect + ' .tab__right').addClass('coming');
                $(tab + tabSelect + ' .tab__left img').addClass('coming');
                setTimeout(function () {
                    $(tab + tabSelect + ' .tab__left img').removeClass('away');
                }, 1000);
                tabActive = tabSelect;
                ongletItemsActive = $('.onglet.active');
            }, 900);
        }
    };


    function closeBox(box) {
        var boxPagination = $('.cursos__specials_pagination');

        box.css('height', 0);
        box.removeClass('opened');

        resetContentBox();
        boxPagination.removeClass('show');

        setTimeout(function () {
            box.insertAfter('.cursos__specials_content');
            boxPagination.removeClass('display');
        }, 300);
    }

    function openBox(elem, box, insertAfter) {
        var boxContent = $('.cursos__specials_boxcontent');
        var boxPagination = $('.cursos__specials_pagination');

        boxPagination.addClass('display');
        updateContentBox(elem, '.cursos__specials_boxcontent');
        setTimeout(function () {

            box.insertAfter(insertAfter);

            box.css('height', boxContent.height() + 80);
            box.addClass('opened');

            boxPagination.addClass('show');

        }, 50);

    }

    function updateContentBox(elem, container) {
        var elemKey = elem.data('key') - 1;
        var cursoInfos = cursosData[elemKey];
        // console.log(container);

        var boxContentChefImg = $(container + ' .box__left_img img');
        var boxContentChefTitle = $(container + ' .box__left_title');
        var boxContentChefSubtitle = $(container + ' .box__left_subtitle');

        boxContentChefImg.attr('src', cursoInfos.chef.img);
        boxContentChefTitle.html(cursoInfos.chef.title);
        boxContentChefSubtitle.html(cursoInfos.chef.subtitle);

        var boxContentTitle = $(container + ' .box__title');
        // var boxContentSubTitle = $(container + ' .box__title_sub .sub_nivel');
        // var boxContentDates = $(container + ' .box__date_days');
        var boxContentTime = $(container + ' .box__date_time');
        var boxContentIntro = $(container + ' .box__right_intro');
        var boxContentText = $(container + ' .box__right_content');
        var boxContentPrice = $(container + ' .box__bottom_price .price');
        var boxContentLink = $(container + ' .box__right_link');
        var boxContentIpad = $(container + ' .agendar__link_ipad');

        // console.log(cursoInfos);

        boxContentTitle.html(cursoInfos.title);
        // boxContentSubTitle.html(cursoInfos.subtitle);
        // boxContentDates.html(cursoInfos.dateStart);
        boxContentIntro.html(cursoInfos.intro);
        boxContentTime.html(cursoInfos.time);
        boxContentText.html(cursoInfos.content);
        boxContentPrice.html(cursoInfos.price);
        // boxContentLink.attr('href', cursoInfos.link);

        if (cursoInfos.status) {
            boxContentLink.attr('href', 'javascript:;');
            boxContentLink.data("id", cursoInfos.id);
            boxContentIpad.attr('href', 'javascript:;');
            boxContentIpad.data("id", cursoInfos.id);

            boxContentLink.removeClass('inactive');
            boxContentIpad.removeClass('inactive');

            $(container + ' .agendar__link_box').on('click', function () {
                c.searchCurso($(this).data('id'));
            });
            $(container + ' .agendar__link_ipad').on('click', function () {
                var idToGo = $(this).data('id');

                if ($(window).width() <= 1024) {
                    closeHighlight($(this));
                    setTimeout(function () {
                        c.searchCurso(idToGo);
                    }, 1500);
                }
                else {
                    c.searchCurso(idToGo);
                }


            });
        } else {
            boxContentLink.addClass('inactive');
            boxContentIpad.addClass('inactive');

            boxContentLink.attr('href', 'javascript:;');
            boxContentIpad.attr('href', 'javascript:;');
            $(container + ' .agendar__link_box').off('click');
            $(container + ' .agendar__link_ipad').off('click');
        }

        var boxGallery = $('.cursos__specials_gallery');
        var boxPagination = $('.cursos__specials_pagination');
        if (cursoInfos.gallery[0]) {
            boxPagination.append('<div class="pagination firstPagination active"><span></span></div>');
            $.each(cursoInfos.gallery, function (index, value) {
                // console.log(index, value);
                boxGallery.append('<div class="gallery__img"><img src="' + value + '" class="img_' + index + '"></divc>');

                boxPagination.append('<div class="pagination" data-id="' + index + '"><span></span></div>');

            });
            var paginations = $('.pagination');
            var cursosGallery = $('.cursos__specials_gallery');
            var cursosGalleryImages = $('.cursos__specials_gallery img');
            var paginationAction = $('.cursos__specials_pagination .pagination');

            paginationAction.on('click', function () {
                // console.log('pagination');
                var elem = $(this);
                if (!elem.hasClass('active')) {

                    paginations.removeClass('active');
                    elem.addClass('active');

                    if (elem.hasClass('firstPagination') && cursosGallery.hasClass('show')) {
                        // Go to first page : description
                        cursosGallery.removeClass('show');
                        setTimeout(function () {
                            cursosGalleryImages.removeClass('show infront');
                        }, 300);
                    } else {
                        var imgID = elem.data('id');
                        // console.log(imgID);
                        cursosGalleryImages.removeClass('infront');
                        $('.cursos__specials_gallery .img_' + imgID).addClass('show infront');
                        setTimeout(function () {
                            $('.cursos__specials_gallery img:not(.img_' + imgID + ')').removeClass('show');
                        }, 300);
                        if (!cursosGallery.hasClass('show')) {
                            cursosGallery.addClass('show');
                        }
                    }
                }
            });
        }


    }

    function resetContentBox() {
        var boxContentTitle = $('.cursos__specials_boxcontent .box__title');
        var boxContentSubTitle = $('.cursos__specials_boxcontent .box__title_sub .sub_nivel');

        var boxGallery = $('.cursos__specials_gallery, .gallery__mobile');
        var boxPagination = $('.cursos__specials_pagination');
        boxGallery.empty();
        boxPagination.empty();

        boxContentTitle.html('');
        boxContentSubTitle.html('');
        setTimeout(function () {
            $('.pagination.firstPagination').trigger('click');
        }, 300);
        $('.agendar__link_box').off('click');
        $('.agendar__link_ipad').off('click');

    }

    function closeHighlight(elem) {
        var p = elem.closest('.cursos__specials_content--rollover');

        var rolloverDesc = p.find('.rollover__intro');
        var rolloverInfos = p.find('.rollover__infos');

        // console.log(offsetHighlightPopup);

        rolloverInfos.removeClass('show');
        p.css({'height': offsetHighlightPopup.height + 'px', 'top': offsetHighlightPopup.offsetTop + 'px'});
        closePopup(offsetHighlightPopup.offsetPopup);

        setTimeout(function () {
            p.css({'width': offsetHighlightPopup.width + 'px', 'left': offsetHighlightPopup.offsetLeft + 'px'});
            p.removeClass('opened__mobile');

            setTimeout(function () {
                rolloverDesc.removeClass('hide');
                p.removeClass('prepareTransitions');
                p.css({'position': 'absolute', 'top': 'initial', 'left': offsetHighlightPopup.leftCss});
                setTimeout(function () {
                    p[0].removeAttribute('style');
                    $('.gallery__mobile').empty();
                    //
                    //     console.log(offsetHighlightPopup.leftCss);
                    //     p[0].style.removeProperty('left');
                }, 100);
            }, 700);
        }, 700);

    }

    //----------------//
    //--- Listeners --//
    //----------------//

    triggerChangePanel__cursos.on('click', function () {
        changePanel($('.content__container'), slideItemClass__cursos);
    });

    highlightsAction.on('click', function () {
        var windowWdith = $(window).width();
        var elem = $(this);
        var elemKey = elem.data('key');
        var insertAfter;
        var p = elem.find('.cursos__specials_content--rollover');
        // console.log(elem);
        if (!p.hasClass('opened__mobile')) {

            // console.log('click');

            if (windowWdith > 1024) {
                // console.log('highlights action desktop');
                insertAfter = elemKey % 3 == 0 ? elem : elemKey % 3 == 1 ? $('.highlights__item_' + parseInt(elemKey + 2)) : $('.highlights__item_' + parseInt(elemKey + 1));
            }
            // else if(windowWdith <= 1024 && windowWdith >= 768) {
            //     console.log('highlights action ipad');
            //     insertAfter = elemKey % 2 == 0 ? elem :  $('.highlights__item_' + parseInt(elemKey + 1));
            // }
            else if (windowWdith <= 1024) {

                var rolloverDesc = p.find('.rollover__intro');
                var rolloverInfos = p.find('.rollover__infos');


                var offset = p.offset();
                var width = p.width() + 40; // 40 for padding
                var height = p.height() + 40;
                var left = p.css('left');
                p.css('width', width);

                // console.log($(window).scrollTop());
                // // p.html( "left: " + offset.left + ", top: " + offset.top );
                // var el = elem.find('.cursos__specials_content--rollover').getBoundingClientRect();
                // console.log(offset.top);
                //
                var oldOffsetTop = offset.top - $(window).scrollTop();
                var oldOffsetLeft = offset.left;

                // console.log('fixed position', oldOffsetTop);


                p.css({'position': 'fixed', 'top': oldOffsetTop + 'px', 'left': offset.left});
                rolloverDesc.addClass('hide');

                setTimeout(function () {
                    p.addClass('prepareTransitions');

                    setTimeout(function () {
                        p.addClass('opened__mobile');
                        p.css({'left': 0, 'width': '100vw'});
                        setTimeout(function () {
                            p.css({'top': '0px', 'height': '100vh'});
                            setTimeout(function () {
                                offsetHighlightPopup = {
                                    'offsetPopup': openPopup(),
                                    'offsetTop': oldOffsetTop,
                                    'offsetLeft': oldOffsetLeft,
                                    'leftCss': left,
                                    'width': width,
                                    'height': height
                                };
                                rolloverInfos.addClass('show');
                                updateContentBox(elem, '.highlights__item_' + elemKey + ' .rollover__infos');
                            }, 300);
                        }, 700);
                    }, 50);

                }, 50);

            }

            if (windowWdith > 1024) {

                var box = $('.cursos__specials_box');

                if (elem.hasClass('opened')) {
                    // console.log('already opened');
                    elem.removeClass('opened');
                    closeBox(box);
                } else {

                    highlightsAction.removeClass('opened');
                    elem.addClass('opened');
                    if (box.hasClass('opened')) {
                        closeBox(box);
                        setTimeout(function () {
                            openBox(elem, box, insertAfter);
                        }, 500);
                    } else {
                        // updateContentBox(elem);
                        openBox(elem, box, insertAfter);
                    }
                }
            }
        }
    });
    highlitsCloseAction.on('click', function () {
        closeHighlight($(this));
    });


    $(window).on('resize', function () {
        if ($('.wrapper').hasClass('cursos')) {
            var windowWidth = $(window).width();
            var highlights = $('.highlights');

            // console.log('resize');
            ongletItemsActive.trigger('mouseenter');

            if (windowWidth >= 1024) {
                if (!highlights.hasClass('desktop')) {
                    highlights.addClass('desktop');
                }
                if (highlights.hasClass('ipad') || highlights.hasClass('iphone')) {
                    $.each($('.cursos__specials_content--rollover'), function (index, value) {
                        // console.log(value);
                        value.removeAttribute('style');
                    });
                    highlightsAction.removeClass('opened');
                    highlights.removeClass('ipad');
                    highlights.removeClass('iphone');
                    closeBox($('.cursos__specials_box'));

                    var popupToClose = $('.cursos__specials_content--rollover.opened__mobile');
                    popupToClose.addClass('hidden');
                    $('.rollover__infos.show .rollover__infos_close').trigger('click');
                    setTimeout(function () {
                        popupToClose.removeClass('hidden');
                    }, 1700);
                }
                $('.onglet_1').html($('.onglet_1').data('desktop'));
            }
            else if (windowWidth < 1024 && windowWidth >= 768) {
                if (!highlights.hasClass('ipad')) {
                    highlights.addClass('ipad');
                }
                if (highlights.hasClass('desktop') || highlights.hasClass('iphone')) {
                    highlightsAction.removeClass('opened');
                    highlights.removeClass('desktop');
                    highlights.removeClass('iphone');
                    closeBox($('.cursos__specials_box'));
                }
                $('.onglet_1').html($('.onglet_1').data('desktop'));
            }
            else if (windowWidth < 768) {
                if (!highlights.hasClass('iphone')) {
                    highlights.addClass('iphone');
                }
                if (highlights.hasClass('ipad') || highlights.hasClass('desktop')) {
                    highlightsAction.removeClass('opened');
                    highlights.removeClass('ipad');
                    highlights.removeClass('desktop');
                    closeBox($('.cursos__specials_box'));
                }

                $('.onglet_1').html($('.onglet_1').data('mobile'));
            }
        }
    });

    //---------------------//
    //--- Initialization --//
    //---------------------//
    var init = function () {
        wrapper = $('.wrapper');
        menuLine = $('.lineIndicator');
        ongletItems = $('.onglet');
        ongletItemsActive = $('.onglet.active');
        onglet = '.onglet_';
        mouseInMenu = false;
        if ($(window).width() > 1024) {
            $('.onglet_1').html($('.onglet_1').data('desktop'));
        } else {
            $('.onglet_1').html($('.onglet_1').data('mobile'));
        }

        highlightsAction = $('.highlights__item_action');

        tabItems = $('.tab');
        tab = '.tab_';
        tabActive = 1;
        ongletItems.on('mouseenter', function () {
            mouseEnterMenuItem($(this));
        });
        ongletItems.on('mouseleave', function () {
            mouseLeaveMenuItem($(this));
        });
        ongletItems.on('click', function () {
            changeTab($(this));
        });


        setMenuLinePosition($('.onglet.active'));


        $('.tabs__link').not('.inactive').on('click', function () {
            // console.log('looking for id: ' + $(this).data('id'));
            c.searchCurso($(this).data('id'));
        });


    };

    if (wrapper.hasClass('cursos')) {
        init();

    }


});