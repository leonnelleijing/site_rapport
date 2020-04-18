<?php

include_once 'template.php';
require_once 'functions.php';
$cl= connectLogin();
session_start();

$idRapport=$_SESSION['idRapport'];
$userId=$_SESSION['userId'];

$commentaire=$_POST['commentaire'];
$sql="INSERT INTO historique(ContenuComm, idRapport, userId) VALUES(\"$commentaire\",$idRapport,$userId)";
$result= mysqli_query($cl, $sql) or die("Erreur sélection statuts : " . mysqli_error($cl));

$isdirecteur= isDirecteur($cl, $userId);
if($isdirecteur==true){
    header("Location: ./directeur/historique.php");
}else{
    header("Location: ./utilisateur/historique.php");
}