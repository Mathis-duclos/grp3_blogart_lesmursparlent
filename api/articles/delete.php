<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';


$numArt = ctrlSaisies($_GET['numArt']);

sql_delete('MOTCLEARTICLE', "numArt = $numArt");
sql_delete('ARTICLE', "numArt = $numArt");
sql_delete('COMMENT', "numArt = $numArt");
sql_delete('LIKEART', "numArt = $numArt");



header('Location: ../../views/backend/articles/list.php');