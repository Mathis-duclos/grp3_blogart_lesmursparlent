<?php
include '../../../header.php'; // Contient le header et la configuration

// Charger les membres et les articles depuis la base de données
$membres = sql_select("MEMBRE", "numMemb, pseudoMemb");
$articles = sql_select("ARTICLE", "numArt, libTitrArt");?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Création nouveau like</h1>
        </div>
        <div class="col-md-12">
            <!-- Formulaire pour créer un nouveau like -->
            <form action="<?php echo ROOT_URL . '/api/likes/create.php' ?>" method="post">
                <!-- Liste déroulante pour les membres -->
                <div class="form-group">
                    <label for="numMemb">Sélectionnez un membre</label>
                    <select id="numMemb" name="numMemb" class="form-control" required>
                        <option value="">-- Choisir un membre --</option>
                        <?php foreach ($membres as $membre) { ?>
                            <option value="<?php echo $membre['numMemb']; ?>">
                                <?php echo $membre['pseudoMemb']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <!-- Liste déroulante pour les articles -->
                <div class="form-group mt-3">
                    <label for="numArt">Sélectionnez un article</label>
                    <select id="numArt" name="numArt" class="form-control" required>
                        <option value="">-- Choisir un article --</option>
                        <?php foreach ($articles as $article) { ?>
                            <option value="<?php echo $article['numArt']; ?>">
                                <?php echo $article['libTitrArt']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <!-- Boutons de validation -->
                <div class="form-group mt-4">
                    <a href="list.php" class="btn btn-primary">Retour à la liste</a>
                    <button type="submit" class="btn btn-success">Créer le like</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include '../../../footer.php';
?>