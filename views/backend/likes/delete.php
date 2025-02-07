<?php
include '../../../header.php';



// Vérifie et sécurise les entrées GET
$numMemb = isset($_GET['numMemb']) ? intval($_GET['numMemb']) : 0;
$numArt = isset($_GET['numArt']) ? intval($_GET['numArt']) : 0;

// Récupère le statut du like
$estLike = sql_select('LIKEART', 'likeA', 'numMemb = ' . $numMemb . ' AND numArt = ' . $numArt);
$likeStatus = (!empty($estLike) && $estLike[0]['likeA'] == 1) ? "Liké" : "Disliké";

// Récupère le titre de l'article
$plTitre = sql_select('ARTICLE', 'libTitrArt', 'numArt = ' . $numArt);
$plTitre = !empty($plTitre) ? $plTitre[0]['libTitrArt'] : 'Titre inconnu';

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Suppression du like</h1>
        </div>
        <div class="col-md-12">
            <!-- Formulaire pour supprimer un like -->
            <form action="<?php echo (ROOT_URL . '/api/likes/delete.php?numArt=' . $numArt); ?>" method="post" enctype="multipart/form-data">
                <div>
                    <label for="numArt">Membre ayant liké</label>
                    <input type="text" class="form-control" id="numArt" name="numArt" value="<?php echo ($numMemb); ?>" disabled>
                </div>
                <div class="form-group">
                    <input type="hidden" id="numMemb" name="numMemb" value="<?php echo ($numMemb); ?>">
                    <input type="hidden" id="numArt" name="numArt" value="<?php echo ($numArt); ?>">
                </div>
                <div class="form-group">
                    <label for="libTitrArt">Nom de l'article liké</label>
                    <input type="text" class="form-control" id="libTitrArt" name="libTitrArt" value="<?php echo ($plTitre); ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="likeStatus">Article liké ou non</label>
                    <input type="text" class="form-control" id="likeStatus" name="likeStatus" value="<?php echo ($likeStatus); ?>" disabled>
                </div>
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>
</div>