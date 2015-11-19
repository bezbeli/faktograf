<?php

namespace Roots\Sage\ACF;

add_filter('acf/settings/path', __NAMESPACE__ . '\\my_acf_settings_path');
 
function my_acf_settings_path( $path ) {
    // update path
    $path = get_stylesheet_directory() . '/lib/acf-pro/';
    // return
    return $path;
}
 

add_filter('acf/settings/dir', __NAMESPACE__ . '\\my_acf_settings_dir');
 
function my_acf_settings_dir( $dir ) {
    // update path
    $dir = get_stylesheet_directory_uri() . '/lib/acf-pro/';
    // return
    return $dir;
}
 

// $user = wp_get_current_user();
// if ( !in_array( 'muad_dib', (array) $user->roles ) ) {
//     add_filter('acf/settings/show_admin', '__return_false');
// }



include_once( get_stylesheet_directory() . '/lib/acf-pro/acf.php' );

// REGISTER ALL FIELDS WITH PHP FILE (FILE NEEDS TO BE UPDATED WITH LATEST FIELDS BEFORE)
// include_once( get_stylesheet_directory() . '/lib/acf-field-groups/all-fields.php' );

add_filter('acf/settings/save_json', __NAMESPACE__ . '\\my_acf_json_save_point');
function my_acf_json_save_point( $path ) {
    // update path
    $path = get_stylesheet_directory() . '/lib/acf-field-groups';
    // return
    return $path;
}


add_filter('acf/settings/load_json', __NAMESPACE__ . '\\my_acf_json_load_point');

function my_acf_json_load_point( $paths ) {
    unset($paths[0]);
    // append path
    $paths[] = get_stylesheet_directory() . '/lib/acf-field-groups';
    // return
    return $paths;
}

add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\\dodaj_admin_scripts');
function dodaj_admin_scripts() {
    // wp_enqueue_style('fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');
    wp_enqueue_style( 'acf_styles', get_template_directory_uri() . '/lib/acf-style.css');
    wp_enqueue_script( 'acf_script', get_template_directory_uri() . '/lib/acf-script.js');
}

function one_up_stop_acf_update_notifications( $value ) {

    // remove the plugin from the response so that it is not reported
    unset( $value->response[ trim( get_template_directory(), '/' ) .'/lib/acf-pro/acf.php' ] );
    return $value;
}
add_filter( 'site_transient_update_plugins', __NAMESPACE__ . '\\one_up_stop_acf_update_notifications', 11 );
