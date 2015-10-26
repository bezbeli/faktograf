<?php       
    $pick_from_category = get_sub_field("pick_from_category");

    if ($pick_from_category) {
        $args = array(
            'tax_query' => array(
                array(
                    'taxonomy'         => 'category',
                    'field'            => 'id',
                    'terms'            => $pick_from_category
                ),
            ),
        );
    } else if (get_sub_field("posts")) {
        $ids = get_sub_field('posts', false, false);
        $args = array(
            'post__in'      => $ids
        );
    }

    $query = new WP_Query( $args );
           $unique = rand();
            echo '<div class="slider-' . $unique . '">';

            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                 $query->the_post();
                    echo '<div class="col-md-12 slider-element">';
                                echo '<div class="block-wrapper">';

                            $ocjena = get_field("tocnost");
                            if ($ocjena && $ocjena != 0) {
                                switch ($ocjena) {
                                    case '1': // Ni F od fakta
                                echo '<div class="absolute-top-right ocjena ocjena1">';
                                        echo '<div class="ico">';
                                        echo '<img src="' . get_template_directory_uri() . '/dist/images/ico/ico_1.png" class="img-responsive">';
                                        echo '</div>';
                                        echo 'Ni F od fakta';
                                echo '</div>';
                                        break;
                                    
                                    case '2': // Ni pola fakta
                                echo '<div class="absolute-top-right ocjena ocjena2">';
                                        echo '<div class="ico">';
                                        echo '<img src="' . get_template_directory_uri() . '/dist/images/ico/ico_2.png" class="img-responsive">';
                                        echo '</div>';
                                        echo 'Ni pola fakta';
                                echo '</div>';
                                        break;
                                    
                                    case '3': // Polufakt
                                echo '<div class="absolute-top-right ocjena ocjena3">';
                                        echo '<div class="ico">';
                                        echo '<img src="' . get_template_directory_uri() . '/dist/images/ico/ico_3.png" class="img-responsive">';
                                        echo '</div>';
                                        echo 'Polufakt';
                                echo '</div>';
                                        break;
                                    
                                    case '4': // Tri kvarta fakta
                                echo '<div class="absolute-top-right ocjena ocjena4">';
                                        echo '<div class="ico">';
                                        echo '<img src="' . get_template_directory_uri() . '/dist/images/ico/ico_4.png" class="img-responsive">';
                                        echo '</div>';
                                        echo 'Tri kvarta fakta';
                                echo '</div>';
                                        break;

                                    case '5': // Fakt
                                echo '<div class="absolute-top-right ocjena ocjena5">';
                                        echo '<div class="ico">';
                                        echo '<img src="' . get_template_directory_uri() . '/dist/images/ico/ico_5.png" class="img-responsive">';
                                        echo '</div>';
                                        echo 'Fakt';
                                echo '</div>';
                                        break;
                                    
                                    default:
                                        echo 'Nije ocijenjeno';
                                        break;
                                }
                            }


                        echo '<h4 class="absolute-top-left">';
                        echo '<a class="pop" href="' . get_permalink() . '">';
                        echo get_the_title();
                        echo '</a>';
                        echo '</h4>';
                        echo '<a href="' . get_permalink() . '">';
                        echo '<span class="dimmer"></span>';
                        echo '</a>';
                        // if (get_sub_field("show_excerpt")) {
                        //     echo '<p>' . Roots\Sage\Excerpt\excerpt(get_sub_field("excerpt_length")) . '</p>';
                        // }
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('featured-image', array( 'class' => 'img-responsive' ));
                        }else{
                            echo '<img class="img-responsive" src="' . get_template_directory_uri() . '/dist/images/noimage.png">';
                        }
                    echo '</div>';
                    echo '</div>';
                };
            } else {
                echo '<h2>nema postova</h2>';
            };

            echo '</div>';
        // SLIDER JS
        if (get_sub_field("dots")) {
            $slider_dots = 'true';   
        }else{
            $slider_dots = 'false';
        };
        if (get_sub_field("arrows")) {
            $slider_arrows = 'true';
        }else{
            $slider_arrows = 'false';
        };
        if (get_sub_field("infinite")) {
            $slider_infinite = 'true';
        }else{
            $slider_infinite = 'false';
        };
        if (get_sub_field("speed")) {
            $slider_autoplay_speed = get_sub_field("speed");
        };
        if (get_sub_field("slides_to_show")) {
            $slides_to_show = get_sub_field("slides_to_show");
        };
        if (get_sub_field("slides_to_scroll")) {
            $slides_to_scroll = get_sub_field("slides_to_scroll");
        };
        if (get_sub_field("autoplay")) {
            $slider_autoplay = 'true';
        }else{
            $slider_autoplay = 'false';
    };

        $slider_init = 
        '<script>'
        . 'jQuery(document).ready(function($) {'."\n"
        . '    $(".slider-'. $unique . '").slick({'."\n"
        . '      dots: ' . $slider_dots .','."\n"
        . '      arrows: ' . $slider_arrows .','."\n"
        . '      infinite: ' . $slider_infinite .','."\n"
        . '      speed: 300,'."\n"
        . '      autoplay: ' . $slider_autoplay .','."\n"
        . '      autoplaySpeed: ' . $slider_autoplay_speed .','."\n"
        . '      slidesToShow: ' . $slides_to_show .','."\n"
        . '      slidesToScroll: ' . $slides_to_scroll .','."\n"
        . '      responsive: ['."\n"
        . '        {'."\n"
        . '          breakpoint: 1024,'."\n"
        . '          settings: {'."\n"
        . '            slidesToShow: 1,'."\n"
        . '            slidesToScroll: 1,'."\n"
        . '            infinite: true,'."\n"
        . '            dots: false,'."\n"
        . '            arrows: true'."\n"
        . '          }'."\n"
        . '        },'."\n"
        . '        {'."\n"
        . '          breakpoint: 600,'."\n"
        . '          settings: {'."\n"
        . '            slidesToShow: 1,'."\n"
        . '            slidesToScroll: 1'."\n"
        . '          }'."\n"
        . '        },'."\n"
        . '        {'."\n"
        . '          breakpoint: 480,'."\n"
        . '          settings: {'."\n"
        . '            slidesToShow: 1,'."\n"
        . '            slidesToScroll: 1'."\n"
        . '          }'."\n"
        . '        }'."\n"
        . '      ]'."\n"
        . '      });'."\n"
        . '});                    '."\n"
        . '</script>';
        echo $slider_init;
        wp_reset_query();

?>