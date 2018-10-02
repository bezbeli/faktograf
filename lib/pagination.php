<?php

namespace Roots\Sage\Pagination;

function get_pagination($range = 2, $class = "pagination")
{
    // $paged - number of the current page
    
    global $paged, $wp_query;
    // var_export($query->max_num_pages);
    // var_export($paged);
    
    // How much pages do we have?
    $max_page = $wp_query->max_num_pages;

    // var_export($max_page);

    // We need the pagination only if there are more than 1 page
    if ($max_page > 1) {
        if (!$paged) {
            $paged = 1;
        }
        echo '<ul class="' .$class. ' ' . $class . '-lg">';

        // To the previous page
        if (get_previous_posts_link()) {
            echo '<li>';
            previous_posts_link(' « ');
            echo '</li>';
        } else {
            echo '<li class="disabled"><a href="#">«</a></li>';
        }

        // We need the sliding effect only if there are more pages than is the sliding range
        if ($max_page > $range) {
            // When closer to the beginning
            if ($paged < $range) {
                for ($i = 1; $i <= ($range + 1); $i++) {
                    echo "<li";
                    if ($i == $paged) {
                        echo " class='active'";
                    }
                    echo "><a href='" . get_pagenum_link($i) ."'";
                    echo ">$i</a></li>";
                }
            }

            // When closer to the end
            elseif ($paged >= ($max_page - ceil(($range / 2)))) {
                for ($i = $max_page - $range; $i <= $max_page; $i++) {
                    echo "<li";
                    if ($i == $paged) {
                        echo " class='active'";
                    }
                    echo "><a href='" . get_pagenum_link($i) ."'";
                    echo ">$i</a></li>";
                }
            }

            // Somewhere in the middle
            elseif ($paged >= $range && $paged < ($max_page - ceil(($range / 2)))) {
                for ($i = ($paged - ceil($range / 2)); $i <= ($paged + ceil(($range / 2))); $i++) {
                    echo "<li";
                    if ($i == $paged) {
                        echo " class='active'";
                    }
                    echo "><a href='" . get_pagenum_link($i) ."'";
                    echo ">$i</a></li>";
                }
            }
        }

        // Less pages than the range, no sliding effect needed
        else {
            for ($i = 1; $i <= $max_page; $i++) {
                echo "<li";
                if ($i == $paged) {
                    echo " class='active'";
                }
                echo"><a href='" . get_pagenum_link($i) ."'";
                echo ">$i</a></li>";
            }
        }

        // Next page
        if (get_next_posts_link()) {
            echo '<li>';
            next_posts_link('»');
            echo '</li>';
        } else {
            echo '<li class="disabled"><a href="#">»</a></li>';
        }

        echo '</ul>';
    }
}

add_filter('next_posts_link_attributes', __NAMESPACE__ . '\\next_posts_link_attributes');
add_filter('previous_posts_link_attributes', __NAMESPACE__ . '\\previous_posts_link_attributes');

function next_posts_link_attributes()
{
    return 'class="next-posts"';
}
function previous_posts_link_attributes()
{
    return 'class="previous-posts"';
}
