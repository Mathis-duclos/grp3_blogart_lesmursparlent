<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';



$pseudoMemb = ctrlSaisies($_POST['pseudoMemb']);
$prenomMemb = ctrlSaisies($_POST['prenomMemb']);
$nomMemb = ctrlSaisies($_POST['nomMemb']);
$eMailMemb = ctrlSaisies($_POST['eMailMemb']);
$passMemb = ctrlSaisies($_POST['passMemb']);
$accordMemb = ctrlSaisies($_POST['accordMemb']);
$pseudopareil = 0;

$touslesmembres = sql_select('MEMBRE', 'pseudoMemb');

$passMembHash = password_hash($passMemb, PASSWORD_DEFAULT);



foreach ($touslesmembres as $key => $value) {
    if ($pseudoMemb == $value['pseudoMemb']) {
        $pseudopareil = 1;
    }

}

if ($pseudopareil == 0) {
    sql_insert(
    'MEMBRE',

    'pseudoMemb, prenomMemb, nomMemb, eMailMemb, passMemb, accordMemb, numStat',
    "'$pseudoMemb', '$prenomMemb', '$nomMemb', '$eMailMemb', '$passMembHash', '$accordMemb', '3'"

    );    header(header: 'Location: ../../../index.php'); 
;
} else {
    echo "Pseudo déjà utilisé : veuillez recommencer";
    header(header: 'Location: ../../../index.php?errorpseudo=1'); 
}


