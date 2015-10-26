<?php
            echo '<div>';

            if (get_sub_field("title")) {
            echo '<h2>' . get_sub_field("title")  . '</h2>';
            };

                if(get_sub_field("gallery")){
                $gallery_type = get_sub_field("gallery_type");
                switch($gallery_type) {
                  case 'grid': // GRID GALLERY LAYOUT
                    echo '<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
                    <div id="blueimp-gallery" class="blueimp-gallery" data-use-bootstrap-modal="false">
                        <!-- The container for the modal slides -->
                        <div class="slides"></div>
                        <!-- Controls for the borderless lightbox -->
                        <h3 class="title"></h3>
                        <a class="prev">‹</a>
                        <a class="next">›</a>
                        <a class="close">×</a>
                        <a class="play-pause"></a>
                        <ol class="indicator"></ol>
                        <!-- The modal dialog, which will be used to wrap the lightbox content -->
                        <div class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title"></h4>
                                    </div>
                                    <div class="modal-body next"></div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left prev">
                                            <i class="glyphicon glyphicon-chevron-left"></i>
                                            Previous
                                        </button>
                                        <button type="button" class="btn btn-primary next">
                                            Next
                                            <i class="glyphicon glyphicon-chevron-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                    $unique = rand();
                    echo '<div id="links-' . $unique . '" class="gallery gallery-' . $unique . '">';
                    foreach(get_sub_field("gallery") as $image):
                        $grid = get_sub_field("grid");
                            switch($grid) {
                              case '3columns':
                                echo '<div class="col-xs-4">';
                                break;
                              case '4columns':
                                echo '<div class="col-xs-3">';
                                break;
                              case '6columns':
                                echo '<div class="col-xs-2">';
                                break;
                              default:
                                echo '<div class="col-xs-3">';
                                break;
                            }
                        echo '<a href="' . $image['sizes']['large'] . '" data-gallery>';
                        echo '<img class="thumbnail img-thumbnail" src="' . $image['sizes']['thumbnail'] . '" />';
                        echo '</a>';
                        echo '</div>';
                    endforeach;
                    echo '</div>';
?>
                    <script>
                        jQuery(document).ready(function($) {
                            var galerija = <?php echo json_encode('links-' . $unique); ?>
                            
                            document.getElementById(galerija).onclick = function (event) {
                                event = event || window.event;
                                var target = event.target || event.srcElement,
                                    link = target.src ? target.parentNode : target,
                                    options = {index: link, event: event},
                                    links = this.getElementsByTagName('a');
                                blueimp.Gallery(links, options);
                            };
                        });
                    </script>
<?php
                    break;
                  case 'slider': //SLIDER GALLERY LAYOUT
                  $unique = rand();
                    echo '<div class="slider-' . $unique . '">';
                    foreach(get_sub_field("gallery") as $image):
                        echo '<div class="slider-element">';
                        echo '<img class="img-responsive" src="' . $image['sizes']['large'] . '" />';
                        echo '</div>';
                    endforeach;
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
                    }else{$slider_infinite = 'false';
                };
                    if (get_sub_field("speed")) {
                     $slider_autoplay_speed = get_sub_field("speed");
                };
                    if (get_sub_field("autoplay")) {
                     $slider_autoplay = 'true';
                    }else{$slider_autoplay = 'false';
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
                    . '      slidesToShow: 1,'."\n"
                    . '      slidesToScroll: 1,'."\n"
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

                    break;
                  default:
                    echo 'Choose option for gallery in admin area please';
                    break;
                }
                };
            echo '</div>';
 ?>