<?php

require_once '../../../header.php';

$numArt1 = 1 ;
$numArt2 = 2 ;
$Art1 = sql_select('ARTICLE', '*', "numArt = $numArt1")[0];
$Art2 = sql_select('ARTICLE', '*', "numArt = $numArt2")[0];
$urlImg1 = $Art1['urlPhotArt'];
$libTitrArt1 = $Art1['libTitrArt'];
$libChapoArt1 = $Art1['libChapoArt'];
$urlImg2 = $Art2['urlPhotArt'];
$libTitrArt2 = $Art2['libTitrArt'];
$libChapoArt2 = $Art2['libChapoArt'];
$dtCreaArt1 = $Art1['dtCreaArt'];
$libAccrochArt1 = $Art1['libAccrochArt'];
$parag1Art1 = $Art1['parag1Art'];
$libSsTitr1Art1 = $Art1['libSsTitr1Art'];
$parag2Art1 = $Art1['parag2Art'];
$libSsTitr2Art1 = $Art1['libSsTitr2Art'];
$parag3Art1 = $Art1['parag3Art'];
$plCl1 = $Art1['libConclArt'];
$dtCreaArt2 = $Art2['dtCreaArt'];
$libAccrochArt2 = $Art2['libAccrochArt'];
$parag1Art2 = $Art2['parag1Art'];
$libSsTitr1Art2 = $Art2['libSsTitr1Art'];
$parag2Art2 = $Art2['parag2Art'];
$libSsTitr2Art2 = $Art2['libSsTitr2Art'];
$parag3Art2 = $Art2['parag3Art'];
$plCl2 = $Art2['libConclArt'];
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
                    <h1 class="fw-bolder mb-1"><?php echo $libTitrArt2 ?></h1>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2"><?php echo $dtCreaArt2 ?></div>
                    <!-- Post categories-->
                    <a class="badge bg-secondary text-decoration-none link-light" href="#!">Visite</a>
                    <a class="badge bg-secondary text-decoration-none link-light" href="#!">Lieux</a>
                </header>
                <!-- Preview image figure-->
                <figure class="mb-4"><img class="img-fluid rounded article-image" src="/src/uploads/<?php echo $urlImg2; ?>" alt="photo de Pierre Auzereau" /></figure>
                <!-- Post content-->
                <section class="mb-5">
                    <p class="fs-5 mb-4"><?php echo $libChapoArt2 ?></p>
                    <p class="fs-5 mb-4"><?php echo $libAccrochArt2 ?></p>
                    <p class="fs-5 mb-4"><?php echo $parag1Art2 ?></p>
                    <h2 class="fw-bolder mb-4 mt-5"><?php echo $libSsTitr1Art2 ?></h2>
                    <p class="fs-5 mb-4"><?php echo $parag2Art2 ?></p>
                    <h2 class="fw-bolder mb-4 mt-5"><?php echo $libSsTitr2Art2 ?></h2>
                    <p class="fs-5 mb-4"><?php echo $parag3Art2 ?></p>
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
        <div class="col-lg-4 side-widget">
            <!-- Search widget-->
            <div class="card mb-4">
                <div class="card-body"><?php echo $libTitrArt2 ?></div>
                <img class="img-fluid rounded article-image" src="/src/uploads/<?php echo $urlImg2; ?>">
                <div class="card-body"><?php echo $libChapoArt2 ?></div>
                <a href="/views/frontend/articles/article2.php"> <div class="card-body">Voir l'article</div></a>
            </div>
            <div class="card mb-4">
                <div class="card-body"><?php echo $libTitrArt1 ?></div>
                <img class="img-fluid rounded article-image" src="/src/uploads/<?php echo $urlImg1; ?>">
                <a href="/views/frontend/articles/article1.php"> <div class="card-body">Voir l'article</div></a>
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
