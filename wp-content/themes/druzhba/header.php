<header class="header">
    <?php the_custom_logo(); ?>
    <?php
        wp_nav_menu([
            'menu'            => 'navigation',
            'container'       => 'nav',
            'container_class' => 'header-nav',
            'items_wrap'      => '%3$s',
            'walker'          => new Custom_Walker_Nav_Menu
        ]);

        wp_reset_postdata();
    ?>
</header>