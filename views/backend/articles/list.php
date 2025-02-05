<?php
include '../../../header.php'; // contains the header and call to config.php

//Load all statuts
$query = "ARTICLE AR INNER JOIN THEMATIQUE TH ON AR.numThem = TH.numThem";
$articles = sql_select($query, "*");

//SELECT * FROM ARTICLE AR INNER JOIN MOTCLEARTICLE MCA ON AR.numArt = MCA.numArt INNER JOIN MOTCLE MC ON MCA.numMotCle = MC.numMotCle;

$query2 = "ARTICLE AR INNER JOIN MOTCLEARTICLE MCA ON AR.numArt = MCA.numArt INNER JOIN MOTCLE MC ON MCA.numMotCle = MC.numMotCle";


//echo "<pre>";
//var_dump($keywords);
//echo"</pre>";

// SELECT libThem FROM THEMATIQUE INNER JOIN ARTICLE WHERE 'numThem' = 'numThem';
?>

<!-- Bootstrap default layout to display all statuts in foreach -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Articles</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Date de création</th>
                        <th>Nom des Articles</th>
                        <th>Chapeau</th>
                        <th>Accroche</th>
                        <th>Mots-clés</th>
                        <th>Thématiques</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($articles as $article){ ?>
                        <tr>
                            <td><?php echo($article['numArt']); ?></td>
                            <td><?php echo($article['dtCreaArt']); ?></td>
                            <td><?php echo($article['libTitrArt']); ?></td>
                            <td><?php echo($article['libChapoArt']); ?></td>
                            <td><?php echo($article['libAccrochArt']); ?></td>
                            <td>
                                <?php 
                                    $numArt = $article['numArt'];
                                    $keywords = sql_select($query2, "libMotCle", "AR.numArt = $numArt");
                                    foreach($keywords as $keyword){
                                        echo($keyword['libMotCle'] . ", ");
                                    }
                                ?>
                            </td>
                            <td><?php echo($article['libThem']); ?></td>
                            <td>
                                <a href="edit.php?numArt=<?php echo($article['numArt']); ?>" class="btn btn-primary">Edit</a>
                                <a href="delete.php?numArt=<?php echo($article['numArt']); ?>" class="btn btn-danger ">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a href="create.php" class="btn btn-success">Create</a>
            </div>
        </div>
    </div>
    <?php
include '../../../footer.php'; // contains the footer