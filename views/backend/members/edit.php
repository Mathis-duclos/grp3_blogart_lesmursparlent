<?php
include '../../../header.php';

// Récupérer les informations du membre
$membrespseudo = sql_select('MEMBRE', 'pseudoMemb', 'numMemb='.$_GET['numThem'])[0];
$membresprenom = sql_select('MEMBRE', 'prenomMemb', 'numMemb='.$_GET['numThem'])[0];
$membresnom = sql_select('MEMBRE', 'nomMemb', 'numMemb='.$_GET['numThem'])[0];
$membresnum = sql_select('MEMBRE', 'numMemb', 'numMemb='.$_GET['numThem'])[0];
$membresdtcrea = sql_select('MEMBRE', 'dtCreaMemb', 'numMemb='.$_GET['numThem'])[0];
$membresmdp = sql_select('MEMBRE', 'passMemb', 'numMemb='.$_GET['numThem'])[0];
$membresmail = sql_select('MEMBRE', 'eMailMemb', 'numMemb='.$_GET['numThem'])[0];
$membresstat = sql_select('MEMBRE', 'numStat', 'numMemb='.$_GET['numThem'])[0];

// Récupérer le libStat du statut du membre
$libStat = sql_select('STATUT', 'libStat', 'numStat='.$membresstat['numStat'])[0]['libStat'];

// Récupérer tous les statuts pour la liste déroulante
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

    function checkForm() {
        var pass = document.getElementById("passMemb").value;
        var confirmPass = document.getElementById("passMemb2").value;
        var email = document.getElementById("eMailMemb").value;
        var confirmEmail = document.getElementById("eMailMemb2").value;

        var passwordErrorDiv = document.getElementById("passwordError");
        var emailErrorDiv = document.getElementById("emailError");

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

        return isValid;
    }

    function validatePassword() {
        var pass = document.getElementById("passMemb").value;
        var passwordErrorDiv = document.getElementById("passwordError");

        // Regex pour valider le mot de passe (au moins une minuscule, une majuscule, un chiffre et un caractère spécial)
        var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,15}$/;

        if (pass == '') {
            passwordErrorDiv.style.display = "none";
            return true;
        } else {
            if (!passwordPattern.test(pass)) {
                passwordErrorDiv.innerHTML = "Le mot de passe doit contenir une majuscule, une minuscule, un chiffre et un caractère spécial.";
                passwordErrorDiv.style.display = "block";
                return false;
            } else {
                passwordErrorDiv.style.display = "none";
                return true;
            }
        }
    }
</script>

<!-- Formulaire de modification -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Modification membre</h1>
        </div>
        <div class="col-md-12">
            <form action="<?php echo ROOT_URL . '/api/members/update.php' ?>" method="post" onsubmit="return checkForm() && validatePassword()">
                <div class="form-group">
                    <label for="numMemb">Numéro</label>
                    <input type="text" id="numMemb" name="numMemb" class="form-control" value="<?php echo htmlspecialchars($membresnum['numMemb']); ?>" readonly>
                </div>
                <br />
                <div class="form-group">
                    <label for="pseudoMemb">Pseudo</label>
                    <input type="text" id="pseudoMemb" name="pseudoMemb" class="form-control" value="<?php echo htmlspecialchars($membrespseudo['pseudoMemb']); ?>" readonly>
                </div>
                <br />
                <div class="form-group">
                    <label for="dtCreaMemb">Date de création</label>
                    <input type="text" id="dtCreaMemb" name="dtCreaMemb" class="form-control" value="<?php echo htmlspecialchars($membresdtcrea['dtCreaMemb']); ?>" readonly>
                </div>
                <br />
                <div class="form-group">
                    <label for="prenomMemb">Prénom</label>
                    <input type="text" id="prenomMemb" name="prenomMemb" class="form-control" value="<?php echo htmlspecialchars($membresprenom['prenomMemb']); ?>" required>
                </div>
                <br />
                <div class="form-group">
                    <label for="nomMemb">Nom</label>
                    <input type="text" id="nomMemb" name="nomMemb" class="form-control" value="<?php echo htmlspecialchars($membresnom['nomMemb']); ?>" required>
                </div>
                <br />
                <div class="form-group">
                    <label for="passMemb">Mot de passe</label>
                    <input type="password" id="passMemb" name="passMemb" maxlength='15' minlength='8' class="form-control">
                    <small id="passHelp" class="form-text text-muted">(il doit être compris entre 8 et 15 caractères. Il doit avoir au moins une majuscule, une minuscule, un caractère spécial et un chiffre. Les caractères spéciaux sont acceptés.)</small>
                </div>
                <div class="form-group">
                    <input type="checkbox" id="Mdp1" name="Mdp" onchange="togglePasswordVisibility('passMemb', 'Mdp1')">
                    <label for="Mdp1">Afficher le mot de passe</label>
                </div>
                <br/>
                <div class="form-group">
                    <label for="passMemb2">Confirmez le mot de passe</label>
                    <input type="password" id="passMemb2" name="passMemb2" class="form-control">
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
                    <label for="eMailMemb">eMail</label>
                    <input type="email" id="eMailMemb" name="eMailMemb" class="form-control" value="<?php echo htmlspecialchars($membresmail['eMailMemb']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="eMailMemb2">Confirmez eMail</label>
                    <input type="email" id="eMailMemb2" name="eMailMemb2" class="form-control" value="<?php echo htmlspecialchars($membresmail['eMailMemb']); ?>" required>
                </div>
                <br/>
                <div id="emailError" style="color: red; font-weight: bold; display: none;">
                    Les emails ne correspondent pas !
                </div>
                <br/>
                <div class="form-group">
                    <label for="numStat">Statut</label>
                    <select id="numStat" class="form-control" disabled>
                        <?php foreach ($statuts as $statut) : ?>
                            <option value="<?php echo $statut['numStat']; ?>" 
                                <?php echo ($statut['numStat'] == $membresstat['numStat']) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($statut['libStat']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <!-- Champ caché pour soumettre la valeur du statut -->
                    <input type="hidden" name="numStat" value="<?php echo htmlspecialchars($membresstat['numStat']); ?>">
                </div>
                <br />
                <div class="form-group mt-2">
                    <a href="list.php" class="btn btn-primary">List</a>
                    <button type="submit" class="btn btn-danger">Confirmer update ?</button>
                </div>
            </form>
        </div>
    </div>
</div>