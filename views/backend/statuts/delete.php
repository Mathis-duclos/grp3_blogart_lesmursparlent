<?php
include '../../../header.php';

if (isset($_GET['numStat'])) {
    $numStat = intval($_GET['numStat']); // Sécurisation
    $statut = sql_select("STATUT", "libStat", "numStat = $numStat");
    $libStat = (!empty($statut)) ? $statut[0]['libStat'] : "Statut introuvable";

    // Vérifie s'il existe des membres associés à ce statut
    $membresAssocies = sql_select("MEMBRE", "COUNT(*) as total", "numStat = $numStat");
    $nbMembres = $membresAssocies[0]['total'];
} else {
    echo "Numéro de statut manquant.";
    exit;
}
?>

<!-- Bootstrap form to delete a statut -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Suppression Statut</h1>
        </div>
        <div class="col-md-12">
            <form action="<?php echo ROOT_URL . '/api/statuts/delete.php'; ?>" method="post">
                <div class="form-group">
                    <label for="libStat">Nom du statut</label>
                    <input id="numStat" name="numStat" class="form-control" style="display: none" type="text" value="<?php echo($numStat); ?>" readonly="readonly">
                    <input id="libStat" name="libStat" class="form-control" type="text" value="<?php echo($libStat); ?>" readonly="readonly" disabled>
                </div>
                <br>
                <?php if ($nbMembres > 0): ?>
                    <!-- Message d'erreur si des membres sont associés -->
                    <p style="color: red;" class="message-erreur">
                        Remarque : Suppression impossible, il existe <?php echo $nbMembres; ?> membre(s) associé(s) à ce statut.
                    </p>
                <?php endif; ?>
                <div class="form-group mt-2">
                    <a href="list.php" class="btn btn-primary">Retour à la liste</a>
                    <button type="submit" class="btn btn-danger" <?php echo ($nbMembres > 0) ? 'disabled' : ''; ?>>Confirmer la Suppression ?</button>
                </div>
            </form>
        </div>
    </div>
</div>