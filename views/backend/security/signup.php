<?php
include '../../../header.php';

echo("Form signup");

?> 
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Inscription</h1>
        </div>
        <div class="col-md-12">
            <!-- Form pour création de membre -->
            <form action="<?php echo ROOT_URL . '/api/security/signup.php' ?>" method="post" onsubmit="return checkForm()">
                <div class="form-group">
                    <label for="title">Pseudo non modifiable</label>
                    <input type="text" class="form-control" id="pseudoMemb" name="pseudoMemb" maxlength="100" placeholder="100 caracteres max" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="title">Prénom</label>
                    <input type="text" class="form-control" id="prenomMemb" name="prenomMemb" maxlength="100" placeholder="100 caracteres max" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="title">Nom</label>
                    <input type="text" class="form-control" id="nomMemb" name="nomMemb" maxlength="100" placeholder="100 caracteres max" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="title">eMail</label>
                    <input type="text" class="form-control" id="eMailMemb" name="eMailMemb" maxlength="100" placeholder="100 caracteres max" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="title">Confirmez eMail</label>
                    <input type="text" class="form-control" id="confMailMemb" name="confMailMemb" maxlength="100" placeholder="100 caracteres max" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="title">Mot de passe</label>
                    <input type="text" class="form-control" id="passMemb" name="passMemb" maxlength="100" placeholder="100 caracteres max" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="title">Confirmez mot de passe</label>
                    <input type="text" class="form-control" id="confPassMemb" name="confPassMemb" maxlength="100" placeholder="100 caracteres max" required>
                </div>
                <br>
                <div class="form-group">
                    <label>Accord</label>
                    <div class="form-check">
                        <input type="radio" id="accord1" name="accordMemb" value="1" class="form-check-input" required>
                        <label class="form-check-label" for="accord1">Oui</label>
                    </div>
                    <br>
                    <div class="form-check">
                        <input type="radio" id="accord0" name="accordMemb" value="0" class="form-check-input">
                        <label class="form-check-label" for="accord0">Non</label>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary mt-3">Créer le compte</button>
    </form>


