<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';



$pseudoMemb = ctrlSaisies($_POST['pseudoMemb']);
$passMemb = ctrlSaisies($_POST['passMemb']);


$pseudos = sql_select('MEMBRE', 'pseudoMemb');
$passwords = sql_select('MEMBRE', 'passMemb' );

$pseudoGood = false ;
$passGood = false;

foreach ($pseudos as $key => $value) {
    if ($value == $_POST['pseudoMemb']) {
        $pseudoGood = true;
    }
};

foreach ($passwords as $key2 => $value2) {
        if ($value2 == $_POST['passMemb']) {
            $passGood = true;
        }
};

if ($passGood == true && $pseudoMemb == true) {
    header(header: 'Location: ../../../index.php?login=1'); 

} else {
    //echo "ce n'est pas bon";
}



