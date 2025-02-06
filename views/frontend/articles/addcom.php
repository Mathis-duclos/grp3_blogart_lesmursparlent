<?php
include '../../../header.php';

$query = "COMMENT CM INNER JOIN ARTICLE AR ON CM.numArt = AR.numArt INNER JOIN MEMBRE MB ON CM.numMemb = MB.numMemb";
$commentsInf = sql_select($query, "*");


$pseudoMemb = $_SESSION['pseudoMemb'];


if (isset($pseudoMemb)) {
    $membre = sql_select("MEMBRE", "*", "pseudoMemb = '" . $pseudoMemb . "'");

    $prenomMemb = $membre[0]['prenomMemb'];
    $nomMemb = $membre[0]['nomMemb'];
    $numMemb = $membre[0]['numMemb'];

}



?>

<!-- A -->
<!-- Bootstrap form to create a new article -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Création commentaire</h1>
        </div>
        <div class="col-md-12">
            <!-- Form to create a new article -->
            <form action="<?php echo ROOT_URL . '/api/comments/create.php' ?>" method="post" enctype="multipart/form-data">
            
                <div class="form-group">
                    <label for="title">Pseudo</label>
                    <input type="text" class="form-control" id="pseudoMemb" name="pseudoMemb" maxlength="100" value=" <?php  echo $_SESSION['pseudoMemb']; ?>" disabled>
                    <input id="numMemb" name="numMemb" class="form-control" style="display: none" type="text" value="<?php echo $numMemb; ?>"/>
                </div>

                <div class="form-group">
                    <label for="title">Prénom</label>
                    <input type="text" class="form-control" id="prenomMemb" name="prenomMemb" maxlength="100" value=" <?php  echo $prenomMemb ?>" disabled >
                </div>

                
                <div class="form-group">
                    <label for="title">Nom</label>
                    <input type="text" class="form-control" id="nomMemb" name="nomMemb" maxlength="100" value=" <?php  echo $nomMemb ?>" disabled>
                </div>

                <div class="form-group">

                    <!-- liste déroulante pour sélectionner l'article -->
                    <label for="numArt">Liste des Articles</label>
                    <select class="form-control" id="numArt" name="numArt" required>
                        <?php
                        $articles = sql_select('ARTICLE', "*");
                        foreach ($articles as $key => $article) {
                            echo "<option value='". $article['numArt'] ."'>". $article['libTitrArt'] ."</option>";
                        }

                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="parag3Art">Commentaire </label>
                    <textarea class="form-control" id="libCom" name="libCom" maxlength="1200" rows="6" cols="6" placeholder="Saisissez votre commentaire" required></textarea>
                </div>
                        <br>
                <button type="submit" class="btn btn-success">Confirmer</button>
            </form>
        </div>

        <div class="container" >
    <div class="row">
        <div class="col-md-12"> 

        <br>

        <h3>Commentaires de l'article : </h3> 




        </div>
    </div> 
</div>

    </div>
</div>