<?php

namespace Roots\Sage\Taxonomies;

// Register Custom Taxonomy
function custom_taxonomies() {


// AKTERI TAXONOMY

  $labels = array(
    'name'                       => _x( 'Profili (tag)', 'Taxonomy General Name', 'faktograf' ),
    'singular_name'              => _x( 'Profil', 'Taxonomy Singular Name', 'faktograf' ),
    'menu_name'                  => __( 'Profili (tag)', 'faktograf' ),
    'all_items'                  => __( 'Svi profili', 'faktograf' ),
    'parent_item'                => __( 'Parent profil', 'faktograf' ),
    'parent_item_colon'          => __( 'Parent profil:', 'faktograf' ),
    'new_item_name'              => __( 'Novi profil', 'faktograf' ),
    'add_new_item'               => __( 'Dodaj profil (tag)', 'faktograf' ),
    'edit_item'                  => __( 'Uredi profil', 'faktograf' ),
    'update_item'                => __( 'Izmjeni profil', 'faktograf' ),
    'separate_items_with_commas' => __( 'Odvoji profile zarezom', 'faktograf' ),
    'search_items'               => __( 'Pretraži profile', 'faktograf' ),
    'add_or_remove_items'        => __( 'Dodaj ili oduzmi profile', 'faktograf' ),
    'choose_from_most_used'      => __( 'Izaberi iz najčešćih profila', 'faktograf' ),
    'not_found'                  => __( 'Nije pronađeno', 'faktograf' ),
  );
  $rewrite = array(
    'slug'                       => 'profili',
    'with_front'                 => true,
    'hierarchical'               => true,
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => false,
    'show_tagcloud'              => true,
    'rewrite'                    => $rewrite,
  );
  register_taxonomy( 'profili', array( 'post', 'profil' ), $args );


}

// Hook into the 'init' action
add_action( 'init', __NAMESPACE__ . '\\custom_taxonomies', 0 );