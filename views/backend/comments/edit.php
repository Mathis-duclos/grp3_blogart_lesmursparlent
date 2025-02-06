<?php
include '../../../header.php'; // contains the header and call to config.php

//Load all statuts
//$comments = sql_select("COMMENT", '*'); 

$numCom = intval($_GET['numCom']);
$query = "COMMENT CM INNER JOIN ARTICLE AR ON CM.numArt = AR.numArt INNER JOIN MEMBRE MB ON CM.numMemb = MB.numMemb";

$commentsNoControl = sql_select($query, "*", 'numCom = ' . $numCom)[0];


?>
<!-- Bootstrap default layout to display all statuts in foreach -->
<div class="container" >
    <div class="row">
        <div class="col-md-12"> 

        <h1>Contrôle commentaire en attente : modifier</h1>   

        </div>
    </div> 
</div>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                
            <form action="<?php echo ROOT_URL . '/api/comments/update.php?numCom='. $numCom ?>" method="post" enctype="multipart/form-data">
                <tbody> 

                <h3> Titre de l'Article</h3>
                        <p> <?php echo $commentsNoControl['libTitrArt']; ?> </p>
                <br>
                <h3> Informations commentaires</h3>
                <p> Nom d'utilisateur : </p>
                <p> <?php echo ($commentsNoControl['pseudoMemb']); ?> </p>
                <br>
                <p> Numéro du commentaire  : </p>
                <p> <?php echo ($commentsNoControl['numCom']); ?> </p>
                <br>
                <p> Date de création : </p>
                <p> <?php echo ($commentsNoControl['dtCreaCom']); ?> </p>
                <br>
                <h3> Contenu du commentaire </h3>
                <textarea class="form-control" id="libCom" name="libCom" maxlength="1200" rows="6" cols="6" disabled ><?php  echo ($commentsNoControl['libCom']) ?> </textarea>
                <br>
                <h3> Validation du commentaire </h3>
                <h4> En tant que modérateur je valide le commentaire ?</h4>
                
                <div class="form-group">
                    
                    <div class="form-check">
                        <input type="radio" id="attModOK" name="attModOK" value="1" class="form-check-input" required >
                        <label class="form-check-label" for="attModOK1">Oui</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="attModOK" name="attModOK" value="0" class="form-check-input">
                        <label class="form-check-label" for="attModOK0">Non</label>
                    </div>
                <br>
                <h3> Raison du refus </h3>
                <p> A remplir seulement si le commentaire est refusé </p>
                <textarea class="form-control" id="notifComKOAff" name="notifComKOAff" maxlength="1200" rows="6" cols="6"></textarea>
                
                <br>

                <h3> En tant que modérateur, je souhaite que le post ne soit pas/plus affiché (suppression logique) : </h3>
                
                <div class="form-group">
                    
                    <div class="form-check">
                        <input type="radio" id="delLogiq" name="delLogiq" value="1" class="form-check-input" required >
                        <label class="form-check-label" for="delLogiq">Oui</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="delLogiq" name="delLogiq" value="0" class="form-check-input">
                        <label class="form-check-label" for="delLogiq">Non</label>
                    </div>

                <tr>
                    <button href="../../../api/comments/update.php" class="btn btn-warning">Confirmer Edit</button>
                    <a href="list.php" class="btn btn-primary">List</a>
                </tr>

                    
                </tbody>
                </form>
            </table>
        </div>
        </div>


    </div>
</div>
<?php
include '../../../footer.php'; // contains the footer