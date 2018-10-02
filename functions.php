<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',  // Scripts and stylesheets
  'lib/extras.php',  // Custom functions
  'lib/setup.php',   // Theme setup
  'lib/titles.php',  // Page titles
  'lib/wrapper.php',  // Theme wrapper class
  'lib/excerpt.php',
  'lib/gallery.php',
  'lib/image_utils.php',
  'lib/nav.php',
  'lib/pagination.php',
  'lib/slider.php',
  'lib/video.php',
  'lib/editor_styles.php',
  'lib/acf-pro.php',  // Theme wrapper class
  'lib/custom_post_types.php',
  'lib/custom_og_image.php',
  'lib/custom_taxonomies.php',
  'lib/after_content.php',
  'lib/claim_review.php',
];

foreach ($sage_includes as $file) {
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
    }

    require_once $filepath;
}
unset($file, $filepath);
