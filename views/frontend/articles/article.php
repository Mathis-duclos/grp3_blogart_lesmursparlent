<?php

require_once '../../../header.php';

$numArt = $_GET['numArt'] ;

$art = sql_select('ARTICLE', '*', "numArt = $numArt")[0];

$urlImg1 = $art['urlPhotArt'];
$libTitrart = $art['libTitrArt'];
$libChapoart = $art['libChapoArt'];
$dtCreaart = $art['dtCreaArt'];
$libAccrochart = $art['libAccrochArt'];
$parag1art = $art['parag1Art'];
$libSsTitr1art = $art['libSsTitr1Art'];
$parag2art = $art['parag2Art'];
$libSsTitr2art = $art['libSsTitr2Art'];
$parag3art = $art['parag3Art'];
$plCl1 = $art['libConclArt'];

$latestComments = sql_select("COMMENT", "libCom", "numArt = (SELECT MAX(numArt) FROM ARTICLE)");

$latestComments = sql_select(
    "COMMENT JOIN MEMBRE ON COMMENT.numMemb = MEMBRE.numMemb",
    "MEMBRE.pseudoMemb, COMMENT.libCom",
    "COMMENT.numArt = (SELECT MAX(numArt) FROM ARTICLE)"
);





?>

<!-- Page content-->
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1"><?php echo $libTitrart ?></h1>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2"><?php echo $dtCreaart ?></div>
                    <!-- Post categories-->
                    <a class="badge bg-secondary text-decoration-none link-light" href="#!">Visite</a>
                    <a class="badge bg-secondary text-decoration-none link-light" href="#!">Lieux</a>
                </header>
                <!-- Preview image figure-->
                <figure class="mb-4"><img class="img-fluid rounded article-image" src="/src/uploads/<?php echo $urlImg1; ?>" alt="photo de Pierre Auzereau" /></figure>
                <!-- Post content-->
                <section class="mb-5">
                    <p class="fs-5 mb-4"><?php echo $libChapoart ?></p>
                    <p class="fs-5 mb-4"><?php echo $libAccrochart ?></p>
                    <p class="fs-5 mb-4"><?php echo $parag1art ?></p>
                    <h2 class="fw-bolder mb-4 mt-5"><?php echo $libSsTitr1art ?></h2>
                    <p class="fs-5 mb-4"><?php echo $parag2art ?></p>
                    <h2 class="fw-bolder mb-4 mt-5"><?php echo $libSsTitr2art ?></h2>
                    <p class="fs-5 mb-4"><?php echo $parag3art ?></p>
                </section>
            </article>

            
            <!-- Comments section-->
            <section class="mb-5">
                <div class="card bg-light">
                    <div class="card-body">

                    <?php if (!empty($latestComments)) {
    foreach ($latestComments as $comment) {
        echo "<strong>" . $comment['pseudoMemb'] . " :</strong><br>";
        echo $comment['libCom'] . "<br><br>";
    } } else {
    echo "Aucun commentaire trouvé pour l'article le plus récent.";
    }


            ?>

                <a href="addcom.php?numArt=<?php echo($article[1]['numArt']); ?>" class="bouton" style="color: white;">Ajouter commentaire</a>               
                    </div>
                </div>
            </section>
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4 side-widget">
            <!-- Search widget
            <div class="card mb-4">
                <div class="card-body"><?php echo $libTitrArt2 ?></div>
                <img class="img-fluid rounded article-image" src="/src/uploads/<?php echo $urlImg2; ?>">
                <div class="card-body"><?php echo $libChapoArt2 ?></div>
                <a href="/views/frontend/articles/article2.php"> <div class="card-body">Voir l'article</div></a>
            </div>
            <div class="card mb-4">
                <div class="card-body"><?php echo $libTitrart ?></div>
                <img class="img-fluid rounded article-image" src="/src/uploads/<?php echo $urlImg1; ?>">
                <div class="card-body"><?php echo $libChapoart ?></div>
                <a href="/views/frontend/articles/article1.php"> <div class="card-body">Voir l'article</div></a>
            </div> -->
        </div>
    </div>
</div>
<?php require_once '../../../footer.php'; ?>
</main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
</html>
