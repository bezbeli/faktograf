(function($) {
  acf.add_action('ready', function( $el ){
  
    $( ".blok-label input" )
    .keyup(function() {
      var value = $( this ).val();
      $(this).parent().parent().parent().parent().parent().find(".layout-label").text( 'Posts picker module: ' + value );
      // console.log( value );
    }).keyup();
        
  });
})(jQuery);  
