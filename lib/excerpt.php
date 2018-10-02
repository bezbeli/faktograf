<?php
namespace Roots\Sage\Excerpt;

// LIMIT NUMBER OF CHARACTERS IN EXCERPT

function limited($post_id, $count)
{
    // global $post;
    $excerpt = wp_trim_words(get_the_excerpt($post_id), $count, '... ');
    // $excerpt = substr($excerpt, 0, $count);
    return $excerpt;
}
