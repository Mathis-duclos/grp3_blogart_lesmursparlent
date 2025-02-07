<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
        $prenomMemb = $_POST['prenomMemb'] ?? '';
        $nomMemb = $_POST['nomMemb'] ?? '';
        $pseudoMemb = $_POST['pseudoMemb'] ?? '';
        $passMemb = $_POST['passMemb'] ?? '';
        $eMailMemb = $_POST['eMailMemb'] ?? '';
        $accordMemb = $_POST['accordMemb'] ?? 0;
        $numStat = $_POST['numStat'] ?? 1;

        // Si aucune erreur, insérer le membre
        if (empty($error)) {
            $sql = "INSERT INTO MEMBRE (prenomMemb, nomMemb, pseudoMemb, passMemb, eMailMemb, dtCreaMemb, accordMemb, numStat) 
                    VALUES (:prenom, :nom, :pseudo, :pass, :email, NOW(), :accord, :numStat)";

            $stmt = $pdo->prepare($sql);
            $result = $stmt->execute([
                ':prenom' => $prenomMemb,
                ':nom' => $nomMemb,
                ':pseudo' => $pseudoMemb,
                ':pass' => password_hash($passMemb, PASSWORD_BCRYPT), // Hachage du mot de passe
                ':email' => $eMailMemb,
                ':accord' => $accordMemb,
                ':numStat' => $numStat
            ]);

            if ($result) {
                header('Location: ' . ROOT_URL . '/views/backend/members/list.php?success=created');
                exit();
            }
        }
    } catch (PDOException $e) {
        $error = "Erreur de base de données : " . $e->getMessage();
    }
}

?>
