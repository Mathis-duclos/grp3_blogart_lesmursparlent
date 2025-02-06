<?php
include '../../../header.php'; // contains the header and call to config.php

//Load all statuts
$like = sql_select("LIKEART", "*"); 
?>

<?php
//$tablo1 = sql_select('MOTCLE', 'numMotCle, libMotCle', '1');
//$query = "MOTCLE AS MC JOIN  MOTCLEARTICLE AS MCA ON MC.numMotCle = MCA.numMotCle JOIN ARTICLE AS AR ON MCA.numArt = AR.numArt" ;
//$tablo2 = sql_select($query , "libMotCle", "MCA.numArt = $numArt");

$queryNmMbr = sql_select('LIKEART', 'numMemb',);
$nomMmbr = $query[0];


var_dump($queryNmMbr);

?>

<!-- Bootstrap default layout to display all statuts in foreach -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Membres</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nom du mmbr</th>
                        <th>Titre Article</th>
                        <th>Chapô Article</th>
                        <th>Statut (Liké/Unliké) </th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($likes as $like){ ?>
                        <tr>
                            <td><?php echo($like['numMemb']); ?></td>
                            <td><?php echo($like['prenomMemb']); ?></td>
                            <td><?php echo($like['nomMemb']); ?></td>
                            <td><?php echo($like['pseudoMemb']); ?></td>
                            <td><?php echo($like['eMailMemb']); ?></td>
                            <td><?php echo($like['accordMemb']); ?></td>
                            <td>
                                <a href="edit.php?numThem=<?php echo($like['numMemb']); ?>" class="btn btn-primary">Edit</a>
                                <a href="delete.php?numThem=<?php echo($like['numMemb']); ?>" class="btn btn-danger disabled">Delete</a>
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