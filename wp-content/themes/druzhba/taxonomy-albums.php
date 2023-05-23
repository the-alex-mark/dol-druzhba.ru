<?php
    /*
    Template Name: Категории
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
                <?php get_sidebar('gallery'); ?>

                <div class="content">
					<div class="filter-gallery">
						<div class="list-meta">
							<a href="#" data-filter='*' class="meta active">Все</a>
							<?php $cats = get_terms([ 'taxonomy' => 'marks', 'hide_empty' => false ]); foreach ($cats as $cat): ?>
								<a href="#" data-filter=".<?php echo $cat->slug; ?>" class="meta"><?php echo $cat->name; ?></a>
							<?php endforeach; wp_reset_postdata(); ?>
						</div>
						<div class="list-sizing">
							<a id="col-3" href="#" class="size-button active">
								<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 30 30" style="display: block;">
									<rect width="10" height="10" x="10" y="10" />
								</svg>
							</a>
							<a id="col-4" href="#" class="size-button">
								<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 30 30" style="display: block;">
									<rect width="8" height="8" x="6"  y="6" />
									<rect width="8" height="8" x="16" y="6" />
									<rect width="8" height="8" x="6"  y="16" />
									<rect width="8" height="8" x="16" y="16" />
								</svg>
							</a>
						</div>
					</div>

					<div class="masonry col-3">
						<?php
							$posts = get_posts([
								'posts_per_page'   => 60,
								'paged'            => get_query_var('paged'),
								'suppress_filters' => true,

								'post_type' => 'gallery',
								'tax_query' => [[
									'taxonomy' => get_queried_object()->taxonomy,
									'field'    => 'slug',
									'terms'    => get_queried_object()->slug
								]]
							]);
							
							foreach ($posts as $post): setup_postdata($post); ?>
							
							<figure id="<?php echo $post->ID; ?>" class="gallery-item masonry-item<?php $cur_terms = get_the_terms($post->ID, 'marks'); if (is_array($cur_terms)) foreach ($cur_terms as $cur_term) echo ' ' . $cur_term->slug; ?>">
								<a href="<?php echo (get_field('image-url')) ? the_field('image-url') : the_post_thumbnail_url(); ?>" class="gallery-link popup">
									<img src="<?php echo (get_field('image-url')) ? the_field('image-url') : the_post_thumbnail_url(); ?>" alt="<?php echo the_title(); ?>" class="gallery-image">
								</a>
								<figcaption class="gallery-text">
									<span class="gallery-title"><?php echo the_title(); ?></span>
								</figcaption>
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