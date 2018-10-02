<?php
/*
Template Name: Obećanja
*/

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = [
    'paged'          => $paged,
    'post_status'    => 'publish',
    'post_type'      => 'post',
    'cat'            => '236', // obećanja ID
    'posts_per_page' => '6',
];
$wp_query = new wp_query($args);

echo '<h1 class="text-center">Obećanja</h1>';

get_template_part('templates/part-graf');

while (have_posts()) :
    the_post();
    get_template_part('templates/teaser');
endwhile;

echo '<div class="row">';
echo '<div class="col-md-12 text-center">';
    Roots\Sage\Pagination\get_pagination(2, 'paginator');
echo '</div>';
echo '</div>';
