<?php 

require_once 'header.php';
sql_connect();


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
    <section class="a-la-une">
        <div class="titre">
            <h2>ARTICLES</h2>
            <img src="src/svg/fleche-titre.svg">
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
                    <span class=bouton>Voir l'article</span>
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
                    <span class=bouton>Voir l'article</span>
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
            <a href="#"><div class="bouton">
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
            <form>
                <div class="form-top">
                    <div class="mb-3">
                        <label for="Jean Moulin" class="form-label">Votre nom et prénom :</label>
                        <input placeholder="ex: Jean Moulin" type="name" class="custom-form" id="exampleInputName1" aria-describedby="nameHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Votre adresse e-mail :</label>
                        <input placeholder="ex: jean.moulin@gmail.com" type="email" class="custom-form" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputMessage1" class="form-label">Votre message :</label>
                    <textarea id="story" name="story" rows="8" cols="33" class="custom-form-message"></textarea>
                </div>
                <a href="#"><div class="bouton">
                    <span class=bouton>ENVOYER</span>
                    <img class=bouton-image src="src/svg/fleche-bouton.svg">
                </div></a>                
            </form>
        </div>
    </section>
    <?php require_once 'footer.php'; ?>
</main>