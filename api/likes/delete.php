<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';


$numMemb = ctrlSaisies($_POST[numMemb[0]]);
$numArt = ctrlSaisies($_POST[numArt[0]]);
var_dump($numArt);
var_dump($numMemb);


sql_delete('LIKEART', "likeA = 1 AND numMemb =" . $numMemb . "AND numArt =" . $numArt);

header('Location: ../../views/backend/likes/list.php');
exit();