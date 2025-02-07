<?php 
require_once 'header.php';
sql_connect();

$articles = sql_select("ARTICLE", "*", null, null, "numArt DESC");
?>

<main>
    <div id="cb-cookie-banner" class="alert alert-dark text-center mb-0" role="alert">
        <span>This website uses cookies to ensure you get the best experience on our website.</span>
        <a href="https://www.cookiesandyou.com/" target="_blank">Learn more</a>
        <button type="button" class="btn btn-primary btn-sm ms-3" onclick="window.cb_hideCookieBanner()">
            I Got It
        </button>
    </div>
    <section class="a-la-une">
        <br>
        <div class="titre">
            <h2>LA LISTE DES ARTICLES</h2>
            <img src="src/svg/fleche-titre.svg">
        </div>
        <div class="sous-titre">
            <p>Découvrez les derniers récits marquants de la Seconde Guerre mondiale à Bordeaux. Résistance, bunkers cachés et histoires oubliées vous plongent au cœur de cette époque bouleversante. À lire sans attendre !</p>
        </div>
        <div class="a-la-une-content">
            <div class="a-la-une-cards">
                <?php foreach ($articles as $article) : ?>
                    <div class="a-la-une-card">
                        <a href="/views/frontend/articles/article.php?numArt=<?php echo $article['numArt']; ?>"> 
                            <img class="card-image" src="/src/uploads/<?php echo htmlspecialchars($article['urlPhotArt']); ?>">
                        </a>
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
            </div>
        </div>
    </section>
</main>

</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Sélectionne tous les liens vers les articles
        const articleLinks = document.querySelectorAll(".a-la-une-card a");

        // Vérifie si l'utilisateur est connecté
        let isLoggedIn = <?php echo isset($_SESSION['pseudoMemb']) ? 'true' : 'false'; ?>;

        // Ajoute un écouteur d'événement sur chaque lien d'article
        articleLinks.forEach(link => {
            link.addEventListener("click", function (event) {
                if (!isLoggedIn) {
                    // Empêche la redirection normale
                    event.preventDefault();

                    // Affiche une pop-up d'alerte
                    alert("Vous devez être connecté pour lire cet article.");

                    // Redirection vers la page de connexion après fermeture de la pop-up
                    window.location.href = "/views/backend/security/login.php";
                }
            });
        });
    });
</script>