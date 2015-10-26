<?php

    echo '<ul class="list-unstyled">';
    $posts_source = get_sub_field("posts_source");
    $pick_from_category = get_sub_field("pick_from_category");
    $show_posts = get_sub_field("show_posts");

    if ($posts_source == 'pick_from_category') {
        $args = array(
            'posts_per_page' => $show_posts,
            'tax_query' => array(
                array(
                    'taxonomy'         => 'category',
                    'field'            => 'id',
                    'terms'            => $pick_from_category
                ),
            ),
        );
    } else if ($posts_source == 'custom_post_picker') {
        $ids = get_sub_field('posts', false, false);
        $args = array(
            'post__in'      => $ids,
            'orderby'         => 'post__in'
        );
    }

    $query = new WP_Query( $args );
           if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();
                    echo '<li class="clearfix space-bottom-sm">';
                        if (get_sub_field("show_thumbnail")) {
                            echo '<a href="' . get_permalink() . '">';
                            echo '<span class="' . get_sub_field('thumbnail_class') . ' no-pad">';
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('thumbnail', array( 'class' => 'img-responsive' ));
                            } else {
                                echo '<img class="img-responsive" src="' . get_template_directory_uri() . '/dist/images/noimage.png">';
                            }
                            echo '</span>';
                            echo '</a>';
                        }
                    echo '<span class="' . get_sub_field('teaser_class') . '">';
                    echo '<a href="' . get_permalink() . '">';
                    echo get_the_title();
                    echo '</a>';
                    echo '</span>';
                    echo '</li>';
                }
            };
            echo '</ul>';
            wp_reset_query();
?>