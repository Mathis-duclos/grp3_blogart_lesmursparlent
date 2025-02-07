<?php
include '../../../header.php';

?> 

<div id="cb-cookie-banner" class="alert alert-dark text-center mb-0" role="alert">
    <span>This website uses cookies to ensure you get the best experience on our website.</span>
    <a href="https://www.cookiesandyou.com/" target="blank">Learn more</a>
    <button type="button" class="btn btn-primary btn-sm ms-3" onclick="window.cb_hideCookieBanner()">
        I Got It
    </button>
</div>

<section class="login">
    <div class="titre">
        <h1>Inscription</h1>
        <img class=bouton-image src="/src/svg/fleche-titre.svg">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo ROOT_URL . '/api/security/signup.php' ?>" method="post" onsubmit="return checkForm()">
                    <div class="form-group">
                        <label for="pseudoMemb">Pseudo non modifiable</label>
                        <input type="text" class="form-control" id="pseudoMemb" name="pseudoMemb" maxlength="100" placeholder="6 caracteres minimum" required>
                        <span id="pseudoError" class="error-message text-danger"></span>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="prenomMemb">Prénom</label>
                        <input type="text" class="form-control" id="prenomMemb" name="prenomMemb" maxlength="100" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="nomMemb">Nom</label>
                        <input type="text" class="form-control" id="nomMemb" name="nomMemb" maxlength="100" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="eMailMemb">eMail</label>
                        <input type="text" class="form-control" id="eMailMemb" name="eMailMemb" maxlength="100" required>
                        <span id="emailError" class="error-message text-danger"></span>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="confMailMemb">Confirmez eMail</label>
                        <input type="text" class="form-control" id="confMailMemb" name="confMailMemb" maxlength="100" required>
                        <span id="emailConfirmError" class="error-message text-danger"></span>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="passMemb">Mot de passe</label>
                        <input type="password" class="form-control" id="passMemb" name="passMemb" maxlength="100" required>
                        <button type="button" id="togglePassword" class="btn btn-secondary mt-2">Afficher</button>
                        <span id="passwordError" class="error-message text-danger"></span>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="confPassMemb">Confirmez mot de passe</label>
                        <input type="password" class="form-control" id="confPassMemb" name="confPassMemb" maxlength="100" required>
                        <button type="button" id="toggleConfPassword" class="btn btn-secondary mt-2">Afficher</button>
                        <span id="passwordConfirmError" class="error-message text-danger"></span>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Acceptez vous la conservation de vos données</label>
                        <div class="form-check">
                            <input type="radio" id="accord1" name="accordMemb" value="1" class="form-check-input" required>
                            <label class="form-check-label" for="accord1">Oui</label>
                        </div>
                        <br>
                        <div class="form-check">
                            <input type="radio" id="accord0" name="accordMemb" value="0" class="form-check-input">
                            <label class="form-check-label" for="accord0">Non</label>
                        </div>
                        <span id="accordError" class="error-message text-danger"></span>
                    </div>
                    <br>
                    <div class="bouton">
                        <button type="submit" class="btn btn-primary mt-3">Créer le compte</but>
                        <img class=bouton-image src="/src/svg/fleche-bouton.svg">
                    </div>
                    <br>
                    <br>
                    <div class="bouton">
                        <a href="/views/backend/security/login.php" class="btn btn-success ">Se connecter</a>
                        <img class=bouton-image src="/src/svg/fleche-bouton.svg">
                    </div>
                </form>
            </div>
        </div>
</section>
<?php require_once 'footer.php'; ?>


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
</div>
