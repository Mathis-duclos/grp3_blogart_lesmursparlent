<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

$libTitrArt = ctrlSaisies($_POST['libTitrArt']);
$libChapoArt = ctrlSaisies($_POST['libChapoArt']);
$libAccrochArt = ctrlSaisies($_POST['libAccrochArt']);
$parag1Art = ctrlSaisies($_POST['parag1Art']);
$libSsTitr1Art = ctrlSaisies($_POST['libSsTitr1Art']);
$parag2Art = ctrlSaisies($_POST['parag2Art']);
$libSsTitr2Art = ctrlSaisies($_POST['libSsTitr2Art']);
$parag3Art = ctrlSaisies($_POST['parag3Art']);
$libConclArt = ctrlSaisies($_POST['libConclArt']);
$dtMajArt = ctrlSaisies($_POST['dtMajArt']);
$numThem = ctrlSaisies($_POST['numThem']);
$numArt = ctrlSaisies($_GET['numArt']);
$selectedKeywords = $_POST['selectedKeywords'] ?? []; // si défini, sinon tableau vide

// Gestion de l'image
if (isset($_FILES['urlPhotArt']) && $_FILES['urlPhotArt']['error'] === UPLOAD_ERR_OK) {
    $nomImage = time() . '.' . pathinfo($_FILES['urlPhotArt']['name'], PATHINFO_EXTENSION);
    move_uploaded_file($_FILES['urlPhotArt']['tmp_name'], '../../src/uploads/' . $nomImage);
} else {
    // Conserver l'image existante si aucune nouvelle image n'est téléchargée
    $nomImage = sql_select('ARTICLE', 'urlPhotArt', "numArt = $numArt")[0]['urlPhotArt'] ?? 'default.jpg';
}

// Mise à jour de l'article
sql_update(
    'ARTICLE',
    "dtMajArt = '$dtMajArt', 
    libTitrArt = '$libTitrArt', 
    libChapoArt = '$libChapoArt', 
    libAccrochArt = '$libAccrochArt', 
    parag1Art = '$parag1Art', 
    libSsTitr1Art = '$libSsTitr1Art', 
    parag2Art = '$parag2Art', 
    libSsTitr2Art = '$libSsTitr2Art', 
    parag3Art = '$parag3Art', 
    libConclArt = '$libConclArt', 
    urlPhotArt = '$nomImage', 
    numThem = '$numThem'",
    "numArt = $numArt"
);

// Gestion des mots-clés
// Supprimer les anciens mcl
sql_delete('MOTCLEARTICLE', "numArt = $numArt");
var_dump($selectedKeywords);
// Ajouter les nouv mcl, si des mots-clés sont sélectionnés
foreach ($selectedKeywords as $keywordId) {
    sql_insert('MOTCLEARTICLE', "numArt, numMotCle", "$numArt, $keywordId");
}

header('Location: ../../views/backend/articles/list.php');
exit;

?>