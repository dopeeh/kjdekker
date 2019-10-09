<?php
    $string = 'kdekker@colourframe';

    if(filter_var($string, FILTER_VALIDATE_EMAIL)) {
        echo "<h1>Dikke success a mattie</h1>";
    } else {
        echo "invalid input";
    }
?>