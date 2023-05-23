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
define( 'DB_NAME', 'druzhba' );

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
define( 'AUTH_KEY',         'y5pPe9/bhH.eigQy:A^DF`bh@0E~V*DGr#ZK9NPUH1Z~aQ4F;D`KDsnZIo~G45u|' );
define( 'SECURE_AUTH_KEY',  'wMLh3:^oN%o2B]EKbFy[.hUG}v2r%<R}61IlCiuEbi_hK[ivXn5>kd^W&yqADBDP' );
define( 'LOGGED_IN_KEY',    '%jinj>}fBV8k^Tf ]1I^,)U.K7$J;[=zv1:`,D7_pz7,{Ii-mIL_}-WWdRwo>JC3' );
define( 'NONCE_KEY',        'Rv=fj^^)n54F52/(!9*6e_N|KiKA*C.[M1@`!Nbn9Q:_-X]Te=~06=9{pma[Afp;' );
define( 'AUTH_SALT',        '~?#6L%O}HV8t<[wXg3Lu8pf/Mi#sF9),O)YH[Lq]9#?)#A,i>P,H)!mC3[JERT0y' );
define( 'SECURE_AUTH_SALT', 'k=(TWRr9W%:KCl.*E~^-rD)T+,RqZ^WP;+rBUHKSTOU2-dA,9X6}w{.;*;8d{=!S' );
define( 'LOGGED_IN_SALT',   '5u aw R}~!p*>=.!VWQR49f.7R,K-+e0e}N#Yf{k.7gBrPo4f{1/r&$FEW,OGD1/' );
define( 'NONCE_SALT',       '|N%Rbv4o}+$hKrK?0;%_K$HgDq RrV>p#L[-_2Km2?gTvv6*)-k*(%ctbGnn~UX1' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'druzhba_';

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
