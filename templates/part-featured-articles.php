<?php
$categories = Roots\Sage\Titles\custom_get_post_categories(get_the_id(),'slug', array('izdvojeno'));
// var_export($categories);

$args = array(
  'posts_per_page' => '2',
  'post__not_in' => array(get_the_id()),
  'tax_query' => array(
    array(
      'taxonomy'          => 'category',
      'field'             => 'slug',
      'terms'             => $categories
      ),
    ),
  );

$custom_query = new WP_Query($args);
     if ( $custom_query->have_posts() ) {
          echo '<h4 class="block-title-single">Iz kategorije "' . Roots\Sage\Titles\custom_get_post_categories(get_the_id(),'name', array('Izdvojeno')) . '"</h4>';
          while ( $custom_query->have_posts() ) {
              $custom_query->the_post();
              echo '<div class="col-sm-6">';
              echo '<div class="block-wrapper">';

              get_template_part('templates/part-ocjena' );

              echo '<h4 class="absolute-bottom-left">';
              if (get_sub_field('show_categories_in_post_title') == true) {
                  echo '<span class="text-uppercase post-categories">';
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
echo '  </div>';
echo '</div>';
  }
}
wp_reset_query();
?>