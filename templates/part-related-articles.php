<?php
$related_article = get_field('related_article');
if ($related_article) {
  echo '<div class="panel panel-default povezano">';
  echo '<div class="panel-heading"><h3 class="panel-title">Povezano</h3></div>';
  echo '<div class="panel-body">';
  $args = array(
    'post__in' => $related_article,
    );
  $new_query = new WP_Query($args);
     if ( $new_query->have_posts() ) {
          while ( $new_query->have_posts() ) {
              $new_query->the_post();
              echo '<div class="col-xs-12">';
              if (has_post_thumbnail()) {
              echo '<div class="col-sm-4">';
                the_post_thumbnail('featured-image');
              echo '</div>';
              }
              echo '<div class="col-sm-8">';
              echo '<div class="breathe">';
              echo '<p><strong>';
              echo '<a href="' . get_permalink() . '">';
              echo get_the_title();
              echo '</a>';
              echo '</strong></p>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
            }
          }
          echo '</div>';
          echo '</div>';
        }
        wp_reset_query();
?>