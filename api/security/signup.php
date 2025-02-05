<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

$pseudoMemb = ctrlSaisies($_POST['pseudoMemb']);
$prenomMemb = ctrlSaisies($_POST['prenomMemb']);
$nomMemb = ctrlSaisies($_POST['nomMemb']);
$eMailMemb = ctrlSaisies($_POST['eMailMemb']);
$passMemb = ctrlSaisies($_POST['passMemb']);
$accordMemb = ctrlSaisies($_POST['accordMemb']);

var_dump($pseudoMemb);
var_dump($prenomMemb);
var_dump($eMailMemb);
var_dump($passMemb);
var_dump($accordMemb);
var_dump($nomMemb);

sql_insert(
    'MEMBRE',
    // je suis ici il faut que je continue à faire le api sign up et que je test si ça fonctionne 
    // fairr attributs, values
    'pseudoMemb, prenomMemb, nomMemb, eMailMemb, passMemb, accordMemb',
    "'$pseudoMemb', '$prenomMemb', '$nomMemb', '$eMailMemb', '$passMemb', '$accordMemb'"
);

header('Location: ../../../index.php');