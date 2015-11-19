<?php

echo '<div class="row grid-block">';

$posts_source =         get_sub_field('posts_source');
$show_posts =           get_sub_field('show_posts');
$offset_posts =         get_sub_field('offset_posts');
$show_pagination =      get_sub_field('show_pagination');
$sticky =               get_option('sticky_posts');

// rsort( $sticky );
// $sticky = array_slice( $sticky, 0, 5 );

switch ($posts_source) {
    case 'pick_from_category':
        $pick_from_category = get_sub_field("pick_from_category");
        $display_count = $show_posts;
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $offset = ( $paged - 1 ) * $display_count+$offset_posts;
        $args = array(
            'posts_per_page'    => $show_posts,
            'paged'             => $paged,
            'offset'            => $offset,
            'tax_query' => array(
                array(
                    'taxonomy'  => 'category',
                    'field'     => 'id',
                    'terms'     => $pick_from_category
                ),
            ),
        );
        break;
    case 'custom_post_picker':
        $ids = get_sub_field('posts', false, false);
        $args = array(
            'post__not_in'      => $sticky,
            'post_type'         => 'any',
            'post__in'          => $ids,
            'orderby'           => 'post__in',
        );
        break;
    case 'parent_page':
        $ids = get_sub_field('parent_page', false, false);
        $args = array(
            'post_parent'       => $ids,
            'post_type'         => 'page',
            'orderby'           => 'menu_order',
            'order'             => 'ASC'
        );
        break;
    default:
        echo 'no post source selected';
        break;
}


$wp_query = new WP_Query( $args );
if ( $wp_query->have_posts() ) {
     while ( $wp_query->have_posts() ) {
         $wp_query->the_post();
             $grid = get_sub_field("grid");
                 switch($grid) {
                   case '1column':
                     echo '<div class="item col-sm-12">';
                     break;
                   case '2columns':
                     echo '<div class="item col-sm-6">';
                     break;
                   case '3columns':
                     echo '<div class="item col-sm-4">';
                     break;
                   case '4columns':
                     echo '<div class="item col-sm-3">';
                     break;
                   case '6columns':
                     echo '<div class="item col-sm-2">';
                     break;
                   default:
                     echo '<div class="item col-sm-3">';
                     break;
                 }
                 // $field = get_field_object('featured_symbol');
                 // echo $field['label'] . ': ' . $field['value'];
                     echo '<div class="block-wrapper">';

                     get_template_part('templates/part-ocjena');

                 if (get_sub_field("show_thumbnail")) {
                     echo '<h4 class="absolute-bottom-left">';
                     if (get_sub_field('show_categories_in_post_title') == true) {
                         echo '<span class="text-uppercase post-categories">';
                         // echo '<span class="glyphicon glyphicon-tag"></span>';
                         $categories_names = Roots\Sage\Titles\custom_get_post_categories(get_the_id(),'name', array('Izdvojeno'));
                         $categories = $categories_names ? implode(' ', $categories_names) : '';
                         echo $categories;
                         echo '</span><br>';
                     }
                     echo '<a class="pop" href="' . get_permalink() . '">';
                     echo get_the_title();
                     echo '</a>';
                     echo '</h4>';
                     echo '<a href="' . get_permalink() . '">';
                     echo '<span class="dimmer"></span>';
                     echo '</a>';
                     // if (get_sub_field("show_excerpt")) {
                     //     echo '<p>' . Roots\Sage\Excerpt\excerpt(get_sub_field("excerpt_length")) . '</p>';
                     // }
                     if (has_post_thumbnail()) {
                         the_post_thumbnail('featured-image', array( 'class' => 'img-responsive' ));
                     } else {
                         echo '<img class="img-responsive" src="' . get_template_directory_uri() . '/dist/images/noimage.png">';
                     }
                 }
                 echo '</div>';
                 echo '</div>';
     }
};
echo '</div>';
        if ($show_pagination) {
            echo '<div class="row">';
            echo '<div class="col-md-12 text-center">';
                    Roots\Sage\Pagination\get_pagination();
            echo '</div>';
            echo '</div>';
        }
wp_reset_query();
?>

