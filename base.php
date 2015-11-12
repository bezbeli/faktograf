<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if lt IE 9]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_template_part('templates/header');
      if (is_page_template( "templates/template-layout-builder.php" )) {
        echo '<div class="wrap container-fluid" role="document">';
      } else {
        echo '<div class="wrap container" role="document">';
      }
    ?>
      <div class="content row">
        <aside class="sidebar-left">
        <?php if (is_single() && get_field('use_featured_glyph') == true) : 
                        
                            $field = get_field_object('featured_symbol');
                            $value = get_field('featured_symbol');
                            $label = $field['choices'][ $value ];
                            echo '<span class="ocjena-single">';
                            echo $label;
                            echo '</span>';

                        
        ?>
        <?php endif; ?>
        <?php
        $ocjena1 = get_field('ocjena1', 'options');
        $ocjena2 = get_field('ocjena2', 'options');
        $ocjena3 = get_field('ocjena3', 'options');
        $ocjena4 = get_field('ocjena4', 'options');
        $ocjena5 = get_field('ocjena5', 'options');

        $ocjena_tocnosti =      get_field("tocnost");
        $ocjena_dosljednosti =  get_field("dosljednost");
        if (is_single() && $ocjena_tocnosti != 0) : 

          switch ($ocjena_tocnosti) {
              case '1': // Ni F od fakta
                  echo '<span class="ocjena-single ocjena-single-1">';
                  echo $ocjena1;
                  echo '</span>';
                  break;
              
              case '2': // Ni pola fakta
                  echo '<span class="ocjena-single ocjena-single-2">';
                  echo $ocjena2;
                  echo '</span>';
                  break;
              
              case '3': // Polufakt
                  echo '<span class="ocjena-single ocjena-single-3">';
                  echo $ocjena3;
                  echo '</span>';
                  break;
              
              case '4': // Tri kvarta fakta
                  echo '<span class="ocjena-single ocjena-single-4">';
                  echo $ocjena4;
                  echo '</span>';
                  break;

              case '5': // Fakt
                  echo '<span class="ocjena-single ocjena-single-5">';
                  echo $ocjena5;
                  echo '</span>';
                  break;
              
              default:
                  echo 'Nije ocijenjeno';
                  break;
          }
                        
        ?>
        <?php endif; ?>
        </aside>
        <main class="main slade">
          <?php include Wrapper\template_path(); ?>
        </main><!-- /.main -->
        <?php if (Setup\display_sidebar()) : ?>
          <aside class="sidebar slade">
            <?php //include Wrapper\sidebar_path(); ?>
          </aside><!-- /.sidebar -->
        <?php endif; ?>
      </div><!-- /.content -->
    </div><!-- /.wrap -->
    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>
  </body>
</html>
