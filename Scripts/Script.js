$(document).ready(function($) {
	// Обновление информации о лагере в Footer (Телефоны и Авторсие права)
	let _phones = document.getElementsByClassName('Contacts')[0].getElementsByTagName('h5')[0];
	_phones.innerHTML = _information['phones'][0] + '<br>' + _information['phones'][1];
	
	let _copyright = document.getElementsByClassName('Copyright')[0].getElementsByTagName('p')[0];
	_copyright.innerHTML = _information["copyright"];
	
	// --------------------------------------------------------------------------------------------------
	// Отображение Menu и Filter в мобильной версии
	$('#Menu').on('click', function(event) {
		event.preventDefault();

		$('.SideBar .Menu').slideToggle(300);		
		if ($('.SideBar .Filter').is(":hidden")) { }
		else { $('.SideBar .Filter').slideToggle(300); }
	});

	$('#Filter').on('click', function(event) {
		event.preventDefault();

		$('.SideBar .Filter').slideToggle(300);
        if ($('.SideBar .Menu').is(":hidden")) { }
		else { $('.SideBar .Menu').slideToggle(300); }
	});

	// --------------------------------------------------------------------------------------------------
	// Плавное перемещение до нужного ID
	$(".Smooth-Move").on("click", function (event) {
		event.preventDefault();
		var id = $(this).attr('href'), 
		top = $(id).offset().top;
		$('body,html').animate({scrollTop: top}, 1200);
	});

	// --------------------------------------------------------------------------------------------------
	// Настройки слайденра на главной странице
	$('.Slider-Photos').slick({
		arrows: false,
		dots: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		infinite: true,
		autoplay: true			
	});

	// --------------------------------------------------------------------------------------------------
	// -- Работа с Gallery (Isotope.js)
	var $Gallery = jQuery('.Gallery');
	if ($Gallery.length > 0) {

		$Gallery.each(function(index, element) {
			var $Items = $(element).find('.Item');
		
			// Набор макета кладки 
			$(element).isotope({
				masonry: { columnWidth: $(element).find('.Item')[0] },
				itemSelector: '.Item'
			});
			$(element).isotope('layout');
				
			// Фильтрация (One / Two / Three)
			jQuery('.Gallery-Filter li a').on('click', function(){
				jQuery('.Gallery-Filter li a').removeClass('Active');
				jQuery(this).addClass('Active');
				var selector = jQuery(this).attr('data-filter');
				$Gallery.isotope({ filter: selector });
				return false;
			});

			// Фильтрация (One / Two / Three) - Мобильное меню
			jQuery('#Period li a').on('click', function(){
				jQuery('#Period li a').removeClass('Active');
				jQuery(this).addClass('Active');
				var selector = jQuery(this).attr('data-filter');
				$Gallery.isotope({ filter: selector });
				return false;
			});

			// Изменение количества столбцов
			jQuery('.Gallery-Sizing .Button').on('click', function(){
				jQuery('.Gallery-Sizing .Button').removeClass('Active');
				jQuery(this).toggleClass('Active');

				$Items.removeClass('column-3');
				$Items.removeClass('column-4');
				$Items.removeClass('column-5');
				$Items.toggleClass(jQuery(this).closest('a').attr('class'));
				$Gallery.isotope('layout');
			});
		});
	}

	// --------------------------------------------------------------------------------------------------
	// -- Работа с модальными окнами (Magnific-Popup.js / Magnific-Popup.css)
	jQuery('.Gallery').magnificPopup({
		delegate: 'a.popup',
		type: 'image',
		tLoading: 'Загрузка изображения #%curr% ...',
		gallery: {
			enabled: true,
			tPrev: 'Назад',
			tNext: 'Вперёд',
			tCounter: 'Изображение %curr% из %total%'
		},
		image: {
			cursor: 'mfp-zoom-out-cur',
			tError: 'Не удалось загрузить изображение!',
			titleSrc: 'alt'					  
		},
	  	mainClass: 'mfp-with-zoom',
		zoom: {
			enabled: true,
			duration: 300,
			easing: 'ease-in-out',
			opener: function(openerElement) {
				return openerElement.is('img') ? openerElement : openerElement.find('img');
			}
		}
	});
});