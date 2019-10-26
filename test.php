<?php
    function maakBinair($getal) {
        $binairArray = array();
        $voorwaarde = true;
        while($voorwaarde) {
            if ($getal > 0) {
                if ($getal % 2 == 0) {
                    array_unshift($binairArray, 0);
                } else {
                    array_unshift($binairArray, 1);
                }
                $getal = floor($getal / 2);
            } elseif ($getal == 0) {
                $voorwaarde = false;
            }
        }
        $binairgetal = implode($binairArray, "");
        return $binairgetal;
    }

    echo maakBinair(62);
?>