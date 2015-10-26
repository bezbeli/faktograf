<?php

echo '<div class="row">';

$pick_from_category = get_sub_field("pick_from_category");
$show_posts = get_sub_field("show_posts");
$offset_posts = get_sub_field("offset_posts");

if ($pick_from_category) {
    $args = array(
        'posts_per_page'            => $show_posts,
        'offset'                    => $offset_posts,
        'tax_query' => array(
            array(
                'taxonomy'          => 'category',
                'field'             => 'id',
                'terms'             => $pick_from_category
            ),
        ),
    );
} else if (get_sub_field("posts")) {
    $ids = get_sub_field('posts', false, false);
    $args = array(
        'post__in'      => $ids
    );
} else if (get_sub_field("parent_page")) {
    $ids = get_sub_field('parent_page', false, false);
    // var_export($ids);
    // echo 'Djeca postovi';
    $args = array(
        'post_parent'       => $ids,
        'post_type'         => 'page',
        'orderby'           => 'menu_order',
        'order'             => 'ASC'
    );
}

$query = new WP_Query( $args );
if ( $query->have_posts() ) {
     while ( $query->have_posts() ) {
         $query->the_post();
             $grid = get_sub_field("grid");
                 switch($grid) {
                   case '1column':
                     echo '<div class="col-sm-12">';
                     break;
                   case '2columns':
                     echo '<div class="col-sm-6">';
                     break;
                   case '3columns':
                     echo '<div class="col-sm-4">';
                     break;
                   case '4columns':
                     echo '<div class="col-sm-3">';
                     break;
                   case '6columns':
                     echo '<div class="col-sm-2">';
                     break;
                   default:
                     echo '<div class="col-sm-3">';
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
                         echo Roots\Sage\Titles\custom_get_post_categories(get_the_id(),'name', array('Izdvojeno'));
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
wp_reset_query();
?>