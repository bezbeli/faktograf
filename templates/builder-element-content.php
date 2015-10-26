<?php

// check if the repeater field has rows of data
if( have_rows('block') ){
        // loop through the rows of data
        while ( have_rows('block') ) {
            the_row();
            $number_of_columns = get_sub_field('columns');
            $block_width = get_sub_field('block_width');
            echo '<div class="' . $block_width . ' slade">';
                get_template_part('templates/builder-elements/block' );
            echo '</div>';
        }
} else {
    echo 'nema sadržaja';
};

?>