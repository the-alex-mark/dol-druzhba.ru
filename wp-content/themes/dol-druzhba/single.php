<?php
    /*
    Template Name: Главная
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
                <div class="content">
                    <h2 style="text-align: center;"><?php the_title(); ?></h2>
                    <?php the_content(); ?>
                </div>
            </main>
		</div>

		<?php get_footer(); ?>
		<?php wp_footer(); ?>

	</body>
</html>