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
$listeMotsCles = $_POST['selectedKeywords'];

if (isset($_FILES['urlPhotArt'])) {
    $urlPhotArt = $_FILES['urlPhotArt'] ;
    var_dump($urlPhotArt);
    var_dump(time());
    var_dump(pathinfo($_FILES['urlPhotArt']['name']));
    $nomImage = time() .'.'. pathinfo($_FILES['urlPhotArt']['name'])['extension'];    
    move_uploaded_file($_FILES['urlPhotArt']['tmp_name'], '../../src/uploads/' . $nomImage);
}else {
    $nomImage = 'default.jpg';
}
$numThem = ctrlSaisies($_POST['numThem']);

sql_insert(
    'article',
    'libTitrArt, libChapoArt, libAccrochArt, parag1Art, libSsTitr1Art, parag2Art, libSsTitr2Art, parag3Art, libConclArt, urlPhotArt, numThem',
    "'$libTitrArt', '$libChapoArt', '$libAccrochArt', '$parag1Art', '$libSsTitr1Art', '$parag2Art', '$libSsTitr2Art', '$parag3Art', '$libConclArt', '$nomImage', '$numThem'"
);

$numArt = sql_select('ARTICLE' , "MAX(numArt) as numArt");


$numArt = $numArt[0]['numArt'];

foreach ($listeMotsCles as $motscle) {
    sql_insert(
        'motclearticle',
        'numArt, numMotCle',
        "'$numArt', '$motscle'"
    );
};


header('Location: ../../views/backend/articles/list.php');