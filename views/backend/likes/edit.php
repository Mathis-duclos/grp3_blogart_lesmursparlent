<?php
include '../../../header.php';

// Vérifie et sécurise les entrées GET
$numMemb = isset($_GET['numMemb']) ? intval($_GET['numMemb']) : 0;
$numArt = isset($_GET['numArt']) ? intval($_GET['numArt']) : 0;

// Récupère le statut du like
$estLike = sql_select('LIKEART', 'likeA', 'numMemb = ' . $numMemb . ' AND numArt = ' . $numArt);
$likeStatus = (!empty($estLike) && $estLike[0]['likeA'] == 1) ? 1 : 0;

// Récupère le titre de l'article
$plTitre = sql_select('ARTICLE', 'libTitrArt', 'numArt = ' . $numArt);
$plTitre = !empty($plTitre) ? $plTitre[0]['libTitrArt'] : 'Titre inconnu';

// Récupère le pseudo de l'utilisateur
$membrePseudo = sql_select('MEMBRE', 'pseudoMemb', 'numMemb = ' . $numMemb);
$membrePseudo = !empty($membrePseudo) ? $membrePseudo[0]['pseudoMemb'] : 'Utilisateur inconnu';
?>

<!-- Formulaire de modification du like -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Modification du statut du Like</h1>
        </div>
        <div class="col-md-12">
            <form action="<?php echo ROOT_URL . '/api/likes/update.php'; ?>" method="post">
                <div class="form-group">
                    <!-- Informations sur le membre -->
                    <label for="numMemb">Membre ayant liké</label>
                    <input type="text" class="form-control" id="numMemb" value="<?php echo htmlspecialchars($membrePseudo); ?>" disabled>
                    <input type="hidden" id="numMembHidden" name="numMemb" value="<?php echo htmlspecialchars($numMemb); ?>">
                </div>
                <div class="form-group">
                    <!-- Informations sur l'article -->
                    <label for="numArt">Nom de l'article liké</label>
                    <input type="text" class="form-control" id="numArt" value="<?php echo htmlspecialchars($plTitre); ?>" disabled>
                    <input type="hidden" id="numArtHidden" name="numArt" value="<?php echo htmlspecialchars($numArt); ?>">
                </div>
                <div class="form-group">
                    <!-- Statut du like -->
                    <label for="likeA">Statut du Like</label>
                    <select id="likeA" name="likeA" class="form-control">
                        <option value="1" <?php echo ($likeStatus == 1) ? 'selected' : ''; ?>>Liké</option>
                        <option value="0" <?php echo ($likeStatus == 0) ? 'selected' : ''; ?>>Disliké</option>
                    </select>
                </div>
                <br />
                <div class="form-group mt-2">
                    <a href="list.php" class="btn btn-primary">Retour à la liste</a>
                    <button type="submit" class="btn btn-success">Confirmer modification</button>
                </div>
            </form>
        </div>
    </div>
</div>