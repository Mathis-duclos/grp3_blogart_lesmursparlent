<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';


$numMemb = ctrlSaisies($_POST['numMemb']);
$numArt = ctrlSaisies($_POST['numArt']);

$attributs = "likeA, numArt, numMemb";
$values = "'1', '$numArt', '$numMemb'";


sql_insert('LIKEART', $attributs, $values);


header('Location: ../../views/backend/likes/list.php');
exit();