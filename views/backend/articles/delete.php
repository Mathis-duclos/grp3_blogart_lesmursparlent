<?php
include '../../../header.php';

$numArt = $_GET['numArt'];

$emplacement = sql_select('ARTICLE', 'urlPhotArt', "numArt = $numArt")[0]['urlPhotArt'];
$plTitre = sql_select('ARTICLE', 'libTitrArt', "numArt = $numArt")[0]['libTitrArt'];
$plDtCrea = sql_select('ARTICLE', 'dtCreaArt', "numArt = $numArt")[0]['dtCreaArt'];
$plChapo = sql_select('ARTICLE', 'libChapoArt', "numArt = $numArt")[0]['libChapoArt'];
$plAccr = sql_select('ARTICLE', 'libAccrochArt', "numArt = $numArt")[0]['libAccrochArt'];
$plP1 = sql_select('ARTICLE', 'parag1Art', "numArt = $numArt")[0]['parag1Art'];
$plSt1 = sql_select('ARTICLE', 'libSsTitr1Art', "numArt = $numArt")[0]['libSsTitr1Art'];
$plP2 = sql_select('ARTICLE', 'parag2Art', "numArt = $numArt")[0]['parag2Art'];
$plSt2 = sql_select('ARTICLE', 'libSsTitr2Art', "numArt = $numArt")[0]['libSsTitr2Art'];
$plP3 = sql_select('ARTICLE', 'parag3Art', "numArt = $numArt")[0]['parag3Art'];
$plCl = sql_select('ARTICLE', 'libConclArt', "numArt = $numArt")[0]['libConclArt'];

?>

<!-- Bootstrap form to create a new statut -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Supression article</h1>
        </div>
        <div class="col-md-12">
            
            <!-- Form to Edit an article -->
            <form action="<?php echo ROOT_URL . '/api/articles/update.php?numArt='.$numArt ?>" enctype="multipart/form-data"method="post" >
                <div>
                    <label for="numArt">NUMÉRO</label>
                    <input type="text" class="form-control" id="numArt" name="numArt" maxlength="10" value="<?php echo $numArt ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="title">Titre</label>
                    <input type="text" class="form-control" id="libTitrArt" name="libTitrArt" maxlength="100" value="<?php echo $plTitre ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="creation_date">Date de création</label>
                    <input type="date" class="form-control" id="dtCreaArt" name="<?php echo $plDtCrea ?>" disabled>
                </div>
                <div class="form-group"> 
                    <label for="maj_date">Date de MISE À JOUR DE L'ARTICLE</label>
                    <input type="date" class="form-control" id="dtMajArt" name="dtMajArt" disabled>
                </div>
                <div class="form-group">
                    <label for="chapeau">Chapô</label>
                    <textarea class="form-control" id="libChapoArt" name="libChapoArt" maxlength="500" rows="10" cols="10" disabled> <?php echo $plChapo ?> </textarea>
                </div>
                <div class="form-group">
                    <label for="libAccrochArt">Accroche paragraphe 1</label>
                    <input type="text" class="form-control" id="libAccrochArt" name="libAccrochArt" maxlength="100" value="<?php echo $plAccr ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="parag1Art">Paragraphe 1</label>
                    <textarea class="form-control" id="parag1Art" name="parag1Art" maxlength="1200"  rows="10" cols="10" disabled> <?php echo $plP1 ?> </textarea>
                </div>
                <div class="form-group">
                <div class="form-group">
                    <label for="libSsTitr1Art">Sous-titre 1</label>
                    <input type="text" class="form-control" id="libSsTitr1Art" name="libSsTitr1Art" maxlength="100" value="<?php echo $plSt1 ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="parag2Art">Paragraphe 2</label>
                    <textarea class="form-control" id="parag2Art" name="parag2Art" maxlength="1200" rows="10" cols="10" disabled> <?php echo $plP2 ?> </textarea>
                </div>
                <div class="form-group">
                    <label for="libSsTitr2Art">Sous-titre 2</label>
                    <input type="text" class="form-control" id="libSsTitr2Art" name="libSsTitr2Art" maxlength="100" value="<?php echo $plSt2 ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="parag3Art">Paragraphe 3</label>
                    <textarea class="form-control" id="parag3Art" name="parag3Art" maxlength="1200" rows="10" cols="10" disabled> <?php echo $plP3 ?> </textarea>
                </div>
                <div class="form-group">
                    <label for="libConclArt">Conclusion</label>
                    <textarea class="form-control" id="libConclArt" name="libConclArt" maxlength="800" rows="10" cols="10" disabled> <?php echo $plCl ?> </textarea>
                </div>
                <div class="form-group">
                    <!-- liste déroulante pour sélectionner la thématique -->
                    <label for="numThem">Thématique</label>
                    <select class="form-control" id="numThem" name="numThem" disabled>
                        <?php
                        $themes = sql_select('THEMATIQUE', 'numThem, libThem', '1');
                        foreach ($themes as $theme) {
                            echo '<option value="' . $theme['numThem'] . '">' . $theme['libThem'] . '</option>';
                        }
                        ?>
                </div>
                <!-- Upload de l'image -->
                <div class="form-group">
                    <label for="urlPhotArt">Image d’illustration</label>
                    <input type="file" class="form-control-file" id="urlPhotArt" name="urlPhotArt" accept="image/*" disabled>
                </div>
                <div> <!-- MONTER LA PHOTO ACTUELLE -->
                    <img src="<?php echo '../../../src/uploads/' . $emplacement ?>" alt="photo actuelle" style="width: 100px;">
                </div>
                <button type="submit" class="btn btn-danger disabled">Supprimer</button>
                </form>
        </div>
    </div>
</div>