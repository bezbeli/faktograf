<?php

namespace Roots\Sage\Editor;

// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2( $buttons ) {
  array_unshift( $buttons, 'styleselect' );
  return $buttons;
}
// Register our callback to the appropriate filter
add_filter('mce_buttons_2', __NAMESPACE__ . '\\my_mce_buttons_2');


// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {  
  // Define the style_formats array
  $style_formats = array(  
    // Each array child is a format with it's own settings
    array(  
      'title' => 'Lead',  
      'block' => 'span',  
      'classes' => 'lead',
      'wrapper' => true,
    ),  
    array(  
      'title' => 'Citat',  
      'block' => 'span',  
      'classes' => 'pullquote',
      'wrapper' => true,
    ),  
    // array(  
    //   'title' => 'Pullquote right',  
    //   'block' => 'span',  
    //   'classes' => 'pullquote-right',
    //   'wrapper' => true,
    // ),  
    // array(  
    //   'title' => 'Pullquote left',
    //   'block' => 'span',
    //   'classes' => 'pullquote-left',
    //   'wrapper' => true,
    // ),  
  );  
  // Insert the array, JSON ENCODED, into 'style_formats'
  $init_array['style_formats'] = json_encode( $style_formats );  
  
  return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', __NAMESPACE__ . '\\my_mce_before_init_insert_formats' );