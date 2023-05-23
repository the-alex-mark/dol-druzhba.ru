<?php
    /*
    Template Name: Главная
    */
?>

<!DOCTYPE html>
<html lang="ru">
<head>
		<title>Страница не найдена</title>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="robots" content="index, nofollow">
		<meta name="keywords" content='Детский оздоровительный лагерь "Дружба", ДОЛ, Дружба'>
		<meta name="description" content='Официальный сайт детского оздоровительного лагеря "Дружба"'>

		<!-- Подключение иконки страницы -->
		<link rel="Shortcut Icon" href="resources/logo.png">

		<!-- Подключение шрифтов -->
		<!-- <link rel="stylesheet" href="fonts/Fontello/fontello.css"> -->
		<?php wp_head(); ?>
	</head>
	<body>
		
		<div class="container">

		<?php get_header(); ?>

		<main class="main">
			<div class="content error-404">
				<h1>404</h1>
				<p>Страница не найдена.</p>
			</div>
		</main>

		</div>

		<?php get_footer(); ?>
		<?php wp_footer(); ?>

	</body>
</html>