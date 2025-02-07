<?php
include '../../../header.php'; // contains the header and call to config.php

// Charger tous les likes
$query = "MEMBRE AS MB JOIN LIKEART AS LKA ON MB.numMemb = LKA.numMemb JOIN ARTICLE AS AR ON LKA.numArt = AR.numArt";
$tabloLikes = sql_select($query, "MB.numMemb, MB.pseudoMemb, AR.numArt, AR.libTitrArt, AR.libChapoArt, LKA.likeA");

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Likes des articles par les membres</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID Membre</th>
                        <th>Membre</th>
                        <th>Titre article</th>
                        <th>Chapô article</th>
                        <th>Statut (Liké/Unliké)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($tabloLikes as $unLike) { ?>
                        <tr>
                            <td><?php echo($unLike['numMemb']); ?></td>
                            <td><?php echo($unLike['pseudoMemb']); ?></td>
                            <td><?php echo($unLike['libTitrArt']); ?></td>
                            <td><?php echo($unLike['libChapoArt']); ?></td>
                            <td><?php echo($unLike['likeA'] == 1 ? 'Liké' : 'Non liké'); ?></td>
                            <td>
                                <a href="edit.php?numMemb=<?php echo($unLike['numMemb']); ?>&numArt=<?php echo($unLike['numArt']); ?>" class="btn btn-primary">Edit</a>
                                <a href="delete.php?numMemb=<?php echo($unLike['numMemb']); ?>&numArt=<?php echo($unLike['numArt']); ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="create.php" class="btn btn-success">Create</a>
        </div>
    </div>
</div>
