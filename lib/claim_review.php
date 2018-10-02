<?php
namespace Roots\Sage\ClaimRewiew;

function getClaimReview($post_id)
{
    if ((get_post_type() == 'post') && in_category('obecanja')) {
        $ratingField = get_field_object('obecanja');
        $ratingValue = get_field('obecanja');
        $ratingLabel = $ratingField['choices'][ $ratingValue ];

        $datePublished = get_field('datum_objave') ?: date('Y-m-d');
        $authorType = get_field('tip_izvora') ?: 'Organization';
        $authorName = get_field('naziv_izvora') ?: 'Nema imena';
        $sameAs = get_field('poveznica_izvora') ?: '#';

        $claim_reviewed = [
            '@context'      => 'http://schema.org',
            '@type'         => 'ClaimReview',
            'datePublished' => date('Y-m-d'),
            'url'           => get_permalink(),
            'itemReviewed'  => [
                '@type'  => 'CreativeWork',
                'author' => [
                    'type'   => $authorType,
                    'name'   => $authorName,
                    'sameAs' => $sameAs,
                ],
                'datePublished' => $datePublished,
            ],
            'claimReviewed' => get_the_title(),
            'author'        => [
                '@type' => 'Organization',
                'name'  => 'Faktograf.hr',
            ],
            'reviewRating' => [
                '@type'         => 'Rating',
                'ratingValue'   => $ratingValue,
                'bestRating'    => '4',
                'worstRating'   => '1',
                'alternateName' => $ratingLabel,
            ],
        ];

        return "\n".'<script charset=utf8 type="application/ld+json">'."\n".wp_json_encode($claim_reviewed, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)."\n".'</script>'."\n\n";
    }

    return '';
}

function hook_schema_jsonld()
{
    global $post;
    if (!$post) {
        return;
    }
    echo getClaimReview($post->ID);
}

add_action('wp_head', __NAMESPACE__.'\\hook_schema_jsonld');
