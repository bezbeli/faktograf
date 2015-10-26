<?php

if(get_sub_field("parent_page")){

    $presentation_type = get_sub_field("presentation_type");
    switch ($presentation_type) {
        case 'grid':
            // echo 'GRID';
            get_template_part('templates/builder-elements/post-picker-module-elements/grid-presentation-type' );
            break;
        
        case 'slider':
            // echo 'SLIDER';
            get_template_part('templates/builder-elements/post-picker-module-elements/slider-presentation-type' );
            break;

        case 'list':
            // echo 'SLIDER';
            get_template_part('templates/builder-elements/post-picker-module-elements/list-presentation-type' );
            break;

        case 'masonry':
            // echo 'MASONRY';
            get_template_part('templates/builder-elements/post-picker-module-elements/masonry-presentation-type' );
            break;

      default:
        echo 'Choose option for gallery in admin area please';
            break;
    }
    };



?>
 