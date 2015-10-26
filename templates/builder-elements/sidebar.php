<div id="sidebar" class="col-xs-12 slade">
<?php
if (get_field('sidebar') == 'default') {
          get_template_part('templates/sidebar');
          echo 'default sidebar';
} elseif (get_field('sidebar') == 'custom'){
    while( has_sub_field("custom_sidebar") ):
        $row_layout = get_row_layout();
    switch ($row_layout) {
        case 'text':
            echo '<div>';
            the_sub_field("text");
            echo '</div>';
            break;

        case 'post_picker':
        $mode = get_sub_field('mode');
        // echo $mode;
        switch ($mode) {
            case 'custom_posts':
                    if(get_sub_field("picker")){
                        $posts = get_sub_field('picker');
                        if( $posts ){
                            if (get_sub_field('show_thumbnails') == 'true') {
                                if (get_sub_field('title')) {
                                    echo '<h4>';
                                    echo get_sub_field('title');
                                    echo '</h4>';
                                }
                                echo '<ul class="list-unstyled">';
                                foreach( $posts as $post):
                                    setup_postdata($post);
                                    echo '<li class="clearfix space-bottom-sm">';
                                    echo '<a href="' . get_permalink() . '">'
                                    . '<span class="col-xs-4 no-pad">';
                                    the_post_thumbnail('thumbnail', array( 'class' => 'img-responsive' ));
                                    echo '</span>'
                                    . '<span class="col-xs-8">'
                                    . get_the_title()
                                    . '</span>'
                                    . '</a>';
                                    echo '</li>';
                                endforeach;
                                echo '</ul>';
                            } else {
                                echo '<ul class="list-unordered">';
                                foreach( $posts as $post):
                                    setup_postdata($post);
                                    echo '<li>';
                                    echo '<a href="' . get_permalink() . '">'
                                    . get_the_title()
                                    . '</a>';
                                    echo '</li>';
                                endforeach;
                                echo '</ul>';
                            }
                            wp_reset_postdata();
                        };
                    };
                break;

            case 'parent_page':
                $parent_page = get_sub_field("parent_page");
                // echo $parent_page;
                $args = array(
                    'post_type' => 'page',
                    'post_parent' => $parent_page
                    );
                $posts = get_posts( $args );
                        if( $posts ){
                            if (get_sub_field('title')) {
                                echo '<h4>';
                                echo get_sub_field('title');
                                echo '</h4>';
                            }
                            if (get_sub_field('show_thumbnails') == 'true') {
                                echo '<ul class="list-unstyled">';
                                foreach( $posts as $post):
                                    echo '<li class="clearfix space-bottom-sm">';
                                    echo '<a href="' . get_permalink() . '">'
                                    . '<span class="col-xs-4 no-pad">';
                                    the_post_thumbnail('thumbnail', array( 'class' => 'img-responsive' ));
                                    echo '</span>'
                                    . '<span class="col-xs-8">'
                                    . get_the_title()
                                    . '</span>'
                                    . '</a>';
                                    echo '</li>';
                                endforeach;
                                echo '</ul>';
                            } else {
                                echo '<ul class="list-unordered">';
                                foreach( $posts as $post):
                                    echo '<li>';
                                    echo '<a href="' . get_permalink() . '">'
                                    . get_the_title()
                                    . '</a>';
                                    echo '</li>';
                                endforeach;
                                echo '</ul>';
                            }
                            wp_reset_postdata();
                        };
                        break;
            case 'category':
                $categories = get_sub_field("post_category");
                $showposts = get_sub_field("number_of_posts");
                // var_export($categories);
                global $post;
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'category' => $categories,
                    'showposts' => $showposts
                    );
                $posts = get_posts( $args );
                        if( $posts ){
                            if (get_sub_field('title')) {
                                echo '<h4>';
                                echo get_sub_field('title');
                                echo '</h4>';
                            }
                            if (get_sub_field('show_thumbnails') == 'true') {
                                $loop = new WP_Query( $args );
                                echo '<ul class="list-unstyled">';
                                while ( $loop->have_posts() ) : $loop->the_post();
                                // foreach( $posts as $post):
                                    // setup_postdata($post);
                                    echo '<li class="clearfix space-bottom-sm">';
                                    echo '<a href="' . get_permalink() . '">'
                                    . '<span class="col-xs-4 no-pad">';
                                    if (has_post_thumbnail()) {
                                    the_post_thumbnail('thumbnail', array( 'class' => 'img-responsive' ));
                                    } else {
                                        echo '<img class="img-responsive" src="' . get_template_directory_uri() . '/dist/images/noimage.png' . '">';
                                    };
                                    echo '</span>'
                                    . '<span class="col-xs-8">'
                                    . get_the_title()
                                    . '</span>'
                                    . '</a>';
                                    echo '</li>';
                                // endforeach;
                                endwhile;
                                echo '</ul>';
                            } else {
                                echo '<ul class="list-unordered">';
                                foreach( $posts as $post):
                                    setup_postdata($post);
                                    echo '<li>';
                                    echo '<a href="' . get_permalink() . '">'
                                    . get_the_title()
                                    . '</a>';
                                    echo '</li>';
                                endforeach;
                                echo '</ul>';
                            }
                            wp_reset_postdata();
                        };
        }
        echo '<hr>';
            break; //mode
    }
    endwhile;
    };
?>
</div>