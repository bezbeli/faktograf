<div class="row teaser space-bottom-md bt">
    <div class="col-md-8" style="padding-right:1em;">
        <h4 class="entry-title">
            <a href="<?php echo get_permalink();?>">
                <?php the_title(); ?>
            </a>
        </h4>
        <small>
            <?php get_template_part('templates/entry-meta'); ?>
        </small>
    </div>
    <div class="col-md-4">
        <div class="featured-image">
            <?php get_template_part('templates/part-ocjena'); ?>
            <a href="<?php echo get_permalink();?>">
                <?php the_post_thumbnail('featured-image', ['class' => 'img-responsive']); ?>
            </a>
        </div>
    </div>
</div>
