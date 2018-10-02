<?php while (have_posts()) :
    the_post(); ?>
<article <?php post_class(); ?>>
    <?php if (has_post_thumbnail()) :
    ?>
    <div class="featured-image">
        <?php get_template_part('templates/part-ocjena');
        the_post_thumbnail('featured-image', ['class' => 'img-responsive']);
        $thumbnail_id = get_post_thumbnail_id($post->ID);
        $thumbnail_image = get_posts(['p' => $thumbnail_id, 'post_type' => 'attachment']);
        if ($thumbnail_image && isset($thumbnail_image[0])) :
            echo '<span class="absolute-bottom-right caption">'.$thumbnail_image[0]->post_content.'</span>';
        endif; ?>
    </div>
    <?php
    endif; ?>
    <div class="article-content">

        <header>
            <h1 class="entry-title">
                <?php the_title(); ?>
            </h1>
            <?php get_template_part('templates/entry-meta'); ?>
        </header>

        <div class="entry-content">
            <?php the_content(); ?>
        </div>

        <hr>

        <?php get_template_part('templates/part-related-articles'); ?>

    </div>
    <?php get_template_part('templates/part-featured-articles'); ?>
</article>
<?php endwhile;
