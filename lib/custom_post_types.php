<?php

namespace Roots\Sage\Posttypes;

register_post_type('profil',
    array(  'label' => 'profil singular',
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-id-alt',
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array( 
            'slug' => 'profil'
            ),
        'query_var' => true,
        'supports' => array(
            'title',
            'editor',
            'comments',
            'thumbnail',
            ),
        'taxonomies' => array(
            'profili'
            ),
        'labels' => array (
            'name' => 'Profili',
            'singular_name' => 'profil',
            'menu_name' => 'Profili',
            'add_new' => 'Dodaj profil',
            'add_new_item' => 'Dodaj novi profil',
            'edit' => 'Uredi',
            'edit_item' => 'Uredi profil',
            'new_item' => 'Novi profili',
            'view' => 'Pogledaj profil',
            'view_item' => 'Pogledaj profil',
            'search_items' => 'Pretraži profile',
            'not_found' => 'Nema pronađenih profila',
            'not_found_in_trash' => 'Nema profila u kanti za smeće',
            'parent' => 'Parent profila'
            )
        )
    );
