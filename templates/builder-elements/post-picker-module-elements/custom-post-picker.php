<?php

echo '<div>';

    if(get_sub_field("posts")){
            // echo 'ima postova';
            // echo 'custom picker posts ';
        $presentation_type = get_sub_field("presentation_type");
        switch($presentation_type) {
          case 'grid': // GRID POSTS LAYOUT
            // echo 'GRID LAYOUT';
            get_template_part('templates/builder-elements/post-picker-module-elements/grid-presentation-type' );
            break;

          case 'slider': // SLIDER POSTS LAYOUT
            get_template_part('templates/builder-elements/post-picker-module-elements/slider-presentation-type' );
            break;

          case 'list': // LIST POSTS LAYOUT
            get_template_part('templates/builder-elements/post-picker-module-elements/list-presentation-type' );
            break;

          case 'masonry': // MASONRY POSTS LAYOUT
            get_template_part('templates/builder-elements/post-picker-module-elements/masonry-presentation-type' );
            break;

          default:
            echo 'Choose option for gallery in admin area please';
            break;
        }
    };
echo '</div>';

?>