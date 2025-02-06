<?php
include '../../../header.php'; // contains the header and call to config.php

//Load all statuts
$membres = sql_select("MEMBRE", "*"); 
?>

<!-- Bootstrap default layout to display all statuts in foreach -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Membres</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Pseudo</th>
                        <th>Email</th>
                        <th>Accord</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($membres as $membre){ ?>
                        <tr>
                            <td><?php echo($membre['numMemb']); ?></td>
                            <td><?php echo($membre['prenomMemb']); ?></td>
                            <td><?php echo($membre['nomMemb']); ?></td>
                            <td><?php echo($membre['pseudoMemb']); ?></td>
                            <td><?php echo($membre['eMailMemb']); ?></td>
                            <td><?php echo($membre['accordMemb']); ?></td>
                            <td>
                                <a href="edit.php?numThem=<?php echo($membre['numMemb']); ?>" class="btn btn-primary">Edit</a>
                                <a href="delete.php?numThem=<?php echo($membre['numMemb']); ?>" class="btn btn-danger disabled">Delete</a>
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