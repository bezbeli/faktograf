<?php 
$row_layout = get_row_layout();

switch ($row_layout) {
    case 'banner':
        get_template_part('templates/builder-elements/banner' );
        break;
    case 'text':
        echo '<div class="clearfix">';
        echo get_sub_field("text");
        echo '</div>';
        break;
    case 'image_gallery':
        get_template_part('templates/builder-elements/image-gallery' );
        break;
    case 'posts_picker':
        get_template_part('templates/builder-elements/post-picker-module' );
        break;
    case 'separator':
        get_template_part('templates/builder-elements/separator-module' );
        break;
}
?>