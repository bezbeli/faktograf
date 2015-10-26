<?php
	
function btp_slider_shortcode( $atts, $content = null ) {
	if ( $images = get_children(array(
		'post_parent' => get_the_ID(),
		'post_type' => 'attachment',
		'numberposts' => -1,
		'post_mime_type' => 'image',)))
	{

		echo '<script>' . "\n"
		. '$(window).load(function() {' . "\n"
		. '$("#shortcodeslider").flexslider({' . "\n"
		. 'pauseOnHover: "true",' . "\n"
		. 'slideshowSpeed: "5000",' . "\n"
		. 'animationSpeed: Modernizr.touch ? 400 : 1000' . "\n"
		. '  });' . "\n"
		. '});' . "\n"
		. '</script>' . "\n";
	
		echo "\n" . '<div id="shortcodeslider" class="flexslider">' . "\n";
		echo '<ul class="slides">' . "\n";
		foreach( $images as $image ) {
			$attachment_meta = get_post_meta($image->ID, "_myCheckBox", true);
			$attachmentimage = wp_get_attachment_image_src( $image->ID, 'medium' );
			if ($attachment_meta != "exclude_from_slider"){
			echo '<li><img src="' . $attachmentimage[0] . '" /></li>' . "\n";
			}
		}

	}
		echo '</ul>' . "\n";
		echo '</div>' . "\n";
}
/* Define shortcodes */

add_shortcode('slider', 'btp_slider_shortcode');


function bannerSlider($sliderID) {

$args = array(
 	'post_type'   => 'slider',
 	'post_status' => 'publish',
 	'p'=> $sliderID //'2093'
);

$slider_query = new WP_Query( $args );

if ( $slider_query->have_posts() ) :
	while ( $slider_query->have_posts() ) : $slider_query->the_post(); 
		if ( $images = get_children(array(
			'post_parent' => get_the_ID(),
			'post_type' => 'attachment',
			'numberposts' => -1,
			'post_mime_type' => 'image',)))
		{

		echo '<script>' . "\n"
		. '$(window).load(function() {' . "\n"
		. '$("#bannerslider").flexslider({' . "\n"
		. 'pauseOnHover: "true",' . "\n"
		. 'controlNav: false,' . "\n"
		. 'directionNav: false,' . "\n"
		. 'slideshowSpeed: "' . get_field('slideshowspeed') . '",' . "\n"
		. 'animationSpeed: Modernizr.touch ? 400 : 1000' . "\n"
		. '  });' . "\n"
		. '});' . "\n"
		. '</script>' . "\n";
	
		echo "\n" . '<div id="bannerslider" class="flexslider">' . "\n";
		echo '<ul class="slides">' . "\n";
		foreach( $images as $image ) {
			$attachment_meta = get_post_meta($image->ID, "_myCheckBox", true);
			$attachmentimage = wp_get_attachment_image_src( $image->ID, 'medium' );
			
			echo '<li>';
			echo '<a href="' . get_field("slider_link") . '" target="_blank">';
			echo '<img src="' . $attachmentimage[0] . '" />';
			echo '</a>';
			echo '</li>' . "\n";
			
		}

	}
		echo '</ul>' . "\n";
		echo '</div>' . "\n";

	endwhile;
 else:
 	echo 'no slider';
 
 endif;
}

?>
