<?php
    /*
    Template Name: Контакты
    */
?>

<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
<head>
		<title><?php bloginfo('name'); ?></title>

		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="keywords" content='Детский оздоровительный лагерь "Дружба", ДОЛ, Дружба'>
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
	</head>
	<body>
		
		<div class="container">
            <?php get_header(); ?>

            <main class="main">
                <?php get_sidebar('about'); ?>

                <div class="content">
                    <?php the_content(); ?>

                    <br>
                    <h2 style="text-align: center;">Мы на карте</h2>
                    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ae3374fd494d9f1da75cae8d740c53f05787485d8536898bfac51a75a171ab10d&amp;width=100%25&amp;height=300&amp;lang=ru_RU&amp;scroll=true"></script>
                </div>
            </main>
		</div>

		<?php get_footer(); ?>
		<?php wp_footer(); ?>

	</body>
</html>