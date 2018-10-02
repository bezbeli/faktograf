<footer class="content-info">
  <div class="container">
    <?php //dynamic_sidebar('sidebar-footer');?>
    <p class="text-center">
      <a href="<?php echo bloginfo('url'); ?>"><strong>© faktograf.hr</strong></a>
      <strong>2018</strong>
    </p>
  </div>

  <?php
    wp_nav_menu(
        [
        'menu'            => 'footer',
        'theme_location'  => 'footer_navigation',
        'depth'           => 0,
        'container'       => 'div',
        'container_class' => 'container text-center',
        'container_id'    => '',
        'menu_class'      => 'footer-nav',
        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        ]
    );
?>
  <div class="text-center" style="padding-top:1rem;">
    <img style="width:auto;height:50px" title="Sufinancira Europska unija u okviru programa Europa za građane" src="https://faktograf.hr/site/wp-content/themes/faktograf/dist/images/eu.svg"
      alt="Sufinancira Europska unija u okviru programa Europa za građane">
    &nbsp;
    <a title="International Fact-Checking Network" href="https://www.poynter.org/international-fact-checking-network-fact-checkers-code-principles"
      target="_blank">
      <img style="width:auto;height:50px" title="International Fact-Checking Network" src="https://faktograf.hr/site/wp-content/themes/faktograf/dist/images/IFCN_Signatory_badge.svg"
        alt="International Fact-Checking Network">
    </a>
  </div>
</footer>
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
<script>
  window.addEventListener("load", function() {
    window.cookieconsent.initialise({
      "palette": {
        "popup": {
          "background": "#237afc"
        },
        "button": {
          "background": "#fff",
          "text": "#237afc"
        }
      },
      "position": "top",
      "static": true,
      "content": {
        "message": "Faktograf.hr koristi kolačiće za pružanje boljeg korisničkog iskustva i funkcionalnosti. Cookie postavke mogu se kontrolirati i konfigurirati u vašem web pregledniku. Nastavkom pregleda web stranice Faktograf.hr slažete se s korištenjem kolačića.",
        "dismiss": "Slažem se",
        "link": "Saznaj više",
        "href": "https://faktograf.hr/kolacici/"
      }
    })
  });
</script>