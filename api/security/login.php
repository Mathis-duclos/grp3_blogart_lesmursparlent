<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';



$pseudoMemb = ctrlSaisies($_POST['pseudoMemb']);
$passMemb = ctrlSaisies($_POST['passMemb']);


$pseudos = sql_select('MEMBRE', 'pseudoMemb');
$passwords = sql_select('MEMBRE', 'passMemb' );

$pseudoGood = false ;
$passGood = false;

foreach ($pseudos as $key => $value) {
    if ($value['pseudoMemb'] == $_POST['pseudoMemb']) {
        $pseudoGood = true;
    }
}

foreach ($passwords as $key2 => $value2) {
        if (password_verify($_POST['passMemb'], $value2['passMemb'])) {
            $passGood = true;
        }
}



if ($passGood == true && $pseudoGood == true) {
    $_SESSION['pseudoMemb'] = $pseudoMemb;
    header(header: 'Location: ../../../index.php?login=1');
    

} else {
    echo "ce n'est pas bon";
}



