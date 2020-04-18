<?php

/*
 * Summettre un rapport: 
  1. via ajax, obtenir un tableau de code HTML des analyse anisi que des commentaires 
  2. vérifier si ce tableau existe dans la base de donnée, si existe, vérifie si le commentaire a modifié 
  3. mettre/mettre à jour le code d'un tableau d'analyse et le valeur d'un commenatire en une même lign dans le table contenu  
  4. changer l'état de rapport en 'soumis' pour qu'il affiche dans l'interface de directeur 
 
 */
require_once '../functions.php';
session_start();
$cl=connectLogin();
$arr= json_decode($_POST['array'],true);
$idRapport=$_SESSION['idRapport'];
$success = array('request' =>'Soumettre un rapport');

foreach ($arr as $analyse) {
    $synthese=$analyse['synthese'];
    $tableAnalyse=$analyse['data'];
    $idContenu=$analyse['idContenu'];
    $nomContenu=$analyse['nomContenu'];

    // vérifier la modification des synthèse
    if($idContenu == null){
        $query="INSERT INTO contenu(synthese,tableAnalyse,idRapport,nomContenu) VALUES('$synthese','$tableAnalyse','$idRapport',\"$nomContenu\")";
        $result= mysqli_query($cl, $query) or die("Choix base impossible : " . mysqli_error($cl));
    }else{
        $query="update contenu set synthese='$synthese' where idContenu=$idContenu";
        $result= mysqli_query($cl, $query) or die("Choix base impossible : " . mysqli_error($cl));
    }
   
}

$sql="SELECT etatRapport from rapport where idRapport=$idRapport";
$row= sqlSelect($cl, $sql);
if($row[0][0]<>'soumis'){
    $sql="UPDATE rapport set etatRapport ='soumis' where idRapport=$idRapport";
    $resultInsert= mysqli_query($cl, $sql);
}

if($result){
    $success['resultat']='Votre rapport est soumis au directeur';
} else {
    $success['resultat']='Votre rapport n\'a pas été soumis';
}

echo json_encode($success);
