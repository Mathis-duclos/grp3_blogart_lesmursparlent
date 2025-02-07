<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

// Récupération et sécurisation des données envoyées par le formulaire
$numMemb = ctrlSaisies($_POST['numMemb']);
$numArt = ctrlSaisies($_POST['numArt']);
$likeA = ctrlSaisies($_POST['likeA']);

// Mise à jour du statut du like dans la base de données
sql_update('LIKEART', "likeA = $likeA", "numMemb = $numMemb AND numArt = $numArt");

// Redirection après mise à jour
header('Location: ../../views/backend/likes/list.php');
exit();