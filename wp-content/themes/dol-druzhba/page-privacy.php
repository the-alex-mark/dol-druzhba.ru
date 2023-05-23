<?php
    /*
    Template Name: Политика конфиденциальности
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
            <!-- <?php get_header(); ?> -->

            <main class="main">
                <div class="content">
                    <?php the_content(); ?>
                </div>
            </main>
		</div>

	</body>
</html>