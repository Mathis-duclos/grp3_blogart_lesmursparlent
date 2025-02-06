<?php

require_once '../../../header.php';



$numArt = 1 ;
$libTitrArt = sql_select('ARTICLE', 'libTitrArt', "numArt = $numArt")[0]['libTitrArt'];
$libChapoArt = sql_select('ARTICLE', 'libChapoArt', "numArt = $numArt")[0]['libChapoArt'];
$urlImg = sql_select('ARTICLE', 'urlPhotArt', "numArt = $numArt")[0];
$dtCreaArt = sql_select('ARTICLE', 'dtCreaArt', "numArt = $numArt")[0]['dtCreaArt'];
$libAccrochArt = sql_select('ARTICLE', 'libAccrochArt', "numArt = $numArt")[0]['libAccrochArt'];
$parag1Art = sql_select('ARTICLE', 'parag1Art', "numArt = $numArt")[0]['parag1Art'];
$libSsTitr1Art = sql_select('ARTICLE', 'libSsTitr1Art', "numArt = $numArt")[0]['libSsTitr1Art'];
$parag2Art = sql_select('ARTICLE', 'parag2Art', "numArt = $numArt")[0]['parag2Art'];
$libSsTitr2Art = sql_select('ARTICLE', 'libSsTitr2Art', "numArt = $numArt")[0]['libSsTitr2Art'];
$parag3Art = sql_select('ARTICLE', 'parag3Art', "numArt = $numArt")[0]['parag3Art'];
$plCl = sql_select('ARTICLE', 'libConclArt', "numArt = $numArt")[0]['libConclArt'];



var_dump($libTitrArt);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bordeaux en Résistance - Accueil</title>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/font.css">
        <link rel="stylesheet" href="css/header.css">
        <link href="styles.css" rel="stylesheet" />
        <link rel="icon" type="image/png" href="src/svg/favicon.svg">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.css">
    </head>
    <body>
        <header>
            <section class="menu">
                <div class="header-left">
                    <a href="./index.html"><img class="logo" src="src/svg/logo3.svg"></a>
                    <div class="nav">
                        <a href="./index.html">ACCUEIL</a>
                        <a href="./articles.html">ARTICLES</a>
                        <a href="#">ADMIN</a>
                    </div>
                </div>
                <div class="header-right">
                    <div class="search-container">
                        <div class="collapse" id="searchCollapse">
                            <input type="text" class="form-control search-bar" placeholder="Rechercher...">
                        </div>
                        <a data-bs-toggle="collapse" href="#searchCollapse" role="button" aria-expanded="false" aria-controls="searchCollapse">
                            <img src="src/svg/loupe.svg" class="search-icon" alt="Recherche">
                        </a>
                    </div>
                    <a href="./login.html"><div class="bouton">
                        <span class=bouton>S'identifier</span>
                        <img class=bouton-image src="src/svg/fleche-bouton.svg">
                    </div></a>
                </div>
            </section>
            <div class="ligne">
                <hr width="90%" color="black">
            </div>
        </header>
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1"><?php echo $libTitrArt ?></h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2"><?php echo $dtCreaArt ?></div>
                            <!-- Post categories-->
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a>
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" <? echo('src="src/uploads/"' . $urlImg)?> alt="photo de Pierre Auzereau" /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4"><?php echo $libChapoArt ?></p>
                            <p class="fs-5 mb-4"><?php echo $libAccrochArt ?></p>
                            <p class="fs-5 mb-4"><?php echo $parag1Art ?></p>
                            <h2 class="fw-bolder mb-4 mt-5"><?php echo $libSsTitr1Art ?></h2>
                            <p class="fs-5 mb-4"><?php echo $parag2Art ?></p>
                            <p class="fw-bolder mb-4 mt-5"><?php echo $libSsTitr2Art ?></p>
                            <p class="fs-5 mb-4"><?php echo $parag3Art ?></p>
                        </section>
                    </article>
                    <!-- Comments section-->
                    <section class="mb-5">
                        <div class="card bg-light">
                            <div class="card-body">
                                <!-- Comment form-->
                                <form class="mb-4"><textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea></form>
                                <!-- Comment with nested comments-->
                                <div class="d-flex mb-4">
                                    <!-- Parent comment-->
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">Commenter Name</div>
                                        If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks.
                                        <!-- Child comment 1-->
                                        <div class="d-flex mt-4">
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold">Commenter Name</div>
                                                And under those conditions, you cannot establish a capital-market evaluation of that enterprise. You can't get investors.
                                            </div>
                                        </div>
                                        <!-- Child comment 2-->
                                        <div class="d-flex mt-4">
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold">Commenter Name</div>
                                                When you put money directly to a problem, it makes a good headline.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single comment-->
                                <div class="d-flex">
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">Commenter Name</div>
                                        When I look at the universe and all the ways the universe wants to kill us, I find it hard to reconcile that with statements of beneficence.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                            </div>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">Web Design</a></li>
                                        <li><a href="#!">HTML</a></li>
                                        <li><a href="#!">Freebies</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">JavaScript</a></li>
                                        <li><a href="#!">CSS</a></li>
                                        <li><a href="#!">Tutorials</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once 'footer.php'; ?>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
</html>
