// Инициализация Isotope
let grid = $('.masonry');
grid.isotope({ itemSelector: '.masonry-item' });

const setColumns = (col) => {
	grid.removeClass('col-1');
	grid.removeClass('col-2');
	grid.removeClass('col-3');
	grid.removeClass('col-4');
	grid.removeClass('col-5');
	grid.removeClass('col-6');
	grid.removeClass('col-7');
	grid.removeClass('col-8');
	
	grid.addClass('col-' + col);
    grid.isotope('layout');
}

// Настройка отображения изображений в зависимости от выбранной метки
const elems_meta = document.querySelectorAll('.meta');
for (const i of elems_meta) {
    i.addEventListener('click', (e) => {
        e.preventDefault();

        for (const j of elems_meta)
            j.classList.remove('active');
        
        i.classList.add('active');

        // Настройка Isotope
        let value = i.getAttribute ('data-filter');
        grid.isotope({ filter: value });

        update_magnificPopup('.masonry', ((value != '*') ? value + ' ' : '') + 'a.popup');
    });
}

// Настройка количества колонок галереи
const elems_sizeButton = document.querySelectorAll('.size-button');
for (const i of elems_sizeButton) {
    i.addEventListener('click', (e) => {
        e.preventDefault();

        for (const j of elems_sizeButton)
            j.classList.remove('active');
        
        i.classList.add('active');

        localStorage.setItem('col', i.id);
        setColumns(parseInt(i.id.split('-')[1]));
    });
}

// -- Работа с модальными окнами (Magnific-Popup.js / Magnific-Popup.css)
const update_magnificPopup = (gallery, element) => {
    try {
        $(gallery).magnificPopup({
            delegate: element,
            type: 'image',
            tLoading: 'Загрузка изображения #%curr% ...',
            gallery: {
                enabled: true,
                tPrev: 'Назад',
                tNext: 'Далее',
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
    }
    catch { }
};

try {
    update_magnificPopup('.masonry', 'a.popup');
    document.querySelector('#' + localStorage.getItem('col')).click();
} catch { }

// Инициализация слайдера
let mySwiper = new Swiper('.feedback-slider', {
    slidesPerView: 1,
    autoHeight: true,
    spaceBetween: 30,
    loop: true,
    effect: 'fade',

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    }
});