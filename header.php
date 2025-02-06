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


<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bordeaux en Résistance - Accueil</title>
    <!-- Load CSS -->
    <link rel="stylesheet" href="src/css/style.css" />
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index-style.css">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="./Bo">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.css">
    <link rel="icon" type="image/png" href="src/svg/favicon.svg">
    <!-- Bootstrap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="shortcut icon" type="image/x-icon" href="src/images/article.png" />
</head>
<?php
//load config
require_once 'config.php';

/*
?>
<body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Blog'Art 25</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">

            <?php  
              if ($is_admin) {
                    echo '<a class="nav-link" href="/views/backend/dashboard.php">Admin</a>';
                  } 
                
              
            ?>
        </li>
      </ul>
    </div>
    <!--right align-->
    <div class="d-flex">
      <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Rechercher sur le site…" aria-label="Search" >
      </form>

      <?php 

            if(isset($_SESSION['pseudoMemb']) ){

            echo '<a class="btn btn-danger m-1" href="/api/security/disconnect.php" role="button">Se déconnecter</a>'; 
            } else { 
            echo '<a class="btn btn-primary m-1" href="/views/backend/security/login.php" role="button">Login</a>';
            echo '<a class="btn btn-dark m-1" href="/views/backend/security/signup.php" role="button">Sign up</a>';

            }
      
      ?>
    
    </div>
  </div>
</nav>
*/


?>
<body>
  <header>
        <section class="menu">
            <div class="header-left">
                <a href="./index.html"><img class="logo" src="src/svg/logo3.svg"></a>
                <div class="nav">
                    <a href="./index.html">ACCUEIL</a>
                    <a href="./articles.html">ARTICLES</a>
                    <?php  
                    if ($is_admin) {
                    echo '<a class="nav-link" href="/views/backend/dashboard.php">Admin</a>';
                    } ?>
                </div>
            </div>
            <div class="header-right">
                <div class="search-container">
                    <div class="collapse" id="searchCollapse">
                        <input type="text" class="custom-form-search search-bar" placeholder="Rechercher...">
                    </div>
                    <a data-bs-toggle="collapse" href="#searchCollapse" role="button" aria-expanded="false" aria-controls="searchCollapse">
                        <img src="src/svg/loupe.svg" class="search-icon" alt="Recherche">
                    </a>
                </div>
                <?php 

                if(isset($_SESSION['pseudoMemb']) ){

                echo '<a class="btn btn-danger m-1" href="/api/security/disconnect.php" role="button">Se déconnecter</a>'; 
                } else { 
                echo '<a class="btn btn-primary m-1" href="/views/backend/security/login.php" role="button">Login</a>';
                echo '<a class="btn btn-dark m-1" href="/views/backend/security/signup.php" role="button">Sign up</a>';

                }

                ?>
                <a href="./login.html">
                    <div class="bouton">
                        <span class=bouton>S'identifier</span>
                        <img class=bouton-image src="src/svg/fleche-bouton.svg">
                    </div>
                </a>
            </div>
        </section>
        <div class="ligne">
            <hr width="90%" color="black">
        </div>
    </header> 
<body>