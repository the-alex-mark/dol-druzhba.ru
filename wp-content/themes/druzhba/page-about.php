<?php
    /*
    Template Name: О лагере
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

                    <div class="column-grid">
                        <div class="column column-first"><h3>Регион:</h3></div>
                        <div class="column column-last"><p><?php the_field('region', 16); ?></p></div>

                        <div class="column column-first"><h3>Ближайший город:</h3></div>
                        <div class="column column-last"><p><?php the_field('city', 16); ?></p></div>

                        <div class="column column-first"><h3>Адрес:</h3></div>
                        <div class="column column-last"><p><?php echo explode('<br />', get_field('address-camp', 16))[1]; ?> <a href="<?php the_field('map', 16); ?>" target="_blank">(Посмотреть на карте)</a></p></div>

                        <div class="column column-first"><h3>Возраст:</h3></div>
                        <div class="column column-last"><p>Для детей <?php echo get_field('camp-age', 10)['camp-age_from'] . ' - ' . get_field('camp-age', 10)['camp-age_before'] ?> лет</p></div>

                        <div class="column column-first"><h3>Количество участников:</h3></div>
                        <div class="column column-last"><p><?php the_field('camp-fill', 10); ?></p></div>

                        <div class="column column-first"><h3>Год начала деятельности:</h3></div>
                        <div class="column column-last"><p><?php the_field('camp-year_foundation', 18); ?></p></div>
                    </div>

                    <br>
                    <h2 style="text-align: center;">Размещение</h2>
                    <div class="column-grid">
                        <div class="column column-first"><h3>Тип площадки:</h3></div>
                        <div class="column column-last"><p><?php the_field('camp-type_platform', 10); ?></p></div>

                        <div class="column column-first"><h3>Размещение / Номера:</h3></div>
                        <div class="column column-last"><p><?php the_field('camp-accommodation', 10); ?></p></div>

                        <div class="column column-first"><h3>Питание:</h3></div>
                        <div class="column column-last"><p><?php the_field('camp-short_food', 10); ?></p></div>

                        <div class="column column-first"><h3>Площадь территории:</h3></div>
                        <div class="column column-last"><p><?php the_field('camp-area', 10); ?></p></div>
                    </div>

                    <br>
                    <h2 style="text-align: center;">Общая программа</h2>
                    <?php the_field('camp-program', 10); ?>

                    <br>
                    <h2 style="text-align: center;">Распорядок дня</h2>
                    <?php the_field('daily-schedule', 23); ?>
                </div>
            </main>
		</div>

		<?php get_footer(); ?>
		<?php wp_footer(); ?>

	</body>
</html>