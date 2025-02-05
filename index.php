<?php 

session_start();

require_once 'header.php';
sql_connect();

if ( isset($_GET["errorpseudo"]) && $_GET["errorpseudo"] == 1) {
    echo "Pseudo déjà utilisé : veuillez recommencer";
}

if ( isset($_GET["login"]) && $_GET["login"] == 1) {
    echo "Vous êtes connectés inchalla ";
    echo $_SESSION['pseudoMemb'];
}


?>




<?php require_once 'footer.php'; ?>