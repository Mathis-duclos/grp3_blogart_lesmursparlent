<?php 
require_once 'header.php';
sql_connect();

$motsCles = sql_select("MOTCLE", "DISTINCT libMotCle, numMotCle", null, null, "libMotCle ASC");


$search = isset($_GET['search']) ? trim($_GET['search']) : '';

$searchMotCle = isset($_GET['searchMotCle']) ? (int) $_GET['searchMotCle'] : null;

if ($searchMotCle) {
    $articles = sql_select(
        "ARTICLE 
        INNER JOIN MOTCLEARTICLE ON ARTICLE.numArt = MOTCLEARTICLE.numArt",
        "ARTICLE.*",
        "MOTCLEARTICLE.numMotCle = $searchMotCle",
        null,
        "ARTICLE.numArt DESC"
    );
} else {
    $articles = sql_select("ARTICLE", "*", null, null, "numArt DESC");
}

?>

<main>


    <section class="a-la-une">
        <div class="titre">
            <h2>LA LISTE DES ARTICLES</h2>
            <img src="src/svg/fleche-titre.svg">
            <br>
        </div>

        <section class="search-bar d-flex justify-content-center my-4">
    <form method="GET" action="articles.php" class="d-flex align-items-center gap-2">
        <label for="searchMotCle" class="me-2 fw-bold">Rechercher :</label>
        <select name="searchMotCle" id="searchMotCle" class="form-select w-auto">
            <option value="">-- Sélectionner un mot-clé --</option>
            <?php foreach ($motsCles as $mot) : ?>
                <option value="<?php echo $mot['numMotCle']; ?>" 
                    <?php echo (isset($_GET['searchMotCle']) && $_GET['searchMotCle'] == $mot['numMotCle']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($mot['libMotCle']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit" class="btn btn-primary">Rechercher</button>
    </form>
</section>


        

        <div class="a-la-une-content">
            <div class="a-la-une-cards">
                <?php if (!empty($articles)) : ?>
                    <?php foreach ($articles as $article) : ?>
                        <div class="a-la-une-card">
                            <a href="/views/frontend/articles/article.php?numArt=<?php echo $article['numArt']; ?>"> 
                                <img class="card-image" src="/src/uploads/<?php echo htmlspecialchars($article['urlPhotArt']); ?>">
                            </a>

                            <!-- Affichage des mots-clés -->
                            <div class="mots-cles">
                                <?php 
                                $numArt = (int) $article['numArt'];
                                $motsCles = sql_select(
                                    "MOTCLE 
                                    JOIN MOTCLEARTICLE ON MOTCLE.numMotCle = MOTCLEARTICLE.numMotCle",
                                    "MOTCLE.libMotCle",
                                    "MOTCLEARTICLE.numArt = $numArt"
                                );

                                if (!empty($motsCles)) {
                                    foreach ($motsCles as $motCle) {
                                        echo '<span class="badge bg-secondary">' . htmlspecialchars($motCle['libMotCle']) . '</span> ';
                                    }
                                } else {
                                    echo '<span class="badge bg-light text-dark">Aucun mot-clé</span>';
                                }
                                ?>
                            </div>

                            <div class="card-texte">
                                <p class="bold"><?php echo htmlspecialchars($article['libTitrArt']); ?></p><br>
                                <p><?php echo htmlspecialchars($article['libChapoArt']); ?></p><br>
                            </div>

                            <a href="/views/frontend/articles/article.php?numArt=<?php echo $article['numArt']; ?>">
                                <div class="bouton">
                                    <span>Voir l'article</span>
                                    <img class="bouton-image" src="src/svg/fleche-bouton.svg">
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>Aucun article trouvé pour "<?php echo htmlspecialchars($search); ?>"</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>
