<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

session_start();


sql_connect();

// SELECT `numStat` FROM `MEMBRE` WHERE `pseudoMemb` = "Admin99";
$is_admin = false;
if (isset($_SESSION['pseudoMemb'])) {
  $numStat = sql_select('MEMBRE', 'numStat', "`pseudoMemb` = '".$_SESSION['pseudoMemb']."'");
  $numStat = $numStat [0]["numStat"];
  if ($numStat == 1) {
    $is_admin = true;
  }
}
?>



<?php
//load config
require_once 'config.php';
?>


<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bordeaux en Résistance - Accueil</title>
    <!-- Load CSS -->
    <link rel="stylesheet" href="/src/css/style.css" />
    <link rel="stylesheet" href="/src/css/reset.css">
    <link rel="stylesheet" href="/src/css/index-style.css">
    <link rel="stylesheet" href="/src/css/font.css">
    <link rel="stylesheet" href="/src/css/header.css">
    <link rel="stylesheet" href="/src/css/register.css">
    <link rel="stylesheet" href="/src/css/login.css">
    <link rel="stylesheet" href="/src/css/articles.css">
    <link rel="stylesheet" href="./src/cookie-banner.css">
    <link rel="icon" type="image/png" href="/src/svg/favicon.svg">
    <!-- Bootstrap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
</head>
<body>
  <header>
        <section class="menu">
            <div class="header-left">
                <a href="./index.php"><img class="logo" src="/src/svg/logo.svg"></a>
                <div class="nav">
                    <a href="/index.php">ACCUEIL</a>
                    <a href="/articles.php">ARTICLES</a>
                    <?php  
                    if ($is_admin) {
                    echo '<a href="/views/backend/dashboard.php">ADMIN</a>';
                    } ?>
                </div>
            </div>
            <div class="header-middle">
              <h1>BORDEAUX</h1>
              <h1>EN RESISTANCE</h1>
            </div>
            <div class="header-right">
                <div class="search-container">
                    <div class="collapse" id="searchCollapse">
                        <input type="text" class="custom-form-search search-bar" placeholder="Rechercher...">
                    </div>
                    <a data-bs-toggle="collapse" href="#searchCollapse" role="button" aria-expanded="false" aria-controls="searchCollapse">
                        <img src="/src/svg/loupe.svg" class="search-icon" alt="Recherche">
                    </a>
                </div>
                <?php 
                if(isset($_SESSION['pseudoMemb']) ){
                echo '<a class="bouton" href="/api/security/disconnect.php" role="button">
                          <div>
                              <span class=bouton>Déconnexion</span>
                              <img class=bouton-image src="/src/svg/fleche-bouton.svg">
                          </div>
                      </a>'; 
                } else { 
                echo '<a href="/views/backend/security/login.php" role="button">
                          <div class="bouton">
                              <span>Connexion</span>
                              <img class=bouton-image src="/src/svg/fleche-bouton.svg">
                          </div>
                      </a>';
                echo '<a href="/views/backend/security/signup.php" role="button">
                          <div class="bouton">
                              <span >Inscription</span>
                              <img class=bouton-image src="/src/svg/fleche-bouton.svg">
                          </div>
                      </a>';
                }
                echo $_SESSION['pseudoMemb'];
                ?>
            </div>
        </section>
        <div class="ligne">
            <hr width="90%" color="black">
        </div>
    </header> 
<body>