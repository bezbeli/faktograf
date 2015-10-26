<?php
    $posts_source = get_sub_field("posts_source");
    $pick_from_category = get_sub_field("pick_from_category");
    $show_posts = get_sub_field("show_posts");
    $number_of_columns = get_sub_field("number_of_columns");

    if ($posts_source == 'pick_from_category') {
        $args = array(
            'posts_per_page' => $show_posts,
            'tax_query' => array(
                array(
                    'taxonomy'         => 'category',
                    'field'            => 'id',
                    'terms'            => $pick_from_category
                ),
            ),
        );
        // echo '<div class="col-md-12 space-bottom-sm">';
        // echo '<pre>';
        // var_export($pick_from_category);
        // echo '</pre>';
        // echo '</div>';
        echo '<div class="col-md-12 space-bottom-sm">';
        echo '<div class="btn-group filter-button-group">';

        echo '<button class="btn btn-sm btn-default show-all" data-filter="*">Svi postovi</button>';
        
        foreach ($pick_from_category as $category) {
            $term = get_term( $category, 'category' );
            echo '<button class="btn btn-sm btn-default" data-filter=".' . $term->slug . '">'. $term->name . '</button>';
        }
        echo '</div>';
        echo '</div>';
        echo '<div class="clearfix"></div>';
    } else if ($posts_source == 'custom_post_picker') {
        $ids = get_sub_field('posts', false, false);
        $args = array(
            'post__in'          => $ids,
            'orderby'           => 'post__in',
            'post_type'         => 'any'
        );
    }

    echo '<div class="masonry">';
    $query = new WP_Query( $args );
           if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();
                    $categories = Roots\Sage\Utils\get_post_categories_slugs(get_the_id(), 'slug');
                    switch (get_post_format()) {
                        case 'video':
                            $icon = '<span title="video" class="glyphicon glyphicon-film" aria-hidden="true"></span>';
                            break;
                        case 'audio':
                            $icon = '<span title="audio" class="glyphicon glyphicon-volume-up" aria-hidden="true"></span>';
                            break;
                        case 'gallery':
                            $icon = '<span title="foto galerija" class="glyphicon glyphicon-picture" aria-hidden="true"></span>';
                            break;
                        case '':
                            $icon = '<span title="foto galerija" class="glyphicon glyphicon-pencil" aria-hidden="true"></span>';
                            break;
                        
                        default:
                            $icon = '<span title="foto galerija" class="glyphicon glyphicon-user" aria-hidden="true"></span>';
                            break;
                    }
                    switch ($number_of_columns) {
                        case '2':
                            $columns = 'col-sm-6 col-md-6';
                            break;
                        
                        case '3':
                            $columns = 'col-sm-3 col-md-4';
                            break;
                        
                        case '4':
                            $columns = 'col-sm-6 col-md-3';
                            break;
                        
                        default:
                            $columns = 'col-sm-3 col-md-4';
                            break;
                    }
                    echo '<div class="item ' . $columns . ' ' . $categories . '">';
                    echo '<div class="well">';
                    echo '<span class="ribbon">' . $icon . '</span>';
                        if (get_sub_field("show_thumbnail")) {
                            echo '<span class="img-responsive">';
                            echo '<a href="' . get_permalink() . '">';
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('medium', array( 'class' => 'img-responsive' ));
                            } else {
                                echo '<img class="img-responsive" src="' . get_template_directory_uri() . '/dist/images/noimage.png">';
                            }
                            echo '</a>';
                            echo '</span>';
                        }
                    echo '<a href="' . get_permalink() . '">';
                    echo '<h4>' . get_the_title() . '</h4>';
                    // echo get_post_format();
                    echo '</a>';
                    echo '<small>';
                    echo get_template_part('templates/entry-meta');
                    echo '</small>';
                    echo '</div>';
                    echo '</div>';
                }
            };
            echo '</div>';
            wp_reset_query();
?>


<script>
    jQuery(document).ready(function($) {

      $('.show-all').addClass('active');

      $('.masonry').imagesLoaded( function(){
        $('.masonry').isotope({
          itemSelector : '.item'
        });

            // filter items on button click
            $('.filter-button-group').on( 'click', 'button', function() {
              var filterValue = $(this).attr('data-filter');
              // use filter function if value matches
              $('.masonry').isotope({ filter: filterValue });
            });

            $('.filter-button-group').each( function( i, buttonGroup ) {
              var $buttonGroup = $( buttonGroup );
              $buttonGroup.on( 'click', 'button', function() {
                $buttonGroup.find('.active').removeClass('active');
                $buttonGroup.find('.nesto').remove();
                $( this ).addClass('active');
                $( this ).prepend('<span class="nesto glyphicon glyphicon-eye-open" aria-hidden="true"></span> ');
              });
            });
            
      });
    });
</script>
