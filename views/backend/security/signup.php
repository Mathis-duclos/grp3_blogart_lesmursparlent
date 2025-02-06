<?php
include '../../../header.php';
?> 

<main>
    <section class="register">
        <div class="titre">
            <h1>Inscirption</h1>
            <img class=bouton-image src="/src/svg/fleche-titre.svg">
        </div>
        <form action="<?php echo ROOT_URL . '/api/security/login.php' ?>" method="post" onsubmit="return checkForm()">
            <div data-mdb-input-init class="form-outline mb-4">
                <label for="pseudoMemb" class="form-label">Votre pseudo :</label>
                <input placeholder="ex: JM34" type="pseudo" id="pseudoMemb" name="pseudoMemb" maxlength="100" class="custom-form-pseudo" />
                <span id="pseudoError" class="error-message text-danger"></span>
            </div>
            <div class="form-row">
                <div data-mdb-input-init class="form-outline mb-4">
                    <label for="prenomMemb" class="form-label">Votre prenom :</label>
                    <input placeholder="ex: Jean" type="prenom" id="prenomMemb" name="prenomMemb" maxlength="100" class="custom-form-pseudo" />
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <label for="nomMemb" class="form-label">Votre nom :</label>
                    <input placeholder="ex: Moulin" type="nom" id="nomMemb" name="nomMemb" maxlength="100" class="custom-form-pseudo"/>
                </div>
            </div>
            <div class="form-row">
                <div data-mdb-input-init class="form-outline mb-4">
                    <label for="eMailMemb" class="form-label">Votre mail :</label>
                    <input placeholder="ex: jean.moulin@gmail.com" type="eMailMemb" id="eMailMemb" name="eMailMemb" maxlength="100" class="custom-form-pseudo"/>
                    <span id="emailError" class="error-message text-danger"></span>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <label for="confMailMembre" class="form-label">Confirmez votre mail :</label>
                    <input placeholder="" type="confMailMembre" id="confMailMembre" name="confMailMembre" maxlength="100" class="custom-form-pseudo"/>
                    <span id="emailError" class="error-message text-danger"></span>
                </div>
            </div>
            <div class="form-row">
                <div data-mdb-input-init class="form-outline mb-4">
                    <label for="passMemb">Votre mot de passe :</label>
                    <input type="password" class="custom-form-login" id="passMemb" name="passMemb" maxlength="100" required>
                    <button type="button" id="togglePassword" class="btn btn-secondary mt-2">Afficher</button>
                    <span id="passwordError" class="error-message text-danger"></span>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <label for="confPassMemb">Confirmez votre mot de passe :</label>
                    <input type="password" class="custom-form-login" id="confPassMemb" name="confPassMemb" maxlength="100" required>
                    <button type="button" id="togglePassword" class="btn btn-secondary mt-2">Afficher</button>
                    <span id="passwordConfirmError" class="error-message text-danger"></span>
                </div>
            </div>
            <div data-mdb-input-init class="form-outline mb-4">
                <label>Acceptez-vous nos mentions légales ?</label>
                <div class="form-row">
                    <div class="form-check">
                        <input type="radio" id="accord1" name="accordMemb" value="1" class="form-check-input" required>
                        <label class="form-check-label" for="accord1">Oui</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="accord0" name="accordMemb" value="0" class="form-check-input">
                        <label class="form-check-label" for="accord0">Non</label>
                    </div>
                </div>
                <span id="accordError" class="error-message text-danger"></span>
            </div>
            <button  type="button" data-mdb-button-init data-mdb-ripple-init class="custom-button">S'inscrire</button>
            <p>Déjà membre ?<p><button  type="button" data-mdb-button-init data-mdb-ripple-init class="custom-button" a href="/views/backend/security/login.php">Se connecter</button></a>
            </div>        
        </form>
    </section>
    <?php require_once 'footer.php'; ?>
</main>
    
<script>
    function checkForm() {
        var valid = true;
        
        var pseudo = document.getElementById("pseudoMemb").value;
        var email = document.getElementById("eMailMemb").value;
        var emailConfirm = document.getElementById("confMailMemb").value;
        var password = document.getElementById("passMemb").value;
        var passwordConfirm = document.getElementById("confPassMemb").value;
        var accordOui = document.getElementById("accord1").checked;
        var accordNon = document.getElementById("accord0").checked;
    
        document.getElementById("pseudoError").textContent = pseudo.length < 6 ? "Le pseudo doit contenir au moins 6 caractères." : "";
        if (pseudo.length < 6) valid = false;
        
        document.getElementById("emailError").textContent = email.length < 6 || !email.includes("@") ? "L'email doit contenir au moins 6 caractères et un '@'." : "";
        if (email.length < 6 || !email.includes("@")) valid = false;
        
        document.getElementById("emailConfirmError").textContent = email !== emailConfirm ? "Les emails ne correspondent pas." : "";
        if (email !== emailConfirm) valid = false;
        
        var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,15}$/;
        document.getElementById("passwordError").textContent = !passwordRegex.test(password) ? "Le mot de passe doit contenir entre 8 et 15 caractères, avec une majuscule, une minuscule, un chiffre et un caractère spécial." : "";
        if (!passwordRegex.test(password)) valid = false;
        
        document.getElementById("passwordConfirmError").textContent = password !== passwordConfirm ? "Les mots de passe ne correspondent pas." : "";
        if (password !== passwordConfirm) valid = false;
        
        document.getElementById("accordError").textContent = accordNon ? "Vous devez accepter les conditions." : "";
        if (accordNon) valid = false;
        
        return valid;
        }

        document.getElementById("togglePassword").addEventListener("click", function() {
        var passwordField = document.getElementById("passMemb");
        var type = passwordField.type === "password" ? "text" : "password";
        
        passwordField.type = type;
        this.textContent = type === "password" ? "Afficher" : "Cacher";
        });
        document.getElementById("toggleConfPassword").addEventListener("click", function() {
        var confirmPasswordField = document.getElementById("confPassMemb");
        var type = confirmPasswordField.type === "password" ? "text" : "password";
        confirmPasswordField.type = type;
        
        this.textContent = type === "password" ? "Afficher" : "Cacher";
        });
</script>
