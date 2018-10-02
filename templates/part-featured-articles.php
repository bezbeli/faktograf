<?php
$categories_slug = Roots\Sage\Titles\custom_get_post_categories(get_the_id(), 'slug', ['izdvojeno' , 'nekategorizirano']);
$categories_name = Roots\Sage\Titles\custom_get_post_categories(get_the_id(), 'name', ['Izdvojeno' , 'Nekategorizirano']);
$categories = $categories_slug ? implode(' ', $categories_slug) : '';
$categories_names = $categories_name ? implode(', ', $categories_name) : '';
$related_articles_title = '<h4 class="block-title-single">Više iz kategorije "' . $categories_names . '"</h4>';

$args = [
  'posts_per_page' => '2',
  'post__not_in'   => [get_the_id()],
  'tax_query'      => [
    [
      'taxonomy' => 'category',
      'field'    => 'slug',
      'terms'    => $categories_slug,
      ],
    ],
  ];

$custom_query = new WP_Query($args);
     if ($custom_query->have_posts()) {
         echo $related_articles_title;
         while ($custom_query->have_posts()) {
             $custom_query->the_post();
             echo '<div class="col-sm-6">';
             echo '<div class="block-wrapper">';

             get_template_part('templates/part-ocjena');

             echo '<h4 class="absolute-bottom-left">';
             if (get_sub_field('show_categories_in_post_title') == true) {
                 echo '<span class="text-uppercase post-categories">';
                 echo $related_articles_title;
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
                 the_post_thumbnail('featured-image', [ 'class' => 'img-responsive' ]);
             } else {
                 echo '<img class="img-responsive" src="' . get_template_directory_uri() . '/dist/images/noimage.png">';
             }
             echo '  </div>';
             echo '</div>';
         }
     }
wp_reset_query();
