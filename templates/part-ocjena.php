<?php
$obecanje = get_field("obecanja");
if ($obecanje && $obecanje != 0) {
    switch ($obecanje) {
        case '1': // Započeto
            echo '<div class="absolute-top-right ocjena obecanje1">';
            echo '<div class="ico">';
            echo '<img src="' . get_template_directory_uri() . '/dist/images/ico/obecanje_zapoceto.png" class="img-responsive">';
            echo '</div>';
            echo 'Započeto';
            echo '</div>';
            break;
        
        case '2': // Prekršeno
            echo '<div class="absolute-top-right ocjena obecanje2">';
            echo '<div class="ico">';
            echo '<img src="' . get_template_directory_uri() . '/dist/images/ico/obecanje_prekrseno.png" class="img-responsive">';
            echo '</div>';
            echo 'Prekršeno';
            echo '</div>';
            break;
        
        case '3': // Djelomično ispunjeno
            echo '<div class="absolute-top-right ocjena obecanje3">';
            echo '<div class="ico">';
            echo '<img src="' . get_template_directory_uri() . '/dist/images/ico/obecanje_djelomicno_ispunjeno.png" class="img-responsive">';
            echo '</div>';
            echo 'Djelomično ispunjeno';
            echo '</div>';
            break;
        
        case '4': // Ispunjeno
            echo '<div class="absolute-top-right ocjena obecanje4">';
            echo '<div class="ico">';
            echo '<img src="' . get_template_directory_uri() . '/dist/images/ico/obecanje_ispunjeno.png" class="img-responsive">';
            echo '</div>';
            echo 'Ispunjeno';
            echo '</div>';
            break;
        
        default:
            echo 'Nije ocijenjeno';
            break;
    }
}

$ocjena = get_field("tocnost");
if ($ocjena && $ocjena != 0) {
    switch ($ocjena) {
        case '1': // Ni F od fakta
            echo '<div class="absolute-top-right ocjena ocjena1">';
            echo '<div class="ico">';
            echo '<img src="' . get_template_directory_uri() . '/dist/images/ico/ico_1.png" class="img-responsive">';
            echo '</div>';
            echo 'Ni F od fakta';
            echo '</div>';
            break;
        
        case '2': // Ni pola fakta
            echo '<div class="absolute-top-right ocjena ocjena2">';
            echo '<div class="ico">';
            echo '<img src="' . get_template_directory_uri() . '/dist/images/ico/ico_2.png" class="img-responsive">';
            echo '</div>';
            echo 'Ni pola fakta';
            echo '</div>';
            break;
        
        case '3': // Polufakt
            echo '<div class="absolute-top-right ocjena ocjena3">';
            echo '<div class="ico">';
            echo '<img src="' . get_template_directory_uri() . '/dist/images/ico/ico_3.png" class="img-responsive">';
            echo '</div>';
            echo 'Polufakt';
            echo '</div>';
            break;
        
        case '4': // Tri kvarta fakta
            echo '<div class="absolute-top-right ocjena ocjena4">';
            echo '<div class="ico">';
            echo '<img src="' . get_template_directory_uri() . '/dist/images/ico/ico_4.png" class="img-responsive">';
            echo '</div>';
            echo 'Tri kvarta fakta';
            echo '</div>';
            break;

        case '5': // Fakt
            echo '<div class="absolute-top-right ocjena ocjena5">';
            echo '<div class="ico">';
            echo '<img src="' . get_template_directory_uri() . '/dist/images/ico/ico_5.png" class="img-responsive">';
            echo '</div>';
            echo 'Fakt';
            echo '</div>';
            break;
        
        default:
            echo 'Nije ocijenjeno';
            break;
    }
}
?>