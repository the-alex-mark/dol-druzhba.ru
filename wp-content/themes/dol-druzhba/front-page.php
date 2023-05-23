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
		</div>

		<!-- Библиотека -->     <!-- https://img.icons8.com/bubbles/110/000000/library.png -->
		<!-- Библиотека -->     <!-- https://img.icons8.com/bubbles/110/000000/book-shelf.png -->
		<!-- Питание -->        <!-- https://img.icons8.com/bubbles/50/000000/rack-of-lamb.png -->
		<!-- Медицина -->       <!-- https://img.icons8.com/bubbles/50/000000/nurse-female.png -->
		<!-- Медицина -->       <!-- https://img.icons8.com/bubbles/50/000000/medical-doctor.png -->
		<!-- Игротека -->       <!-- https://img.icons8.com/bubbles/50/000000/leaderboard.png -->
		<!-- Летняя эстрада --> <!-- https://img.icons8.com/bubbles/50/000000/music.png -->

		<!-- Инфраструктура -->
		<section class="section section__infrastructure">
			<div class="container">
				<h2 class="section-title">Инфраструктура</h2>
				<div class="list-structures">
					<?php
						$posts = get_posts([ 'numberposts' => 999, 'post_type' => 'infrastructure', 'orderby' => 'post__in' ]);
						foreach ($posts as $post): setup_postdata($post);
					?>

					<div class="struct block-struct">
						<img src="https://img.icons8.com/bubbles/110/000000/library.png" alt="" class="struct-image">
						<span class="struct-name"><?php the_title(); ?></span>
					</div>

					<?php endforeach; wp_reset_postdata(); ?>
				</div>
			</div>
		</section>

		<!-- Смены -->
		<?php
			$posts = get_posts([ 'numberposts' => 0, 'post_type' => 'camp-shifts', 'orderby' => 'post__in' ]);
			if ($posts): $i = 1;
		?>
		<section class="section section__camp-shifts">
			<div class="container">
				<h2 class="section-title">Смены <?php echo date('Y'); ?></h2>
				<div class="list-shifts">
					<?php foreach ($posts as $post): setup_postdata($post); ?>

					<figure class="shift block-shift">
						<div class="shift-info">
							<?php
								$cs_with = explode(',', get_field('camp_shift-date')['camp_shift-with'])[0];
								$cs_by   = explode(',', get_field('camp_shift-date')['camp_shift-by'])[0];
								$cs_year = explode(',', get_field('camp_shift-date')['camp_shift-by'])[1];
							?>

							<div class="info-item info-date no-select">с <?php echo $cs_with; ?> по <?php echo $cs_by; ?> <?php echo $cs_year; ?> г.</div>
							<a href="#" class="info-item info-button info-more" title="Подробнее">➜</a>
						</div>
						<a href="#" class="shift-link">
							<img src="<?php the_field('image-url'); ?>" alt="<?php the_title(); ?>" class="shift-image">
						</a>
						<figcaption class="shift-text">
							<h3 class="shift-title"><?php echo "Смена №" . $i++; ?></h3>
							<!-- <p class="shift-paragraph"></p> -->
						</figcaption>
					</figure>

					<?php endforeach; wp_reset_postdata(); ?>
				</div>

				<div class="camp-shifts-content">
					<button class="button camp-shifts-button">Оставить заявку</button>
				</div>
			</div>
		</section>
		<?php endif; ?>

		<!-- Отзывы -->
		<section class="section section__feedback">
			<h2 class="section-title">Отзывы</h2>
			<div class="list-feedback">
				<div class="swiper-container feedback-slider">
					<div class="swiper-wrapper">

						<?php
							$posts = get_posts([ 'numberposts' => 0, 'post_type' => 'feedback' ]);
							foreach ($posts as $post): setup_postdata($post);

							$user_firstName = get_the_author_meta('first_name');
							$user_lastName  = get_the_author_meta('last_name');
							$user_avatar    = get_avatar_url(get_the_author_meta('id'));
						?>

						<div class="swiper-slide">
							<div class="feedback-item">
								<img src="<?php echo $user_avatar; ?>" alt="" class="feedback-avatar">
								<div class="feedback-text">
									<div class="feedback-paragraph"><?php the_content(); ?></div>
									<h4 class="feedback-author"><?php echo $user_firstName . ' ' . $user_lastName; ?></h4>
									<span class="feedback-info"><?php echo get_the_date('j F Y') . ' г.'; ?></span>
								</div>
							</div>
						</div>

					<?php endforeach; wp_reset_postdata(); ?>

					</div>

					<div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div>
				</div>
			</div>
			<div class="container">
				<div class="feedback-content">
					<button class="button feedback-button">Оставить отзыв</button>
				</div>
			</div>
		</section>

		<!-- Новости -->
		<section class="section section__news">
			<div class="container">
				<h2 class="section-title">Новости</h2>

				<div class="list-shifts">
					<?php
						$posts = get_posts([ 'numberposts' => 0, 'post_type' => 'post', 'category' => 41 ]);
						foreach ($posts as $post): setup_postdata($post);
					?>

						<!-- <figure class="shift block-shift">
							<div class="shift-info">
								<div class="info-item info-date no-select"><?php echo get_the_date('j F Y') . ' г.'; ?></div>
								<a href="<?php echo get_permalink(); ?>" class="info-item info-button info-more" title="Подробнее">➜</a>
							</div>
							<a href="<?php echo get_permalink(); ?>" class="shift-link">
								<img src="<?php the_field('image-url'); ?>" alt="" class="shift-image">
							</a>
							<figcaption class="shift-text">
								<h3 class="shift-title"><?php the_title(); ?></h3>
								<p class="shift-paragraph"><?php echo get_the_excerpt(); ?></p>
							</figcaption>
						</figure> -->

						<figure class="new-item masonry-item">
							<a href="<?php echo get_permalink(); ?>" class="new-link">
								<img src="<?php echo get_field('image-url'); ?>" alt="" class="new-image">
							</a>
							<figcaption class="new-text">
								<h4 class="new-title"><a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></h4>
								<p class="new-paragraph"><?php echo get_the_excerpt(); ?></p>
							</figcaption>
							<div class="new-info">
								<span class="new-date"><?php echo get_the_date('j F Y') . ' г.'; ?></span>
								<a href="<?php echo get_permalink(); ?>" class="new-more">Подробнее</a>
							</div>
						</figure>

					<?php endforeach; wp_reset_postdata(); ?>
				</div>
			</div>
		</section>

		<?php get_footer(); ?>
		<?php wp_footer(); ?>

	</body>
</html>