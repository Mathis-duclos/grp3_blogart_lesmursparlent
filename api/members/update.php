<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

$numMemb = ctrlSaisies($_POST['numMemb']);
$prenomMemb = ctrlSaisies($_POST['prenomMemb']);


sql_update('MEMBRE', 'prenomMemb = "'.$prenomMemb.'"', "numMemb = $numMemb");


header('Location: ../../views/backend/members/list.php');