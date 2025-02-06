<?php
include '../../../header.php'; // contains the header and call to config.php

//Load all statuts
//$comments = sql_select("COMMENT", '*'); 


$query = "COMMENT CM INNER JOIN ARTICLE AR ON CM.numArt = AR.numArt INNER JOIN MEMBRE MB ON CM.numMemb = MB.numMemb";

//SELECT `libCom` FROM `COMMENT` WHERE `attModOK` = 1
//$waitCom = sql_select("COMMENT", "libCom", "AttModOK" == 1);
//$waitCom1= "SELECT `libCom` FROM `COMMENT` WHERE `attModOK` =1";
//$waitCom2= sql_select($waitCom1, "*");

//SELECT * FROM `COMMENT` WHERE `attModOK` = 0;

$commentsNoControl = sql_select($query, "*", 'AttModOK = 0 AND `delLogiq` = 0');
$commentsControl = sql_select($query, "*", 'AttModOK = 1');
$commentsDelLog = sql_select($query, "*", 'DelLogiq = 1');



?>

<!-- Bootstrap default layout to display all statuts in foreach -->
<div class="container" >
    <div class="row">
        <div class="col-md-12"> 

        <h1>Commentaires</h1>
        <a href="create.php" class="btn btn-success">Create</a>    

        </div>
    </div> 
</div>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">

<!-- COMMENTAIRES EN ATTENTES -->

            <h2>Commentaires en attente</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Ttitre Article</th>
                        <th>Pseudo</th>
                        <th>Date</th>
                        <th>Contenu</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach($commentsNoControl as $commentNoControl){?>
                        <tr>
                            <td><?php echo($commentNoControl['libTitrArt']); ?></td>
                            <td><?php echo($commentNoControl['pseudoMemb']); ?></td>
                            <td><?php echo($commentNoControl['dtCreaCom']); ?></td>
                            <td><?php echo($commentNoControl['libCom']); ?></td>
                            <td>
                                <a href="edit.php?numThem=<?php echo($commentNoControl['numCom']); ?>" class="btn btn-primary">Control</a>
                                <a href="delete.php?numThem=<?php echo($commentNoControl['numCom']); ?>" class="btn btn-primary disabled">Edit</a>
                            </td>
                        </tr>   
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- COMMENTAIRES CONTRÔLÉS -->


        <div class="col-md-12">
            <h2>Commentaires contrôlés</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Pseudo</th>
                        <th>Dernier Modif</th>
                        <th>Contenu</th>
                        <th>Publication</th>
                        <th>Raison refus</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($commentsControl as $commentControl){ ?>
                        <tr>
                            <td><?php echo($commentControl['pseudoMemb']); ?></td>
                            <td><?php echo($commentControl['dtModCom']); ?></td>
                            <td><?php echo($commentControl['libCom']); ?></td>
                            <td><?php echo($commentControl['attModOK']); ?></td>
                            <td><?php echo($commentControl['notifComKOAff']); ?></td>
                            <td>
                                <a href="delete.php?numThem=<?php echo($commentControl['numCom']); ?>" class="btn btn-primary disabled">Edit</a>
                            </td>
                        </tr>   
                    <?php } ?>
                </tbody>
            </table>
        </div>

            <!-- COMMENTAIRES SUPPRESSION LOGIQUE -->


            <div class="col-md-12">
            <h2> Supression logique</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Pseudo</th>
                        <th>Dernier suppr logique</th>
                        <th>Contenu</th>
                        <th>Publication</th>
                        <th>Raison refus</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($commentsDelLog as $commentDelLog){ ?>
                        <tr>
                            <td><?php echo($commentDelLog['pseudoMemb']); ?></td>
                            <td><?php echo($commentDelLog['dtDelLogCom']); ?></td>
                            <td><?php echo($commentDelLog['libCom']); ?></td>
                            <td><?php echo($commentDelLog['attModOK']); ?></td>
                            <td><?php echo($commentDelLog['notifComKOAff']); ?></td>
                            <td>
                                <a href="delete.php?numThem=<?php echo($commentDelLog['numCom']); ?>" class="btn btn-primary disabled">Edit</a>
                            </td>
                        </tr>   
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- COMMENTAIRES SUPPRESSION PHYSIQUE -->


        <div class="col-md-12">
            <h2> Supression PHYSIQUE</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Pseudo</th>
                        <th>Dernier suppr logique</th>
                        <th>Contenu</th>
                        <th>Publication</th>
                        <th>Raison refus</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($commentsDelLog as $commentDelLog){ ?>
                        <tr>
                            <td><?php echo($commentDelLog['pseudoMemb']); ?></td>
                            <td><?php echo($commentDelLog['dtDelLogCom']); ?></td>
                            <td><?php echo($commentDelLog['libCom']); ?></td>
                            <td><?php echo($commentDelLog['attModOK']); ?></td>
                            <td><?php echo($commentDelLog['notifComKOAff']); ?></td>
                            <td>
                                <a href="delete.php?numThem=<?php echo($commentDelLog['numCom']); ?>" class="btn btn-danger disabled">Delete</a>
                            </td>
                        </tr>   
                    <?php } ?>
                </tbody>
            </table>
        </div>


    </div>
</div>
<?php
include '../../../footer.php'; // contains the footer