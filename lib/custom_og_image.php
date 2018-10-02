<?php

namespace Roots\Sage\Social;

use Roots\Sage\Assets;
use Roots\Sage\Excerpt;

function update_watermark($post_id)
{
    if (!get_the_post_thumbnail_url($post_id)) {
        update_post_meta($post_id, $key = 'og_image', null);
        return;
    }

    // If this is a revision, get real post ID
    if ($parent_id = wp_is_post_revision($post_id)) {
        $post_id = $parent_id;
    }

    $watermark = 'nije-ocijenjeno';

    if (get_post_type($post_id) == 'post') {
        $original_img = get_the_post_thumbnail_url($post_id);

        $ocjena = get_field('obecanja', $post_id);
        $tocnost = get_field('tocnost', $post_id);

        if ($ocjena) {
            switch ($ocjena) {
                case 1:
                    $watermark = 'zapoceto';
                    break;
                case 2:
                    $watermark = 'prekrseno';
                    break;
                case 3:
                    $watermark = 'djelomicno-ispunjeno';
                    break;
                case 4:
                    $watermark = 'ispunjeno';
                    break;
                default:
                    $watermark = 'nije-ocijenjeno';
                    break;
            }
        }

        if ($tocnost) {
            switch ($tocnost) {
                case 1:
                    $watermark = 'ni-f-od-fakta';
                    break;
                case 2:
                    $watermark = 'ni-pola-fakta';
                    break;
                case 3:
                    $watermark = 'polufakt';
                    break;
                case 4:
                    $watermark = 'tri-kvarta-fakta';
                    break;
                case 5:
                    $watermark = 'fakt';
                    break;
                default:
                    $watermark = 'nije-ocijenjeno';
                    break;
            }
        }

        $watermark_url = Assets\asset_path('images/'. $watermark . '.png');
        $destination = '/wp-content/uploads/sharing/fb/id-' . $post_id . '.jpg';
        $og_path = site_url() . $destination;

        $intervention_args = [
            // 'greyscale' => true,
            'fit' => [
                '1200',
                '630',
            ],
            'insert' => [
                $watermark_url,
                'bottom-right',
            ],
            // 'sharpen' => 5,
            'save' => '..' . $destination,
        ];

        $fb_image = wp_intervention($original_img, $intervention_args, ['cache' => false]);

        remove_action('save_post', __NAMESPACE__.'\\update_watermark');

        update_post_meta($post_id, $key = 'og_image', $og_path);

        add_action('save_post', __NAMESPACE__.'\\update_watermark');
    }
}

add_action('save_post', __NAMESPACE__.'\\update_watermark');

function modify_default_options($options)
{
    $options['cache'] = false;
    return $options;
}

add_filter('wpi_default_options', __NAMESPACE__.'\\modify_default_options');


// Change YOAST SEO image and size

// function change_image($image)
// {
//     $ocjena = get_field('obecanja', get_the_id());

//     if ($ocjena == 0) {
//         // if rating is "neocijenjeno", use default post thumbnail
//         $image = get_the_post_thumbnail_url(get_the_id(), 'og_image');
//     } else {
//         // otherwise use the rated one
//         $image = get_post_meta(get_the_id(), 'og_image', true);
//     }

//     return $image;
// }

// function og_image_size()
// {
//     return 'og_image';
// }

// function change_yoast_seo_og_meta()
// {
//     add_filter('wpseo_opengraph_image', __NAMESPACE__.'\\change_image');
//     add_filter('wpseo_opengraph_image_size', __NAMESPACE__.'\\og_image_size');
// }

// add_action('wpseo_opengraph', __NAMESPACE__.'\\change_yoast_seo_og_meta');

function custom_og()
{
    global $post;
    $default_image = Assets\asset_path('images/og_default.png');
    $og_image_url = get_post_meta($post->ID, 'og_image', true);
    $post_thumbnail_id = get_post_thumbnail_id($post->ID);
    $permalink = get_permalink($post->ID);
    $title = get_post_meta($post->ID, '_yoast_wpseo_opengraph-title', true) ?: get_the_title($post->ID);

    if (is_front_page()) {
        $description = get_bloginfo('description');
    } else {
        $description = htmlspecialchars(get_post_meta($post->ID, '_yoast_wpseo_metadesc', true)) ?: Excerpt\limited($post->ID, 20);
    }

    $app_id = '968922783216842';

    $tags = get_the_terms($post->id, 'post_tag');
    $created = get_the_date(DATE_W3C);
    $updated = get_the_modified_date(DATE_W3C);

    if ($og_image_url) {
        $image_url = $og_image_url;
        $image_width = 1200;
        $image_height = 630;
    } elseif ($post_thumbnail_id) {
        $image = wp_get_attachment_image_src($post_thumbnail_id, 'og_image');
        $image_url = $image[0];
        $image_width = $image[1];
        $image_height = $image[2];
    } else {
        $image_url = $default_image;
        $image_width = 512;
        $image_height = 512;
    }

    $ocjena = get_field('obecanja', $post->ID);

    $output = "\n";
    $output .= '<meta property="fb:app_id" content="' . $app_id . '" />' . "\n";
    $output .= is_front_page() ? '' : '<meta property="og:type" content="article" />' . "\n";
    $output .= '<meta property="og:site_name" content="Faktograf.hr" />' . "\n";
    $output .= '<meta property="og:locale" content="hr_HR" />' . "\n";
    $output .= '<meta property="og:description" content="' . $description . '" />' . "\n";
    if ($tags && !is_front_page()) {
        foreach ($tags as $tag) {
            $output .= '<meta property="article:tag" content="' . $tag->name . '" />' . "\n";
        }
    }
    $output .= is_front_page() ? '' : '<meta property="article:publisher" content="https://www.facebook.com/faktografhr" />' . "\n";
    $output .= is_front_page() ? '' : '<meta property="article:published_time" content="' . $created . '" />' . "\n";
    $output .= is_front_page() ? '' : '<meta property="article:modified_time" content="' . $updated . '" />' . "\n";
    $output .= is_front_page() ? '' : '<meta property="og:updated_time" content="' . $updated . '" />' . "\n";
    $output .= '<meta property="og:url" content="'. $permalink . '" />' . "\n";
    $output .= '<meta property="og:site_name" content="Faktograf.hr" />' . "\n";
    $output .= '<meta property="og:image" content="' . $image_url . '" />' . "\n";
    $output .= '<meta property="og:image:width" content="' . $image_width . '" />' . "\n";
    $output .= '<meta property="og:image:height" content="' . $image_height . '" />' . "\n\n";

    $output .= '<meta name="twitter:card" content="summary_large_image" />' . "\n";
    $output .= '<meta name="twitter:title" content="' . $title . '" />' . "\n";
    $output .= '<meta name="twitter:description" content="' . $description . '" />' . "\n";
    $output .= '<meta name="twitter:site" content="@FaktografHR" />' . "\n";
    $output .= '<meta name="twitter:image" content="' . $image_url . '" />' . "\n";
    $output .= '<meta name="twitter:creator" content="@FaktografHR" />' . "\n\n";

    echo $output;
}

add_action('wp_head', __NAMESPACE__.'\\custom_og', 2);
