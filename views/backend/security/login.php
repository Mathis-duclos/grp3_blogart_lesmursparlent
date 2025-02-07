<?php
include '../../../header.php';
?>

<main>
    <div id="cb-cookie-banner" class="alert alert-dark text-center mb-0" role="alert">
        <span>This website uses cookies to ensure you get the best experience on our website.</span>
        <a href="https://www.cookiesandyou.com/" target="blank">Learn more</a>
        <button type="button" class="btn btn-primary btn-sm ms-3" onclick="window.cb_hideCookieBanner()">
            I Got It
        </button>
    </div>
    <section class="login">
        <div class="titre">
            <h1>Connexion</h1>
            <img class=bouton-image src="/src/svg/fleche-titre.svg">
        </div>
        <div class="col-md-12">
            <form action="<?php echo ROOT_URL . '/api/security/login.php' ?>" method="post" onsubmit="return checkForm()" class="form-login">
                <div class="form-group">
                    <label for="pseudoMemb">Pseudo</label>
                    <input type="text" class="form-control" id="pseudoMemb" name="pseudoMemb" maxlength="100" placeholder="" required>
                    <span id="pseudoError" class="error-message text-danger"></span>
                </div>
                <br>
                <div class="form-group">
                    <label for="passMemb">Mot de passe</label>
                    <input type="password" class="form-control" id="passMemb" name="passMemb" maxlength="100" required>
                    <button type="button" id="togglePassword" class="btn btn-secondary mt-2">Afficher</button>
                    </div>
                    <span id="passwordError" class="error-message text-danger"></span>
                </div>
                <br>
                <div class="bouton">
                    <button type="submit" class="btn btn-success mt-3">Se connecter</button>
                    <img class=bouton-image src="/src/svg/fleche-bouton.svg">
                </div>
                <br>
                <br>
                <div class="bouton">
                    <a href="/views/backend/security/signup.php" class="btn btn-primary ">Créer un compte</a>
                    <img class=bouton-image src="/src/svg/fleche-bouton.svg">
                </div>
            </form>
        </div>
    </section>
    <?php require_once 'footer.php'; ?>
</main>


<script>
    function checkForm() {
        var valid = true;
        
        var pseudo = document.getElementById("pseudoMemb").value;
        var password = document.getElementById("passMemb").value;
        var passwordConfirm = document.getElementById("confPassMemb").value;
        var accordOui = document.getElementById("accord1").checked;
        var accordNon = document.getElementById("accord0").checked;
    
        document.getElementById("pseudoError").textContent = pseudo.length < 6 ? "Le pseudo doit contenir au moins 6 caractères." : "";
        if (pseudo.length < 6) valid = false;
        
        
        
        var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,15}$/;
        document.getElementById("passwordError").textContent = !passwordRegex.test(password) ? "Le mot de passe doit contenir entre 8 et 15 caractères, avec une majuscule, une minuscule, un chiffre et un caractère spécial." : "";
        if (!passwordRegex.test(password)) valid = false;
                    
        return valid;
    }
        document.getElementById("togglePassword").addEventListener("click", function() {
        var passwordField = document.getElementById("passMemb");
        var type = passwordField.type === "password" ? "text" : "password";
        
        passwordField.type = type;
        this.textContent = type === "password" ? "Afficher" : "Cacher";
    });
</script>


