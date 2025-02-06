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

        <h1>Contrôle commentaire en attente : à valider</h1>   

        </div>
    </div> 
</div>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <tbody>

                <h3> Titre de l'Article</h3>
                        <p> <?php echo $commentsNoControl['libTitrArt']; ?> </p>
                <br>
                <h3> Informations commentaires</h3>
                <p> Nom d'utilisateur : </p>
                <p> <?php echo ($commentsNoControl['pseudoMemb']); ?> </p>
                <p> Date de création : </p>
                <p> <?php echo ($commentsNoControl['dtCreaCom']); ?> </p>
                <br>
                <h3> Contenu du commentaire </h3>
                <textarea class="form-control" id="libCom" name="libCom" maxlength="1200" rows="6" cols="6" disabled ><?php  echo ($commentsNoControl['libCom']) ?> </textarea>
                <br>
                <h3> Validation du commentaire </h3>
                
                <div class="form-group">
                    
                    <div class="form-check">
                        <input type="radio" id="attModOK" name="attModOK" value="1" class="form-check-input" required>
                        <label class="form-check-label" for="attModOK1">Valider le commentaire</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="attModOK" name="attModOK" value="0" class="form-check-input">
                        <label class="form-check-label" for="attModOK0">Refuser le commentaire</label>
                    </div>
                <br>
                <h3> Raison du refus </h3>
                <p> A remplir seulement si le commentaire est refusé </p>
                <textarea class="form-control" id="notifComKOAff" name="notifComKOAff" maxlength="1200" rows="6" cols="6"></textarea>
                
                <br>

                <tr>
                    <a href="../../../api/comments/control.php" class="btn btn-warning">Control</a>
                    <a href="list.php" class="btn btn-primary">List</a>
                </tr>

                    
                </tbody>
            </table>
        </div>
        </div>


    </div>
</div>
<?php
include '../../../footer.php'; // contains the footer