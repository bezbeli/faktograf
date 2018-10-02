<?php
namespace Roots\Sage\PostContent;

function after_content($content)
{
    if (is_single() && (get_post_type() == 'post')) {
        $content .= '<p class="alert alert-info small">Imate prijedloge, pohvale ili kritike? Uočili ste neku izjavu za koju vjerujete da bi je Faktograf trebao obraditi? Želite nas upozoriti na neodgovorno ponašanje političara? Pišite nam na <a href="mailto:info@faktograf.hr">info@faktograf.hr</a> ili nas kontaktirajte putem <a target="_blank" href="https://twitter.com/FaktografHR">Twittera</a> ili <a target="_blank" href="https://www.facebook.com/faktografhr/">Facebooka</a>.</p>';
    }
    return $content;
}
add_filter('the_content', __NAMESPACE__.'\\after_content');
//<h5><strong><em>Imate prijedloge, pohvale ili kritike? Uočili ste neku izjavu za koju vjerujete da bi je Faktograf trebao obraditi? Želite nas upozoriti na neodgovorno ponašanje političara? Pišite nam na info@faktograf.hr ili nas kontaktirajte putem <a href="https://twitter.com/FaktografHR">Twittera</a> ili <a href="https://www.facebook.com/faktografhr/">Facebooka</a>. </em></strong></h5>
