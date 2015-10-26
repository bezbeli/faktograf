<?php

namespace Roots\Sage\ImageUtils;

// REMOVE WIDTH ATRIBUTE FROM IMAGES AND CAPTIONS AND ADD IMG-RESPONSIVE CLASS

function remove_thumbnail_dimensions($html) {
    if (preg_match_all('/<img[^>]+>/ims', $html, $matches)) {
        if (!is_attachment()){
        foreach ($matches as $match) {
            $clean = preg_replace('/\s?size-\w*\s?|wp-image-\d*\s?|\s?(width|height)="\d+"\s?/ims', "", $match);
            $html = str_replace($match, $clean, $html);
            if (strpos($html,'img-responsive') == false) {
              $html = str_replace('class="', 'class="img-responsive ', $html);
            }
        }
        }
    }
    return $html;
}
add_filter( 'the_content', __NAMESPACE__ . '\\remove_thumbnail_dimensions' );


/**
 * Add class="thumbnail img-thumbnail" to attachment items
 */
function attachment_link_class($html) {
  $html = str_replace('<a', '<a class="thumbnail img-thumbnail"', $html);
  return $html;
}
add_filter('wp_get_attachment_link', __NAMESPACE__ . '\\attachment_link_class', 10, 1);

add_filter( 'post_thumbnail_html', __NAMESPACE__ . '\\remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', __NAMESPACE__ . '\\remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/\s?size-\w*\s?|wp-image-\d*\s?|\s?(width|height)="\d+"/ims', "", $html );
   $html = str_replace('class="', 'class="img-responsive ', $html);
   return $html;
}



add_filter( 'img_caption_shortcode', __NAMESPACE__ . '\\cleaner_caption', 10, 3 );

function cleaner_caption( $output, $attr, $content ) {

  /* We're not worried about captions in feeds, so just return the output here. */
  if ( is_feed() )
    return $output;

  /* Set up the default arguments. */
  $defaults = array(
    'id' => '',
    'align' => 'alignnone',
    'width' => '123',
    'caption' => ''
  );

  /* Merge the defaults with user input. */
  $attr = shortcode_atts( $defaults, $attr );

  /* If the width is less than 1 or there is no caption, return the content wrapped between the [caption]< tags. */
  if ( 1 > $attr['width'] || empty( $attr['caption'] ) )
    return $content;

  /* Set up the attributes for the caption <div>. */
  $attributes = ( !empty( $attr['id'] ) ? ' id="' . esc_attr( $attr['id'] ) . '"' : '' );
  $attributes .= ' class="wp-caption ' . esc_attr( $attr['align'] ) . '"';
  // $attributes .= ' style="width: ' . esc_attr( $attr['width'] ) . 'px"';

  /* Open the caption <div>. */
  $output = '<figure' . $attributes .'>';

  /* Allow shortcodes for the content the caption was created for. */
  $output .= do_shortcode( $content );

  /* Append the caption text. */
  $output .= '<figcaption class="wp-caption-text">' . $attr['caption'] . '</figcaption>';

  /* Close the caption </div>. */
  $output .= '</figure>';

  /* Return the formatted, clean caption. */
  return $output;
}


// REMOVE LINKS FROM ALL IMAGES INSIDE CONTENT

update_option('image_default_link_type','none');

function bzb_attachment_image_link_void( $content ) {
    $content =
        preg_replace(array('{<a[^>]*><img}','{/></a>}'), array('<img','/>'), $content);
    return $content;
}

add_filter( 'the_content', __NAMESPACE__ . '\\bzb_attachment_image_link_void' );