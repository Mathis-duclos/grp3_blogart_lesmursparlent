<?php
include '../../../header.php';

if(isset($_GET['numThem'])){
    $numThem = $_GET['numThem'];
    $libThem = sql_select("THEMATIQUE", "libThem", "numThem = $numThem")[0]['libThem'];
}
?>

<!-- Bootstrap form to create a new statut -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Suppression Thématique</h1>
        </div>
        <div class="col-md-12">
            <!-- Form to create a new statut -->
            <form action="<?php echo ROOT_URL . '/api/thematiques/delete.php' ?>" method="post">
                <div class="form-group">
                    <label for="libThem">Nom du statut</label>
                    <input id="numThem" name="numThem" class="form-control" style="display: none" type="text" value="<?php echo($numThem); ?>" readonly="readonly" />
                    <input id="libThem" name="libThem" class="form-control" type="text" value="<?php echo($libThem); ?>" readonly="readonly" disabled />
                </div>
                <br />
                <div class="form-group mt-2">
                    <a href="list.php" class="btn btn-primary">List</a>
                    <button type="submit" class="btn btn-danger">Confirmer delete ?</button>
                </div>
            </form>
        </div>
    </div>
</div>