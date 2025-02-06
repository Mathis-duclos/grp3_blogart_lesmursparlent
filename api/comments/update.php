<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

echo "bonne page" . "<br>";

var_dump($_POST);

$numCom = intval($_GET['numCom']);
$attModOK = ctrlSaisies($_POST['attModOK']);
$delLogiq = ctrlSaisies($_POST['delLogiq']);
$notifComKOAff = ctrlSaisies($_POST['notifComKOAff']);

var_dump($attModOK);
var_dump($notifComKOAff);





//attModOK

//"attModOK1">Valider le commentaire
//"attModOK0">Refuser le commentaire




//sql_insert('COMMENT', $attributs, $values);


$dtDelLogCom=date("Y-m-d-H-i-s"); 

sql_update('COMMENT', 'attModOK = "'. $attModOK. '", notifComKOAff ="'. $notifComKOAff .'", delLogiq ="'. $delLogiq .'", dtDelLogCom ="'. $dtDelLogCom .'"' , 'numCom =' . $numCom );



header('Location: ../../views/backend/comments/list.php');
exit();

?>