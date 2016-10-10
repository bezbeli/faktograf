<?php
/* Template Name: Promo box */
?>

<style>
.promo-box{
    width: 300px;
    height: 250px;
    overflow: hidden;
}
.promo-box .slider{
    width: 300px;
    background-color: #FFF;
}
.promo-box .header{
    display: block;
    height: 70px;
    width: 100%;
}
.promo-box .slider a.slide{
    height: 55px;
    margin-bottom: 0px;
    width: 300px;
    border-bottom: 1px solid #DDD;
    overflow: hidden;
    color: #666;
}
.promo-box .slider a.slide:hover{
    color: #F00;
}
.promo-box .slider .thumb{
    width: 100px;
    height: 55px;
    overflow: hidden;
    float: left;
}
.promo-box .slider .text{
    width: 180px;
    float: left;
    line-height: 1.4em;
    font-size: .8em;
    margin-left: 10px;
    height: 55px;
    display: block;
    padding-top: 2px;
}
.promo-box .vise{
    line-height: 1.1em;
    font-size: .8em;
    text-align: right;
}
</style>

<?php

$args = array(
    'post_type'         => 'post',
    'category_name'     => 'izdvojeno',
    'posts_per_page'    => '9'
    );

$wp_query = new WP_Query($args);
echo '<div class="promo-box">';
echo '<a class="header" href="http://faktograf.hr" target="_blank">';
echo '<img src="' . get_template_directory_uri() . '/dist/images/faktograf_logo.svg">';
echo '</a>';
echo '<div class="slider">';
while ($wp_query->have_posts()) :
    $wp_query->the_post();
    if (has_post_thumbnail()) :
        echo '<a target="_blank" href="' . get_permalink() . '" class="slide">';
            echo '<div class="thumb">';
            the_post_thumbnail('thumbnail');
            echo '</div>';
            echo '<div class="text">';
            the_title();
            echo '</div>';
        echo '</a>';
    endif;
endwhile; 
echo '</div>';
echo '<p class="vise">';
echo '<a target="_blank" href="http://faktograf.hr">';
echo 'Više na www.faktograf.hr';
echo '</a>';
echo '</p>';
echo '</div>';
?>

<script>
jQuery(document).ready(function($) {
        $(".slider").slick({
            dots: false,
            arrows: false,
            vertical: true,
            infinite: true,
            speed: 300,
            autoplay: false,
            autoplaySpeed: 5000,
            slidesToShow: 3,
            slidesToScroll: 1
        });
 });
</script>
