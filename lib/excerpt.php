<?php
namespace Roots\Sage\Excerpt;


// LIMIT NUMBER OF CHARACTERS IN EXCERPT

function excerpt($count){
  $excerpt = get_the_excerpt();
  $excerpt = substr($excerpt, 0, $count);
  return $excerpt;
}