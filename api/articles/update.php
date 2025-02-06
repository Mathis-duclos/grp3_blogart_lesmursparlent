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
$numArt = $_GET['numArt'];


if (isset($_FILES['urlPhotArt'])) {
    $urlPhotArt = $_FILES['urlPhotArt'] ;
    $nomImage = time() .'.'. pathinfo($_FILES['urlPhotArt']['name'])['extension'];    
    move_uploaded_file($_FILES['urlPhotArt']['tmp_name'], '../../src/uploads/' . $nomImage);
}else {
    $nomImage = 'default.jpg';
}

sql_update('article', "dtMajArt='$dtMajArt',libTitrArt = '$libTitrArt', libChapoArt = '$libChapoArt', libAccrochArt = '$libAccrochArt', parag1Art = '$parag1Art', libSsTitr1Art = '$libSsTitr1Art', parag2Art = '$parag2Art', libSsTitr2Art = '$libSsTitr2Art', parag3Art = '$parag3Art', libConclArt = '$libConclArt', urlPhotArt = '$nomImage', numThem = '$numThem'", "numArt = $numArt");

header('Location: ../../views/backend/articles/list.php');


$selectedKeywords = $_POST['selectedKeywords'];

// Supprimer les anciens mcl 
sql_delete('MMOTCLEARTICLE', "numArt = $numArt");

// Ajouter les nouv mtcl 
foreach ($selectedKeywords as $keywordId) {
    sql_insert('MMOTCLEARTICLE', [
        'numArt' => $numArt,
        'numMotCle' => $keywordId,
    ]);
}
?>