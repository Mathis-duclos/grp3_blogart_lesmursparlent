<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';


$pseudoMemb = ctrlSaisies($_POST['pseudoMemb']);
$prenomMemb = ctrlSaisies($_POST['prenomMemb']);
$nomMemb = ctrlSaisies($_POST['nomMemb']);
$numArt = ctrlSaisies($_POST['numArt']);
$libCom = ctrlSaisies($_POST['libCom']);
$numMemb = ctrlSaisies($_POST['numMemb']);

$attributs = "libCom, numArt, numMemb";
$values = "'$libCom', '$numArt', '$numMemb'";


sql_insert('COMMENT', $attributs, $values);


header('Location: ../../views/backend/comments/list.php');
exit();