<?php

require_once '../functions.php';
$cl=connectLogin();

$idService=$_POST['idService'];
$nomRapport=$_POST['nomRapport'];
$descripRapport=$_POST['descripRapport'];

$success = array('request' =>'Créer un Rapport');

$query="INSERT INTO rapport(nomRapport,descripRapport, idService) VALUES (\"$nomRapport\",\"$descripRapport\",$idService)";
$result= mysqli_query($cl, $query) or die("Choix base impossible : " . mysqli_error($cl));
if($result){
    $success['resultat']='Votre rapport est bién créé';
} else {
    $success['resultat']='Votre création du rapport n\'a pas réussi, veuillez réessayer';
}

echo json_encode($success);