<aside class="sidebar">
    <?php
        wp_nav_menu([
            'menu'            => 'about',
            'container'       => 'nav',
            'container_class' => 'sidebar-nav',
            'items_wrap'      => '%3$s',
            'walker'          => new Custom_Walker_Nav_Menu
        ]);

        wp_reset_postdata();
    ?>

    <?php dynamic_sidebar('sidebar'); ?>
</aside>