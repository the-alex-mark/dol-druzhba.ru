<?php

// Подключение дополнительных файлов
require_once('classes/custom_nav_menu.php');

// Инициализация глобальных переменных и констант
define('ROOT',      get_template_directory_uri());
define('STYLES',    ROOT . '/assets/styles');
define('SCRIPTS',   ROOT . '/assets/scripts');
define('PLUGINS',   ROOT . '/assets/plugins');
define('FONTS',     ROOT . '/assets/fonts');
define('RESOURCES', ROOT . '/assets/resources');

// Скрытие панели WordPress на сайте
show_admin_bar(false);

// Поддержка различных функций на сайте
add_theme_support('menus');           // Меню
add_theme_support('widgets');         // Виджеты
add_theme_support('page-thumbnails'); // Миниатюра страниц
add_theme_support('post-thumbnails'); // Миниатюра постов

// Поддержка дополнительных полей у различных типов записей
add_action('init', function () {
	add_post_type_support('page', [ 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes', 'post-formats' ]);
	add_post_type_support('post', [ 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes', 'post-formats' ]);
	add_post_type_support('camp-shifts', [ 'page-attributes' ]);
	add_post_type_support('feedback', [ 'author' ]);
});

// Добавление пользовательского типа записи "Галерея" и таксономий к ней
add_action('init', 'register_gallery');
function register_gallery() {

    // Создание пользовательского типа записи "Галерея"
	register_post_type('gallery', [
		'label'                  => null,
		'labels'                 => [
			'name'               => 'Галерея',
            'singular_name'      => 'Изображение',
            'all_items'          => 'Все изображения',
			'add_new'            => 'Добавить новое',
			'add_new_item'       => 'Добавление изображения',
			'edit_item'          => 'Редактирование изображения',
			'new_item'           => 'Новое изображение',
			'view_item'          => 'Смотреть изображение',
			'search_items'       => 'Искать изображение',
			'not_found'          => 'Не найдено',
			'not_found_in_trash' => 'Не найдено',
			'menu_name'          => 'Галерея',
        ],
		'description'            => '',
		'public'                 => true,
		'publicly_queryable'     => true,
		'exclude_from_search'    => false,
		'show_ui'                => true,
		'show_in_nav_menus'      => true,
		'show_in_menu'           => true,
		'show_in_admin_bar'      => true,
		'show_in_rest'           => true,
		'rest_base'              => null,
		'menu_position'          => 7,
		'menu_icon'              => 'dashicons-format-gallery',
		'hierarchical'           => false,
		'supports'               => [ 'title', 'editor', 'thumbnail' ],
		'taxonomies'             => [ 'albums', 'marks' ],
		'has_archive'            => false,
		'rewrite'                => [
			'slug'               => 'images',
			'with_front'         => false,
			'hierarchical'       => false
		]
    ]);
    
    // Создание пользовательской таксономии "Альбомы"
    register_taxonomy('albums', [ 'gallery' ], [ 
		'label'                  => null,
		'labels'                 => [
			'name'               => 'Альбомы',
			'singular_name'      => 'Альбом',
			'search_items'       => 'Поиск альбома',
			'all_items'          => 'Все альбомы',
			'view_item'          => 'Просмотреть альбом',
			'parent_item'        => 'Родительский альбом',
			'parent_item_colon'  => 'Родительский альбом:',
			'edit_item'          => 'Редактировать альбом',
			'update_item'        => 'Обновить альбом',
			'add_new_item'       => 'Добавить новый альбом',
            'new_item_name'      => 'Новое имя альбома',
            'not_found'          => 'Не найдено',
			'not_found_in_trash' => 'Не найдено',
			'menu_name'          => 'Альбомы',
		],
		'description'            => '',
		'public'                 => true,
        'hierarchical'           => true,
		'show_admin_column'      => true,
        'rewrite'                => [
			'slug'               => 'gallery',
			'with_front'         => false,
			'hierarchical'       => false
		]
    ]);
    
    // Привязка таксономии "Альбомы" к пользовательскому типу записи "Галерея"
    register_taxonomy_for_object_type('albums', 'gallery');

    // Создание пользовательской таксономии "Метки"
    register_taxonomy('marks', [ 'toilet' ], [ 
		'label'                  => null,
		'labels'                 => [
			'name'               => 'Метки',
			'singular_name'      => 'Метка',
			'search_items'       => 'Поиск меток',
			'all_items'          => 'Все метки',
			'view_item'          => 'Просмотреть метку',
			'parent_item'        => 'Родительская метка',
			'parent_item_colon'  => 'Родительская метка:',
			'edit_item'          => 'Редактировать метку',
			'update_item'        => 'Обновить метку',
			'add_new_item'       => 'Добавить новую метку',
            'new_item_name'      => 'Новое имя метки',
            'not_found'          => 'Не найдено',
			'not_found_in_trash' => 'Не найдено',
			'menu_name'          => 'Метки',
		],
		'description'            => '',
		'public'                 => true,
        'hierarchical'           => false,
        'show_admin_column'      => true,
        'rewrite'                => true,
    ]);
    
    // Привязка таксономии "Метки" к пользовательскому типу записи "Галерея"
    register_taxonomy_for_object_type('marks', 'gallery');
}

// Сортировка колонок у пользовательского типа записи "Галерея"
add_filter('manage_edit-toilet_sortable_columns', function () {
    $columns['title'] = 'title_title';
    $columns['id'] = 'id_id';
    $columns['taxonomy-albums'] = 'taxonomy-albums_taxonomy-albums';
    $columns['taxonomy-marks'] = 'taxonomy-marks_taxonomy-marks';
	return $columns;
});

// Добавление пользовательского типа записи "Смена"
add_action('init', 'register_camp_shifts');
function register_camp_shifts() {

    // Создание пользовательского типа записи "Смена"
	register_post_type('camp-shifts', [
		'label'  => null,
		'labels' => [
			'name'               => 'Смены',
            'singular_name'      => 'Смена',
            'all_items'          => 'Все смены',
			'add_new'            => 'Добавить новую',
			'add_new_item'       => 'Добавление смены',
			'edit_item'          => 'Редактировать смену',
			'new_item'           => 'Новая смена',
			'view_item'          => 'Смотреть смену',
			'search_items'       => 'Поиск смены',
			'not_found'          => 'Не найдено',
			'not_found_in_trash' => 'Не найдено в корзине',
			'menu_name'          => 'Смены',
        ],
		'description'            => '',
		'public'                 => true,
		'publicly_queryable'     => true,
		'exclude_from_search'    => false,
		'show_ui'                => true,
		'show_in_nav_menus'      => true,
		'show_in_menu'           => true,
		'show_in_admin_bar'      => true,
		'show_in_rest'           => true,
		'rest_base'              => null,
		'menu_position'          => null,
		'menu_icon'              => 'dashicons-groups',
		'hierarchical'           => false,
		'supports'               => [ 'title', 'editor', 'thumbnail' ],
		'taxonomies'             => [],
		'has_archive'            => false,
		'rewrite'                => true,
    ]);
}

// Сортировка колонок у пользовательского типа записи "Смена"
add_filter('manage_edit-camp-shifts_sortable_columns', function () {
    $columns['title'] = 'title_title';
    $columns['id'] = 'id_id';
	return $columns;
});

// Добавление пользовательского типа записи "Инфраструктура"
add_action('init', 'register_infrastructure');
function register_infrastructure() {

    // Создание пользовательского типа записи "Инфраструктура"
	register_post_type('infrastructure', [
		'label'  => null,
		'labels' => [
			'name'               => 'Инфраструктура',
            'singular_name'      => 'Структура',
            'all_items'          => 'Все структуры',
			'add_new'            => 'Добавить новую',
			'add_new_item'       => 'Добавление структуры',
			'edit_item'          => 'Редактировать структуру',
			'new_item'           => 'Новая структура',
			'view_item'          => 'Смотреть структуру',
			'search_items'       => 'Поиск структуры',
			'not_found'          => 'Не найдено',
			'not_found_in_trash' => 'Не найдено в корзине',
			'menu_name'          => 'Инфраструктура',
        ],
		'description'            => '',
		'public'                 => true,
		'publicly_queryable'     => true,
		'exclude_from_search'    => false,
		'show_ui'                => true,
		'show_in_nav_menus'      => true,
		'show_in_menu'           => true,
		'show_in_admin_bar'      => true,
		'show_in_rest'           => true,
		'rest_base'              => null,
		'menu_position'          => null,
		'menu_icon'              => 'dashicons-networking',
		'hierarchical'           => false,
		'supports'               => [ 'title', 'editor', 'thumbnail' ],
		'taxonomies'             => [],
		'has_archive'            => false,
		'rewrite'                => true,
    ]);
}

// Сортировка колонок у пользовательского типа записи "Инфраструктура"
add_filter('manage_edit-infrastructure_sortable_columns', function () {
    $columns['title'] = 'title_title';
    $columns['id'] = 'id_id';
	return $columns;
});

// Добавление пользовательского типа записи "Отзывы"
add_action('init', 'register_feedback');
function register_feedback() {

    // Создание пользовательского типа записи "Отзывы"
	register_post_type('feedback', [
		'label'  => null,
		'labels' => [
			'name'               => 'Отзывы',
            'singular_name'      => 'Отзыв',
            'all_items'          => 'Все отзывы',
			'add_new'            => 'Добавить новый',
			'add_new_item'       => 'Добавление отзыва',
			'edit_item'          => 'Редактировать отзыв',
			'new_item'           => 'Новый отзыв',
			'view_item'          => 'Смотреть отзыв',
			'search_items'       => 'Поиск отзыва',
			'not_found'          => 'Не найдено',
			'not_found_in_trash' => 'Не найдено в корзине',
			'menu_name'          => 'Отзывы',
        ],
		'description'            => '',
		'public'                 => true,
		'publicly_queryable'     => true,
		'exclude_from_search'    => false,
		'show_ui'                => true,
		'show_in_nav_menus'      => true,
		'show_in_menu'           => true,
		'show_in_admin_bar'      => true,
		'show_in_rest'           => true,
		'rest_base'              => null,
		'menu_position'          => 20,
		'menu_icon'              => 'dashicons-heart',
		'hierarchical'           => false,
		'supports'               => [ 'title', 'editor', 'thumbnail' ],
		'taxonomies'             => [],
		'has_archive'            => false,
		'rewrite'                => true,
    ]);
}

// Сортировка колонок у пользовательского типа записи "Отзывы"
add_filter('manage_edit-feedback_sortable_columns', function () {
    $columns['title'] = 'title_title';
    $columns['id'] = 'id_id';
	return $columns;
});

// Регистрация боковых панелей
add_action('widgets_init', function () {
	register_sidebar([
		'name'          => 'Боковая панель',
		'id'            => "sidebar",
		'description'   => '',
		'class'         => '',
		'before_widget' => '',
		'after_widget'  => "",
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => "</h2>\n",
    ]);
});

// Создание дополнительных колонок
add_filter('manage_posts_columns', 'add_column', 5);
add_filter('manage_pages_columns', 'add_column', 5);
function add_column($columns) {
    // Удаление колонки "Автор"
    unset($columns['author']);

	$out = [];
	foreach ($columns as $column => $name) {
        ++$i;

        // "Миниатюра"
        if ($i == 2) $out['thumbnail'] = __('Миниатюра');

        // "ID"
        if ($i == 3) $out['id'] = __('ID');

		$out[$column] = $name;
	}

	return $out;
}

// Заполнение колонок данными
add_filter('manage_posts_column', 'fill_column');
add_filter('manage_posts_custom_column', 'fill_column', 5, 2);
add_filter('manage_pages_column', 'fill_column');
add_filter('manage_pages_custom_column', 'fill_column', 5, 2);
function fill_column($column_name, $post_id) {
    // "Миниатюра"
    if ($column_name === 'thumbnail') {
        $alt_image = get_post_meta($post_id, 'image', true);

        $image_url = (($alt_image) ? $alt_image : get_the_post_thumbnail_url());
        echo '<a href="' . $image_url . '" target="_blank"><img src="' . $image_url . '" width="80" style="display: block;"></a>';
    }
    
    // "ID"
    if ($column_name === 'id')
        echo '<b>' . $post_id . '</b>';
}

// Правка ширины колонок через CSS
add_action('admin_head', 'edit_column_css');
function edit_column_css() {
	if (get_current_screen()->base == 'edit') {
        // "Миниатюра"
        echo '<style type="text/css"> .column-thumbnail { width: 80px; } </style>';

        // "ID"
        echo '<style type="text/css"> .column-id { width: 8%; } </style>';

        // "Года" и "Метки"
        echo '<style type="text/css"> .column-taxonomy-albums { width: 12%; } </style>';
        echo '<style type="text/css"> .column-taxonomy-marks { width: 12%; } </style>';        
        echo '<style type="text/css"> .column-taxonomy-year { width: 12%; } </style>';
        echo '<style type="text/css"> .column-taxonomy-mark { width: 12%; } </style>';
    }
}

// Сортировка колонок
add_filter('manage_edit-post_sortable_columns', 'sortable_column');
add_filter('manage_edit-page_sortable_columns', 'sortable_column');
function sortable_column($columns) {
	$columns['id'] = 'id_id';
	return $columns;
}

// ------------------------------------------------------------------------------------------------------------------------------------------------
// ↑ Настройка административной панели

// ↓ Удаление "/category/" из постоянных ссылок
// ------------------------------------------------------------------------------------------------------------------------------------------------
add_filter('user_trailingslashit', function ($link) {
	return str_replace("/category/", "/", $link);
});

add_action('init', function () {
	global $wp_rewrite;
	$wp_rewrite->flush_rules();
});

add_filter('generate_rewrite_rules', function ($wp_rewrite) {
	$new_rules = array('(.+)/page/(.+)/?' => 'index.php?category_name='.$wp_rewrite->preg_index(1).'&paged='.$wp_rewrite->preg_index(2));
	$wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
});
// ------------------------------------------------------------------------------------------------------------------------------------------------

// ↓ Настройка сайта
// ------------------------------------------------------------------------------------------------------------------------------------------------

// Инициализация глобальных переменных и констант
define('HOME_ID',         20);
define('ABOUT_ID',        22);
define('HISTORY_ID',      24);
define('INFO_ID',         26);
define('CONDITIONS_ID',   28);
define('FOOD_ID',         30);
define('FORPARENTS_ID',   32);
define('FORCOUNSELOR_ID', 34);
define('CAMPSHIFTS_ID',   36);
define('NEWS_ID',         38);
define('GALLERY_ID',      40);
define('CONTACTS_ID',     42);

// Подключение дополнительных файлов
add_action('wp_enqueue_scripts', 'get_scripts');
function get_scripts() {

    // // Шрифты
    // wp_enqueue_style('font-montserrat', FONTS . '/Montserrat/stylesheet.css');
    // wp_enqueue_style('font-montserratAlternates', FONTS . '/Montserrat Alternates/stylesheet.css');
    // wp_enqueue_style('font-fontello', FONTS . '/Fontello/stylesheet.css"');

    // Стили
    wp_enqueue_style('magnificPopup', PLUGINS . '/Magnific Popup/magnific-popup.css');
    wp_enqueue_style('swiper', PLUGINS . '/Swiper/swiper.min.css');
    wp_enqueue_style('main', STYLES . '/main.css');
    wp_enqueue_style('adaptive', STYLES . '/adaptive.css');

    // Скрипты
    wp_deregister_script('jquery');
    wp_enqueue_script('vk', 'https://vk.com/js/api/openapi.js?167', [], null, false);
	wp_enqueue_script('jquery', PLUGINS . '/JQuery/jquery.min.js', [], null, true);
    wp_enqueue_script('isotope', PLUGINS . '/Isotope/isotope.pkgd.min.js', [], null, true);
    wp_enqueue_script('magnificPopup', PLUGINS . '/Magnific Popup/magnific-popup.min.js', [], null, true);
    wp_enqueue_script('swiper', PLUGINS . '/Swiper/swiper.min.js', [], null, true);
    wp_enqueue_script('main', SCRIPTS . '/main.js', [], null, true);
}

// Настройка логотипа
add_theme_support('custom-logo');
add_filter('get_custom_logo', 'filter_get_custom_logo');
function filter_get_custom_logo($html) {
    $html = str_replace('custom-logo-link', 'header-logo', $html);
    $html = str_replace('custom-logo', 'logo', $html);
    return $html;
}

// Настройка меню
add_filter('nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 4);
function filter_nav_menu_link_attributes($atts, $item, $args, $depth) {
    // Открытие внешних ссылок в отдельной вкладке
    if (strpos($atts['href'], home_url()) === false)
        $atts['target'] = '_blank';

    // Добавление класса к каждой ссылке
    $atts['class'] .= 'nav-item';

    // Добавление класса ".active" к активной ссылке текущей страницы
    if ($item->current) $atts['class'] .= ' active';

    // Добавление класса ".active" к активной ссылке текущей родительской страницы
    if (in_array('current-menu-item', $item->classes) || in_array('current-page-ancestor', $item->classes))
        $atts['class'] .= ' active';

	// Добавление класса ".active" к активной ссылке текущей родительской рубрике таксономии "year"
	if (in_array('current-albums-ancestor', $item->classes)) {
		$atts['class'] .= ' active';
	}

	// 
	if (stripos($atts['href'], 'years')) {
		$terms = get_terms([ 'taxonomy' => 'albums', 'hide_empty' => false, 'order' => 'DESC' ]);
		$atts['href'] = str_replace('years', $terms[1]->slug, $atts['href']);
	}

	// 
	if (is_page(ABOUT_ID) && stripos($atts['href'], '/info'))
		$atts['class'] .= ' active';
	$atts['href'] = str_replace('/info', '', $atts['href']);

	return $atts;
}

// Избавление от неразрывных пробелов
add_filter('the_title', 'removing_NonBreakingSpaces');
add_filter('the_excerpt', 'removing_NonBreakingSpaces');
add_filter('the_content', 'removing_NonBreakingSpaces');
function removing_NonBreakingSpaces($html) {
    $html = str_replace('&nbsp;', ' ', htmlentities($html));
    return htmlspecialchars_decode($html);
}

// Установка максимального количества записей на одной странице
add_action('pre_get_posts', function ($query) {
    if (is_tax('albums')) {
        $query->set('posts_per_page', 60);
	}

	if (is_category('news')) {
        $query->set('posts_per_page', 20);
	}
});

// Удаление заголовка второго уровня из пагинации
add_filter('navigation_markup_template', function ($template, $class) {
	return '
        <nav class="navigation %1$s" role="navigation">
            %3$s
        </nav>
	';
});

function get_content($id) {
	$post = get_post($id);
	$content = apply_filters('the_content', $post->post_content);
	echo $content;
}