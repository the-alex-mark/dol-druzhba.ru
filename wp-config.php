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
define( 'DB_NAME', 'j576709_client-dol-druzhba' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'j576709' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '26vHDEbt' );

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
define( 'AUTH_KEY',         '/,FY4$Z`Lozg0Rkc2FJXz*02Ldj!Uz/eTg#p;N638^+3=+C)F8r=}ipp2lh)tUtG' );
define( 'SECURE_AUTH_KEY',  'eQr],n/7[Cp7U&20gL,C~Xdw7)d6!z8-5`6_&#IuCt PM>mhofWf2g~nV}oRzBeo' );
define( 'LOGGED_IN_KEY',    'csc}Zk|n:8(j>If?(nV|ce`+ZB*DYmN)M Nj >. Feh&u8>%&(yActcIaxY{LHN5' );
define( 'NONCE_KEY',        '!I:3AA7YW8gqK>MA@!{HQI)C0(#aY8+q:J7e^+=FfR^eyn[Kem7Bbs&XT4-EM{1{' );
define( 'AUTH_SALT',        'QEZvjkb;H$+$3E#Da9H)g`<Yq}6=xjNtDl9i92W*X0H 5C0?eb;#U@{4`9wvlgRY' );
define( 'SECURE_AUTH_SALT', 'JEF!;&Wk1*#;fOf@A{4y{ }773%I:qj2Te;(S}^&*phoOdBfLAd9@lY<oENRJ 0X' );
define( 'LOGGED_IN_SALT',   'O<[ <rHeCG^Ip9,]L=m{B5g92(XZh@u]5Z& #.=${3+H2`F=/n[J)dX)c~Z|e@cj' );
define( 'NONCE_SALT',       'V=pl0_wV#ooD2ad;zoa>d5vQM6XE>2G7A<T6gfBI% &| 6P*Y*?rT#<)`&o23?F3' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

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
