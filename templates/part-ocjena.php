<?php

$ratingField = get_field_object('obecanja');
$ratingValue = get_field('obecanja');
$ratingLabel = $ratingField['choices'][ $ratingValue ];

$factRatingField = get_field_object('tocnost');
$factRatingValue = get_field('tocnost');
$factRatingLabel = $factRatingField['choices'][ $factRatingValue ];

if ($ratingLabel && $ratingValue != 0) {
    echo '<div class="lenta ' . sanitize_title($ratingLabel) . '">';
    echo '<span>'. $ratingLabel . '</span>';
    echo '</div>';
}

if ($factRatingLabel && $factRatingValue != 0) {
    echo '<div class="absolute-top-right ocjena ' . sanitize_title($factRatingLabel) . '">';
    echo '<div class="ico">';
    echo '<img src="' . get_template_directory_uri() . '/dist/images/ico/' . sanitize_title($factRatingLabel) . '.png" class="img-responsive">';
    echo '</div>';
    echo  $factRatingLabel;
    echo '</div>';
}
