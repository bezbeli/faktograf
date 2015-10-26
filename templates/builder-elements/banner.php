<?php
echo '<div class="banner-element">';
    $link_type = get_sub_field("link_type");
        switch($link_type) {
          case 'internal':
            $link = get_permalink(get_sub_field('banner_link_internal'));
            break;
          case 'external':
            $link = get_sub_field('banner_link_external');
            break;
        }
        $banner_image = get_sub_field("banner_image");
        $banner_image_url = $banner_image[url];
        // echo '<pre>';
        // var_export($banner_image);
        // echo '</pre>';
        $output = '<a href="' . $link . '"><img class="img-responsive " src="' . $banner_image_url . '" /></a>';
        echo $output;
echo '</div>';
?>