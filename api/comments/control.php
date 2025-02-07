<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

echo "bonne page" . "<br>";

var_dump($_POST);

$numCom = intval($_GET['numCom']);
$attModOK = ctrlSaisies($_POST['attModOK']);
$notifComKOAff = ctrlSaisies($_POST['notifComKOAff']);

var_dump($attModOK);
var_dump($notifComKOAff);





//attModOK

//"attModOK1">Valider le commentaire
//"attModOK0">Refuser le commentaire




//sql_insert('COMMENT', $attributs, $values);


//date(Y-m-d-H-m-s);

sql_update('COMMENT', 'attModOK = "'. $attModOK. '", notifComKOAff ="'. $notifComKOAff .'"' , 'numCom =' . $numCom );



header('Location: ../../views/backend/comments/list.php');
exit();

?>