<?php 
require_once 'header.php';
sql_connect();

/*if ( isset($_GET["errorpseudo"]) && $_GET["errorpseudo"] == 1) {
    echo "Pseudo déjà utilisé : veuillez recommencer";
}*/

/*if ( isset($_GET["login"]) && $_GET["login"] == 1) {
    echo "Vous êtes connectés inchalla ";
    echo $_SESSION['pseudoMemb'];
}*/



$article = sql_select("ARTICLE", "*", null, null, "numArt DESC", "2");


//var_dump($article);






//if (count($article) == 2) {
//    $maxNumArt = max($article[0]['numArt'], $article[1]['numArt']);
//    echo "Le plus grand numArt parmi les deux est : " . $maxNumArt;
//} else {
//    echo "Moins de deux articles trouvés.";
//}

//$urlImg = sql_select('ARTICLE', 'urlPhotArt', "numArt = $article")[0]['urlPhotArt'];
//$libTitrArt = sql_select('ARTICLE', 'libTitrArt', "numArt = $article")[0]['libTitrArt'];
//$libChapoArt = sql_select('ARTICLE', 'libChapoArt', "numArt = $article")[0]['libChapoArt'];

?>





<main>
    <div id="cb-cookie-banner" class="alert alert-dark text-center mb-0" role="alert">
        <span>This website uses cookies to ensure you get the best experience on our website.</span>
        <a href="https://www.cookiesandyou.com/" target="blank">Learn more</a>
        <button type="button" class="btn btn-primary btn-sm ms-3" onclick="window.cb_hideCookieBanner()">
            I Got It
        </button>
    </div>
    <section class="top-content">
    <img src="src/images/top-content-image3.png" style="width: 100%; height: auto; display: block; object-fit: cover;">
</section>

    <section class="a-la-une">
        <div class="ligne">
            <hr width="90%" color="black">
        </div>
        <div class="titre">
            <h2>A LA UNE</h2>
            <img src="src/svg/fleche-titre.svg">
        </div>
        <div class="sous-titre">
            <p>Découvrez les derniers récits marquants de la Seconde Guerre mondiale à Bordeaux. Résistance, bunkers cachés et histoires oubliées vous plongent au cœur de cette époque bouleversante. À lire sans attendre !</p>
        </div>
        <div class="a-la-une-content">
            <div class="a-la-une-cards">
                <!-- CARTE 1 -->
        
                <div class="a-la-une-card">
                    <a href="/views/frontend/articles/article.php?numArt=<?php echo($article[0]['numArt']); ?>"> <img class="card-image" src="/src/uploads/<?php echo ($article[0]['urlPhotArt']); ?>"></a>
                    <div class="card-texte">
                        <p class="bold"><?php echo $article[0]['libTitrArt']; ?></p><br>
                        <p><?php echo $article[0]['libChapoArt']; ?></p><br>
                    </div>
                    <a href="/views/frontend/articles/article.php?numArt=<?php echo($article[0]['numArt']); ?>"><div class="bouton">
                        <span>Voir l'article</span>
                        <img class=bouton-image src="src/svg/fleche-bouton.svg">
                    </div></a>
                </div>

                <!-- CARTE 2 -->
                <div class="a-la-une-card">
                    <a href="/views/frontend/articles/article.php?numArt=<?php echo($article[1]['numArt']); ?>"> <img class="card-image" src="/src/uploads/<?php echo $article[1]['urlPhotArt']; ?>"></a>
                    <div class="card-texte">
                        <p class="bold"><?php echo $article[1]['libTitrArt']; ?></p><br>
                        <p><?php echo $article[1]['libChapoArt']; ?></p><br>
                    </div>
                    <a href="/views/frontend/articles/article.php?numArt=<?php echo($article[1]['numArt']); ?>"> <div class="bouton">
                        <span>Voir l'article</span>
                        <img class=bouton-image src="src/svg/fleche-bouton.svg">
                    </div></a>
                </div>


            </div>
        </div>
    </section>
    <section class="newsletter">
        <div class="ligne">
            <hr width="90%" color="black">
        </div>
        <div class="titre">
            <h2>NEWSLETTER</h2>
            <img src="src/svg/fleche-titre.svg">
        </div>
        <div class="newsletter-content">
            <div class="newsletter-texte">
                <p>Recevez des récits inédits sur la Seconde Guerre mondiale à Bordeaux : témoignages, faits marquants et analyses. <br>Ne laissez pas l’Histoire s’effacer, abonnez-vous !</p>
            </div>
            <a href="/newsletter.php"><div class="bouton">
                <span class=bouton>S’ABONNER À LA NEWSLETTER</span>
                <img class=bouton-image src="src/svg/fleche-bouton.svg">
            </div></a>
        </div>
    </section>
    <section class="contact">
        <div class="ligne">
            <hr width="90%" color="black">
        </div>
        <div class="titre">
            <h2>CONTACT</h2>
            <img src="src/svg/fleche-titre.svg">
        </div>
        <div class="contact-content">
            <form id="emailForm">
                <div class="form-top">
                    <div class="mb-3">
                        <label for="exampleInputName1" class="form-label">Votre nom et prénom :</label>
                        <input placeholder="ex: Jean Moulin" type="text" class="custom-form" id="exampleInputName1" aria-describedby="nameHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Votre adresse e-mail :</label>
                        <input placeholder="ex: jean.moulin@gmail.com" type="email" class="custom-form" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputMessage1" class="form-label">Votre message :</label>
                    <textarea id="exampleInputMessage1" name="message" rows="8" cols="33" class="custom-form-message"></textarea>
                </div>
                
                <a id="mailtoLink">
                    <div class="bouton" onclick="sendMail()">
                        <span class="bouton">ENVOYER</span>
                        <img class="bouton-image" src="src/svg/fleche-bouton.svg">
                    </div>
                </a>
            </form>
        </div>
    </section>
    <?php require_once 'footer.php'; ?>
</main>
<script>
    function sendMail() {
        // Récupération des valeurs du formulaire
        let name = document.getElementById("exampleInputName1").value;
        let email = document.getElementById("exampleInputEmail1").value;
        let message = document.getElementById("exampleInputMessage1").value;

        // Encodage pour éviter les problèmes d'espaces ou de caractères spéciaux
        name = encodeURIComponent(name);
        email = encodeURIComponent(email);
        message = encodeURIComponent(message);

        // Création de l'URL mailto avec les données saisies
        let mailtoLink = `mailto:destinataire@example.com?subject=Message%20de%20${name}&body=Nom%20:%20${name}%0AEmail%20:%20${email}%0A%0AMessage%20:%0A${message}`;

        // Attribution du lien au bouton
        document.getElementById("mailtoLink").setAttribute("href", mailtoLink);
    }
</script>

<script>
    // Vérifie si l'URL contient "errorpseudo=1"
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has("errorpseudo") && urlParams.get("errorpseudo") == "1") {
        // Affiche une alerte
        alert("Le pseudonyme choisi est déjà utilisé. Veuillez en choisir un autre.");
        
        // Redirection vers la page d'inscription après fermeture de l'alerte
        window.location.href = "/views/backend/security/signup.php";
    }
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
