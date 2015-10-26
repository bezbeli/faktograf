<?php

namespace Roots\Sage\Videos;

add_filter( 'embed_oembed_html', __NAMESPACE__ . '\\custom_oembed_filter', 10, 4 ) ;

function custom_oembed_filter($html, $url, $attr, $post_ID) {
    $return = '<div class="embed-responsive embed-responsive-4by3">'.$html.'</div>';
    return $return;
}