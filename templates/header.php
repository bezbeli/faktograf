    <nav class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo home_url(); ?>">
                    <img title="faktograf.hr" class="" src="<?php echo get_template_directory_uri() . '/dist/images/logo.png'; ?>" alt="">
                    <img title="faktograf.hr" class="hidden-xs hidden-sm hidden-md hidden-lg" src="<?php echo get_template_directory_uri() . '/dist/images/logo-mobile.png'; ?>" alt="">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
                <div id="navbar-collapse" class="collapse navbar-collapse">
                <?php
                    wp_nav_menu( array(
                        'menu'              => 'primary',
                        'theme_location'    => 'primary_navigation',
                        'depth'             => 0,
                        'container'         => '',
                        'container_class'   => '',
                        'container_id'      => '',
                        'menu_class'        => 'nav navbar-nav',
                        'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new wp_bootstrap_navwalker())
                    );
                ?>
                <?php get_template_part('/templates/part-social' ); ?>
            </div>
        </div>
        <!-- /.container -->
    </nav>
    <div class="collapse" id="search-box">
        <div class="container">
                <div class="row space-bottom">
                <div class="col-sm-12 space-bottom-xs">
                    <br>
                    <?php echo get_template_part('/templates/part-searchform' ); ?>
                </div>
                <?php /* ?>
                <div class="col-sm-12">
                    <?php 
                    $tags = get_tags();
                    $html = '<div class="header-tags">';
                    foreach ( $tags as $tag ) {
                        $tag_link = get_tag_link( $tag->term_id );
                                
                        $html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='tagovi'>";
                        $html .= "{$tag->name}</a> ";
                    }
                    $html .= '</div>';
                    echo $html;
                    */
                     ?>
                </div>
                </div>
        </div>
    </div>