//-------------------------//
//------ SCRIPT NAME ------//
//--- Created by RSW --//
//-------------------------//

jQuery('document').ready(function ($) {

	var wrapper = $('.wrapper');

	var whoIsCheck = function () {
		var pesFisica = $('.pessoas_fisica')[0];
		var pesjuridica = $('.pessoas_juridica')[0];

		console.log($('.pessoas_fisica')[0].checked);

		if (pesFisica.checked) {
			$('.fisica').css('display', 'block');
			$('.fisica').css('opacity', 1);
			$('.fisica').prop('required',true);

			$('.juridica').css('display', 'none');
			$('.juridica').css('opacity', 0);
			$('.juridica').html("");
			$('.juridica').removeAttr('required');

		} else if (pesjuridica.checked) {
			$('.fisica').css('display', 'none');
			$('.fisica').css('opacity', 0);
			$('.fisica').html("");
			$('.fisica').removeAttr('required');

			$('.juridica').css('display', 'block');
			$('.juridica').css('opacity', 1);
			$('.juridica').prop('required',true);
		}
	}

	var calculTotalPrice = function () {

		var quantite = $('.quantite').val();
		var cursoPrice = parseInt($('.comprar__curso_price h5').text().split('$')[1]);
		var total = cursoPrice * quantite;
		$('.comprar__total_price h5').html('Total R$ : ' + total);
	}

	var attachlistener = function () {
		$('.pessoas_juridica, .pessoas_fisica').on('click', function () {
			whoIsCheck();
		});

		$('.quantite').change(function () {
			calculTotalPrice();
		});

	}

	var init = function () {
		attachlistener();
		whoIsCheck();
		calculTotalPrice();
	};

	if (wrapper.hasClass('comprar')) {
		init();
	}
});