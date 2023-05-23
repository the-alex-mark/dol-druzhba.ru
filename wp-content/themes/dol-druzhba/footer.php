<!-- VK Widget -->
<div id="vk_community_messages"></div>
<script type="text/javascript"> VK.Widgets.CommunityMessages("vk_community_messages", 94887891, {tooltipButtonText: "Есть вопрос?"}); </script>

<footer class="footer">
	<div class="container">
		<nav class="footer-nav">
			<span class="footer-title">Навигация</span>
			
			<?php
				wp_nav_menu([
					'menu'            => 'Навигация',
					'container'       => NULL,
					'items_wrap'      => '%3$s',
					'walker'          => new Custom_Walker_Nav_Menu
				]);

				wp_reset_postdata();
			?>
		</nav>

		<?php
			$social = [
				[ 'name' => 'ВКонтакте', 'link' => get_field('social-vk', CONTACTS_ID), ],
				[ 'name' => 'Facebook', 'link' => get_field('social-facebook', CONTACTS_ID) ],
				[ 'name' => 'Instagram', 'link' => get_field('social-instagram', CONTACTS_ID) ]
			];

			if ($social):
		?>
		<div class="footer-social">
			<span class="footer-title">Социальные сети</span>

			<?php foreach ($social as $i): if (!$i['link']) continue; ?>
				<a href="<?php echo $i['link']; ?>" target="_bank" class="footer__social-item"><?php echo $i['name']; ?></a>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>

		<div class="footer-contacts">
			<a href="tel:<?php the_field('camp-phone_one', CONTACTS_ID); ?>" class="footer__contacts-phone"><?php the_field('camp-phone_one', CONTACTS_ID); ?></a>
			<a href="tel:<?php the_field('camp-phone_two', CONTACTS_ID); ?>" class="footer__contacts-phone"><?php the_field('camp-phone_two', CONTACTS_ID); ?></a>
			<a href="<?php the_field('camp-map', CONTACTS_ID); ?>" target="_blank" class="footer__contacts-address"><?php the_field('camp-address_one', CONTACTS_ID); ?></a>
		</div>

		<span class="footer-copyright">
			<?php echo str_replace("%year%", date('Y'), get_field("camp-copyright", CONTACTS_ID)); ?>
		</span>
	</div>
</footer>