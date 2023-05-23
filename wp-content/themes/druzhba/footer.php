<!-- VK Widget -->
<div id="vk_community_messages"></div>
<script type="text/javascript"> VK.Widgets.CommunityMessages("vk_community_messages", 94887891, {tooltipButtonText: "Есть вопрос?"}); </script>

<footer class="footer">
	<div class="container">
		<nav class="footer-nav">
			<span class="footer-title">Навигация</span>
			
			<?php
				wp_nav_menu([
					'menu'            => 'navigation',
					'container'       => NULL,
					'items_wrap'      => '%3$s',
					'walker'          => new Custom_Walker_Nav_Menu
				]);

				wp_reset_postdata();
			?>
		</nav>

		<div class="footer-social">
			<?php if (get_field('vk', 16) || get_field('facebook', 16) || get_field('instagram', 16)): ?>
				<span class="footer-title">Социальные сети</span>
			<?php endif; ?>
			
			<!-- ВКонтакте -->
			<?php if (get_field('vk', 16)): ?>
				<a href="<?php the_field("vk", 16); ?>" target="_bank" class="footer__social-item">ВКонтакте</a>
			<?php endif; ?>

			<!-- Facebook -->
			<?php if (get_field('facebook', 16)): ?>
				<a href="<?php the_field("facebook", 16); ?>" target="_bank" class="footer__social-item">Facebook</a>
			<?php endif; ?>

			<!-- Instagram -->
			<?php if (get_field('instagram', 16)): ?>
				<a href="<?php the_field("instagram", 16); ?>" target="_bank" class="footer__social-item">Instagram</a>
			<?php endif; ?>
		</div>

		<div class="footer-contacts">
			<a href="tel:<?php the_field('phone-one', 16); ?>" class="footer__contacts-phone"><?php the_field('phone-one', 16); ?></a>
			<a href="tel:<?php the_field('phone-two', 16); ?>" class="footer__contacts-phone"><?php the_field('phone-two', 16); ?></a>
			<a href="<?php the_field('map', 16); ?>" target="_blank" class="footer__contacts-address"><?php the_field('address-camp', 16); ?></a>
		</div>

		<span class="footer-copyright">
			<?php echo str_replace("%year%", date('Y'), get_field("copyright", 16)); ?>
		</span>
	</div>
</footer>