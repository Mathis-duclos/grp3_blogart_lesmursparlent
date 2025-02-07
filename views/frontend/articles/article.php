<?php
require_once '../../../header.php';

// Vérification de l'entrée GET
if (!isset($_GET['numArt']) || empty($_GET['numArt'])) {
    die("Article non spécifié.");
}

$numArt = intval($_GET['numArt']); // Sécurisation : conversion en entier

// Récupération de l'article
$art = sql_select('ARTICLE', '*', "numArt = $numArt");
if (empty($art)) {
    die("Article introuvable.");
}
$art = $art[0];

// Extraction des données de l'article
$urlImg1 = $art['urlPhotArt'];
$libTitrart = htmlspecialchars($art['libTitrArt'], ENT_QUOTES, 'UTF-8');
$libChapoart = htmlspecialchars($art['libChapoArt'], ENT_QUOTES, 'UTF-8');
$dtCreaart = $art['dtCreaArt'];
$libAccrochart = htmlspecialchars($art['libAccrochArt'], ENT_QUOTES, 'UTF-8');
$parag1art = htmlspecialchars($art['parag1Art'], ENT_QUOTES, 'UTF-8');
$libSsTitr1art = htmlspecialchars($art['libSsTitr1Art'], ENT_QUOTES, 'UTF-8');
$parag2art = htmlspecialchars($art['parag2Art'], ENT_QUOTES, 'UTF-8');
$libSsTitr2art = htmlspecialchars($art['libSsTitr2Art'], ENT_QUOTES, 'UTF-8');
$parag3art = htmlspecialchars($art['parag3Art'], ENT_QUOTES, 'UTF-8');
$plCl1 = htmlspecialchars($art['libConclArt'], ENT_QUOTES, 'UTF-8');

// Récupération des commentaires validés pour cet article
$latestComments = sql_select(
    "COMMENT JOIN MEMBRE ON COMMENT.numMemb = MEMBRE.numMemb",
    "MEMBRE.pseudoMemb, COMMENT.libCom",
    "COMMENT.numArt = $numArt AND COMMENT.attModOK = 1"
);

// Récupération des mots-clés associés
$motsCles = sql_select(
    "MOTCLE 
    JOIN MOTCLEARTICLE ON MOTCLE.numMotCle = MOTCLEARTICLE.numMotCle",
    "MOTCLE.libMotCle",
    "MOTCLEARTICLE.numArt = $numArt"
);

// Récupération du nombre total de likes
$totalLikes = sql_select(
    "LIKEART",
    "COUNT(*) AS totalLikes",
    "numArt = $numArt"
)[0]['totalLikes'];

// Récupération de l'utilisateur connecté
if (!isset($_SESSION['pseudoMemb']) || empty($_SESSION['pseudoMemb'])) {
    die("Utilisateur non connecté.");
}
$pseudoMemb = htmlspecialchars($_SESSION['pseudoMemb'], ENT_QUOTES, 'UTF-8');

// Récupération du numéro de membre
$user = sql_select(
    "MEMBRE",
    "numMemb",
    "pseudoMemb = '$pseudoMemb'"
);

if (empty($user)) {
    die("Utilisateur non trouvé !");
}

$numMemb = $user[0]['numMemb'];

// Vérification si l'utilisateur a déjà liké cet article
$userLiked = sql_select(
    "LIKEART",
    "COUNT(*) AS alreadyLiked",
    "numMemb = $numMemb AND numArt = $numArt AND likeA = 1"
)[0]['alreadyLiked'] > 0;

// Traitement des likes/dislikes
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['likeArticle']) && !$userLiked) {
        sql_insert("LIKEART", "numMemb, numArt, likeA", "$numMemb, $numArt, 1");
        $userLiked = true;
        $totalLikes++; // Mise à jour des likes
    } elseif (isset($_POST['unlikeArticle']) && $userLiked) {
        sql_delete("LIKEART", "numMemb = $numMemb AND numArt = $numArt");
        $userLiked = false;
        $totalLikes--; // Mise à jour des dislikes
    }
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit;
}
?>

<!-- Page content -->
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content -->
            <article>
                <header class="mb-4">
                    <h1 class="fw-bolder mb-1"><?= $libTitrart ?></h1>
                    <div class="text-muted fst-italic mb-2"><?= $dtCreaart ?></div>
                    <?php foreach ($motsCles as $motCle): ?>
                        <a class="badge bg-secondary text-decoration-none link-light" href="#!">
                            <?= htmlspecialchars($motCle['libMotCle']) ?>
                        </a>
                    <?php endforeach; ?>
                    <div class="text-muted fst-italic mt-2">
                        👍 Likes : <?= $totalLikes ?>
                    </div>
                </header>
                <figure class="mb-4">
                    <img class="img-fluid rounded article-image" src="/src/uploads/<?= $urlImg1 ?>" alt="Image de l'article" />
                </figure>
                <section class="mb-5">
                    <p class="fs-5 mb-4"><?= $libChapoart ?></p>
                    <p class="fs-5 mb-4"><?= $libAccrochart ?></p>
                    <p class="fs-5 mb-4"><?= $parag1art ?></p>
                    <h2 class="fw-bolder mb-4 mt-5"><?= $libSsTitr1art ?></h2>
                    <p class="fs-5 mb-4"><?= $parag2art ?></p>
                    <h2 class="fw-bolder mb-4 mt-5"><?= $libSsTitr2art ?></h2>
                    <p class="fs-5 mb-4"><?= $parag3art ?></p>
                </section>
            </article>

            <!-- Comments section -->
            <section class="mb-5">
                <div class="card bg-light">
                    <div class="card-body">
                        <?php if (!empty($latestComments)): ?>
                            <?php foreach ($latestComments as $comment): ?>
                                <strong><?= htmlspecialchars($comment['pseudoMemb']) ?> :</strong><br>
                                <?= htmlspecialchars($comment['libCom']) ?><br><br>
                            <?php endforeach; ?>
                        <?php else: ?>
                            Aucun commentaire pour cet article.
                        <?php endif; ?>
                        <a href="addcom.php?numArt=<?= $numArt ?>" class="bouton" style="color : white;">Ajouter un commentaire</a>
                    </div>
                </div>

                <!-- Like/Unlike buttons -->
                <div class="mt-3">
                    <form method="POST" style="display: inline;">
                        <?php if (!$userLiked): ?>
                            <button type="submit" name="likeArticle" class="btn btn-success">👍 J'aime</button>
                        <?php else: ?>
                            <button type="submit" name="unlikeArticle" class="btn btn-danger">❌ Je n' aime plus</button>
                        <?php endif; ?>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>
<?php require_once '../../../footer.php'; ?>