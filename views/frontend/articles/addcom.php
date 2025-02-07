<?php
include '../../../header.php';

$query = "COMMENT CM INNER JOIN ARTICLE AR ON CM.numArt = AR.numArt INNER JOIN MEMBRE MB ON CM.numMemb = MB.numMemb";
$commentsInf = sql_select($query, "*");

$numArt = $_GET['numArt'] ;

$article = sql_select("ARTICLE", "libTitrArt", "numArt = $numArt");
$titreArticle = !empty($article) ? $article[0]['libTitrArt'] : "Article introuvable";


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
            <h1> Ajouter un commentaire à l'article</h1>
        </div>
        <div class="col-md-12">
            <!-- Form to create a new article -->
            <form action="<?php echo ROOT_URL . '/api/comments/create_com_memb.php?numArt=' . $numArt; ?>" method="post" enctype="multipart/form-data">
            
                <div class="form-group">
                    <label for="title">Pseudo</label>
                    <input type="text" class="form-control" id="pseudoMemb" name="pseudoMemb" maxlength="100" value=" <?php  echo $_SESSION['pseudoMemb']; ?>" readonly>
                    <input id="numMemb" name="numMemb" class="form-control" style="display: none" type="text" value="<?php echo $numMemb; ?>"/>
                </div>

                <div class="form-group">
                    <label for="title">Prénom</label>
                    <input type="text" class="form-control" id="prenomMemb" name="prenomMemb" maxlength="100" value=" <?php  echo $prenomMemb ?>" readonly >
                </div>

                
                <div class="form-group">
                    <label for="title">Nom</label>
                    <input type="text" class="form-control" id="nomMemb" name="nomMemb" maxlength="100" value=" <?php  echo $nomMemb ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="title"> Article</label>
                    <input type="text" class="form-control" id="libTitrArt" name="libTitrArt" maxlength="100" value="<?php echo htmlspecialchars($titreArticle); ?>" readonly>
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