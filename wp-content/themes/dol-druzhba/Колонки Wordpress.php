<?php

// Создание колонки
add_filter('manage_posts_columns', 'add_column', 5);
add_filter('manage_pages_columns', 'add_column', 5);
function add_column($columns) {
    // Удаление колонки "Автор"
    unset($columns['author']);

	$out = [];
	foreach ($columns as $col => $name) {
        // "Миниатюра"
        if (++$i == 2) $out['thumbnail'] = __('Миниатюра');

        // "ID"
        if ($i == 3) $out['id'] = __('ID');

		$out[$col] = $name;
	}

	return $out;
}

// Заполнение колонки данными
add_filter('manage_posts_column', 'fill_column');
add_filter('manage_pages_column', 'fill_column');
add_filter('manage_posts_custom_column', 'fill_column', 5, 2);
add_filter('manage_pages_custom_column', 'fill_column', 5, 2);
function fill_column($column_name, $post_id) {
    // "Миниатюра"
    if ($column_name === 'thumbnail') {
        $alt_image = get_post_meta($post_id, 'image-url', true);
        $image_url = (($alt_image) ? $alt_image : get_the_post_thumbnail_url());
        echo '<img src="' . $image_url . '" alt="" title="' . $image_url . '" width="80" style="display: block;">';
    }
    
    // "ID"
    if ($column_name === 'id')
        echo '<b>' . $post_id . '</b>';
}

// Правка ширины колонки через CSS
add_action('admin_head', 'edit_column_css');
function edit_column_css() {
	if (get_current_screen()->base == 'edit') {
        // "Миниатюра"
        echo '<style type="text/css"> .column-thumbnail { width: 80px; } </style>';

        // "ID"
        echo '<style type="text/css"> .column-id { width: 8%; } </style>';
    }
}

// Сортировка колонки
add_filter('manage_edit-post_sortable_columns', 'edit_column_sortable');
add_filter('manage_edit-page_sortable_columns', 'edit_column_sortable');
add_filter('manage_edit-gallery_sortable_columns', 'edit_column_sortable');
function edit_column_sortable($sortable_columns) {
	$sortable_columns['id'] = 'id_id';
	return $sortable_columns;
}