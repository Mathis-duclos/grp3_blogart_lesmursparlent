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

$numArt = 1 ;
$urlImg = sql_select('ARTICLE', 'urlPhotArt', "numArt = $numArt")[0]['urlPhotArt'];
$libTitrArt = sql_select('ARTICLE', 'libTitrArt', "numArt = $numArt")[0]['libTitrArt'];
$libChapoArt = sql_select('ARTICLE', 'libChapoArt', "numArt = $numArt")[0]['libChapoArt'];

$numArt2 = 2 ;
$urlImg2 = sql_select('ARTICLE', 'urlPhotArt', "numArt = $numArt2")[0]['urlPhotArt'];
$libTitrArt2 = sql_select('ARTICLE', 'libTitrArt', "numArt = $numArt2")[0]['libTitrArt'];
$libChapoArt2 = sql_select('ARTICLE', 'libChapoArt', "numArt = $numArt2")[0]['libChapoArt'];
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
        <img src="src/images/top-content-image3.png">
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
                <div class="a-la-une-card">
                    <a href="/views/frontend/articles/article1.php"><img class="card-image" src="/src/uploads/<?php echo $urlImg; ?>"></a>
                    <div class="card-texte">
                        <p class="bold"><?php echo $libTitrArt; ?></p><br>
                        <p><?php echo $libChapoArt; ?></p><br>
                    </div>
                    <a href="/views/frontend/articles/article1.php"><div class="bouton">
                        <span>Voir l'article</span>
                        <img class=bouton-image src="src/svg/fleche-bouton.svg">
                    </div></a>
                </div>
                <div class="a-la-une-card">
                    <a href="/views/frontend/articles/article2.php"><img class="card-image" src="/src/uploads/<?php echo $urlImg2; ?>"></a>
                    <div class="card-texte">
                        <p class="bold"><?php echo $libTitrArt2; ?></p><br>
                        <p><?php echo $libChapoArt2; ?></p><br>
                    </div>
                    <a href="/views/frontend/articles/article2.php"><div class="bouton">
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