<?php

session_start(); // Démarrer la session pour stocker les erreurs

error_reporting(E_ALL);
ini_set('display_errors', 1);

var_dump($_POST);

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

$error = ""; // Variable pour stocker les erreurs

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Connexion à la base de données
        $pdo = new PDO(
            'mysql:host=localhost;dbname=blogart25;charset=utf8',
            'root',  // votre utilisateur MySQL
            'root',  // votre mot de passe MySQL
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );

        // Récupérer les valeurs du formulaire
        $numMemb = $_POST['numMemb'] ?? '';
        $prenomMemb = $_POST['prenomMemb'] ?? '';
        $nomMemb = $_POST['nomMemb'] ?? '';
        $pseudoMemb = $_POST['pseudoMemb'] ?? '';
        $passMemb = $_POST['passMemb'] ?? '';
        $eMailMemb = $_POST['eMailMemb'] ?? '';
        $accordMemb = $_POST['accordMemb'] ?? 0;
        $numStat = $_POST['numStat'] ?? 1;

        if (!empty($passMemb)) {
            $passMemb = $passMemb;
        } else {
            // Si le mot de passe n'est pas modifié, conserve l'ancien mot de passe
            $sql = "SELECT passMemb FROM MEMBRE WHERE numMemb = :numero";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':numero' => $numMemb]);
            $passMemb = $stmt->fetchColumn();
        }

        // Si aucune erreur, insérer le membre
        if (empty($error)) {
            $sql = "UPDATE MEMBRE SET prenomMemb = :prenom, nomMemb = :nom, pseudoMemb = :pseudo, passMemb = :pass, eMailMemb = :email, dtMajMemb = NOW(), numStat = :numStat WHERE numMemb = :numero";

            $stmt = $pdo->prepare($sql);
            $result = $stmt->execute([
                ':numero' => $numMemb,
                ':prenom' => $prenomMemb,
                ':nom' => $nomMemb,
                ':pseudo' => $pseudoMemb,
                ':pass' => password_hash($passMemb, PASSWORD_BCRYPT), 
                ':email' => $eMailMemb,
                ':numStat' => $numStat
            ]);

            if ($result) {
                header('Location: ' . ROOT_URL . '/views/backend/members/list.php?success=updated');
                exit();
            }
        }
    } catch (PDOException $e) {
        $error = "Erreur de base de données : " . $e->getMessage();
    }
}
?>
