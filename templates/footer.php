<footer class="content-info">
  <div class="container">
    <?php //dynamic_sidebar('sidebar-footer'); ?>
    <p class="text-center">
    	<a href="<?php echo get_bloginfo('home'); ?>"><strong>© faktograf.hr</strong></a> <strong>2017</strong>
    </p>
  </div>

<?php
    wp_nav_menu( array(
        'menu'              => 'footer',
        'theme_location'    => 'footer_navigation',
        'depth'             => 0,
        'container'         => 'div',
        'container_class'   => 'container text-center',
        'container_id'      => '',
        'menu_class'        => 'footer-nav',
        'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>'
        )
    );
?>

</footer>
