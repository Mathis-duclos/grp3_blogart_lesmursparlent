<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

$numMotCle = ctrlSaisies($_POST['numMotCle']);
$libMotCle = ctrlSaisies($_POST['libMotCle']);


sql_update('MOTCLE', 'libMotCle = "'.$libMotCle.'"', "numMotCle = $numMotCle");


header('Location: ../../views/backend/keywords/list.php');