<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Žalimo, vaša pretraga nije dala niti jedan rezultat, pokušajte sa nekim sličnim pojmom.', 'sage'); ?>
  </div>
  <?php //get_search_form(); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', 'search'); ?>
<?php endwhile; ?>

<div class="row">
    <div class="col-md-12 text-center">
        <?php Roots\Sage\Pagination\get_pagination(); ?>
    </div>
</div>
