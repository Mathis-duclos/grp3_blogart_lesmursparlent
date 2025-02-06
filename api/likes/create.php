<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';


// Vérification si les 2 trucs sont bien envoyés avec le POST
if (!isset($_POST['numMemb']) || !isset($_POST['numArt'])) {
    http_response_code(400); // Mauvaise requête
    echo json_encode(['error' => 'Paramètres manquants.']);
    exit;
}

$numMemb = intval($_POST['numMemb']);
$numArt = intval($_POST['numArt']);


// Vérifier que les valeurs reçues ne sont pas nulles ou invalides
if ($numMemb <= 0 || $numArt <= 0) {
    echo ('Ayaaaa problème');
    exit;
}

// Vérifier si le like existe déjà dans la base de données
$queryCheck = "SELECT 1 FROM LIKEART WHERE numMemb = $numMemb AND numArt = $numArt";
$likeExists = sql_select($queryCheck, "*", [$numMemb, $numArt]);

// Si y'a résultat alorsle like existe déjà
if (!empty($likeExists)) {
    echo ('Problème : Le like existe déjà sur cet article pour cette personne.');
    exit;
}

// Insérer le nouveau like dans la base de données
$query = "INSERT INTO LIKEART (numMemb, numArt, likeA) VALUES (?, ?, 1)";
$result = sql_insert($query, [$numMemb, $numArt]);

?>