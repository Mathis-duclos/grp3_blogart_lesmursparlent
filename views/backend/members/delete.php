<?php
include '../../../header.php';


if (isset($_GET['numMemb'])) {
    $numMemb = intval($_GET['numMemb']); // Conversion en entier 
    $membre = sql_select("MEMBRE", "prenomMemb", "numMemb = $numMemb");
    $prenomMemb = (!empty($membre)) ? $membre[0]['prenomMemb'] : "Membre introuvable";
} else {
    echo "Numéro du membre manquant.";
    exit;
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Suppression du membre</h1>
        </div>
        <div class="col-md-12">
            <form action="<?php echo ROOT_URL . '/api/members/delete.php'; ?>" method="post">
                <div class="form-group">
                    <label for="prenomMemb">Prénom du membre</label>
                    <input id="prenomMemb" class="form-control" type="text" value="<?php echo ($prenomMemb); ?>" readonly="readonly">
                    <input type="hidden" id="numMemb" name="numMemb" value="<?php echo ($numMemb); ?>">
                    <input type="hidden" name="prenomMemb" value="<?php echo ($prenomMemb); ?>">
                </div>
                <br />
                <div class="form-group mt-2">
                    <a href="list.php" class="btn btn-primary">Retour à la liste</a>
                    <button type="submit" class="btn btn-danger">Confirmer suppression</button>
                </div>
            </form>
        </div>
    </div>
</div>