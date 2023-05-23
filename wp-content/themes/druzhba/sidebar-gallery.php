<aside class="sidebar">
    <nav class="sidebar-nav">
        <?php
            $terms = get_terms([
                'taxonomy' => 'albums',
                'hide_empty' => false,
                'order' => 'DESC'
                ]);
                
            foreach ($terms as $term): if ($term->slug != "years"):
        ?>
            <a href="<?php echo get_term_link($term); ?>" class="nav-item<?php echo ($wp_query->queried_object->slug == $term->slug) ? ' active' : ''; ?>"><?php echo $term->name; ?></a>
        <?php endif; endforeach; wp_reset_postdata(); ?>
    </nav>
</aside>