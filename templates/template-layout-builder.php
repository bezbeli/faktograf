<?php
/*
Template Name: Custom layout builder
*/

while (have_posts()) :
    the_post();

    if (get_field('show_title')) {
        get_template_part('templates/page', 'header');
    };

    if (get_field('block')) {
        if (get_field('show_sidebar')) {
            echo '<div class="col-xs-8 left-division">'; //LEFT DIVISION
            get_template_part('templates/builder-element-content');
            echo '</div>';
            echo '<div class="col-xs-4 page-sidebar">'; //SIDEBAR
            get_template_part('templates/builder-elements/sidebar');
            echo '</div>';
        } else {
            get_template_part('templates/builder-element-content');
        };
    };
endwhile;
