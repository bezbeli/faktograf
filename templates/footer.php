<footer class="content-info">
  <div class="container">
    <?php //dynamic_sidebar('sidebar-footer');?>
    <p class="text-center">
        <a href="<?php echo get_bloginfo('home'); ?>"><strong>© faktograf.hr</strong></a> <strong>2017</strong>
    </p>
  </div>

<?php
    wp_nav_menu(
        [
        'menu' => 'footer',
        'theme_location' => 'footer_navigation',
        'depth' => 0,
        'container' => 'div',
        'container_class' => 'container text-center',
        'container_id' => '',
        'menu_class' => 'footer-nav',
        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        ]
    );
?>
    <div class="text-center" style="padding-top:1rem;">
        <a title="International Fact-Checking Network" href="https://www.poynter.org/international-fact-checking-network-fact-checkers-code-principles" target="_blank">
            <img style="width:100px;height:100px" title="International Fact-Checking Network" src="<?php echo get_template_directory_uri().'/dist/images/IFCN3.png'; ?>" alt="International Fact-Checking Network">
        </a>
    </div>
</footer>
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
<script>
window.addEventListener("load", function(){
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
    "href": "http://faktograf.hr/kolacici/"
  }
})});
</script>
