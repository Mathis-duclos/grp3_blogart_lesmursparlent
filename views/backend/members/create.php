<?php
include '../../../header.php';

$membres = sql_select('MEMBRE', '*');
$statuts = sql_select('STATUT', '*');
?>

<script>
    function togglePasswordVisibility(passId, visuId) {
        var passInput = document.getElementById(passId);
        var visuCheckbox = document.getElementById(visuId);

        if (visuCheckbox.checked) {
            passInput.type = 'text';
        } else {
            passInput.type = 'password';
        }
    }
</script>

<script>
    function checkForm() {
        var pass = document.getElementById("passMemb").value;
        var confirmPass = document.getElementById("passMemb2").value;
        var email = document.getElementById("eMailMemb").value;
        var confirmEmail = document.getElementById("eMailMemb2").value;
        
        var passwordErrorDiv = document.getElementById("passwordError");
        var emailErrorDiv = document.getElementById("emailError");
        var accordErrorDiv = document.getElementById("accordError");

        var isValid = true;

        // Vérification des mots de passe
        if (pass !== confirmPass) {
            passwordErrorDiv.style.display = "block";
            isValid = false;
        } else {
            passwordErrorDiv.style.display = "none";
        }

        // Vérification des emails
        if (email !== confirmEmail) {
            emailErrorDiv.style.display = "block";
            isValid = false;
        } else {
            emailErrorDiv.style.display = "none";
        }

        // Vérification de l'accord (doit être "Oui")
        var accordOui = document.getElementById("accord1").checked;
        var accordNon = document.getElementById("accord0").checked;

        if (accordNon) { 
            accordErrorDiv.style.display = "block";
            isValid = false;
        } else {
            accordErrorDiv.style.display = "none";
        }

        return isValid;
    }
</script>

<script>
    function validatePassword() {
    var pass = document.getElementById("passMemb").value;
    var passwordErrorDiv = document.getElementById("passwordError");

    // Regex pour valider le mot de passe (au moins une minuscule, une majuscule, un chiffre et un caractère spécial)
    var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,15}$/;

    if (!passwordPattern.test(pass)) {
        passwordErrorDiv.innerHTML = "Le mot de passe doit contenir une majuscule, une minuscule, un chiffre et un caractère spécial.";
        passwordErrorDiv.style.display = "block";
        return false;
    } else {
        passwordErrorDiv.style.display = "none";
        return true;
    }
}
</script>




<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Création d'un membre</h1>
        </div>
        <div class="col-md-12">
                <form action="<?php echo ROOT_URL . '/api/members/create.php' ?>" method="post" onsubmit="return checkForm() && validatePassword()">
                <div class="form-group">
                    <label for="prenomMemb">Prénom</label>
                    <input id="prenomMemb" name="prenomMemb" class="form-control" type="text" required />
                </div>
                <br/>
                <div class="form-group">
                    <label for="nomMemb">Nom</label>
                    <input id="nomMemb" name="nomMemb" class="form-control" type="text" required />
                </div>
                <br/>
                <div class="form-group">
                    <label for="pseudoMemb">Pseudo</label>
                    <input id="pseudoMemb" name="pseudoMemb" maxlength='70' minlength = '6' class="form-control" type="text" required />
                    <small id="pseudoHelp" class="form-text text-muted">(Le pseudo doit avoir entre 6 et 70 caractères.)</small>
                </div>
                <br/>
                <div class="form-group">
                    <label for="passMemb">Mot de passe</label>
                    <input id="passMemb" name="passMemb" maxlength='15' minlength='8' class="form-control" type="password" required />
                    <small id="passHelp" class="form-text text-muted">(il doit être compris entre 8 et 15 caractères. Il doit avoir au moins une majuscule, une minuscule, un caractère spécial et un chiffre. Les caractères spéciaux sont acceptés.)</small>
                </div>
                <div class="form-group">
                    <input type="checkbox" id="Mdp1" name="Mdp" onchange="togglePasswordVisibility('passMemb', 'Mdp1')">
                    <label for="Mdp1">Afficher le mot de passe</label>
                </div>
                <br/>
                <div class="form-group">
                    <label for="passMemb2">Confirmer le mot de passe</label>
                    <input id="passMemb2" name="passMemb2" class="form-control" type="password" autofocus="autofocus">
                </div>
                <div class="form-group">
                    <input type="checkbox" id="Mdp2" name="Mdp" onchange="togglePasswordVisibility('passMemb2', 'Mdp2')">
                    <label for="Mdp2">Afficher le mot de passe</label>
                </div>
                <br/>
                <div id="passwordError" style="color: red; font-weight: bold; display: none;">
                    Les mots de passe ne correspondent pas !
                </div>
                <br/>
                <div class="form-group">
                    <label for="eMailMemb">Email</label>
                    <input id="eMailMemb" name="eMailMemb" class="form-control" type="email" required />
                </div>
                <br/>
                <div class="form-group">
                    <label for="eMailMemb2">Confimation de votre mail</label>
                    <input id="eMailMemb2" name="eMailMemb2" class="form-control" type="text" required></input>
                </div>
                <br/>
                <div id="emailError" style="color: red; font-weight: bold; display: none;">
                    Les emails ne correspondent pas !
                </div>
                <br/>
                <div class="form-group">
                    <label>Accord</label>
                    <div class="form-check">
                        <input type="radio" id="accord1" name="accordMemb" value="1" class="form-check-input" required>
                        <label class="form-check-label" for="accord1">Oui</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="accord0" name="accordMemb" value="0" class="form-check-input">
                        <label class="form-check-label" for="accord0">Non</label>
                    </div>
                </div>
                <br/>
                <div id="accordError" style="color: red; font-weight: bold; display: none;">
                    Vous devez accepter l'accord en sélectionnant "Oui" pour continuer.
                </div>
                <br/>
                <div class="form-group">
                    <label for="numStat">Statut</label>
                    <select id="numStat" name="numStat" class="form-control" required>
                        <?php foreach ($statuts as $statut) : ?>
                            <option value="<?php echo $statut['numStat']; ?>" 
                                <?php echo ($statut['libStat'] === 'Admin') ? 'disabled' : ''; ?>>
                                <?php echo $statut['libStat']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <br/>
                <button type="submit" class="btn btn-primary mt-3">Créer le membre</button>
            </form>
        </div>
    </div>
</div>