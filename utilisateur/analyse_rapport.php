<?php

/*
   obtenir d'abord id de KPI et le code de publication que l'on voudrait analyser 
   chercher des données dans la base de données de Lagardère_active 
   retourner des donnnées avec un format json 
 */
require_once '../functions.php';
$ca= connectAnalyse();
$cl= connectLogin();
$success =array('info'=>'ok');
$CodePu=$_POST['CodePU'];
$idKPI=$_POST['idKPI'];
$sql="SELECT sqlKPI,contrainteKPI FROM kpi where idKPI=$idKPI";
$result = sqlSelect($cl, $sql);
$row=$result[0];

// si codePU est null, ca veut dire que l'utilisateur n'a pas mis de contrainte sur le code d'une publcation 
if($CodePu=='null'){
  $newSql=$row[0]; 
} else {
  $newSql=$row[0].' '.$row[1].$CodePu;  
}

$success['sql']=$newSql;
$resultatAnalyse= sqlSelect($ca, $newSql);
$success['resultat']=$resultatAnalyse;
echo json_encode($success);
