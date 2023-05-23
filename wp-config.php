<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'dol_druzhba' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'root' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '^y;n5ujBw)w#T2{745#FJ5WDBOPz/7dh,cZ00lM=Ri+`9$s9@(c9rdsbKu5npIjR' );
define( 'SECURE_AUTH_KEY',  '8)(-I:#:h#$<`vWwH[+c[4~R5J?C>vgiM%=.*-mf`9(]1g$@TfLEGVgfyuXJm|Sd' );
define( 'LOGGED_IN_KEY',    '!#9:jwhRgw<,B?e9Y5;e2VGMU^p8Q3KA9W^,tUbYpxfn%{3Hz{NE%<.W.]558$;r' );
define( 'NONCE_KEY',        'oCiq0oj2S1H>SiV=b;x;*T}}Rss-)_c#K?|0k$aV>ENPR+jMf~ Zjjx#riNksOl%' );
define( 'AUTH_SALT',        '}y5z%s6% !E=kuYXY~#n2p0qJG#pEIRGWcCcj)Mn0x-bjF6ic&4n/1jrV5`h$+||' );
define( 'SECURE_AUTH_SALT', '^OmIHitNBg!XcFDg.wH9_#eH]8TXNM.GZb-?DG7YL2jOoqQQ=9& yGNu$/KM$]v^' );
define( 'LOGGED_IN_SALT',   '}~o0_>j=~tg#${tN2h$ze])G1vrbK|&8n<Xb#Xug<R9[uLUT8H;X~Euqdf5u T{D' );
define( 'NONCE_SALT',       '(QxtPCf++.*sm0Lfu2$o[*c2)>rxM%`Z0 *TjX4:UY/xCk0/3NP{)8Cx(c04<y%C' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'camp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
