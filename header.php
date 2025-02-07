<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

session_start();

sql_connect();

$is_admin = false;
$pseudoMemb = null;

if (isset($_SESSION['pseudoMemb'])) {
    $pseudoMemb = $_SESSION['pseudoMemb'];
    $numStat = sql_select('MEMBRE', 'numStat', "`pseudoMemb` = '".$pseudoMemb."'");
    if (!empty($numStat) && $numStat[0]["numStat"] == 1) {
        $is_admin = true;
    }
}
?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bordeaux en Résistance - Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/src/css/reset.css">
    <link rel="stylesheet" href="/src/css/index-style.css">
    <link rel="stylesheet" href="/src/css/font.css">
    <link rel="stylesheet" href="/src/css/header.css">
    <link rel="stylesheet" href="/src/css/register.css">
    <link rel="stylesheet" href="/src/css/login.css">
    <link rel="stylesheet" href="/src/css/articles.css">
    <link rel="stylesheet" href="./src/cookie-banner.css">
    <link rel="icon" type="image/png" href="/src/svg/favicon.svg">
</head>
<body>
    <header>
        <section class="menu">
            <div class="header-left">
                <a href="/index.php"><img class="logo" src="/src/svg/logo.svg"></a>
                <div class="nav">
                    <a href="/index.php">ACCUEIL</a>
                    <a href="/articles.php">ARTICLES</a>
                    <?php if ($is_admin): ?>
                        <a href="/views/backend/dashboard.php">ADMIN</a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="header-middle">
                <h1>BORDEAUX</h1>
                <h1>EN RESISTANCE</h>
            </div>
            <div class="header-right">
                <div class="search-container">
                    <div class="collapse" id="searchCollapse">
                        <input type="text" class="custom-form-search search-bar" placeholder="Rechercher...">
                    </div>
                    <a data-bs-toggle="collapse" href="#searchCollapse" role="button">
                        <img src="/src/svg/loupe.svg" class="search-icon" alt="Recherche">
                    </a>
                </div>

                <?php if ($pseudoMemb): ?>
                    <a class="bouton" href="/api/security/disconnect.php" role="button">
                        <div>
                            <span class="bouton">Déconnexion</span>
                            <img class="bouton-image" src="/src/svg/fleche-bouton.svg">
                        </div>
                    </a>
                    <span class="pseudo-memb"><?php echo htmlspecialchars($pseudoMemb); ?></span>
                <?php else: ?>
                    <a href="/views/backend/security/login.php" role="button">
                        <div class="bouton">
                            <span>Connexion</span>
                            <img class="bouton-image" src="/src/svg/fleche-bouton.svg">
                        </div>
                    </a>
                    <a href="/views/backend/security/signup.php" role="button">
                        <div class="bouton">
                            <span>Inscription</span>
                            <img class="bouton-image" src="/src/svg/fleche-bouton.svg">
                        </div>
                    </a>
                <?php endif; ?>
            </div>
        </section>
        <div class="ligne">
            <hr width="90%" color="black">
        </div>
    </header> 
</body>
