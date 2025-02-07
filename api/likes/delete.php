<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

// Vérifie que les champs POST existent
if (isset($_POST['numMemb']) && isset($_POST['numArt'])) {
    // Récupère et sécurise les entrées
    $numMemb = ctrlSaisies($_POST['numMemb']);
    $numArt = ctrlSaisies($_POST['numArt']);

    // var_dump($numMemb, $numArt);

    // Supprime le like de la base de données
    $result = sql_delete('LIKEART', "numMemb = $numMemb AND numArt = $numArt");

    header('Location: ../../views/backend/likes/list.php');
} else {
    // Redirige en cas de données manquantes
    header('Location: ../../views/backend/likes/list.php?error=missing_data');
    exit();
}