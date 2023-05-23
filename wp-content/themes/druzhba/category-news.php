<?php
    /*
    Template Name: Новости
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
					<div class="masonry col-3">
						<?php
							$posts = get_posts([
                                'posts_per_page'   => 20,
								'paged'            => get_query_var('paged'),
                                'suppress_filters' => true,
                                
								'numberposts'      => 999,
								'post_type'        => 'post',
								'category'         => get_queried_object()->term_id
							]);
							
							foreach ($posts as $post): setup_postdata($post); ?>

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

                    <?php if (paginate_links()): ?>
						<nav class="pagination">
							<div class="pagination-button prev">
								<?php if (get_previous_posts_link()): echo get_previous_posts_link(); else: ?>
									<span class="prev-link no-select">Назад</span>
								<?php endif; ?>
							</div>
							<?php
								echo paginate_links([
									'show_all'     => false,
									'end_size'     => 4,
									'mid_size'     => 4,
									'prev_next'    => false,
									'prev_text'    => 'Назад',
									'next_text'    => 'Далее',
									'type'         => 'plain',
									'add_args'     => false,
								]);
							?>
							<div class="pagination-button next">
								<?php if (get_next_posts_link()): echo get_next_posts_link(); else: ?>
									<span class="next-link no-select">Далее</span>
								<?php endif; ?>
							</div>

							<script>
								document.querySelector('.prev a, .prev-link').textContent = 'Назад';
								document.querySelector('.next a, .next-link').textContent = 'Далее';
							</script>
						</nav>
					<?php endif; ?>
				</div>
			</main>
		</div>

		<?php get_footer(); ?>
		<?php wp_footer(); ?>

	</body>
</html>