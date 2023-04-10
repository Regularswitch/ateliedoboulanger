var eventsList;
function setEvents(events) {
    eventsList = events;
    // console.log(events);
}


var Cal = function (divId) {
    this.cpt = -1;
    this.cursoDuration = -2;
    this.currCurso = '';

    //Store div id
    this.divId = divId;

    // Days of week, starting on Sunday
    this.DaysOfWeek = [
        'dom',
        'seg',
        'ter',
        'qua',
        'qui',
        'séx',
        'sab'
    ];
    this.DaysOfWeekFull = [
        'domingo',
        'segunda',
        'terça',
        'quarta',
        'quinta',
        'séxta',
        'sábado'
    ];

    // Months, starting on January
    // this.Months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    this.Months = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];

    // Set the current month, year
    var d = new Date();

    this.currMonth = d.getMonth();
    this.currYear = d.getFullYear();
    this.currDay = d.getDate();
    // console.log(this.currDay);
};

Cal.prototype.searchCurso = function (id) {

    if ($('.firstDay, .firstLastDay').hasClass('cursoID_' + id)) {
        $('.cursoID_' + id).trigger('click');
        var scroll = $('.calendar').offset().top - 80;
        var body = $('body, html');
        setTimeout(function () {
            body.stop().animate({scrollTop: scroll}, '800', 'swing');
        }, 200);
    } else {
        this.nextMonth();
        this.searchCurso(id);
    }
};
// Goes to next month
Cal.prototype.nextMonth = function () {
    if (this.currMonth == 11) {
        this.currMonth = 0;
        this.currYear = this.currYear + 1;
    }
    else {
        this.currMonth = this.currMonth + 1;
    }
    this.showcurr();
};

// Goes to previous month
Cal.prototype.previousMonth = function () {

    var d = new Date();
    var year = d.getFullYear();
    var month = d.getMonth();

    if (this.currMonth == 0) {
        if (this.currYear - 1 >= year) {
            this.currMonth = 11;
            this.currYear = this.currYear - 1;
        }
    }
    else {
        if (this.currMonth - 1 >= month || this.currYear > year) {
            this.currMonth = this.currMonth - 1;
        }
    }

    // console.log(this.currYear, this.currMonth);
    this.checkLastMonth(this.currYear, (this.currMonth - 1));
    // this.cpt = -2;
    this.showcurr();

};

// Show current month
Cal.prototype.showcurr = function () {
    var self = this;
    // console.log(this.currYear);
    this.showMonth(this.currYear, this.currMonth);
    var d = new Date();
    var year = d.getFullYear();
    var month = d.getMonth();


    if(this.currYear == year) {
        if(this.currMonth == month) {
            $('#btnPrev').addClass('inactive');
        } else {
            $('#btnPrev').removeClass('inactive');
        }
    } else {
        $('#btnPrev').removeClass('inactive');
    }

    // if ((this.currMonth == 0 && this.currYear - 1 < year) || (this.currMonth - 1 < month && this.currYear == year)) {
    //     $('#btnPrev').addClass('inactive');
    // } else {
    //     $('#btnPrev').removeClass('inactive');
    // }
};

Cal.prototype.backToCurrMonth = function () {
    this.cpt = -1;
    var d = new Date();
    var year = d.getFullYear();
    var month = d.getMonth();
    this.currYear = year;
    this.currMonth = month;
    this.checkLastMonth(year, (month - 1));
    this.showMonth(year, month);
    $('.today').trigger('click');
    $('#btnPrev').addClass('inactive');
};

Cal.prototype.backToCurrMonthStep = function () {
    this.cpt = -1;
    var d = new Date();
    var year = d.getFullYear();
    this.currYear = year;
    this.checkLastMonth(year, (this.currMonth - 1));
    this.showMonth(year, this.currMonth);
    $('.today').trigger('click');
    $('#btnPrev').addClass('inactive');
};

Cal.prototype.attachListener = function () {
    var self = this;
    $('#btnNext').on('click', function () {
        self.nextMonth();
        self.backToCurrMonthStep();
    });
    $('#btnPrev').on('click', function () {
        self.previousMonth();
        self.backToCurrMonthStep();
    });
    $('#btnCurrMonth').on('click', function () {
        self.backToCurrMonth();
        self.backToCurrMonthStep();
    });
    $('.firstDay, .middleDay, .lastDay, .firstLastDay').on('click', function () {
        $('.normal, .today, .not-current').removeClass('active');


        var cursoNum = $(this).data("num");

        $('.curso_' + cursoNum).addClass('active');
        $('.curso__title').html(eventsList[cursoNum].title);


        if (eventsList[cursoNum].type == 'curso-carte') {
            $('.button__curso_carte').addClass('show');
            $('.button__curso_special').removeClass('show');
        } else if (eventsList[cursoNum].type == 'curso-especial' || eventsList[cursoNum].type == 'curso-nivel') {
            $('.button__curso_special').addClass('show');
            $('.button__curso_carte').removeClass('show');
            $('.button__curso_special #cadastro_link').attr('href', eventsList[cursoNum].link);
        }

        var cellIndex = $(this).index();
        var day = self.DaysOfWeekFull[cellIndex];//$('.days').find('.dayofweek_'+cellIndex).html();

        $('.calendar__day h5').html(day);

        var dayNum = $(this).data("currday");
        $('.calendar__day_number').html(dayNum);

        if (eventsList[cursoNum].status == 0) {
            $('.curso__title').addClass('inactive');
            $('.calendar__resume_inactive').addClass('show');
            $('.button_curso').addClass('inactive');
            $('.button__curso_special #cadastro_link').attr('href', 'javascript:;');
        } else {
            $('.curso__title').removeClass('inactive');
            $('.calendar__resume_inactive').removeClass('show');
            $('.button_curso').removeClass('inactive');
            $('.button__curso_carte #cadastro_link').attr('href', $('.button__curso_carte #cadastro_link').data('link'));
        }

    });
};

Cal.prototype.removeListener = function () {
    $('#btnNext, #btnPrev, #btnCurrMonth, .firstDay, .middleDay, .lastDay').off('click');
};

Cal.prototype.numberOfDayMonth = function (month, year) {
    if (month == 01 || month == 03 || month == 05 || month == 07 || month == 08 || month == 10 || month == 12) {
        return 31;
    }
    if (month == 0 || month == 06 || month == 09 || month == 11) {
        return 30;
    }
    if (month == 02 && year % 4 != 0) {
        return 28;
    }
    if (month == 02 && year % 4 == 0) {
        return 29;
    }
};

Cal.prototype.calculCursosDuration = function () {
    // console.log(eventsList);

    for (var i = 0; i < eventsList.length; i++) {
        var s1 = eventsList[i].dateStart.split('.');   //date start du cours
        var s2 = eventsList[i].dateEnd.split('.');   //date end du cours

        //on compare le mois de début et de fin
        //si le cours se déroule le meme mois
        if (s1[1] == s2[1]) {
            var duration = (parseInt(s2[0]) - parseInt(s1[0])) + 1;
            eventsList[i].duration = duration;
        }

        //si le cours est a cheval sur deux mois
        else {
            var nbrDays = this.numberOfDayMonth(parseInt(s1[1]), parseInt(s1[2]));

            var duration = ((nbrDays - parseInt(s1[0])) + 1) + parseInt(s2[0]);
            eventsList[i].duration = duration;
        }
    }
};

// Show month (year, month)
Cal.prototype.checkLastMonth = function (y, m) {
    // console.log('check last month');
    var d = new Date()
        // First day of the week in the selected month
        , firstDayOfMonth = new Date(y, m, 1).getDay()
        // Last day of the selected month
        , lastDateOfMonth = new Date(y, m + 1, 0).getDate()
        // Last day of the previous month
        , lastDayOfLastMonth = m == 0 ? new Date(y - 1, 11, 0).getDate() : new Date(y, m, 0).getDate();


    var i = 1;

    do {
        var dow = new Date(y, m, i).getDay();

        if (this.cpt == -1) {
            for (var c = 0; c < eventsList.length; c++) {
                //if start day == dayOfMonth && start month == month
                // console.log(m);
                if ((eventsList[c].dateStart.split('.'))[0] == i && (eventsList[c].dateStart.split('.'))[1] == (m + 1) && (eventsList[c].dateStart.split('.'))[2] == y) {
                    this.cpt = eventsList[c].duration;
                    this.cursoDuration = this.cpt;
                    this.currCurso = c;
                    // console.log(this.cpt);
                    // console.log(this.cursoDuration);
                    //
                    // console.log(eventsList[c]);
                }
            }
            // console.log(this.cpt);
        }
        if (this.cpt == -1) {
            this.cpt = -1;
        } else if (this.cpt == this.cursoDuration && this.cursoDuration == 1) {
            this.cpt = -1;

        } else if (this.cpt == this.cursoDuration) {
            this.cpt--;
        } else if (this.cpt < this.cursoDuration && this.cpt > 1) {

            this.cpt--;
        } else if (this.cpt == 1) {
            this.cpt = -1;
        }
        i++;
    } while (i <= lastDateOfMonth);
};


Cal.prototype.showMonth = function (y, m) {

    var d = new Date()
        // First day of the week in the selected month
        , firstDayOfMonth = new Date(y, m, 1).getDay()
        // Last day of the selected month
        , lastDateOfMonth = new Date(y, m + 1, 0).getDate()
        // Last day of the previous month
        , lastDayOfLastMonth = m == 0 ? new Date(y - 1, 11, 0).getDate() : new Date(y, m, 0).getDate();


    var year = d.getFullYear();
    var html = '<table>';

    // Write selected month and year
    html += '<div><button id="btnCurrMonth" class="text red" type="button">Ir para hoje</button></div>';
    html += '<thead><tr>';
    html += '<td colspan="1" class="red">' +
        '<button id="btnPrev" type="button">' +
        '<img class="alacarte__button" src="' + template_uri + '/assets/icons/arrow_previous.svg' + '" alt="">' +
        '</button>' +
        '</td>';
    html += '<td colspan="5" ><h4 class="red">' + this.Months[m] + ' ' + y + '</h4></td>';
    html += '<td colspan="1" class="red">' +
        '<button id="btnNext" type="button">' +
        '<img class="alacarte__button" src="' + template_uri + '/assets/icons/arrow_next.svg' + '" alt="">' +
        '</button>' +
        '</td>';
    html += '</tr></thead>';


    // Write the header of the days of the week
    html += '<tr class="days text red bold upper">';
    for (var i = 0; i < this.DaysOfWeek.length; i++) {
        html += '<td class="dayofweek_' + i + '">' + this.DaysOfWeek[i] + '</td>';
    }
    html += '</tr>';

    // Write the days
    var i = 1;
    var listOfCursos = [];



    if(this.cpt < -1) {
        this.cpt = -1;
    }

    do {
        var dow = new Date(y, m, i).getDay();




        // If Sunday, start new row
        if (dow == 0) {
            html += '<tr>';
        }
        // If not Sunday but first day of the month
        // it will write the last days from the previous month
        else if (i == 1) {



            html += '<tr>';
            var k = lastDayOfLastMonth - firstDayOfMonth + 1;

            for (var j = 0; j < firstDayOfMonth; j++) {

                if(this.cpt > -1 && this.currYear == year) {

                    var cptPrev = this.cursoDuration - this.cpt;

                    if (j < firstDayOfMonth - cptPrev) {
                        html += '<td class="not-current text">' + k + '</td>';
                    } else if (j == firstDayOfMonth - cptPrev) {
                        html += '<td class="not-current text firstDay ' + firstOfCurso + ' ' + isToday + ' ' + eventsList[this.currCurso].type + ' curso_' + this.currCurso + '" data-num="' + this.currCurso + '" data-currday="' + k + '"><span>' + k + '</span></td>';
                    } else if (j > firstDayOfMonth - cptPrev) {
                        html += '<td class="not-current text middleDay ' + firstOfCurso + ' ' + isToday + ' ' + eventsList[this.currCurso].type + ' curso_' + this.currCurso + '" data-num="' + this.currCurso + '" data-currday="' + k + '"><span>' + k + '</span></td>';
                    } else {

                        html += '<td class="not-current text">' + k + '</td>';
                    }
                } else {
                    html += '<td class="not-current text">' + k + '</td>';
                }
                k++;
            }
        }


        // Checking if we are in the current year
        // if(this.currYear == year) {

            // Write the current day in the loop
            var chk = new Date();
            var chkY = chk.getFullYear();
            var chkM = chk.getMonth();
            if (chkY == this.currYear && chkM == this.currMonth && i == this.currDay) {
                var isToday = "today bold";
            } else {
                var isToday = 'normal ';
            }
            var firstOfCurso = '';

            if (this.cpt == -1) {
                for (var c = 0; c < eventsList.length; c++) {
                    //if start day == dayOfMonth && start month == month

                    if ((eventsList[c].dateStart.split('.'))[0] == i && (eventsList[c].dateStart.split('.'))[1] == (m + 1) && (eventsList[c].dateStart.split('.'))[2] == (y)) {
                        this.cpt = eventsList[c].duration;
                        this.cursoDuration = this.cpt;
                        this.currCurso = c;
                        // console.log(eventsList[c]);
                        // console.log(this.cpt, this.cursoDuration);
                        if (listOfCursos.indexOf(eventsList[c].curso) < 0 && eventsList[c].status == 1) {
                            // console.log('new curso in cal', eventsList[c].status);
                            listOfCursos.push(eventsList[c].curso);
                            firstOfCurso = 'cursoID_' + eventsList[c].curso;
                        }
                    }
                }
            }


            if (this.cpt == -1) {
                html += '<td class="text ' + isToday + '">' + (i < 10 ? '0' + i : i) + '</td>';
            } else if (this.cpt == this.cursoDuration && this.cursoDuration == 1) {
                html += '<td class="text firstLastDay ' + firstOfCurso + ' ' + isToday + ' ' + eventsList[this.currCurso].type + ' curso_' + this.currCurso + '" data-num="' + this.currCurso + '" data-currday="' + (i < 10 ? '0' + i : i) + '"><span>' + (i < 10 ? '0' + i : i) + '</span></td>';
                this.cpt = -1;
            } else if (this.cpt == this.cursoDuration) {
                // console.log('first day');
                html += '<td class="text firstDay ' + firstOfCurso + ' ' + isToday + ' ' + eventsList[this.currCurso].type + ' curso_' + this.currCurso + '" data-num="' + this.currCurso + '" data-currday="' + (i < 10 ? '0' + i : i) + '"><span>' + (i < 10 ? '0' + i : i) + '</span></td>';
                this.cpt--;
            } else if (this.cpt < this.cursoDuration && this.cpt > 1) {
                html += '<td class="text middleDay ' + isToday + ' ' + eventsList[this.currCurso].type + ' curso_' + this.currCurso + '" data-num="' + this.currCurso + '" data-currday="' + (i < 10 ? '0' + i : i) + '"><span>' + (i < 10 ? '0' + i : i) + '</span></td>';
                this.cpt--;
            } else if (this.cpt == 1) {
                html += '<td class="text lastDay ' + isToday + ' ' + eventsList[this.currCurso].type + ' curso_' + this.currCurso + '" data-num="' + this.currCurso + '" data-currday="' + (i < 10 ? '0' + i : i) + '"><span>' + (i < 10 ? '0' + i : i) + '</span></td>';
                this.cpt = -1;
            } else {
                html += '<td class="text ' + isToday + '">' + (i < 10 ? '0' + i : i) + '</td>';
            }
        // }
        // else {
        //     html += '<td class="text ' + isToday + '">' + (i < 10 ? '0' + i : i) + '</td>';
        // }

        // If Saturday, closes the row
        if (dow == 6) {
            html += '</tr>';
        }

        // If not Saturday, but last day of the selected month
        // it will write the next few days from the next month
        else if (i == lastDateOfMonth) {
            var k = 1;
            var cptNextmonth = this.cpt;
            for (dow; dow < 6; dow++) {

                if(cptNextmonth < this.cursoDuration && cptNextmonth > 1) {
                    html += '<td class="not-current text middleDay ' + isToday + ' ' + eventsList[this.currCurso].type + ' curso_' + this.currCurso + '" data-num="' + this.currCurso + '" data-currday="' + (k < 10 ? '0' + k : k) + '"><span>' + (k < 10 ? '0' + k : k) + '</span></td>';
                    cptNextmonth--;
                } else if (cptNextmonth == 1) {
                    html += '<td class="not-current text lastDay ' + isToday + ' ' + eventsList[this.currCurso].type + ' curso_' + this.currCurso + '" data-num="' + this.currCurso + '" data-currday="' + (k < 10 ? '0' + k : k) + '"><span>' + (k < 10 ? '0' + k : k) + '</span></td>';
                    cptNextmonth--;
                } else {
                    html += '<td class="not-current text">' + (k < 10 ? '0' + k : k) + '</td>';
                }
                k++;
            }
        }

        i++;
    } while (i <= lastDateOfMonth);

    // console.log(listOfCursos);
    // Closes table
    html += '</table>';

    //Remove Listener
    this.removeListener();

    // Write HTML to the div
    // console.log(html);
    document.getElementById(this.divId).innerHTML = html;

    this.attachListener();
};

// On Load of the window
var c;
window.onload = function () {

    // Start calendar
    if ($('.wrapper').hasClass('cursos')) {
        c = new Cal("divCal");
        c.calculCursosDuration();
        c.showcurr();
        c.backToCurrMonth();
    }

};