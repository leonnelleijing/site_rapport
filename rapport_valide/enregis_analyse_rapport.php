<?php

/*
 * connecter à la base de donnée 
 * via ajax, obtenir l'emplacement de fichier html 
 * enregistrer dans le dossier "rapport_valide"
 * mettre le url dans la base de donnée 
 * changer l'etat de ce rapport 
 * supprimer les contenus concernnant ce rapport dans la base de donnée pour que :
   *1. libérer le mémoire 
   *2. désactiver tous les fonctions de modifictaions 

*/
require_once '../functions.php';
session_start();
$cl=connectLogin();
$idRapport=$_SESSION['idRapport'];



$file=$_FILES['file'];
$success = array('request' =>'Valider un Rapport');
$uploads_dir = './';
$tmp_name = $file['tmp_name'];
$name = trim($file['name']).".html";
$result= move_uploaded_file($tmp_name,$uploads_dir.$name);

$sql="UPDATE rapport SET etatRapport='valide',urlRapport= '$name' WHERE idRapport=$idRapport";
$resultUpd= mysqli_query($cl, $sql) or die("Erreur sélection statuts : " . mysqli_error($cl));

$sql="DELETE FROM contenu WHERE idRapport = $idRapport";
$resultSup= mysqli_query($cl, $sql) or die("Erreur sélection statuts : " . mysqli_error($cl));


if($result){
    $success['resultat']='Ce rapport est validé';
} else {
    $success['resultat']='Ce rapport n\'est pas été validé, veuillez réessayer';
}


echo json_encode($success);
